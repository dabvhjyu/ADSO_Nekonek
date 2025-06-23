-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2025 a las 05:44:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `softwarevecino`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_categoria_crediticia_clientes` ()   BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE v_cliente_id INT;
    DECLARE v_moras INT;
    DECLARE nueva_categoria VARCHAR(5);

    -- Cursor para recorrer todos los clientes
    DECLARE cur CURSOR FOR
        SELECT c.id, COUNT(cr.id) AS total_moras
        FROM cliente c
        LEFT JOIN credito cr ON cr.cliente_id = c.id AND cr.estado = 'vencido'
        GROUP BY c.id;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    OPEN cur;

    read_loop: LOOP
        FETCH cur INTO v_cliente_id, v_moras;
        IF done THEN
            LEAVE read_loop;
        END IF;

        -- Asignar categoría según las moras
        IF v_moras = 0 THEN
            SET nueva_categoria = 'A';
        ELSEIF v_moras BETWEEN 1 AND 2 THEN
            SET nueva_categoria = 'B';
        ELSEIF v_moras BETWEEN 3 AND 4 THEN
            SET nueva_categoria = 'C';
        ELSE
            SET nueva_categoria = 'D';
        END IF;

        -- Actualizar la categoría del cliente
        UPDATE cliente
        SET categoria_crediticia = nueva_categoria
        WHERE id = v_cliente_id;
    END LOOP;

    CLOSE cur;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_clientes_con_credito` ()   BEGIN
    SELECT c.id, c.nombre, c.documento_identidad, cc.id AS categoria, cc.valor AS credito_maximo
    FROM cliente c
    JOIN categoria_crediticia cc ON c.categoria_crediticia = cc.id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_creditos_por_estado` (IN `p_estado` ENUM('vigente','pagado','vencido'))   BEGIN
    IF p_estado IS NOT NULL THEN
        SELECT
            cr.id AS credito_id,
            cl.nombre AS cliente,
            cr.monto,
            cr.fecha_emision,
            cr.fecha_vencimiento,
            cr.estado,
            cr.plazo_pago,
            cr.interes_mora
        FROM credito cr
        JOIN cliente cl ON cr.cliente_id = cl.id
        WHERE cr.estado = p_estado;
    ELSE
        -- Si no se proporciona estado, muestra todos los créditos con su estado
        SELECT
            cr.id AS credito_id,
            cl.nombre AS cliente,
            cr.monto,
            cr.fecha_emision,
            cr.fecha_vencimiento,
            cr.estado,
            cr.plazo_pago,
            cr.interes_mora
        FROM credito cr
        JOIN cliente cl ON cr.cliente_id = cl.id;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_moras_y_categoria` ()   BEGIN
    SELECT
        cl.id AS cliente_id,
        cl.nombre AS nombre_cliente,
        cl.categoria_crediticia AS categoria_actual,
        COUNT(cr.id) AS total_moras
    FROM cliente cl
    LEFT JOIN credito cr ON cr.cliente_id = cl.id AND cr.estado = 'vencido'
    GROUP BY cl.id, cl.nombre, cl.categoria_crediticia
    ORDER BY total_moras DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_ventas_por_credito` ()   BEGIN
    SELECT
        cl.id AS cliente_id,
        cl.nombre AS nombre_cliente,
        cr.id AS credito_id,
        cr.fecha_emision,
        cr.estado,
        pr.nombre AS producto,
        dc.cantidad,
        dc.precio_unitario,
        dc.total
    FROM cliente cl
    INNER JOIN credito cr ON cr.cliente_id = cl.id
    INNER JOIN detallecredito dc ON dc.credito_id = cr.id
    INNER JOIN producto pr ON pr.id = dc.producto_id
    ORDER BY cl.id, cr.id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_cliente` (IN `p_nombre` VARCHAR(100), IN `p_direccion` VARCHAR(200), IN `p_telefono` VARCHAR(20), IN `p_email` VARCHAR(100), IN `p_documento_identidad` VARCHAR(50), IN `p_categoria_crediticia` VARCHAR(5))   BEGIN
    INSERT INTO cliente (
        nombre,
        direccion,
        telefono,
        email,
        documento_identidad,
        fecha_registro,
        categoria_crediticia
    )
    VALUES (
        p_nombre,
        p_direccion,
        p_telefono,
        p_email,
        p_documento_identidad,
        CURDATE(),
        p_categoria_crediticia
    );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_credito` (IN `p_cliente_id` INT, IN `p_usuario_id` INT, IN `p_monto` DECIMAL(10,2), IN `p_plazo_pago` INT, IN `p_interes_mora` DECIMAL(5,2), IN `p_dias_vencimiento` INT)   BEGIN
    INSERT INTO credito (
        cliente_id, usuario_id, monto, fecha_emision, fecha_vencimiento, estado, plazo_pago, interes_mora
    ) VALUES (
        p_cliente_id, p_usuario_id, p_monto, CURDATE(), DATE_ADD(CURDATE(), INTERVAL p_dias_vencimiento DAY), 'vigente', p_plazo_pago, p_interes_mora
    );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_pago` (IN `p_credito_id` INT, IN `p_monto` DECIMAL(10,2), IN `p_tipo_pago` VARCHAR(50), IN `p_es_total` BOOLEAN)   BEGIN
    DECLARE v_restante DECIMAL(10,2);

    SELECT monto - IFNULL(SUM(monto), 0) INTO v_restante
    FROM credito
    LEFT JOIN pago ON credito.id = pago.credito_id
    WHERE credito.id = p_credito_id;

    INSERT INTO pago (
        credito_id, monto, fecha, tipo_pago, es_total, restante_pago
    ) VALUES (
        p_credito_id, p_monto, CURDATE(), p_tipo_pago, p_es_total, v_restante - p_monto
    );

    -- Si el pago es total, actualizamos el estado del crédito
    IF p_es_total THEN
        UPDATE credito
        SET estado = 'pagado'
        WHERE id = p_credito_id;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_producto` (IN `p_nombre` VARCHAR(100), IN `p_descripcion` TEXT, IN `p_precio` DECIMAL(10,2), IN `p_cantidad` INT, IN `p_categoria` INT, IN `p_imagen` VARCHAR(255))   BEGIN
    INSERT INTO producto (
        nombre,
        descripcion,
        precio,
        cantidad,
        categoria,
        imagen
    )
    VALUES (
        p_nombre,
        p_descripcion,
        p_precio,
        p_cantidad,
        p_categoria,
        p_imagen
    );
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'lacteos'),
(2, 'higiene'),
(3, 'dulces'),
(4, 'abarrotes'),
(5, 'bebidas'),
(6, 'botanas'),
(7, 'embutidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_crediticia`
--

CREATE TABLE `categoria_crediticia` (
  `id` varchar(5) NOT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria_crediticia`
--

INSERT INTO `categoria_crediticia` (`id`, `valor`) VALUES
('A', 100000),
('B', 50000),
('C', 10000),
('D', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `documento_identidad` varchar(50) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `categoria_crediticia` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `direccion`, `telefono`, `email`, `documento_identidad`, `fecha_registro`, `categoria_crediticia`) VALUES
(1, 'nico', 'cl 3b #71-23 sur', '3245676573', 'uncorreo@gmail.com', '11234323', '2025-06-03', 'A'),
(2, 'juan camilo rodriguez', 'cra 24 #39-45, barrio La Soledad', '3204567890', 'jual.dhw@gmail.com', '1135798642', '2025-06-03', 'A'),
(3, 'maria lopez', 'cl 39 #25-32, barrio La Soledad', '3103456789', 'camiL@hotmail.com', '1209876543', '2025-06-03', 'A'),
(4, 'andres felipe gomez', 'cra 23 #40-10, barrio La Soledad,', '3126677889', 'andresFelipe13@hotmail.com', '1054321678', '0000-00-00', 'A'),
(5, 'laura torres', 'av suba #115-20', '3212345678', 'torres1344@gmail.com', '1078345901', '2025-06-03', 'A'),
(6, 'sebastian martinez', 'cra 25 #38-14, palermo', '3223344556', 'sebas_mar@gmail.com', '1167345999', '2025-06-03', 'A'),
(7, 'fernando mesa', 'cl 40 #24-20, barrio La Soledad', '3139988776', 'fernando_mesa@hotmail.com', '1027886347', '2025-06-03', 'A'),
(8, 'camila sara maecha', 'cl 38 #26-08, barrio La Soledad', '3142233445', 'maechasara@gmail.com', '1458897747', '2025-06-03', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE `credito` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `estado` enum('vigente','pagado','vencido') DEFAULT NULL,
  `plazo_pago` int(11) DEFAULT NULL,
  `interes_mora` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecredito`
--

CREATE TABLE `detallecredito` (
  `id` int(11) NOT NULL,
  `credito_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal_producto` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `credito_id` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_pago` varchar(50) DEFAULT NULL,
  `es_total` tinyint(1) DEFAULT NULL,
  `restante_pago` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `categoria`, `imagen`) VALUES
(33, 'leche en polvo', 'Bolsa plástica de 500 g. Leche entera, fortificada con vitaminas A y D. Polvo blanco de grano fino y disolución rápida', 10000.00, 2, 1, NULL),
(34, 'leche', 'Caja de cartón de 1 litro. Leche entera pasteurizada, sin conservantes. Color blanco opaco, consistencia fluida', 4500.00, 3, 1, NULL),
(35, 'kumis ', 'Bolsa plástica de de 500 g. Bebida láctea fermentada, textura espesa, color blanco nacarado', 5000.00, 6, 1, NULL),
(36, 'queso campesino', 'Paquete sellado al vacío de 500 g. Queso fresco de pasta blanda, color blanco, textura húmeda y compacta', 11000.00, 2, 1, NULL),
(37, 'jabon', 'Unidades de 110 g. Jabón en barra rectangular, color beige claro. Aroma suave, de avena y prebioticos', 5250.00, 5, 2, NULL),
(38, 'shampoo', 'Sobre plástico de 18 ml. Shampoo líquido transparente o ligeramente perlado. Contiene extractos vegetales y fragancia floral', 2500.00, 2, 2, NULL),
(39, 'pasta dental', 'Tubo plástico de 29g con tapa flip-top. Pasta de color blanco con línea azul, textura cremosa. Contiene flúor', 5500.00, 3, 2, NULL),
(40, 'pañales', 'Unidad de pañal, talla recien nacido hasta 2 años. Interior con capas absorbentes de celulosa y gel. Cierre adhesivo. Diseño unisex', 8000.00, 5, 2, NULL),
(41, 'chocolate', 'Tableta de 100 g envuelta en papel metalizado. Chocolate con mani, color marrón oscuro, textura firme y brillante', 6250.00, 7, 3, NULL),
(42, 'gomitas', 'Bolsa de 30 g sellada. Caramelos masticables de gelatina, forma de frutas, colores surtidos, recubiertas con azúcar', 7000.00, 8, 3, NULL),
(43, 'malvaviscos', 'Bolsa plástica de 200 g. Malvaviscos cilíndricos, blancos y rosados, suaves al tacto, sabor vainilla. Espumosos', 10000.00, 5, 3, NULL),
(44, 'galletas', 'Empaque de 30 galletas unidad 5g. Galletas redondas de harina de trigo, textura crujiente', 2000.00, 9, 3, NULL),
(45, 'pasteles', 'Unidad individual. brownis rellenos de chocolate, superficie esponjosa. Peso total aprox. 100g', 8000.00, 7, 3, NULL),
(46, 'chicles', 'Sobre pequeño de 8,5 g con 12 unidades. Chicles sabor fresa sin azucar, color rosa, sabor menta fuerte', 2000.00, 10, 3, NULL),
(47, 'arroz', 'Paquete plástico de 500 g. Grano largo, blanco pulido, 100% libre de impurezas. No contiene gluten', 4500.00, 4, 4, NULL),
(48, 'cafe', 'Tarro de 170 g. Café instantaneo, molido fino. Grano colombiano, sin aditivos', 10550.00, 4, 4, NULL),
(49, 'huevos', 'Cubeta de cartón con 30 huevos tipo AA. Cáscara color marrón claro, tamaño grande, peso promedio 60g por unidad', 600.00, 30, 4, NULL),
(50, 'pasta', 'Paquete plástico de 125 g. Espagueti de trigo duro. Color amarillo pálido, superficie lisa.', 6000.00, 7, 4, NULL),
(51, 'harina', 'Paquete de plastico de 1 kg. Harina de trigo refinada, blanca, textura fina. Aditivada con hierro y vitaminas.', 4500.00, 3, 4, NULL),
(52, 'atun', 'Lata metálica de 160 g. Lomitos de atún en aceite de girasol. Color rosado claro, textura firme.', 7500.00, 5, 4, NULL),
(53, 'refrescos', 'Botella de 600 ml. Gaseosa de manzana, soda, cocacola, limon y colombiana, con gas saborizado.', 4490.00, 15, 5, NULL),
(54, 'agua', 'Botella transparente de 600 ml. Agua potable tratada, sin gas ni saborizantes. pH balanceado', 3500.00, 7, 5, NULL),
(55, 'jugos', 'Botella de 500 ml hit, Jugo pasteurizado de fruta (mango, mora, piña, torpical). Color según el sabor, sin gas', 2500.00, 3, 5, NULL),
(56, 'papas', 'Bolsas de 100 g. Papas fritas sabor a picante, pollo, limon, natural, bbq, caseras. Textura crujiente. Envasadas con nitrógeno para conservar frescura', 5000.00, 7, 6, NULL),
(57, 'palomitas', 'Bolsa de 500 g. maiz pira. grano mediano', 3400.00, 3, 6, NULL),
(58, 'uvas pasas', 'Bolsa plástica de 90 g. Fruta deshidratada, color morado oscuro, textura blanda y dulce natural. Producto sin azúcar añadida.', 3500.00, 5, 6, NULL),
(59, 'salchicha', 'Empaque de 5 unidades 75 g. Salchichas tipo viena, de carne de res y cerdo. Color rosado, textura firme. Producto precocido.', 7500.00, 5, 7, NULL),
(60, 'jamon', 'Empaque al vacio de 450 g. Rebanadas delgadas de jamon de cerdo tipo sandwichero. Color rosado pálido, bajo en grasa.', 9500.00, 7, 7, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `cc` varchar(20) DEFAULT NULL,
  `correoElectronico` varchar(100) DEFAULT NULL,
  `rolID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `usuario`, `password`, `cc`, `correoElectronico`, `rolID`) VALUES
(1, 'Don Carlos', 'gonzalesP', 'Contraseña123?', '12345678', 'doncarlos@gmail.com', 1),
(2, 'patricia gonzales', 'gonzalesP1', 'Contraseña123?', '23456789', 'patricia@gmail.com', 2),
(3, 'alejandro garcia', 'garciaA', 'Contraseña123?', '34567891', 'alejandro@gmail.com', 2),
(4, 'maria flores', 'floresM', 'Contraseña123?', '45678910', 'maria@gmail.com', 2),
(5, 'laura martinez', 'lauraM', 'Contraseña123?', '56789110', 'laura@gmail.com', 2),
(6, 'jhon alexis hernandez', 'hernandezJ', 'Contraseña123?', '11236576', 'jhon@gmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_crediticia`
--
ALTER TABLE `categoria_crediticia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente_categoria` (`categoria_crediticia`);

--
-- Indices de la tabla `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `detallecredito`
--
ALTER TABLE `detallecredito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credito_id` (`credito_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credito_id` (`credito_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `fk_rol` (`rolID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `credito`
--
ALTER TABLE `credito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallecredito`
--
ALTER TABLE `detallecredito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_categoria` FOREIGN KEY (`categoria_crediticia`) REFERENCES `categoria_crediticia` (`id`);

--
-- Filtros para la tabla `credito`
--
ALTER TABLE `credito`
  ADD CONSTRAINT `credito_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `credito_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `detallecredito`
--
ALTER TABLE `detallecredito`
  ADD CONSTRAINT `detallecredito_ibfk_1` FOREIGN KEY (`credito_id`) REFERENCES `credito` (`id`),
  ADD CONSTRAINT `detallecredito_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`credito_id`) REFERENCES `credito` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`rolID`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

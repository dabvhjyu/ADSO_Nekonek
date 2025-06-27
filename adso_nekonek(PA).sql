/* VISTAS */

/*  1. Contenido con nombre de estado, tipo, país y cantidad de episodios. */

CREATE VIEW vista_contenido_detallado AS
SELECT c.c_id, c.c_titulo, p.p_nombre AS pais, e.e_nombre AS estado, c.c_canepisodios
FROM contenido c
JOIN paises p ON c.c_pais = p.p_id
JOIN estado e ON c.c_estado = e.e_id;

SELECT * FROM vista_contenido_detallado;

/*  2. Biblioteca con título del contenido, país, estado de lectura y fecha */

CREATE VIEW vista_biblioteca_usuario_detalle AS
SELECT b.b_id, u_id, c.c_titulo, p.p_nombre AS pais, b.b_estado, b.b_fecha
FROM biblioteca b
JOIN contenido c ON b.c_id = c.c_id
JOIN paises p ON c.c_pais = p.p_id;

SELECT * FROM vista_biblioteca_usuario_detalle;

/*  3. Reportes con nombre del país, título, motivo y fecha */

CREATE VIEW vista_reportes_completos AS
SELECT r.r_id, c.c_titulo, p.p_nombre AS pais, r.motivo_r, r.r_fecha_creacion
FROM reportes r
JOIN contenido c ON r.c_id = c.c_id
JOIN paises p ON c.c_pais = p.p_id;

SELECT * FROM vista_reportes_completos;

/*  FUNCIONES */

/*  1. Cuenta cuántos contenidos hay según estado, tipo y país */
DELIMITER //
CREATE FUNCTION fn_total_contenido_estado(
    v_estado INT,
    v_tipo INT,
    v_pais INT
) RETURNS INT
BEGIN
    DECLARE total INT;
    SELECT COUNT(*) INTO total
    FROM contenido
    WHERE c_estado = v_estado AND c_tipo = v_tipo AND c_pais = v_pais;
    RETURN total;
END //
DELIMITER ;

SELECT fn_total_contenido_estado(1, 1, 3) AS total_contenido;


/*  2. Retorna el nombre de un estado en específico*/
DELIMITER //
CREATE FUNCTION fn_nombre_estado_contenido(
    v_c_id INT
) RETURNS VARCHAR(50)
BEGIN
    DECLARE nombre_estado VARCHAR(50);
    SELECT e.e_nombre INTO nombre_estado
    FROM contenido c
    JOIN estado e ON c.c_estado = e.e_id
    WHERE c.c_id = v_c_id;
    RETURN nombre_estado;
END //
DELIMITER ;

SELECT fn_nombre_estado_contenido(5) AS estado_contenido;

/*  3. Verifica si un contenido tiene un género específico */
DELIMITER //
CREATE FUNCTION fn_tiene_genero(
    v_c_id INT,
    v_g_id INT
) RETURNS BOOLEAN
BEGIN
    DECLARE existe INT;
    SELECT COUNT(*) INTO existe
    FROM contenido_generos
    WHERE c_id = v_c_id AND g_id = v_g_id;
    RETURN existe > 0;
END //
DELIMITER ;

SELECT fn_tiene_genero(8, 6) AS tiene_genero;



/*  PROCEDIMIENTOS*/

 /*  1. Filtra contenido por país, estado y tipo*/
 
 DELIMITER //
CREATE PROCEDURE sp_filtrar_contenido_avanzado(
    IN v_pais INT,
    IN v_estado INT,
    IN v_tipo INT
)
BEGIN
    SELECT c.c_id, c.c_titulo, c.c_canepisodios, p.p_nombre, e.e_nombre
    FROM contenido c
    JOIN paises p ON c.c_pais = p.p_id
    JOIN estado e ON c.c_estado = e.e_id
    WHERE c.c_pais = v_pais AND c.c_estado = v_estado AND c.c_tipo = v_tipo;
END //
DELIMITER ;

CALL sp_filtrar_contenido_avanzado(3, 1, 1);


  /* 2. Consulta reportes hechos por un usuario sobre contenidos de un país y de un tipo específico*/
  DELIMITER //
CREATE PROCEDURE sp_reportes_por_usuario(
    IN v_usuario INT,
    IN v_pais INT,
    IN v_tipo INT
)
BEGIN
    SELECT r.r_id, r.r_descripcion, c.c_titulo, p.p_nombre
    FROM reportes r
    JOIN contenido c ON r.c_id = c.c_id
    JOIN paises p ON c.c_pais = p.p_id
    WHERE r.u_id = v_usuario AND c.c_pais = v_pais AND c.c_tipo = v_tipo;
END //
DELIMITER ;

  CALL sp_reportes_por_usuario(10, 2, 2);
  
   /* 3. Muestra biblioteca por usuario, estado de la lectura y país del contenido*/
   
   DELIMITER //
CREATE PROCEDURE sp_biblioteca_filtrada(
    IN v_usuario INT,
    IN v_estado ENUM('favorito','leyendo','finalizado'),
    IN v_pais INT
)
BEGIN
    SELECT b.b_id, c.c_titulo, b.b_estado, p.p_nombre
    FROM biblioteca b
    JOIN contenido c ON b.c_id = c.c_id
    JOIN paises p ON c.c_pais = p.p_id
    WHERE b.u_id = v_usuario AND b.b_estado = v_estado AND c.c_pais = v_pais;
END //
DELIMITER ;

CALL sp_biblioteca_filtrada(7, 'leyendo', 1);
   
   
   
  /* 4. Busca contenido según palabras en el título, género y estado.*/
   DELIMITER //
CREATE PROCEDURE sp_buscar_contenido_titulo_genero_estado(
    IN v_palabra VARCHAR(100),
    IN v_genero_id INT,
    IN v_estado_id INT
)
BEGIN
    SELECT DISTINCT c.c_id, c.c_titulo, c.c_descripcion, e.e_nombre, g.g_nombre
    FROM contenido c
    JOIN estado e ON c.c_estado = e.e_id
    JOIN contenido_generos cg ON c.c_id = cg.c_id
    JOIN generos g ON cg.g_id = g.g_id
    WHERE c.c_titulo LIKE CONCAT('%', v_palabra, '%')
      AND cg.g_id = v_genero_id
      AND c.c_estado = v_estado_id;
END //
DELIMITER ;

   CALL sp_buscar_contenido_titulo_genero_estado('slayer', 6, 1);
   
     /* 5. Filtra mangas por mínimo de páginas, número de capítulo y país del contenido..*/
     
     DELIMITER //
CREATE PROCEDURE sp_listar_manga_por_paginas_y_capitulo(
    IN v_min_paginas INT,
    IN v_capitulo INT,
    IN v_pais INT
)
BEGIN
    SELECT m.m_id, c.c_titulo, m.m_capitulo, m.m_numeropag, p.p_nombre
    FROM manga m
    JOIN contenido c ON m.c_id = c.c_id
    JOIN paises p ON c.c_pais = p.p_id
    WHERE m.m_numeropag >= v_min_paginas
      AND m.m_capitulo = v_capitulo
      AND c.c_pais = v_pais;
END //
DELIMITER ;

CALL sp_listar_manga_por_paginas_y_capitulo(20, 3, 3);


       /* 6. Muestra los contenidos más agregados en bibliotecas por estado, país y tipo.*/
       DELIMITER //
CREATE PROCEDURE sp_contenido_popular_por_biblioteca(
    IN v_estado ENUM('favorito','leyendo','finalizado'),
    IN v_pais INT,
    IN v_tipo INT
)
BEGIN
    SELECT c.c_id, c.c_titulo, COUNT(b.b_id) AS veces_guardado, p.p_nombre
    FROM biblioteca b
    JOIN contenido c ON b.c_id = c.c_id
    JOIN paises p ON c.c_pais = p.p_id
    WHERE b.b_estado = v_estado
      AND c.c_pais = v_pais
      AND c.c_tipo = v_tipo
    GROUP BY c.c_id, c.c_titulo, p.p_nombre
    ORDER BY veces_guardado DESC;
END //
DELIMITER ;

CALL sp_contenido_popular_por_biblioteca('favorito', 1, 1);

       
         /* 7. Busca reportes según rango de fechas, motivo y país del contenido.*/
         DELIMITER //
CREATE PROCEDURE sp_reporte_contenido_por_fecha_motivo(
    IN v_fecha_ini DATE,
    IN v_fecha_fin DATE,
    IN v_motivo INT,
    IN v_pais INT
)
BEGIN
    SELECT r.r_id, c.c_titulo, r.r_descripcion, r.r_fecha_creacion, p.p_nombre
    FROM reportes r
    JOIN contenido c ON r.c_id = c.c_id
    JOIN paises p ON c.c_pais = p.p_id
    WHERE r.r_fecha_creacion BETWEEN v_fecha_ini AND v_fecha_fin
      AND r.motivo_r = v_motivo
      AND c.c_pais = v_pais;
END //
DELIMITER ;

CALL sp_reporte_contenido_por_fecha_motivo('2025-06-01', '2025-06-30', 1, 3);

           /* 8. Filtra contenido según estado, tipo y número mínimo de capítulos.*/
           DELIMITER //
CREATE PROCEDURE sp_contenido_estado_y_capitulos(
    IN v_estado INT,
    IN v_tipo INT,
    IN v_min_capitulos INT
)
BEGIN
    SELECT c.c_id, c.c_titulo, c.c_canepisodios, e.e_nombre, t.tipo_nombre
    FROM contenido c
    JOIN estado e ON c.c_estado = e.e_id
    JOIN (
        SELECT 1 AS tipo_id, 'Anime' AS tipo_nombre
        UNION ALL
        SELECT 2, 'Manga'
        UNION ALL
        SELECT 3, 'Novela'
    ) AS t ON c.c_tipo = t.tipo_id
    WHERE c.c_estado = v_estado
      AND c.c_tipo = v_tipo
      AND c.c_canepisodios >= v_min_capitulos;
END //
DELIMITER ;
           
           CALL sp_contenido_estado_y_capitulos(2, 2, 100);


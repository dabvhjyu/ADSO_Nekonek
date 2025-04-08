<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Sitio Web</title>
    <link rel="stylesheet" href="../../headeri.css">
    <link rel="stylesheet" href="../../style/sobrenosotros.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="header reader-header" id="reader-header">
        <div class="container">
            <div class="left-section">
                <div class="header-actions">
                    <a href="principal.html">
                        <img src="../../logo p.png" alt="Logo de la empresa" class="logo">
                    </a>
                </div>
                <nav class="nav-menu">
                    <ul>
                        <li><a href="principal.html">Inicio</a></li>
                        <li><a href="foro.html">Foro</a></li>
                        <li><a href="biblioteca.html">Biblioteca</a></li>
                        <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
                    </ul>
                </nav>
            </div>
            <div class="right-section">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Buscar...">
                    <button class="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <div class="user-options">
                    <div class="bookmark-icon" id="reader-bookmark-icon">
                        <i class="fas fa-bookmark"></i>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="#">Series que sigo</a></li>
                                <li><a href="#">Autores que sigo</a></li>
                                <li><a href="#">Grupos que sigo</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Perfil de Lector -->
                    <div class="user-profile" id="editor-profile">
                        <img src="/placeholder.svg?height=40&width=40" alt="Avatar" class="avatar">
                        <div class="profile-dropdown">
                            <ul>
                                <li><a href="../../lector/perfillector.html"><i class="fas fa-user"></i> Ver perfil</a></li>
                                <li><a href="#"><i class="fas fa-cog"></i> Configurar</a></li>
                                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>


    <section class="sobre-nosotros">
        <div class="contenedor">
          <h1 class="titulo">Sobre Nosotros</h1>
          <div class="separador"></div>
          
          <div class="mision-vision">
            <div class="tarjeta">
              <h2>Nuestra Misión</h2>
              <p>Transformar ideas en soluciones innovadoras que impulsen el éxito de nuestros clientes, manteniendo siempre los más altos estándares de calidad y servicio.</p>
            </div>
            <div class="tarjeta">
              <h2>Nuestra Visión</h2>
              <p>Ser líderes reconocidos en la industria, creando un impacto positivo en la sociedad a través de la tecnología y la innovación constante.</p>
            </div>
          </div>
      
          <div class="equipo">
            <h2>Nuestro Equipo</h2>
            <div class="miembros">
              <div class="miembro">
                <img src="img/o1.png" alt="Diego Castillo" class="foto">
                <h3>Diego Castillo</h3>
                <p>Co-Fundador & CEO</p>
              </div>
              <div class="miembro">
                <img src="img/o2.jpeg" alt="Carolina Blanco" class="foto">
                <h3>Carolina Blanco</h3>
                <p>Co-Fundadora & COO</p>
              </div>
            </div>
          </div>
      
          <div class="historia">
            <h2>Nuestra Historia</h2>
            <p>Fundada en 2010, nuestra empresa nació de la pasión por la innovación y el deseo de marcar la diferencia. A lo largo de los años, hemos crecido de ser una pequeña startup a convertirnos en líderes de la industria, siempre manteniendo nuestro compromiso con la excelencia y la satisfacción del cliente.</p>
          </div>
      
          <div class="contacto">
            <h2>Contáctanos</h2>
            <form id="formulario-contacto">
              <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
              <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>
              <textarea id="mensaje" name="mensaje" placeholder="Mensaje" required></textarea>
              <button type="submit">Enviar Mensaje</button>
            </form>
          </div>
        </div>
      </section>
      
      
    


    <footer class="footer">
        <div class="footer-content">
            <div class="footer-links">
                <div class="footer-row">
                    <a href="#" class="footer-link">Preguntas Frecuentes</a>
                    <a href="#" class="footer-link">Política de Privacidad</a>
                    <a href="#" class="footer-link">Términos de Uso</a>
                    <a href="#" class="footer-link">Contáctanos</a>
                </div>
            </div>
            <div class="footer-info">
                <div class="footer-company">
                    NekoNek Entertainment S.L.
                </div>
                <div class="footer-copyright">
                    © 2025-2025 nekonek.com Todos los Derechos Reservados
                </div>
                <div class="footer-contact">
                    Horario de Atención: Lunes a Viernes 9:30 — 19:00 | Teléfono: 3224461311| Email: jyu@nekonek.com
                </div>
                <div class="footer-legal">
                    Licencia de Publicación Digital: NKWEB-2024-001
                </div>
            </div>
        </div>
    </footer>


    <script src="../../headeri.js"></script>
    <script src="../../js/sobrenosotros.js"></script>
   
</body>
</html>
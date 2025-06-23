<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - NekoNek</title>
    <link rel="stylesheet" href="../../headeri.css">
    <link rel="stylesheet" href="../../style/biblioteca.css">
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

    <div class="page-wrapper">
        <main class="biblioteca-container">
            <h1>Biblioteca de Series</h1>

            <!-- Sección de ordenamiento -->
            <div class="ordenamiento">
                <label for="orden">Ordenar por:</label>
                <select id="orden" class="orden-select">
                    <option value="alfabetico">Alfabético</option>
                    <option value="reciente">Más reciente</option>
                    <option value="popular">Más popular</option>
                </select>
            </div>

            <!-- Filtros seleccionados -->
            <div class="filtros-seleccionados"></div>

            <!-- Sección de filtros -->
            <div class="filtros-section">
                <div class="filtro-grupo">
                    <span class="filtro-label">Género:</span>
                    <div class="filtro-opciones" id="filtro-genero">
                        <!-- Los géneros se agregarán dinámicamente aquí -->
                    </div>
                </div>
                <div class="filtro-grupo">
                    <span class="filtro-label">Estado:</span>
                    <div class="filtro-opciones" id="filtro-estado">
                        <button class="filtro-btn" data-filter="terminado">Terminado</button>
                        <button class="filtro-btn" data-filter="en-emision">En emisión</button>
                        <button class="filtro-btn" data-filter="nuevo">Nuevo</button>
                    </div>
                </div>
            </div>

            <!-- Grid de series -->
            <div class="series-grid" id="series-grid">
                <!-- Las series se agregarán dinámicamente aquí -->
            </div>

            <!-- Paginación -->
            <div class="paginacion" id="paginacion"></div>
        </main>
    </div>

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
    <script src="../../js/biblioteca.js"></script>
</body>
</html>


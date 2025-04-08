<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Lector | Nekonek</title>
    <link rel="stylesheet" href="../headeri.css">
    <link rel="stylesheet" href="../style/perfillector.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="logged-in">

    <!-- Header (simulado para referencia) -->
    <header class="header reader-header" id="reader-header">
        <div class="container">
            <div class="left-section">
                <div class="header-actions">
                    <a href="principal.html">
                        <img src="../logo p.png" alt="Logo de la empresa" class="logo">
                    </a>
                </div>
                <nav class="nav-menu">
                    <ul>
                        <li><a href="paginas/principal.html">Inicio</a></li>
              
                        <li><a href="paginas/biblioteca.html">Biblioteca</a></li>
                        <li><a href="paginas/sobrenosotros.html">Nosotros</a></li>
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
                                <li><a href="../lector/perfillector.html"><i class="fas fa-user"></i> Ver perfil</a></li>
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


    <div class="profile-container">
        <!-- Banner y foto de perfil -->
        <div class="profile-banner">
            <img src="/placeholder.svg?height=250&width=1200" alt="Banner de perfil" class="banner-img" id="bannerImg">
            <button class="edit-button" id="editButton">Editar Perfil</button>
            <div class="profile-picture-container">
                <img src="/placeholder.svg?height=112&width=112" alt="Foto de perfil" class="profile-picture"
                    id="profileImg">
            </div>
        </div>

        <!-- Información del usuario -->
        <div class="user-info">
            <h1 class="username" id="username">Usuario</h1>
            <p class="user-bio" id="userBio">Biografía del usuario</p>

            <div class="user-stats">
                <div class="stat">
                    <span class="stat-number" id="publicationsCount">0</span>
                    <span>publicaciones</span>
                </div>
                <div class="stat">
                    <span class="stat-number" id="followingCount">0</span>
                    <span>seguidos</span>
                </div>
                <div class="stat">
                    <span class="stat-number" id="followersCount">0</span>
                    <span>seguidores</span>
                </div>
                <div class="stat">
                    <span class="stat-number" id="likesCount">0</span>
                    <span>Me gusta</span>
                </div>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="main-content">
            <!-- Columna izquierda -->
            <div class="left-content">
                <div class="tabs">
                    <div class="tab active" data-tab="publications">Publicaciones</div>
                    <div class="tab" data-tab="comments">Comentarios</div>
                    <div class="tab" data-tab="favorites">Favoritos</div>
                </div>

                <!-- Contenido de las pestañas -->
                <div id="publicationsTab" class="tab-content active">
                    <div class="no-content" id="noPublications">
                        <img src="/placeholder.svg?height=100&width=100" alt="No hay contenido">
                        <p>Aún no has publicado ningún contenido</p>
                    </div>
                    <div class="publications-grid" id="publicationsGrid"></div>
                </div>

                <div id="commentsTab" class="tab-content">
                    <div class="no-content" id="noComments">
                        <img src="/placeholder.svg?height=100&width=100" alt="No hay comentarios">
                        <p>Aún no has realizado ningún comentario</p>
                    </div>
                    <div class="comments-list" id="commentsList"></div>
                </div>

                <div id="favoritesTab" class="tab-content">
                    <div class="no-content" id="noFavorites">
                        <img src="/placeholder.svg?height=100&width=100" alt="No hay favoritos">
                        <p>Aún no has marcado ningún favorito</p>
                    </div>
                    <div class="favorites-grid" id="favoritesGrid"></div>
                </div>
            </div>

            <!-- Columna derecha -->
            <div class="right-content">
                <!-- Sección de Chromas -->
                <div class="sidebar-section">
                    <div class="section-title">
                        <span>Chromas</span>
                        <span class="info-icon" title="Estadísticas de interacción">ⓘ</span>
                    </div>
                    <div class="chromas-stats">
                        <div class="chroma-item">
                            <div class="chroma-icon views-icon"><i class="fas fa-eye"></i></div>
                            <div class="chroma-value" id="viewsCount">0</div>
                            <div class="chroma-label">Visitas de publicaciones</div>
                        </div>
                        <div class="chroma-item">
                            <div class="chroma-icon likes-icon"><i class="fas fa-heart"></i></div>
                            <div class="chroma-value" id="totalLikesCount">0</div>
                            <div class="chroma-label">Me gusta de publicaciones</div>
                        </div>
                    </div>
                    <button class="enter-button" id="chromasButton">Ver detalles</button>
                </div>

                <!-- Centro de logros -->
                <div class="sidebar-section">
                    <div class="achievement-center" id="achievementCenter">
                        <div class="achievement-header">
                            <div class="achievement-icon"><i class="fas fa-trophy"></i></div>
                            <span>Centro de logros</span>
                        </div>
                        <span class="arrow-icon"><i class="fas fa-chevron-right"></i></span>
                    </div>
                    <div class="achievement-preview" id="achievementPreview">
                        <div class="achievement-item">
                            <div class="achievement-badge unlocked">
                                <i class="fas fa-book-reader"></i>
                            </div>
                            <div class="achievement-info">
                                <span class="achievement-name">Lector Novato</span>
                                <div class="achievement-progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="achievement-item">
                            <div class="achievement-badge locked">
                                <i class="fas fa-comment"></i>
                            </div>
                            <div class="achievement-info">
                                <span class="achievement-name">Comentarista</span>
                                <div class="achievement-progress">
                                    <div class="progress-bar" style="width: 30%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información personal -->
                <div class="sidebar-section">
                    <div class="section-title">
                        <span>Información personal</span>
                    </div>
                    <div class="personal-info-item">
                        <span class="info-icon"><i class="fas fa-id-card"></i></span>
                        <span id="nekonekId">Nekonek ID: 134660574</span>
                    </div>
                    <div class="personal-info-item">
                        <span class="info-icon"><i class="fas fa-calendar-alt"></i></span>
                        <span id="memberSince">Miembro desde: Marzo 2023</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar perfil -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Editar perfil</h2>
                <button class="close-button" id="closeModalBtn"><i class="fas fa-times"></i></button>
            </div>

            <div class="modal-tabs">
                <div class="modal-tab active" data-tab="images">Imágenes</div>
                <div class="modal-tab" data-tab="info">Información</div>
            </div>

            <div class="modal-body">
                <!-- Pestaña de imágenes -->
                <div class="modal-tab-content active" id="imagesTab">
                    <div class="image-options">
                        <div class="image-option active" data-option="profile">
                            <div>Foto de perfil</div>
                        </div>
                        <div class="image-option" data-option="banner">
                            <div>Imagen de fondo</div>
                        </div>
                    </div>

                    <div class="image-preview" id="profilePreview">
                        <img src="/placeholder.svg?height=100&width=100" alt="Vista previa de perfil"
                            class="preview-profile" id="previewProfileImg">
                    </div>

                    <div class="image-preview" id="bannerPreview" style="display: none;">
                        <img src="/placeholder.svg?height=150&width=400" alt="Vista previa de banner"
                            class="preview-banner" id="previewBannerImg">
                    </div>

                    <label class="upload-button" for="imageUpload">
                        <i class="fas fa-upload"></i> Seleccionar imagen
                    </label>
                    <input type="file" id="imageUpload" class="file-input" accept="image/*">
                </div>

                <!-- Pestaña de información -->
                <div class="modal-tab-content" id="infoTab">
                    <div class="form-group">
                        <label for="usernameInput">Nombre de usuario</label>
                        <input type="text" id="usernameInput" class="form-input" placeholder="Tu nombre de usuario">
                    </div>

                    <div class="form-group">
                        <label for="bioInput">Biografía</label>
                        <textarea id="bioInput" class="form-input" placeholder="Cuéntanos sobre ti"></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="cancel-button" id="cancelButton">Cancelar</button>
                <button class="save-button" id="saveButton">Guardar cambios</button>
            </div>
        </div>
    </div>

    <!-- Modal para logros -->
    <div class="modal" id="achievementsModal">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h2 class="modal-title">Centro de logros</h2>
                <button class="close-button" id="closeAchievementsBtn"><i class="fas fa-times"></i></button>
            </div>

            <div class="modal-body">
                <div class="achievements-stats">
                    <div class="achievement-stat">
                        <div class="stat-value" id="achievementsCompleted">2</div>
                        <div class="stat-label">Completados</div>
                    </div>
                    <div class="achievement-stat">
                        <div class="stat-value" id="achievementsTotal">10</div>
                        <div class="stat-label">Total</div>
                    </div>
                    <div class="achievement-stat">
                        <div class="stat-value" id="achievementsPercentage">20%</div>
                        <div class="stat-label">Completado</div>
                    </div>
                </div>

                <div class="achievements-grid" id="achievementsGrid">
                    <!-- Los logros se cargarán dinámicamente -->
                </div>
            </div>
        </div>
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

    <script src="../headeri.js"></script>
    <script src="../js/perfillector.js"></script>

</body>

</html>
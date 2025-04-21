@extends('layouts.app')
@section('content')



    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil de Administrador | Nekonek</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/administrador.css') }}">

    </head>

    <body class="logged-in">
        <main class="admin-profile-container">
            <!-- Banner y foto de perfil -->




            <div class="profile-container">
                <!-- Banner y foto de perfil -->
                <!-- Banner y foto de perfil -->
                <div class="profile-banner">
                    <img src="/placeholder.svg?height=250&width=1200" alt="Banner de perfil" class="banner-img"
                        id="bannerImg">
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

                    <!-- Rol de editor (visible solo para editores) -->
                    <div class="editor-role" id="editorRoleContainer">
                        <span class="role-badge" id="roleBadge">Editor</span>
                        <span class="group-name" id="groupName">Grupo Manga</span>
                    </div>


                    <!-- Contenido principal -->
                    <div class="main-content">
                        <div class="sidebar">
                            <nav class="admin-nav">
                                <ul>
                                    <li><a href="#dashboard" class="active">Panel de Control</a></li>
                                    <li><a href="#user-management">Gestión de Usuarios</a></li>
                                    <li><a href="#content-reports">Reportes de Contenido</a></li>
                                    <li><a href="#groups-series">Grupos y Series</a></li>
                                    <li><a href="#action-history">Historial de Acciones</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="content-area">
                            <!-- Panel de Control -->
                            <section id="dashboard" class="admin-section active">
                                <h2>Panel de Control</h2>
                                <div class="stats-container">
                                    <div class="stat-card" id="totalUsersCard">
                                        <i class="fas fa-users"></i>
                                        <h3>Total de Usuarios</h3>
                                        <p id="totalUsers">0</p>
                                    </div>
                                    <div class="stat-card" id="totalReportsCard">
                                        <i class="fas fa-flag"></i>
                                        <h3>Reportes Pendientes</h3>
                                        <p id="totalReports">0</p>
                                    </div>
                                    <div class="stat-card" id="totalGroupsSeriesCard">
                                        <i class="fas fa-book"></i>
                                        <h3>Grupos y Series</h3>
                                        <p id="totalGroupsSeries">0</p>
                                    </div>
                                </div>
                            </section>

                            <!-- Gestión de Usuarios -->
                            <section id="user-management" class="admin-section">
                                <h2>Gestión de Usuarios</h2>
                                <div class="search-filter">
                                    <input type="text" placeholder="Buscar usuario...">
                                    <select>
                                        <option value="">Todos los estados</option>
                                        <option value="active">Activo</option>
                                        <option value="suspended">Suspendido</option>
                                    </select>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userTableBody"></tbody>
                                </table>
                            </section>

                            <!-- Reportes de Contenido -->
                            <section id="content-reports" class="admin-section">
                                <h2>Reportes de Contenido</h2>
                                <div class="search-filter">
                                    <input type="text" placeholder="Buscar reporte...">
                                    <select>
                                        <option value="">Todos los estados</option>
                                        <option value="pending">Pendiente</option>
                                        <option value="resolved">Resuelto</option>
                                    </select>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Contenido</th>
                                            <th>Reportado por</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="reportTableBody"></tbody>
                                </table>
                            </section>

                            <!-- Grupos y Series -->
                            <section id="groups-series" class="admin-section">
                                <h2>Grupos y Series</h2>
                                <div class="search-filter">
                                    <input type="text" placeholder="Buscar grupo o serie...">
                                    <select>
                                        <option value="">Todos los tipos</option>
                                        <option value="group">Grupo</option>
                                        <option value="series">Serie</option>
                                    </select>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Creador</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="groupSeriesTableBody"></tbody>
                                </table>
                            </section>

                            <!-- Historial de Acciones -->
                            <section id="action-history" class="admin-section">
                                <h2>Historial de Acciones</h2>
                                <div class="search-filter">
                                    <input type="text" placeholder="Buscar acción...">
                                    <input type="date">
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Administrador</th>
                                            <th>Acción</th>
                                            <th>Detalles</th>
                                        </tr>
                                    </thead>
                                    <tbody id="actionHistoryTableBody"></tbody>
                                </table>
                            </section>
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
                                    <input type="text" id="usernameInput" class="form-input"
                                        placeholder="Tu nombre de usuario">
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

                <script src="{{ asset('js/administrador.js') }}"></script>


        </main>

    </body>

@endsection
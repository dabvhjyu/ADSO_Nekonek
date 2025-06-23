@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestión de Usuarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color:rgb(98, 47, 116);
            --secondary-color: #a29bfe;
            --accent-color: #fd79a8;
            --success-color: #00b894;
            --danger-color: #d63031;
            --warning-color: #fdcb6e;
            --info-color: #0984e3;
            --dark-color: #2d3436;
            --light-color: #f5f6fa;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .admin-container {
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .admin-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            background-color: #fff;
            border: none;
        }

        .admin-card-header {
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }

        .admin-card-title {
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 5px;
            font-size: 1.5rem;
        }

        .admin-card-description {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .admin-btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .admin-btn-primary:hover {
            background-color:rgb(192, 73, 180);
            border-color:rgb(123, 48, 115);
        }

        .admin-table {
            margin-bottom: 0;
        }

        .admin-table th {
            font-weight: 600;
            color: var(--dark-color);
            border-bottom-width: 1px;
        }

        .admin-badge {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.35em 0.65em;
        }

        .admin-badge-role-admin {
            background-color: var(--primary-color);
            color: white;
        }

        .admin-badge-role-editor {
            background-color: var(--info-color);
            color: white;
        }

        .admin-badge-role-usuario {
            background-color: var(--secondary-color);
            color: white;
        }

        .admin-badge-status-activo {
            background-color: var(--success-color);
            color: white;
        }

        .admin-badge-status-inactivo {
            background-color: #6c757d;
            color: white;
        }

        .admin-badge-status-suspendido {
            background-color: var(--danger-color);
            color: white;
        }

        .admin-action-btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        .admin-action-btn i {
            margin-right: 3px;
        }

        .admin-search-box {
            position: relative;
        }

        .admin-search-box i {
            position: absolute;
            left: 10px;
            top: 10px;
            color: #6c757d;
        }

        .admin-search-input {
            padding-left: 30px;
        }

        .admin-filter-container {
            display: flex;
            gap: 10px;
        }

        .admin-modal-header {
            background-color: var(--light-color);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .admin-modal-title {
            font-weight: 600;
            color: var(--dark-color);
        }

        .admin-form-label {
            font-weight: 500;
            color: var(--dark-color);
        }

        .admin-tag {
            display: inline-block;
            background-color: var(--light-color);
            color: var(--dark-color);
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            margin-right: 5px;
            margin-bottom: 5px;
            font-size: 0.75rem;
        }

        .admin-pagination {
            margin-bottom: 0;
        }

        .admin-pagination .page-link {
            color: var(--primary-color);
        }

        .admin-pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .admin-filter-container {
                flex-direction: column;
            }
            
            .admin-action-btn {
                padding: 0.25rem 0.4rem;
                font-size: 0.7rem;
            }
            
            .admin-card-header {
                padding: 15px;
            }
            
            .admin-table th, .admin-table td {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-card card">
            <div class="admin-card-header">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="admin-card-title">Administración de Usuarios</h2>
                        <p class="admin-card-description">Gestiona los usuarios registrados en NekoNek</p>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <button type="button" class="btn btn-primary admin-btn-primary" data-bs-toggle="modal" data-bs-target="#crearUsuarioModal">
                            <i class="fas fa-plus"></i> Nuevo Usuario
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Filtros y búsqueda -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="admin-search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" id="searchInput" class="form-control admin-search-input" placeholder="Buscar usuarios...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="admin-filter-container justify-content-md-end">
                            <select id="rolFilter" class="form-select" style="width: auto;">
                                <option value="todos">Todos los roles</option>
                                <option value="admin">Administrador</option>
                                <option value="editor">Editor</option>
                                <option value="usuario">Usuario</option>
                            </select>
                            <select id="statusFilter" class="form-select" style="width: auto;">
                                <option value="todos">Todos los estados</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="suspendido">Suspendido</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tabla de usuarios -->
                <div class="table-responsive">
                    <table class="table admin-table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Username</th>
                                <th class="d-none d-md-table-cell">Email</th>
                                <th class="d-none d-md-table-cell">Fecha Registro</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="usuariosTableBody">
                            <!-- Aquí se cargarán los usuarios desde PHP -->
                        </tbody>
                    </table>
                </div>

                <!-- Mensaje de no resultados -->
                <div id="noResultsMessage" class="text-center py-4 d-none">
                    <p class="text-muted">No se encontraron usuarios</p>
                </div>

                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-4">
                    <!-- Aquí se cargará la paginación desde PHP -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Crear Usuario -->
    <div class="modal fade" id="crearUsuarioModal" tabindex="-1" aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header admin-modal-header">
                    <h5 class="modal-title admin-modal-title" id="crearUsuarioModalLabel">Crear Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="crearUsuarioForm" method="POST" action="">
                        <!-- CSRF Token aquí -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label admin-form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label admin-form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label admin-form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label admin-form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="rol" class="form-label admin-form-label">Rol</label>
                            <select class="form-select" id="rol" name="rol" required>
                                <option value="admin">Administrador</option>
                                <option value="editor">Editor</option>
                                <option value="usuario" selected>Usuario</option>
                            </select>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary admin-btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Usuario -->
    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header admin-modal-header">
                    <h5 class="modal-title admin-modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editarUsuarioForm" method="POST" action="">
                        <!-- CSRF Token y método PUT aquí -->
                        <input type="hidden" id="editUsuarioId" name="id">
                        <div class="mb-3">
                            <label for="editNombre" class="form-label admin-form-label">Nombre</label>
                            <input type="text" class="form-control" id="editNombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label admin-form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editUsername" class="form-label admin-form-label">Username</label>
                            <input type="text" class="form-control" id="editUsername" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPassword" class="form-label admin-form-label">Contraseña (dejar en blanco para mantener)</label>
                            <input type="password" class="form-control" id="editPassword" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="editRol" class="form-label admin-form-label">Rol</label>
                            <select class="form-select" id="editRol" name="rol" required>
                                <option value="admin">Administrador</option>
                                <option value="editor">Editor</option>
                                <option value="usuario">Usuario</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editEstado" class="form-label admin-form-label">Estado</label>
                            <select class="form-select" id="editEstado" name="estado" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="suspendido">Suspendido</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editPreferencias" class="form-label admin-form-label">Preferencias</label>
                            <input type="text" class="form-control" id="editPreferencias" name="preferencias">
                            <small class="form-text text-muted">Separa las preferencias con comas</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary admin-btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ver Usuario -->
    <div class="modal fade" id="verUsuarioModal" tabindex="-1" aria-labelledby="verUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header admin-modal-header">
                    <h5 class="modal-title admin-modal-title" id="verUsuarioModalLabel">Detalles del Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-4 text-end fw-bold">ID:</div>
                        <div class="col-8" id="verUsuarioId"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-end fw-bold">Nombre:</div>
                        <div class="col-8" id="verUsuarioNombre"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-end fw-bold">Email:</div>
                        <div class="col-8" id="verUsuarioEmail"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-end fw-bold">Username:</div>
                        <div class="col-8" id="verUsuarioUsername"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-end fw-bold">Fecha de registro:</div>
                        <div class="col-8" id="verUsuarioFechaRegistro"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-end fw-bold">Rol:</div>
                        <div class="col-8" id="verUsuarioRol"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-end fw-bold">Estado:</div>
                        <div class="col-8" id="verUsuarioEstado"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-end fw-bold">Último acceso:</div>
                        <div class="col-8" id="verUsuarioUltimoAcceso"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-end fw-bold">Preferencias:</div>
                        <div class="col-8" id="verUsuarioPreferencias"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar Usuario -->
    <div class="modal fade" id="eliminarUsuarioModal" tabindex="-1" aria-labelledby="eliminarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header admin-modal-header">
                    <h5 class="modal-title admin-modal-title" id="eliminarUsuarioModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar a este usuario? Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="eliminarUsuarioForm" method="POST" action="">
                        <!-- CSRF Token y método DELETE aquí -->
                        <input type="hidden" id="eliminarUsuarioId" name="id">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Función para abrir el modal de edición y cargar datos
        function abrirModalEditar(id) {
            // Aquí puedes hacer una petición AJAX para obtener los datos del usuario
            // o simplemente usar los datos que ya tienes en la página
            
            // Ejemplo de cómo configurar la URL del formulario con el ID
            document.getElementById('editarUsuarioForm').action = '/admin/usuarios/' + id;
            document.getElementById('editUsuarioId').value = id;
            
            // Abrir el modal
            var modal = new bootstrap.Modal(document.getElementById('editarUsuarioModal'));
            modal.show();
        }
        
        // Función para abrir el modal de ver detalles
        function abrirModalVer(id) {
            // Aquí puedes hacer una petición AJAX para obtener los datos del usuario
            // o simplemente usar los datos que ya tienes en la página
            
            // Abrir el modal
            var modal = new bootstrap.Modal(document.getElementById('verUsuarioModal'));
            modal.show();
        }
        
        // Función para abrir el modal de eliminar
        function abrirModalEliminar(id) {
            // Configurar la URL del formulario con el ID
            document.getElementById('eliminarUsuarioForm').action = '/admin/usuarios/' + id;
            document.getElementById('eliminarUsuarioId').value = id;
            
            // Abrir el modal
            var modal = new bootstrap.Modal(document.getElementById('eliminarUsuarioModal'));
            modal.show();
        }
        
        // Función para filtrar usuarios en la tabla
        function filtrarUsuarios() {
            var input = document.getElementById('searchInput');
            var filter = input.value.toUpperCase();
            var rolFiltro = document.getElementById('rolFilter').value;
            var estadoFiltro = document.getElementById('statusFilter').value;
            var tabla = document.getElementById('usuariosTableBody');
            var filas = tabla.getElementsByTagName('tr');
            var resultados = 0;
            
            for (var i = 0; i < filas.length; i++) {
                var mostrar = true;
                var celdaNombre = filas[i].getElementsByTagName('td')[0];
                var celdaUsername = filas[i].getElementsByTagName('td')[1];
                var celdaEmail = filas[i].getElementsByTagName('td')[2];
                var celdaRol = filas[i].getElementsByTagName('td')[4];
                var celdaEstado = filas[i].getElementsByTagName('td')[5];
                
                if (celdaNombre && celdaUsername && celdaEmail) {
                    var textNombre = celdaNombre.textContent || celdaNombre.innerText;
                    var textUsername = celdaUsername.textContent || celdaUsername.innerText;
                    var textEmail = celdaEmail.textContent || celdaEmail.innerText;
                    var textRol = celdaRol.textContent || celdaRol.innerText;
                    var textEstado = celdaEstado.textContent || celdaEstado.innerText;
                    
                    // Filtro de texto
                    if (filter) {
                        if (
                            textNombre.toUpperCase().indexOf(filter) === -1 &&
                            textUsername.toUpperCase().indexOf(filter) === -1 &&
                            textEmail.toUpperCase().indexOf(filter) === -1
                        ) {
                            mostrar = false;
                        }
                    }
                    
                    // Filtro de rol
                    if (rolFiltro !== 'todos' && textRol.trim().toUpperCase() !== rolFiltro.toUpperCase()) {
                        mostrar = false;
                    }
                    
                    // Filtro de estado
                    if (estadoFiltro !== 'todos' && textEstado.trim().toUpperCase() !== estadoFiltro.toUpperCase()) {
                        mostrar = false;
                    }
                    
                    if (mostrar) {
                        filas[i].style.display = "";
                        resultados++;
                    } else {
                        filas[i].style.display = "none";
                    }
                }
            }
            
            // Mostrar mensaje de no resultados si es necesario
            var noResultsMessage = document.getElementById('noResultsMessage');
            if (resultados === 0) {
                noResultsMessage.classList.remove('d-none');
            } else {
                noResultsMessage.classList.add('d-none');
            }
        }
        
        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Event listener para el campo de búsqueda
            document.getElementById('searchInput').addEventListener('keyup', filtrarUsuarios);
            
            // Event listeners para los filtros
            document.getElementById('rolFilter').addEventListener('change', filtrarUsuarios);
            document.getElementById('statusFilter').addEventListener('change', filtrarUsuarios);
            
            // Event listeners para los botones de acción (se agregarán dinámicamente)
            document.querySelectorAll('.btn-ver').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    abrirModalVer(this.getAttribute('data-id'));
                });
            });
            
            document.querySelectorAll('.btn-editar').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    abrirModalEditar(this.getAttribute('data-id'));
                });
            });
            
            document.querySelectorAll('.btn-eliminar').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    abrirModalEliminar(this.getAttribute('data-id'));
                });
            });
        });
    </script>


    <script src="{{ asset('js/administrador.js') }}"></script>

    </body>

    



    

@endsection
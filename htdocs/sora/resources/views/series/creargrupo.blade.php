
@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Grupo de Contenido</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0f061a;
            --secondary-color:rgb(72, 14, 103);
            --accent-color: #fd79a8;
            --success-color: #00b894;
            --danger-color: #d63031;
            --warning-color: #fdcb6e;
            --info-color:rgb(54, 6, 56);
            --dark-color: #2d3436;
            --light-color: #f5f6fa;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .grupo-container {
            padding: 20px;
            max-width: 900px;
            margin: 20px auto;
        }

        .grupo-card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border: none;
            overflow: hidden;
        }

        .grupo-card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .grupo-card-title {
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 1.5rem;
        }

        .grupo-card-description {
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .grupo-form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
        }

        .grupo-form-text {
            color: #6c757d;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .grupo-btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 20px;
            font-weight: 600;
        }

        .grupo-btn-primary:hover {
            background-color: #5649c0;
            border-color: #5649c0;
        }

        .grupo-btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 10px 20px;
            font-weight: 600;
        }

        .grupo-section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e9ecef;
        }

        .grupo-member-card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f8f9fa;
            position: relative;
        }

        .grupo-member-number {
            position: absolute;
            top: -10px;
            left: 15px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .grupo-tag-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
        }

        .grupo-tag {
            background-color: var(--light-color);
            color: var(--dark-color);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
        }

        .grupo-tag i {
            margin-right: 5px;
            color: var(--primary-color);
        }

        .grupo-avatar-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            overflow: hidden;
            border: 3px solid var(--light-color);
        }

        .grupo-avatar-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .grupo-avatar-preview i {
            font-size: 2rem;
            color: #6c757d;
        }

        .grupo-form-footer {
            background-color: #f8f9fa;
            padding: 20px;
            border-top: 1px solid #e9ecef;
            text-align: right;
        }

        .grupo-error {
            color: var(--danger-color);
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }

        .grupo-success-icon {
            color: var(--success-color);
            display: none;
        }

        .is-valid .grupo-success-icon {
            display: inline-block;
        }

        .is-invalid .grupo-error {
            display: block;
        }

        .grupo-member-search {
            position: relative;
        }

        .grupo-member-search i {
            position: absolute;
            left: 10px;
            top: 10px;
            color: #6c757d;
        }

        .grupo-search-input {
            padding-left: 30px;
        }

        .grupo-search-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: white;
            border: 1px solid #e9ecef;
            border-radius: 0 0 8px 8px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }

        .grupo-search-item {
            padding: 10px;
            border-bottom: 1px solid #e9ecef;
            cursor: pointer;
        }

        .grupo-search-item:hover {
            background-color: #f8f9fa;
        }

        .grupo-search-item:last-child {
            border-bottom: none;
        }

        .grupo-member-info {
            display: none;
            margin-top: 15px;
        }

        .grupo-member-info.active {
            display: flex;
            align-items: center;
        }

        .grupo-member-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            overflow: hidden;
        }

        .grupo-member-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .grupo-member-details {
            flex: 1;
        }

        .grupo-member-name {
            font-weight: 600;
            margin-bottom: 2px;
        }

        .grupo-member-username {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .grupo-remove-member {
            color: var(--danger-color);
            cursor: pointer;
            margin-left: 10px;
        }

        @media (max-width: 768px) {
            .grupo-container {
                padding: 10px;
            }
            
            .grupo-card-header {
                padding: 15px;
            }
            
            .grupo-form-footer {
                padding: 15px;
                text-align: center;
            }
            
            .grupo-btn-primary, .grupo-btn-secondary {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="grupo-container">
        <div class="grupo-card card">
            <div class="grupo-card-header">
                <h2 class="grupo-card-title">Crear Nuevo Grupo</h2>
                <p class="grupo-card-description">Forma un equipo de 3 miembros para crear contenido de anime y manga</p>
            </div>
            <div class="card-body p-4">
                <form id="crearGrupoForm" method="POST" action="" enctype="multipart/form-data">
                    <!-- CSRF Token aquí -->
                    
                    <!-- Información básica del grupo -->
                    <div class="mb-4">
                        <h3 class="grupo-section-title">
                            <i class="fas fa-users me-2"></i> Información del Grupo
                        </h3>
                        
                        <div class="text-center mb-4">
                            <div class="grupo-avatar-preview" id="avatarPreview">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="mb-3">
                                <label for="grupoAvatar" class="form-label grupo-form-label">Avatar del Grupo</label>
                                <input class="form-control" type="file" id="grupoAvatar" name="avatar" accept="image/*" onchange="previewAvatar(this)">
                                <div class="grupo-form-text">Imagen que representará a tu grupo (opcional)</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="grupoNombre" class="form-label grupo-form-label">Nombre del Grupo *</label>
                            <input type="text" class="form-control" id="grupoNombre" name="nombre" required>
                            <div class="grupo-error" id="nombreError">El nombre del grupo es obligatorio</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="grupoDescripcion" class="form-label grupo-form-label">Descripción</label>
                            <textarea class="form-control" id="grupoDescripcion" name="descripcion" rows="3"></textarea>
                            <div class="grupo-form-text">Describe brevemente el propósito y enfoque de tu grupo</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="grupoCategoria" class="form-label grupo-form-label">Categoría Principal *</label>
                            <select class="form-select" id="grupoCategoria" name="categoria" required>
                                <option value="">Selecciona una categoría</option>
                                <option value="anime">Anime</option>
                                <option value="manga">Manga</option>
                                <option value="ambos">Ambos</option>
                            </select>
                            <div class="grupo-error" id="categoriaError">Debes seleccionar una categoría</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="grupoEtiquetas" class="form-label grupo-form-label">Etiquetas</label>
                            <input type="text" class="form-control" id="grupoEtiquetas" name="etiquetas" placeholder="Ej: shonen, mecha, slice of life">
                            <div class="grupo-form-text">Separa las etiquetas con comas</div>
                            
                            <div class="grupo-tag-container" id="etiquetasPreview">
                                <!-- Las etiquetas se mostrarán aquí -->
                            </div>
                        </div>
                    </div>
                    
                    <!-- Miembros del grupo -->
                    <div class="mb-4">
                        <h3 class="grupo-section-title">
                            <i class="fas fa-user-friends me-2"></i> Miembros del Grupo
                        </h3>
                        <div class="grupo-form-text mb-3">Se requieren exactamente 3 miembros para crear un grupo, incluyéndote a ti.</div>
                        
                        <!-- Miembro 1 (Tú) -->
                        <div class="grupo-member-card">
                            <div class="grupo-member-number">1</div>
                            <div class="mb-3">
                                <label class="form-label grupo-form-label">Tú (Líder del Grupo)</label>
                                <input type="text" class="form-control" id="miembroLider" name="miembro_lider" value="Tu Nekonek ID" readonly>
                                <div class="grupo-form-text">Como creador, automáticamente eres el líder del grupo</div>
                            </div>
                        </div>
                        
                        <!-- Miembro 2 -->
                        <div class="grupo-member-card">
                            <div class="grupo-member-number">2</div>
                            <div class="mb-3">
                                <label for="miembro2Id" class="form-label grupo-form-label">Miembro 2 (Nekonek ID) *</label>
                                <div class="grupo-member-search">
                                    <i class="fas fa-search"></i>
                                    <input type="text" class="form-control grupo-search-input" id="miembro2Search" placeholder="Buscar por nombre o ID">
                                    <input type="hidden" id="miembro2Id" name="miembro_2_id" required>
                                    <div class="grupo-search-results" id="searchResults2">
                                        <!-- Resultados de búsqueda -->
                                    </div>
                                </div>
                                <div class="grupo-error" id="miembro2Error">Debes seleccionar un miembro válido</div>
                                
                                <div class="grupo-member-info" id="miembro2Info">
                                    <div class="grupo-member-avatar">
                                        <img src="/placeholder.svg?height=40&width=40" alt="Avatar">
                                    </div>
                                    <div class="grupo-member-details">
                                        <div class="grupo-member-name" id="miembro2Nombre">Nombre del Miembro</div>
                                        <div class="grupo-member-username" id="miembro2Username">@username</div>
                                    </div>
                                    <div class="grupo-remove-member" onclick="removerMiembro(2)">
                                        <i class="fas fa-times-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Miembro 3 -->
                        <div class="grupo-member-card">
                            <div class="grupo-member-number">3</div>
                            <div class="mb-3">
                                <label for="miembro3Id" class="form-label grupo-form-label">Miembro 3 (Nekonek ID) *</label>
                                <div class="grupo-member-search">
                                    <i class="fas fa-search"></i>
                                    <input type="text" class="form-control grupo-search-input" id="miembro3Search" placeholder="Buscar por nombre o ID">
                                    <input type="hidden" id="miembro3Id" name="miembro_3_id" required>
                                    <div class="grupo-search-results" id="searchResults3">
                                        <!-- Resultados de búsqueda -->
                                    </div>
                                </div>
                                <div class="grupo-error" id="miembro3Error">Debes seleccionar un miembro válido</div>
                                
                                <div class="grupo-member-info" id="miembro3Info">
                                    <div class="grupo-member-avatar">
                                        <img src="/placeholder.svg?height=40&width=40" alt="Avatar">
                                    </div>
                                    <div class="grupo-member-details">
                                        <div class="grupo-member-name" id="miembro3Nombre">Nombre del Miembro</div>
                                        <div class="grupo-member-username" id="miembro3Username">@username</div>
                                    </div>
                                    <div class="grupo-remove-member" onclick="removerMiembro(3)">
                                        <i class="fas fa-times-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Configuración adicional -->
                    <div class="mb-4">
                        <h3 class="grupo-section-title">
                            <i class="fas fa-cog me-2"></i> Configuración Adicional
                        </h3>
                        
                        <div class="mb-3">
                            <label for="grupoVisibilidad" class="form-label grupo-form-label">Visibilidad del Grupo</label>
                            <select class="form-select" id="grupoVisibilidad" name="visibilidad">
                                <option value="publico">Público - Visible para todos</option>
                                <option value="privado">Privado - Solo visible para miembros</option>
                            </select>
                            <div class="grupo-form-text">Determina quién puede ver el contenido de tu grupo</div>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="grupoColaboracion" name="colaboracion" value="1">
                            <label class="form-check-label" for="grupoColaboracion">Permitir colaboraciones externas</label>
                            <div class="grupo-form-text">Permite que otros usuarios puedan proponer colaboraciones con tu grupo</div>
                        </div>
                    </div>
                    
                    <div class="grupo-form-footer">
                        <button type="button" class="btn btn-secondary grupo-btn-secondary me-2" onclick="window.history.back()">Cancelar</button>
                        <button type="submit" class="btn btn-primary grupo-btn-primary">Crear Grupo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Función para previsualizar el avatar del grupo
        function previewAvatar(input) {
            const preview = document.getElementById('avatarPreview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Avatar Preview">`;
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.innerHTML = `<i class="fas fa-users"></i>`;
            }
        }
        
        // Función para mostrar etiquetas
        document.getElementById('grupoEtiquetas').addEventListener('input', function() {
            const etiquetasInput = this.value;
            const etiquetasArray = etiquetasInput.split(',').map(tag => tag.trim()).filter(tag => tag !== '');
            const etiquetasPreview = document.getElementById('etiquetasPreview');
            
            etiquetasPreview.innerHTML = '';
            
            etiquetasArray.forEach(tag => {
                if (tag) {
                    const tagElement = document.createElement('span');
                    tagElement.className = 'grupo-tag';
                    tagElement.innerHTML = `<i class="fas fa-tag"></i> ${tag}`;
                    etiquetasPreview.appendChild(tagElement);
                }
            });
        });
        
        // Simulación de búsqueda de miembros
        function setupMemberSearch(searchInputId, resultsId, memberIdInput, infoContainer, nombreElement, usernameElement) {
            const searchInput = document.getElementById(searchInputId);
            const searchResults = document.getElementById(resultsId);
            
            // Mostrar resultados al escribir
            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                
                if (query.length < 2) {
                    searchResults.style.display = 'none';
                    return;
                }
                
                // Simulación de resultados (en un caso real, esto sería una llamada AJAX)
                searchResults.innerHTML = '';
                searchResults.style.display = 'block';
                
                // Ejemplo de resultados (reemplazar con datos reales)
                const exampleResults = [
                    { id: 'NK001', nombre: 'Takashi Yamamoto', username: 'takashi_otaku', avatar: '/placeholder.svg?height=40&width=40' },
                    { id: 'NK002', nombre: 'Sakura Miyazaki', username: 'sakura_chan', avatar: '/placeholder.svg?height=40&width=40' },
                    { id: 'NK003', nombre: 'Kenji Nakamura', username: 'kenji_sama', avatar: '/placeholder.svg?height=40&width=40' }
                ];
                
                // Filtrar resultados basados en la consulta
                const filteredResults = exampleResults.filter(user => 
                    user.nombre.toLowerCase().includes(query.toLowerCase()) || 
                    user.id.toLowerCase().includes(query.toLowerCase()) ||
                    user.username.toLowerCase().includes(query.toLowerCase())
                );
                
                if (filteredResults.length === 0) {
                    searchResults.innerHTML = '<div class="p-3 text-center text-muted">No se encontraron usuarios</div>';
                    return;
                }
                
                // Mostrar resultados
                filteredResults.forEach(user => {
                    const resultItem = document.createElement('div');
                    resultItem.className = 'grupo-search-item';
                    resultItem.innerHTML = `
                        <div class="d-flex align-items-center">
                            <div class="grupo-member-avatar me-2">
                                <img src="${user.avatar}" alt="${user.nombre}">
                            </div>
                            <div>
                                <div class="fw-bold">${user.nombre}</div>
                                <div class="small text-muted">@${user.username} (${user.id})</div>
                            </div>
                        </div>
                    `;
                    
                    // Al hacer clic en un resultado
                    resultItem.addEventListener('click', function() {
                        // Establecer el ID del miembro
                        document.getElementById(memberIdInput).value = user.id;
                        
                        // Actualizar la información visible
                        document.getElementById(nombreElement).textContent = user.nombre;
                        document.getElementById(usernameElement).textContent = `@${user.username} (${user.id})`;
                        
                        // Mostrar la información del miembro
                        document.getElementById(infoContainer).classList.add('active');
                        
                        // Limpiar y ocultar resultados
                        searchInput.value = '';
                        searchResults.style.display = 'none';
                        
                        // Validar el campo
                        validarMiembro(memberIdInput);
                    });
                    
                    searchResults.appendChild(resultItem);
                });
            });
            
            // Ocultar resultados al hacer clic fuera
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                    searchResults.style.display = 'none';
                }
            });
        }
        
        // Configurar búsqueda para miembros 2 y 3
        setupMemberSearch('miembro2Search', 'searchResults2', 'miembro2Id', 'miembro2Info', 'miembro2Nombre', 'miembro2Username');
        setupMemberSearch('miembro3Search', 'searchResults3', 'miembro3Id', 'miembro3Info', 'miembro3Nombre', 'miembro3Username');
        
        // Función para remover un miembro
        function removerMiembro(numero) {
            document.getElementById(`miembro${numero}Id`).value = '';
            document.getElementById(`miembro${numero}Info`).classList.remove('active');
        }
        
        // Validación de formulario
        document.getElementById('crearGrupoForm').addEventListener('submit', function(e) {
            let formValido = true;
            
            // Validar nombre del grupo
            const nombreGrupo = document.getElementById('grupoNombre').value.trim();
            if (!nombreGrupo) {
                document.getElementById('nombreError').style.display = 'block';
                formValido = false;
            } else {
                document.getElementById('nombreError').style.display = 'none';
            }
            
            // Validar categoría
            const categoria = document.getElementById('grupoCategoria').value;
            if (!categoria) {
                document.getElementById('categoriaError').style.display = 'block';
                formValido = false;
            } else {
                document.getElementById('categoriaError').style.display = 'none';
            }
            
            // Validar miembro 2
            if (!validarMiembro('miembro2Id')) {
                formValido = false;
            }
            
            // Validar miembro 3
            if (!validarMiembro('miembro3Id')) {
                formValido = false;
            }
            
            // Validar que los miembros sean diferentes
            const miembro2 = document.getElementById('miembro2Id').value;
            const miembro3 = document.getElementById('miembro3Id').value;
            
            if (miembro2 && miembro3 && miembro2 === miembro3) {
                document.getElementById('miembro3Error').textContent = 'Los miembros deben ser diferentes';
                document.getElementById('miembro3Error').style.display = 'block';
                formValido = false;
            }
            
            if (!formValido) {
                e.preventDefault();
            }
        });
        
        // Función para validar un miembro
        function validarMiembro(inputId) {
            const valor = document.getElementById(inputId).value.trim();
            const numero = inputId.replace('miembro', '').replace('Id', '');
            const errorElement = document.getElementById(`miembro${numero}Error`);
            
            if (!valor) {
                errorElement.textContent = 'Debes seleccionar un miembro válido';
                errorElement.style.display = 'block';
                return false;
            } else {
                errorElement.style.display = 'none';
                return true;
            }
        }
    </script>
</body>
@endsection
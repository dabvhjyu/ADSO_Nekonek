@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Manga</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/grupo.css') }}">
</head>

<body>
    <div class="container py-5">
        <!-- Profile Header -->
        <div class="profile-header text-center mb-5">
            <!-- Profile Image -->
            <div class="profile-image-container mx-auto position-relative mb-3">
                <div class="profile-image" id="profileImageContainer">
                    <span class="profile-placeholder">Foto de perfil</span>
                </div>
                <label for="profile-upload" class="upload-icon">
                    <i class="bi bi-upload"></i>
                    <input id="profile-upload" type="file" accept="image/*" class="d-none">
                </label>
            </div>

            <!-- Profile Info -->
            <h1 class="profile-name">Los piratas buenos</h1>
            <p class="profile-subtitle">tururu ruru turu</p>
            <div class="d-flex justify-content-center align-items-center gap-2 mb-3">
                <span class="badge editor-badge">Editor</span>
                <span class="group-label">Grupo</span>
            </div>

            <!-- Stats -->
            <div class="row justify-content-center stats-container mb-4">
                <div class="col-3 col-md-2 text-center">
                    <div class="stat-value">0</div>
                    <div class="stat-label">publicaciones</div>
                </div>
                <div class="col-3 col-md-2 text-center">
                    <div class="stat-value">0</div>
                    <div class="stat-label">seguidos</div>
                </div>
                <div class="col-3 col-md-2 text-center">
                    <div class="stat-value">0</div>
                    <div class="stat-label">seguidores</div>
                </div>
                <div class="col-3 col-md-2 text-center">
                    <div class="stat-value">0</div>
                    <div class="stat-label">Me gusta</div>
                </div>
            </div>

            <!-- Upload Button -->
            <button class="btn upload-btn" id="uploadSeriesBtn">
                <i class="bi bi-upload me-2"></i>Subir Series
            </button>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs custom-tabs mb-4" id="profileTabs">
            <li class="nav-item">
                <a class="nav-link active" id="series-tab" data-bs-toggle="tab" href="#series">Series</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="miembros-tab" data-bs-toggle="tab" href="#miembros">Miembros del Grupo</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Series Tab -->
            <div class="tab-pane fade show active" id="series" role="tabpanel" aria-labelledby="series-tab">
                <div class="no-content text-center py-5">
                    <h1 class="mb-3">Series</h1>

                    <!-- Contenedor de la tabla con sombra -->
                    <div class="table-container w-100">
                        <table class="table table-dark table-borderless">
                            <thead style="background-color: #2f0c58; color: white;">
                                <tr>
                                    <th scope="col">Título</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Miniatura</th>
                                    <th scope="col">Última Actualización</th>
                                    <th scope="col">Acciones Para El Editor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($serie as $series)
                                <tr>
                                    <td>{{ $series->titulo }}</td>
                                    <td>{{ Str::limit($series->descripcion, 50) }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$series->miniatura_vertical) }}" class="img-thumbnail" style="height: 120px">
                                    </td>
                                    <td>{{ date('d/m/Y H:i', strtotime($series->ultima_actualizacion)) }}</td>
                                    <td class="text-center" class="d-flex">
                                        <!-- Botón Editar -->
                                        <a class="btn btn-editar me-2" href="{{ route('neko.edit', ) }}" >
                                            <i class="fas fa-edit me-1"></i>Editar
                                        </a>

                                        <!-- Botón Eliminar -->
                                        <a href="#" class="btn btn-eliminar">
                                            <i class="fas fa-trash-alt me-1"></i>Eliminar
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Miembros del Grupo Tab -->
            <div class="tab-pane fade" id="miembros" role="tabpanel" aria-labelledby="miembros-tab">
                <div class="no-content text-center py-5">
                    <h1 class="mb-3">Miembros del Grupo</h1>

                    <!-- Contenedor de la tabla con sombra -->
                    <div class="table-container w-100">
                        <table class="table table-dark table-borderless">
                            <thead style="background-color: #2f0c58; color: white;">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>miauricio</td>
                                    <td>Editor</td>
                                    <td class="text-center align-middle" background-color:rgb(255, 255, 255);">
                                        <!-- Botón Editar -->
                                        <a class="btn btn-editar me-2">
                                            <i class="fas fa-edit me-1"></i>Editar
                                        </a>

                                        <!-- Botón Eliminar -->
                                        <a href="#" class="btn btn-eliminar">
                                            <i class="fas fa-trash-alt me-1"></i>Eliminar
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/grupo.js') }}"></script>
</body>

</html>

@endsection
@extends('layouts.app')
@section('content')

<head>

    <title>Subir Series y Episodios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/subir.css') }}">
</head>

<body>
    <main class="container py-4" id="series-upload-container">


        <!-- Navegación por pestañas con Bootstrap -->
        <ul class="nav nav-tabs mb-4" id="uploadTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active tab-btn" id="series-tab" data-bs-toggle="tab" data-bs-target="#series"
                    type="button" role="tab" data-tab="series">Series</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link disabled tab-btn" id="episodes-tab" data-bs-toggle="tab"
                    data-bs-target="#episodes" type="button" role="tab" data-tab="episodes">Episodios</button>
            </li>
        </ul>

        <!-- Contenido de las pestañas -->
        <div class="tab-content">
            <!-- Sección de Series -->
            <div class="tab-pane fade show active" id="series" role="tabpanel" aria-labelledby="series-tab">

                <div class="d-flex gap-3 mb-4">
                    <button id="create-series-btn" class="btn btn-primary active">Crear Serie</button>
                    <button id="existing-series-btn" class="btn btn-outline-primary">Serie Existente</button>
                </div>

                <!-- Formulario para crear serie -->
                <form method="post" action="{{ route('neko.store') }}" id="create-series-form" class="card shadow p-4 mb-4 border-0 rounded-3">
                    @csrf
                    <div class="row g-4">
                        <div >
                            <div class="mb-4">
                                <h5 class="fw-semibold mb-3 border-bottom pb-2 text-purple">
                                    Miniatura Cuadrada
                                    <i class="bi bi-crop text-muted"
                                        data-bs-toggle="tooltip"
                                        title="Dimensión requerida: 1080x1080 px"></i>
                                </h5>

                                <div class="upload-container position-relative">
                                    <div class="upload-area border border-2 border-dashed rounded-3 p-4 text-center bg-light-hover shadow-sm purple-hover"
                                        style="min-height: 150px; max-width: 250px; aspect-ratio: 1/1;">

                                        <div class="upload-preview d-none">
                                            <img src="{{ asset('images/placeholder.svg') }}"
                                                alt="Vista previa cuadrada"
                                                class="img-fluid rounded-2 shadow-sm"
                                                style="max-height: 250px;">
                                        </div>

                                        <div class="upload-placeholder h-100 d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <div class="upload-icon bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm"
                                                    style="width: 70px; height: 70px;">
                                                    <i class="bi bi-image fs-3 text-purple"></i>
                                                </div>
                                                <p class="mb-0 text-muted">
                                                    <span class="d-block fw-medium">Subir imagen cuadrada</span>
                                                    <span class="d-block small">1080x1080 px requerido</span>
                                                </p>
                                            </div>
                                        </div>

                                        <input type="file"
                                            class="form-control visually-hidden"
                                            id="square-thumbnail-input"
                                            name="miniatura_cuadrada"
                                            accept="image/jpeg, image/png"
                                            required>
                                    </div>

                                    <div class="mt-2">
                                        <p class="small text-muted mb-1">
                                            Formatos: JPG/PNG | Tamaño máximo: 900 KB | Relación 1:1
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 mt-5"> <!-- Espaciado adicional -->
                            <h5 class="fw-semibold mb-3 border-bottom pb-2 text-purple">
                                Miniatura Vertical
                                <i class="bi bi-arrows-vertical text-muted"
                                    data-bs-toggle="tooltip"
                                    title="Dimensión requerida: 1080x1920 px | Relación 9:16"></i>
                            </h5>

                            <div class="upload-container position-relative">
                                <div class="upload-area border border-2 border-dashed rounded-3 p-4 text-center bg-light-hover shadow-sm purple-hover"
                                    style="min-height: 240px; max-width: 240px; aspect-ratio: 9/16;"> <!-- Ajuste proporcional -->

                                    <div class="upload-preview d-none">
                                        <img src="{{ asset('images/placeholder.svg') }}"
                                            alt="Vista previa vertical"
                                            class="img-fluid rounded-2 shadow-sm"
                                            style="max-height: 500px; object-fit: cover;">
                                    </div>

                                    <div class="upload-placeholder h-100 d-flex align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="upload-icon bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm"
                                                style="width: 70px; height: 70px;">
                                                <i class="bi bi-phone fs-3 text-purple"></i> <!-- Icono específico -->
                                            </div>
                                            <p class="mb-0 text-muted">
                                                <span class="d-block fw-medium">Subir imagen vertical</span>
                                                <span class="d-block small">1080x1920 px requerido</span>
                                                <span class="d-block small mt-1">Relación 9:16</span>
                                            </p>
                                        </div>
                                    </div>

                                    <input type="file"
                                        class="form-control visually-hidden"
                                        id="vertical-thumbnail-input"
                                        name="miniatura_vertical"
                                        accept="image/jpeg, image/png"
                                        required>
                                </div>

                                <div class="mt-2">
                                    <p class="small text-muted mb-1">
                                        Formatos: JPG/PNG | Tamaño máximo: 900 KB | Relación 9:16
                                    </p>
                                </div>
                                
                            </div>
                        </div>






                            <div class="mb-3">
                                <label for="genre1" class="form-label fw-semibold">Géneros 1</label>
                                <select id="genre1" name="genero_1_id" class="form-select shadow-sm" required>
                                    <option value="">Seleccionar</option>
                                    <option value="5">Aventura</option>
                                    <option value="6">Drama</option>
                                    <option value="4">Harem</option>
                                    <option value="8">Romance</option>
                                    <option value="3">Seinen</option>
                                    <option value="2">Shōjo</option>
                                    <option value="1">Shōnen</option>
                                    <option value="7">Terror</option>
                                </select>
                            </div>
                            @error('genero_1_id')
                            <div class="alert alert-danger shadow-sm border-start border-4 border-purple">{{ $message }}</div>
                            @enderror

                            

                            <div class="mb-3">
                                <label for="series-title" class="form-label fw-semibold">Título de la serie</label>
                                <input type="text" id="series-title" name="titulo" class="form-control shadow-sm"
                                    placeholder="Menos de 50 caracteres" maxlength="50" required>
                                <div class="form-text">Ingresa el título principal de tu serie</div>
                            </div>
                            @error('titulo')
                            <div class="alert alert-danger shadow-sm border-start border-4 border-purple">{{ $message }}</div>
                            @enderror


                            <!-- Agregar un campo para subtítulo que no estaba en el formulario original -->
                            <div class="mb-3">
                                <label for="series-subtitle" class="form-label fw-semibold">Subtítulo de la
                                    serie</label>
                                <input type="text" id="series-subtitle" name="subtitulo" class="form-control shadow-sm"
                                    placeholder="Opcional - Menos de 100 caracteres" maxlength="100">
                                <div class="form-text">Puedes agregar un subtítulo descriptivo (opcional)</div>
                            </div>
                            <div class="mb-3">
                                    <label for="summary" class="form-label fw-semibold">Resumen</label>
                                    <textarea id="summary" name="descripcion" class="form-control shadow-sm" rows="6"

                                        placeholder="Menos de 50 caracteres" maxlength="50"
                                        required></textarea>
                                    <div class="form-text">Una breve descripción de tu serie para atraer a los lectores
                                    </div>
                                </div>
                            @error('subtitulo')
                            <div class="alert alert-danger shadow-sm border-start border-4 border-purple">{{ $message }}</div>
                            @enderror

                        </div>

                        












                        @error('descripcion')
                        <div class="alert alert-danger shadow-sm border-start border-4 border-purple">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" id="select-series-btn" class="btn btn-primary px-4 rounded-pill">
                            Crear serie <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </form>
                @if (session('success'))
                <div class="alert alert-success mt-4" role="alert">
                    {{ session('success') }}
                </div>
                @endif




                <!-- Formulario para serie existente -->
                <form id="existing-series-form" class="card p-4 mb-4 d-none">
                    <div class="mb-4">
                        <label for="search-series" class="form-label fw-semibold">Buscar Serie</label>
                        <div class="input-group">
                            <input type="text" id="search-series" class="form-control"
                                placeholder="Escribe para buscar series..." autocomplete="off">
                            <button type="button" id="search-btn" class="btn btn-outline-secondary">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>

                    <div id="search-results" class="search-results mb-4">
                        <!-- Los resultados de búsqueda se mostrarán aquí -->
                    </div>

                    <div id="selected-series-container" class="card border-primary mb-4 d-none">
                        <div class="card-header bg-primary bg-opacity-10">
                            <h5 class="mb-0 text-primary">Serie Seleccionada</h5>
                        </div>
                        <div class="card-body" id="selected-series">
                            <!-- La serie seleccionada se mostrará aquí -->
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="button" id="select-series-btn" class="btn btn-primary px-4" disabled>
                            Continuar <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sección de Episodios -->
        <div class="tab-pane fade" id="episodes" role="tabpanel" aria-labelledby="episodes-tab">
            <div class="text-center mb-4">
                <h2>Selecciona el tipo de contenido</h2>
                <div class="d-flex justify-content-center gap-3 mt-3">
                    <button class="btn btn-outline-primary btn-lg content-type-btn" data-type="novela">Novela</button>
                    <button class="btn btn-outline-primary btn-lg content-type-btn" data-type="dibujo">Dibujo</button>
                    <button class="btn btn-outline-primary btn-lg content-type-btn"
                        data-type="animacion">Animación</button>
                </div>
            </div>

            <form id="episode-form" class="card p-4 d-none">
                <div class="border-bottom pb-3 mb-4">
                    <h5 class="series-title-display">Título de la serie: <span id="display-series-title"
                            class="fw-normal">Mi Serie</span></h5>
                </div>

                <div class="row g-4">
                    <div class="col-md-3">
                        <h5>Imagen previa</h5>
                        <div class="upload-container">
                            <div class="upload-area episode-preview rounded border border-2 border-dashed p-3 text-center"
                                id="episode-preview">
                                <div class="upload-preview d-none">
                                    <img src="{{ asset('images/placeholder.svg') }}" alt="Placeholder"
                                        alt="Vista previa" id="episode-preview-img" class="img-fluid">
                                </div>
                                <div class="upload-placeholder">
                                    <div class="upload-icon bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                        style="width: 40px; height: 40px;">
                                        <i class="bi bi-upload"></i>
                                    </div>
                                    <p class="mb-0 small">Elige una imagen<br>o arrastra aquí</p>
                                </div>
                            </div>
                            <p class="form-text mt-2 small">Tamaño recomendado: 160x151 px. Máximo 500 kb.</p>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="episode-number" class="form-label fw-semibold">Número</label>
                                <input type="number" id="episode-number" class="form-control" value="1" min="1"
                                    required>
                            </div>
                            <div class="col-md-9">
                                <label for="episode-title" class="form-label fw-semibold">Título del
                                    episodio</label>
                                <input type="text" id="episode-title" class="form-control"
                                    placeholder="Menos de 60 caracteres" maxlength="60" required>
                            </div>

                        </div>

                        <div class="mb-3">
                            <h5>Subir archivo</h5>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex gap-2">
                                    <button type="button" id="choose-file-btn" class="btn btn-outline-primary">
                                        <i class="bi bi-file-earmark-plus me-2"></i>Elige un archivo
                                    </button>
                                    <button type="button" id="clear-file-btn" class="btn btn-outline-danger">
                                        <i class="bi bi-trash me-2"></i>Eliminar todo
                                    </button>
                                </div>
                                <div class="file-size-info badge bg-secondary">0MB / 20MB</div>
                            </div>
                            <div class="file-drop-area border border-2 border-dashed rounded p-4 text-center"
                                id="file-drop-area">
                                <div id="file-type-message" class="text-muted">Selecciona un tipo de contenido para
                                    subir archivos</div>
                                <div id="selected-files-container" class="text-start d-none">
                                    <h6 class="mb-2">Archivos seleccionados:</h6>
                                    <ul id="selected-files-list" class="list-group"></ul>
                                </div>
                            </div>
                            <input type="file" id="file-upload" class="d-none">
                        </div>
                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-header">
                        <h5 class="mb-0">Comentarios</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="comments" id="comments-enable"
                                value="enable" checked>
                            <label class="form-check-label" for="comments-enable">
                                Activar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="comments" id="comments-disable"
                                value="disable">
                            <label class="form-check-label" for="comments-disable">
                                Desactivar
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Episodios programados</h5>
                        <span class="badge bg-primary rounded-pill" id="scheduled-count">0</span>
                    </div>
                    <div class="card-body">
                        <h6>Publicar</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="publish-time" id="publish-now"
                                value="immediately" checked>
                            <label class="form-check-label" for="publish-now">
                                Inmediatamente
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="publish-time" id="publish-later"
                                value="later">
                            <label class="form-check-label" for="publish-later">
                                Programar para más tarde
                            </label>
                        </div>

                        <div id="schedule-options" class="mt-3 p-3 bg-light rounded d-none">
                            <div class="row align-items-center mb-2">
                                <div class="col-md-5">
                                    <input type="date" id="schedule-date" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" id="schedule-hour" class="form-control text-center" min="0"
                                            max="23" value="22">
                                        <span class="input-group-text">:</span>
                                        <input type="number" id="schedule-minute" class="form-control text-center"
                                            min="0" max="59" value="30">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-info-circle me-2" data-bs-toggle="tooltip"
                                            title="Zona horaria local"></i>
                                        <span>Zona horaria</span>
                                    </div>
                                </div>
                            </div>
                            <p class="form-text mb-0">El episodio se publicará en el horario programado.</p>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" id="back-to-content-btn" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Volver
                    </button>
                    <button type="button" id="publish-btn" class="btn btn-primary">
                        <i class="bi bi-cloud-upload me-2"></i>
                    </button>
                </div>
            </form>
            @if (session('success'))
            <div class="alert alert-success mt-4" role="alert">
                {{ session('success') }}
            </div>

            @endif

        </div>

    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/subir.js') }}"></script>
</body>


@endsection
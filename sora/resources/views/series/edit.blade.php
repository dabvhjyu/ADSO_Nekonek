@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Series - Subir Nueva Serie</title>
    <link rel="stylesheet" href="{{ asset('css/editar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <main>
        <div class="container">
            <div class="form-container">
                <h2 class="form-title">Editar {{ $serie->titulo }}</h2>

                {{-- Mensajes de error de validación --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="seriesForm" method="POST" action="{{ route('serie.update', $serie->seriecreada_id)}}"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="form-grid">
                        <!-- Columna izquierda - Imágenes -->
                        <div class="form-column">
                            <!-- Portada vertical -->
                            <div class="form-group">
                                <label for="miniatura_vertical">Portada (Imagen Vertical)</label>
                                <div class="image-upload-container" id="cover-container">
                                    @if($serie->miniatura_vertical)
                                        <img src="{{ asset('storage/' . $serie->miniatura_vertical) }}" alt="Portada actual"
                                            class="image-preview"
                                            style="max-height: 220px; display: block; margin-bottom: 10px;">
                                    @endif
                                    <div class="image-upload-placeholder" id="cover-placeholder">
                                        <i class="fas fa-image"></i>
                                        <p>Haz clic para subir la portada</p>
                                        <p class="size-hint">Recomendado: 9:16</p>
                                    </div>
                                    <img id="cover-preview" class="image-preview hidden" src="#"
                                        alt="Vista previa de portada">
                                    <button type="button" class="remove-image-btn hidden" id="remove-cover">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <input name="miniatura_vertical" type="file" id="miniatura_vertical"
                                        accept="image/*" class="hidden">
                                </div>
                            </div>

                            <!-- Miniatura cuadrada -->
                            <div class="form-group">
                                <label for="miniatura_cuadrada">Miniatura (Imagen Cuadrada)</label>
                                <div class="thumbnail-upload-container" id="thumbnail-container">
                                    @if($serie->miniatura_cuadrada)
                                        <img src="{{ asset('storage/' . $serie->miniatura_cuadrada) }}"
                                            alt="Miniatura actual" class="image-preview"
                                            style="max-height: 120px; display: block; margin-bottom: 10px;">
                                    @endif
                                    <div class="image-upload-placeholder" id="thumbnail-placeholder">
                                        <i class="fas fa-image"></i>
                                        <p>Miniatura</p>
                                        <p class="size-hint">200x200px</p>
                                    </div>
                                    <img id="thumbnail-preview" class="image-preview hidden" src="#"
                                        alt="Vista previa de miniatura">
                                    <button type="button" class="remove-image-btn hidden" id="remove-thumbnail">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <input name="miniatura_cuadrada" type="file" id="miniatura_cuadrada"
                                        accept="image/*" class="hidden">
                                </div>
                            </div>
                        </div>

                        <!-- Columna derecha - Información -->
                        <div class="form-column">
                            <!-- Título -->
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $serie->titulo) }}"
                                    placeholder="Ej: Solo Leveling" required>
                            </div>

                            <!-- Subtítulo -->
                            <div class="form-group">
                                <label for="subtitulo">Subtítulo</label>
                                <input type="text" id="subtitulo" name="subtitulo"
                                    value="{{ old('subtitulo', $serie->subtitulo) }}"
                                    placeholder="Ej: El monarca de las sombras">
                            </div>

                            <!-- Estado -->
                            <div class="form-group">
                                <label for="estado_id">Estado</label>
                                <select id="estado_id" name="estado_id" required>
                                    <option value="" disabled>Selecciona un estado</option>
                                    <option value="1" {{ old('estado_id', $serie->estado_id) == 1 ? 'selected' : '' }}>
                                        Nuevo</option>
                                    <option value="2" {{ old('estado_id', $serie->estado_id) == 2 ? 'selected' : '' }}>En
                                        emisión</option>
                                    <option value="3" {{ old('estado_id', $serie->estado_id) == 3 ? 'selected' : '' }}>
                                        Terminado</option>
                                    <option value="4" {{ old('estado_id', $serie->estado_id) == 4 ? 'selected' : '' }}>
                                        Pausado</option>
                                </select>
                            </div>

                            <!-- Géneros (multi-selección) -->
                            <div class="form-group">
                                <label for="genero_id">Género</label>
                                <div class="selected-genres" id="selected-genres"></div>
                                <input type="hidden" id="genero_id" name="genero_id"
                                    value="{{ old('genero_id', isset($serie->genero_id) ? $serie->genero_id : '') }}">
                                <div class="genres-grid" id="genres-grid">
                                    @php
                                        $generoSeleccionado = old('genero_id', isset($serie->genero_id) ? $serie->genero_id : '');
                                    @endphp
                                    <span class="genre-option {{ $generoSeleccionado == 1 ? 'selected' : '' }}"
                                        data-value="1">Acción</span>
                                    <span class="genre-option {{ $generoSeleccionado == 2 ? 'selected' : '' }}"
                                        data-value="2">Aventura</span>
                                    <span class="genre-option {{ $generoSeleccionado == 3 ? 'selected' : '' }}"
                                        data-value="3">Drama</span>
                                    <span class="genre-option {{ $generoSeleccionado == 4 ? 'selected' : '' }}"
                                        data-value="4">Harem</span>
                                    <span class="genre-option {{ $generoSeleccionado == 5 ? 'selected' : '' }}"
                                        data-value="5">Romance</span>
                                    <span class="genre-option {{ $generoSeleccionado == 6 ? 'selected' : '' }}"
                                        data-value="6">Seinen</span>
                                    <span class="genre-option {{ $generoSeleccionado == 7 ? 'selected' : '' }}"
                                        data-value="7">Shojo</span>
                                    <span class="genre-option {{ $generoSeleccionado == 8 ? 'selected' : '' }}"
                                        data-value="8">Shonen</span>
                                    <span class="genre-option {{ $generoSeleccionado == 9 ? 'selected' : '' }}"
                                        data-value="9">Terror</span>
                                </div>
                            </div>

                            <!-- Descripción -->
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" name="descripcion"
                                    placeholder="Escribe una descripción de la serie..."
                                    required>{{ old('descripcion', $serie->descripcion) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="form-buttons">
                        <a href="{{ route('serie.index') }}" class="btn btn-outline-secondary"
                            id="cancel-btn">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Serie</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    {{-- Script para selección de géneros --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const genresGrid = document.getElementById('genres-grid');
            const generoInput = document.getElementById('genero_id');
            const selectedGenresDiv = document.getElementById('selected-genres');

            function updateSelectedGenre() {
                let selected = genresGrid.querySelector('.genre-option.selected');
                generoInput.value = selected ? selected.dataset.value : '';
                // Mostrar el género seleccionado
                selectedGenresDiv.innerHTML = '';
                if (selected) {
                    let badge = document.createElement('span');
                    badge.className = 'badge bg-primary me-1';
                    badge.textContent = selected.textContent;
                    selectedGenresDiv.appendChild(badge);
                }
            }

            genresGrid.querySelectorAll('.genre-option').forEach(function (el) {
                el.addEventListener('click', function () {
                    // Quitar selección previa
                    genresGrid.querySelectorAll('.genre-option').forEach(function (el2) {
                        el2.classList.remove('selected');
                    });
                    // Seleccionar el actual
                    el.classList.add('selected');
                    updateSelectedGenre();
                });
            });

            // Inicializa el género seleccionado al cargar
            updateSelectedGenre();
        });
    </script>


    <script src="{{ asset('js/editar.js') }}"></script>
</body>

</html>

@endsection
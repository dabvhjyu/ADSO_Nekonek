<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Series - Subir Nueva Serie</title>
    <link rel="stylesheet" href="{{ asset('css/subir.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <main>
        <div class="container">
            <div class="form-container">
                <h2 class="form-title">Crear Serie</h2>
                
                <form id="seriesForm" method="POST" action="{{ route('serie.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-grid">
                        <!-- Columna izquierda - Imágenes -->
                        <div class="form-column">
                            <!-- Portada vertical -->
                            <div class="form-group">
                                <label for="miniatura_vertical">Portada (Imagen Vertical)</label>
                                <div class="image-upload-container" id="cover-container">
                                    <div class="image-upload-placeholder" id="cover-placeholder">
                                        <i class="fas fa-image"></i>
                                        <p>Haz clic para subir la portada</p>
                                        <p class="size-hint">Recomendado: 9:16</p>
                                    </div>
                                    <img id="cover-preview" class="image-preview hidden" src="#" alt="Vista previa de portada">
                                    <button type="button" class="remove-image-btn hidden" id="remove-cover">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <input name="miniatura_vertical" type="file" id="miniatura_vertical" accept="image/*" class="hidden">
                                </div>
                            </div>


                            <!-- Miniatura cuadrada -->
                            <div class="form-group">
                                <label for="miniatura_cuadrada">Miniatura (Imagen Cuadrada)</label>
                                <div class="thumbnail-upload-container" id="thumbnail-container">
                                    <div class="image-upload-placeholder" id="thumbnail-placeholder">
                                        <i class="fas fa-image"></i>
                                        <p>Miniatura</p>
                                        <p class="size-hint">200x200px</p>
                                    </div>
                                    <img id="thumbnail-preview" class="image-preview hidden" src="#" alt="Vista previa de miniatura">
                                    <button type="button" class="remove-image-btn hidden" id="remove-thumbnail">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <input name="miniatura_cuadrada" type="file" id="miniatura_cuadrada" accept="image/*" class="hidden">
                                </div>
                            </div>
                        </div>
                       
                        <!-- Columna derecha - Información -->
                        <div class="form-column">
                            <!-- Título -->
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" id="titulo" name="titulo" placeholder="Ej: Solo Leveling" required>
                            </div>
                            
                            <!-- Subtítulo -->
                            <div class="form-group">
                                <label for="subtitulo">Subtítulo</label>
                                <input type="text" id="subtitulo" name="subtitulo" placeholder="Ej: El monarca de las sombras">
                            </div>
                            
                            <!-- Estado -->
                            <div class="form-group">
                                <label for="estado_id">Estado</label>
                                <select id="estado_id" name="estado_id" required>
                                    <option value="" disabled selected>Selecciona un estado</option>
                                    <option value="1">Nuevo</option>
                                    <option value="2">En emisión</option>
                                    <option value="3">Terminado</option>
                                    <option value="4">Pausado</option>
                                </select>
                            </div>
                            
        
                            <!-- Género (cambiado de Géneros a Género) -->
                            <div class="form-group">
                                <label>Género</label>
                                <div class="selected-genres" id="selected-genres"></div>
                                <input type="hidden" id="generos_id" name="genero_id">
                                <div class="genres-grid" id="genres-grid">
                                    <span class="genre-option" data-value="1">Acción</span>
                                    <span class="genre-option" data-value="2">Aventura</span>
                                    <span class="genre-option" data-value="3">Drama</span>
                                    <span class="genre-option" data-value="4">Harem</span>
                                    <span class="genre-option" data-value="5">Romance</span>
                                    <span class="genre-option" data-value="6">Seinen</span>
                                    <span class="genre-option" data-value="7">Shojo</span>
                                    <span class="genre-option" data-value="8">Shonen</span>
                                    <span class="genre-option" data-value="9">Terror</span>
                                </div>
                            </div>
                            <!-- Descripción -->
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" name="descripcion" placeholder="Escribe una descripción de la serie..." required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="form-buttons">
                    <a href="{{ route('serie.index') }}" class="btn btn-outline" id="cancel-btn" >Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Serie</button>
                    </div>                    
                </form>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/subir.js') }}"></script>
</body>
</html>
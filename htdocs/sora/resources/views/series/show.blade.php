@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Serie | Nekonek</title>
    <link rel="stylesheet" href="{{ asset('css/serieshow.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <main class="main-content">
        <!-- Banner de la serie -->
        <div class="serie-banner">
            <div class="banner-overlay"></div>
            <img src="{{ asset('storage/' . $serie->miniatura_cuadrada) }}" alt="Banner de la serie" class="banner-img">
        </div>

        <!-- Información principal de la serie -->
        <div class="serie-info-container">
            <div class="serie-cover">
                <img src="{{ asset('storage/' . $serie->miniatura_vertical) }}"alt="Portada de la serie"
                    class="cover-img">
                <div class="serie-actions">
                    <button class="action-button follow-button">
                        <i class="fas fa-bookmark"></i> Seguir
                    </button>
                    <button class="action-button share-button">
                        <i class="fas fa-share-alt"></i> Compartir
                    </button>
                </div>
            </div>

            <div class="serie-details">
                <div class="serie-header">
                    <h1 class="serie-title">{{ $serie->titulo }}</h1>
                    <span class="serie-subtitle">{{ $serie->subtitulo }}</span>
                    <div class="serie-meta">
                        <span class="serie-status">{{ $serie->estado_id }}</span>
                        <span class="serie-genre">{{ $serie->genero_id }}</span>
                        <div class="serie-rating">
                            <i class="fas fa-star"></i>
                            <span>4.8</span>
                            <span class="rating-count">(1,245)</span>
                        </div>
                    </div>
                </div>

                <div class="serie-description">
                    <p>{{ $serie->descripcion }}</p>
                </div>

                <div class="serie-stats">
                    <div class="stat-item">
                        <i class="fas fa-eye"></i>
                        <span>1.2M</span>
                        <span class="stat-label">Vistas</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-bookmark"></i>
                        <span>45.6K</span>
                        <span class="stat-label">Seguidores</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-heart"></i>
                        <span>32.1K</span>
                        <span class="stat-label">Me gusta</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-list"></i>
                        <span>178</span>
                        <span class="stat-label">Capítulos</span>
                    </div>
                </div>

                <div class="serie-creator">
                    <div class="creator-info">
                        <img src="/placeholder.svg?height=50&width=50" alt="Avatar del creador" class="creator-avatar">
                        <div class="creator-details">
                            <span class="creator-name">Chugong</span>
                            <span class="creator-role">Autor</span>
                        </div>
                    </div>
                    <button class="follow-creator-button">
                        <i class="fas fa-user-plus"></i> Seguir
                    </button>
                </div>
            </div>
        </div>


        <!-- Secciones de contenido -->
        <div class="content-sections">
            <div class="section-tabs">
                <button class="section-tab active" data-section="lectura">
                    <i class="fas fa-book"></i> Lectura
                </button>
                <button class="section-tab" data-section="dibujo">
                    <i class="fas fa-paint-brush"></i> Dibujo
                </button>
                <button class="section-tab" data-section="animacion">
                    <i class="fas fa-film"></i> Animación
                </button>
            </div>

            <!-- Contenido de las secciones -->
            <div class="section-content">
                <!-- Sección de Lectura -->
                <div class="section-panel active" id="lectura-panel">
                    <div class="section-header">
                        <h2>Capítulos de Lectura</h2>
                        <div class="section-filters">
                            <select class="filter-select">
                                <option value="newest">Más recientes</option>
                                <option value="oldest">Más antiguos</option>
                                <option value="popular">Más populares</option>
                            </select>
                        </div>
                    </div>

                    <div class="chapters-list">
                        <div class="chapter-item">
                            <div class="chapter-info">
                                <span class="chapter-number">Capítulo 178</span>
                                <span class="chapter-title">El despertar final</span>
                                <span class="chapter-date">Hace 2 días</span>
                            </div>
                            <div class="chapter-stats">
                                <span class="chapter-views"><i class="fas fa-eye"></i> 45.2K</span>
                                <span class="chapter-likes"><i class="fas fa-heart"></i> 3.8K</span>
                            </div>
                        </div>

                        <div class="chapter-item">
                            <div class="chapter-info">
                                <span class="chapter-number">Capítulo 177</span>
                                <span class="chapter-title">La batalla contra el rey demonio</span>
                                <span class="chapter-date">Hace 1 semana</span>
                            </div>
                            <div class="chapter-stats">
                                <span class="chapter-views"><i class="fas fa-eye"></i> 67.5K</span>
                                <span class="chapter-likes"><i class="fas fa-heart"></i> 5.2K</span>
                            </div>
                        </div>

                        <div class="chapter-item">
                            <div class="chapter-info">
                                <span class="chapter-number">Capítulo 176</span>
                                <span class="chapter-title">El ejército de sombras</span>
                                <span class="chapter-date">Hace 2 semanas</span>
                            </div>
                            <div class="chapter-stats">
                                <span class="chapter-views"><i class="fas fa-eye"></i> 72.1K</span>
                                <span class="chapter-likes"><i class="fas fa-heart"></i> 6.3K</span>
                            </div>
                        </div>

                        <div class="load-more">
                            <button class="load-more-button">Cargar más capítulos</button>
                        </div>
                    </div>
                </div>

                <!-- Sección de Dibujo -->
                <div class="section-panel" id="dibujo-panel">
                    <div class="section-header">
                        <h2>Galería de Dibujos</h2>
                        <div class="section-filters">
                            <select class="filter-select">
                                <option value="newest">Más recientes</option>
                                <option value="popular">Más populares</option>
                            </select>
                        </div>
                    </div>

                    <div class="gallery-grid">
                        <div class="gallery-item">
                            <img src="/placeholder.svg?height=200&width=200" alt="Dibujo 1" class="gallery-img">
                            <div class="gallery-overlay">
                                <div class="gallery-title">Sung Jin-Woo</div>
                                <div class="gallery-stats">
                                    <span><i class="fas fa-eye"></i> 12.5K</span>
                                    <span><i class="fas fa-heart"></i> 2.3K</span>
                                </div>
                            </div>
                        </div>

                        <div class="gallery-item">
                            <img src="/placeholder.svg?height=200&width=200" alt="Dibujo 2" class="gallery-img">
                            <div class="gallery-overlay">
                                <div class="gallery-title">Ejército de sombras</div>
                                <div class="gallery-stats">
                                    <span><i class="fas fa-eye"></i> 9.8K</span>
                                    <span><i class="fas fa-heart"></i> 1.7K</span>
                                </div>
                            </div>
                        </div>

                        <div class="gallery-item">
                            <img src="/placeholder.svg?height=200&width=200" alt="Dibujo 3" class="gallery-img">
                            <div class="gallery-overlay">
                                <div class="gallery-title">Batalla final</div>
                                <div class="gallery-stats">
                                    <span><i class="fas fa-eye"></i> 15.2K</span>
                                    <span><i class="fas fa-heart"></i> 3.1K</span>
                                </div>
                            </div>
                        </div>

                        <div class="gallery-item">
                            <img src="/placeholder.svg?height=200&width=200" alt="Dibujo 4" class="gallery-img">
                            <div class="gallery-overlay">
                                <div class="gallery-title">Monarca de las sombras</div>
                                <div class="gallery-stats">
                                    <span><i class="fas fa-eye"></i> 18.7K</span>
                                    <span><i class="fas fa-heart"></i> 4.2K</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Sección de Animación -->
                <div class="section-panel" id="animacion-panel">
                    <div class="section-header">
                        <h2>Episodios de Animación</h2>
                        <div class="section-filters">
                            <select class="filter-select">
                                <option value="newest">Más recientes</option>
                                <option value="oldest">Más antiguos</option>
                                <option value="popular">Más populares</option>
                            </select>
                        </div>
                    </div>

                    <div class="episodes-grid">
                        <div class="episode-item">
                            <div class="episode-thumbnail">
                                <img src="/placeholder.svg?height=180&width=320" alt="Episodio 1" class="episode-img">
                                <div class="episode-duration">24:15</div>
                                <div class="episode-play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="episode-info">
                                <div class="episode-title">Episodio 1: El cazador más débil</div>
                                <div class="episode-stats">
                                    <span><i class="fas fa-eye"></i> 245.8K</span>
                                    <span><i class="fas fa-heart"></i> 32.1K</span>
                                </div>
                                <div class="episode-date">Publicado: 15 de enero, 2023</div>
                            </div>
                        </div>

                        <div class="episode-item">
                            <div class="episode-thumbnail">
                                <img src="/placeholder.svg?height=180&width=320" alt="Episodio 2" class="episode-img">
                                <div class="episode-duration">22:45</div>
                                <div class="episode-play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="episode-info">
                                <div class="episode-title">Episodio 2: La mazmorra doble</div>
                                <div class="episode-stats">
                                    <span><i class="fas fa-eye"></i> 198.3K</span>
                                    <span><i class="fas fa-heart"></i> 27.5K</span>
                                </div>
                                <div class="episode-date">Publicado: 22 de enero, 2023</div>
                            </div>
                        </div>

                        <div class="episode-item">
                            <div class="episode-thumbnail">
                                <img src="/placeholder.svg?height=180&width=320" alt="Episodio 3" class="episode-img">
                                <div class="episode-duration">23:30</div>
                                <div class="episode-play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="episode-info">
                                <div class="episode-title">Episodio 3: El sistema</div>
                                <div class="episode-stats">
                                    <span><i class="fas fa-eye"></i> 215.6K</span>
                                    <span><i class="fas fa-heart"></i> 29.8K</span>
                                </div>
                                <div class="episode-date">Publicado: 29 de enero, 2023</div>
                            </div>
                        </div>

                        <div class="load-more">
                            <button class="load-more-button">Cargar más episodios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de series relacionadas -->
        <div class="related-series">
            <h2 class="section-title">Series relacionadas</h2>
            <div class="series-carousel">
                

                <div class="series-item">
                    <img src="/placeholder.svg?height=300&width=200" alt="Serie relacionada 4" class="series-img">
                    <div class="series-overlay">
                        <div class="series-title">Serie de prueba</div>
                        <div class="series-genre">Sci-Fi</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/serieshow.js') }}"></script>
</body>

</html>


@endsection
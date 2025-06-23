@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NekoNek</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
</head>

<body class="bg-dark-purple">
    <main>
        <!-- Carousel Section -->
        @if($series->isNotEmpty())
<!-- Estructura corregida del carrusel -->
<div id="mainCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <!-- Indicadores -->
    <div class="carousel-indicators">
        @foreach($series as $index => $serie)
            <button type="button" data-bs-target="#mainCarousel" 
                    data-bs-slide-to="{{ $index }}" 
                    class="{{ $index === 0 ? 'active' : '' }}" 
                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        @foreach($series as $index => $serie)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <!-- Fondo de imagen -->
                <div class="carousel-background" style="background-image: url('{{ asset('storage/' . $serie->miniatura_cuadrada) }}')"></div>
                <!-- Gradiente para mejorar legibilidad -->
                <div class="carousel-gradient"></div>
                <!-- Contenido -->
                <div class="carousel-caption">
                    <h1>{{ $serie->titulo }}</h1>
                    @if($serie->subtitulo)
                        <p class="original-title">{{ $serie->subtitulo }}</p>
                    @endif
                    <p class="description">{{ $serie->descripcion }}</p>
                    <a href="{{ route('serie.show', $serie->seriecreada_id) }}" class="btn btn-accent-purple mt-3">VER AHORA</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Controles -->
    @if($series->count() > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    @endif
</div>
@else
<div class="alert alert-info">No hay series disponibles actualmente</div>
@endif




        <!-- Rankings Section -->
        <section class="rankings-section py-5">
            <div class="container">
                <div class="row">
                    <h2 class="text-center mb-4" style="color: #4B0082;">Ranking</h2>

                    <!-- Ranking 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card ranking-card bg-dark-purple">
                            <div class="card-header bg-medium-purple text-white text-center">
                                <h2 class="h5 mb-0">Animes más vistos</h2>
                            </div>
                            <ol class="list-group list-group-flush ranking-list">
                                <li class="list-group-item ranking-item bg-dark-purple text-light border-medium-purple">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-0">Naruto Shippuden</h6>
                                            <small class="text-light-purple">Actualizado a Episodio 500</small>
                                        </div>
                                        <span class="badge bg-accent-purple rounded-pill">1</span>
                                    </div>
                                    <div class="ranking-details mt-2 bg-darker-purple">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto"
                                                    class="img-fluid rounded">
                                            </div>
                                            <div class="col-8">
                                                <p class="small text-light">Naruto Uzumaki busca convertirse en el
                                                    Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                                <a href="#" class="btn btn-sm btn-accent-purple">Ver ahora</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Aquí se agregarán más items desde Laravel -->
                            </ol>
                        </div>
                    </div>

                    <!-- Ranking 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="card ranking-card bg-dark-purple">
                            <div class="card-header bg-medium-purple text-white text-center">
                                <h2 class="h5 mb-0">Series más leídas</h2>
                            </div>
                            <ol class="list-group list-group-flush ranking-list">
                                <li class="list-group-item ranking-item bg-dark-purple text-light border-medium-purple">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-0">Kimi ni Todoke</h6>
                                            <small class="text-light-purple">Actualizado a Capítulo 123</small>
                                        </div>
                                        <span class="badge bg-accent-purple rounded-pill">1</span>
                                    </div>
                                    <div class="ranking-details mt-2 bg-darker-purple">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="/placeholder.svg?height=120&width=80" alt="Kimi ni Todoke"
                                                    class="img-fluid rounded">
                                            </div>
                                            <div class="col-8">
                                                <p class="small text-light">La historia de una chica tímida encontrando
                                                    el amor verdadero.</p>
                                                <a href="#" class="btn btn-sm btn-accent-purple">Ver ahora</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Aquí se agregarán más items desde Laravel -->
                            </ol>
                        </div>
                    </div>

                    <!-- Ranking 3 -->
                    <div class="col-md-4 mb-4">
                        <div class="card ranking-card bg-dark-purple">
                            <div class="card-header bg-medium-purple text-white text-center">
                                <h2 class="h5 mb-0">Los mejores dibujos</h2>
                            </div>
                            <ol class="list-group list-group-flush ranking-list">
                                <li class="list-group-item ranking-item bg-dark-purple text-light border-medium-purple">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-0">Berserk</h6>
                                            <small class="text-light-purple">Actualizado a Capítulo 364</small>
                                        </div>
                                        <span class="badge bg-accent-purple rounded-pill">1</span>
                                    </div>
                                    <div class="ranking-details mt-2 bg-darker-purple">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="/placeholder.svg?height=120&width=80" alt="Berserk"
                                                    class="img-fluid rounded">
                                            </div>
                                            <div class="col-8">
                                                <p class="small text-light">La búsqueda de venganza de un guerrero en un
                                                    mundo oscuro y brutal.</p>
                                                <a href="#" class="btn btn-sm btn-accent-purple">Ver ahora</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Aquí se agregarán más items desde Laravel -->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Genres Section -->
        <section class="genres-section py-5 bg-darker-purple">
            <div class="container">
                <ul class="nav nav-pills mb-4 justify-content-center" id="genreTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active purple-tab" id="horror-tab" data-bs-toggle="pill"
                            data-bs-target="#horror" type="button" role="tab" aria-controls="horror"
                            aria-selected="true">Horror</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link purple-tab" id="romance-tab" data-bs-toggle="pill"
                            data-bs-target="#romance" type="button" role="tab" aria-controls="romance"
                            aria-selected="false">Romance</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link purple-tab" id="shonen-tab" data-bs-toggle="pill"
                            data-bs-target="#shonen" type="button" role="tab" aria-controls="shonen"
                            aria-selected="false">Shonen</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link purple-tab" id="seinen-tab" data-bs-toggle="pill"
                            data-bs-target="#seinen" type="button" role="tab" aria-controls="seinen"
                            aria-selected="false">Seinen</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link purple-tab" id="gore-tab" data-bs-toggle="pill" data-bs-target="#gore"
                            type="button" role="tab" aria-controls="gore" aria-selected="false">Gore</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link purple-tab" href="generos.html">Ver más</a>
                    </li>
                </ul>

                <div class="tab-content" id="genreTabsContent">
                    <!-- Horror Tab -->
                    <div class="tab-pane fade show active" id="horror" role="tabpanel" aria-labelledby="horror-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                            <div class="col">
                                <div class="card h-100 genre-card bg-dark-purple">
                                    <div class="position-relative">
                                        <img src="/placeholder.svg?height=250&width=200" class="card-img-top"
                                            alt="Tokyo Ghoul">
                                        <span class="position-absolute top-0 start-0 badge bg-accent-purple m-2">TOP
                                            1</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-light">Tokyo Ghoul</h5>
                                        <p class="card-text text-light-purple">Un estudiante universitario se convierte
                                            en un ser mitad humano, mitad ghoul.</p>
                                        <p class="card-text"><small class="text-light-purple">Lecturas: 1.2M</small></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Aquí se agregarán más tarjetas desde Laravel -->
                        </div>
                    </div>

                    <!-- Romance Tab (vacío, se llenará con Laravel) -->
                    <div class="tab-pane fade" id="romance" role="tabpanel" aria-labelledby="romance-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                            <!-- Se llenará con Laravel -->
                        </div>
                    </div>

                    <!-- Otros tabs (vacíos, se llenarán con Laravel) -->
                    <div class="tab-pane fade" id="shonen" role="tabpanel" aria-labelledby="shonen-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                            <!-- Se llenará con Laravel -->
                        </div>
                    </div>

                    <div class="tab-pane fade" id="seinen" role="tabpanel" aria-labelledby="seinen-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                            <!-- Se llenará con Laravel -->
                        </div>
                    </div>

                    <div class="tab-pane fade" id="gore" role="tabpanel" aria-labelledby="gore-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                            <!-- Se llenará con Laravel -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest Publications -->
        <section class="latest-publications py-5 bg-white">
            <div class="container">
                <h2 class="text-center mb-4" style="color: #4B0082;">Últimas Publicaciones</h2>
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-4">
                    <div class="col">
                        <div class="card h-100 bg-darker-purple">
                            <a href="infoseries.html" class="text-decoration-none">
                                <img src="/placeholder.svg?height=300&width=200" class="card-img-top"
                                    alt="Título del Manga">
                                <div class="card-body">
                                    <h5 class="card-title text-light">Título del Manga</h5>
                                    <p class="card-text"><small class="text-light-purple">Lecturas: 12K</small></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Aquí se agregarán más tarjetas desde Laravel -->
                </div>
            </div>
        </section>

        <!-- Series Section -->
        <section class="series-section py-5 bg-darker-purple">
            <div class="container">
                <ul class="nav nav-pills mb-4 justify-content-center" id="seriesTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active purple-tab" id="korean-tab" data-bs-toggle="pill"
                            data-bs-target="#korean" type="button" role="tab" aria-controls="korean"
                            aria-selected="true">Series Coreanas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link purple-tab" id="chinese-tab" data-bs-toggle="pill"
                            data-bs-target="#chinese" type="button" role="tab" aria-controls="chinese"
                            aria-selected="false">Series Chinas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link purple-tab" id="japanese-tab" data-bs-toggle="pill"
                            data-bs-target="#japanese" type="button" role="tab" aria-controls="japanese"
                            aria-selected="false">Series Japonesas</button>
                    </li>
                </ul>

                <div class="tab-content" id="seriesTabsContent">
                    <!-- Korean Series Tab -->
                    <div class="tab-pane fade show active" id="korean" role="tabpanel" aria-labelledby="korean-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                            <div class="col">
                                <div class="card h-100 series-card bg-dark-purple">
                                    <div class="position-relative">
                                        <img src="/placeholder.svg?height=250&width=200" class="card-img-top"
                                            alt="Descendants of the Sun">
                                        <span class="position-absolute top-0 start-0 badge bg-accent-purple m-2">TOP
                                            1</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-light">Descendants of the Sun</h5>
                                        <p class="card-text text-light-purple">Romance entre un capitán de fuerzas
                                            especiales y una doctora en zona de conflicto.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Aquí se agregarán más tarjetas desde Laravel -->
                        </div>
                    </div>

                    <!-- Chinese Series Tab (vacío, se llenará con Laravel) -->
                    <div class="tab-pane fade" id="chinese" role="tabpanel" aria-labelledby="chinese-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                            <!-- Se llenará con Laravel -->
                        </div>
                    </div>

                    <!-- Japanese Series Tab (vacío, se llenará con Laravel) -->
                    <div class="tab-pane fade" id="japanese" role="tabpanel" aria-labelledby="japanese-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                            <!-- Se llenará con Laravel -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/principal.js') }}"></script>
</body>

</html>

@endsection
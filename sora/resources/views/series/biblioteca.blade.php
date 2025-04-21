@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - NekoNek</title>


</head>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NekoNek</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/biblioteca.css') }}">
</head>

<body class="bg-dark-purple">
    <main>
        <!-- Carousel Section -->
        <div class="biblioteca-hero">
            <div class="container py-4">
                <h1 class="text-light text-center mb-4">Biblioteca de Series</h1>
            </div>
        </div>

        <div class="container-fluid bg-darker-purple py-4">
            <div class="container">
                <!-- Barra de búsqueda y filtros -->
                <div class="card bg-dark-purple border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <!-- Barra de búsqueda -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" type="search" class="form-control border-0"
                                        placeholder="Buscar series..." aria-label="Buscar series"
                                        style="background-color: white; color: black;">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"
                                        style="background-color: rgb(52, 18, 72); color: white; border: none; transition: all 0.3s ease;"
                                        onmouseover="this.style.backgroundColor='rgb(90, 32, 123)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.2)';"
                                        onmouseout="this.style.backgroundColor='rgb(52, 18, 72)'; this.style.transform='none'; this.style.boxShadow='none';">
                                        Buscar
                                    </button>
                                </div>

                            </div>

                            <!-- Filtro de género -->
                            <div class="col-md-3">
                                <select class="form-select bg-medium-purple text-light border-0" id="genero">
                                    <option value="" selected>Todos los géneros</option>
                                    <option value="accion">Acción</option>
                                    <option value="aventura">Aventura</option>
                                    <option value="comedia">Comedia</option>
                                    <option value="drama">Drama</option>
                                    <option value="fantasia">Fantasía</option>
                                    <option value="romance">Romance</option>
                                    <option value="terror">Terror</option>
                                </select>
                            </div>

                            <!-- Filtro de estado -->
                            <div class="col-md-3">
                                <select class="form-select bg-medium-purple text-light border-0" id="estado">
                                    <option value="" selected>Todos los estados</option>
                                    <option value="terminado">Terminado</option>
                                    <option value="en-emision">En emisión</option>
                                    <option value="nuevo">Nuevo</option>
                                </select>
                            </div>



                        </div>
                    </div>
                </div>

                <!-- Filtros activos y ordenamiento -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <!-- Filtros activos -->
                    <div class="filtros-seleccionados d-flex flex-wrap gap-2" id="filtros-seleccionados">
                        <!-- Los filtros seleccionados se mostrarán aquí -->
                    </div>

                    <!-- Ordenamiento -->
                    <div class="d-flex align-items-center">
                        <label for="orden" class="form-label text-light me-2 mb-0">Ordenar por:</label>
                        <select class="form-select bg-medium-purple text-light border-0" id="orden"
                            style="width: auto;">
                            <option value="alfabetico">Alfabético</option>
                            <option value="reciente">Más reciente</option>
                            <option value="popular">Más popular</option>
                        </select>
                    </div>
                </div>

                <!-- Grid de series -->
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 g-4" id="series-grid">
                    <!-- Ejemplo de tarjeta de serie -->
                    @foreach($series as $serie)
                        <div class="col">
                        <a href="{{ route('serie.show', $serie->seriecreada_id) }}" class="text-decoration-none">
                            <div class="card h-100 serie-card border-0 shadow-lg">
                                <!-- Header con imagen vertical -->
                                <div class="position-relative overflow-hidden" style="height: 300px;">
                                    <img src="{{ asset('storage/' . $serie->miniatura_vertical) }}"
                                        class="w-100 h-100 object-fit-cover" alt="{{ $serie->titulo }}">

                                    <!-- Overlay con título y subtítulo -->
                                    <div class="card-img-overlay d-flex flex-column justify-content-end p-0">
                                        <div class="bg-dark-gradient p-3">
                                            <h5 class="card-title text-white mb-1">{{ $serie->titulo }}</h5>
                                            @if($serie->subtitulo)
                                                <p class="card-text text-light opacity-75 small mb-0">{{ $serie->subtitulo }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Badge de estado (asumiendo relación con tabla estados) -->

                                </div>

                                <!-- Cuerpo principal -->
                                <div class="card-body bg-light">
                                    <!-- Descripción completa con lector más/menos -->
                                    <div class="mb-3">
                                        <p class="card-text serie-descripcion"
                                            style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ $serie->descripcion }}
                                        </p>
                                        <a href="#" class="text-primary small leer-mas" style="display: none;">Leer más</a>
                                    </div>
                                   

                                    <!-- Géneros (asumiendo relación muchos a muchos) -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Aquí se agregarán más tarjetas desde Laravel -->
                </div>

                <!-- Paginación -->
                <nav aria-label="Paginación de series" class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Anterior">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="visually-hidden">Anterior</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Siguiente">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="visually-hidden">Siguiente</span>

                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/biblioteca.js') }}"></script>
</body>

</html>

@endsection
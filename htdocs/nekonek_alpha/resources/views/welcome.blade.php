@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Sitio Web</title>
    <link rel="stylesheet" href="../../headeri.css">
    <link rel="stylesheet" href="../../style/principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <header class="header reader-header" id="reader-header">
    <div class="container">
        <div class="left-section">
          <div class="header-actions">
            <a href="principal.html">
                <img src="../../logo p.png" alt="Logo de la empresa" class="logo">
            </a>
        </div>
            <nav class="nav-menu">
                <ul>
                    <li><a href="principal.html">Inicio</a></li>
                    <li><a href="foro.html">Foro</a></li>
                    <li><a href="biblioteca.html">Biblioteca</a></li>
                    <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
                </ul>
            </nav>
        </div>
        <div class="right-section">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Buscar...">
                <button class="search-button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="user-options">
                <div class="bookmark-icon" id="reader-bookmark-icon">
                    <i class="fas fa-bookmark"></i>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="#">Series que sigo</a></li>
                            <li><a href="#">Autores que sigo</a></li>
                            <li><a href="#">Grupos que sigo</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Perfil de Lector -->
                <div class="user-profile" id="editor-profile">
                  <img src="/placeholder.svg?height=40&width=40" alt="Avatar" class="avatar">
                  <div class="profile-dropdown">
                      <ul>
                          <li><a href="../../lector/perfillector.html"><i class="fas fa-user"></i> Ver perfil</a></li>
                          <li><a href="#"><i class="fas fa-cog"></i> Configurar</a></li>
                          <li><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
                      </ul>
                  </div>
              </div>
              </div>
            </div>
        </div>
        <div class="mobile-menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</header>

    <main class="main-content">
        <div class="carousel">
            <div class="slide active">
                <div class="slide-bg" style="background-image: url('img/o7.png');"></div>
                <div class="slide-gradient"></div>
                <div class="slide-content">
                    <h1 class="slide-title">Solo leveling</h1>
                    <p class="slide-original-title">나 혼자만 레벨업</p>
                    <div class="slide-genres">
                        <span>Accion</span>
                        <span>Fantasia</span>
                        <span>Aventura</span>
                        <span>Ciencia Ficcion</span>
                    </div>
                    <div class="slide-info">
                        <span>1 temporada</span>
                        <div class="rating">
                            <span class="star">★</span>
                            <span>4.9</span>
                        </div>
                        <span>Corea</span>
                    </div>
                    <div class="tags">
                        <span class="tag">HD</span>
                        <span class="tag">serie</span>
                        <span class="tag emission">EMISIÓN</span>
                    </div>
                    <p class="slide-description">
                        La historia se centra en Sung Jin-woo, un cazador que despierta en el hospital tras ser brutalmente asesinado por monstruos en una mazmorra. 
                    </p>
                    <a href="#" class="btn-watch">VER AHORA</a>
                </div>
            </div>
    
            <div class="slide">
                <div class="slide-bg" style="background-image: url('img/o12.png');"></div>

                <div class="slide-gradient"></div>
                <div class="slide-content">
                    <h1 class="slide-title">El anillo roto: este matrimonio fracasará de todas formas</h1>
                    <p class="slide-original-title">The Broken Ring: This Marriage Will Fail Anyway</p>
                    <div class="slide-genres">
                        <span>Romance</span>
                        <span>Fantasia</span>
                    </div>
                    <div class="slide-info">
                        <span>1 temporada</span>
                        <div class="rating">
                            <span class="star">★</span>
                            <span>4.8</span>
                        </div>
                        <span>corea</span>
                    </div>
                    <div class="tags">
                        <span class="tag">16+</span>
                        <span class="tag">Novela web</span>
                    </div>
                    <p class="slide-description">
                        Cárcel tenía seis años cuando se enteró de que estaba destinado a casarse con Inés, la muchacha que lo eligió para ser su prometido. Dado el poco tiempo que le queda para disfrutar de su soltería, pasa sus días de juventud haciendo locuras, sacando el máximo provecho de su apuesto aspecto y del poder seductor de un uniforme de la marina
                    </p>
                    <a href="#" class="btn-watch">VER AHORA</a>
                </div>
            </div>
    
            <div class="slide">
                <div class="slide-bg" style="background-image: url('img/o13.png');"></div>

                <div class="slide-gradient"></div>
                <div class="slide-content">
                    <h1 class="slide-title">¡El Heroe De Nivel Maximo Ha Regresado!</h1>
                    <p class="slide-original-title">THE MAX LEVEL HERO STRIKES BACK</p>
                    <div class="slide-genres">
                        <span>Acción</span>
                        <span>Harem</span>
                        <span>Fantasia</span>
                        <span>Aventura</span>
                        <span>Artes marciales</span>
                        <span>Reencarnacion</span>
                    </div>
                    <div class="slide-info">
                        <span>1 temporada</span>
                        <div class="rating">
                            <span class="star">★</span>
                            <span>4.7</span>
                        </div>
                        <span>corea</span>
                    </div>
                    <div class="tags">
                        <span class="tag">Serie</span>
                    </div>
                    <p class="slide-description">
                        El débil príncipe de un país insignificante, Davey. Tras entrar en coma, su alma escapó a un templo donde se reunían las almas de los héroes. Se entrenó durante mil años y ahora ha regresado como un héroe de nivel máximo
                    </p>
                    <a href="#" class="btn-watch">VER AHORA</a>
                </div>
            </div>
            
            <div class="carousel-nav">
                <button class="nav-btn prev-btn">&#10094;</button>
                <button class="nav-btn next-btn">&#10095;</button>
            </div>
            
            <div class="carousel-indicators">
                <span class="indicator active" data-index="0"></span>
                <span class="indicator" data-index="1"></span>
                <span class="indicator" data-index="2"></span>
            </div>
        </div>



 <!--  estilos de Ranking -->

        <div class="rankings-section">
            <div class="rankings-container">
                <!-- Ranking 1 -->
                <div class="ranking-column">
                    <h2 class="ranking-title">Animes más vistos</h2>
                    <ol class="ranking-list">
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        
                        <!-- Repite para los otros 9 items -->
                    </ol>
                </div>
        
                <!-- Ranking 2 -->
                <div class="ranking-column">
                    <h2 class="ranking-title">Series más leídas</h2>
                    <ol class="ranking-list">
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>

                        <!-- Similar structure -->
                    </ol>
                </div>
        
                <!-- Ranking 3 -->
                <div class="ranking-column">
                    <h2 class="ranking-title">Los mejores dibujos</h2>
                    <ol class="ranking-list">
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <li class="ranking-item">
                            <div class="ranking-basic">
                                <span class="title">Naruto Shippuden</span>
                                <span class="update">Actualizado a Episodio 500</span>
                            </div>
                            <div class="ranking-expanded">
                                <img src="/placeholder.svg?height=120&width=80" alt="Naruto" class="cover">
                                <div class="expanded-content">
                                    <h3>Naruto Shippuden</h3>
                                    <p>Naruto Uzumaki busca convertirse en el Hokage de su aldea mientras enfrenta poderosos enemigos.</p>
                                    <a href="#" class="watch-now">Ver ahora</a>
                                </div>
                            </div>
                        </li>
                        <!-- Similar structure -->
                    </ol>
                </div>
            </div>
        </div>




    
        <div class="genre-container">
            <div class="genre-tabs-navigation">
              <button class="genre-tab-button active" data-tab="horror">Horror</button>
              <button class="genre-tab-button" data-tab="romance">Romance</button>
              <button class="genre-tab-button" data-tab="shonen">Shonen</button>
              <button class="genre-tab-button" data-tab="seinen">Seinen</button>
              <button class="genre-tab-button" data-tab="gore">Gore</button>
              <button class="genre-tab-button ver-mas" onclick="redirectToAllGenres()">Ver más</button>
            </div>
          
            <!-- Horror Grid -->
            <div class="genre-grid active" id="horror">
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 1</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Tokyo Ghoul" class="genre-image">
                <h3 class="genre-name">Tokyo Ghoul</h3>
                <p class="genre-description">Un estudiante universitario se convierte en un ser mitad humano, mitad ghoul.</p>
                <div class="genre-stats">Lecturas: 1.2M</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 2</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Junji Ito Collection" class="genre-image">
                <h3 class="genre-name">Junji Ito Collection</h3>
                <p class="genre-description">Antología de historias de horror del maestro del manga de terror.</p>
                <div class="genre-stats">Lecturas: 980K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 3</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Another" class="genre-image">
                <h3 class="genre-name">Another</h3>
                <p class="genre-description">Una maldición mortal persigue a los estudiantes de una clase.</p>
                <div class="genre-stats">Lecturas: 850K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 4</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 5</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 6</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 7</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 8</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
            </div>
          
            <!-- Romance Grid -->
            <div class="genre-grid" id="romance">
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 1</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png"alt="Kimi ni Todoke" class="genre-image">
                <h3 class="genre-name">Kimi ni Todoke</h3>
                <p class="genre-description">La historia de una chica tímida encontrando el amor verdadero.</p>
                <div class="genre-stats">Lecturas: 1.5M</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 2</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png"alt="Kaichou wa Maid-sama!" class="genre-image">
                <h3 class="genre-name">Kaichou wa Maid-sama!</h3>
                <p class="genre-description">La presidenta del consejo estudiantil tiene un secreto: trabaja como maid.</p>
                <div class="genre-stats">Lecturas: 1.3M</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 3</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Fruits Basket" class="genre-image">
                <h3 class="genre-name">Fruits Basket</h3>
                <p class="genre-description">Una chica descubre el secreto de una familia maldita.</p>
                <div class="genre-stats">Lecturas: 1.1M</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 4</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 5</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 6</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 7</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 8</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
            </div>
          
            <!-- Shonen Grid -->
            <div class="genre-grid" id="shonen">
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 1</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="One Piece" class="genre-image">
                <h3 class="genre-name">One Piece</h3>
                <p class="genre-description">Las aventuras de Luffy en busca del tesoro más grande del mundo.</p>
                <div class="genre-stats">Lecturas: 2.5M</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 2</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png"alt="Naruto" class="genre-image">
                <h3 class="genre-name">Naruto</h3>
                <p class="genre-description">Un joven ninja busca convertirse en el líder de su aldea.</p>
                <div class="genre-stats">Lecturas: 2.2M</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 3</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="My Hero Academia" class="genre-image">
                <h3 class="genre-name">My Hero Academia</h3>
                <p class="genre-description">En un mundo de superhéroes, un chico sin poderes persigue su sueño.</p>
                <div class="genre-stats">Lecturas: 1.8M</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 4</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 5</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 6</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 7</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 8</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
            </div>
          
            <!-- Seinen Grid -->
            <div class="genre-grid" id="seinen">
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 1</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Berserk" class="genre-image">
                <h3 class="genre-name">Berserk</h3>
                <p class="genre-description">La búsqueda de venganza de un guerrero en un mundo oscuro y brutal.</p>
                <div class="genre-stats">Lecturas: 1.7M</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 2</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Vagabond" class="genre-image">
                <h3 class="genre-name">Vagabond</h3>
                <p class="genre-description">La historia del legendario espadachín Miyamoto Musashi.</p>
                <div class="genre-stats">Lecturas: 1.4M</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 3</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png"alt="Monster" class="genre-image">
                <h3 class="genre-name">Monster</h3>
                <p class="genre-description">Un doctor persigue a un paciente que se convirtió en asesino.</p>
                <div class="genre-stats">Lecturas: 1.2M</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 4</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 5</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 6</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 7</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 8</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
            </div>
          
            <!-- Gore Grid -->
            <div class="genre-grid" id="gore">
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 1</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Gantz" class="genre-image">
                <h3 class="genre-name">Gantz</h3>
                <p class="genre-description">Personas muertas son forzadas a participar en un juego mortal.</p>
                <div class="genre-stats">Lecturas: 1.1M</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 2</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Elfen Lied" class="genre-image">
                <h3 class="genre-name">Elfen Lied</h3>
                <p class="genre-description">Una especie mutante lucha por su supervivencia.</p>
                <div class="genre-stats">Lecturas: 950K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 3</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 4</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 5</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 6</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 7</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
              <a href="infoseries.html" class="genre-card">
                <span class="genre-label">TOP 8</span>
                <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Blood-C" class="genre-image">
                <h3 class="genre-name">Blood-C</h3>
                <p class="genre-description">Una estudiante combate monstruos mientras descubre oscuros secretos.</p>
                <div class="genre-stats">Lecturas: 820K</div>
              </a>
            </div>
          </div>

          
    
        <h1 class="page-title">Ultimas Publicaciones</h1>
    
        <main class="content-grid">
            <!-- Example manga card -->
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o4.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o5.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o5.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o5.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o5.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o5.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o5.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o5.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <div class="manga-card">
                <a href="infoseries.html" aria-label="Ver detalles del Título del Manga">
                    <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Título del Manga" class="clickable-image">
                    <div class="manga-info">
                        <div class="manga-title">Título del Manga</div>
                        <div class="manga-stats">Lecturas: 12K</div>
                    </div>
                </a>
            </div>
            <!-- More manga cards would be added here -->
        </main>
    
    
        <div class="series-container">
            <div class="tabs-navigation">
              <button class="tab-button active" data-tab="korean">Series Coreanas</button>
              <button class="tab-button" data-tab="chinese">Series Chinas</button>
              <button class="tab-button" data-tab="japanese">Series Japonesas</button>
            </div>
          
            <!-- Korean Series Grid -->
            <div class="series-grid active" id="korean">
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Descendants of the Sun">
                  <span class="series-label">TOP 1</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Descendants of the Sun" class="series-image clickable-image">
                  <h3 class="series-name">Descendants of the Sun</h3>
                  <p class="series-description">Romance entre un capitán de fuerzas especiales y una doctora en zona de conflicto.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Goblin">
                  <span class="series-label">TOP 2</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Goblin" class="series-image clickable-image">
                  <h3 class="series-name">Goblin</h3>
                  <p class="series-description">Un ser inmortal busca a su novia humana para terminar su maldición.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de True Beauty">
                  <span class="series-label">TOP 3</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="True Beauty" class="series-image clickable-image">
                  <h3 class="series-name">True Beauty</h3>
                  <p class="series-description">Una estudiante se vuelve popular gracias a sus habilidades con el maquillaje.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Crash Landing on You">
                  <span class="series-label">TOP 4</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Crash Landing on You" class="series-image clickable-image">
                  <h3 class="series-name">Crash Landing on You</h3>
                  <p class="series-description">Una heredera surcoreana aterriza accidentalmente en Corea del Norte.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de It's Okay to Not Be Okay">
                  <span class="series-label">TOP 5</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="It's Okay to Not Be Okay" class="series-image clickable-image">
                  <h3 class="series-name">It's Okay to Not Be Okay</h3>
                  <p class="series-description">Un cuidador de psiquiatría conoce a una escritora de cuentos infantiles.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Reply 1988">
                  <span class="series-label">TOP 6</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Reply 1988" class="series-image clickable-image">
                  <h3 class="series-name">Reply 1988</h3>
                  <p class="series-description">La vida de cinco familias en un barrio de Seúl durante 1988.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Hospital Playlist">
                  <span class="series-label">TOP 7</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Hospital Playlist" class="series-image clickable-image">
                  <h3 class="series-name">Hospital Playlist</h3>
                  <p class="series-description">Cinco doctores unidos por su pasión por la música y la medicina.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de What's Wrong with Secretary Kim">
                  <span class="series-label">TOP 8</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="What's Wrong with Secretary Kim" class="series-image clickable-image">
                  <h3 class="series-name">What's Wrong with Secretary Kim</h3>
                  <p class="series-description">Un narcisista vicepresidente y su eficiente secretaria.</p>
                </a>
              </div>
            </div>
          
            <!-- Chinese Series Grid -->
            <div class="series-grid" id="chinese">
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de The Untamed">
                  <span class="series-label">TOP 1</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="The Untamed" class="series-image clickable-image">
                  <h3 class="series-name">The Untamed</h3>
                  <p class="series-description">Dos cultivadores espirituales descubren una conspiración oscura.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Eternal Love">
                  <span class="series-label">TOP 2</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Eternal Love" class="series-image clickable-image">
                  <h3 class="series-name">Eternal Love</h3>
                  <p class="series-description">Romance entre una diosa y el Rey Celestial a través de múltiples vidas.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Love and Redemption">
                  <span class="series-label">TOP 3</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Love and Redemption" class="series-image clickable-image">
                  <h3 class="series-name">Love and Redemption</h3>
                  <p class="series-description">Una cultivadora sin emociones y un poderoso guerrero inmortal.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Ashes of Love">
                  <span class="series-label">TOP 4</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Ashes of Love" class="series-image clickable-image">
                  <h3 class="series-name">Ashes of Love</h3>
                  <p class="series-description">Romance entre la Diosa de las Flores y el Rey Fénix.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Love Between Fairy and Devil">
                  <span class="series-label">TOP 5</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Love Between Fairy and Devil" class="series-image clickable-image">
                  <h3 class="series-name">Love Between Fairy and Devil</h3>
                  <p class="series-description">Una pequeña hada se enamora de un poderoso demonio.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Word of Honor">
                  <span class="series-label">TOP 6</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Word of Honor" class="series-image clickable-image">
                  <h3 class="series-name">Word of Honor</h3>
                  <p class="series-description">Dos guerreros buscan un tesoro legendario del mundo marcial.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Princess Agents">
                  <span class="series-label">TOP 7</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Princess Agents" class="series-image clickable-image">
                  <h3 class="series-name">Princess Agents</h3>
                  <p class="series-description">Una esclava se convierte en una poderosa guerrera espía.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Nirvana in Fire">
                  <span class="series-label">TOP 8</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Nirvana in Fire" class="series-image clickable-image">
                  <h3 class="series-name">Nirvana in Fire</h3>
                  <p class="series-description">Un estratega busca justicia y venganza para su clan.</p>
                </a>
              </div>
            </div>
          
            <!-- Japanese Series Grid -->
            <div class="series-grid" id="japanese">
              <div class="series-card">
                <a href="infoseries.html"aria-label="Ver detalles de Good Morning Call">
                  <span class="series-label">TOP 1</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Good Morning Call" class="series-image clickable-image">
                  <h3 class="series-name">Good Morning Call</h3>
                  <p class="series-description">Dos estudiantes se ven obligados a vivir juntos en secreto.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Mischievous Kiss">
                  <span class="series-label">TOP 2</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Mischievous Kiss" class="series-image clickable-image">
                  <h3 class="series-name">Mischievous Kiss</h3>
                  <p class="series-description">Una chica persigue al estudiante más brillante de la escuela.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Midnight Diner">
                  <span class="series-label">TOP 3</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Midnight Diner" class="series-image clickable-image">
                  <h3 class="series-name">Midnight Diner</h3>
                  <p class="series-description">Historias de los clientes de un restaurante nocturno en Tokio.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Alice in Borderland">
                  <span class="series-label">TOP 4</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Alice in Borderland" class="series-image clickable-image">
                  <h3 class="series-name">Alice in Borderland</h3>
                  <p class="series-description">Jugadores atrapados en un Tokio alternativo y mortal.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de My Love from the Star">
                  <span class="series-label">TOP 5</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="My Love from the Star" class="series-image clickable-image">
                  <h3 class="series-name">Hana Yori Dango</h3>
                  <p class="series-description">Una estudiante común enfrenta al grupo de élite F4.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Nodame Cantabile">
                  <span class="series-label">TOP 6</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Nodame Cantabile" class="series-image clickable-image">
                  <h3 class="series-name">Nodame Cantabile</h3>
                  <p class="series-description">Romance entre dos estudiantes de música clásica.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Legal High">
                  <span class="series-label">TOP 7</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Legal High" class="series-image clickable-image">
                  <h3 class="series-name">Legal High</h3>
                  <p class="series-description">Un abogado cínico y su idealista asociada resuelven casos.</p>
                </a>
              </div>
              <div class="series-card">
                <a href="infoseries.html" aria-label="Ver detalles de Long Vacation">
                  <span class="series-label">TOP 8</span>
                  <img src="C:\Users\Dabvhy\Downloads\nekonek\o6.png" alt="Long Vacation" class="series-image clickable-image">
                  <h3 class="series-name">Long Vacation</h3>
                  <p class="series-description">Un pianista y una modelo aspiran a alcanzar sus sueños.</p>
                </a>
              </div>
            </div>
          </div>
    
        
        








    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-links">
                <div class="footer-row">
                    <a href="#" class="footer-link">Preguntas Frecuentes</a>
                    <a href="#" class="footer-link">Política de Privacidad</a>
                    <a href="#" class="footer-link">Términos de Uso</a>
                    <a href="#" class="footer-link">Contáctanos</a>
                </div>
            </div>
            <div class="footer-info">
                <div class="footer-company">
                    NekoNek Entertainment S.L.
                </div>
                <div class="footer-copyright">
                    © 2025-2025 nekonek.com Todos los Derechos Reservados
                </div>
                <div class="footer-contact">
                    Horario de Atención: Lunes a Viernes 9:30 — 19:00 | Teléfono: 3224461311| Email: jyu@nekonek.com
                </div>
                <div class="footer-legal">
                    Licencia de Publicación Digital: NKWEB-2024-001
                </div>
            </div>
        </div>
    </footer>


    <script src="../../headeri.js"></script>
    <script src="../../js/principal.js"></script>
   
</body>
</html>

@endsection
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Tu Sitio Web</title>
    <link rel="stylesheet" href="../../headeri.css">
    <link rel="stylesheet" href="../../style/registro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 
</head>
<body>
    <!-- Header (mantener el mismo que en el formulario de inicio de sesión) -->
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
            <div class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>
    <main class="main-content">
        <div class="registro-container">
            <div class="registro-form">
                <h2 class="registro-title">REGÍSTRATE</h2>
                <form id="formulario-registro">
                    <div id="paso-1">
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre completo</label>
                            <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Tu nombre completo">
                        </div>
                        <div class="form-group">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" id="correo" name="correo" class="form-input" placeholder="ejemplo@correo.com">
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="form-label">Número de Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" class="form-input" placeholder="Tu número de teléfono">
                        </div>
                        <div class="form-group">
                            <label for="confirmacionTelefono" class="form-label">Confirma tu Número</label>
                            <input type="tel" id="confirmacionTelefono" name="confirmacionTelefono" class="form-input" placeholder="Confirma tu número de teléfono">
                        </div>
                        <button type="button" id="btn-continuar" class="btn btn-primary">Continuar</button>
                    </div>
                    
                    <div id="paso-2" style="display: none;">
                        <div class="form-group">
                            <label for="apodo" class="form-label">Apodo</label>
                            <input type="text" id="apodo" name="apodo" class="form-input" placeholder="Tu apodo o nickname">
                        </div>
                        <div class="form-group">
                            <label for="imagenFondo" class="form-label">Imagen de Fondo</label>
                            <input type="file" id="imagenFondo" name="imagenFondo" accept="image/*" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="imagenPerfil" class="form-label">Imagen de Perfil</label>
                            <input type="file" id="imagenPerfil" name="imagenPerfil" accept="image/*" class="form-input">
                        </div>
                        <div class="btn-group">
                            <button type="button" id="btn-atras" class="btn btn-outline">Atrás</button>
                            <button type="button" id="btn-finalizar" class="btn btn-primary">Finalizar</button>
                        </div>
                    </div>
                </form>
                
                <div id="error-container" class="alert alert-error" style="display: none;"></div>
                
                <div id="exito-container" class="success-container" style="display: none;">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2>¡Registro Exitoso!</h2>
                    <p>Tu cuenta ha sido creada correctamente.</p>
                </div>
            </div>
            <div class="registro-imagen">
                <img src="img/o13.png" alt="Imagen de registro">
            </div>
        </div>
    </main>

    <!-- Footer (mantener el mismo que en el formulario de inicio de sesión) -->
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
  <script src="../../js/registro.js"></script>
</body>
</html>


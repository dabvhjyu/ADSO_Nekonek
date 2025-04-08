<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../../headeri.css">
    <link rel="stylesheet" href="../../style/sesion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
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

    <!-- Contenido principal -->
    <main class="main-content">
        <div class="login-container">
            <div class="form-section">
                <h2 class="login-title">INICIAR SESIÓN</h2>
                <div class="tabs">
                    <button type="button" class="tab active" id="smsTabBtn">Inicio de sesión por SMS</button>
                    <button type="button" class="tab" id="passwordTabBtn">Contraseña de inicio de sesión</button>
                </div>

                <form id="loginForm" onsubmit="return validateForm(event)">
                    <!-- Tab de SMS -->
                    <div id="smsTab" class="tab-content active">
                        <div class="form-group">
                            <div class="phone-input">
                                <select class="country-code">
                                    <option value="+57">+57</option>
                                    <option value="+1">+1</option>
                                </select>
                                <input type="tel" id="phone-sms" placeholder="Por favor ingrese su número de teléfono" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="verification-group">
                                <input type="text" id="smsCode" placeholder="Ingrese su código SMS">
                                <button type="button" class="send-code" onclick="sendCode()">Enviar código</button>
                            </div>
                        </div>
                        <div class="error-message" id="smsErrorMessage"></div>
                    </div>
                    
                    <!-- Tab de Contraseña -->
                    <div id="passwordTab" class="tab-content">
                        <div class="form-group">
                            <input type="text" id="username" placeholder="Por favor, introduzca su contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" placeholder="Por favor, introduzca su contraseña">
                        </div>
                        <div class="error-message" id="passwordErrorMessage"></div>
                        <div class="forgot-password">
                            <a href="#" id="forgotPasswordLink">Olvidó contraseña</a>
                        </div>
                    </div>
                    
                    <!-- Tab de Recuperar Contraseña -->
                    <div id="resetPasswordTab" class="tab-content">
                        <div class="form-group">
                            <div class="phone-input">
                                <select class="country-code" disabled>
                                    <option value="+57">+57</option>
                                </select>
                                <input type="tel" id="reset-phone" placeholder="Ingrese su número de teléfono" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="verification-group">
                                <input type="text" id="resetSmsCode" placeholder="Ingrese el código SMS">
                                <button type="button" class="send-code" id="resetSendCodeBtn" onclick="sendResetCode()">Enviar código</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" id="newPassword" placeholder="Nueva contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" id="confirmPassword" placeholder="Confirmar nueva contraseña">
                        </div>
                        <button type="button" class="login-btn" onclick="resetPassword()">Cambiar contraseña</button>
                    </div>
                    
                    <div class="terms-checkbox">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">Acepto los términos y condiciones</label>
                    </div>
                    
                    <div class="button-group">
                        <button type="button" class="register-btn" onclick="window.location.href='registro.html'">Registrarse</button>

                        <button type="submit" class="login-btn">Iniciar sesión</button>
                    </div>
                </form>
            </div>
            <div class="image-section">
                <img src="img/o13.png" alt="Imagen de inicio de sesión">
            </div>
        </div>
    </main>

    <!-- Footer -->
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
                <div class="footer-company">NekoNek Entertainment S.L.</div>
                <div class="footer-copyright">© 2025-2025 nekonek.com Todos los Derechos Reservados</div>
                <div class="footer-contact">Horario de Atención: Lunes a Viernes 9:30 — 19:00 | Teléfono: 3224461311 | Email: jyu@nekonek.com</div>
                <div class="footer-legal">Licencia de Publicación Digital: NKWEB-2024-001</div>
            </div>
        </div>
    </footer>
    <script src="../../headeri.js"></script>
    <script src="../../js/sesion.js"></script>
</body>
</html>


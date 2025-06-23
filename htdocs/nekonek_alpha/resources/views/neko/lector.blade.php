<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comic Reader - Cinco gatos</title>
    <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #1a1a1a;
            color: white;
            min-height: 100vh;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body.light-mode {
            background-color: #ffffff;
            color: #000000;
        }

        /* Header styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 2rem;
            background-color: #000;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        body.light-mode .header {
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }

        .logo {
            height: 70px;
            width: auto;
        }

        .series-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .series-title {
            color: white;
            text-decoration: none;
        }

        body.light-mode .series-title {
            color: #000;
        }

        .chapter-info {
            color: #888;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .back-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
            background-color: #333;
            border: none;
            border-radius: 4px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .back-button:hover {
            background-color: #444;
            transform: translateY(-2px);
        }

        body.light-mode .back-button {
            color: white;
            background-color: #555;
        }

        body.light-mode .back-button:hover {
            background-color: #666;
        }

        /* Main content */
        .main-content {
            margin-top: 60px;
            padding: 1rem;
            padding-bottom: 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .comic-page {
            max-width: 800px;
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            padding: 0;
            border: 0;
        }

        /* Comments Section */
        .comments-section {
            display: none;
            width: 100%;
            max-width: 800px;
            margin: 1rem auto;
            padding: 1rem;
            background-color: #222;
            border-radius: 8px;
            color: white;
        }

        .comments-section.active {
            display: block;
        }

        body.light-mode .comments-section {
            background-color: #f9f9f9;
            color: #000;
        }

        .comments-title {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .comment {
            padding: 0.5rem 0;
            border-bottom: 1px solid #444;
        }

        body.light-mode .comment {
            border-bottom: 1px solid #ddd;
        }

        .no-comments {
            text-align: center;
            color: #888;
        }

        /* Bottom navigation */
        .chapter-navigation {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.9);
            padding: 0.5rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }

        body.light-mode .chapter-navigation {
            background-color: rgba(255, 255, 255, 0.9);
            color: #000;
            border-top: 1px solid #eee;
        }

        .nav-group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-group.center {
            flex: 1;
            justify-content: center;
        }

        .nav-group.left {
            min-width: 250px;
        }

        .nav-group.right {
            min-width: 150px;
            justify-content: flex-end;
        }

        .theme-toggle,
        .zoom-button,
        .nav-button,
        .action-button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            font-size: 0.9rem;
        }

        body.light-mode .theme-toggle,
        body.light-mode .zoom-button,
        body.light-mode .nav-button,
        body.light-mode .action-button {
            color: #000;
        }

        .zoom-controls {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .zoom-value {
            font-size: 1rem;
            font-weight: bold;
        }

        .chapter-selector {
            position: relative;
        }

        .chapter-list {
            display: none;
            position: absolute;
            bottom: 100%;
            left: 0;
            background-color: #1a1a1a;
            border-radius: 4px;
            padding: 0.5rem;
            max-height: 300px;
            overflow-y: auto;
            width: 200px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        body.light-mode .chapter-list {
            background-color: white;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .chapter-list.active {
            display: block;
        }

        .chapter-item {
            padding: 0.5rem;
            color: white;
            text-decoration: none;
            display: block;
            cursor: pointer;
        }

        body.light-mode .chapter-item {
            color: #000;
        }

        .chapter-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        body.light-mode .chapter-item:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        #comment-form {
            margin-top: 1rem;
        }

        #comment-input {
            width: 100%;
            padding: 0.5rem;
            border-radius: 4px;
            border: 1px solid #444;
            background-color: #333;
            color: white;
        }

        #comment-form button {
            margin-top: 0.5rem;
            padding: 0.5rem 1rem;
            background-color: #555;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        #comment-form button:hover {
            background-color: #666;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <a href="/" class="back-button">← Volver</a>
        <div class="series-container">
            <a href="/series/solo-leveling" class="series-title">Solo Leveling</a>
            <span class="chapter-info">› Capítulo 1</span>
        </div>
        <div class="header-actions">
            <a href="\\\\lector\\paginas\\principal.html">
                <img src="logo p.png" alt="Logo de la empresa" class="logo">
            </a>
        </div>
        
    </header>

    <!-- Main content -->
    <main class="main-content" id="comic-container"></main>

    <!-- Comments Section -->
    <section class="comments-section" id="comments-section">
        <h2 class="comments-title">Comentarios</h2>
        <div id="comments-container">
            <p class="no-comments">Aún no hay comentarios para este capítulo, sé el primero.</p>
        </div>
        <form id="comment-form">
            <textarea id="comment-input" placeholder="Escribe tu comentario..."></textarea>
            <button type="submit">Enviar</button>
        </form>
    </section>

    <!-- Bottom navigation -->
    <nav class="chapter-navigation">
        <!-- Grupo izquierdo: Selector de capítulos y tema -->
        <div class="nav-group left">
            <div class="chapter-selector">
                <button class="action-button" id="chapter-list-button">
                    📑 Capítulo 1
                </button>
                <div class="chapter-list" id="chapter-list">
                    <!-- Lista de capítulos -->
                    <div class="chapter-item" data-chapter="1">Capítulo 1</div>
                    <div class="chapter-item" data-chapter="2">Capítulo 2</div>
                    <div class="chapter-item" data-chapter="3">Capítulo 3</div>
                </div>
            </div>
            <button class="theme-toggle" id="theme-toggle">
                💡 Enciende las luces
            </button>
        </div>
        
        <!-- Grupo central: Navegación de episodios -->
        <div class="nav-group center">
            <button class="nav-button" id="prev-chapter" aria-label="Episodio anterior">
                ← Episodio anterior
            </button>
            <button class="nav-button" id="next-chapter" aria-label="Próximo episodio">
                Próximo episodio →
            </button>
        </div>
        
        <!-- Grupo derecho: Zoom y comentarios -->
        <div class="nav-group right">
            <div class="zoom-controls">
                <button class="zoom-button" id="zoom-out" aria-label="Reducir zoom">-</button>
                <span class="zoom-value" id="zoom-value">100%</span>
                <button class="zoom-button" id="zoom-in" aria-label="Aumentar zoom">+</button>
            </div>
            <button class="action-button" id="toggle-comments">
                💬 Comentarios
            </button>
        </div>
    </nav>

    <script>
        const comicPages = [
            { src: "solo leveling/SL_Manh_01/0001.jpg", alt: "Página 1 del cómic" },
            { src: "solo leveling/SL_Manh_01/0002.jpg", alt: "Página 2 del cómic" },
            { src: "solo leveling/SL_Manh_01/0003.jpg", alt: "Página 3 del cómic" },
            { src: "solo leveling/SL_Manh_01/0004.jpg", alt: "Página 4 del cómic" },
            { src: "solo leveling/SL_Manh_01/0005.jpg", alt: "Página 5 del cómic" },
            { src: "solo leveling/SL_Manh_01/0006.jpg", alt: "Página 6 del cómic" },
            { src: "solo leveling/SL_Manh_01/0007.jpg", alt: "Página 7 del cómic" },
            { src: "solo leveling/SL_Manh_01/0008.jpg", alt: "Página 8 del cómic" },
            { src: "solo leveling/SL_Manh_01/0009.jpg", alt: "Página 9 del cómic" },
            { src: "solo leveling/SL_Manh_01/0010.jpg", alt: "Página 10 del cómic" }
        ];

        const comments = []; // Lista de comentarios (vacía por defecto)

        const comicContainer = document.getElementById('comic-container');
        const commentsContainer = document.getElementById('comments-container');
        const zoomValue = document.getElementById('zoom-value');
        const zoomIn = document.getElementById('zoom-in');
        const zoomOut = document.getElementById('zoom-out');
        const toggleCommentsButton = document.getElementById('toggle-comments');
        const commentsSection = document.getElementById('comments-section');
        const chapterListButton = document.getElementById('chapter-list-button');
        const chapterList = document.getElementById('chapter-list');
        const commentForm = document.getElementById('comment-form');
        const commentInput = document.getElementById('comment-input');
        const prevChapter = document.getElementById('prev-chapter');
        const nextChapter = document.getElementById('next-chapter');
        const chapterItems = document.querySelectorAll('.chapter-item');
        const themeToggle = document.getElementById('theme-toggle');

        let currentZoom = 100;
        let currentChapter = 1;
        let isDarkMode = true;

        function loadComicPages() {
            comicContainer.innerHTML = '';
            comicPages.forEach(page => {
                const img = document.createElement('img');
                img.src = page.src;
                img.alt = page.alt;
                img.className = 'comic-page';
                img.loading = 'lazy'; // Carga perezosa para mejor rendimiento
                comicContainer.appendChild(img);
            });
        }

        function loadComments() {
            commentsContainer.innerHTML = '';
            if (comments.length === 0) {
                const noComments = document.createElement('p');
                noComments.className = 'no-comments';
                noComments.textContent = 'Aún no hay comentarios para este capítulo, sé el primero.';
                commentsContainer.appendChild(noComments);
            } else {
                comments.forEach(comment => {
                    const commentEl = document.createElement('div');
                    commentEl.className = 'comment';
                    commentEl.textContent = comment;
                    commentsContainer.appendChild(commentEl);
                });
            }
        }

        function updateZoom() {
            zoomValue.textContent = `${currentZoom}%`;
            document.querySelectorAll('.comic-page').forEach(page => {
                page.style.width = `${currentZoom}%`;
            });
            // Guardar preferencia de zoom
            localStorage.setItem('zoom-level', currentZoom);
        }

        // Controles de zoom
        zoomIn.addEventListener('click', () => {
            currentZoom = Math.min(200, currentZoom + 10);
            updateZoom();
        });

        zoomOut.addEventListener('click', () => {
            currentZoom = Math.max(50, currentZoom - 10);
            updateZoom();
        });

        // Atajos de teclado para zoom
        document.addEventListener('keydown', (e) => {
            // Tecla + o Ctrl+Plus para aumentar zoom
            if (e.key === '+' || (e.ctrlKey && e.key === '=')) {
                e.preventDefault();
                zoomIn.click();
            }
            // Tecla - o Ctrl+Minus para reducir zoom
            else if (e.key === '-' || (e.ctrlKey && e.key === '-')) {
                e.preventDefault();
                zoomOut.click();
            }
            // Ctrl+0 para restablecer zoom
            else if (e.ctrlKey && e.key === '0') {
                e.preventDefault();
                currentZoom = 100;
                updateZoom();
            }
        });

        // Zoom con rueda del ratón
        comicContainer.addEventListener('wheel', (e) => {
            // Solo hacer zoom si la tecla Ctrl está presionada
            if (e.ctrlKey) {
                e.preventDefault();
                if (e.deltaY < 0) {
                    // Aumentar zoom
                    currentZoom = Math.min(200, currentZoom + 5);
                } else {
                    // Reducir zoom
                    currentZoom = Math.max(50, currentZoom - 5);
                }
                updateZoom();
            }
        }, { passive: false });

        // Cambiar tema (claro/oscuro)
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('light-mode');
            isDarkMode = !document.body.classList.contains('light-mode');
            
            // Actualizar texto del botón
            themeToggle.textContent = isDarkMode 
                ? '💡 Enciende las luces' 
                : '🌙 Apaga las luces';
            
            // Guardar preferencia de tema
            localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
        });

        // Mostrar/ocultar comentarios
        toggleCommentsButton.addEventListener('click', () => {
            commentsSection.classList.toggle('active');
            
            // Cambiar texto del botón según estado
            if (commentsSection.classList.contains('active')) {
                toggleCommentsButton.textContent = '💬 Ocultar comentarios';
                // Desplazar a la sección de comentarios
                commentsSection.scrollIntoView({ behavior: 'smooth' });
            } else {
                toggleCommentsButton.textContent = '💬 Comentarios';
            }
        });

        // Mostrar/ocultar lista de capítulos
        chapterListButton.addEventListener('click', (e) => {
            e.stopPropagation();
            chapterList.classList.toggle('active');
        });

        // Cerrar lista de capítulos al hacer clic fuera
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.chapter-selector')) {
                chapterList.classList.remove('active');
            }
        });

        // Enviar comentario
        commentForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const commentText = commentInput.value.trim();
            if (commentText) {
                comments.push(commentText);
                
                // Eliminar mensaje de "no hay comentarios"
                const noComments = commentsContainer.querySelector('.no-comments');
                if (noComments) {
                    noComments.remove();
                }
                
                // Agregar nuevo comentario
                const commentEl = document.createElement('div');
                commentEl.className = 'comment';
                commentEl.textContent = commentText;
                commentsContainer.appendChild(commentEl);
                
                // Limpiar campo de entrada
                commentInput.value = '';
            }
        });

        // Cambiar de capítulo
        chapterItems.forEach(item => {
            item.addEventListener('click', () => {
                const chapter = parseInt(item.getAttribute('data-chapter'));
                if (chapter !== currentChapter) {
                    currentChapter = chapter;
                    chapterListButton.textContent = `📑 Capítulo ${currentChapter}`;
                    chapterList.classList.remove('active');
                    
                    // Aquí se cargarían las páginas del nuevo capítulo
                    // Por ahora solo mostramos un mensaje en consola
                    console.log(`Cargando capítulo ${currentChapter}`);
                    
                    // Actualizar URL sin recargar la página
                    history.pushState(null, null, `/chapter/${currentChapter}`);
                }
            });
        });

        // Navegación entre capítulos
        prevChapter.addEventListener('click', () => {
            if (currentChapter > 1) {
                currentChapter--;
                chapterListButton.textContent = `📑 Capítulo ${currentChapter}`;
                console.log(`Cargando capítulo ${currentChapter}`);
                history.pushState(null, null, `/chapter/${currentChapter}`);
            }
        });

        nextChapter.addEventListener('click', () => {
            currentChapter++;
            chapterListButton.textContent = `📑 Capítulo ${currentChapter}`;
            console.log(`Cargando capítulo ${currentChapter}`);
            history.pushState(null, null, `/chapter/${currentChapter}`);
        });

        // Verificar preferencias guardadas
        function loadSavedPreferences() {
            // Cargar preferencia de zoom
            if (localStorage.getItem('zoom-level')) {
                currentZoom = parseInt(localStorage.getItem('zoom-level'));
                updateZoom();
            }
            
            // Cargar preferencia de tema
            if (localStorage.getItem('theme') === 'light') {
                document.body.classList.add('light-mode');
                isDarkMode = false;
                themeToggle.textContent = '🌙 Apaga las luces';
            }
        }

        // Inicializar la aplicación
        document.addEventListener('DOMContentLoaded', () => {
            loadComicPages();
            loadComments();
            loadSavedPreferences();
        });
    </script>
</body>
</html>
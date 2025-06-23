<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lector de manga</title>
    <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
        }

        .series-info-section {
            grid-column: 1 / -1;
            width: 100%;
            margin: 0 0 20px 0;
        }

        .series-card {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 20px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .series-image {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
        }

        .series-info {
            display: flex;
            flex-direction: column;
        }

        /* Layout components */
        header,
        footer {
            background-color: white;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        main {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 20px;
        }

        /* Manga header section */
        .container {
            max-width: 800px;

            margin: 20px auto;
            font-family: Arial, sans-serif;
        }



        .series-title {
            margin: 0;
            font-size: 32px;
            font-weight: bold;
            text-transform: uppercase;
            color: #222;
        }


        #generos {
            font-size: 21px;
            /* Tamaño similar a un h2 */
            font-weight: bold;
            /* Mantener el énfasis */
            color: #333;
            /* Color oscuro para legibilidad */
        }

        .series-subtitle {
            color: #666;
            margin: 5px 0 15px;
        }

        .metrics {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 15px;
        }

        .metric {
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .metric:hover {
            transform: scale(1.1);
        }

        .icon {
            font-size: 20px;
            transition: all 0.3s;
        }

        .counter {
            font-size: 16px;
            color: #444;
        }

        .share-dropdown {
            position: relative;
            display: inline-block;
        }

        .share-button {
            padding: 8px 16px;
            background: #42214b;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background-color 0.5s;
        }

        .share-button:hover {
            background: #572364;
        }

        .share-content {
            background: #321a3a;
            display: none;
            position: absolute;
            background: white;
            min-width: 160px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 5px 0;
            z-index: 1;
        }

        .share-dropdown:hover .share-content {
            display: block;
        }

        .share-option {
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.2s;
        }

        .share-option:hover {
            background: #572364;
        }

        .description {
            margin: 15px 0;
            color: #444;
            line-height: 1.5;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .watch-button {
    height: 28px; /* Define una altura fija */
    line-height: 28px; /* Asegura que el texto esté perfectamente centrado */
    padding: 0 12px; /* Mantiene ancho sin afectar altura */
    background: #2d1a35; /* Color de fondo */
    color: white; /* Color del texto */
    border-radius: 14px; /* Redondea los bordes (la mitad de la altura para un efecto más curvo) */
    text-align: center; /* Asegura alineación del texto */
    display: inline-flex; /* Permite centrar verticalmente */
    align-items: center; /* Centra el texto verticalmente */
    justify-content: center; /* Centra el texto horizontalmente */
}






        .watch-button:hover {
            background: #361d41;
            transform: scale(1.05);
        }

        .save-button {
            padding: 10px 20px;
            background: white;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .save-button:hover {
            background: #572364;
            border-color: #999;
        }

        /* Stats and buttons */
        .stats {
            display: flex;
            gap: 20px;
            margin: 15px 0;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #24132b;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }

        .btn-secondary {
            background-color: #f0f0f0;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Chapters and Novels section */
        .chapters-novels-section {
            width: 100%;
            background: white;
            padding: 20px;
            border-radius: 8px;
            grid-column: 1;
        }

        .tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .tab-button {
            padding: 10px 20px;
            cursor: pointer;
            background: none;
            border: none;
            font-size: 16px;
            color: #666;
        }

        .tab-button.active {
            color: #000;
            font-weight: 500;
            border-bottom: 2px solid #000;
        }

        .chapter-pagination {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .chapter-page-button {
            padding: 5px 12px;
            border: 1px solid #ddd;
            border-radius: 15px;
            background: white;
            cursor: pointer;
            font-size: 0.9em;
        }

        .chapter-page-button.active {
            background: #24132b;
            border-color: #24132b;
            color: white;
        }

        .chapter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
        }

        .chapter-item {
            padding: 10px;
            background: #f8f8f8;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .chapter-item:hover {
            background: #572364;
        }

        .novel-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            padding: 20px;
        }

        .novel-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }

        .novel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .novel-card:active {
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.12);
        }

        .novel-image {
            position: relative;
            width: 100%;
            padding-top: 140%;
            overflow: hidden;
        }

        .novel-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .novel-info {
            padding: 12px;
            background: white;
        }

        .novel-title {
            font-size: 1rem;
            font-weight: 500;
            margin: 0 0 4px 0;
            color: #333;
        }

        .novel-metadata {
            display: flex;
            gap: 10px;
            font-size: 0.875rem;
            color: #666;
        }

        /* Animated episodes section */
        .animated-episodes {
            width: 100%;
            grid-column: 2;
            background: white;
            padding: 20px;
            border-radius: 8px;
            height: fit-content;
        }

        .episode-pagination {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }

        .episode-page-button {
            padding: 5px 12px;
            border: 1px solid #ddd;
            border-radius: 15px;
            background: white;
            cursor: pointer;
            font-size: 0.9em;
        }

        .episode-page-button.active {
            background: #24132b;
            border-color: #24132b;
            color: white;
        }

        .episodes-grid {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .episode-card {
            display: flex;
            flex-direction: column;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .episode-card:hover {
            transform: translateX(5px);
        }

        .episode-thumbnail {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            background-color: #f0f0f0;
        }

        .episode-info {
            margin-top: 8px;
        }

        .episode-title {
            font-weight: 500;
            margin-bottom: 4px;
        }

        .episode-views {
            font-size: 0.9em;
            color: #666;
        }

        /* Comments section */
        .comments-section {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            grid-column: 1;
        }

        .comment-box {
            background: white;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .comment-input {
            width: 100%;
            min-height: 80px;
            padding: 12px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            resize: vertical;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .comment-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .file-input-label {
            background: #f0f0f0;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            color: #555;
        }

        .file-input {
            display: none;
        }

        .publish-button {
            background-color: #24132b;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .preview {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
        }

        .preview img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 4px;
            object-fit: cover;
        }

        .comments-list {
            margin-top: 20px;
        }

        .comment {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .comment-text {
            margin-bottom: 10px;
        }

        .comment-images {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .comment-images img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 4px;
            object-fit: cover;
        }

        .timestamp {
            font-size: 12px;
            color: #888;
            margin-top: 8px;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            main {
                grid-template-columns: 1fr;
            }

            .animated-episodes {
                grid-column: 1;
            }

            .manga-header {
                flex-direction: column;
            }

            .manga-cover {
                width: 100%;
                height: auto;
                max-width: 300px;
                margin: 0 auto;
            }
        }

        .footer {
            width: 100%;
            text-align: center;
            background-color: #1b1020;
            padding: 40px 20px;
            color: white;
            font-size: 14px;
        }

        footer a {
            color: white !important;
            /* Cambia el color de los enlaces a blanco */
            text-decoration: none;
            /* Opcional: elimina el subrayado */
        }

        .footer-content {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .footer-row {
            display: flex;
            justify-content: center;
            gap: 20px;
            width: 100%;
            text-align: center;
        }

        .footer-info {
            text-align: center;
            border-top: 1px solid #333;
            padding-top: 20px;
        }

        .footer-company,
        .footer-copyright,
        .footer-contact,
        .footer-legal {
            text-align: center;
            margin-bottom: 15px;
            width: 100%;
        }

        .social-icons {
            position: fixed;
            right: 20px;
            bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .social-icon:hover {
            background-color: #572364;
        }

        .featured-section {
            background-color: #321e3b;
            justify-content: center;
            padding: 2rem;
            margin: 0;
        }

        .featured-title {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        .actions {
    display: flex;
    flex-direction: column;
    align-items: start; /* Alinea los elementos a la izquierda */
}

.genre-buttons {
    display: flex;
    gap: 10px; /* Espacio entre botones */
    margin-bottom: 10px; /* Separa los géneros del botón guardar */
}

    </style>
</head>

<body>
    <main>
        <section class="series-info-section">
            <div class="series-card">
                <img src="solo leveling\portada.jpg" alt="Cinco Gatos" class="series-image">
                <div class="series-info">
                    <h1 class="series-title">Solo Leveling</h1>
                    <p class="series-subtitle">El monarca de las sombras</p>

                    <div class="metrics">
                        <div class="metric" id="views" onclick="toggleCounter('viewsCount', 'view-icon')">
                            <span class="icon" id="view-icon">👁️</span>
                            <span class="counter" id="viewsCount">0</span>
                        </div>
                        <div class="metric" id="likes" onclick="toggleCounter('likesCount', 'heart-icon')">
                            <span class="icon" id="heart-icon">💟</span>
                            <span class="counter" id="likesCount">0</span>
                        </div>
                        <div class="share-dropdown">
                            <button class="share-button">
                                <span>📤</span>
                                Compartir
                            </button>
                            <div class="share-content">
                                <a href="#" class="share-option" onclick="shareOn('whatsapp')">
                                    <span>📱</span> WhatsApp
                                </a>
                                <a href="#" class="share-option" onclick="shareOn('instagram')">
                                    <span>📸</span> Instagram
                                </a>
                            </div>
                        </div>
                    </div>

                    <p class="description">
                        El cazador de clase E Jinwoo Sung es el más débil de todos. Despreciado por todos, no tiene
                        dinero, no tiene habilidades para hablar y no tiene otras perspectivas laborales. Entonces,
                        cuando su grupo encuentra una mazmorra oculta, está decidido a aprovechar esta oportunidad para
                        cambiar su vida a mejor... pero la oportunidad que encuentra es un poco diferente de lo que
                        tenía en mente...
                    </p>

                    <div class="actions">
                        <h1 class="series-title" id="generos">Géneros</h1>
                        <div class="genre-buttons">
                            <button class="watch-button">Acción</button>
                            <button class="watch-button">Fantasía</button>
                            <button class="watch-button">Sobrenatural</button>
                        </div>
                        <div></div>
                        <button class="save-button" id="saveButton" onclick="toggleSave()">Guardar</button>
                    </div>
                    
            </div>
            </div>
        </section>

        <section class="chapters-novels-section">
            <div class="tabs">
                <button class="tab-button active" onclick="switchTab('chapters')">Lista de capítulos</button>
                <button class="tab-button" onclick="switchTab('novels')">Novela ligera</button>
            </div>

            <div id="chapters-section" class="tab-content">
                <div class="chapter-pagination">
                    <button class="chapter-page-button active" onclick="showChapterRange(1)">1 - 50</button>
                    <button class="chapter-page-button" onclick="showChapterRange(2)">51 - 100</button>
                </div>
                <div class="chapter-grid" id="chapters-1">
                    <!-- Chapters 1-50 will be generated here -->
                </div>
                <div class="chapter-grid" id="chapters-2" style="display: none;">
                    <!-- Chapters 51-100 will be generated here -->
                </div>
            </div>

            <div href="lector.html" id="novels-section" class="tab-content" style="display: none;">
                <div class="novel-grid">
                    <a class="novel-card" onclick="goToNovel(1, 'lector.html', event)">
                        <div class="novel-image">
                            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-BENVYfpGKQpXjC7kiQDo7hLKOurq3w.png"
                                alt="Portada de novela ligera">
                        </div>
                        <div class="novel-info">
                            <h3 class="novel-title">Miauricio</h3>
                            <div class="novel-metadata">
                                <span>2001</span>
                                <span>12</span>
                            </div>
                        </div>
                    </a>
                    <a href="lector.html" class="novel-card" onclick="goToNovel(2, 'lector.html', event)">
                        <div class="novel-image">
                            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-BENVYfpGKQpXjC7kiQDo7hLKOurq3w.png"
                                alt="Portada de novela ligera">
                        </div>
                        <div class="novel-info">
                            <h3 class="novel-title">Miauricio 2</h3>
                            <div class="novel-metadata">
                                <span>2002</span>
                                <span>15</span>
                            </div>
                        </div>
                    </a>
                    <a href="lector.html" class="novel-card" onclick="goToNovel(2, 'lectornovel2.html', event)">
                        <div class="novel-image">
                            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-BENVYfpGKQpXjC7kiQDo7hLKOurq3w.png"
                                alt="Portada de novela ligera">
                        </div>
                        <div class="novel-info">
                            <h3 class="novel-title">Miauricio 2</h3>
                            <div class="novel-metadata">
                                <span>2002</span>
                                <span>15</span>
                            </div>
                        </div>
                    </a>
                    <a href="lector.html" class="novel-card" onclick="goToNovel(2, 'lectornovel2.html', event)">
                        <div class="novel-image">
                            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-BENVYfpGKQpXjC7kiQDo7hLKOurq3w.png"
                                alt="Portada de novela ligera">
                        </div>
                        <div class="novel-info">
                            <h3 class="novel-title">Miauricio 2</h3>
                            <div class="novel-metadata">
                                <span>2002</span>
                                <span>15</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <aside class="animated-episodes">
            <h3>Capítulos animados</h3>
            <div class="episode-pagination">
                <button class="episode-page-button active" onclick="showAnimeRange(1)">1 - 6</button>
                <button class="episode-page-button" onclick="showAnimeRange(2)">7 - 12</button>
                <button class="episode-page-button" onclick="showAnimeRange(3)">13 - 18</button>
                <button class="episode-page-button" onclick="showAnimeRange(4)">19 - 24</button>
            </div>

            <div id="anime-episodes-1" class="episodes-grid">
                <!-- Episodes 1-6 will be generated here -->
            </div>
            <div id="anime-episodes-2" class="episodes-grid" style="display: none;">
                <!-- Episodes 7-12 will be generated here -->
            </div>
            <div id="anime-episodes-3" class="episodes-grid" style="display: none;">
                <!-- Episodes 13-18 will be generated here -->
            </div>
            <div id="anime-episodes-4" class="episodes-grid" style="display: none;">
                <!-- Episodes 19-24 will be generated here -->
            </div>
        </aside>

        <section class="comments-section">
            <h3>Comentarios</h3>
            <div class="comment-box">
                <textarea class="comment-input" placeholder="Escribe tu comentario..."></textarea>
                <div class="comment-actions">
                    <label for="fileInput" class="file-input-label">
                        Añadir imagen
                    </label>
                    <input type="file" id="fileInput" class="file-input" accept="image/*" multiple>
                    <button class="publish-button" onclick="publishComment()">Comentar</button>
                </div>
                <div id="preview" class="preview"></div>
            </div>
            <div id="commentsList" class="comments-list">
                <!-- Comments will be added here -->
            </div>
        </section>
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
    <script>
        function toggleCounter(counterId, iconId) {
            const counterElement = document.getElementById(counterId);
            const iconElement = document.getElementById(iconId);
            let currentCount = parseInt(counterElement.textContent);

            if (iconId === 'view-icon') {
                if (iconElement.textContent === '👁️') {
                    iconElement.textContent = '👁️‍🗨️';
                    currentCount++;
                } else {
                    iconElement.textContent = '👁️';
                    currentCount--;
                }
            } else if (iconId === 'heart-icon') {
                if (iconElement.textContent === '💟') {
                    iconElement.textContent = '💜';
                    currentCount++;
                } else {
                    iconElement.textContent = '💟';
                    currentCount--;
                }
            }

            counterElement.textContent = currentCount;
        }

        function shareOn(platform) {
            const url = window.location.href;
            let shareUrl;

            switch (platform) {
                case 'whatsapp':
                    shareUrl = `https://api.whatsapp.com/send?text=¡Mira esta serie increíble! ${url}`;
                    break;
                case 'instagram':
                    alert('Compartiendo en Instagram...');
                    return;
            }

            if (shareUrl) {
                window.open(shareUrl, '_blank');
            }
        }

        let isSaved = false;
        function toggleSave() {
            const saveButton = document.getElementById('saveButton');
            isSaved = !isSaved;

            if (isSaved) {
                saveButton.textContent = 'Guardado';
                saveButton.style.backgroundColor = '#1b1020';
                saveButton.style.color = 'white';
            } else {
                saveButton.textContent = 'Guardar';
                saveButton.style.backgroundColor = 'white';
                saveButton.style.color = '#333';
            }
        }
    </script>
    <script>
        // Chapter and Novel tab switching
        function switchTab(tabName) {
            const tabs = document.querySelectorAll('.tab-button');
            const sections = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => tab.classList.remove('active'));
            sections.forEach(section => section.style.display = 'none');

            document.querySelector(`.tab-button[onclick="switchTab('${tabName}')"]`).classList.add('active');
            document.getElementById(`${tabName}-section`).style.display = 'block';
        }

        // Chapter pagination
        function showChapterRange(range) {
            const chapterGrids = document.querySelectorAll('.chapter-grid');
            const paginationButtons = document.querySelectorAll('.chapter-page-button');

            chapterGrids.forEach(grid => grid.style.display = 'none');
            paginationButtons.forEach(button => button.classList.remove('active'));

            document.getElementById(`chapters-${range}`).style.display = 'grid';
            event.target.classList.add('active');
        }

        // Generate chapters
        function generateChapters() {
            const chapters1 = document.getElementById('chapters-1');
            const chapters2 = document.getElementById('chapters-2');

            // Lista de capítulos disponibles con sus archivos HTML correspondientes
            const availableChapters = [
                { number: 1, title: "El comienzo", file: "lector.html" },
                { number: 2, title: "La aventura continúa", file: "lector2.html" },
                { number: 3, title: "Nuevos desafíos", file: "lector3.html" },
                // Puedes agregar más capítulos aquí
            ];

            availableChapters.forEach(chapter => {
                const chapterElement = `
            <div class="chapter-item" onclick="goToChapter(${chapter.number}, '${chapter.file}')">
                ${chapter.number}. ${chapter.title}
            </div>
        `;

                if (chapter.number <= 50) {
                    chapters1.innerHTML += chapterElement;
                } else {
                    chapters2.innerHTML += chapterElement;
                }
            });

            // Si no hay capítulos en la segunda página, ocultamos el botón de paginación
            if (availableChapters.length <= 50) {
                document.querySelector('.chapter-page-button:nth-child(2)').style.display = 'none';
            }
        }

        // Generate anime episodes
        function generateAnimeEpisodes() {
            const availableEpisodes = [
                { number: 1, title: "Episodio 1", views: 50000, file: "reproducto.html" },
                { number: 2, title: "Episodio 2", views: 45000, file: "animado2.html" },
                { number: 3, title: "Episodio 3", views: 40000, file: "animado3.html" },
                // ... Agrega más episodios según sea necesario
            ];

            const episodesPerPage = 6;
            const totalPages = Math.ceil(availableEpisodes.length / episodesPerPage);

            for (let page = 1; page <= totalPages; page++) {
                const container = document.getElementById(`anime-episodes-${page}`);
                const startEp = (page - 1) * episodesPerPage;
                const endEp = Math.min(page * episodesPerPage, availableEpisodes.length);

                for (let i = startEp; i < endEp; i++) {
                    const episode = availableEpisodes[i];
                    container.innerHTML += `
                <div class="episode-card" onclick="watchEpisode(${episode.number}, '${episode.file}')">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-xL48AoikCsja7O4w4xLLm6h0y0kpdl.png" alt="Episodio ${episode.number}" class="episode-thumbnail">
                    <div class="episode-info">
                        <div class="episode-title">${episode.title}</div>
                        <div class="episode-views">${episode.views.toLocaleString()} reproducciones</div>
                    </div>
                </div>
            `;
                }
            }

            // Ocultar botones de paginación innecesarios
            for (let i = totalPages + 1; i <= 4; i++) {
                document.querySelector(`.episode-page-button:nth-child(${i})`).style.display = 'none';
            }
        }

        // Like functionality
        let isLiked = false;
        let likeCount = 500;

        function toggleSeriesLike() {
            const heart = document.getElementById('heart');
            const counter = document.getElementById('likeCount');

            isLiked = !isLiked;

            if (isLiked) {
                heart.textContent = '💜';
                likeCount++;
            } else {
                heart.textContent = '♡';
                likeCount--;
            }

            counter.textContent = likeCount;
        }

        // Comment functionality
        let selectedFiles = [];

        document.getElementById('fileInput').addEventListener('change', function (event) {
            const files = event.target.files;
            selectedFiles = Array.from(files);
            updatePreview();
        });

        function updatePreview() {
            const preview = document.getElementById('preview');
            preview.innerHTML = '';
            selectedFiles.forEach(file => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        }

        function publishComment() {
            const commentText = document.querySelector('.comment-input').value;
            if (!commentText.trim() && selectedFiles.length === 0) {
                alert('Por favor, escribe un comentario o selecciona una imagen.');
                return;
            }

            const comment = document.createElement('div');
            comment.className = 'comment';

            if (commentText.trim()) {
                const textDiv = document.createElement('div');
                textDiv.className = 'comment-text';
                textDiv.textContent = commentText;
                comment.appendChild(textDiv);
            }

            if (selectedFiles.length > 0) {
                const imagesDiv = document.createElement('div');
                imagesDiv.className = 'comment-images';
                selectedFiles.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        imagesDiv.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                });
                comment.appendChild(imagesDiv);
            }

            const timestamp = document.createElement('div');
            timestamp.className = 'timestamp';
            timestamp.textContent = new Date().toLocaleString();
            comment.appendChild(timestamp);

            document.getElementById('commentsList').prepend(comment);

            // Clear the form
            document.querySelector('.comment-input').value = '';
            document.getElementById('fileInput').value = '';
            document.getElementById('preview').innerHTML = '';
            selectedFiles = [];
        }

        // Navigation functions
        function goToChapter(chapterNumber, file) {
            window.location.href = `${file}?type=manga&chapter=${chapterNumber}`;
        }

        function watchEpisode(episodeNumber, file) {
            window.location.href = `${file}?type=anime&episode=${episodeNumber}`;
        }

        function goToFirstChapter() {
            // El primer capítulo siempre va a lector.html
            window.location.href = 'lector.html?type=manga&chapter=1';
        }

        function goToNovel(novelId, file, event) {
            event.preventDefault();
            window.location.href = `${file}?type=novel&id=${novelId}`;
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function () {
            generateChapters();
            generateAnimeEpisodes();
        });
    </script>
</body>

</html>
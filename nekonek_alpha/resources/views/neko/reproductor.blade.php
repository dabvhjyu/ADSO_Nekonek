<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reproductor de Video - Solo Leveling</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: black;
            min-height: 100vh;
            display: flex;
            overflow: hidden;
            font-family: Arial, sans-serif;
        }

        .video-container {
            position: relative;
            width: 100vw;
            height: 100vh;
            background: black;
        }

        video {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        video::-webkit-media-controls {
            display: none !important;
        }

        video::-webkit-media-controls-enclosure {
            display: none !important;
        }

        .video-title {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 24px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
            z-index: 10;
            text-align: center;
            background-color: rgba(66, 33, 75, 0.3);
            backdrop-filter: blur(5px);
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .video-title:hover {
            background-color: rgba(66, 33, 75, 0.4);
        }

        .progress-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 40px;
            background: linear-gradient(to top, rgba(66, 33, 75, 0.6), rgba(66, 33, 75, 0));
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .progress-container {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .time-display {
            color: white;
            font-size: 14px;
            min-width: 100px;
            text-align: center;
        }

        .progress {
            flex-grow: 1;
            height: 6px;
            background: rgba(255,255,255,0.3);
            cursor: pointer;
            position: relative;
            border-radius: 3px;
        }

        .progress-filled {
            background: linear-gradient(to right, #8e44ad, #9b59b6);
            height: 100%;
            width: 0%;
            position: absolute;
            border-radius: 3px;
            transition: width 0.1s ease-in-out;
        }

        .custom-controls {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            background: rgba(33, 16, 38, 0.4);
            padding: 30px 15px;
            border-radius: 20px;
            gap: 40px;
            width: 80px;
            z-index: 1000;
            transition: all 0.3s ease;
            backdrop-filter: blur(15px);
        }

        .custom-controls::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to right, rgba(33, 16, 38, 0.2), rgba(33, 16, 38, 0.05));
            border-radius: 20px;
            z-index: -1;
            backdrop-filter: blur(20px);
        }

        .control-button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 24px;
            transition: all 0.3s ease;
            border-radius: 10px;
        }

        .control-button:hover {
            transform: scale(1.1);
            color: white;
        }

        .volume-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .volume-slider-container {
            background: rgba(33, 16, 38, 0.3);
            padding: 10px 5px;
            border-radius: 10px;
            width: 40px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .volume-slider {
            -webkit-appearance: none;
            width: 100px;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            outline: none;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
            border-radius: 2px;
        }

        .volume-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            background: white;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .volume-slider::-moz-range-thumb {
            width: 16px;
            height: 16px;
            background: white;
            border-radius: 50%;
            cursor: pointer;
            border: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .episodes-menu {
            position: absolute;
            right: 100px;
            top: 50%;
            transform: translateY(-50%);
            width: 300px;
            max-height: 80vh;
            background: rgba(33, 16, 38, 0.95);
            border-radius: 8px;
            overflow-y: auto;
            display: none;
            color: rgba(255, 255, 255, 0.9);
            padding: 0;
            font-size: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
        }

        .episodes-menu.active {
            display: block;
        }

        .season-group {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .season-title {
            color: rgba(255, 255, 255, 0.5);
            padding: 15px;
            margin: 0;
            font-weight: normal;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.05);
        }

        .episode-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .episode-item {
            padding: 12px 15px;
            cursor: pointer;
            transition: background-color 0.2s;
            color: white;
        }

        .episode-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .episode-item.active {
            background-color: rgba(147, 51, 234, 0.3);
        }

        .episodes-menu::-webkit-scrollbar {
            width: 6px;
        }

        .episodes-menu::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .episodes-menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .episodes-menu::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .navigate-menu svg {
            width: 24px;
            height: 24px;
            stroke: currentColor;
        }

        :fullscreen .custom-controls {
            z-index: 2147483647;
        }

        :-webkit-full-screen .custom-controls {
            z-index: 2147483647;
        }

        :-moz-full-screen .custom-controls {
            z-index: 2147483647;
        }

        .volume-slider-container.active + .control-button {
            transform: translateY(-150px);
        }

        .video-container:fullscreen {
            background: black;
            width: 100vw;
            height: 100vh;
        }

        .video-container:fullscreen video {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .video-container:-webkit-full-screen {
            background: black;
            width: 100vw;
            height: 100vh;
        }

        .video-container:-moz-full-screen {
            background: black;
            width: 100vw;
            height: 100vh;
        }

        .video-container:-ms-fullscreen {
            background: black;
            width: 100vw;
            height: 100vh;
        }

        .video-container.hide-controls .video-title,
        .video-container.hide-controls .progress-bar,
        .video-container.hide-controls .custom-controls,
        .video-container.hide-controls .episodes-menu,
        .video-container.hide-controls .back-button {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.5s ease;
        }

        .video-container .video-title,
        .video-container .progress-bar,
        .video-container .custom-controls,
        .video-container .episodes-menu,
        .video-container .back-button {
            opacity: 1;
            transition: opacity 0.5s ease;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: rgba(30, 16, 34, 0.7);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: rgba(35, 12, 41, 0.9);
        }
    </style>
</head>
<body>
    <div class="video-container">
        <button class="back-button" id="backButton">Volver</button>
        <video id="myVideo">
            <source src="" type="video/mp4">
            Tu navegador no soporta el elemento de video.
        </video>
        <div id="videoTitle" class="video-title">Solo Leveling</div>
        <div class="progress-bar">
            <div class="progress-container">
                <div class="time-display">
                    <span id="currentTime">0:00</span> / <span id="duration">0:00</span>
                </div>
                <div class="progress" id="progress">
                    <div class="progress-filled" id="progressBar"></div>
                </div>
            </div>
        </div>
        <div class="custom-controls">
            <button class="control-button" id="playPause" title="Reproducir/Pausar" aria-label="Reproducir/Pausar">▶</button>
            <div class="volume-container">
                <button class="control-button" id="volumeToggle" title="Volumen" aria-label="Volumen">🔊</button>
                <div class="volume-slider-container">
                    <input type="range" class="volume-slider" id="volumeSlider" min="0" max="100" value="100" title="Control de volumen" aria-label="Control de volumen">
                </div>
            </div>
            <button class="control-button navigate-menu" id="navigate" title="Navegar temporada/capítulo" aria-label="Navegar temporada/capítulo">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            <button class="control-button" id="nextEpisode" title="Siguiente capítulo" aria-label="Siguiente capítulo">⏭</button>
            <button class="control-button" id="fullscreen" title="Pantalla completa" aria-label="Pantalla completa">⛶</button>
        </div>
        <div class="episodes-menu" id="episodesMenu">
            <div class="season-group">
                <h3 class="season-title">Temporada 1</h3>
                <ul class="episode-list" id="episodeList">
                    <!-- Los episodios se cargarán dinámicamente aquí -->
                </ul>
            </div>
        </div>
    </div>

    <script>
        const video = document.getElementById('myVideo');
        const playPause = document.getElementById('playPause');
        const volumeToggle = document.getElementById('volumeToggle');
        const volumeSlider = document.getElementById('volumeSlider');
        const volumeSliderContainer = document.getElementById('volumeSliderContainer');
        const progress = document.getElementById('progress');
        const progressBar = document.getElementById('progressBar');
        const currentTimeSpan = document.getElementById('currentTime');
        const durationSpan = document.getElementById('duration');
        const navigate = document.getElementById('navigate');
        const episodesMenu = document.getElementById('episodesMenu');
        const episodeList = document.getElementById('episodeList');
        const nextEpisodeButton = document.getElementById('nextEpisode');
        const videoTitle = document.getElementById('videoTitle');
        const backButton = document.getElementById('backButton');

        const episodes = {
            season1: [
                { number: 1, title: "I Solo Leveling", url: "solo leveling/SL_anim/Solo Leveling - 01.mp4" },
                { number: 2, title: "Dungeon Leveling", url: "solo leveling/SL_anim/Solo Leveling - 02.mp4" },
                { number: 2, title: "Dungeon Leveling", url: "solo leveling/SL_anim/Solo Leveling - 02.mp4" },
                { number: 3, title: "Dungeon and Hunters", url: "solo leveling/SL_anim/Solo Leveling - 03.mp4" },
                { number: 4, title: "Dungeon Clear", url: "solo leveling/SL_anim/Solo Leveling - 04.mp4" },
                { number: 5, title: "Dungeon Reopen", url: "solo leveling/SL_anim/Solo Leveling - 05.mp4" },
                { number: 6, title: "Rank Evaluation", url: "solo leveling/SL_anim/Solo Leveling - 06.mp4" },
                { number: 7, title: "Rank E", url: "solo leveling/SL_anim/Solo Leveling - 07.mp4" },
                { number: 8, title: "Rank D", url: "solo leveling/SL_anim/Solo Leveling - 08.mp4" },
                { number: 9, title: "Rank C", url: "solo leveling/SL_anim/Solo Leveling - 09.mp4" },
                { number: 10, title: "Rank B", url: "solo leveling/SL_anim/Solo Leveling - 10.mp4" },
                { number: 11, title: "Rank A", url: "solo leveling/SL_anim/Solo Leveling - 11.mp4" },
                { number: 12, title: "Rank S", url: "solo leveling/SL_anim/Solo Leveling - 12.mp4" }
            ]
        };

        let currentSeason = 1;
        let currentEpisode = 1;

        function loadEpisodes() {
            episodeList.innerHTML = '';
            episodes.season1.forEach((episode) => {
                const li = document.createElement('li');
                li.className = 'episode-item';
                li.dataset.episode = episode.number;
                li.textContent = `Episodio ${episode.number}: ${episode.title}`;
                li.addEventListener('click', () => loadEpisode(1, episode.number));
                episodeList.appendChild(li);
            });
        }

        function loadEpisode(seasonNumber, episodeNumber) {
            const season = episodes[`season${seasonNumber}`];
            if (!season) return;

            const episode = season.find(ep => ep.number === episodeNumber);
            if (!episode) return;

            currentSeason = seasonNumber;
            currentEpisode = episodeNumber;

            video.src = episode.url;
            videoTitle.textContent = `Episodio ${episode.number}: ${episode.title}`;
            
            updateActiveEpisode();
            
            video.play();
            
            episodesMenu.classList.remove('active');
        }

        function updateActiveEpisode() {
            const allEpisodes = document.querySelectorAll('.episode-item');
            allEpisodes.forEach(ep => {
                ep.classList.remove('active');
                if (parseInt(ep.dataset.episode) === currentEpisode) {
                    ep.classList.add('active');
                }
            });
        }

        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            seconds = Math.floor(seconds % 60);
            return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }

        video.addEventListener('timeupdate', () => {
            const percent = (video.currentTime / video.duration) * 100;
            progressBar.style.width = `${percent}%`;
            currentTimeSpan.textContent = formatTime(video.currentTime);
        });

        video.addEventListener('loadedmetadata', () => {
            durationSpan.textContent = formatTime(video.duration);
        });

        progress.addEventListener('click', (e) => {
            const progressTime = (e.offsetX / progress.offsetWidth) * video.duration;
            video.currentTime = progressTime;
        });

        playPause.addEventListener('click', () => {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
        });

        video.addEventListener('play', () => {
            playPause.textContent = '⏸';
            playPause.setAttribute('aria-label', 'Pausar');
        });

        video.addEventListener('pause', () => {
            playPause.textContent = '▶';
            playPause.setAttribute('aria-label', 'Reproducir');
        });

        volumeToggle.addEventListener('click', () => {
            if (video.volume > 0) {
                video.lastVolume = video.volume;
                video.volume = 0;
                volumeSlider.value = 0;
            } else {
                video.volume = video.lastVolume || 1;
                volumeSlider.value = video.volume * 100;
            }
            updateVolumeIcon();
            saveVolumePreference();
        });

        volumeSlider.addEventListener('input', () => {
            video.volume = volumeSlider.value / 100;
            updateVolumeIcon();
            saveVolumePreference();
        });

        function updateVolumeIcon() {
            if (video.volume === 0) {
                volumeToggle.textContent = '🔇';
                volumeToggle.setAttribute('aria-label', 'Activar sonido');
            } else if (video.volume < 0.5) {
                volumeToggle.textContent = '🔉';
                volumeToggle.setAttribute('aria-label', 'Subir volumen');
            } else {
                volumeToggle.textContent = '🔊';
                volumeToggle.setAttribute('aria-label', 'Bajar volumen');
            }
        }

        function saveVolumePreference() {
            localStorage.setItem('videoVolume', video.volume);
        }

        function loadVolumePreference() {
            const savedVolume = localStorage.getItem('videoVolume');
            if (savedVolume !== null) {
                video.volume = parseFloat(savedVolume);
                volumeSlider.value = video.volume * 100;
                updateVolumeIcon();
            }
        }

        const videoContainer = document.querySelector('.video-container');

        document.getElementById('fullscreen').addEventListener('click', () => {
            if (!document.fullscreenElement) {
                if (videoContainer.requestFullscreen) {
                    videoContainer.requestFullscreen();
                } else if (videoContainer.mozRequestFullScreen) {
                    videoContainer.mozRequestFullScreen();
                } else if (videoContainer.webkitRequestFullscreen) {
                    videoContainer.webkitRequestFullscreen();
                } else if (videoContainer.msRequestFullscreen) {
                    videoContainer.msRequestFullscreen();
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
        });

        document.addEventListener('fullscreenchange', updateControlsVisibility);
        document.addEventListener('webkitfullscreenchange', updateControlsVisibility);
        document.addEventListener('mozfullscreenchange', updateControlsVisibility);
        document.addEventListener('MSFullscreenChange', updateControlsVisibility);

        let hideControlsTimeout;
        let isFullscreen = false;

        function showControls() {
            videoContainer.classList.remove('hide-controls');
            clearTimeout(hideControlsTimeout);
            if (isFullscreen) {
                hideControlsTimeout = setTimeout(() => {
                    videoContainer.classList.add('hide-controls');
                }, 10000); // 10 segundos
            }
        }

        function updateFullscreenStatus() {
            isFullscreen = !!(document.fullscreenElement || document.webkitFullscreenElement || 
                document.mozFullScreenElement || document.msFullscreenElement);
            
            if (isFullscreen) {
                showControls();
            } else {
                clearTimeout(hideControlsTimeout);
                videoContainer.classList.remove('hide-controls');
            }
        }

        document.addEventListener('fullscreenchange', updateFullscreenStatus);
        document.addEventListener('webkitfullscreenchange', updateFullscreenStatus);
        document.addEventListener('mozfullscreenchange', updateFullscreenStatus);
        document.addEventListener('MSFullscreenChange', updateFullscreenStatus);

        videoContainer.addEventListener('mousemove', showControls);
        videoContainer.addEventListener('mouseenter', showControls);

        function updateControlsVisibility() {
            updateFullscreenStatus();
        }

        navigate.addEventListener('click', (e) => {
            e.stopPropagation();
            episodesMenu.classList.toggle('active');
        });

        document.addEventListener('click', (e) => {
            if (!navigate.contains(e.target) && !episodesMenu.contains(e.target)) {
                episodesMenu.classList.remove('active');
            }
        });

        nextEpisodeButton.addEventListener('click', () => {
            const nextEpisodeNumber = currentEpisode + 1;
            const season = episodes[`season${currentSeason}`];
            
            if (season && nextEpisodeNumber <= season.length) {
                loadEpisode(currentSeason, nextEpisodeNumber);
            } else if (episodes[`season${currentSeason + 1}`]) {
                loadEpisode(currentSeason + 1, 1);
            }
        });

        video.addEventListener('ended', () => {
            const nextEpisodeNumber = currentEpisode + 1;
            const season = episodes[`season${currentSeason}`];
            
            if (season && nextEpisodeNumber <= season.length) {
                loadEpisode(currentSeason, nextEpisodeNumber);
            } else if (episodes[`season${currentSeason + 1}`]) {
                loadEpisode(currentSeason + 1, 1);
            }
        });

        backButton.addEventListener('click', () => {
            window.history.back();
        });

        loadEpisodes();
        loadVolumePreference();
        loadEpisode(1, 1);
        updateFullscreenStatus();
    </script>
</body>
</html>
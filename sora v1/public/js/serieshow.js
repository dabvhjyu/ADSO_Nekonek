document.addEventListener('DOMContentLoaded', function() {
    // Cambio de pestañas de sección
    const sectionTabs = document.querySelectorAll('.section-tab');
    const sectionPanels = document.querySelectorAll('.section-panel');
    
    sectionTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remover clase active de todas las pestañas
            sectionTabs.forEach(t => t.classList.remove('active'));
            
            // Añadir clase active a la pestaña actual
            this.classList.add('active');
            
            // Obtener la sección a mostrar
            const sectionToShow = this.getAttribute('data-section');
            
            // Ocultar todos los paneles
            sectionPanels.forEach(panel => panel.classList.remove('active'));
            
            // Mostrar el panel correspondiente
            document.getElementById(`${sectionToShow}-panel`).classList.add('active');
        });
    });
    
    // Botones de seguir
    const followButtons = document.querySelectorAll('.follow-button, .follow-creator-button');
    
    followButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Cambiar el estado del botón
            if (this.textContent.includes('Seguir')) {
                this.innerHTML = '<i class="fas fa-check"></i> Siguiendo';
                this.style.backgroundColor = '#4a2963';
            } else {
                this.innerHTML = '<i class="fas fa-user-plus"></i> Seguir';
                this.style.backgroundColor = '';
            }
        });
    });
    
    // Botón de compartir
    const shareButton = document.querySelector('.share-button');
    
    if (shareButton) {
        shareButton.addEventListener('click', function() {
            // Verificar si la API de compartir está disponible
            if (navigator.share) {
                navigator.share({
                    title: 'Solo Leveling',
                    text: 'Mira esta increíble serie: Solo Leveling',
                    url: window.location.href
                })
                .then(() => console.log('Contenido compartido exitosamente'))
                .catch((error) => console.log('Error al compartir:', error));
            } else {
                // Fallback para navegadores que no soportan la API de compartir
                alert('Enlace copiado al portapapeles');
                console.log('Compartir no está disponible en este navegador');
            }
        });
    }
    
    // Efecto hover para los elementos de galería
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    galleryItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.querySelector('.gallery-overlay').style.opacity = '1';
        });
        
        item.addEventListener('mouseleave', function() {
            this.querySelector('.gallery-overlay').style.opacity = '0.7';
        });
    });
    
    // Efecto hover para los elementos de series relacionadas
    const seriesItems = document.querySelectorAll('.series-item');
    
    seriesItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.querySelector('.series-overlay').style.opacity = '1';
        });
        
        item.addEventListener('mouseleave', function() {
            this.querySelector('.series-overlay').style.opacity = '0.7';
        });
    });
    
    // Reproducción de episodios
    const episodeItems = document.querySelectorAll('.episode-item');
    
    episodeItems.forEach(item => {
        item.addEventListener('click', function() {
            const episodeTitle = this.querySelector('.episode-title').textContent;
            console.log(`Reproduciendo: ${episodeTitle}`);
            
            // Aquí se implementaría la lógica para reproducir el episodio
            // Por ahora, solo mostraremos un mensaje
            alert(`Reproduciendo: ${episodeTitle}`);
        });
    });
    
    // Navegación a capítulos
    const chapterItems = document.querySelectorAll('.chapter-item');
    
    chapterItems.forEach(item => {
        item.addEventListener('click', function() {
            const chapterNumber = this.querySelector('.chapter-number').textContent;
            const chapterTitle = this.querySelector('.chapter-title').textContent;
            console.log(`Abriendo: ${chapterNumber} - ${chapterTitle}`);
            
            // Aquí se implementaría la lógica para abrir el capítulo
            // Por ahora, solo mostraremos un mensaje
            alert(`Abriendo: ${chapterNumber} - ${chapterTitle}`);
        });
    });
});
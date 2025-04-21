// Script para manejar la interacción con los rankings y el carrusel
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar el carrusel manualmente para asegurar que funcione
    var mainCarouselElement = document.getElementById('mainCarousel');
    if (mainCarouselElement) {
        // Declare bootstrap if it's not already available globally
        if (typeof bootstrap === 'undefined') {
            console.error('Bootstrap is not defined. Ensure Bootstrap is properly included.');
            return; // Exit if Bootstrap is not available
        }
        var mainCarousel = new bootstrap.Carousel(mainCarouselElement, {
            interval: 8000,
            pause: 'hover',
            ride: 'carousel',
            wrap: true
        });
        
        // Asegurarse de que el carrusel comience a funcionar
        setTimeout(function() {
            mainCarousel.cycle();
        }, 1000);
    }
    
    // Función para manejar la visualización de detalles en los rankings
    const rankingItems = document.querySelectorAll('.ranking-item');
    
    rankingItems.forEach(item => {
        item.addEventListener('click', function() {
            const details = this.querySelector('.ranking-details');
            
            // Si los detalles están visibles, ocultarlos
            if (window.getComputedStyle(details).display !== 'none') {
                details.style.display = 'none';
            } else {
                // Ocultar todos los detalles primero
                document.querySelectorAll('.ranking-details').forEach(d => {
                    d.style.display = 'none';
                });
                
                // Mostrar los detalles del elemento clickeado
                details.style.display = 'block';
            }
        });
    });

    // Inicializar todos los tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function(tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Inicializar todas las pestañas
    var tabElList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tab"]'));
    tabElList.forEach(function(tabEl) {
        new bootstrap.Tab(tabEl);
    });
});
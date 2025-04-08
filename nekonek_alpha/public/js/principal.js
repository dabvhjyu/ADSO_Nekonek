//carrucel y todos sus elementos//

document.addEventListener('DOMContentLoaded', function() {
    // Variables
    const slides = document.querySelectorAll('.slide');
    const indicators = document.querySelectorAll('.indicator');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    let currentSlide = 0;
    let slideInterval;
    
    // Funciones
    function showSlide(index) {
        // Ocultar slide actual
        slides[currentSlide].classList.remove('active');
        indicators[currentSlide].classList.remove('active');
        
        // Actualizar índice
        currentSlide = index;
        
        // Si el índice es mayor que el número de slides, volver al primero
        if (currentSlide >= slides.length) {
            currentSlide = 0;
        }
        
        // Si el índice es menor que 0, ir al último slide
        if (currentSlide < 0) {
            currentSlide = slides.length - 1;
        }
        
        // Mostrar nuevo slide
        slides[currentSlide].classList.add('active');
        indicators[currentSlide].classList.add('active');
    }
    
    function nextSlide() {
        showSlide(currentSlide + 1);
    }
    
    function prevSlide() {
        showSlide(currentSlide - 1);
    }
    
    function startSlideshow() {
        slideInterval = setInterval(nextSlide, 10000); // Cambiado a 10000ms (10 segundos)
    }
    
    function stopSlideshow() {
        clearInterval(slideInterval);
    }
    
    // Event Listeners
    prevBtn.addEventListener('click', function() {
        prevSlide();
        stopSlideshow();
        startSlideshow();
    });
    
    nextBtn.addEventListener('click', function() {
        nextSlide();
        stopSlideshow();
        startSlideshow();
    });
    
    indicators.forEach(function(indicator) {
        indicator.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            showSlide(index);
            stopSlideshow();
            startSlideshow();
        });
    });
    
    // Iniciar slideshow automático
    startSlideshow();
});



// scritp para los rank
document.addEventListener('DOMContentLoaded', function() {
    // Manejar hover en dispositivos táctiles
    const rankingItems = document.querySelectorAll('.ranking-item');
    
    rankingItems.forEach(item => {
        item.addEventListener('touchstart', function() {
            const wasExpanded = this.classList.contains('expanded');
            
            // Cerrar todos los items expandidos
            rankingItems.forEach(i => i.classList.remove('expanded'));
            
            // Si no estaba expandido, expandirlo
            if (!wasExpanded) {
                this.classList.add('expanded');
            }
        });
    });
});














    document.addEventListener('DOMContentLoaded', function() {
      const tabButtons = document.querySelectorAll('.tab-button');
      const seriesGrids = document.querySelectorAll('.series-grid');
    
      tabButtons.forEach(button => {
        button.addEventListener('click', () => {
          // Remove active class from all buttons and grids
          tabButtons.forEach(btn => btn.classList.remove('active'));
          seriesGrids.forEach(grid => grid.classList.remove('active'));
    
          // Add active class to clicked button and corresponding grid
          button.classList.add('active');
          const tabId = button.getAttribute('data-tab');
          document.getElementById(tabId).classList.add('active');
        });
      });
    });



    document.addEventListener('DOMContentLoaded', function() {
      const genreTabButtons = document.querySelectorAll('.genre-tab-button');
      const genreGrids = document.querySelectorAll('.genre-grid');
    
      genreTabButtons.forEach(button => {
        button.addEventListener('click', () => {
          // Remove active class from all buttons and grids
          genreTabButtons.forEach(btn => btn.classList.remove('active'));
          genreGrids.forEach(grid => grid.classList.remove('active'));
    
          // Add active class to clicked button and corresponding grid
          button.classList.add('active');
          const tabId = button.getAttribute('data-tab');
          document.getElementById(tabId).classList.add('active');
        });
      });
    });



document.addEventListener('DOMContentLoaded', function() {
    const userAvatar = document.querySelector('.user-avatar');
    const dropdownContent = document.querySelector('.dropdown-content');

    userAvatar.addEventListener('click', function(event) {
        dropdownContent.classList.toggle('show');
        this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true');
        event.stopPropagation();
    });

    document.addEventListener('click', function(event) {
        if (!event.target.matches('.user-avatar')) {
            if (dropdownContent.classList.contains('show')) {
                dropdownContent.classList.remove('show');
                userAvatar.setAttribute('aria-expanded', 'false');
            }
        }
    });
});

function redirectToAllGenres() {
  window.location.href = "infoseries.html";
}





    document.addEventListener('DOMContentLoaded', function() {
        const userAvatar = document.querySelector('.user-avatar');
        const dropdownContent = document.querySelector('.user-dropdown .dropdown-content');

        userAvatar.addEventListener('click', function(e) {
            e.preventDefault();
            dropdownContent.classList.toggle('show');
            this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true');
        });

        // Close the dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!userAvatar.contains(e.target) && !dropdownContent.contains(e.target)) {
                dropdownContent.classList.remove('show');
                userAvatar.setAttribute('aria-expanded', 'false');
            }
        });
    });
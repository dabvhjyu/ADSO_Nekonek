document.addEventListener('DOMContentLoaded', function() {
  // Elementos del DOM
  const coverContainer = document.getElementById('cover-container');
  const coverInput = document.getElementById('cover-image');
  const coverPreview = document.getElementById('cover-preview');
  const coverPlaceholder = document.getElementById('cover-placeholder');
  const removeCoverBtn = document.getElementById('remove-cover');
  
  const thumbnailContainer = document.getElementById('thumbnail-container');
  const thumbnailInput = document.getElementById('thumbnail-image');
  const thumbnailPreview = document.getElementById('thumbnail-preview');
  const thumbnailPlaceholder = document.getElementById('thumbnail-placeholder');
  const removeThumbnailBtn = document.getElementById('remove-thumbnail');
  
  const selectedGenresContainer = document.getElementById('selected-genres');
  const genresGrid = document.getElementById('genres-grid');
  const form = document.getElementById('seriesForm');
  const cancelBtn = document.getElementById('cancel-btn');
  
  // Lista de géneros disponibles con sus IDs correspondientes
  const GENEROS = [
      { id: 5, nombre: "Aventura" },
      { id: 6, nombre: "Drama" },
      { id: 4, nombre: "Harem" },
      { id: 8, nombre: "Romance" },
      { id: 3, nombre: "Seinen" },
      { id: 2, nombre: "Shōjo" },
      { id: 1, nombre: "Shōnen" },
      { id: 7, nombre: "Terror" }
  ];
  
  // Estado para los géneros seleccionados (ahora guardamos objetos con id y nombre)
  let selectedGenres = [];
  
  // Inicializar la cuadrícula de géneros
  function initGenresGrid() {
      genresGrid.innerHTML = '';
      GENEROS.forEach(genre => {
          // Verificamos si el género ya está seleccionado por su ID
          if (!selectedGenres.some(g => g.id === genre.id)) {
              const badge = document.createElement('div');
              badge.className = 'genre-badge genre-badge-outline';
              badge.textContent = genre.nombre;
              badge.dataset.genreId = genre.id; // Guardamos el ID como atributo data
              badge.addEventListener('click', () => addGenre(genre));
              genresGrid.appendChild(badge);
          }
      });
  }
  
  // Actualizar los géneros seleccionados
  function updateSelectedGenres() {
      selectedGenresContainer.innerHTML = '';
      selectedGenres.forEach(genre => {
          const badge = document.createElement('div');
          badge.className = 'genre-badge';
          badge.innerHTML = `${genre.nombre} <i class="fas fa-times"></i>`;
          badge.dataset.genreId = genre.id; // Guardamos el ID como atributo data
          badge.addEventListener('click', () => removeGenre(genre.id));
          selectedGenresContainer.appendChild(badge);
      });
  }
  
  // Añadir un género
  function addGenre(genre) {
      if (selectedGenres.length < 5 && !selectedGenres.some(g => g.id === genre.id)) {
          selectedGenres.push(genre);
          updateSelectedGenres();
          initGenresGrid();
          createHiddenGenreFields(); // Actualizamos los campos ocultos
      }
  }
  
  // Eliminar un género
  function removeGenre(genreId) {
      selectedGenres = selectedGenres.filter(g => g.id !== genreId);
      updateSelectedGenres();
      initGenresGrid();
      createHiddenGenreFields(); // Actualizamos los campos ocultos
  }
  
  // Manejar la carga de la imagen de portada
  coverContainer.addEventListener('click', () => {
      coverInput.click();
  });
  
  coverInput.addEventListener('change', (e) => {
      if (e.target.files && e.target.files[0]) {
          const reader = new FileReader();
          reader.onload = (e) => {
              coverPreview.src = e.target.result;
              coverPreview.classList.remove('hidden');
              coverPlaceholder.classList.add('hidden');
              removeCoverBtn.classList.remove('hidden');
          };
          reader.readAsDataURL(e.target.files[0]);
      }
  });
  
  removeCoverBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      coverInput.value = '';
      coverPreview.src = '#';
      coverPreview.classList.add('hidden');
      coverPlaceholder.classList.remove('hidden');
      removeCoverBtn.classList.add('hidden');
  });
  
  // Manejar la carga de la imagen de miniatura
  thumbnailContainer.addEventListener('click', () => {
      thumbnailInput.click();
  });
  
  thumbnailInput.addEventListener('change', (e) => {
      if (e.target.files && e.target.files[0]) {
          const reader = new FileReader();
          reader.onload = (e) => {
              thumbnailPreview.src = e.target.result;
              thumbnailPreview.classList.remove('hidden');
              thumbnailPlaceholder.classList.add('hidden');
              removeThumbnailBtn.classList.remove('hidden');
          };
          reader.readAsDataURL(e.target.files[0]);
      }
  });
  
  removeThumbnailBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      thumbnailInput.value = '';
      thumbnailPreview.src = '#';
      thumbnailPreview.classList.add('hidden');
      thumbnailPlaceholder.classList.remove('hidden');
      removeThumbnailBtn.classList.add('hidden');
  });
  
  // Crear campos ocultos para los géneros seleccionados
  function createHiddenGenreFields() {
      // Primero eliminamos cualquier campo oculto de géneros que pudiera existir
      document.querySelectorAll('.hidden-genre-field').forEach(field => field.remove());
      
      // Creamos campos ocultos para cada género seleccionado
      selectedGenres.forEach((genre, index) => {
          const hiddenField = document.createElement('input');
          hiddenField.type = 'hidden';
          hiddenField.name = `genero_${index + 1}_id`;
          hiddenField.value = genre.id;
          hiddenField.className = 'hidden-genre-field';
          form.appendChild(hiddenField);
      });
  }
  
  // Manejar el envío del formulario
  form.addEventListener('submit', function(e) {
      // Validar que al menos un género esté seleccionado
      if (selectedGenres.length === 0) {
          e.preventDefault();
          alert('Por favor, selecciona al menos un género');
          return false;
      }
      
      // Asegurarse de que los campos ocultos de géneros estén actualizados
      createHiddenGenreFields();
      
      // El formulario se enviará normalmente con los campos name correctos
      return true;
  });
  
  // Botón cancelar
  cancelBtn.addEventListener('click', () => {
      if (confirm('¿Estás seguro de que deseas cancelar? Los cambios no guardados se perderán.')) {
          form.reset();
          coverPreview.src = '#';
          coverPreview.classList.add('hidden');
          coverPlaceholder.classList.remove('hidden');
          removeCoverBtn.classList.add('hidden');
          
          thumbnailPreview.src = '#';
          thumbnailPreview.classList.add('hidden');
          thumbnailPlaceholder.classList.remove('hidden');
          removeThumbnailBtn.classList.add('hidden');
          
          selectedGenres = [];
          updateSelectedGenres();
          initGenresGrid();
          
          // Eliminar los campos ocultos de géneros
          document.querySelectorAll('.hidden-genre-field').forEach(field => field.remove());
      }
  });
  
  // Inicializar la interfaz
  initGenresGrid();
  createHiddenGenreFields(); // Inicializar campos ocultos
});
  
  
  
  
document.addEventListener('DOMContentLoaded', function() {
    // Referencias a elementos del DOM
    const coverContainer = document.getElementById('cover-container');
    const coverInput = document.getElementById('miniatura_vertical');
    const coverPreview = document.getElementById('cover-preview');
    const coverPlaceholder = document.getElementById('cover-placeholder');
    const removeCoverBtn = document.getElementById('remove-cover');
    
    const thumbnailContainer = document.getElementById('thumbnail-container');
    const thumbnailInput = document.getElementById('miniatura_cuadrada');
    const thumbnailPreview = document.getElementById('thumbnail-preview');
    const thumbnailPlaceholder = document.getElementById('thumbnail-placeholder');
    const removeThumbnailBtn = document.getElementById('remove-thumbnail');
    
    const selectedGenresContainer = document.getElementById('selected-genres');
    const genresGrid = document.getElementById('genres-grid');
    const genresInput = document.getElementById('generos_id');
    const form = document.getElementById('seriesForm');
    const cancelBtn = document.getElementById('cancel-btn');
    
    // Estado para el género seleccionado (ahora solo uno)
    let selectedGenre = null;
    
    // Inicializar eventos para las imágenes
    initImageUploads();
    
    // Inicializar eventos para la selección de género
    initGenreSelection();
    
    // Inicializar validación del formulario
    initFormValidation();
    
    // Función para manejar la carga de imágenes
    function initImageUploads() {
        // Portada vertical
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
        
        // Miniatura cuadrada
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
    }
    
    // Función para manejar la selección de género (modificada para un solo género)
    function initGenreSelection() {
        // Añadir evento click a cada opción de género
        const genreOptions = document.querySelectorAll('.genre-option');
        genreOptions.forEach(option => {
            option.addEventListener('click', function() {
                const genreId = this.getAttribute('data-value');
                const genreName = this.textContent;
                
                // Desmarcar el género previamente seleccionado
                if (selectedGenre) {
                    const previousOption = document.querySelector(`.genre-option[data-value="${selectedGenre.id}"]`);
                    if (previousOption) {
                        previousOption.classList.remove('selected');
                    }
                }
                
                // Si se hace clic en el mismo género, deseleccionarlo
                if (selectedGenre && selectedGenre.id === genreId) {
                    selectedGenre = null;
                } else {
                    // Seleccionar el nuevo género
                    selectedGenre = { id: genreId, name: genreName };
                    this.classList.add('selected');
                }
                
                // Actualizar la visualización y el input hidden
                updateSelectedGenreDisplay();
                updateGenreInput();
            });
        });
    }
    
    // Actualizar la visualización del género seleccionado
    function updateSelectedGenreDisplay() {
        selectedGenresContainer.innerHTML = '';
        
        if (selectedGenre) {
            const badge = document.createElement('span');
            badge.className = 'genre-badge';
            badge.innerHTML = `${selectedGenre.name} <i class="fas fa-times"></i>`;
            
            badge.addEventListener('click', function() {
                removeGenre();
            });
            
            selectedGenresContainer.appendChild(badge);
        }
    }
    
    // Eliminar el género seleccionado
    function removeGenre() {
        if (selectedGenre) {
            // Quitar la clase 'selected' de la opción correspondiente
            const option = document.querySelector(`.genre-option[data-value="${selectedGenre.id}"]`);
            if (option) {
                option.classList.remove('selected');
            }
            
            // Limpiar el género seleccionado
            selectedGenre = null;
            
            // Actualizar la visualización y el input hidden
            updateSelectedGenreDisplay();
            updateGenreInput();
        }
    }
    
    // Actualizar el input hidden con el ID del género
    function updateGenreInput() {
        genresInput.value = selectedGenre ? selectedGenre.id : '';
    }
    
    // Inicializar la validación del formulario
    function initFormValidation() {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Limpiar mensajes de error previos
            clearErrors();
            
            // Validar campos requeridos
            let isValid = true;
            
            // Validar título
            if (!document.getElementById('titulo').value.trim()) {
                showFieldError('titulo', 'El título es obligatorio');
                isValid = false;
            }
            
            // Validar estado
            if (!document.getElementById('estado_id').value) {
                showFieldError('estado_id', 'Debes seleccionar un estado');
                isValid = false;
            }
            
            // Validar descripción
            if (!document.getElementById('descripcion').value.trim()) {
                showFieldError('descripcion', 'La descripción es obligatoria');
                isValid = false;
            }
            
            // Validar que haya un género seleccionado
            if (!selectedGenre) {
                showError('Debes seleccionar un género', document.querySelector('.genres-grid').parentNode);
                isValid = false;
            }
            
            // Validar imágenes
            if (!coverInput.files || !coverInput.files[0]) {
                showError('La imagen de portada es obligatoria', coverContainer.parentNode);
                isValid = false;
            }
            
            if (!thumbnailInput.files || !thumbnailInput.files[0]) {
                showError('La miniatura es obligatoria', thumbnailContainer.parentNode);
                isValid = false;
            }
            
            // Si todo es válido, enviar el formulario
            if (isValid) {
                // Mostrar mensaje de éxito
                showSuccessMessage('Serie creada con éxito');
                
                // CORRECCIÓN: Enviar el formulario realmente
                // Pequeño retraso para que el usuario vea el mensaje de éxito
                setTimeout(() => {
                    form.submit(); // Esta línea estaba comentada y era el problema
                }, 1000);
            }
        });
        
        // Botón cancelar
        cancelBtn.addEventListener('click', function() {
            if (confirm('¿Estás seguro de que deseas cancelar? Los cambios no guardados se perderán.')) {
                // Redireccionar a la página anterior o a la biblioteca
                window.location.href = '/biblioteca'; // Descomentado para producción
            }
        });
    }
    
    // Mostrar mensaje de error para un campo específico
    function showFieldError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        
        field.classList.add('error');
        field.parentNode.appendChild(errorDiv);
    }
    
    // Mostrar mensaje de error general
    function showError(message, container = null) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        
        if (container) {
            container.appendChild(errorDiv);
        } else {
            // Añadir al final del formulario
            form.appendChild(errorDiv);
        }
    }
    
    // Limpiar todos los mensajes de error
    function clearErrors() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(msg => msg.remove());
        
        const errorFields = document.querySelectorAll('.error');
        errorFields.forEach(field => field.classList.remove('error'));
    }
    
    // Mostrar mensaje de éxito
    function showSuccessMessage(message) {
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.textContent = message;
        
        document.body.appendChild(successDiv);
        
        // No eliminamos el mensaje después de un tiempo porque la página se redirigirá
        // cuando se envíe el formulario
    }
});
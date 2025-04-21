document.addEventListener('DOMContentLoaded', function() {
    // Referencias a elementos del DOM
    const coverContainer = document.getElementById('cover-container');
    const coverPlaceholder = document.getElementById('cover-placeholder');
    const coverPreview = document.getElementById('cover-preview');
    const removeCoverBtn = document.getElementById('remove-cover');
    const coverInput = document.getElementById('miniatura_vertical');
    
    const thumbnailContainer = document.getElementById('thumbnail-container');
    const thumbnailPlaceholder = document.getElementById('thumbnail-placeholder');
    const thumbnailPreview = document.getElementById('thumbnail-preview');
    const removeThumbnailBtn = document.getElementById('remove-thumbnail');
    const thumbnailInput = document.getElementById('miniatura_cuadrada');
    
    const genresGrid = document.getElementById('genres-grid');
    const selectedGenresContainer = document.getElementById('selected-genres');
    const genresInput = document.getElementById('generos_id');
    
    // Variables para controlar si se han cambiado las imágenes
    let coverChanged = false;
    let thumbnailChanged = false;
    
    // Inicializar la visualización de géneros seleccionados
    initializeSelectedGenres();
    
    // Configurar eventos para la portada vertical
    if (coverContainer) {
        coverContainer.addEventListener('click', function(e) {
            if (e.target !== removeCoverBtn && !removeCoverBtn.contains(e.target)) {
                coverInput.click();
            }
        });
        
        coverInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    coverPreview.src = e.target.result;
                    coverPreview.classList.remove('hidden');
                    coverPlaceholder.classList.add('hidden');
                    removeCoverBtn.classList.remove('hidden');
                    coverChanged = true;
                };
                
                reader.readAsDataURL(this.files[0]);
            }
        });
        
        removeCoverBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            coverInput.value = '';
            coverPreview.src = '';
            coverPreview.classList.add('hidden');
            coverPlaceholder.classList.remove('hidden');
            removeCoverBtn.classList.add('hidden');
            coverChanged = true;
            
            // Si hay una imagen existente, agregar un campo para indicar que se debe eliminar
            const existingCoverImg = coverContainer.querySelector('img:not(#cover-preview)');
            if (existingCoverImg) {
                if (!document.getElementById('remove_miniatura_vertical')) {
                    const removeInput = document.createElement('input');
                    removeInput.type = 'hidden';
                    removeInput.name = 'remove_miniatura_vertical';
                    removeInput.id = 'remove_miniatura_vertical';
                    removeInput.value = '1';
                    coverContainer.appendChild(removeInput);
                }
                existingCoverImg.style.display = 'none';
            }
        });
    }
    
    // Configurar eventos para la miniatura cuadrada
    if (thumbnailContainer) {
        thumbnailContainer.addEventListener('click', function(e) {
            if (e.target !== removeThumbnailBtn && !removeThumbnailBtn.contains(e.target)) {
                thumbnailInput.click();
            }
        });
        
        thumbnailInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    thumbnailPreview.src = e.target.result;
                    thumbnailPreview.classList.remove('hidden');
                    thumbnailPlaceholder.classList.add('hidden');
                    removeThumbnailBtn.classList.remove('hidden');
                    thumbnailChanged = true;
                };
                
                reader.readAsDataURL(this.files[0]);
            }
        });
        
        removeThumbnailBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            thumbnailInput.value = '';
            thumbnailPreview.src = '';
            thumbnailPreview.classList.add('hidden');
            thumbnailPlaceholder.classList.remove('hidden');
            removeThumbnailBtn.classList.add('hidden');
            thumbnailChanged = true;
            
            // Si hay una imagen existente, agregar un campo para indicar que se debe eliminar
            const existingThumbnailImg = thumbnailContainer.querySelector('img:not(#thumbnail-preview)');
            if (existingThumbnailImg) {
                if (!document.getElementById('remove_miniatura_cuadrada')) {
                    const removeInput = document.createElement('input');
                    removeInput.type = 'hidden';
                    removeInput.name = 'remove_miniatura_cuadrada';
                    removeInput.id = 'remove_miniatura_cuadrada';
                    removeInput.value = '1';
                    thumbnailContainer.appendChild(removeInput);
                }
                existingThumbnailImg.style.display = 'none';
            }
        });
    }
    
    // Configurar eventos para la selección de géneros
    if (genresGrid) {
        const genreOptions = genresGrid.querySelectorAll('.genre-option');
        
        genreOptions.forEach(option => {
            option.addEventListener('click', function() {
                // En modo edición, solo permitimos un género
                genreOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                
                // Actualizar el campo oculto con el ID del género seleccionado
                genresInput.value = this.getAttribute('data-value');
                
                // Actualizar la visualización de géneros seleccionados
                updateSelectedGenresDisplay();
            });
        });
    }
    
    // Función para inicializar la visualización de géneros seleccionados
    function initializeSelectedGenres() {
        if (genresInput && genresInput.value) {
            updateSelectedGenresDisplay();
        }
    }
    
    // Función para actualizar la visualización de géneros seleccionados
    function updateSelectedGenresDisplay() {
        if (!selectedGenresContainer) return;
        
        selectedGenresContainer.innerHTML = '';
        
        const genreId = genresInput.value;
        if (!genreId) return;
        
        const selectedOption = document.querySelector(`.genre-option[data-value="${genreId}"]`);
        if (selectedOption) {
            const genreTag = document.createElement('span');
            genreTag.className = 'selected-genre';
            genreTag.textContent = selectedOption.textContent;
            selectedGenresContainer.appendChild(genreTag);
        }
    }
    
    // Validación del formulario antes de enviar
    const seriesForm = document.getElementById('seriesForm');
    if (seriesForm) {
        seriesForm.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validar título
            const titulo = document.getElementById('titulo');
            if (!titulo.value.trim()) {
                markInvalid(titulo, 'El título es obligatorio');
                isValid = false;
            } else {
                markValid(titulo);
            }
            
            // Validar estado
            const estado = document.getElementById('estado_id');
            if (!estado.value) {
                markInvalid(estado, 'Debes seleccionar un estado');
                isValid = false;
            } else {
                markValid(estado);
            }
            
            // Validar género
            if (!genresInput.value) {
                markInvalid(genresGrid, 'Debes seleccionar al menos un género');
                isValid = false;
            } else {
                markValid(genresGrid);
            }
            
            // Validar descripción
            const descripcion = document.getElementById('descripcion');
            if (!descripcion.value.trim()) {
                markInvalid(descripcion, 'La descripción es obligatoria');
                isValid = false;
            } else {
                markValid(descripcion);
            }
            
            // Si no es válido, prevenir el envío del formulario
            if (!isValid) {
                e.preventDefault();
                // Scroll al primer error
                const firstError = document.querySelector('.is-invalid');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });
    }
    
    // Funciones auxiliares para validación
    function markInvalid(element, message) {
        element.classList.add('is-invalid');
        
        // Mostrar mensaje de error
        let errorDiv = element.nextElementSibling;
        if (!errorDiv || !errorDiv.classList.contains('invalid-feedback')) {
            errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback';
            element.parentNode.insertBefore(errorDiv, element.nextSibling);
        }
        errorDiv.textContent = message;
    }
    
    function markValid(element) {
        element.classList.remove('is-invalid');
        element.classList.add('is-valid');
        
        // Eliminar mensaje de error si existe
        const errorDiv = element.nextElementSibling;
        if (errorDiv && errorDiv.classList.contains('invalid-feedback')) {
            errorDiv.remove();
        }
    }
    
    // Mostrar las imágenes existentes si las hay
    function showExistingImages() {
        // Verificar si hay imágenes existentes y mostrarlas
        const existingCoverImg = coverContainer.querySelector('img:not(#cover-preview)');
        if (existingCoverImg) {
            coverPlaceholder.classList.add('hidden');
        }
        
        const existingThumbnailImg = thumbnailContainer.querySelector('img:not(#thumbnail-preview)');
        if (existingThumbnailImg) {
            thumbnailPlaceholder.classList.add('hidden');
        }
    }
    
    // Inicializar la visualización de imágenes existentes
    showExistingImages();
});
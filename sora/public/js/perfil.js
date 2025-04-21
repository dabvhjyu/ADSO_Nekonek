document.addEventListener('DOMContentLoaded', function() {
    // Elementos DOM
    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab-content');
    const modalTabs = document.querySelectorAll('.modal-tab');
    const modalTabContents = document.querySelectorAll('.modal-tab-content');
    const imageOptions = document.querySelectorAll('.image-option');
    const profilePreview = document.getElementById('profilePreview');
    const bannerPreview = document.getElementById('bannerPreview');
    
    // Modales
    const editModal = document.getElementById('editModal');
    const achievementsModal = document.getElementById('achievementsModal');
    const editButton = document.getElementById('editButton');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const closeAchievementsBtn = document.getElementById('closeAchievementsBtn');
    const cancelButton = document.getElementById('cancelButton');
    const saveButton = document.getElementById('saveButton');
    const achievementCenter = document.getElementById('achievementCenter');
    
    // Elementos de formulario
    const imageUpload = document.getElementById('imageUpload');
    const usernameInput = document.getElementById('usernameInput');
    const bioInput = document.getElementById('bioInput');
    
    // Elementos de perfil
    const username = document.getElementById('username');
    const userBio = document.getElementById('userBio');
    const profileImg = document.getElementById('profileImg');
    const bannerImg = document.getElementById('bannerImg');
    const previewProfileImg = document.getElementById('previewProfileImg');
    const previewBannerImg = document.getElementById('previewBannerImg');
    
    // Elementos de contenido
    const publicationsGrid = document.getElementById('publicationsGrid');
    const commentsList = document.getElementById('commentsList');
    const favoritesGrid = document.getElementById('favoritesGrid');
    const noPublications = document.getElementById('noPublications');
    const noComments = document.getElementById('noComments');
    const noFavorites = document.getElementById('noFavorites');
    
    // Datos simulados (en una aplicación real, estos vendrían de una base de datos)
    const userData = {
        username: 'NekoChan',
        bio: 'Apasionado lector de manga y novelas ligeras. Me encanta descubrir nuevas historias y compartir mis opiniones.',
        profileImage: '/placeholder.svg?height=112&width=112',
        bannerImage: '/placeholder.svg?height=250&width=1200',
        stats: {
            publications: 5,
            following: 42,
            followers: 18,
            likes: 126
        },
        hasPublications: true,
        hasComments: true,
        hasFavorites: true
    };
    
    // Inicializar datos de usuario
    function initUserData() {
        username.textContent = userData.username;
        userBio.textContent = userData.bio;
        profileImg.src = userData.profileImage;
        bannerImg.src = userData.bannerImage;
        previewProfileImg.src = userData.profileImage;
        previewBannerImg.src = userData.bannerImage;
        
        document.getElementById('publicationsCount').textContent = userData.stats.publications;
        document.getElementById('followingCount').textContent = userData.stats.following;
        document.getElementById('followersCount').textContent = userData.stats.followers;
        document.getElementById('likesCount').textContent = userData.stats.likes;
        
        // Inicializar formulario
        usernameInput.value = userData.username;
        bioInput.value = userData.bio;
        
        // Mostrar/ocultar contenido
        toggleContentVisibility('publications', userData.hasPublications);
        toggleContentVisibility('comments', userData.hasComments);
        toggleContentVisibility('favorites', userData.hasFavorites);
    }
    
    // Función para mostrar/ocultar contenido
    function toggleContentVisibility(type, hasContent) {
        switch(type) {
            case 'publications':
                if (hasContent) {
                    noPublications.style.display = 'none';
                    publicationsGrid.style.display = 'grid';
                } else {
                    noPublications.style.display = 'flex';
                    publicationsGrid.style.display = 'none';
                }
                break;
            case 'comments':
                if (hasContent) {
                    noComments.style.display = 'none';
                    commentsList.style.display = 'flex';
                } else {
                    noComments.style.display = 'flex';
                    commentsList.style.display = 'none';
                }
                break;
            case 'favorites':
                if (hasContent) {
                    noFavorites.style.display = 'none';
                    favoritesGrid.style.display = 'grid';
                } else {
                    noFavorites.style.display = 'flex';
                    favoritesGrid.style.display = 'none';
                }
                break;
        }
    }
    
    // Cambiar pestañas
    // Pestañas principales
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const tabId = tab.getAttribute('data-tab');
        
        // Verificar que exista el tabId y el contenido correspondiente
        if (!tabId) {
            console.error('El tab no tiene atributo data-tab');
            return;
        }

        const tabContent = document.getElementById(`${tabId}-content`);
        if (!tabContent) {
            console.error(`No se encontró el contenido para el tab: ${tabId}`);
            return;
        }

        // Actualizar clases activas
        tabs.forEach(t => t.classList.remove('active'));
        tabContents.forEach(content => content.classList.remove('active'));
        
        tab.classList.add('active');
        tabContent.classList.add('active');
    });
});

    
    // Cambiar pestañas del modal
    // Pestañas del modal
modalTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const tabId = tab.getAttribute('data-tab');
        
        // Verificar que exista el tabId y el contenido correspondiente
        if (!tabId) {
            console.error('El tab del modal no tiene atributo data-tab');
            return;
        }

        const modalTabContent = document.getElementById(`${tabId}-modal-content`);
        if (!modalTabContent) {
            console.error(`No se encontró el contenido para el tab del modal: ${tabId}`);
            return;
        }

        // Actualizar clases activas
        modalTabs.forEach(t => t.classList.remove('active'));
        modalTabContents.forEach(content => content.classList.remove('active'));
        
        tab.classList.add('active');
        modalTabContent.classList.add('active');
    });
});

    
    // Cambiar opciones de imagen
    imageOptions.forEach(option => {
        option.addEventListener('click', () => {
            const optionId = option.getAttribute('data-option');
            
            // Actualizar clases activas
            imageOptions.forEach(o => o.classList.remove('active'));
            option.classList.add('active');
            
            // Mostrar/ocultar previsualizaciones
            if (optionId === 'profile') {
                profilePreview.style.display = 'flex';
                bannerPreview.style.display = 'none';
            } else {
                profilePreview.style.display = 'none';
                bannerPreview.style.display = 'flex';
            }
        });
    });
    
    // Abrir modal de edición
    editButton.addEventListener('click', () => {
        editModal.style.display = 'flex';
    });
    
    // Abrir modal de logros
    achievementCenter.addEventListener('click', () => {
        achievementsModal.style.display = 'flex';
    });
    
    // Cerrar modales
    closeModalBtn.addEventListener('click', () => {
        editModal.style.display = 'none';
    });
    
    closeAchievementsBtn.addEventListener('click', () => {
        achievementsModal.style.display = 'none';
    });
    
    cancelButton.addEventListener('click', () => {
        editModal.style.display = 'none';
    });
    
    // Cerrar modales al hacer clic fuera
    window.addEventListener('click', (e) => {
        if (e.target === editModal) {
            editModal.style.display = 'none';
        }
        if (e.target === achievementsModal) {
            achievementsModal.style.display = 'none';
        }
    });
    
    // Manejar carga de imágenes
    imageUpload.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const activeOption = document.querySelector('.image-option.active').getAttribute('data-option');
                
                if (activeOption === 'profile') {
                    previewProfileImg.src = event.target.result;
                } else {
                    previewBannerImg.src = event.target.result;
                }
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Guardar cambios
    saveButton.addEventListener('click', () => {
        // En una aplicación real, aquí enviarías los datos al servidor
        // Para esta demo, actualizamos los datos localmente
        
        // Actualizar nombre de usuario y bio
        userData.username = usernameInput.value;
        userData.bio = bioInput.value;
        username.textContent = userData.username;
        userBio.textContent = userData.bio;
        
        // Actualizar imágenes
        profileImg.src = previewProfileImg.src;
        bannerImg.src = previewBannerImg.src;
        userData.profileImage = previewProfileImg.src;
        userData.bannerImage = previewBannerImg.src;
        
        // Cerrar modal
        editModal.style.display = 'none';
        
        // Mostrar mensaje de éxito (en una aplicación real)
        console.log('Perfil actualizado con éxito');
    });
    
    // Inicializar datos
    initUserData();
});
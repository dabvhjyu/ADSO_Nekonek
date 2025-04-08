document.addEventListener('DOMContentLoaded', function() {
  // DOM Elements
  const profileImageContainer = document.getElementById('profileImageContainer');
  const profileUpload = document.getElementById('profile-upload');
  const seriesTab = document.getElementById('series-tab');
  const groupSeriesTab = document.getElementById('group-series-tab');
  const seriesEmptyState = document.getElementById('seriesEmptyState');
  const seriesContent = document.getElementById('seriesContent');
  const groupSeriesEmptyState = document.getElementById('groupSeriesEmptyState');
  const groupSeriesContent = document.getElementById('groupSeriesContent');
  const seriesGrid = document.getElementById('seriesGrid');
  const groupSeriesGrid = document.getElementById('groupSeriesGrid');
  const uploadModalElement = document.getElementById('uploadModal');
  const uploadModal = new bootstrap.Modal(uploadModalElement);
  const seriesForm = document.getElementById('seriesForm');
  const seriesTypeInput = document.getElementById('seriesType');
  const seriesTitleInput = document.getElementById('seriesTitle');
  const seriesChaptersInput = document.getElementById('seriesChapters');
  const seriesCoverInput = document.getElementById('seriesCover');
  const coverPreviewContainer = document.getElementById('coverPreviewContainer');
  const coverUploadContainer = document.getElementById('coverUploadContainer');
  const coverPreview = document.getElementById('coverPreview');
  const removeCoverBtn = document.getElementById('removeCoverBtn');
  const saveSeriesBtn = document.getElementById('saveSeriesBtn');

  // Upload buttons
  const uploadSeriesBtn = document.getElementById('uploadSeriesBtn');
  const uploadSeriesEmptyBtn = document.getElementById('uploadSeriesEmptyBtn');
  const addMoreSeriesBtn = document.getElementById('addMoreSeriesBtn');
  const uploadGroupSeriesEmptyBtn = document.getElementById('uploadGroupSeriesEmptyBtn');
  const addMoreGroupSeriesBtn = document.getElementById('addMoreGroupSeriesBtn');

  // Data storage
  let personalSeries = [];
  let groupSeries = [];

  // Event Listeners
  profileUpload.addEventListener('change', handleProfileImageUpload);
  uploadSeriesBtn.addEventListener('click', () => openUploadModal('personal'));
  uploadSeriesEmptyBtn.addEventListener('click', () => openUploadModal('personal'));
  addMoreSeriesBtn.addEventListener('click', () => openUploadModal('personal'));
  uploadGroupSeriesEmptyBtn.addEventListener('click', () => openUploadModal('group'));
  addMoreGroupSeriesBtn.addEventListener('click', () => openUploadModal('group'));
  seriesCoverInput.addEventListener('change', handleCoverImageUpload);
  removeCoverBtn.addEventListener('click', removeCoverImage);
  saveSeriesBtn.addEventListener('click', saveSeries);

  // Handle profile image upload
  function handleProfileImageUpload(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        // Clear the container
        profileImageContainer.innerHTML = '';
        
        // Create and add the image
        const img = document.createElement('img');
        img.src = e.target.result;
        img.alt = 'Foto de perfil';
        img.style.width = '100%';
        img.style.height = '100%';
        img.style.objectFit = 'cover';
        
        profileImageContainer.appendChild(img);
      };
      reader.readAsDataURL(file);
    }
  }

  // Open upload modal
  function openUploadModal(type) {
    // Reset form
    seriesForm.reset();
    seriesTypeInput.value = type;
    coverPreviewContainer.classList.add('d-none');
    coverUploadContainer.classList.remove('d-none');
    
    // Update modal title based on type
    const modalTitle = document.getElementById('uploadModalLabel');
    modalTitle.textContent = type === 'personal' ? 'Subir Nueva Serie' : 'Subir Serie del Grupo';
    
    // Show modal
    uploadModal.show();
  }

  // Handle cover image upload
  function handleCoverImageUpload(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        coverPreview.src = e.target.result;
        coverPreviewContainer.classList.remove('d-none');
        coverUploadContainer.classList.add('d-none');
      };
      reader.readAsDataURL(file);
    }
  }

  // Remove cover image
  function removeCoverImage() {
    seriesCoverInput.value = '';
    coverPreviewContainer.classList.add('d-none');
    coverUploadContainer.classList.remove('d-none');
  }

  // Save series
  function saveSeries() {
    // Validate form
    if (!seriesTitleInput.value || !seriesChaptersInput.value || !seriesCoverInput.value) {
      alert('Por favor completa todos los campos');
      return;
    }

    const type = seriesTypeInput.value;
    const newSeries = {
      id: Date.now(),
      title: seriesTitleInput.value,
      chapters: parseInt(seriesChaptersInput.value),
      cover: coverPreview.src,
      lastUpdated: new Date().toLocaleDateString()
    };

    // Add to appropriate array
    if (type === 'personal') {
      personalSeries.push(newSeries);
      updateSeriesList();
    } else {
      groupSeries.push(newSeries);
      updateGroupSeriesList();
    }

    // Close modal
    uploadModal.hide();
  }

  // Update personal series list
  function updateSeriesList() {
    if (personalSeries.length > 0) {
      seriesEmptyState.classList.add('d-none');
      seriesContent.classList.remove('d-none');
      
      // Clear grid
      seriesGrid.innerHTML = '';
      
      // Add series cards
      personalSeries.forEach(series => {
        const seriesCard = createSeriesCard(series);
        seriesGrid.appendChild(seriesCard);
      });
    } else {
      seriesEmptyState.classList.remove('d-none');
      seriesContent.classList.add('d-none');
    }
  }

  // Update group series list
  function updateGroupSeriesList() {
    if (groupSeries.length > 0) {
      groupSeriesEmptyState.classList.add('d-none');
      groupSeriesContent.classList.remove('d-none');
      
      // Clear grid
      groupSeriesGrid.innerHTML = '';
      
      // Add series cards
      groupSeries.forEach(series => {
        const seriesCard = createSeriesCard(series);
        groupSeriesGrid.appendChild(seriesCard);
      });
    } else {
      groupSeriesEmptyState.classList.remove('d-none');
      groupSeriesContent.classList.add('d-none');
    }
  }

  // Create series card
  function createSeriesCard(series) {
    const colDiv = document.createElement('div');
    colDiv.className = 'col-12 col-sm-6 col-md-4 col-lg-3';
    
    colDiv.innerHTML = `
      <div class="series-card">
        <img src="${series.cover}" alt="${series.title}" class="series-cover">
        <div class="p-3">
          <h3 class="series-title">${series.title}</h3>
          <p class="series-chapters mb-1">${series.chapters} capítulos</p>
          <p class="series-date mt-2">Actualizado: ${series.lastUpdated}</p>
        </div>
      </div>
    `;
    
    return colDiv;
  }
});
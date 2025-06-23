document.addEventListener("DOMContentLoaded", () => {
  // Variables para almacenar datos
  let currentTab = "series"
  let seriesOption = "create"
  let contentType = ""
  let selectedSeries = null
  const uploadedFiles = {
    squareThumbnail: null,
    verticalThumbnail: null,
    episodePreview: null,
    episodeContent: [],
  }

  // Datos de ejemplo para series
  const mockSeries = [
    {
      id: 1,
      title: "El Despertar",
      genres: ["Ciencia FicciÃ³n", "Drama"],
      summary:
        "Una historia de ciencia ficciÃ³n sobre un mundo post-apocalÃ­ptico donde la humanidad lucha por sobrevivir.",
      thumbnail: "/placeholder.svg?height=300&width=200",
    },
    {
      id: 2,
      title: "Sombras del Pasado",
      genres: ["Thriller", "Misterio"],
      summary: "Un thriller psicolÃ³gico que explora los lÃ­mites de la mente humana y los secretos enterrados.",
      thumbnail: "/placeholder.svg?height=300&width=200",
    },
    {
      id: 3,
      title: "Corazones de Acero",
      genres: ["Romance", "FantasÃ­a"],
      summary: "Una historia de romance en un mundo de fantasÃ­a medieval donde la magia y el amor se entrelazan.",
      thumbnail: "/placeholder.svg?height=300&width=200",
    },
    {
      id: 4,
      title: "Ãšltima Frontera",
      genres: ["Aventura", "AcciÃ³n"],
      summary: "Un grupo de exploradores se aventura en territorios desconocidos enfrentando peligros inimaginables.",
      thumbnail: "/placeholder.svg?height=300&width=200",
    },
    {
      id: 5,
      title: "CÃ³digo Secreto",
      genres: ["Espionaje", "AcciÃ³n"],
      summary: "Un agente secreto debe descifrar un cÃ³digo que podrÃ­a cambiar el curso de la historia mundial.",
      thumbnail: "/placeholder.svg?height=300&width=200",
    },
  ]

  // Referencias a elementos DOM
  const tabButtons = document.querySelectorAll(".tab-btn")
  const createSeriesBtn = document.getElementById("create-series-btn")
  const existingSeriesBtn = document.getElementById("existing-series-btn")
  const createSeriesForm = document.getElementById("create-series-form")
  const existingSeriesForm = document.getElementById("existing-series-form")
  const nextBtn = document.getElementById("next-btn")
  const searchInput = document.getElementById("search-series")
  const searchBtn = document.getElementById("search-btn")
  const searchResults = document.getElementById("search-results")
  const selectedSeriesContainer = document.getElementById("selected-series-container")
  const selectedSeriesElement = document.getElementById("selected-series")
  const selectSeriesBtn = document.getElementById("select-series-btn")
  const contentTypeBtns = document.querySelectorAll(".content-type-btn")
  const episodeForm = document.getElementById("episode-form")
  const backToContentBtn = document.getElementById("back-to-content-btn")
  const publishTimeRadios = document.querySelectorAll('input[name="publish-time"]')
  const scheduleOptions = document.getElementById("schedule-options")
  const publishBtn = document.getElementById("publish-btn")
  const fileTypeMessage = document.getElementById("file-type-message")
  const selectedFilesContainer = document.getElementById("selected-files-container")
  const selectedFilesList = document.getElementById("selected-files-list")

  // Ãreas de carga de archivos
  const squareThumbnail = document.getElementById("square-thumbnail")
  const verticalThumbnail = document.getElementById("vertical-thumbnail")
  const episodePreview = document.getElementById("episode-preview")
  const fileDropArea = document.getElementById("file-drop-area")
  const chooseFileBtn = document.getElementById("choose-file-btn")
  const clearFileBtn = document.getElementById("clear-file-btn")
  const fileUpload = document.getElementById("file-upload")

  // Elementos de vista previa de imÃ¡genes
  const squarePreviewImg = document.getElementById("square-preview-img")
  const verticalPreviewImg = document.getElementById("vertical-preview-img")
  const episodePreviewImg = document.getElementById("episode-preview-img")


document.querySelectorAll('.upload-area').forEach(area => {
    area.addEventListener('click', function() {
        const fileInput = this.querySelector('input[type="file"]');
        fileInput.click();
    });
});

document.querySelectorAll('input[type="file"]').forEach(input => {
    input.addEventListener('change', function(e) {
        const preview = this.closest('.upload-area').querySelector('img');
        const placeholder = this.closest('.upload-area').querySelector('.upload-placeholder');
        
        if(this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.parentElement.classList.remove('d-none');
                placeholder.classList.add('d-none');
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});


  // Inicializar fecha actual para el programador
  const today = new Date()
  const formattedDate = today.toISOString().split("T")[0]
  if (document.getElementById("schedule-date")) {
    document.getElementById("schedule-date").value = formattedDate
  }

  // Inicializar tooltips de Bootstrap
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  const bootstrap = window.bootstrap; // Declaring bootstrap variable
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  // Deshabilitar la navegaciÃ³n directa a la pestaÃ±a de episodios
  tabButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      const tab = button.dataset.tab

      // Si el botÃ³n estÃ¡ deshabilitado, no hacer nada
      if (button.classList.contains("disabled")) {
        e.preventDefault()
        return
      }

      // Actualizar botones de pestaÃ±as (usando Bootstrap)
      const tabEl = document.querySelector(`#${tab}-tab`)
      const tabInstance = new bootstrap.Tab(tabEl)
      tabInstance.show()

      currentTab = tab
    })
  })

  // Opciones de series (Crear o Existente)
  existingSeriesBtn.addEventListener("click", () => {
    existingSeriesBtn.classList.add("active")
    createSeriesBtn.classList.remove("active")
    existingSeriesForm.classList.remove("d-none") // Cambiado de hidden a d-none
    createSeriesForm.classList.add("d-none") // Cambiado de hidden a d-none
    seriesOption = "existing"
  })

  // Asegurarse de que el botÃ³n "Crear Serie" tambiÃ©n use las clases correctas
  createSeriesBtn.addEventListener("click", () => {
    createSeriesBtn.classList.add("active")
    existingSeriesBtn.classList.remove("active")
    createSeriesForm.classList.remove("d-none") // Cambiado de hidden a d-nonesList.remove("d-none") // Cambiado de hidden a d-none
    existingSeriesForm.classList.add("d-none") // Cambiado de hidden a d-none
    seriesOption = "create"
  })

  // BotÃ³n siguiente en formulario de series
  nextBtn.addEventListener("click", () => {
    // AquÃ­ irÃ­a la validaciÃ³n del formulario
    if (validateSeriesForm()) {
      // Cambiar a la pestaÃ±a de episodios (usando Bootstrap)
      const episodesTab = document.querySelector('#episodes-tab')
      episodesTab.classList.remove('disabled')
      const tabInstance = new bootstrap.Tab(episodesTab)
      tabInstance.show()

      // Mostrar el tÃ­tulo de la serie en el formulario de episodios
      const seriesTitle = document.getElementById("series-title").value
      document.getElementById("display-series-title").textContent = seriesTitle

      currentTab = "episodes"
    }
  })

  // BÃºsqueda de series
  searchInput.addEventListener("input", () => {
    const searchTerm = searchInput.value.toLowerCase().trim()

    if (searchTerm.length < 2) {
      searchResults.innerHTML = ""
      return
    }

    // Filtrar series que coincidan con el tÃ©rmino de bÃºsqueda
    const filteredSeries = mockSeries.filter(
      (series) =>
        series.title.toLowerCase().includes(searchTerm) ||
        series.genres.some((genre) => genre.toLowerCase().includes(searchTerm)) ||
        series.summary.toLowerCase().includes(searchTerm),
    )

    // Mostrar resultados
    renderSearchResults(filteredSeries)
  })

  searchBtn.addEventListener("click", () => {
    const searchTerm = searchInput.value.toLowerCase().trim()

    if (searchTerm.length < 2) {
      return
    }

    // Filtrar series que coincidan con el tÃ©rmino de bÃºsqueda
    const filteredSeries = mockSeries.filter(
      (series) =>
        series.title.toLowerCase().includes(searchTerm) ||
        series.genres.some((genre) => genre.toLowerCase().includes(searchTerm)) ||
        series.summary.toLowerCase().includes(searchTerm),
    )

    // Mostrar resultados
    renderSearchResults(filteredSeries)
  })

  function renderSearchResults(results) {
    searchResults.innerHTML = ""

    if (results.length === 0) {
      searchResults.innerHTML = '<div class="alert alert-info text-center py-4">No se encontraron series que coincidan con tu bÃºsqueda</div>'
      return
    }

    results.forEach((series) => {
      const resultItem = document.createElement("div")
      resultItem.className = "search-result-item"
      resultItem.dataset.seriesId = series.id

      resultItem.innerHTML = `
        <div class="search-result-thumbnail">
          <img src="${series.thumbnail}" alt="${series.title}" class="img-fluid">
        </div>
        <div class="search-result-info">
          <div class="search-result-title">${series.title}</div>
          <div class="search-result-genres">
            ${series.genres.map((genre) => `<span class="search-result-genre">${genre}</span>`).join("")}
          </div>
          <div class="search-result-summary">${series.summary}</div>
        </div>
      `

      resultItem.addEventListener("click", () => {
        // Deseleccionar cualquier serie previamente seleccionada
        const selectedItems = document.querySelectorAll(".search-result-item.selected")
        selectedItems.forEach((item) => item.classList.remove("selected"))

        // Seleccionar esta serie
        resultItem.classList.add("selected")
        selectedSeries = series

        // Mostrar la serie seleccionada
        selectedSeriesContainer.classList.remove("d-none")
        selectedSeriesElement.innerHTML = `
          <div class="search-result-item">
            <div class="search-result-thumbnail">
              <img src="${series.thumbnail}" alt="${series.title}" class="img-fluid">
            </div>
            <div class="search-result-info">
              <div class="search-result-title">${series.title}</div>
              <div class="search-result-genres">
                ${series.genres.map((genre) => `<span class="search-result-genre">${genre}</span>`).join("")}
              </div>
              <div class="search-result-summary">${series.summary}</div>
            </div>
          </div>
        `

        // Habilitar el botÃ³n de continuar
        selectSeriesBtn.disabled = false
      })

      searchResults.appendChild(resultItem)
    })
  }

  // BotÃ³n seleccionar serie existente
  selectSeriesBtn.addEventListener("click", () => {
    if (selectedSeries) {
      // Cambiar a la pestaÃ±a de episodios (usando Bootstrap)
      const episodesTab = document.querySelector('#episodes-tab')
      episodesTab.classList.remove('disabled')
      const tabInstance = new bootstrap.Tab(episodesTab)
      tabInstance.show()

      // Mostrar el tÃ­tulo de la serie seleccionada en el formulario de episodios
      document.getElementById("display-series-title").textContent = selectedSeries.title

      currentTab = "episodes"
    } else {
      alert("Por favor, selecciona una serie")
    }
  })

  // SelecciÃ³n de tipo de contenido
  contentTypeBtns.forEach((button) => {
    button.addEventListener("click", () => {
      contentType = button.dataset.type

      // Actualizar botones de tipo de contenido
      contentTypeBtns.forEach((btn) => btn.classList.remove("active"))
      button.classList.add("active")

      // Mostrar formulario de episodio
      episodeForm.classList.remove("d-none")

      // Actualizar mensaje segÃºn el tipo de contenido
      updateFileTypeMessage()

      // Limpiar archivos seleccionados
      uploadedFiles.episodeContent = []
      updateSelectedFilesList()
    })
  })

  // BotÃ³n para volver a la selecciÃ³n de tipo de contenido
  backToContentBtn.addEventListener("click", () => {
    episodeForm.classList.add("d-none")
    contentTypeBtns.forEach((btn) => btn.classList.remove("active"))
    contentType = ""
  })

  // Cambiar opciones de publicaciÃ³n
  publishTimeRadios.forEach((radio) => {
    radio.addEventListener("change", () => {
      if (radio.value === "later") {
        scheduleOptions.classList.remove("d-none")
      } else {
        scheduleOptions.classList.add("d-none")
      }
    })
  })

  // Funcionalidad de carga de imÃ¡genes
  function setupImageUpload(element, previewImg, uploadType) {
    element.addEventListener("click", () => {
      fileUpload.accept = ".jpg,.jpeg,.png"
      fileUpload.multiple = false
      fileUpload.dataset.uploadType = uploadType
      fileUpload.click()
    })

    element.addEventListener("dragover", (e) => {
      e.preventDefault()
      element.classList.add("active")
    })

    element.addEventListener("dragleave", () => {
      element.classList.remove("active")
    })

    element.addEventListener("drop", (e) => {
      e.preventDefault()
      element.classList.remove("active")

      const file = e.dataTransfer.files[0]
      if (file && file.type.startsWith("image/")) {
        handleImageUpload(file, previewImg, uploadType)
      } else {
        alert("Por favor, arrastra un archivo de imagen vÃ¡lido.")
      }
    })
  }

  // Configurar eventos de carga para cada Ã¡rea de imagen
  setupImageUpload(squareThumbnail, squarePreviewImg, "squareThumbnail")
  setupImageUpload(verticalThumbnail, verticalPreviewImg, "verticalThumbnail")
  setupImageUpload(episodePreview, episodePreviewImg, "episodePreview")

  // Funcionalidad de carga de archivos de contenido
  chooseFileBtn.addEventListener("click", () => {
    if (!contentType) {
      alert("Por favor, selecciona primero un tipo de contenido.")
      return
    }

    // Configurar el tipo de archivo segÃºn el tipo de contenido
    if (contentType === "novela") {
      fileUpload.accept = ".txt,.doc,.docx,.pdf"
      fileUpload.multiple = false
    } else if (contentType === "dibujo") {
      fileUpload.accept = ".jpg,.jpeg,.png,.gif"
      fileUpload.multiple = true
    } else if (contentType === "animacion") {
      fileUpload.accept = ".mp4,.webm,.avi,.mov"
      fileUpload.multiple = false
    }

    fileUpload.dataset.uploadType = "episodeContent"
    fileUpload.click()
  })

  // Manejar la selecciÃ³n de archivos
  fileUpload.addEventListener("change", (e) => {
    const uploadType = fileUpload.dataset.uploadType

    if (uploadType === "squareThumbnail" || uploadType === "verticalThumbnail" || uploadType === "episodePreview") {
      const file = e.target.files[0]
      if (file) {
        const previewImg =
          uploadType === "squareThumbnail"
            ? squarePreviewImg
            : uploadType === "verticalThumbnail"
              ? verticalPreviewImg
              : episodePreviewImg
        handleImageUpload(file, previewImg, uploadType)
      }
    } else if (uploadType === "episodeContent") {
      const files = Array.from(e.target.files)
      if (files.length > 0) {
        handleContentUpload(files)
      }
    }
  })

  // Manejar la carga de imÃ¡genes
  function handleImageUpload(file, previewImg, uploadType) {
    // Validar tipo de archivo
    if (!file.type.startsWith("image/")) {
      alert("Por favor, selecciona un archivo de imagen vÃ¡lido.")
      return
    }

    // Validar tamaÃ±o segÃºn el tipo
    let maxSize = 600 // KB
    if (uploadType === "verticalThumbnail") {
      maxSize = 900
    }

    if (file.size > maxSize * 1024) {
      alert(`El archivo es demasiado grande. El tamaÃ±o mÃ¡ximo es ${maxSize} KB.`)
      return
    }

    // Guardar el archivo
    uploadedFiles[uploadType] = file

    // Mostrar vista previa
    const reader = new FileReader()
    reader.onload = (e) => {
      previewImg.src = e.target.result
      previewImg.parentElement.classList.remove("d-none")
      previewImg.parentElement.nextElementSibling.classList.add("d-none")
    }
    reader.readAsDataURL(file)
  }

  // Manejar la carga de archivos de contenido
  function handleContentUpload(files) {
    // Validar tipos de archivo segÃºn el contenido
    let validFiles = []

    if (contentType === "novela") {
      const validTypes = [".txt", ".doc", ".docx", ".pdf"]
      validFiles = files.filter((file) => {
        const ext = file.name.substring(file.name.lastIndexOf(".")).toLowerCase()
        return validTypes.includes(ext)
      })

      if (validFiles.length < files.length) {
        alert("Solo se permiten archivos de texto (.txt, .doc, .docx, .pdf) para novelas.")
      }
    } else if (contentType === "dibujo") {
      const validTypes = [".jpg", ".jpeg", ".png", ".gif"]
      validFiles = files.filter((file) => {
        const ext = file.name.substring(file.name.lastIndexOf(".")).toLowerCase()
        return validTypes.includes(ext)
      })

      if (validFiles.length < files.length) {
        alert("Solo se permiten archivos de imagen (.jpg, .jpeg, .png, .gif) para dibujos.")
      }
    } else if (contentType === "animacion") {
      const validTypes = [".mp4", ".webm", ".avi", ".mov"]
      validFiles = files.filter((file) => {
        const ext = file.name.substring(file.name.lastIndexOf(".")).toLowerCase()
        return validTypes.includes(ext)
      })

      if (validFiles.length < files.length) {
        alert("Solo se permiten archivos de video (.mp4, .webm, .avi, .mov) para animaciones.")
      }
    }

    // Guardar archivos vÃ¡lidos
    uploadedFiles.episodeContent = [...uploadedFiles.episodeContent, ...validFiles]

    // Actualizar la lista de archivos
    updateSelectedFilesList()
  }

  // Actualizar la lista de archivos seleccionados
  function updateSelectedFilesList() {
    if (uploadedFiles.episodeContent.length > 0) {
      selectedFilesContainer.classList.remove("d-none")
      fileTypeMessage.classList.add("d-none")

      selectedFilesList.innerHTML = ""
      let totalSize = 0

      uploadedFiles.episodeContent.forEach((file, index) => {
        const li = document.createElement("li")
        li.className = "list-group-item d-flex justify-content-between align-items-center"
        const fileSizeMB = (file.size / (1024 * 1024)).toFixed(2)
        totalSize += file.size

        li.innerHTML = `
          <span>${file.name}</span>
          <span class="badge bg-secondary">${fileSizeMB} MB</span>
        `

        selectedFilesList.appendChild(li)
      })

      // Actualizar el contador de tamaÃ±o
      const totalSizeMB = (totalSize / (1024 * 1024)).toFixed(2)
      document.querySelector(".file-size-info").textContent = `${totalSizeMB}MB / 20MB`
    } else {
      selectedFilesContainer.classList.add("d-none")
      fileTypeMessage.classList.remove("d-none")
      document.querySelector(".file-size-info").textContent = "0MB / 20MB"
    }
  }

  // Actualizar mensaje segÃºn el tipo de contenido
  function updateFileTypeMessage() {
    if (contentType === "novela") {
      fileTypeMessage.textContent = "Selecciona o arrastra archivos de texto (.txt, .doc, .docx, .pdf)"
    } else if (contentType === "dibujo") {
      fileTypeMessage.textContent = "Selecciona o arrastra archivos de imagen (.jpg, .jpeg, .png, .gif)"
    } else if (contentType === "animacion") {
      fileTypeMessage.textContent = "Selecciona o arrastra archivos de video (.mp4, .webm, .avi, .mov)"
    } else {
      fileTypeMessage.textContent = "Selecciona un tipo de contenido para subir archivos"
    }
  }

  // BotÃ³n para limpiar archivos
  clearFileBtn.addEventListener("click", () => {
    uploadedFiles.episodeContent = []
    updateSelectedFilesList()
  })

  // Funcionalidad de arrastrar y soltar para archivos de contenido
  fileDropArea.addEventListener("dragover", (e) => {
    e.preventDefault()
    fileDropArea.classList.add("active")
  })

  fileDropArea.addEventListener("dragleave", () => {
    fileDropArea.classList.remove("active")
  })

  fileDropArea.addEventListener("drop", (e) => {
    e.preventDefault()
    fileDropArea.classList.remove("active")

    if (!contentType) {
      alert("Por favor, selecciona primero un tipo de contenido.")
      return
    }

    const files = Array.from(e.dataTransfer.files)
    if (files.length > 0) {
      handleContentUpload(files)
    }
  })

  // BotÃ³n de publicar episodio
  publishBtn.addEventListener("click", () => {
    // AquÃ­ irÃ­a la validaciÃ³n del formulario de episodio
    if (validateEpisodeForm()) {
      alert("Â¡Episodio publicado con Ã©xito!")
      // AquÃ­ se enviarÃ­an los datos al servidor
    }
  })

  // Funciones de validaciÃ³n
  function validateSeriesForm() {
    // Implementar validaciÃ³n real aquÃ­
    // Por ahora, solo verificamos que se hayan subido las imÃ¡genes
    if (seriesOption === "create") {
      if (!uploadedFiles.squareThumbnail) {
        alert("Por favor, sube una miniatura cuadrada.")
        return false
      }

      if (!uploadedFiles.verticalThumbnail) {
        alert("Por favor, sube una miniatura vertical.")
        return false
      }

      // AquÃ­ irÃ­an mÃ¡s validaciones
    }

    return true
  }

  function validateEpisodeForm() {
    // Verificar que se haya seleccionado un tipo de contenido
    if (!contentType) {
      alert("Por favor, selecciona un tipo de contenido.")
      return false
    }

    // Verificar que se haya subido una imagen de vista previa
    if (!uploadedFiles.episodePreview) {
      alert("Por favor, sube una imagen de vista previa.")
      return false
    }

    // Verificar que se hayan subido archivos de contenido
    if (uploadedFiles.episodeContent.length === 0) {
      alert("Por favor, sube al menos un archivo de contenido.")
      return false
    }

    // AquÃ­ irÃ­an mÃ¡s validaciones

    return true
  }
})
  
  
  
// Datos simulados
const adminData = {
    name: "Dabvhiy",
    role: "Administrador",
    stats: {
      totalUsers: 10000,
      totalReports: 250,
      totalGroupsSeries: 500,
    },
  }
  
  const users = [
    { id: 1, name: "Usuario 1", email: "usuario1@example.com", status: "Activo" },
    { id: 2, name: "Usuario 2", email: "usuario2@example.com", status: "Suspendido" },
  ]
  
  const reports = [
    { id: 1, content: "Contenido inapropiado", reportedBy: "Usuario 3", date: "2023-05-15", status: "Pendiente" },
    { id: 2, content: "Spam", reportedBy: "Usuario 4", date: "2023-05-14", status: "Resuelto" },
  ]
  
  const groupsSeries = [
    { id: 1, name: "Grupo A", type: "Grupo", creator: "Usuario 5" },
    { id: 2, name: "Serie B", type: "Serie", creator: "Usuario 6" },
  ]
  
  const actionHistory = [
    {
      date: "2023-05-15",
      admin: "Admin Principal",
      action: "Suspensión de usuario",
      details: "Usuario 2 suspendido por violación de normas",
    },
    {
      date: "2023-05-14",
      admin: "Admin Principal",
      action: "Eliminación de contenido",
      details: "Contenido eliminado por infringir derechos de autor",
    },
  ]
  
  const notifications = [
    {
      id: 1,
      icon: "flag",
      text: "Nuevo reporte de contenido inapropiado",
      time: "Hace 5 minutos",
      unread: true,
    },
    {
      id: 2,
      icon: "user",
      text: "Usuario suspendido por violación de normas",
      time: "Hace 15 minutos",
      unread: true,
    },
    {
      id: 3,
      icon: "exclamation-circle",
      text: "Alerta de seguridad detectada",
      time: "Hace 30 minutos",
      unread: true,
    },
  ]
  
  // Variables para el manejo de imágenes
  let newProfileImage = null
  let newBannerImage = null
  let currentTab = "images"
  let currentImageOption = "profile"
  
  // Elementos DOM
  document.addEventListener("DOMContentLoaded", () => {
    // Elementos de notificaciones y menú de usuario
    const notificationsMenuTrigger = document.getElementById("notificationsMenuTrigger")
    const notificationsDropdown = document.getElementById("notificationsDropdown")
    const userMenuTrigger = document.getElementById("userMenuTrigger")
    const userDropdown = document.getElementById("userDropdown")
  
    // Elementos para editar perfil
    const editButton = document.getElementById("editButton")
    const editModal = document.getElementById("editModal")
    const closeModalBtn = document.getElementById("closeModalBtn")
    const cancelButton = document.getElementById("cancelButton")
    const saveButton = document.getElementById("saveButton")
  
    // Elementos de pestañas del modal
    const modalTabs = document.querySelectorAll(".modal-tab")
  
    // Elementos de opciones de imagen
    const imageOptions = document.querySelectorAll(".image-option")
    const imageUpload = document.getElementById("imageUpload")
    const profilePreview = document.getElementById("profilePreview")
    const bannerPreview = document.getElementById("bannerPreview")
    const previewProfileImg = document.getElementById("previewProfileImg")
    const previewBannerImg = document.getElementById("previewBannerImg")
  
    // Elementos de información
    const usernameInput = document.getElementById("usernameInput")
    const bioInput = document.getElementById("bioInput")
  
    // Inicializar la página
    initAdminProfile()
  
    // Event Listeners para notificaciones y menú de usuario
    if (notificationsMenuTrigger) {
      notificationsMenuTrigger.addEventListener("click", (e) => {
        e.stopPropagation()
        notificationsDropdown.classList.toggle("active")
        if (userDropdown) userDropdown.classList.remove("active")
      })
    }
  
    if (userMenuTrigger) {
      userMenuTrigger.addEventListener("click", (e) => {
        e.stopPropagation()
        userDropdown.classList.toggle("active")
        if (notificationsDropdown) notificationsDropdown.classList.remove("active")
      })
    }
  
    document.addEventListener("click", (e) => {
      if (
        notificationsMenuTrigger &&
        notificationsDropdown &&
        !notificationsMenuTrigger.contains(e.target) &&
        !notificationsDropdown.contains(e.target)
      ) {
        notificationsDropdown.classList.remove("active")
      }
  
      if (userMenuTrigger && userDropdown && !userMenuTrigger.contains(e.target) && !userDropdown.contains(e.target)) {
        userDropdown.classList.remove("active")
      }
    })
  
    // Event Listeners para editar perfil
    // Asegurarse de que el evento del botón de editar funcione correctamente
    if (editButton) {
      editButton.addEventListener("click", () => {
        console.log("Abriendo modal de edición")
        // Cargar valores actuales
        loadCurrentValues()
  
        const modal = document.getElementById("editModal")
        if (modal) {
          modal.classList.add("active")
          console.log("Modal activado")
        } else {
          console.error("No se encontró el elemento del modal")
        }
      })
    }
  
    if (closeModalBtn) {
      closeModalBtn.addEventListener("click", closeModal)
    }
  
    if (cancelButton) {
      cancelButton.addEventListener("click", closeModal)
    }
  
    // Cambiar entre pestañas
    modalTabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        modalTabs.forEach((t) => t.classList.remove("active"))
        tab.classList.add("active")
  
        currentTab = tab.getAttribute("data-tab")
  
        document.querySelectorAll(".modal-tab-content").forEach((content) => {
          content.classList.remove("active")
        })
  
        document.getElementById(currentTab + "Tab").classList.add("active")
      })
    })
  
    // Mejorar el manejo de opciones de imagen
    imageOptions.forEach((option) => {
      option.addEventListener("click", () => {
        console.log("Opción seleccionada:", option.getAttribute("data-option"))
  
        imageOptions.forEach((o) => o.classList.remove("active"))
        option.classList.add("active")
  
        currentImageOption = option.getAttribute("data-option")
        console.log("Tipo de imagen actual:", currentImageOption)
  
        if (currentImageOption === "profile") {
          profilePreview.style.display = "block"
          bannerPreview.style.display = "none"
        } else {
          profilePreview.style.display = "none"
          bannerPreview.style.display = "block"
        }
      })
    })
  
    // Agregar código para depurar y asegurar que el evento de carga de imagen funcione correctamente
    if (imageUpload) {
      imageUpload.addEventListener("change", (e) => {
        const file = e.target.files[0]
        if (file) {
          const reader = new FileReader()
          reader.onload = (event) => {
            if (currentImageOption === "profile") {
              console.log("Cargando imagen de perfil")
              previewProfileImg.src = event.target.result
              newProfileImage = event.target.result
            } else {
              console.log("Cargando imagen de banner")
              previewBannerImg.src = event.target.result
              newBannerImage = event.target.result
            }
          }
          reader.readAsDataURL(file)
        }
      })
    }
  
    // Guardar cambios
    if (saveButton) {
      saveButton.addEventListener("click", () => {
        // Guardar imágenes
        if (newProfileImage) {
          const profileImg = document.getElementById("profileImg")
          const headerAvatar = document.getElementById("headerAvatar")
          const dropdownAvatar = document.querySelector(".dropdown-avatar")
  
          if (profileImg) profileImg.src = newProfileImage
          if (headerAvatar) headerAvatar.src = newProfileImage
          if (dropdownAvatar) dropdownAvatar.src = newProfileImage
  
          saveImageToLocalStorage("profile", newProfileImage)
        }
  
        if (newBannerImage) {
          const bannerImg = document.getElementById("bannerImg")
          if (bannerImg) bannerImg.src = newBannerImage
  
          saveImageToLocalStorage("banner", newBannerImage)
        }
  
        // Guardar información
        if (usernameInput && usernameInput.value.trim() !== "") {
          const username = document.getElementById("username")
          if (username) username.textContent = usernameInput.value
          localStorage.setItem("admin_username", usernameInput.value)
        }
  
        if (bioInput) {
          const userBio = document.getElementById("userBio")
          if (userBio) {
            userBio.textContent = bioInput.value
            // Mostrar u ocultar según si hay contenido
            if (!bioInput.value || bioInput.value.trim() === "") {
              userBio.style.display = "none"
            } else {
              userBio.style.display = "block"
            }
          }
          localStorage.setItem("admin_bio", bioInput.value)
        }
  
        // Asegurarse de cerrar el modal correctamente
        closeModal()
      })
    }
  })
  
  // Funciones de inicialización
  function initAdminProfile() {
    loadAdminInfo()
    loadStats()
    setupNavigation()
    loadUserManagement()
    loadContentReports()
    loadGroupsSeries()
    loadActionHistory()
    loadNotifications()
    loadSavedImages()
    setupCardInteractions()
    initProfileValues()
  }
  
  function loadAdminInfo() {
    // Actualizar nombre y rol
    const usernameElement = document.getElementById("username")
    const roleBadgeElement = document.getElementById("roleBadge")
    const groupNameElement = document.getElementById("groupName")
  
    // Usar el nombre guardado en localStorage o el valor por defecto
    const savedUsername = localStorage.getItem("admin_username")
  
    if (usernameElement) usernameElement.textContent = savedUsername || adminData.name
    if (roleBadgeElement) roleBadgeElement.textContent = adminData.role
    if (groupNameElement) groupNameElement.textContent = "Grupo Manga"
  }
  
  // Inicializar valores del perfil
  function initProfileValues() {
    // Establecer valores por defecto si no existen
    if (!localStorage.getItem("admin_username")) {
      localStorage.setItem("admin_username", adminData.name)
    }
  
    if (!localStorage.getItem("admin_bio")) {
      localStorage.setItem("admin_bio", "")
    }
  
    // Actualizar elementos con valores guardados
    const username = document.getElementById("username")
    const userBio = document.getElementById("userBio")
  
    if (username) {
      username.textContent = localStorage.getItem("admin_username")
    }
  
    if (userBio) {
      const bio = localStorage.getItem("admin_bio")
      userBio.textContent = bio || ""
  
      // Ocultar el elemento bio si está vacío
      if (!bio || bio.trim() === "") {
        userBio.style.display = "none"
      } else {
        userBio.style.display = "block"
      }
    }
  }
  
  // Cargar valores actuales en el modal
  function loadCurrentValues() {
    const usernameInput = document.getElementById("usernameInput")
    const bioInput = document.getElementById("bioInput")
    const previewProfileImg = document.getElementById("previewProfileImg")
    const previewBannerImg = document.getElementById("previewBannerImg")
  
    // Cargar nombre de usuario y bio
    if (usernameInput) {
      usernameInput.value = localStorage.getItem("admin_username") || ""
    }
  
    if (bioInput) {
      bioInput.value = localStorage.getItem("admin_bio") || ""
    }
  
    // Cargar imágenes actuales
    if (previewProfileImg) {
      const profileImg = document.getElementById("profileImg")
      if (profileImg) {
        previewProfileImg.src = profileImg.src
      }
    }
  
    if (previewBannerImg) {
      const bannerImg = document.getElementById("bannerImg")
      if (bannerImg) {
        previewBannerImg.src = bannerImg.src
      }
    }
  
    // Resetear variables de imágenes nuevas
    newProfileImage = null
    newBannerImage = null
  }
  
  // Cerrar modal
  function closeModal() {
    const modal = document.getElementById("editModal")
    if (modal) {
      modal.classList.remove("active")
    }
  
    // Resetear a la pestaña de imágenes
    document.querySelectorAll(".modal-tab").forEach((tab) => {
      tab.classList.remove("active")
      if (tab.getAttribute("data-tab") === "images") {
        tab.classList.add("active")
      }
    })
  
    document.querySelectorAll(".modal-tab-content").forEach((content) => {
      content.classList.remove("active")
    })
  
    const imagesTab = document.getElementById("imagesTab")
    if (imagesTab) {
      imagesTab.classList.add("active")
    }
  
    // Resetear a la opción de foto de perfil
    document.querySelectorAll(".image-option").forEach((option) => {
      option.classList.remove("active")
      if (option.getAttribute("data-option") === "profile") {
        option.classList.add("active")
      }
    })
  
    const profilePreview = document.getElementById("profilePreview")
    const bannerPreview = document.getElementById("bannerPreview")
  
    if (profilePreview) profilePreview.style.display = "block"
    if (bannerPreview) bannerPreview.style.display = "none"
  
    // Resetear variables
    newProfileImage = null
    newBannerImage = null
    currentTab = "images"
    currentImageOption = "profile"
  
    console.log("Modal cerrado correctamente")
  }
  
  function loadStats() {
    const totalUsersElement = document.getElementById("totalUsers")
    const totalReportsElement = document.getElementById("totalReports")
    const totalGroupsSeriesElement = document.getElementById("totalGroupsSeries")
  
    if (totalUsersElement) totalUsersElement.textContent = adminData.stats.totalUsers.toLocaleString()
    if (totalReportsElement) totalReportsElement.textContent = adminData.stats.totalReports.toLocaleString()
    if (totalGroupsSeriesElement)
      totalGroupsSeriesElement.textContent = adminData.stats.totalGroupsSeries.toLocaleString()
  }
  
  function setupNavigation() {
    const navLinks = document.querySelectorAll(".admin-nav a")
    const sections = document.querySelectorAll(".admin-section")
  
    navLinks.forEach((link) => {
      link.addEventListener("click", (e) => {
        e.preventDefault()
        const targetId = link.getAttribute("href").substring(1)
  
        sections.forEach((section) => section.classList.remove("active"))
        const targetSection = document.getElementById(targetId)
        if (targetSection) targetSection.classList.add("active")
  
        navLinks.forEach((navLink) => navLink.classList.remove("active"))
        link.classList.add("active")
      })
    })
  }
  
  function loadUserManagement() {
    const tableBody = document.getElementById("userTableBody")
    if (!tableBody) return
  
    tableBody.innerHTML = ""
  
    users.forEach((user) => {
      const row = document.createElement("tr")
      row.innerHTML = `
              <td>${user.id}</td>
              <td>${user.name}</td>
              <td>${user.email}</td>
              <td>${user.status}</td>
              <td>
                  <button class="action-button suspend-button">Suspender</button>
                  <button class="action-button delete-button">Eliminar</button>
              </td>
          `
      tableBody.appendChild(row)
    })
  }
  
  function loadContentReports() {
    const tableBody = document.getElementById("reportTableBody")
    if (!tableBody) return
  
    tableBody.innerHTML = ""
  
    reports.forEach((report) => {
      const row = document.createElement("tr")
      row.innerHTML = `
              <td>${report.id}</td>
              <td>${report.content}</td>
              <td>${report.reportedBy}</td>
              <td>${report.date}</td>
              <td>${report.status}</td>
              <td>
                  <button class="action-button delete-button">Eliminar Contenido</button>
                  <button class="action-button suspend-button">Suspender Usuario</button>
              </td>
          `
      tableBody.appendChild(row)
    })
  }
  
  function loadGroupsSeries() {
    const tableBody = document.getElementById("groupSeriesTableBody")
    if (!tableBody) return
  
    tableBody.innerHTML = ""
  
    groupsSeries.forEach((item) => {
      const row = document.createElement("tr")
      row.innerHTML = `
              <td>${item.id}</td>
              <td>${item.name}</td>
              <td>${item.type}</td>
              <td>${item.creator}</td>
              <td>
                  <button class="action-button delete-button">Eliminar</button>
              </td>
          `
      tableBody.appendChild(row)
    })
  }
  
  function loadActionHistory() {
    const tableBody = document.getElementById("actionHistoryTableBody")
    if (!tableBody) return
  
    tableBody.innerHTML = ""
  
    actionHistory.forEach((action) => {
      const row = document.createElement("tr")
      row.innerHTML = `
              <td>${action.date}</td>
              <td>${action.admin}</td>
              <td>${action.action}</td>
              <td>${action.details}</td>
          `
      tableBody.appendChild(row)
    })
  }
  
  // Funciones para el manejo de imágenes en localStorage
  function saveImageToLocalStorage(type, imageUrl) {
    localStorage.setItem(`admin_${type}_image`, imageUrl)
  }
  
  function getImageFromLocalStorage(type) {
    return localStorage.getItem(`admin_${type}_image`)
  }
  
  // Cargar imágenes guardadas
  function loadSavedImages() {
    const savedProfileImage = getImageFromLocalStorage("profile")
    const savedBannerImage = getImageFromLocalStorage("banner")
  
    if (savedProfileImage) {
      const profileImg = document.getElementById("profileImg")
      const headerAvatar = document.getElementById("headerAvatar")
      const dropdownAvatar = document.querySelector(".dropdown-avatar")
  
      if (profileImg) profileImg.src = savedProfileImage
      if (headerAvatar) headerAvatar.src = savedProfileImage
      if (dropdownAvatar) dropdownAvatar.src = savedProfileImage
    }
  
    if (savedBannerImage) {
      const bannerImg = document.getElementById("bannerImg")
      if (bannerImg) bannerImg.src = savedBannerImage
    }
  }
  
  // Cargar notificaciones
  function loadNotifications() {
    const notificationsList = document.querySelector(".notifications-list")
    if (!notificationsList) return
  
    notificationsList.innerHTML = ""
  
    notifications.slice(0, 10).forEach((notification) => {
      const notificationElement = document.createElement("div")
      notificationElement.className = `notification-item ${notification.unread ? "unread" : ""}`
      notificationElement.innerHTML = `
              <div class="notification-icon">
                  <i class="fas fa-${notification.icon}"></i>
              </div>
              <div class="notification-content">
                  <div class="notification-text">${notification.text}</div>
                  <div class="notification-time">${notification.time}</div>
              </div>
          `
      notificationsList.appendChild(notificationElement)
    })
  
    // Actualizar contador de notificaciones
    const notificationCount = notifications.filter((n) => n.unread).length
    const notificationCountElement = document.querySelector(".notification-count")
    if (notificationCountElement) notificationCountElement.textContent = notificationCount.toString()
  }
  
  // Configurar interacciones de tarjetas
  function setupCardInteractions() {
    const statCards = document.querySelectorAll(".stat-card")
  
    statCards.forEach((card) => {
      card.addEventListener("click", () => {
        const statId = card.id
        const sectionId = statId.replace("Card", "")
        const section = document.getElementById(sectionId)
  
        if (section) {
          section.scrollIntoView({ behavior: "smooth" })
        }
      })
    })
  }
  
  
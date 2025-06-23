// Datos de usuario (simulados - en una aplicación real vendrían de una base de datos)
const userData = {
  id: "134660574",
  username: "Dabvhiy",
  bio: "tururu ruru turu",
  profileImage: "/placeholder.svg?height=112&width=112",
  bannerImage: "/placeholder.svg?height=250&width=1200",
  memberSince: "Marzo 2023",
  stats: {
    publications: 0,
    following: 3,
    followers: 0,
    likes: 1,
    views: 0,
    totalLikes: 0,
  },
  isEditor: true,
  group: {
    id: "g123",
    name: "Grupo Manga",
    role: "Editor",
    avatar: "/placeholder.svg?height=60&width=60",
    isCreator: true,
  },
  publications: [],
  comments: [],
  favorites: [],
  series: [],
}

// Datos de logros (simulados)
const achievements = [
  {
    id: "ach1",
    name: "Lector Novato",
    description: "Leer 5 capítulos de cualquier serie",
    icon: "book-reader",
    progress: 100,
    unlocked: true,
  },
  {
    id: "ach2",
    name: "Comentarista",
    description: "Realizar 10 comentarios en el foro",
    icon: "comment",
    progress: 30,
    unlocked: false,
  },
  {
    id: "ach3",
    name: "Coleccionista",
    description: "Añadir 20 series a favoritos",
    icon: "heart",
    progress: 5,
    unlocked: false,
  },
  {
    id: "ach4",
    name: "Explorador",
    description: "Visitar todas las secciones de la plataforma",
    icon: "compass",
    progress: 60,
    unlocked: false,
  },
  {
    id: "ach5",
    name: "Socializador",
    description: "Seguir a 10 usuarios",
    icon: "users",
    progress: 30,
    unlocked: false,
  },
]

// Datos de miembros del grupo (simulados)
const groupMembers = [
  {
    id: "m1",
    name: "Dabvhiy",
    role: "Creador",
    avatar: "/placeholder.svg?height=50&width=50",
  },
  {
    id: "m2",
    name: "MangaLover",
    role: "Editor",
    avatar: "/placeholder.svg?height=50&width=50",
  },
  {
    id: "m3",
    name: "AnimeKing",
    role: "Editor",
    avatar: "/placeholder.svg?height=50&width=50",
  },
  {
    id: "m4",
    name: "OtakuPro",
    role: "Editor",
    avatar: "/placeholder.svg?height=50&width=50",
  },
]

// Datos de historial (simulados)
const activityHistory = [
  {
    id: "h1",
    user: "MangaLover",
    action: "subió un nuevo capítulo de 'Demon Slayer'",
    date: "Hace 2 días",
    icon: "upload",
  },
  {
    id: "h2",
    user: "AnimeKing",
    action: "editó el capítulo 5 de 'One Piece'",
    date: "Hace 3 días",
    icon: "edit",
  },
  {
    id: "h3",
    user: "OtakuPro",
    action: "añadió una nueva serie: 'Jujutsu Kaisen'",
    date: "Hace 5 días",
    icon: "plus",
  },
  {
    id: "h4",
    user: "Dabvhiy",
    action: "actualizó la información del grupo",
    date: "Hace 1 semana",
    icon: "info",
  },
]

// Elementos DOM
const userMenuTrigger = document.getElementById("userMenuTrigger")
const userDropdown = document.getElementById("userDropdown")
const headerAvatar = document.getElementById("headerAvatar")
const profileImg = document.getElementById("profileImg")
const bannerImg = document.getElementById("bannerImg")
const username = document.getElementById("username")
const userBio = document.getElementById("userBio")
const editorRoleContainer = document.getElementById("editorRoleContainer")
const roleBadge = document.getElementById("roleBadge")
const groupName = document.getElementById("groupName")
const publicationsCount = document.getElementById("publicationsCount")
const followingCount = document.getElementById("followingCount")
const followersCount = document.getElementById("followersCount")
const likesCount = document.getElementById("likesCount")
const viewsCount = document.getElementById("viewsCount")
const totalLikesCount = document.getElementById("totalLikesCount")
const nekonekId = document.getElementById("nekonekId")
const memberSince = document.getElementById("memberSince")
const groupSection = document.getElementById("groupSection")
const groupDetailName = document.getElementById("groupDetailName")
const groupRole = document.getElementById("groupRole")
const groupAvatar = document.getElementById("groupAvatar")
const seriesTab = document.getElementById("seriesTab")

// Modales
const editModal = document.getElementById("editModal")
const membersModal = document.getElementById("membersModal")
const historyModal = document.getElementById("historyModal")
const achievementsModal = document.getElementById("achievementsModal")

// Botones
const editButton = document.getElementById("editButton")
const cancelButton = document.getElementById("cancelButton")
const saveButton = document.getElementById("saveButton")
const closeModalBtn = document.getElementById("closeModalBtn")
const viewMembersBtn = document.getElementById("viewMembersBtn")
const viewHistoryBtn = document.getElementById("viewHistoryBtn")
const closeMembersBtn = document.getElementById("closeMembersBtn")
const closeHistoryBtn = document.getElementById("closeHistoryBtn")
const achievementCenter = document.getElementById("achievementCenter")
const closeAchievementsBtn = document.getElementById("closeAchievementsBtn")
const chromasButton = document.getElementById("chromasButton")
const logoutBtn = document.getElementById("logoutBtn")
const configBtn = document.getElementById("configBtn")

// Contenedores de contenido
const publicationsGrid = document.getElementById("publicationsGrid")
const commentsList = document.getElementById("commentsList")
const favoritesGrid = document.getElementById("favoritesGrid")
const seriesGrid = document.getElementById("seriesGrid")
const membersList = document.getElementById("membersList")
const historyList = document.getElementById("historyList")
const achievementsGrid = document.getElementById("achievementsGrid")
const achievementPreview = document.getElementById("achievementPreview")

// Mensajes de no contenido
const noPublications = document.getElementById("noPublications")
const noComments = document.getElementById("noComments")
const noFavorites = document.getElementById("noFavorites")
const noSeries = document.getElementById("noSeries")

// Elementos del modal de edición
const imageOptions = document.querySelectorAll(".image-option")
const profilePreview = document.getElementById("profilePreview")
const bannerPreview = document.getElementById("bannerPreview")
const imageUpload = document.getElementById("imageUpload")
const previewProfileImg = document.getElementById("previewProfileImg")
const previewBannerImg = document.getElementById("previewBannerImg")
const modalTabs = document.querySelectorAll(".modal-tab")
const imagesTab = document.getElementById("imagesTab")
const infoTab = document.getElementById("infoTab")
const usernameInput = document.getElementById("usernameInput")
const bioInput = document.getElementById("bioInput")

// Variables para almacenar imágenes nuevas
let newProfileImage = null
let newBannerImage = null
let currentOption = "profile"

// Añadir estas nuevas variables
const groupMenuTrigger = document.getElementById("groupMenuTrigger")
const groupDropdown = document.getElementById("groupDropdown")
const followingMenuTrigger = document.getElementById("followingMenuTrigger")
const followingDropdown = document.getElementById("followingDropdown")

// Funciones para manejar el almacenamiento local con manejo de errores
function saveImageToLocalStorage(type, imageUrl) {
  try {
    // Usamos el rol actual para crear una clave única
    const role = userData.isEditor ? "editor" : "lector"
    localStorage.setItem(`user_${role}_${type}_image`, imageUrl)
    console.log(`Saved ${type} image for ${role} to localStorage`)
  } catch (error) {
    console.error(`Error saving ${type} image to localStorage:`, error)
  }
}

function getImageFromLocalStorage(type) {
  try {
    // Usamos el rol actual para obtener la imagen correspondiente
    const role = userData.isEditor ? "editor" : "lector"
    return localStorage.getItem(`user_${role}_${type}_image`)
  } catch (error) {
    console.error(`Error getting ${type} image from localStorage:`, error)
    return null
  }
}

// Inicializar la página
function initPage() {
  // Cargar datos del usuario
  loadUserData()

  // Configurar eventos
  setupEventListeners()

  // Cargar contenido inicial
  loadPublications()
  loadComments()
  loadFavorites()
  loadSeries()

  // Mostrar/ocultar elementos según el rol
  toggleEditorElements()
}

// Cargar datos del usuario en la interfaz
function loadUserData() {
  // Información básica
  username.textContent = userData.username
  userBio.textContent = userData.bio

  // Cargar imágenes desde localStorage si existen, de lo contrario usar las predeterminadas
  // Usamos el rol actual para obtener las imágenes correspondientes
  const role = userData.isEditor ? "editor" : "lector"
  const storedProfileImage = getImageFromLocalStorage("profile")
  const storedBannerImage = getImageFromLocalStorage("banner")

  console.log(`Stored ${role} profile image:`, storedProfileImage ? "Found" : "Not found")
  console.log(`Stored ${role} banner image:`, storedBannerImage ? "Found" : "Not found")

  // Actualizar todas las instancias de la imagen de perfil
  if (storedProfileImage) {
    profileImg.src = storedProfileImage
    headerAvatar.src = storedProfileImage
    const dropdownAvatar = document.querySelector(".dropdown-avatar")
    if (dropdownAvatar) {
      dropdownAvatar.src = storedProfileImage
    }
    previewProfileImg.src = storedProfileImage
  } else {
    profileImg.src = userData.profileImage
    headerAvatar.src = userData.profileImage
    const dropdownAvatar = document.querySelector(".dropdown-avatar")
    if (dropdownAvatar) {
      dropdownAvatar.src = userData.profileImage
    }
    previewProfileImg.src = userData.profileImage
  }

  // Actualizar la imagen de fondo
  if (storedBannerImage) {
    bannerImg.src = storedBannerImage
    previewBannerImg.src = storedBannerImage
  } else {
    bannerImg.src = userData.bannerImage
    previewBannerImg.src = userData.bannerImage
  }

  // Estadísticas
  publicationsCount.textContent = userData.stats.publications
  followingCount.textContent = userData.stats.following
  followersCount.textContent = userData.stats.followers
  likesCount.textContent = userData.stats.likes
  viewsCount.textContent = userData.stats.views
  totalLikesCount.textContent = userData.stats.totalLikes

  // Información personal
  nekonekId.textContent = `Nekonek ID: ${userData.id}`
  memberSince.textContent = `Miembro desde: ${userData.memberSince}`

  // Información de grupo (si es editor)
  if (userData.isEditor && userData.group) {
    groupDetailName.textContent = userData.group.name
    groupRole.textContent = userData.group.role
    groupAvatar.src = userData.group.avatar
    roleBadge.textContent = userData.group.role
    groupName.textContent = userData.group.name
  }

  // Inicializar campos del formulario de edición
  usernameInput.value = userData.username
  bioInput.value = userData.bio
}

// Configurar todos los event listeners
function setupEventListeners() {
  // Menú de usuario en el header
  userMenuTrigger.addEventListener("click", toggleUserMenu)

  // Menú de Grupo en el header
  groupMenuTrigger.addEventListener("click", toggleGroupMenu)

  // Menú de Siguiendo en el header
  followingMenuTrigger.addEventListener("click", toggleFollowingMenu)

  // Cerrar menú al hacer clic fuera
  document.addEventListener("click", (e) => {
    if (!userMenuTrigger.contains(e.target) && !userDropdown.contains(e.target)) {
      userDropdown.classList.remove("active")
    }
    if (!groupMenuTrigger.contains(e.target) && !groupDropdown.contains(e.target)) {
      groupDropdown.classList.remove("active")
    }
    if (!followingMenuTrigger.contains(e.target) && !followingDropdown.contains(e.target)) {
      followingDropdown.classList.remove("active")
    }
  })

  // Cambiar entre pestañas
  document.querySelectorAll(".tab").forEach((tab) => {
    tab.addEventListener("click", () => {
      // Desactivar todas las pestañas
      document.querySelectorAll(".tab").forEach((t) => {
        t.classList.remove("active")
      })

      // Activar la pestaña seleccionada
      tab.classList.add("active")

      // Ocultar todos los contenidos
      document.querySelectorAll(".tab-content").forEach((content) => {
        content.classList.remove("active")
      })

      // Mostrar el contenido correspondiente
      const tabName = tab.getAttribute("data-tab")
      document.getElementById(`${tabName}Tab`).classList.add("active")
    })
  })

  // Modal de edición
  editButton.addEventListener("click", () => {
    editModal.classList.add("active")

    // Asegurarse de que las imágenes de vista previa estén actualizadas
    const storedProfileImage = getImageFromLocalStorage("profile")
    const storedBannerImage = getImageFromLocalStorage("banner")

    previewProfileImg.src = storedProfileImage || userData.profileImage
    previewBannerImg.src = storedBannerImage || userData.bannerImage
  })

  cancelButton.addEventListener("click", closeEditModal)
  closeModalBtn.addEventListener("click", closeEditModal)

  // Cambiar entre opciones de imagen
  imageOptions.forEach((option) => {
    option.addEventListener("click", () => {
      // Desactivar todas las opciones
      imageOptions.forEach((o) => {
        o.classList.remove("active")
      })

      // Activar la opción seleccionada
      option.classList.add("active")

      // Actualizar la opción actual
      currentOption = option.getAttribute("data-option")

      // Mostrar la vista previa correspondiente
      if (currentOption === "profile") {
        profilePreview.style.display = "block"
        bannerPreview.style.display = "none"
      } else {
        profilePreview.style.display = "none"
        bannerPreview.style.display = "block"
      }
    })
  })

  // Cambiar entre pestañas del modal
  modalTabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      // Desactivar todas las pestañas
      modalTabs.forEach((t) => {
        t.classList.remove("active")
      })

      // Activar la pestaña seleccionada
      tab.classList.add("active")

      // Ocultar todos los contenidos
      document.querySelectorAll(".modal-tab-content").forEach((content) => {
        content.classList.remove("active")
      })

      // Mostrar el contenido correspondiente
      const tabName = tab.getAttribute("data-tab")
      document.getElementById(`${tabName}Tab`).classList.add("active")
    })
  })

  // Cargar imágenes con manejo de errores
  imageUpload.addEventListener("change", (event) => {
    const file = event.target.files[0]
    if (file) {
      const reader = new FileReader()

      reader.onload = (e) => {
        try {
          if (currentOption === "profile") {
            // Para foto de perfil, permitir cualquier imagen sin restricciones
            previewProfileImg.src = e.target.result
            newProfileImage = e.target.result
            console.log("New profile image set in preview")
          } else if (currentOption === "banner") {
            // Para imagen de fondo, mantener validaciones
            // Check file size for banner (limit to 5MB)
            if (file.size > 5 * 1024 * 1024) {
              alert("Error: La imagen de fondo es demasiado grande. El tamaño máximo permitido es 5MB.")
              imageUpload.value = "" // Reset the input
              return
            }

            // Check file type for banner
            const validTypes = ["image/jpeg", "image/png", "image/gif", "image/webp"]
            if (!validTypes.includes(file.type)) {
              alert("Error: Formato de imagen no válido para el fondo. Por favor, usa JPG, PNG, GIF o WebP.")
              imageUpload.value = "" // Reset the input
              return
            }

            previewBannerImg.src = e.target.result
            newBannerImage = e.target.result
            console.log("New banner image set in preview")
          }
        } catch (error) {
          console.error("Error setting image preview:", error)
          if (currentOption === "banner") {
            alert("Error: No se pudo cargar la imagen de fondo. Por favor, intenta con otra imagen.")
          }
        }
      }

      reader.onerror = () => {
        if (currentOption === "banner") {
          alert("Error: No se pudo leer el archivo para la imagen de fondo. Por favor, intenta con otra imagen.")
        }
        imageUpload.value = "" // Reset the input
      }

      try {
        reader.readAsDataURL(file)
      } catch (error) {
        console.error("Error reading file:", error)
        if (currentOption === "banner") {
          alert("Error: No se pudo procesar la imagen de fondo. Por favor, intenta con otra imagen.")
        }
        imageUpload.value = "" // Reset the input
      }
    }
  })

  // Guardar cambios
  saveButton.addEventListener("click", saveChanges)

  // Modal de miembros
  viewMembersBtn.addEventListener("click", () => {
    loadGroupMembers()
    membersModal.classList.add("active")
  })

  closeMembersBtn.addEventListener("click", () => {
    membersModal.classList.remove("active")
  })

  // Modal de historial
  viewHistoryBtn.addEventListener("click", () => {
    loadActivityHistory()
    historyModal.classList.add("active")
  })

  closeHistoryBtn.addEventListener("click", () => {
    historyModal.classList.remove("active")
  })

  // Centro de logros
  achievementCenter.addEventListener("click", () => {
    achievementsModal.classList.add("active")
    loadAchievements()
  })

  closeAchievementsBtn.addEventListener("click", () => {
    achievementsModal.classList.remove("active")
  })

  // Botón de Chromas
  chromasButton.addEventListener("click", () => {
    alert("Funcionalidad de Chromas en desarrollo")
  })

  // Botón de cerrar sesión
  logoutBtn.addEventListener("click", () => {
    if (confirm("¿Estás seguro de que deseas cerrar sesión?")) {
      alert("Sesión cerrada correctamente")
      // En una aplicación real, redirigir a la página de inicio de sesión
      // window.location.href = 'login.html';
    }
  })

  // Botón de configuración
  configBtn.addEventListener("click", () => {
    alert("Página de configuración en desarrollo")
    // En una aplicación real, redirigir a la página de configuración
    // window.location.href = 'configuracion.html';
  })
}

// Mostrar/ocultar elementos según el rol del usuario
function toggleEditorElements() {
  if (userData.isEditor) {
    editorRoleContainer.style.display = "flex"
    groupSection.style.display = "block"
    seriesTab.style.display = "block"
  } else {
    editorRoleContainer.style.display = "none"
    groupSection.style.display = "none"
    seriesTab.style.display = "none"
  }
}

// Alternar menú de usuario
function toggleUserMenu(event) {
  event.stopPropagation()
  userDropdown.classList.toggle("active")
  // Cerrar el menú de grupo si está abierto
  groupDropdown.classList.remove("active")
  followingDropdown.classList.remove("active")
}

// Añadir esta nueva función
function toggleGroupMenu(event) {
  event.stopPropagation()
  groupDropdown.classList.toggle("active")
  // Cerrar el menú de usuario si está abierto
  userDropdown.classList.remove("active")
  followingDropdown.classList.remove("active")
}

// Añade esta nueva función
function toggleFollowingMenu(event) {
  event.stopPropagation()
  followingDropdown.classList.toggle("active")
  // Cerrar otros menús si están abiertos
  userDropdown.classList.remove("active")
  groupDropdown.classList.remove("active")
}

// Cerrar modal de edición
function closeEditModal() {
  editModal.classList.remove("active")
  // Restablecer las vistas previas y limpiar el input de archivo
  imageUpload.value = ""
  newProfileImage = null
  newBannerImage = null
  // Restablecer los campos de texto
  usernameInput.value = userData.username
  bioInput.value = userData.bio
}

// Guardar cambios del perfil con mejor manejo de errores
function saveChanges() {
  let hasChanges = false
  let bannerError = false

  // Actualizar imágenes si se han cambiado
  if (newProfileImage) {
    try {
      console.log("Saving new profile image")
      saveImageToLocalStorage("profile", newProfileImage)

      // Actualizar todas las instancias de la imagen de perfil en la interfaz
      profileImg.src = newProfileImage
      headerAvatar.src = newProfileImage

      const dropdownAvatar = document.querySelector(".dropdown-avatar")
      if (dropdownAvatar) {
        dropdownAvatar.src = newProfileImage
      }

      // Actualizar también userData para mantener la coherencia
      userData.profileImage = newProfileImage

      hasChanges = true
      console.log("Profile image updated successfully")
    } catch (error) {
      console.error("Error saving profile image:", error)
      // No mostrar error al usuario para la foto de perfil
    }
  }

  if (newBannerImage) {
    try {
      console.log("Saving new banner image")
      saveImageToLocalStorage("banner", newBannerImage)
      bannerImg.src = newBannerImage

      // Actualizar también userData para mantener la coherencia
      userData.bannerImage = newBannerImage

      hasChanges = true
      console.log("Banner image updated successfully")
    } catch (error) {
      console.error("Error saving banner image:", error)
      alert("Error: No se pudo guardar la imagen de fondo. Por favor, intenta con otra imagen.")
      bannerError = true
    }
  }

  // Actualizar información de texto
  if (usernameInput.value !== userData.username || bioInput.value !== userData.bio) {
    userData.username = usernameInput.value
    userData.bio = bioInput.value
    username.textContent = userData.username
    userBio.textContent = userData.bio
    hasChanges = true
  }

  // Cerrar el modal y mostrar mensaje solo si hubo cambios
  if (hasChanges && !bannerError) {
    editModal.classList.remove("active")
    // Reset the file input
    imageUpload.value = ""
    newProfileImage = null
    newBannerImage = null
    alert("Perfil actualizado correctamente")
  } else if (!hasChanges && !bannerError) {
    alert("No se detectaron cambios en el perfil")
  }
}

// Cargar publicaciones del usuario
function loadPublications() {
  if (userData.publications.length === 0) {
    noPublications.style.display = "block"
    publicationsGrid.style.display = "none"
    return
  }

  noPublications.style.display = "none"
  publicationsGrid.style.display = "grid"

  // Limpiar el contenedor
  publicationsGrid.innerHTML = ""

  // Añadir cada publicación
  userData.publications.forEach((pub) => {
    const pubElement = createPublicationElement(pub)
    publicationsGrid.appendChild(pubElement)
  })
}

// Crear elemento de publicación
function createPublicationElement(publication) {
  const element = document.createElement("div")
  element.className = "publication-item"

  element.innerHTML = `
            <img src="${publication.image}" alt="${publication.title}" class="item-image">
            <div class="item-content">
                <h3 class="item-title">${publication.title}</h3>
                <p>${publication.excerpt}</p>
                <div class="item-meta">
                    <span><i class="fas fa-eye"></i> ${publication.views}</span>
                    <span><i class="fas fa-heart"></i> ${publication.likes}</span>
                </div>
            </div>
        `

  return element
}

// Cargar comentarios del usuario
function loadComments() {
  if (userData.comments.length === 0) {
    noComments.style.display = "block"
    commentsList.style.display = "none"
    return
  }

  noComments.style.display = "none"
  commentsList.style.display = "block"

  // Limpiar el contenedor
  commentsList.innerHTML = ""

  // Añadir cada comentario
  userData.comments.forEach((comment) => {
    const commentElement = createCommentElement(comment)
    commentsList.appendChild(commentElement)
  })
}

// Crear elemento de comentario
function createCommentElement(comment) {
  const element = document.createElement("div")
  element.className = "comment-item"

  element.innerHTML = `
            <div class="comment-header">
                <span class="comment-source">${comment.source}</span>
                <span class="comment-date">${comment.date}</span>
            </div>
            <p class="comment-text">${comment.text}</p>
        `

  return element
}

// Cargar favoritos del usuario
function loadFavorites() {
  if (userData.favorites.length === 0) {
    noFavorites.style.display = "block"
    favoritesGrid.style.display = "none"
    return
  }

  noFavorites.style.display = "none"
  favoritesGrid.style.display = "grid"

  // Limpiar el contenedor
  favoritesGrid.innerHTML = ""

  // Añadir cada favorito
  userData.favorites.forEach((fav) => {
    const favElement = createFavoriteElement(fav)
    favoritesGrid.appendChild(favElement)
  })
}

// Crear elemento de favorito
function createFavoriteElement(favorite) {
  const element = document.createElement("div")
  element.className = "favorite-item"

  element.innerHTML = `
            <img src="${favorite.image}" alt="${favorite.title}" class="item-image">
            <div class="item-content">
                <h3 class="item-title">${favorite.title}</h3>
                <p>${favorite.type}</p>
                <div class="item-meta">
                    <span><i class="fas fa-star"></i> ${favorite.rating}</span>
                    <span><i class="fas fa-bookmark"></i> ${favorite.category}</span>
                </div>
            </div>
        `

  return element
}

// Cargar series del usuario (para editores)
function loadSeries() {
  if (!userData.isEditor || userData.series.length === 0) {
    noSeries.style.display = "block"
    seriesGrid.style.display = "none"
    return
  }

  noSeries.style.display = "none"
  seriesGrid.style.display = "grid"

  // Limpiar el contenedor
  seriesGrid.innerHTML = ""

  // Añadir cada serie
  userData.series.forEach((series) => {
    const seriesElement = createSeriesElement(series)
    seriesGrid.appendChild(seriesElement)
  })
}

// Crear elemento de serie
function createSeriesElement(series) {
  const element = document.createElement("div")
  element.className = "series-item"

  element.innerHTML = `
            <img src="${series.image}" alt="${series.title}" class="item-image">
            <div class="item-content">
                <h3 class="item-title">${series.title}</h3>
                <p>${series.status}</p>
                <div class="item-meta">
                    <span><i class="fas fa-book"></i> ${series.chapters} capítulos</span>
                    <span><i class="fas fa-users"></i> ${series.readers} lectores</span>
                </div>
            </div>
        `

  return element
}

// Cargar miembros del grupo
function loadGroupMembers() {
  // Limpiar el contenedor
  membersList.innerHTML = ""

  // Añadir cada miembro
  groupMembers.forEach((member) => {
    const memberElement = document.createElement("div")
    memberElement.className = "member-item"

    // Determinar si es el creador para mostrar opciones adicionales
    const isCreator = userData.group.isCreator && member.id !== "m1" // No mostrar opciones para sí mismo

    memberElement.innerHTML = `
                <img src="${member.avatar}" alt="${member.name}" class="member-avatar">
                <div class="member-info">
                    <div class="member-name">${member.name}</div>
                    <div class="member-role">${member.role}</div>
                </div>
                ${
                  isCreator
                    ? `
                    <div class="member-actions">
                        <button class="member-action" data-id="${member.id}" data-action="message">
                            <i class="fas fa-envelope"></i>
                        </button>
                        <button class="member-action" data-id="${member.id}" data-action="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `
                    : ""
                }
            `

    membersList.appendChild(memberElement)
  })

  // Añadir event listeners a los botones de acción
  document.querySelectorAll(".member-action").forEach((button) => {
    button.addEventListener("click", function () {
      const memberId = this.getAttribute("data-id")
      const action = this.getAttribute("data-action")

      if (action === "message") {
        alert(`Enviar mensaje a ${groupMembers.find((m) => m.id === memberId).name}`)
      } else if (action === "remove") {
        if (
          confirm(
            `¿Estás seguro de que deseas eliminar a ${groupMembers.find((m) => m.id === memberId).name} del grupo?`,
          )
        ) {
          alert("Miembro eliminado correctamente")
          // En una aplicación real, eliminar el miembro y actualizar la lista
        }
      }
    })
  })
}

// Cargar historial de actividad
function loadActivityHistory() {
  // Limpiar el contenedor
  historyList.innerHTML = ""

  // Añadir cada actividad
  activityHistory.forEach((activity) => {
    const activityElement = document.createElement("div")
    activityElement.className = "history-item"

    activityElement.innerHTML = `
                <div class="history-icon">
                    <i class="fas fa-${activity.icon}"></i>
                </div>
                <div class="history-content">
                    <p class="history-text"><strong>${activity.user}</strong> ${activity.action}</p>
                    <span class="history-date">${activity.date}</span>
                </div>
            `

    historyList.appendChild(activityElement)
  })
}

// Cargar logros
function loadAchievements() {
  // Actualizar estadísticas
  const completedCount = achievements.filter((a) => a.unlocked).length
  const totalCount = achievements.length
  const percentage = Math.round((completedCount / totalCount) * 100)

  document.getElementById("achievementsCompleted").textContent = completedCount
  document.getElementById("achievementsTotal").textContent = totalCount
  document.getElementById("achievementsPercentage").textContent = `${percentage}%`

  // Limpiar el contenedor
  achievementsGrid.innerHTML = ""

  // Añadir cada logro
  achievements.forEach((achievement) => {
    const achievementElement = document.createElement("div")
    achievementElement.className = "achievement-card"

    achievementElement.innerHTML = `
                <div class="achievement-card-icon ${achievement.unlocked ? "unlocked" : "locked"}">
                    <i class="fas fa-${achievement.icon}"></i>
                </div>
                <h3 class="achievement-card-title">${achievement.name}</h3>
                <p class="achievement-card-description">${achievement.description}</p>
                <div class="achievement-card-progress">
                    <div class="achievement-card-progress-bar" style="width: ${achievement.progress}%"></div>
                </div>
                <div class="achievement-card-status">
                    ${achievement.unlocked ? "Completado" : `${achievement.progress}% completado`}
                </div>
            `

    achievementsGrid.appendChild(achievementElement)
  })
}

// Inicializar la página cuando el DOM esté cargado
document.addEventListener("DOMContentLoaded", initPage)


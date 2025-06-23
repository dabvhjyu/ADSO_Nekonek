// Datos de usuario (simulados - en una aplicación real vendrían de una base de datos)
const userData = {
  id: "134660574",
  username: "Dabvhiy",
  bio: "Amante de la lectura y el manga",
  profileImage: "",
  bannerImage: "",
  memberSince: "Marzo 2023",
  stats: {
    publications: 0,
    following: 3,
    followers: 0,
    likes: 1,
    views: 0,
    totalLikes: 0,
  },
  publications: [],
  comments: [],
  favorites: [],
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

// Elementos DOM
const userMenuTrigger = document.getElementById("userMenuTrigger")
const userDropdown = document.getElementById("userDropdown")
const headerAvatar = document.getElementById("headerAvatar")
const profileImg = document.getElementById("profileImg")
const bannerImg = document.getElementById("bannerImg")
const username = document.getElementById("username")
const userBio = document.getElementById("userBio")
const publicationsCount = document.getElementById("publicationsCount")
const followingCount = document.getElementById("followingCount")
const followersCount = document.getElementById("followersCount")
const likesCount = document.getElementById("likesCount")
const viewsCount = document.getElementById("viewsCount")
const totalLikesCount = document.getElementById("totalLikesCount")
const nekonekId = document.getElementById("nekonekId")
const memberSince = document.getElementById("memberSince")

// Modales
const editModal = document.getElementById("editModal")
const achievementsModal = document.getElementById("achievementsModal")

// Botones
const editButton = document.getElementById("editButton")
const cancelButton = document.getElementById("cancelButton")
const saveButton = document.getElementById("saveButton")
const closeModalBtn = document.getElementById("closeModalBtn")
const achievementCenter = document.getElementById("achievementCenter")
const closeAchievementsBtn = document.getElementById("closeAchievementsBtn")
const chromasButton = document.getElementById("chromasButton")
const logoutBtn = document.getElementById("logoutBtn")
const configBtn = document.getElementById("configBtn")

// Contenedores de contenido
const publicationsGrid = document.getElementById("publicationsGrid")
const commentsList = document.getElementById("commentsList")
const favoritesGrid = document.getElementById("favoritesGrid")
const achievementsGrid = document.getElementById("achievementsGrid")
const achievementPreview = document.getElementById("achievementPreview")

// Mensajes de no contenido
const noPublications = document.getElementById("noPublications")
const noComments = document.getElementById("noComments")
const noFavorites = document.getElementById("noFavorites")

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
const followingMenuTrigger = document.getElementById("followingMenuTrigger")
const followingDropdown = document.getElementById("followingDropdown")

// Funciones para manejar el almacenamiento local
function saveImageToLocalStorage(type, imageUrl) {
  try {
    localStorage.setItem(`user_${type}_image`, imageUrl)
    console.log(`Saved ${type} image to localStorage`)
  } catch (error) {
    console.error(`Error saving ${type} image to localStorage:`, error)
  }
}

function getImageFromLocalStorage(type) {
  try {
    return localStorage.getItem(`user_${type}_image`)
  } catch (error) {
    console.error(`Error getting ${type} image from localStorage:`, error)
    return null
  }
}

// Inicializar la página
function initPage() {
  loadUserData()
  setupEventListeners()
  loadPublications()
  loadComments()
  loadFavorites()
}

// Cargar datos del usuario en la interfaz
function loadUserData() {
  username.textContent = userData.username
  userBio.textContent = userData.bio

  const storedProfileImage = getImageFromLocalStorage("profile")
  const storedBannerImage = getImageFromLocalStorage("banner")

  console.log("Stored profile image:", storedProfileImage ? "Found" : "Not found")
  console.log("Stored banner image:", storedBannerImage ? "Found" : "Not found")

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

  if (storedBannerImage) {
    bannerImg.src = storedBannerImage
    previewBannerImg.src = storedBannerImage
  } else {
    bannerImg.src = userData.bannerImage
    previewBannerImg.src = userData.bannerImage
  }

  publicationsCount.textContent = userData.stats.publications
  followingCount.textContent = userData.stats.following
  followersCount.textContent = userData.stats.followers
  likesCount.textContent = userData.stats.likes
  viewsCount.textContent = userData.stats.views
  totalLikesCount.textContent = userData.stats.totalLikes

  nekonekId.textContent = `Nekonek ID: ${userData.id}`
  memberSince.textContent = `Miembro desde: ${userData.memberSince}`

  usernameInput.value = userData.username
  bioInput.value = userData.bio
}

// Configurar todos los event listeners
function setupEventListeners() {
  userMenuTrigger.addEventListener("click", toggleUserMenu)
  followingMenuTrigger.addEventListener("click", toggleFollowingMenu)

  document.addEventListener("click", (e) => {
    if (!userMenuTrigger.contains(e.target) && !userDropdown.contains(e.target)) {
      userDropdown.classList.remove("active")
    }
    if (!followingMenuTrigger.contains(e.target) && !followingDropdown.contains(e.target)) {
      followingDropdown.classList.remove("active")
    }
  })

  document.querySelectorAll(".tab").forEach((tab) => {
    tab.addEventListener("click", () => {
      document.querySelectorAll(".tab").forEach((t) => {
        t.classList.remove("active")
      })
      tab.classList.add("active")
      document.querySelectorAll(".tab-content").forEach((content) => {
        content.classList.remove("active")
      })
      const tabName = tab.getAttribute("data-tab")
      document.getElementById(`${tabName}Tab`).classList.add("active")
    })
  })

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

  imageOptions.forEach((option) => {
    option.addEventListener("click", () => {
      imageOptions.forEach((o) => {
        o.classList.remove("active")
      })
      option.classList.add("active")
      currentOption = option.getAttribute("data-option")
      if (currentOption === "profile") {
        profilePreview.style.display = "block"
        bannerPreview.style.display = "none"
      } else {
        profilePreview.style.display = "none"
        bannerPreview.style.display = "block"
      }
    })
  })

  modalTabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      modalTabs.forEach((t) => {
        t.classList.remove("active")
      })
      tab.classList.add("active")
      document.querySelectorAll(".modal-tab-content").forEach((content) => {
        content.classList.remove("active")
      })
      const tabName = tab.getAttribute("data-tab")
      document.getElementById(`${tabName}Tab`).classList.add("active")
    })
  })

  // Update the imageUpload event listener to include error handling only for banner images
  imageUpload.addEventListener("change", (event) => {
    const file = event.target.files[0]
    if (file) {
      const reader = new FileReader()

      reader.onload = (e) => {
        if (currentOption === "profile") {
          // Para foto de perfil, permitir cualquier imagen sin restricciones
          previewProfileImg.src = e.target.result
          newProfileImage = e.target.result
          console.log("New profile image set in preview")
        } else if (currentOption === "banner") {
          // Para imagen de fondo, mantener validaciones
          try {
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
          } catch (error) {
            alert("Error: No se pudo cargar la imagen de fondo. Por favor, intenta con otra imagen.")
            console.error("Error loading banner image:", error)
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
        if (currentOption === "banner") {
          alert("Error: No se pudo procesar la imagen de fondo. Por favor, intenta con otra imagen.")
          console.error("Error reading banner file:", error)
        }
        imageUpload.value = "" // Reset the input
      }
    }
  })

  saveButton.addEventListener("click", saveChanges)

  achievementCenter.addEventListener("click", () => {
    achievementsModal.classList.add("active")
    loadAchievements()
  })

  closeAchievementsBtn.addEventListener("click", () => {
    achievementsModal.classList.remove("active")
  })

  chromasButton.addEventListener("click", () => {
    alert("Funcionalidad de Chromas en desarrollo")
  })

  logoutBtn.addEventListener("click", () => {
    if (confirm("¿Estás seguro de que deseas cerrar sesión?")) {
      alert("Sesión cerrada correctamente")
      // En una aplicación real, redirigir a la página de inicio de sesión
      // window.location.href = 'login.html';
    }
  })

  configBtn.addEventListener("click", () => {
    alert("Página de configuración en desarrollo")
    // En una aplicación real, redirigir a la página de configuración
    // window.location.href = 'configuracion.html';
  })
}

function toggleUserMenu(event) {
  event.stopPropagation()
  userDropdown.classList.toggle("active")
  followingDropdown.classList.remove("active")
}

function toggleFollowingMenu(event) {
  event.stopPropagation()
  followingDropdown.classList.toggle("active")
  userDropdown.classList.remove("active")
}

function closeEditModal() {
  editModal.classList.remove("active")
  // Reset the file input
  imageUpload.value = ""
  newProfileImage = null
  newBannerImage = null
  usernameInput.value = userData.username
  bioInput.value = userData.bio
}

// Update the saveChanges function to provide better feedback
function saveChanges() {
  let hasChanges = false
  let bannerError = false

  // Siempre permitir guardar la foto de perfil sin restricciones
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

  // Mantener validaciones para la imagen de fondo
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

  if (usernameInput.value !== userData.username || bioInput.value !== userData.bio) {
    userData.username = usernameInput.value
    userData.bio = bioInput.value
    username.textContent = userData.username
    userBio.textContent = userData.bio
    hasChanges = true
  }

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

function loadPublications() {
  if (userData.publications.length === 0) {
    noPublications.style.display = "block"
    publicationsGrid.style.display = "none"
    return
  }

  noPublications.style.display = "none"
  publicationsGrid.style.display = "grid"

  publicationsGrid.innerHTML = ""

  userData.publications.forEach((pub) => {
    const pubElement = createPublicationElement(pub)
    publicationsGrid.appendChild(pubElement)
  })
}

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

function loadComments() {
  if (userData.comments.length === 0) {
    noComments.style.display = "block"
    commentsList.style.display = "none"
    return
  }

  noComments.style.display = "none"
  commentsList.style.display = "block"

  commentsList.innerHTML = ""

  userData.comments.forEach((comment) => {
    const commentElement = createCommentElement(comment)
    commentsList.appendChild(commentElement)
  })
}

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

function loadFavorites() {
  if (userData.favorites.length === 0) {
    noFavorites.style.display = "block"
    favoritesGrid.style.display = "none"
    return
  }

  noFavorites.style.display = "none"
  favoritesGrid.style.display = "grid"

  favoritesGrid.innerHTML = ""

  userData.favorites.forEach((fav) => {
    const favElement = createFavoriteElement(fav)
    favoritesGrid.appendChild(favElement)
  })
}

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

function loadAchievements() {
  const completedCount = achievements.filter((a) => a.unlocked).length
  const totalCount = achievements.length
  const percentage = Math.round((completedCount / totalCount) * 100)

  document.getElementById("achievementsCompleted").textContent = completedCount
  document.getElementById("achievementsTotal").textContent = totalCount
  document.getElementById("achievementsPercentage").textContent = `${percentage}%`

  achievementsGrid.innerHTML = ""

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


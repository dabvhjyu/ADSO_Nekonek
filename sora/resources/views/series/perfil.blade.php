@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
<!-- Contenido principal - Reemplaza solo el contenido dentro del body, manteniendo header y footer -->
<!-- Contenido de la página de perfil - Completamente aislado -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Grupo - Biblioteca de Series</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
     <!-- Header (simulado para referencia) -->
     <div class="profile-container">
         <!-- Banner y foto de perfil -->
         <div class="profile-banner">
             <img src="/placeholder.svg?height=250&width=1200" alt="Banner de perfil" class="banner-img" id="bannerImg">
             <button class="edit-button" id="editButton">Editar Perfil</button>
             <div class="profile-picture-container">
                 <img src="/placeholder.svg?height=112&width=112" alt="Foto de perfil" class="profile-picture"
                     id="profileImg">
             </div>
         </div>
 
         <!-- Información del usuario -->
         <div class="user-info">
             <h1 class="username" id="username">Usuario</h1>
             <p class="user-bio" id="userBio">Biografía del usuario</p>
 
             <div class="user-stats">
                 <div class="stat">
                     <span class="stat-number" id="publicationsCount">0</span>
                     <span>publicaciones</span>
                 </div>
                 <div class="stat">
                     <span class="stat-number" id="followingCount">0</span>
                     <span>seguidos</span>
                 </div>
                 <div class="stat">
                     <span class="stat-number" id="followersCount">0</span>
                     <span>seguidores</span>
                 </div>
                 <div class="stat">
                     <span class="stat-number" id="likesCount">0</span>
                     <span>Me gusta</span>
                 </div>
             </div>
         </div>
 
         <!-- Contenido principal -->
         <div class="main-content">
             <!-- Columna izquierda -->
             <div class="left-content">
                 <div class="tabs">
                     <div class="tab active" data-tab="publications">Publicaciones</div>
                     <div class="tab" data-tab="comments">Comentarios</div>
                     <div class="tab" data-tab="favorites">Favoritos</div>
                 </div>
 
                 <!-- Contenido de las pestañas -->
                 <div id="publicationsTab" class="tab-content active">
                     <div class="no-content" id="noPublications">
                         <img src="/placeholder.svg?height=100&width=100" alt="No hay contenido">
                         <p>Aún no has publicado ningún contenido</p>
                     </div>
                     <div class="publications-grid" id="publicationsGrid">
                         <!-- Publicaciones de ejemplo -->
                         <div class="publication-item">
                             <img src="/placeholder.svg?height=200&width=150" alt="Publicación">
                             <div class="publication-info">
                                 <h3>Título de publicación</h3>
                                 <p>Breve descripción...</p>
                             </div>
                         </div>
                         <div class="publication-item">
                             <img src="/placeholder.svg?height=200&width=150" alt="Publicación">
                             <div class="publication-info">
                                 <h3>Título de publicación</h3>
                                 <p>Breve descripción...</p>
                             </div>
                         </div>
                     </div>
                 </div>
 
                 <div id="commentsTab" class="tab-content">
                     <div class="no-content" id="noComments">
                         <img src="/placeholder.svg?height=100&width=100" alt="No hay comentarios">
                         <p>Aún no has realizado ningún comentario</p>
                     </div>
                     <div class="comments-list" id="commentsList">
                         <!-- Comentarios de ejemplo -->
                         <div class="comment-item">
                             <div class="comment-header">
                                 <span class="comment-title">En: Título de publicación</span>
                                 <span class="comment-date">Hace 2 días</span>
                             </div>
                             <p class="comment-text">Este es un comentario de ejemplo que podría haber escrito el usuario en alguna publicación.</p>
                         </div>
                     </div>
                 </div>
 
                 <div id="favoritesTab" class="tab-content">
                     <div class="no-content" id="noFavorites">
                         <img src="/placeholder.svg?height=100&width=100" alt="No hay favoritos">
                         <p>Aún no has marcado ningún favorito</p>
                     </div>
                     <div class="favorites-grid" id="favoritesGrid">
                         <!-- Favoritos de ejemplo -->
                         <div class="favorite-item">
                             <img src="/placeholder.svg?height=200&width=150" alt="Favorito">
                             <div class="favorite-info">
                                 <h3>Título de favorito</h3>
                                 <p>Autor: Nombre Autor</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
 
             <!-- Columna derecha -->
             <div class="right-content">
                 
                 <!-- Centro de logros -->
                 <div class="sidebar-section">
                     <div class="achievement-center" id="achievementCenter">
                         <div class="achievement-header">
                             <div class="achievement-icon"><i class="fas fa-trophy"></i></div>
                             <span>Centro de logros</span>
                         </div>
                         <span class="arrow-icon"><i class="fas fa-chevron-right"></i></span>
                     </div>
                     <div class="achievement-preview" id="achievementPreview">
                         <div class="achievement-item">
                             <div class="achievement-badge unlocked">
                                 <i class="fas fa-book-reader"></i>
                             </div>
                             <div class="achievement-info">
                                 <span class="achievement-name">Lector Novato</span>
                                 <div class="achievement-progress">
                                     <div class="progress-bar" style="width: 100%"></div>
                                 </div>
                             </div>
                         </div>
                         <div class="achievement-item">
                             <div class="achievement-badge locked">
                                 <i class="fas fa-comment"></i>
                             </div>
                             <div class="achievement-info">
                                 <span class="achievement-name">Comentarista</span>
                                 <div class="achievement-progress">
                                     <div class="progress-bar" style="width: 30%"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
 
                 <!-- Información personal -->
                 <div class="sidebar-section">
                     <div class="section-title">
                         <span>Información personal</span>
                     </div>
                     <div class="personal-info-item">
                         <span class="info-icon"><i class="fas fa-id-card"></i></span>
                         <span id="nekonekId">Nekonek ID: 134660574</span>
                     </div>
                     <div class="personal-info-item">
                         <span class="info-icon"><i class="fas fa-calendar-alt"></i></span>
                         <span id="memberSince">Miembro desde: Marzo 2023</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 
     <!-- Modal para editar perfil -->
     <div class="modal" id="editModal">
         <div class="modal-content">
             <div class="modal-header">
                 <h2 class="modal-title">Editar perfil</h2>
                 <button class="close-button" id="closeModalBtn"><i class="fas fa-times"></i></button>
             </div>
 
             <div class="modal-tabs">
                 <div class="modal-tab active" data-tab="images">Imágenes</div>
                 <div class="modal-tab" data-tab="info">Información</div>
             </div>
 
             <div class="modal-body">
                 <!-- Pestaña de imágenes -->
                 <div class="modal-tab-content active" id="imagesTab">
                     <div class="image-options">
                         <div class="image-option active" data-option="profile">
                             <div>Foto de perfil</div>
                         </div>
                         <div class="image-option" data-option="banner">
                             <div>Imagen de fondo</div>
                         </div>
                     </div>
 
                     <div class="image-preview" id="profilePreview">
                         <img src="/placeholder.svg?height=100&width=100" alt="Vista previa de perfil"
                             class="preview-profile" id="previewProfileImg">
                     </div>
 
                     <div class="image-preview" id="bannerPreview" style="display: none;">
                         <img src="/placeholder.svg?height=150&width=400" alt="Vista previa de banner"
                             class="preview-banner" id="previewBannerImg">
                     </div>
 
                     <label class="upload-button" for="imageUpload">
                         <i class="fas fa-upload"></i> Seleccionar imagen
                     </label>
                     <input type="file" id="imageUpload" class="file-input" accept="image/*">
                 </div>
 
                 <!-- Pestaña de información -->
                 <div class="modal-tab-content" id="infoTab">
                     <div class="form-group">
                         <label for="usernameInput">Nombre de usuario</label>
                         <input type="text" id="usernameInput" class="form-input" placeholder="Tu nombre de usuario">
                     </div>
 
                     <div class="form-group">
                         <label for="bioInput">Biografía</label>
                         <textarea id="bioInput" class="form-input" placeholder="Cuéntanos sobre ti"></textarea>
                     </div>
                 </div>
             </div>
 
             <div class="modal-footer">
                 <button class="cancel-button" id="cancelButton">Cancelar</button>
                 <button class="save-button" id="saveButton">Guardar cambios</button>
             </div>
         </div>
     </div>
 
     <!-- Modal para logros -->
     <div class="modal" id="achievementsModal">
         <div class="modal-content modal-lg">
             <div class="modal-header">
                 <h2 class="modal-title">Centro de logros</h2>
                 <button class="close-button" id="closeAchievementsBtn"><i class="fas fa-times"></i></button>
             </div>
 
             <div class="modal-body">
                 <div class="achievements-stats">
                     <div class="achievement-stat">
                         <div class="stat-value" id="achievementsCompleted">2</div>
                         <div class="stat-label">Completados</div>
                     </div>
                     <div class="achievement-stat">
                         <div class="stat-value" id="achievementsTotal">10</div>
                         <div class="stat-label">Total</div>
                     </div>
                     <div class="achievement-stat">
                         <div class="stat-value" id="achievementsPercentage">20%</div>
                         <div class="stat-label">Completado</div>
                     </div>
                 </div>
 
                 <div class="achievements-grid" id="achievementsGrid">
                     <!-- Los logros se cargarán dinámicamente -->
                     <div class="achievement-grid-item unlocked">
                         <div class="achievement-badge-lg">
                             <i class="fas fa-book-reader"></i>
                         </div>
                         <div class="achievement-details">
                             <h3>Lector Novato</h3>
                             <p>Completaste tu primera lectura</p>
                             <div class="achievement-progress-lg">
                                 <div class="progress-bar" style="width: 100%"></div>
                                 <span>Completado</span>
                             </div>
                         </div>
                     </div>
                     <div class="achievement-grid-item locked">
                         <div class="achievement-badge-lg">
                             <i class="fas fa-comment"></i>
                         </div>
                         <div class="achievement-details">
                             <h3>Comentarista</h3>
                             <p>Realiza 10 comentarios en publicaciones</p>
                             <div class="achievement-progress-lg">
                                 <div class="progress-bar" style="width: 30%"></div>
                                 <span>3/10</span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 
    
 
     <script src="{{ asset('js/perfil.js') }}"></script> 
 
 
</body>
</html>
@endsection
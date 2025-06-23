// Script específico para el formulario de registro
document.addEventListener('DOMContentLoaded', function() {
    // Referencias a elementos
    const paso1 = document.getElementById('paso-1');
    const paso2 = document.getElementById('paso-2');
    const formTitle = document.getElementById('form-title');
    const errorContainer = document.getElementById('error-container');
    const exitoContainer = document.getElementById('exito-container');
    const formulario = document.getElementById('formulario-registro');
    
    // Botones
    const btnContinuar = document.getElementById('btn-continuar');
    const btnAtras = document.getElementById('btn-atras');
    const btnFinalizar = document.getElementById('btn-finalizar');
    const btnImagenFondo = document.getElementById('btn-imagen-fondo');
    const btnImagenPerfil = document.getElementById('btn-imagen-perfil');
    
    // Inputs
    const inputImagenFondo = document.getElementById('imagenFondo');
    const inputImagenPerfil = document.getElementById('imagenPerfil');
    const fondoSeleccionado = document.getElementById('fondo-seleccionado');
    const perfilSeleccionado = document.getElementById('perfil-seleccionado');
    
    // Datos del formulario
    const formData = {
      nombre: '',
      correo: '',
      telefono: '',
      confirmacionTelefono: '',
      apodo: '',
      imagenFondo: null,
      imagenPerfil: null
    };
    
    // Funciones
    function mostrarError(mensaje) {
      errorContainer.textContent = mensaje;
      errorContainer.style.display = 'block';
    }
    
    function ocultarError() {
      errorContainer.style.display = 'none';
    }
    
    function validarPrimerPaso() {
      // Obtener valores
      formData.nombre = document.getElementById('nombre').value;
      formData.correo = document.getElementById('correo').value;
      formData.telefono = document.getElementById('telefono').value;
      formData.confirmacionTelefono = document.getElementById('confirmacionTelefono').value;
      
      // Validar campos obligatorios
      if (!formData.nombre || !formData.correo || !formData.telefono || !formData.confirmacionTelefono) {
        mostrarError('Todos los campos son obligatorios');
        return false;
      }
      
      // Validar correo
      if (!formData.correo.includes('@')) {
        mostrarError('Correo electrónico inválido');
        return false;
      }
      
      // Validar teléfonos coincidentes
      if (formData.telefono !== formData.confirmacionTelefono) {
        mostrarError('Los números de teléfono no coinciden');
        return false;
      }
      
      ocultarError();
      return true;
    }
    
    function irAlPaso2() {
      if (validarPrimerPaso()) {
        paso1.style.display = 'none';
        paso2.style.display = 'block';
        formTitle.textContent = 'Personaliza tu Perfil';
      }
    }
    
    function volverAlPaso1() {
      paso2.style.display = 'none';
      paso1.style.display = 'block';
      formTitle.textContent = 'Información Personal';
    }
    
    function finalizarRegistro() {
      formData.apodo = document.getElementById('apodo').value;
      
      if (!formData.apodo) {
        mostrarError('El apodo es obligatorio');
        return;
      }
      
      ocultarError();
      formulario.style.display = 'none';
      exitoContainer.style.display = 'block';
      
      // Aquí podrías enviar los datos a tu backend
      console.log('Datos del formulario:', formData);
    }
    
    // Event Listeners
    btnContinuar.addEventListener('click', irAlPaso2);
    btnAtras.addEventListener('click', volverAlPaso1);
    btnFinalizar.addEventListener('click', finalizarRegistro);
    
    btnImagenFondo.addEventListener('click', function() {
      inputImagenFondo.click();
    });
    
    btnImagenPerfil.addEventListener('click', function() {
      inputImagenPerfil.click();
    });
    
    inputImagenFondo.addEventListener('change', function(e) {
      if (e.target.files && e.target.files[0]) {
        formData.imagenFondo = e.target.files[0];
        fondoSeleccionado.style.display = 'block';
      }
    });
    
    inputImagenPerfil.addEventListener('change', function(e) {
      if (e.target.files && e.target.files[0]) {
        formData.imagenPerfil = e.target.files[0];
        perfilSeleccionado.style.display = 'block';
      }
    });
  });
  
  document.addEventListener('DOMContentLoaded', function() {
    const paso1 = document.getElementById('paso-1');
    const paso2 = document.getElementById('paso-2');
    const errorContainer = document.getElementById('error-container');
    const exitoContainer = document.getElementById('exito-container');
    const formulario = document.getElementById('formulario-registro');
    
    const btnContinuar = document.getElementById('btn-continuar');
    const btnAtras = document.getElementById('btn-atras');
    const btnFinalizar = document.getElementById('btn-finalizar');
    
    const formData = {
        nombre: '',
        correo: '',
        telefono: '',
        confirmacionTelefono: '',
        apodo: '',
        imagenFondo: null,
        imagenPerfil: null
    };
    
    function mostrarError(mensaje) {
        errorContainer.textContent = mensaje;
        errorContainer.style.display = 'block';
    }
    
    function ocultarError() {
        errorContainer.style.display = 'none';
    }
    
    function validarPrimerPaso() {
        formData.nombre = document.getElementById('nombre').value;
        formData.correo = document.getElementById('correo').value;
        formData.telefono = document.getElementById('telefono').value;
        formData.confirmacionTelefono = document.getElementById('confirmacionTelefono').value;
        
        if (!formData.nombre || !formData.correo || !formData.telefono || !formData.confirmacionTelefono) {
            mostrarError('Todos los campos son obligatorios');
            return false;
        }
        
        if (!formData.correo.includes('@')) {
            mostrarError('Correo electrónico inválido');
            return false;
        }
        
        if (formData.telefono !== formData.confirmacionTelefono) {
            mostrarError('Los números de teléfono no coinciden');
            return false;
        }
        
        ocultarError();
        return true;
    }
    
    function irAlPaso2() {
        if (validarPrimerPaso()) {
            paso1.style.display = 'none';
            paso2.style.display = 'block';
        }
    }
    
    function volverAlPaso1() {
        paso2.style.display = 'none';
        paso1.style.display = 'block';
    }
    
    function finalizarRegistro() {
        formData.apodo = document.getElementById('apodo').value;
        
        if (!formData.apodo) {
            mostrarError('El apodo es obligatorio');
            return;
        }
        
        formData.imagenFondo = document.getElementById('imagenFondo').files[0];
        formData.imagenPerfil = document.getElementById('imagenPerfil').files[0];
        
        ocultarError();
        formulario.style.display = 'none';
        exitoContainer.style.display = 'block';
        
        console.log('Datos del formulario:', formData);
    }
    
    btnContinuar.addEventListener('click', irAlPaso2);
    btnAtras.addEventListener('click', volverAlPaso1);
    btnFinalizar.addEventListener('click', finalizarRegistro);
});
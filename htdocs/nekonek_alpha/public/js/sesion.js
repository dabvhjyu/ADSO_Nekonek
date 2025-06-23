function switchTab(tabId) {
    // Ocultar todos los contenidos de pestañas
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });
    
    // Desactivar todos los botones de pestañas
    document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Activar la pestaña seleccionada
    if (tabId === 'smsTab') {
        document.getElementById('smsTabBtn').classList.add('active');
        document.getElementById('smsTab').classList.add('active');
    } else if (tabId === 'passwordTab') {
        document.getElementById('passwordTabBtn').classList.add('active');
        document.getElementById('passwordTab').classList.add('active');
    } else if (tabId === 'resetPasswordTab') {
        document.getElementById('resetPasswordTab').classList.add('active');
    }
    
    // Limpiar campos y mensajes de error
    document.querySelectorAll('input').forEach(input => {
        if (input.type !== 'checkbox') {
            input.value = '';
        }
    });
    document.querySelectorAll('.error-message').forEach(msg => {
        msg.textContent = '';
    });
}

function validatePhoneNumber(phone) {
    return /^\d{10}$/.test(phone);
}

function sendCode() {
    const phone = document.getElementById('phone-sms').value;
    if (validatePhoneNumber(phone)) {
        alert('Código enviado');
        document.getElementById('smsCode').focus();
    } else {
        alert('Por favor, ingrese un número de teléfono válido de 10 dígitos');
    }
}

function validateForm(event) {
    event.preventDefault();
    
    if (!document.getElementById('terms').checked) {
        alert('Debe aceptar los términos y condiciones');
        return false;
    }
    
    const smsTabActive = document.getElementById('smsTab').classList.contains('active');
    
    if (smsTabActive) {
        const phone = document.getElementById('phone-sms').value;
        const smsCode = document.getElementById('smsCode').value;
        
        if (!validatePhoneNumber(phone)) {
            alert('Por favor, ingrese un número de teléfono válido de 10 dígitos');
            return false;
        }
        if (!smsCode) {
            alert('Por favor, ingrese el código SMS');
            return false;
        }
        
        // Simulación de verificación de SMS
        alert('Inicio de sesión por SMS exitoso');
        window.location.href = 'perfil.html';
    } else {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        
        if (!username) {
            alert('Por favor, ingrese su nombre de usuario');
            return false;
        }
        if (!password) {
            alert('Por favor, ingrese su contraseña');
            return false;
        }

        // Validar credenciales (simulación)
        if (username === 'usuario1' && password === '123456') {
            alert('Inicio de sesión exitoso');
            window.location.href = 'perfil.html';
        } else {
            const errorMessage = document.getElementById('passwordErrorMessage');
            errorMessage.textContent = 'Usuario o contraseña incorrectos';
        }
    }
    
    return false;
}

function showResetPasswordTab() {
    switchTab('resetPasswordTab');
}

function resetPassword() {
    const phone = document.getElementById('reset-phone').value;
    const smsCode = document.getElementById('resetSmsCode').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (!validatePhoneNumber(phone)) {
        alert('Por favor, ingrese un número de teléfono válido de 10 dígitos');
        return;
    }

    if (!smsCode || !newPassword || !confirmPassword) {
        alert('Por favor, complete todos los campos');
        return;
    }

    if (newPassword !== confirmPassword) {
        alert('Las contraseñas no coinciden');
        return;
    }

    alert('Cambio de contraseña exitoso');
    switchTab('passwordTab');
}

function sendResetCode() {
    const phone = document.getElementById('reset-phone').value;
    if (validatePhoneNumber(phone)) {
        alert('Código de restablecimiento enviado');
        document.getElementById('resetSmsCode').focus();
    } else {
        alert('Por favor, ingrese un número de teléfono válido de 10 dígitos');
    }
}

// Configurar event listeners cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    // Event listeners para los botones de pestañas
    document.getElementById('smsTabBtn').addEventListener('click', function() {
        switchTab('smsTab');
    });
    
    document.getElementById('passwordTabBtn').addEventListener('click', function() {
        switchTab('passwordTab');
    });
    
    // Event listener para el enlace de olvidé contraseña
    document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
        e.preventDefault();
        showResetPasswordTab();
    });
    
    // Inicializar la primera pestaña como activa
    switchTab('smsTab');
});
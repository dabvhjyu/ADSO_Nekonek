document.addEventListener("DOMContentLoaded", () => {
    const formulario = document.getElementById("formulario-contacto")
  
    formulario.addEventListener("submit", (e) => {
      e.preventDefault()
  
      const nombre = document.getElementById("nombre").value
      const email = document.getElementById("email").value
      const mensaje = document.getElementById("mensaje").value
  
      // Aquí puedes agregar la lógica para enviar el formulario
      console.log("Formulario enviado:", { nombre, email, mensaje })
  
      // Mostrar mensaje de éxito
      alert("¡Mensaje enviado con éxito!")
  
      // Limpiar el formulario
      formulario.reset()
    })
  })
  
  
  
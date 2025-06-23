document.addEventListener("DOMContentLoaded", () => {
    const series = [
      { id: 1, titulo: "Contigo otra vez", imagen: "img/o3.png", generos: ["Romance", "Drama"], estado: "Terminado" },
      {
        id: 2,
        titulo: "Cómo se ve el amor",
        imagen: "img/o8.png",
        generos: ["Romance", "Comedia"],
        estado: "En emisión",
      },
      { id: 3, titulo: "Aventuras en la ciudad", imagen: "img/o5.png", generos: ["Acción", "Aventura"], estado: "Nuevo" },
      {
        id: 4,
        titulo: "Misterios del pasado",
        imagen: "img/o7.png",
        generos: ["Misterio", "Drama"],
        estado: "Terminado",
      },
      { id: 5, titulo: "Risas en familia", imagen: "img/o2.png", generos: ["Comedia", "Familiar"], estado: "En emisión" },
      {
        id: 6,
        titulo: "Viaje al futuro",
        imagen: "img/o4.png",
        generos: ["Ciencia Ficción", "Aventura"],
        estado: "Nuevo",
      },
    ]
  
    const itemsPorPagina = 24
    const paginaActual = 1
    const filtrosGenero = new Set()
    let filtroEstado = null
  
    const seriesGrid = document.getElementById("series-grid")
    const filtrosSeleccionados = document.querySelector(".filtros-seleccionados")
    const filtroGenero = document.getElementById("filtro-genero")
    const filtroEstadoContainer = document.getElementById("filtro-estado")
  
    function renderizarSeries(seriesFiltradas) {
      seriesGrid.innerHTML = ""
  
      if (seriesFiltradas.length === 0) {
        const noResults = document.createElement("div")
        noResults.className = "no-results"
        noResults.innerHTML = "<p>No se encontraron series que coincidan con los filtros seleccionados.</p>"
        seriesGrid.appendChild(noResults)
        return
      }
  
      seriesFiltradas.forEach((serie) => {
        const serieCard = document.createElement("div")
        serieCard.className = "serie-card"
        serieCard.innerHTML = `
                  <img src="${serie.imagen}" alt="${serie.titulo}" class="serie-imagen">
                  <div class="serie-info">
                      <h3 class="serie-titulo">${serie.titulo}</h3>
                      <div class="serie-generos">
                          ${serie.generos.map((genero) => `<span class="serie-genero">${genero}</span>`).join("")}
                      </div>
                  </div>
              `
        seriesGrid.appendChild(serieCard)
      })
    }
  
    function aplicarFiltros() {
      const seriesFiltradas = series.filter((serie) => {
        const cumpleEstado = filtroEstado === null || serie.estado === filtroEstado
        const cumpleGeneros =
          filtrosGenero.size === 0 || [...filtrosGenero].every((genero) => serie.generos.includes(genero))
  
        return cumpleEstado && cumpleGeneros
      })
  
      renderizarSeries(seriesFiltradas)
    }
  
    // Modificar la función actualizarFiltrosSeleccionados
    function actualizarFiltrosSeleccionados() {
      filtrosSeleccionados.innerHTML = ""
  
      // Si no hay filtros activos, simplemente retornar
      // Esto mantendrá el contenedor vacío y se ocultará por CSS
      if (filtrosGenero.size === 0 && filtroEstado === null) {
        return
      }
  
      // Solo agregar el contenido si hay filtros activos
      const filtrosLabel = document.createElement("div")
      filtrosLabel.className = "filtros-label"
      filtrosLabel.textContent = "Filtros activos:"
      filtrosSeleccionados.appendChild(filtrosLabel)
  
      filtrosGenero.forEach((genero) => {
        const tag = document.createElement("div")
        tag.className = "filtro-tag"
        tag.innerHTML = `
                  ${genero}
                  <button class="remove-tag" data-tipo="genero" data-filtro="${genero}">×</button>
              `
        filtrosSeleccionados.appendChild(tag)
      })
  
      if (filtroEstado !== null) {
        const tag = document.createElement("div")
        tag.className = "filtro-tag"
        tag.innerHTML = `
                  ${filtroEstado}
                  <button class="remove-tag" data-tipo="estado" data-filtro="${filtroEstado}">×</button>
              `
        filtrosSeleccionados.appendChild(tag)
      }
  
      filtrosSeleccionados.addEventListener("click", (e) => {
        if (e.target.classList.contains("remove-tag")) {
          const tipo = e.target.getAttribute("data-tipo")
          const filtro = e.target.getAttribute("data-filtro")
  
          if (tipo === "genero") {
            filtrosGenero.delete(filtro)
            document.querySelectorAll("#filtro-genero .filtro-btn").forEach((btn) => {
              if (btn.textContent.trim() === filtro) {
                btn.classList.remove("active")
              }
            })
          } else if (tipo === "estado") {
            filtroEstado = null
            document.querySelectorAll("#filtro-estado .filtro-btn").forEach((btn) => {
              if (btn.textContent.trim() === filtro) {
                btn.classList.remove("active")
              }
            })
          }
  
          aplicarFiltros()
          actualizarFiltrosSeleccionados()
        }
      })
    }
  
    function inicializarFiltrosDeGenero() {
      filtroGenero.innerHTML = ""
      const todosLosGeneros = [...new Set(series.flatMap((serie) => serie.generos))]
      todosLosGeneros.forEach((genero) => {
        const btn = document.createElement("button")
        btn.className = "filtro-btn"
        btn.textContent = genero
        btn.addEventListener("click", () => {
          if (filtrosGenero.has(genero)) {
            filtrosGenero.delete(genero)
            btn.classList.remove("active")
          } else {
            if (filtrosGenero.size < 3) {
              filtrosGenero.add(genero)
              btn.classList.add("active")
            } else {
              alert("Solo puedes seleccionar hasta 3 géneros.")
            }
          }
          actualizarFiltrosSeleccionados()
          aplicarFiltros()
        })
        filtroGenero.appendChild(btn)
      })
    }
  
    function inicializarFiltrosDeEstado() {
      filtroEstadoContainer.innerHTML = ""
      const estados = ["Terminado", "En emisión", "Nuevo"]
      estados.forEach((estado) => {
        const btn = document.createElement("button")
        btn.className = "filtro-btn"
        btn.textContent = estado
        btn.addEventListener("click", () => {
          if (filtroEstado === estado) {
            filtroEstado = null
            btn.classList.remove("active")
          } else {
            filtroEstado = estado
            document.querySelectorAll("#filtro-estado .filtro-btn").forEach((b) => b.classList.remove("active"))
            btn.classList.add("active")
          }
          actualizarFiltrosSeleccionados()
          aplicarFiltros()
        })
        filtroEstadoContainer.appendChild(btn)
      })
    }
  
    inicializarFiltrosDeGenero()
    inicializarFiltrosDeEstado()
    aplicarFiltros()
  })
  
  
document.addEventListener("DOMContentLoaded", () => {
    // Elementos del DOM
    const seriesGrid = document.getElementById("series-grid");
    const filtrosSeleccionados = document.getElementById("filtros-seleccionados");
    const generoSelect = document.getElementById("genero");
    const estadoSelect = document.getElementById("estado");
    const ordenSelect = document.getElementById("orden");
    const searchInput = document.querySelector('input[placeholder="Buscar series..."]');
    
    // Datos de ejemplo (serán reemplazados por datos de Laravel)
    const series = [
        { id: 1, titulo: "Contigo otra vez", imagen: "/placeholder.svg?height=300&width=200", generos: ["Romance", "Drama"], estado: "Terminado" },
        { id: 2, titulo: "Cómo se ve el amor", imagen: "/placeholder.svg?height=300&width=200", generos: ["Romance", "Comedia"], estado: "En emisión" },
        { id: 3, titulo: "Aventuras en la ciudad", imagen: "/placeholder.svg?height=300&width=200", generos: ["Acción", "Aventura"], estado: "Nuevo" },
        { id: 4, titulo: "Misterios del pasado", imagen: "/placeholder.svg?height=300&width=200", generos: ["Misterio", "Drama"], estado: "Terminado" },
        { id: 5, titulo: "Risas en familia", imagen: "/placeholder.svg?height=300&width=200", generos: ["Comedia", "Familiar"], estado: "En emisión" },
        { id: 6, titulo: "Viaje al futuro", imagen: "/placeholder.svg?height=300&width=200", generos: ["Ciencia Ficción", "Aventura"], estado: "Nuevo" }
    ];
    
    // Estado de los filtros
    let filtros = {
        genero: "",
        estado: "",
        busqueda: "",
        orden: "alfabetico"
    };
    
    // Función para obtener la clase del badge según el estado
    function getBadgeClass(estado) {
        switch (estado) {
            case "Terminado": return "bg-secondary";
            case "En emisión": return "bg-success";
            case "Nuevo": return "bg-primary";
            default: return "bg-secondary";
        }
    }
    
    // Función para renderizar las series
    function renderizarSeries() {
        // Aplicar filtros
        let seriesFiltradas = series.filter(serie => {
            // Filtro de búsqueda
            if (filtros.busqueda && !serie.titulo.toLowerCase().includes(filtros.busqueda.toLowerCase())) {
                return false;
            }
            
            // Filtro de género
            if (filtros.genero && !serie.generos.includes(filtros.genero)) {
                return false;
            }
            
            // Filtro de estado
            if (filtros.estado && serie.estado !== filtros.estado) {
                return false;
            }
            
            return true;
        });
        
        // Aplicar ordenamiento
        seriesFiltradas.sort((a, b) => {
            if (filtros.orden === "alfabetico") {
                return a.titulo.localeCompare(b.titulo);
            } else if (filtros.orden === "reciente") {
                // En un caso real, esto ordenaría por fecha
                return b.id - a.id;
            } else if (filtros.orden === "popular") {
                // En un caso real, esto ordenaría por popularidad
                return Math.random() - 0.5; // Simulación
            }
        });
        
        // Limpiar el grid
        seriesGrid.innerHTML = "";
        
        // Mostrar mensaje si no hay resultados
        if (seriesFiltradas.length === 0) {
            const noResults = document.createElement("div");
            noResults.className = "col-12 no-results";
            noResults.innerHTML = "<p class='fs-4'>No se encontraron series que coincidan con los filtros seleccionados.</p>";
            seriesGrid.appendChild(noResults);
            return;
        }
        
        // Renderizar las series filtradas
        seriesFiltradas.forEach(serie => {
            const serieCard = document.createElement("div");
            serieCard.className = "col";
            serieCard.innerHTML = `
                <div class="card h-100 serie-card">
                    <div class="position-relative">
                        <img src="${serie.imagen}" class="card-img-top" alt="${serie.titulo}">
                        <div class="serie-overlay"></div>
                        <span class="badge ${getBadgeClass(serie.estado)} position-absolute top-0 end-0 m-2">${serie.estado}</span>
                    </div>
                    <div class="card-body bg-dark-purple">
                        <h5 class="card-title text-light">${serie.titulo}</h5>
                        <div class="d-flex flex-wrap gap-1 mt-2">
                            ${serie.generos.map(genero => <span class="badge bg-accent-purple">${genero}</span>).join('')}
                        </div>
                    </div>
                </div>
            `;
            seriesGrid.appendChild(serieCard);
        });
    }
    
    // Función para actualizar los filtros seleccionados
    function actualizarFiltrosSeleccionados() {
        filtrosSeleccionados.innerHTML = "";
        
        // Si no hay filtros activos, no mostrar nada
        if (!filtros.genero && !filtros.estado && !filtros.busqueda) {
            return;
        }
        
        // Mostrar filtro de género
        if (filtros.genero) {
            const tag = document.createElement("div");
            tag.className = "filtro-tag";
            tag.innerHTML = `
                Género: ${filtros.genero}
                <button type="button" class="btn-close btn-close-white ms-2" aria-label="Quitar filtro" data-tipo="genero"></button>
            `;
            filtrosSeleccionados.appendChild(tag);
        }
        
        // Mostrar filtro de estado
        if (filtros.estado) {
            const tag = document.createElement("div");
            tag.className = "filtro-tag";
            tag.innerHTML = `
                Estado: ${filtros.estado}
                <button type="button" class="btn-close btn-close-white ms-2" aria-label="Quitar filtro" data-tipo="estado"></button>
            `;
            filtrosSeleccionados.appendChild(tag);
        }
        
        // Mostrar filtro de búsqueda
        if (filtros.busqueda) {
            const tag = document.createElement("div");
            tag.className = "filtro-tag";
            tag.innerHTML = `
                Búsqueda: "${filtros.busqueda}"
                <button type="button" class="btn-close btn-close-white ms-2" aria-label="Quitar filtro" data-tipo="busqueda"></button>
            `;
            filtrosSeleccionados.appendChild(tag);
        }
    }
    
    // Event listeners
    
    // Filtro de género
    generoSelect.addEventListener("change", () => {
        filtros.genero = generoSelect.options[generoSelect.selectedIndex].text;
        if (filtros.genero === "Todos los géneros") {
            filtros.genero = "";
        }
        actualizarFiltrosSeleccionados();
        renderizarSeries();
    });
    
    // Filtro de estado
    estadoSelect.addEventListener("change", () => {
        filtros.estado = estadoSelect.options[estadoSelect.selectedIndex].text;
        if (filtros.estado === "Todos los estados") {
            filtros.estado = "";
        }
        actualizarFiltrosSeleccionados();
        renderizarSeries();
    });
    
    // Ordenamiento
    ordenSelect.addEventListener("change", () => {
        filtros.orden = ordenSelect.value;
        renderizarSeries();
    });
    
    // Búsqueda
    const searchButton = document.querySelector('.btn-accent-purple');
    searchButton.addEventListener("click", () => {
        filtros.busqueda = searchInput.value.trim();
        actualizarFiltrosSeleccionados();
        renderizarSeries();
    });
    
    // También permitir búsqueda al presionar Enter
    searchInput.addEventListener("keypress", (e) => {
        if (e.key === "Enter") {
            filtros.busqueda = searchInput.value.trim();
            actualizarFiltrosSeleccionados();
            renderizarSeries();
        }
    });
    
    // Quitar filtros
    filtrosSeleccionados.addEventListener("click", (e) => {
        if (e.target.classList.contains("btn-close")) {
            const tipo = e.target.getAttribute("data-tipo");
            
            if (tipo === "genero") {
                filtros.genero = "";
                generoSelect.value = "";
            } else if (tipo === "estado") {
                filtros.estado = "";
                estadoSelect.value = "";
            } else if (tipo === "busqueda") {
                filtros.busqueda = "";
                searchInput.value = "";
            }
            
            actualizarFiltrosSeleccionados();
            renderizarSeries();
        }
    });
    
    // Inicializar la página
    renderizarSeries();
  });
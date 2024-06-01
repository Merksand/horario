const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");

let opcionesBarraLateral = document.querySelectorAll(".inbox");

opcionesBarraLateral.forEach((opcion) => {
    opcion.addEventListener("click", () => {
        // Eliminar la clase "clicked" de todos los botones
        opcionesBarraLateral.forEach((btn) => {
            if (btn !== opcion) {
                btn.classList.remove("clicked");
            }
        });

        opcion.classList.toggle("clicked"); // Alternar la clase "clicked" del botón actual
    });
});
menu.addEventListener("click", () => {
    barraLateral.classList.toggle("max-barra-lateral");
    if (barraLateral.classList.contains("max-barra-lateral")) {
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    } else {
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
    }
    if (window.innerWidth <= 320) {
        barraLateral.classList.add("mini-barra-lateral");
        main.classList.add("min-main");
        spans.forEach((span) => {
            span.classList.add("oculto");
        });
    }
});

palanca.addEventListener("click", () => {
    const spanOscuro = document.querySelectorAll(".spanDatos");

    let body = document.body;
    body.classList.toggle("dark-mode");
    circulo.classList.toggle("prendido");
    spanOscuro.forEach((e) => {
        console.log(e);
        e.classList.toggle("spanOscuro");
    });
});

cloud.addEventListener("click", () => {
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    spans.forEach((span) => {
        span.classList.toggle("oculto");
    });
});


function cargarContenido(pagina) {
    fetch(pagina)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("contenido").innerHTML = data;
            agregarEventos();
            cargarTotales();
        })
        .catch((error) => {
            console.error("Error generado:", error);
        });
}
function agregarEventos() {
    const boton = document.getElementById("btn-filtrar");
    if (boton) {
        boton.addEventListener("click", (e) => {
            e.preventDefault();
            let nombreDocente = document.getElementById("nombre").value;
            let apellidoDocente = document.getElementById("apellido").value;
            let tabla = document.getElementById("tabla-profesores");
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        tabla.innerHTML = xhr.responseText;
                    } else {
                        console.error("Error en la petición AJAX: " + xhr.status);
                    }
                }
            };
            const url = "includes/docentes.php?nombre=" + encodeURIComponent(nombreDocente) + "&apellido=" + encodeURIComponent(apellidoDocente);
            xhr.open("GET", url, true);
            xhr.send();
        });
    }

    const botonFiltrarCarrera = document.getElementById("filtrar-nivel-carrera");
    if (botonFiltrarCarrera) {
        botonFiltrarCarrera.addEventListener("click", () => {
            const carreraSeleccionada = document.querySelector(".filtrarCarrera").value;
            const nivelSeleccionado = document.getElementById("filtrar-nivel").value;
            let tabla = document.getElementById("tabla-profesores");
            if (carreraSeleccionada !== "") {
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            tabla.innerHTML = xhr.responseText;
                        } else {
                            console.error("Error en la petición AJAX: " + xhr.status);
                        }
                    }
                };
                xhr.open("GET", "includes/carreras.php?carrera=" + carreraSeleccionada + "&nivel=" + nivelSeleccionado, true);
                xhr.send();
            }
        });
    }



    const botonFiltrarAula = document.querySelector(".filtrarAula");
    if (botonFiltrarAula) {
        botonFiltrarAula.addEventListener("change", () => {
            const aulaSeleccionada = document.querySelector(".filtrarAula").value;
            let tabla = document.getElementById("tabla-profesores");
            if (aulaSeleccionada !== "") {
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            tabla.innerHTML = xhr.responseText;
                        } else {
                            console.error("Error en la petición AJAX: " + xhr.status);
                        }
                    }
                };

                xhr.open("GET", "includes/aulas.php?aula=" + aulaSeleccionada, true);
                xhr.send();
            }
        });
    }



    const fechaInput = document.getElementById('fecha');
    if (fechaInput) {
        const hoy = new Date();
        const año = hoy.getFullYear();
        const mes = ('0' + (hoy.getMonth() + 1)).slice(-2);
        const dia = ('0' + hoy.getDate()).slice(-2);
        fechaInput.value = `${año}-${mes}-${dia}`;
    }

    const botonFiltrarHorario = document.getElementById("filtrar-horario");
    if (botonFiltrarHorario) {
        botonFiltrarHorario.addEventListener("click", () => {
            const carreraSeleccionada = document.getElementById("filtrar-carrera").value;
            const nivelSeleccionado = document.getElementById("filtrar-nivel").value;
            const fechaSeleccionada = document.getElementById("fecha").value;
            let tabla = document.getElementById("tabla-profesores");
            if (carreraSeleccionada !== "") {
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            tabla.innerHTML = xhr.responseText;
                        } else {
                            console.error("Error en la petición AJAX: " + xhr.status);
                        }
                    }
                };
                const url = "includes/horarios.php?carrera=" + carreraSeleccionada + "&fecha=" + fechaSeleccionada + "&nivel=" + nivelSeleccionado;
                xhr.open("GET", url, true);
                xhr.send();
            }
        });
    }



    const botonFiltrarMateria = document.getElementById("btn-materia");
    if (botonFiltrarMateria) {
        botonFiltrarMateria.addEventListener("click", (e) => {
            e.preventDefault();
            let nombreMateria = document.getElementById("materia").value;
            let tabla = document.getElementById("tabla-profesores");
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        tabla.innerHTML = xhr.responseText;
                    } else {
                        console.error("Error en la petición AJAX: " + xhr.status);
                    }
                }
            };
            const url = "includes/materias.php?materia=" + encodeURIComponent(nombreMateria);
            xhr.open("GET", url, true);
            xhr.send();
        });
    }


    const buscarDocente = document.getElementById("buscarDocente");
    if (buscarDocente) {
        buscarDocente.addEventListener("click", (e) => {
            e.preventDefault();
            const nombre = document.getElementById('buscarNombre').value;
            const apellido = document.getElementById('buscarApellido').value;

            const params = new URLSearchParams({ nombre, apellido });

            fetch(`includes/CRUD/buscarDocente.php?${params.toString()}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    const tablaDocentes = document.querySelector('#tabla-docentes tbody');
                    tablaDocentes.innerHTML = '';
                    data.forEach(docente => {
                        tablaDocentes.innerHTML += `
                            <tr>
                                <td>${docente.dia}</td>
                                <td>${docente.horaInicio} - ${docente.horaFin}</td>
                                <td>${docente.nombre} ${docente.apellido}</td>
                                <td>${docente.materia}</td>
                                <td>${docente.nombreCarrera}</td>
                                <td>${docente.nivel}</td>
                                <td>${docente.aula}</td>
                                <td>
                                    <button class="editar" onclick="editarDocente(${docente.id})">✏️</button>
                                    <button class="eliminar" onclick="eliminarDocente(${docente.id}")>🗑️</button>
                                </td>
                            </tr>
                        `;
                    });
                })
                .catch(error => console.error('Error al buscar docentes:', error));
        });
    }


    

    const tablaDocentes = document.querySelector('#tabla-docentes tbody');
    if(tablaDocentes){
        tablaDocentes.addEventListener("click", (e) => {
            if(e.target.classList.contains("editar")){
                function editarDocente(e){
                    console.log(e);
                }

                editarDocente();
            }
            // if(e.target.classList.contains("eliminar")){
            //     eliminarDocente();
            // }
        });
    }
    
    // function editarDocente(){
    //     console.log(11111);
    // }
    


    let docenteForm = document.getElementById("docenteForm");
    if(docenteForm) {
    docenteForm.addEventListener("submit", function(e) {
        e.preventDefault(); 
        const formData = new FormData(docenteForm);

        for (let [key, value] of formData.entries()) {
            console.log(key + ': ' + value);
        }

        fetch("includes/CRUD/agregarDocente.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Docente agregado con éxito");
                docenteForm.reset(); 
            } else {
                alert("Error al agregar docente: " + data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    });
    }


}




function cargarTotales() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            const docentesCount = document.getElementById("docentes-count");
            const materiasCount = document.getElementById("materias-count");
            const carrerasCount = document.getElementById("carreras-count");
            const aulasCount = document.getElementById("aulas-count");
            const horariosCount = document.getElementById("horarios-count");

            if (docentesCount) {
                docentesCount.innerText = data.total_docentes;
            }
            if (materiasCount) {
                materiasCount.innerText = data.total_materias;
            }
            if (carrerasCount) {
                carrerasCount.innerText = data.total_carreras;
            }
            if (aulasCount) {
                aulasCount.innerText = data.total_aulas;
            }
            if (horariosCount) {
                horariosCount.innerText = data.total_horarios;
            }
        }
    };
    xhr.open("GET", "includes/totales.php", true);
    xhr.send();
}





// function setDefaultDate() {
//   const fechaInput = document.getElementById("fecha");
//   if (fechaInput) {
//     fechaInput.value = getCurrentDate();
//   }
// }

// function getCurrentDate() {
//   const today = new Date();
//   const year = today.getFullYear();
//   const month = String(today.getMonth() + 1).padStart(2, "0");
//   const day = String(today.getDate()).padStart(2, "0");
//   return `${year}-${month}-${day}`;
// }
// document.addEventListener("DOMContentLoaded", setDefaultDate);

// * El js demas
//////////////////////

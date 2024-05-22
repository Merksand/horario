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
// FILTROS

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

// function agregarEventos() {
//   const boton = document.getElementById("btn-filtrar");
//   if (boton) {
//     boton.addEventListener("click", () => {
//       let nombreDocente = document.getElementById("nombre").value;
//       let apellidoDocente = document.getElementById("apellido").value;
//       let tabla = document.getElementById("tabla-profesores");

//     });
//   }
// }

function agregarEventos() {
    const boton = document.getElementById("btn-filtrar");
    if (boton) {
        boton.addEventListener("click", (e) => {
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
            const url = "includes/filtros.php?nombre=" + encodeURIComponent(nombreDocente) + "&apellido=" + encodeURIComponent(apellidoDocente);
            xhr.open("GET", url, true);
            xhr.send();
        });
    }
    const botonFiltrarCarrera = document.querySelector(".filtrarCarrera");
    if (botonFiltrarCarrera) {
        botonFiltrarCarrera.addEventListener("change", () => {
            const carreraSeleccionada = document.querySelector(".filtrarCarrera").value;
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

                xhr.open("GET", "includes/carreras.php?carrera=" + carreraSeleccionada, true);
                xhr.send();
            }
        });
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
                            // Procesar la respuesta y mostrar los resultados
                            console.log(nivelSeleccionado);
                            tabla.innerHTML = xhr.responseText;
                        } else {
                            console.error("Error en la petición AJAX: " + xhr.status);
                        }
                    }
                };
                const url = "includes/horarios.php?carrera=" + carreraSeleccionada + "&fecha=" + fechaSeleccionada+"&nivel=" +nivelSeleccionado;
                xhr.open("GET", url, true);
                xhr.send();
            }
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


    // const filo = document.querySelector(".filo");
    // filo.addEventListener("click", () => {
    //     let tabla = document.getElementById("tabla-profesores");
    //     var xhr = new XMLHttpRequest();

    //     // Configurar la solicitud POST hacia el archivo PHP
    //     xhr.open('POST', 'includes/carreras.php', true);
    //     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    //     // Definir la función de devolución de llamada para manejar la respuesta del servidor
    //     xhr.onload = function () {
    //         if (xhr.status >= 200 && xhr.status < 300) {
    //             // Imprimir la respuesta del servidor en la consola (para propósitos de demostración)
    //             // tabla.innerHTML =xhr.responseText;
    //             console.log(xhr.responseText);;
    //         } else {
    //             console.error('Error al realizar la solicitud: ' + xhr.status);
    //         }
    //     };

    //     // Enviar la solicitud al servidor, incluyendo la variable spanPresionado
    //     xhr.send('spanPresionado=true');
    // });










// function home() {
    
// }





// function agregarEventos() {
//   const boton = document.getElementById("btn-filtrar");
//   if (boton) {
//       boton.addEventListener("click", (e) => {
//         e.preventDefault();
//         fetch('pages/assets/js/fil.php')
//        .then((response) => response.text())
//        .then((data) => {
//             document.getElementById('tabla-profesores').innerHTML = data;
//         })
//         console.log(3223);
//       });
//   }
// }

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

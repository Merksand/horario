const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");

let opcionesBarraLateral = document.querySelectorAll(".inbox");

document.addEventListener("DOMContentLoaded", () => {
    let body = document.body;
    let circulo = document.querySelector(".circulo");
    const currentMode = localStorage.getItem("modo") || "light";
    if (currentMode === "dark") {
        body.classList.add("dark-mode")
        circulo.classList.add("prendido");
    } else {
        body.classList.remove("dark-mode");
    }

    let pagina = localStorage.getItem("pagina") ?? 'pages/home.php';
    cargarContenido(pagina);
    body.classList.add(currentMode);

    let barraLateral = document.querySelector(".barra-lateral");
    let miniBarra = localStorage.getItem("miniBarra") === "true";
    console.log(typeof miniBarra);
    if (miniBarra) {
        barraLateral.classList.add("mini-barra-lateral");
    }


    let main = document.querySelector(".menuContent");
    let minMain = localStorage.getItem("minMain") === "true"
    console.log(minMain);
    if (minMain) {
        main.classList.add("min-main");
    }
    let datoOculto = localStorage.getItem("oculto") === "true"
    console.log(datoOculto)


    if (datoOculto) {
        spans.forEach((span) => {
            span.classList.add("oculto");
        });
    }


    let opcionClick = localStorage.getItem("opcionClick") ?? opcionesBarraLateral[0].classList.add("clicked");;
    opcionesBarraLateral.forEach((btn) => {
        if (btn.children[1].textContent === opcionClick) {
            btn.classList.add("clicked");
        }

    });
});

opcionesBarraLateral.forEach((opcion) => {
    opcion.addEventListener("click", () => {
        // Eliminar la clase "clicked" de todos los botones
        opcionesBarraLateral.forEach((btn) => {
            if (btn !== opcion) {
                btn.classList.remove("clicked");
            } else {
                console.log(btn.children[1].textContent);
                localStorage.setItem("opcionClick", btn.children[1].textContent);
            }
        });

        opcion.classList.toggle("clicked"); // Alternar la clase "clicked" del botón actual
    });
});
menu.addEventListener("click", () => {
    console.log("MENU");
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
    const currentMode = localStorage.getItem("modo") || "light";
    const newMode = currentMode === "light" ? "dark" : "light";
    localStorage.setItem("modo", newMode);

    let body = document.body;

    body.classList.toggle("dark-mode");
    circulo.classList.toggle("prendido");
});

cloud.addEventListener("click", () => {
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    localStorage.setItem("miniBarra", barraLateral.classList.contains("mini-barra-lateral"));
    localStorage.setItem("minMain", main.classList.contains("min-main"));
    spans.forEach((span) => {
        span.classList.toggle("oculto");
        localStorage.setItem("oculto", span.classList.contains("oculto"));
    });
});


function cargarContenido(pagina) {
    fetch(pagina)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("contenido").innerHTML = data;
            agregarEventos();
            cargarTotales();
            localStorage.setItem("pagina", pagina);
        })
        .catch((error) => {
            console.error("Error generado:", error);
        });
}

function agregarEventos() {

    const grupoHome = document.querySelector(".stats-container")
    if (grupoHome) {
        grupoHome.addEventListener("click", (e) => {
            e.stopPropagation()
            let padre = e.target.classList[1];
            let padreHijo = e.target.parentElement.classList[1];
            let hijo = e.target.parentElement.parentElement.classList[1];
            let valorPadre = padre || padreHijo || hijo;
            let lista = document.getElementById("listaAulas");
            if (valorPadre) {
                // console.log(valorPadre);
                fetch(`includes/home.php?valorPadre=${valorPadre}`)
                    .then(response => {
                        if (!response.ok) {
                            new Error("Conexion fallida");
                        }
                        return response.text();

                    })
                    .then(data => {
                        lista.innerHTML = data;
                        // console.log(data);

                    })
                    .catch(error => {
                        console.log(error)
                    })

            }
        })
    }





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
            const turnoSeleccionado = document.getElementById("filtrar-turno").value;
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
                const url = "includes/horarios.php?carrera=" + carreraSeleccionada + "&fecha=" + fechaSeleccionada + "&nivel=" + nivelSeleccionado + "&turno=" + turnoSeleccionado;
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
            const fecha = document.querySelector('.fechaDocente').value;
            const params = new URLSearchParams({ nombre, apellido,fecha});

            fetch(`includes/CRUD/buscarDocente.php?${params.toString()}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error de conexión ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    const tablaDocentes = document.querySelector('#tabla-docentes tbody');
                    tablaDocentes.innerHTML = '';
                    data.forEach(docenteMateria => {
            console.log(fecha);

                        tablaDocentes.innerHTML += `
                            <tr data-docente-materia-id="${docenteMateria.DocenteMateriaID}">
                                <td>${docenteMateria.dia}</td>
                                <td>${docenteMateria.horaInicio} - ${docenteMateria.horaFin}</td>
                                <td>${docenteMateria.nombre} ${docenteMateria.apellido}</td>
                                <td>${docenteMateria.materia}</td>
                                <td>${docenteMateria.nombreCarrera}</td>
                                <td>${docenteMateria.nivel}</td>
                                <td>${docenteMateria.aula}</td>
                                <td>
                                    <button class="editar" onclick= "editarDocente(${docenteMateria.DocenteMateriaID})">✏️</button>
                                    <button class="eliminar" onclick="eliminarDocenteMateria(${docenteMateria.DocenteMateriaID})">🗑️</button>
                                </td>
                            </tr>
                        `;
                    });
                })
                .catch(error => console.error('Error al buscar docentes:', error));
        });
    }
    //* ELIMINAR DOCENTE
    // window.eliminarDocenteMateria = function(docenteMateriaID) {
    //     if (confirm('¿Estás seguro de que deseas eliminar este horario?')) {
    //         fetch('includes/CRUD/eliminarDocente.php', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json'
    //             },
    //             body: JSON.stringify({ docenteMateriaID })
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //             console.log('Respuesta del servidor:', data);
    //             if (data.status === 'success') {
    //                 alert(data.message);
    //                 const row = document.querySelector(`tr[data-docente-materia-id="${docenteMateriaID}"]`);
    //                 if (row) {
    //                     row.remove();
    //                 } else {
    //                     console.error('No se encontró la fila con DocenteMateriaID:', docenteMateriaID);
    //                 }
    //             } else {
    //                 alert(data.message);
    //             }
    //         })
    //         .catch(error => console.error('Error al eliminar el horario:', error));
    //     }
    // }


    window.eliminarDocenteMateria = function (docenteMateriaID) {
        let dialog = document.querySelector('dialog');
        let closeDialog = document.getElementById('close');
        if (dialog) {
            dialog.showModal();
        }
        if (closeDialog) {
            closeDialog.addEventListener('click', () => dialog.close())

        }
    }


    window.editarDocente = function (docenteMateriaID) {
        // alert(484499)
        const editModal = document.getElementById('editModal');
        const editForm = document.getElementById('editModal__form');
        const idDocenteModal = document.getElementById('editModal__docenteMateriaID').value = docenteMateriaID;
        if (editModal) {
            editModal.showModal();
        }
        if (editForm) {

            editForm.addEventListener('reset', () => {
                editModal.close();
            });
            editForm.addEventListener('submit', (e) => {
                e.preventDefault();
                let formData = new FormData(editForm);

                for (let [key, value] of formData.entries()) {
                    console.log(key + ': ' + value);
                }
                function showCustomAlert(message, isSuccess) {
                    const alertDiv = document.createElement('div');
                    alertDiv.className = `custom-alert ${isSuccess ? 'success' : 'error'}`;

                    const icon = document.createElement('span');
                    icon.className = 'custom-alert-icon';
                    icon.innerHTML = isSuccess ? '✔' : '✖';

                    const text = document.createElement('span');
                    text.textContent = message;

                    alertDiv.appendChild(icon);
                    alertDiv.appendChild(text);
                    document.body.appendChild(alertDiv);

                    // Animar la entrada
                    setTimeout(() => {
                        alertDiv.style.opacity = '1';
                    }, 10);

                    // Animar la salida después de 3 segundos
                    setTimeout(() => {
                        alertDiv.style.opacity = '0';
                        setTimeout(() => {
                            alertDiv.remove();
                        }, 300);
                    }, 3000);
                }


                fetch("includes/CRUD/actualizarDocente.php", {
                    method: "POST",
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error de conexión ' + response.statusText);
                        }
                        return response.text()
                    })
                    .then(data => {
                        // editModal.close();
                        // showCustomAlert("Docente editado con éxito", true);
                        // console.log(data);

                        if (data.includes("Datos actualizados correctamente")) {
                            showCustomAlert("Docente editado con éxito", true);
                            document.getElementById("buscarDocente").click();
                            editForm.reset();
                            document.getElementById("buscarNombre").value = "";
                            document.getElementById("buscarApellido").value = "";
                            console.log(data);
                        } else {
                            editModal.close();
                            showCustomAlert("Error al editar docente: " + data, false);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showCustomAlert("Error en la solicitud: " + error.message, false);

                    });

            });
        }
    }
}




let docenteForm = document.getElementById("docenteForm");
if (docenteForm) {
    docenteForm.addEventListener("submit", function (e) {
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
                    console.log("soiiiiiiiiiiiiiiiiiiiiiiiii");
                    // docenteForm.reset();
                } else {
                    alert("Error al agregar docente: " + data.error);
                }
            })
            .catch(error => console.error('Error:', error));
    });
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




// * El js demas
//////////////////////

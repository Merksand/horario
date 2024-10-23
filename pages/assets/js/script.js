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

        opcion.classList.toggle("clicked");
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




    // *  FILTRAR DOCENTE POR NOMBRE O APELLIDO
    const boton = document.getElementById("btn-filtrar");
    const botonFecha = document.getElementById("filtrar-semana");

    function handleDocenteClick(e) {
        // e.preventDefault();
        let nombre = document.getElementById("nombre").value.trim();
        let apellido = document.getElementById("apellido").value.trim();
        let tabla = document.getElementById("tabla-profesores");
        console.log(apellido);
        const params = new URLSearchParams({ nombre, apellido });
        const url = `includes/docentes.php?${params.toString()}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                tabla.innerHTML = data;
            })
            .catch(error => {
                console.error("Error en la petición fetch:", error);
            });
    }

    // Función para manejar la búsqueda con fecha
    function docenteFecha(e) {
        e.preventDefault();
        let nombre = document.getElementById("nombre").value.trim();
        let apellido = document.getElementById("apellido").value.trim();
        let fecha = document.getElementById("fecha").value;
        let tabla = document.getElementById("tabla-profesores");

        // Crear un objeto URLSearchParams con fecha
        const params = new URLSearchParams({ nombre, apellido, fecha });
        const url = `includes/docentes.php?${params.toString()}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                tabla.innerHTML = data;
            })
            .catch(error => {
                console.error("Error en la petición fetch:", error);
            });
    }

    // Asignar las funciones a cada botón
    if (boton) {
        boton.addEventListener("click", docenteFecha);
    }
    if (botonFecha) {
        botonFecha.addEventListener("click", handleDocenteClick);

    }

    // * FILTRO DE MATERIA /////////////////////////////////////////////////

    const botonFiltrarMateria = document.getElementById("btn-materia");
    const btnMateriaSemana = document.getElementById("filtrar-horario");


    function materiaFecha(e) {
        e.preventDefault();
        let nombreMateria = document.getElementById("materia").value;
        let fecha = document.getElementById("fecha").value;
        let tabla = document.getElementById("tabla-profesores");

        const params = new URLSearchParams({ materia: nombreMateria, fecha });
        const url = `includes/materias.php?${params.toString()}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                tabla.innerHTML = data;
            })
            .catch(error => {
                console.error("Error en la petición fetch:", error);
            });
    }

    function materiaSemana(e) {
        e.preventDefault();
        let nombreMateria = document.getElementById("materia").value;
        let tabla = document.getElementById("tabla-profesores");

        const params = new URLSearchParams({ materia: nombreMateria });
        const url = `includes/materias.php?${params.toString()}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                tabla.innerHTML = data;
            })
            .catch(error => {
                console.error("Error en la petición fetch:", error);
            });
    }

    if (botonFiltrarMateria) botonFiltrarMateria.addEventListener("click", materiaFecha);
    if (btnMateriaSemana) btnMateriaSemana.addEventListener("click", materiaSemana);




    // * FILTRO DE AULA ///////////////////////////////////////
    const botonFiltrarAula = document.querySelector(".filtrarAula");
    const btnAulaSemana = document.getElementById("filtrar-aula");
    const filtrarTurno = document.getElementById("filtrar-turno-evento")

    function filtrarAula(e) {
        const aulaSeleccionada = botonFiltrarAula.value;
        const turno = document.getElementById("filtrar-turno-evento").value;
        let tabla = document.getElementById("tabla-profesores");
        let fecha = document.querySelector("#fecha").value;
        if (aulaSeleccionada !== "") {
            const params = new URLSearchParams({ aula: aulaSeleccionada, fecha, turno });
            const url = `includes/aulas.php?${params.toString()}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.text();
                })
                .then(data => {
                    tabla.innerHTML = data;
                })
                .catch(error => {
                    console.error("Error en la petición fetch:", error);
                });
        }
    }

    function filtrarAulaSemana(e) {
        const aulaSeleccionada = botonFiltrarAula.value;
        let tabla = document.getElementById("tabla-profesores");
        const turno = document.getElementById("filtrar-turno-evento").value;
        if (aulaSeleccionada !== "") {
            const params = new URLSearchParams({ aula: aulaSeleccionada, turno });
            const url = `includes/aulas.php?${params.toString()}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.text();
                })
                .then(data => {
                    tabla.innerHTML = data;
                })
                .catch(error => {
                    console.error("Error en la petición fetch:", error);
                });
        }
    }
    let fechaAula = document.querySelector(".fechaAula");
    if (botonFiltrarAula) botonFiltrarAula.addEventListener("change", filtrarAula);
    if (btnAulaSemana) btnAulaSemana.addEventListener("click", filtrarAulaSemana);
    if (filtrarTurno) filtrarTurno.addEventListener("change", filtrarAula);
    if (fechaAula) fechaAula.addEventListener("change", filtrarAula);
    // -----------------------------------------------------------------------------------------


    //* FILTRO CARRERAS ////////////////////////////////
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

    // * REPORTES //////////////////////////////////


    // *////////////////////////////////////////////////////////////////


    //* FILTRO HORARIOS //////////////////////////////////////////////////////////////////

    const fechaInput = document.getElementById('fecha');
    if (fechaInput) {
        const hoy = new Date();
        const año = hoy.getFullYear();
        const mes = ('0' + (hoy.getMonth() + 1)).slice(-2);
        const dia = ('0' + hoy.getDate()).slice(-2);
        fechaInput.value = `${año}-${mes}-${dia}`;
    }




    const reporteHorarios = document.querySelector(".pdfReportes");

    if (reporteHorarios) {
        reporteHorarios.addEventListener("click", () => {
            const carreraSeleccionada = document.getElementById("filtrar-carrera").value;
            const nivelSeleccionado = document.getElementById("filtrar-nivel").value;
            const turnoSeleccionado = document.getElementById("filtrar-turno").value;
            const fechaSeleccionada = document.getElementById("fecha").value;

            // Crear un objeto URLSearchParams para los parámetros de la URL
            const params = new URLSearchParams({
                carrera: carreraSeleccionada,
                fecha: fechaSeleccionada,
                nivel: nivelSeleccionado,
                turno: turnoSeleccionado
            });

            // Redirigir a la página que generará el PDF
            // window.location.href = `../../../includes/Report/horarios.php?${params.toString()}`;

            const url = `../../../includes/Report/report_Horarios.php?${params.toString()}`;
            window.open(url, '_blank');
        });
    }


    function generarReporte(selectorBoton, urlBase) {
        const botonReporte = document.querySelector(selectorBoton);
        if (botonReporte) {
            botonReporte.addEventListener("click", () => {
                const aulaSeleccionada = document.querySelector(".filtrarAula").value;
                const turnoSeleccionado = document.getElementById("filtrar-turno-evento").value;
                const fechaSeleccionada = document.getElementById("fecha").value;
                if (aulaSeleccionada) {
                    const params = new URLSearchParams({
                        aula: aulaSeleccionada,
                        fecha: fechaSeleccionada,
                        turno: turnoSeleccionado
                    });
                    const url = `${urlBase}?${params.toString()}`;
                    window.open(url, '_blank');
                }
            });
        }
    }

    // Usar la función para los dos reportes
    generarReporte(".pdfAula", "../../../includes/Report/report_Aula.php");
    generarReporte(".pdfAulaSemana", "../../../includes/Report/report_Aula-Semana.php");




    function generarReporteDocente(selectorBoton, urlBase) {
        const botonReporte = document.querySelector(selectorBoton);
        if (botonReporte) {
            botonReporte.addEventListener("click", () => {
                const nombreDocente = document.getElementById("nombre").value;
                const apellidoDocente = document.getElementById("apellido").value;
                const fechaSeleccionada = document.getElementById("fecha").value;

                if (nombreDocente || apellidoDocente || fechaSeleccionada) {
                    const params = new URLSearchParams({
                        nombre: nombreDocente,
                        apellido: apellidoDocente,
                        fecha: fechaSeleccionada
                    });
                    const url = `${urlBase}?${params.toString()}`;
                    window.open(url, '_blank');
                }
            });
        }
    }

    // Usar la función para los dos reportes
    generarReporteDocente(".pdfDocente", "../../../includes/Report/report_Docente.php");
    generarReporteDocente(".pdfDocenteSemana", "../../../includes/Report/report_DocenteSemana.php");

    // * MODULO REPORTES //////////////////////////////////
    // const form2 = document.getElementById("formData);-reportes");

    // if (form2) {
    //     form2.addEventListener("submit", (event) => {
    //         event.preventDefault(); 

    //         const tipoReporte = document.getElementById("tipo_reporte").value;
    //         const docenteID = document.getElementById("docenteID1").value;
    //         const nombreDocente = document.querySelector('input[name="nombre1"]').value;
    //         const carreraID = document.getElementById("carreraHidden").value;
    //         const carrera = document.getElementById("carrera").value;
    //         const nivel = document.getElementById("agregarNivel").value;
    //         const materiaID = document.getElementById("materiaHidden").value;
    //         const materia = document.getElementById("materia").value;
    //         const gestion = document.getElementById("gestion").value;
    //         const semestre = document.getElementById("semestre").value;

    //         let url = "";
    //         const params = new URLSearchParams({
    //             tipo_reporte: tipoReporte,
    //             docenteID1: docenteID,
    //             nombre1: nombreDocente,
    //             carreraID: carreraID,
    //             carrera: carrera,
    //             nivel: nivel,
    //             materiaID: materiaID,
    //             materia: materia,
    //             gestion: gestion,
    //             semestre: semestre
    //         });

    //         switch (tipoReporte) {
    //             case "Reporte por Docente por gestion y semestre":
    //                 const param1 = new URLSearchParams({
    //                     docenteID1: docenteID,
    //                     carreraID: carreraID,
    //                     gestion: gestion,
    //                     semestre: semestre
    //                 })
    //                 url = `../includes/Report/modulo_Docente-gestion.php?${param1.toString()}`;
    //                 break;
    //             case "carrera":
    //                 url = `../includes/Report/report_Carrera.php?${params.toString()}`;
    //                 break;
    //             case "materia":
    //                 url = `../includes/Report/report_Materia.php?${params.toString()}`;
    //                 break;
    //             case "gestion_semestre":
    //                 url = `../includes/Report/report_GestionSemestre.php?${params.toString()}`;
    //                 break;
    //             default:
    //                 alert("Por favor, seleccione un tipo de reporte válido.");
    //                 return;
    //         }

    //         // Abre el reporte en una nueva ventana
    //         window.open(url, '_blank');
    //     });
    // }


    // * //////////////////////////////////




    // const tipoReporte = document.getElementById('tipo_reporte');
    // const docenteInput = document.getElementById('agregarNombreCompleto');
    // const carreraInput2 = document.getElementById('carrera');
    // const gestionSelect = document.getElementById('gestion');
    // const semestreSelect = document.getElementById('semestre');

    // if (tipoReporte && docenteInput && carreraInput2 && gestionSelect && semestreSelect) {
    //     resetFields();

    //     tipoReporte.addEventListener('change', function () {
    //         resetFields();  

    //         const selectedValue = tipoReporte.value;

    //         if (selectedValue === 'Reporte por Docente por gestion y semestre') {
    //             docenteInput.disabled = false;
    //             gestionSelect.disabled = false;
    //             semestreSelect.disabled = false;
    //         } else if (selectedValue === 'carrera') {
    //             carreraInput2.disabled = false;
    //             gestionSelect.disabled = false;
    //             semestreSelect.disabled = false;
    //         } else if (selectedValue === 'materia') {
    //             carreraInput2.disabled = false;
    //             gestionSelect.disabled = false;
    //             semestreSelect.disabled = false;
    //         } else if (selectedValue === 'gestion_semestre') {
    //             gestionSelect.disabled = false;
    //             semestreSelect.disabled = false;

    //         }
    //     });

    //     function resetFields() {
    //         docenteInput.disabled = true;
    //         carreraInput2.disabled = true;
    //         gestionSelect.disabled = true;
    //         semestreSelect.disabled = true;
    //     }
    // }


    const formReportes = document.getElementById('form-reportes');
    if (formReportes) {

        formReportes.addEventListener('submit', function (event) {
            event.preventDefault(); // Previene el envío por defecto del formulario

            const formData = new FormData(formReportes);

            // Convierte los datos del formulario a una URL codificada
            const params = new URLSearchParams();
            formData.forEach((value, key) => {
                params.append(key, value);
            });

            // Construye la URL para enviar los datos
            const url = `../includes/Report/modulo_Docente-gestion.php?${params.toString()}`;

            // Abre una nueva ventana con la URL del reporte
            // window.open(url);
            window.open(url, '_blank');
        });
    }


    let iconoFlecha = document.querySelector(".iconoFlecha");

    const botonFiltrarHorario = document.getElementById("filtrar-horarios");

    function horarioPrincipal() {
        const carreraSeleccionada = document.getElementById("filtrar-carrera").value;
        const nivelSeleccionado = document.getElementById("filtrar-nivel").value;
        const turnoSeleccionado = document.getElementById("filtrar-turno").value;
        const fechaSeleccionada = document.getElementById("fecha").value;

        const ordenacion = iconoFlecha && iconoFlecha.classList.contains('ordenarPorNombre') ? 'Nombre' : 'OtroCriterio';

        let tabla = document.getElementById("tabla-profesores");

        if (carreraSeleccionada !== "") {
            const params = new URLSearchParams({
                carrera: carreraSeleccionada,
                fecha: fechaSeleccionada,
                nivel: nivelSeleccionado,
                turno: turnoSeleccionado,
                iconoFlecha: ordenacion
            });

            const url = `includes/horarios.php?${params.toString()}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.text();
                })
                .then(data => {
                    tabla.innerHTML = data;
                })
                .catch(error => {
                    console.error("Error en la petición fetch:", error);
                });
        }
    }

    if (botonFiltrarHorario) {
        botonFiltrarHorario.addEventListener("click", horarioPrincipal);
    }

    if (iconoFlecha) {
        iconoFlecha.addEventListener("click", () => {
            iconoFlecha.classList.toggle('ordenarPorNombre');
            horarioPrincipal();
        });
    }




    function showCustomAlert(message, isSuccess) {
        // Eliminar cualquier aviso existente antes de mostrar uno nuevo
        const existingAlert = document.querySelector('.custom-alert');
        if (existingAlert) {
            existingAlert.remove();
        }

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

        // Ocultar después de un tiempo
        setTimeout(() => {
            alertDiv.style.opacity = '0';
            setTimeout(() => {
                alertDiv.remove();
            }, 300);
        }, 4500);
    }


    // * CRUD /////////////////////////////////////////////


    // * Datos dinamicos de registro docente con su horarios /////////////////////////////////////////

    const turnoInput = document.getElementById('turno');
    const diaInput = document.getElementById('dia');
    const periodoInicioInput = document.getElementById('periodoInicio');
    const periodoFinInput = document.getElementById('periodoFin');
    const periodoInicioHidden = document.getElementById('periodoInicioHidden');
    const periodoFinHidden = document.getElementById('periodoFinHidden');

    // Habilitar el campo "Día" después de seleccionar un "Turno"
    if (turnoInput) turnoInput.addEventListener('change', habilitarDia);
    if (diaInput) diaInput.addEventListener('change', habilitarPeriodoInicio);
    if (periodoInicioInput) periodoInicioInput.addEventListener('change', habilitarPeriodoFin);

    function habilitarDia() {
        if (turnoInput.value) {
            diaInput.disabled = false;

            diaInput.placeholder = "Selecciona un día";



        } else {
            diaInput.disabled = true;
            diaInput.placeholder = "Selecciona un turno primero";
            periodoInicioInput.disabled = true;
            periodoInicioInput.placeholder = "Selecciona un día primero";
            periodoFinInput.disabled = true;
            periodoFinInput.placeholder = "Selecciona un periodo de inicio primero";
        }
    }

    // Habilitar el campo "Periodo Inicio" después de seleccionar un "Día"
    function habilitarPeriodoInicio() {
        if (diaInput.value) {
            periodoInicioInput.disabled = false;
            periodoInicioInput.placeholder = "Selecciona un periodo de inicio";
            periodoInicioInput.disabled = false;
            periodoFinInput.disabled = false;
        } else {
            periodoInicioInput.disabled = true;
            periodoInicioInput.placeholder = "Selecciona un día primero";
            periodoFinInput.disabled = true;
            periodoFinInput.placeholder = "Selecciona un periodo de inicio primero";
        }
    }

    // Habilitar el campo "Periodo Fin" después de seleccionar un "Periodo Inicio"
    function habilitarPeriodoFin() {
        if (periodoInicioInput.value) {
            periodoFinInput.disabled = false;
            periodoFinInput.placeholder = "Selecciona un periodo de fin";
        } else {
            periodoFinInput.disabled = true;
            periodoFinInput.placeholder = "Selecciona un periodo de inicio primero";
        }
    };

    let diaEvento = document.getElementById('dia');
    if (diaEvento) diaEvento.addEventListener("input", obtenerHorarios);

    function obtenerHorarios() {
        const turno = document.getElementById('turno').value;
        const dia = document.getElementById('dia').value;

        if (turno && dia) {
            fetch('includes/CRUD/obtenerHorarios.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ turno, dia })
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const inicioPeriodo = document.getElementById('inicio-periodo');
                    const finPeriodo = document.getElementById('fin-periodo');
                    inicioPeriodo.innerHTML = '';
                    finPeriodo.innerHTML = '';

                    data.horarios.forEach(horario => {
                        const inicioOption = document.createElement('option');
                        inicioOption.value = horario.HoraInicio + " " + horario.HoraFin;
                        inicioOption.textContent = "Periodo: " + horario.Periodo;
                        inicioOption.setAttribute("data-horario-id", horario.HorarioID);
                        inicioPeriodo.appendChild(inicioOption);

                        const finOption = document.createElement('option');
                        finOption.value = horario.HoraInicio + " a " + horario.HoraFin;
                        finOption.textContent = "Periodo: " + horario.Periodo;
                        finOption.setAttribute("data-horario-id", horario.HorarioID);
                        finPeriodo.appendChild(finOption);
                    });

                    // Actualizar los valores ocultos con los IDs seleccionados
                    if (periodoInicioInput) {
                        periodoInicioInput.addEventListener('change', function () {
                            const selectedOption = inicioPeriodo.querySelector('option[value="' + periodoInicioInput.value + '"]');
                            if (selectedOption) {
                                periodoInicioHidden.value = selectedOption.getAttribute('data-horario-id');
                            } else {
                                periodoInicioHidden.value = '';
                            }
                        });
                    }

                    if (periodoFinInput) {
                        periodoFinInput.addEventListener('change', function () {
                            const selectedOption = finPeriodo.querySelector('option[value="' + periodoFinInput.value + '"]');
                            if (selectedOption) {
                                periodoFinHidden.value = selectedOption.getAttribute('data-horario-id');
                            } else {
                                periodoFinHidden.value = '';
                            }
                        });
                    }
                })
                .catch(error => console.error('Error al cargar horarios:', error));
        }
    }

    // *  RELACIONAR INFORMACION DOCENTES CON CLASES////////////////////////////
    let inputCarrera = document.getElementById("carrera")
    let inputMateria = document.getElementById("materia")
    let inputNivel = document.getElementById("agregarNivel")


    function verificarInput() {
        console.log(1);
        const selectedCarrera = inputCarrera.value;
        const selectedNivel = inputNivel.value;
        if (selectedCarrera && selectedNivel) {

            updateMaterias(selectedCarrera, selectedNivel);
            console.log(selectedCarrera + ' ' + selectedNivel);
        } else if (!inputNivel.value.length > 0) {
            inputNivel.placeholder = ''
            inputNivel.disabled = false;
        }
        else {
            inputMateria.disabled = true;
            inputMateria.placeholder = 'Seleccione un nivel';
        }

    }
    if (inputCarrera) inputCarrera.addEventListener('input', verificarInput);
    if (inputNivel) inputNivel.addEventListener('change', verificarInput);
    if (inputNivel) inputNivel.addEventListener("input", verificarInput);



    // Seleccionamos todos los inputs que tienen que ver con nombres de docentes
    const inputsNombre = document.querySelectorAll('input[list="listaDocentes"]');

    // Añadimos el evento 'input' a cada uno de ellos
    if (inputsNombre) {
        inputsNombre.forEach(input => {
            input.addEventListener('input', function () {
                const valorIngresado = this.value;  // Capturamos el valor ingresado en este input
                const dataList = document.getElementById('listaDocentes');  // Lista de opciones

                // Buscamos en el datalist la opción que coincida con el valor ingresado
                const opcionSeleccionada = Array.from(dataList.options).find(option => option.value === valorIngresado);

                if (opcionSeleccionada) {
                    const docenteID = opcionSeleccionada.getAttribute('data-docente-id');  // Obtenemos el ID del docente

                    // Buscamos el campo oculto relacionado con este input, basado en el atributo "data-hidden-id"
                    const inputHiddenID = document.getElementById(this.getAttribute('data-hidden-id'));

                    if (inputHiddenID) {
                        inputHiddenID.value = docenteID;  // Asignamos el ID del docente al input oculto
                        console.log("Docente ID asignado:", docenteID, "al input oculto", inputHiddenID.id);
                    }
                } else {
                    console.log('No se encontró el DocenteID para el nombre ingresado.');
                }
            });
        });
    }
    // ! TODO FALTA SOLUCIONAR ESTE PROBLEMA DE ATRIBUTO MATERIA MATERIAHIDDEN

    // Función para asignar evento y actualizar hidden inputs
    function asignarEventoInput(inputId, datalistId, hiddenId, datasetAttribute) {
        let input = document.getElementById(inputId);
        if (input) {
            input.addEventListener('input', function () {
                let datalist = document.getElementById(datalistId);
                let option = Array.from(datalist.options).find(opt => opt.value === input.value);
                let res = document.getElementById(hiddenId).value = option ? option.dataset[datasetAttribute] : '';

            });
        }
    }

    asignarEventoInput('materia', 'lista-materias', 'materiaHidden', 'materiaId');
    asignarEventoInput('aula', 'lista-aulas', 'aulaHidden', 'aulaId');
    asignarEventoInput('observacion', 'lista-observaciones', 'observacionHidden', 'observacionId');
    asignarEventoInput('carrera', 'lista-carrera', 'carreraHidden', 'carreraId')

    materiaHidden = document.getElementById("materiaHidden");


    let docenteForm = document.getElementById("docenteForm");
    if (docenteForm) {
        docenteForm.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(docenteForm);


            console.log(formData);
            for (let [key, value] of formData.entries()) {
                console.log(key + ': ' + value);
            }

            fetch("includes/CRUD/agregarDocente.php", {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    if (data.includes("correctamente")) {

                        showCustomAlert(data, true)
                        docenteForm.reset()
                    } else if (data.includes("rellena") || data.includes("rango") || data.includes("completa todos los campos")) {
                        showCustomAlert(data, false)
                    } else if (data.includes("Error al insertar")) {
                        showCustomAlert("El registro ya existe", false)
                    }

                })
                .catch(error => {
                    showCustomAlert("Error de conexión: " + error);
                    console.log(error);
                });

        });
    }


    // * ////////////////////////////////////////////////////


    const buscarDocente = document.getElementById("buscarDocente");

    if (buscarDocente) {
        buscarDocente.addEventListener("click", (e) => {
            e.preventDefault();
            const form = document.getElementById('buscar-form');
            const nombre = document.getElementById('buscarNombre').value;
            const apellido = document.getElementById('buscarApellido').value;
            const materia = document.getElementById('buscarMateria').value;
            const aula = document.getElementById('buscarAula').value;
            const params = new URLSearchParams({ nombre, apellido, materia, aula });

            fetch(`includes/CRUD/buscarDocente.php?${params.toString()}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error de conexión ' + response.statusText);
                    }

                    return response.text();
                })
                .then(html => {
                    if (html.includes("proporcionados") || html.includes("encontraron ")) {
                        showCustomAlert(html, false)
                        return;
                    }
                    const tablaDocentes = document.querySelector('#tabla-docentes');
                    tablaDocentes.innerHTML = html;
                    if (!(nombre || apellido)) {
                        form.reset();
                    }

                })
                .catch(error => console.error('Error al buscar docentes:', error));
        });
    }



    //* ELIMINAR DOCENTE
    // window.eliminarDocenteMateria = function(docenteMateriaID) {
    function eliminarRegistroFuncion(id, url, tipoRegistro) {
        console.log(id);
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        })
            .then(response => response.json())
            .then(data => {
                // console.log('Respuesta del servidor:', data);
                if (data.status === 'success') {
                    // alert(data.message);
                    showCustomAlert(data.message, true);
                    const row = document.querySelector(`tr[data-${tipoRegistro}-id="${id}"]`);
                    if (row) {
                        row.remove();
                        return
                    } else {
                        console.error('No se encontró la fila con id:', id);
                        return;
                    }
                } else {
                    showCustomAlert(data.message, false);
                }
            })
            .catch(error => console.error('Error al eliminar el horario:', error));
    }
    // }

    let dialog = document.querySelector('dialog');
    let closeDialog = document.getElementById('close');
    let eliminarRegistro = document.querySelector('.eliminarRegistro');

    if (eliminarRegistro) {
        eliminarRegistro.addEventListener('click', (e) => {
            eliminarRegistroFuncion(dialog.getAttribute('data-docente-materia-id'), 'includes/CRUD/eliminarDocente.php', 'docente-materia');
            console.log(e);
            dialog.close();
        });
    }

    if (closeDialog) {
        closeDialog.addEventListener('click', (e) => {
            dialog.close();
        });
    }

    window.eliminarDocenteMateria = function (docenteMateriaID) {
        if (dialog) {
            console.log(docenteMateriaID);
            dialog.setAttribute('data-docente-materia-id', docenteMateriaID);
            dialog.showModal();
        }
    }


    //  *  /////////////////////////////

    // * EDITAR REGISTROS DOCENTE ////////////////////////////////
    window.editarDocente = function (docenteMateriaID) {
        const editModalDocente = document.getElementById('editModalDocente');
        const editForm = document.getElementById('editModal__form');
        const idDocenteModal = document.getElementById('editModal__docenteMateriaID');
        idDocenteModal.value = docenteMateriaID;

        if (editModalDocente) editModalDocente.showModal();

        if (editForm) {
            editForm.addEventListener('reset', (e) => {
                editModalDocente.close();
            });
        }
        if (editForm) {
            editForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const formData = new FormData(editForm);
                const carrera = formData.get('carrera');
                const nivel = formData.get('nivel');
                const aula = formData.get('aula');

                fetch("includes/CRUD/actualizarDocente.php", {
                    method: "POST",
                    body: formData
                })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data);
                        if (data.includes("Datos actualizados correctamente")) {
                            showCustomAlert("Docente editado con éxito", true);
                            const row = document.querySelector(`tr[data-docente-materia-id="${docenteMateriaID}"]`);
                            if (row) {
                                if (carrera) row.querySelector('.nombreCarrera').textContent = carrera;
                                if (nivel) row.querySelector('.nivel').textContent = nivel;
                                if (aula) row.querySelector('.aula').textContent = aula;
                            }

                            // editForm.reset();
                            document.getElementById("buscarDocente").click();
                            editForm.reset();
                            editModalDocente.close();
                        } else {
                            showCustomAlert("Error al editar docente: " + data.message, false);
                            console.log(data.message);
                            console.log(data);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showCustomAlert("Error en la solicitud: " + error.message, false);
                    });
            }, { once: true });
        }
    };



    // * EDITAR Y BORRAR AULA ////////////////////////////////////////////////////
    let editModalAulaForm = document.getElementById('editModalAula__form');
    const editModalAula = document.getElementById('editModalAula');
    const modalBorrar = document.querySelector('.dialogBorrarAula');
    const noEliminarAula = document.querySelector('.noEliminarAula');
    const eliminarAula = document.querySelector('.eliminarAula');


    if (editModalAula) {
        editModalAulaForm.addEventListener('reset', (e) => {
            editModalAula.close();
        })

    }

    window.eliminarAula = function (aulaID) {
        if (modalBorrar) {
            console.log(aulaID);
            dialog.setAttribute('data-aula-id', aulaID);
            modalBorrar.showModal();
        }
    }
    if (noEliminarAula) {
        noEliminarAula.addEventListener("click", function () {
            modalBorrar.close();
        })
    }

    if (eliminarAula) {
        eliminarAula.addEventListener("click", function () {
            console.log("AULA ELIMINADA");
            let aulaID = dialog.getAttribute('data-aula-id');
            console.log("AULAID : ", aulaID);
            eliminarRegistroFuncion(aulaID, 'includes/CRUD/eliminarAula.php', 'aula');
            modalBorrar.close();
        })
    }


    const nombreInput = document.getElementById('editModalAula__nombre');
    const aulaIDInput = document.getElementById('editModalAula__docenteMateriaID');

    if (editModalAulaForm && nombreInput && aulaIDInput) {
        editModalAulaForm.addEventListener('submit', function (event) {
            const aulaID = aulaIDInput.value;
            const nombre = nombreInput.value;
            console.log(aulaID, nombre);
            fetch('includes/CRUD/actualizarAula.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ aulaID, nombre })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        showCustomAlert(data.message, true);
                        const row = document.querySelector(`tr[data-aula-id="${aulaID}"]`);
                        if (row) {
                            row.querySelector('td').textContent = nombre;
                        }
                        editModalAulaForm.reset();
                        editModalAula.close();
                    } else {
                        showCustomAlert(data.message, false);
                    }
                })
                .catch(error => console.error('Error al actualizar el aula:', error));
        });
    }

    window.editarAula = function (aulaID, nombreActual) {
        if (nombreInput && aulaIDInput && editModalAula) {
            aulaIDInput.value = aulaID;

            editModalAula.showModal();
        } else {
            console.error('Uno o más elementos del DOM no se encontraron.');
        }
    };


    // Manejar el envío del formulario para editar el aula

    // * MODAL DINAMICO (Obtencion de materias)////////////////////////////////////////////////////


    const carreraInput = document.getElementById('editModal__carrera');
    const nivelInput = document.getElementById('editModal__agregarNivel');
    const materiaInput = document.getElementById('editModal__materia-input');

    if (carreraInput) carreraInput.addEventListener('input', checkInputs);
    if (nivelInput) nivelInput.addEventListener('change', checkInputs);

    function checkInputs() {
        const carrera = carreraInput.value;
        const nivel = nivelInput.value;

        if (carrera && nivel) {
            updateMaterias(carrera, nivel);
            console.log(carrera + ' ' + nivel);
        } else {
            materiaInput.disabled = true;
            materiaInput.placeholder = 'Seleccione un nivel';
        }
    }

    function updateMaterias(carrera, nivel) {
        console.log("dentro de updateMaterias");
        fetch(`includes/CRUD/obtenerMaterias.php?carrera=${encodeURIComponent(carrera)}&nivel=${encodeURIComponent(nivel)}`)
            .then(response => response.json())
            .then(data => {
                console.log("Prueba: ", data);
                const materiaDatalist = document.getElementById('editModal__materia');
                const listaMaterias = document.getElementById("lista-materias")
                materiaDatalist.innerHTML = '';
                listaMaterias.innerHTML = ''
                let materiaGlobal = document.getElementById("materia");
                if (data.mensaje) {
                    if (materiaDatalist) {
                        materiaInput.disabled = true;
                        materiaInput.placeholder = data.mensaje;
                    }
                    if (materiaGlobal) {
                        materiaGlobal.disabled = true
                        materiaGlobal.placeholder = data.mensaje;
                    }
                } else {
                    data.forEach(materia => {
                        // console.log("Materia: ", materia);
                        if (materiaDatalist) {
                            const option = document.createElement('option');
                            option.value = materia.Nombre;
                            option.setAttribute("data-materia-id", materia.MateriaID)
                            // option.textContent = materia.Paralelo ? `(Paralelo: ${materia.Paralelo})` : materia.Nombre;
                            if (materia.Paralelo) {
                                option.textContent = `(Paralelo: ${materia.Paralelo})`;
                            } else {
                                option.textContent = materia.Nombre;
                            }

                            materiaDatalist.appendChild(option);
                        }

                        if (listaMaterias) {
                            const optionLista = document.createElement('option');
                            optionLista.value = materia.Nombre;
                            optionLista.textContent = materia.Paralelo ? `(Paralelo: ${materia.Paralelo})` : materia.Nombre;
                            optionLista.setAttribute("data-materia-id", materia.MateriaID)
                            // listaMaterias.appendChild(optionLista);
                            listaMaterias.appendChild(optionLista);
                        }
                        // console.log("OPTION: ", option);
                        // console.log(materiaDatalist);
                        // document.getElementById("materia").disabled = false;
                    });


                    if (materiaDatalist) {
                        materiaInput.disabled = false;
                        materiaInput.placeholder = '';
                        inputMateria.disabled = false
                        inputMateria.placeholder = ''
                    }
                    materiaGlobal.disabled = false;
                    materiaGlobal.placeholder = '';


                }
            })
            .catch(error => {
                console.error('Error al cargar materias:', error);
                // materiaInput.disabled = true;
                materiaInput.placeholder = 'Error al cargar materias';
            });
    }





    // * //////////////////////////////////////////////////

    // * EDITAR Y ELIIMINAR MATERIAS ////////////////////////////////////////
    const materiaIDInput = document.getElementById('editModalMateria__materiaID');
    const nombreInputMateria = document.getElementById('editModalMateria__nombre');
    const codigoInput = document.getElementById('editModalMateria__codigo');
    const nivelInputNivel = document.getElementById('editModalMateria__nivel');

    const editModalMateriaForm = document.getElementById('editModalMateria__form');
    const editModalMateria = document.getElementById('editModalMateria');
    if (editModalMateriaForm) {
        editModalMateriaForm.addEventListener("reset", () => {
            editModalMateria.close();
        })
    }
    window.editarMateria = function (materiaID) {

        if (nombreInputMateria && materiaIDInput) {
            materiaIDInput.value = materiaID;
        }

        if (editModalMateria) {
            editModalMateria.showModal();

            editModalMateriaForm.addEventListener('submit', function (event) {
                event.preventDefault();
                const nombre = nombreInputMateria.value;
                const codigo = codigoInput.value;
                const nivel = nivelInputNivel.value;

                console.log('MateriaID: ' + materiaID + ' ' + 'nombre: ' + nombre + ' ' + 'codigo: ' + codigo + ' ' + 'nivel: ' + nivel);
                fetch('includes/CRUD/actualizarMateria.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ materiaID, nombre, nivel, codigo })
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.status === 'success') {
                            showCustomAlert(data.message, true);
                            const row = document.querySelector(`tr[data-materia-id="${materiaID}"]`);
                            if (row) {
                                // Mantener el nombre si no se actualizó
                                if (nombre !== '') {
                                    row.querySelector('td:nth-child(1)').textContent = nombre;
                                }

                                if (codigo !== '') {
                                    if (row.querySelector('td:nth-child(2)')) row.querySelector('td:nth-child(2)').textContent = codigo;
                                }
                                if (nivel !== '') {
                                    if (row.querySelector('td:nth-child(3)')) row.querySelector('td:nth-child(3)').textContent = nivel;
                                }

                            }
                            editModalMateriaForm.reset();
                            editModalMateria.close();
                        } else {
                            showCustomAlert(data.message, false);
                        }
                    })
                    .catch(error => console.error('Error al actualizar la materia:', error));
            }, { once: true });
        }
    };
    window.eliminarMateria = function (materiaID) {
        console.log(materiaID);
        if (editModalMateria) {
            // editModalMateria.showModal();
            // editModalMateriaForm.addEventListener('submit', function (event) {
            //     event.preventDefault();
            //     const nombre = nombreInputMateria.value;
            //     const codigo = codigoInput.value;
            //     const nivel = nivelInputNivel.value;

            eliminarRegistroFuncion(materiaID, 'includes/CRUD/eliminarMateria.php', "materia")

            // });
        }
    }



    // * BARRA AGREGAR NUEVOS DATOS //////////////////////////////////////////////////
    const form = document.getElementById("form-AgregarDatos");
    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            const formData = new FormData(form);
            fetch("includes/CRUD/agregarDatos.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    console.log("Dato arrojado: " + data);

                    // Verifica si hay errores o mensajes relevantes
                    if (data.includes("Error") || data.includes("ya existe") || data.includes("Falta") || data.includes("gestión")) {
                        if (data.includes("Faltan datos") || data.includes("Error de validación")) {
                            // Caso: Campos incompletos o validación fallida
                            showCustomAlert("Por favor, complete todos los campos requeridos.", false);
                        } else if (data.includes("ya existe")) {
                            // Caso: El dato ya existe
                            showCustomAlert("Ya existe el dato ingresado.", false);
                        } else if (data.includes("Error al agregar Gestión")) {
                            // Caso: Error específico al agregar la gestión
                            showCustomAlert("Error al agregar la Gestión Académica.", false);
                        } else if (data.includes("gestión")) {
                            // Caso: Exito o fallo en la gestión académica
                            if (data.includes("correctamente")) {
                                showCustomAlert("Gestión académica agregada correctamente.", true);
                            } else if (data.includes("coincidir")) {
                                showCustomAlert(data, false);
                            }
                            else {
                                showCustomAlert("Error en la gestión académica: " + data, false);
                            }
                        } else {
                            // Otros errores genéricos
                            showCustomAlert("Error al agregar dato: " + data, false);
                        }
                    } else {
                        // Si no hay errores, los datos se agregaron correctamente
                        console.log("form Docente agregar: ", data);
                        showCustomAlert("Datos agregados con éxito.", true);
                        console.log(data);
                        form.reset();  // Reiniciar el formulario
                    }
                })
                .catch(error => console.error('Error:', error));
        })
    }

    let formCopiar = document.getElementById('form-CopiarDatos');
    let btnCopiar = document.getElementById('btn-copiar');
    if (formCopiar) {
        formCopiar.addEventListener('submit', function (e) {
            e.preventDefault();

            const carrera_copiar = document.getElementById('carrera_copiar').value;
            const gestion_copiar = document.getElementById('gestion_copiar').value;
            const nueva_gestion = document.getElementById('nueva_gestion').value;

            if (carrera_copiar === "" || gestion_copiar === "" || nueva_gestion === "") {
                showCustomAlert("Por favor, complete todos los campos antes de continuar.", false);
                return;
            }

            const formData = new FormData();
            formData.append('carrera_copiar', carrera_copiar);
            formData.append('gestion_copiar', gestion_copiar);
            formData.append('nueva_gestion', nueva_gestion);
            btnCopiar.disabled = true;
            showCustomAlert("Espere un momento...", true);

            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), 10000); // 10 segundos
            fetch('includes/copiar_datos.php', {
                method: 'POST',
                body: formData,
                signal: controller.signal
            })
                .then(response => response.text())
                .then(data => {
                    clearTimeout(timeoutId); // Limpiar el timeout si la solicitud se completa
                    console.log("Respuesta del servidor: " + data);
                    console.log("---------------------------------");
                    if (data.includes("copiados correctamente")) {
                        showCustomAlert("Datos copiados correctamente.", true);
                        formCopiar.reset();
                    } else if (data.includes("mismo que la gestión")) {
                        showCustomAlert("La nueva gestión no puede ser la misma que la gestión a copiar.", false);
                    } else if (data.includes("Error") || data.includes("Error al copiar los datos")) {
                        showCustomAlert("Hubo un error al copiar los datos.", false);
                    } else if (data.includes("encontraron datos")) {
                        showCustomAlert("No se encontraron datos para copiar", false)
                    }
                    else {
                        showCustomAlert("Por favor, complete todos los campos.", false);
                    }
                    btnCopiar.disabled = false;

                })
                .catch(error => {
                    btnCopiar.disabled = false;
                    console.error('Error:', error);
                    showCustomAlert("Error al intentar copiar los datos.", false);
                });
        });
    }


    // * ////////////////////////////////////////////////



    let centra = document.querySelector("#tabla-centralizador")

    if (centra) {
        if ($("#tabla-centralizador")) {
            $(function () {
                $("#tabla-centralizador").DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'pdfHtml5',
                        text: 'Exportar a PDF',
                        customize: function (doc) {
                            var fecha = new Date();
                            var fechaTexto = fecha.toLocaleDateString() + ' ' + fecha.toLocaleTimeString();

                            doc.content.splice(0, 0, {
                                text: 'Fecha: ' + fechaTexto,
                                alignment: 'left',
                                margin: [20, 10]
                            });
                        }
                    },
                        'excel', 'print'
                    ],
                    "pageLength": 15,
                    "language": {
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorías",
                        "infoEmpty": "Mostrando 0 a 0 de 0 Categorías",
                        "infoFiltered": "(Filtrado de _MAX_ total Categorías)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Categorías",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscador:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,

                }).buttons().container().appendTo('#tabla-centralizador_wrapper .col-md-6:eq(0)');
            });
        }
    }

    let btnBd = document.querySelector("#btn-bd");

    if (btnBd) {
        document.getElementById('btn-bd').addEventListener('click', function () {
            window.location.href = 'includes/copia-bd.php';
        });
    }

    let cerrarSesion = document.querySelector("#cerrar-sesion");

    if (cerrarSesion) {
        document.getElementById('cerrar-sesion').addEventListener('click', function () {
            localStorage.removeItem('pagina');
            localStorage.removeItem('opcionClick');
            console.log("nouuu");
            window.location.href = 'logout.php';
        });
    }

    let cambiarContrasena = document.querySelector("#cambiarContrasenaForm");

    if (cambiarContrasena) {
        cambiarContrasena.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(cambiarContrasena);
            console.log(formData);
            for (let [key, value] of formData.entries()) {
                console.log(key + ': ' + value);
            }
            fetch('includes/cambiar_clave.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    showCustomAlert(data.message, true)
                    cambiarContrasena.reset();
                })
              
        });
    }

    let agregarUsuarioForm = document.getElementById('agregarUsuarioForm');

    if (agregarUsuarioForm) {

        agregarUsuarioForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(agregarUsuarioForm);


            console.log(formData);
            for (let [key, value] of formData.entries()) {
                console.log(key + ': ' + value);
            }
            fetch('includes/CRUD/agregarUsuario.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    showCustomAlert(data.message, true)
                    // alert(data.message);
                    agregarUsuarioForm.reset();
                });
        });
    }
}



//* HOME 

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





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
                                        <button class="editar" data-id="${docente.id}">✏️</button>
                                        <button class="eliminar" data-id="${docente.id}">🗑️</button>
                                    </td>
                                </tr>
                            `;
                        });
                    })
                    .catch(error => console.error('Error al buscar docentes:', error));
            });

        const tablaDocentes = document.querySelector('#tabla-docentes tbody');
        if (tablaDocentes) {
            tablaDocentes.addEventListener("click", (e) => {
                if (e.target.classList.contains("editar")) {
                    const docenteID = e.target.getAttribute("data-id");
                    editarDocente(docenteID);
                }

                if (e.target.classList.contains("eliminar")) {
                    const docenteID = e.target.getAttribute("data-id");
                    eliminarDocente(docenteID);
                }
            });
        }
    }
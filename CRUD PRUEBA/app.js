document.addEventListener("DOMContentLoaded", function() {
    let docenteForm = document.getElementById("docenteForm");

    docenteForm.addEventListener("submit", function(e) {
        e.preventDefault(); // Prevenir la recarga de la página por defecto
        const formData = new FormData(docenteForm);

        // Mostrar información en la consola
        for (let [key, value] of formData.entries()) {
            console.log(key + ': ' + value);
        }

        fetch("agregar.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Docente agregado con éxito");
                docenteForm.reset(); // Limpiar el formulario después de agregar
            } else {
                alert("Error al agregar docente: " + data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

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
      //   setDefaultDate();
      //   ejecutarScript();
      //   ejecutarCarrera();
      // ejecutarDocentes();
      agregarEventos();
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
        e.preventDefault();
        fetch('pages/assets/js/fil.php')
       .then((response) => response.text())
       .then((data) => {
            document.getElementById('tabla-profesores').innerHTML = data;
        })
        console.log(3223);
      });
  }
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

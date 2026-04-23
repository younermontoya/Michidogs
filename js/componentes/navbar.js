window.addEventListener("load", () => {
  fetch("/views/componentes/nav.html")
    .then((response) => response.text())
    .then((data) => {
      document.querySelector(".navHome").innerHTML = data;


      displayTokenExpirationTime();


      function displayTokenExpirationTime() {
        const token = sessionStorage.getItem('token');
        if (!token) {
          // alert("LA buena rata");
          var comprasCliente = document.getElementById('comprasCliente');
          var nombreCliente = document.getElementById('nombreCliente');
          comprasCliente.style.display = "none";
          nombreCliente.style.display = "none";

        }else{
            var botonInicio =  document.getElementById('botonNavInicio')
            botonInicio.style.display = "none";
        }
    
      }











      const navItems = document.querySelectorAll(".navbar-nav .nav-item");
      const posicionHome = navItems[0];

      const selectedItem = localStorage.getItem("selectedNavItem");

      navItems.forEach((navItem) => {
        navItem.addEventListener("click", (event) => {
          event.preventDefault();

          navItems.forEach((item) => {
            item.classList.remove("clicked");
          });

          navItem.classList.add("clicked");

          localStorage.setItem("selectedNavItem", navItem.dataset.index);

          const link = navItem.querySelector(".nav-link");

          setTimeout(() => {
            window.location.href = link.href;
          }, 100);
        });

        if (
          selectedItem &&
          navItem.dataset.index === selectedItem &&
          selectedItem != 0
        ) {
          if (selectedItem == 2) {
            sessionStorage.setItem("categoria", "categoria");
            sessionStorage.setItem("tipo_mascota", "tipoMascota");
          }
          navItem.classList.add("clicked");
          posicionHome.classList.remove("clicked");
        }
      });
    });
});

document
  .getElementById("formularioRegistro")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const datosFormulario = new FormData(event.target);
    const registro = {};
    datosFormulario.forEach((value, key) => {
      registro[key] = value;
    });

    console.log(registro);
    axios
      .post("http://localhost:8080/auth/register", registro)
      .then((response) => {
        const userDetails = response.data;
        console.log("El usuario se creó correctamente");
        Swal.fire({
          text: "Registro Exitoso",
          icon: "success",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK",
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById("formularioRegistro").reset();

            $("#registro").modal("hide");

            $("#inicio").modal("show");
          }
        });
      })
      .catch((error) => {
        if (error.response) {
          if (error.response.status == 403 && error.response.data == "") {
            Swal.fire({
              position: "top-center",
              icon: "error",
              title: "Ya tienes una cuenta registrada",
              showConfirmButton: false,
              timer: 1500,
            });
          } else {
            Swal.fire({
              position: "top-center",
              icon: "error",
              title: error.response.data,
              showConfirmButton: false,
              timer: 1500,
            });
          }
        } else if (error.request) {
          // La solicitud se hizo pero no se recibió respuesta
          console.error("No se recibió respuesta del servidor:", error.request);
          Swal.fire({
            position: "top-center",
            icon: "error",
            title: "Problemas con el servidor   intente más tarde",
            showConfirmButton: false,
            timer: 1300,
          });
        } else {
          // Ocurrió un error antes de enviar la solicitud
          console.error("Error al enviar la solicitud:", error.message);
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Error al registrar" + error.message,
            showConfirmButton: false,
            timer: 1500,
          });
        }
      });
  });

document.getElementById("login").addEventListener("submit", (e) => {
  e.preventDefault();

  const datosFormulario = new FormData(e.target);
  const login = {};

  datosFormulario.forEach((value, key) => {
    login[key] = value;
  });
  console.log(login);
  axios
    .post("http://localhost:8080/auth/login", login)
    .then((response) => {
      alert("llegooo");
      userDetails = response.data;
      sessionStorage.setItem("token", userDetails.token);
      sessionStorage.setItem("nombre", userDetails.nombre);
      sessionStorage.setItem("apellido", userDetails.apellido);
      sessionStorage.setItem("documento", userDetails.numeroDocumento);
      sessionStorage.setItem("idUsuario", userDetails.id);
      document.getElementById("login").reset();
      window.location.href = "/views/administrador/dashboard.html";
    })
    .catch((error) => {
      if (error.response) {
        if (error.response.status == 403 && error.response.data == "") {
          Swal.fire({
            position: "top-center",
            icon: "error",
            title: "Ya tienes una cuenta registrada",
            showConfirmButton: false,
            timer: 1500,
          });
        } else {
          Swal.fire({
            position: "top-center",
            icon: "error",
            title: error.response.data,
            showConfirmButton: false,
            timer: 1500,
          });
        }
      } else if (error.request) {
        // La solicitud se hizo pero no se recibió respuesta
        console.error("No se recibió respuesta del servidor:", error.request);
        Swal.fire({
          position: "top-center",
          icon: "error",
          title: "Problemas con el servidor   intente más tarde",
          showConfirmButton: false,
          timer: 1300,
        });
      } else {
        alert("error");
        // Ocurrió un error antes de enviar la solicitud
        console.error("Error al enviar la solicitud:", error.message);
        Swal.fire({
          position: "top-center",
          icon: "error",
          title: "Error al registrar" + error.message,
          showConfirmButton: false,
          timer: 1500,
        });
      }
    });
});

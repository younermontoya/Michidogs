document.addEventListener("DOMContentLoaded", async function () {
    const page = document.body.getAttribute("data-page");

    switch (page) {
        case "perfilUsuario":

        obtenerUsuario();

              document.getElementById("actualizarUsuario").addEventListener("submit", function (event) {
                event.preventDefault();
              
                // Muestra un mensaje para verificar que el evento se está capturando
                console.log("Formulario enviado");
              
                const id = sessionStorage.getItem("idUsuario");
                // Obtén los datos del formulario utilizando FormData
              
                const registro = {};
                registro['nombre'] =document.getElementById("nombre").value;
                registro['apellido']=  document.getElementById("apellido").value;
                registro['telefono']=document.getElementById("tel").value;
                registro['username']=document.getElementById("correo").value;
                registro['numeroDocumento']= document.getElementById("numeroDocumento").value;
                registro['estado']="null"
            
                
            
                try {
                    const response =  axios.patch(
                      `http://localhost:8080/user/${id}`,
                      registro,
                    );
                
                    console.log("Producto creado:", response.data);
                    alert("Usuario Actualizado");
                  } catch (error) {
                    alert("Error al crear el producto");
                  }
              
               
              });




            break;
        
            case "perfilProveedor":

            obtenerUsuario();

            document.getElementById("actualizarUsuario").addEventListener("submit", function (event) {
              event.preventDefault();
            
              // Muestra un mensaje para verificar que el evento se está capturando
              console.log("Formulario enviado");
            
              const id = sessionStorage.getItem("idUsuario");
         
            
              const registro = {};
              registro['nombre'] =document.getElementById("nombre").value;
              registro['apellido']=  document.getElementById("apellido").value;
              registro['telefono']=document.getElementById("tel").value;
              registro['username']=document.getElementById("correo").value;
              registro['numeroDocumento']= document.getElementById("numeroDocumento").value;
              registro['estado']="null"
          
              
          
              try {
                  const response =  axios.patch(
                    `http://localhost:8080/user/${id}`,
                    registro,
                  );
              
                  console.log("Producto creado:", response.data);
                  alert("Usuario Actualizado");
                } catch (error) {
                  alert("Error al crear el producto");
                }
            
             
            });


            break;

            case "cargarUsuarios":

                try {
    
                    const tabla = $("#tabla").DataTable();
    
                    const response = await axios.get(`http://localhost:8080/user`);
                    const usuarios = response.data;
                    
                    

                    console.log(usuarios);
    
                    usuarios.forEach((usuario) => {
                        tabla.row
                          .add([
                            usuario.id,
                            usuario.nombre,
                            usuario.apellido,
                            usuario.username,
                            usuario.telefono,
                            usuario.estado,
                            `<button type="button" class="btn btn-primary botonEditar" data-id="${usuario.id}" data-bs-toggle="modal" data-bs-target="#exampleModal">Modificar Estado</button>`,
                          ])
                          .draw();
                      });
                    
              
                      $('#tabla tbody').on('click', '.botonEditar', function () {
                        const usuarioId = $(this).attr('data-id'); 
                        console.log('ID del usuario:', usuarioId);
                        localStorage.setItem("usuarioID",usuarioId);
                        $('#exampleModal').attr('data-usuarioId', usuarioId); 
                      });

            
                  
                  } catch (error) {
                    // console.error('Error al obtener los productos:', error);
                    // alert('Error al obtener los productos');
                  }


                break;


                alert("la buena broo");

                const response = await axios.get("http://localhost:8080/user");
                const productos = response.data;
                console.log(productos);
                const tabla = $("#tabla").DataTable();


                console.log(productos);
              
                // productos.forEach((producto) => {
                //   tabla.row
                //     .add([
                //       producto.id,
                //       producto.nombre,
                //       producto.categoria,
                //       producto.precio,
                //       producto.estado,
                //       producto.cantidad,
                //       producto.proveedor,
                //       `<button type="button" class="btn btn-primary botonEditar" data-id="${producto.id}" data-bs-toggle="modal" data-bs-target="#exampleModal">Modificar Estado</button>`,
                //     ])
                //     .draw();
                // });
              
        
            //     $('#tabla tbody').on('click', '.botonEditar', function () {
            //       const productoId = $(this).attr('data-id'); 
            //       console.log('ID del producto:', productoId);
            //       localStorage.setItem("productoID",productoId);
            //       $('#exampleModal').attr('data-productoId', productoId); 
            //     });
              
            //   } catch (error) {
            //     console.error('Error al obtener los productos:', error);
            //     alert('Error al obtener los productos');
            //   }


            break;
    
        default:
            break;
        

    }
    

})






// Funcion para los perfiles 

async function obtenerUsuario() {
  try {
      const id = sessionStorage.getItem("idUsuario");
      console.log(id);
      const response = await axios.get(`http://localhost:8080/user/${id}`);
      const usuario = response.data;
    // console.log(usuario);  
       document.getElementById("nombre").value=usuario.nombre;
     document.getElementById("apellido").value=usuario.apellido;
     document.getElementById("tel").value=usuario.telefono;
     document.getElementById("correo").value=usuario.username;
     document.getElementById("numeroDocumento").value=usuario.numeroDocumento;
    

      console.log(usuario);



  } catch (error) {
      console.error('Error al obtener el usuario:', error);
      alert('Error al obtener el usuario');
  }
}

document.getElementById("registrarExterno").addEventListener("submit", function (event) {
    event.preventDefault();

    alert("la buena mi so")

    var registro = {}

    var nombre  = document.getElementById("nombre").value;
    var apellido =  document.getElementById("apellido").value;
    var correo = document.getElementById("correo").value;
    var telefono = document.getElementById("telefono").value;
    var estado = document.getElementById("estado").value;
    var rol = document.getElementById("rol").value;
    var documento = document.getElementById("documento").value;
    var tipoDocumento = document.getElementById("tipoDocumento").value;


    registro['username']=correo;
    registro['password']=documento;
    registro['conPassword']=documento;
    registro['nombre']=nombre;
    registro['apellido']=apellido;
    registro['tipoDocumento']=tipoDocumento;
    registro['numeroDocumento']=documento;
    registro['telefono'] = telefono;
    registro['rol'] =  rol;
    registro['estado']=estado;

    console.log(registro);
    axios
    .post("http://localhost:8080/auth/register", registro)
    .then((response) => {
      alert("El registro se creó correctamente");
    })
    .catch((error) => {
      console.error("Error al registrar:", error);
      alert("Ocurrió un error al intentar registrar. Por favor, inténtalo nuevamente.");
    });
  

})

  
document.getElementById("actualizarUser").addEventListener("click",()=>{
    var estado = document.getElementById('estadoUsuario').value;
    var id = localStorage.getItem('usuarioID')
  
    if (confirm("¿Estás seguro de que deseas cambiar el estado?")) {
      axios
        .patch(`http://localhost:8080/user/cambiarEstado/${id}/${estado}`)
        .then((response) => {
          console.log("Respuesta del servidor:", response.data);
          alert("El producto se modificó correctamente");
          window.location.reload();
        })
        .catch((error) => {
          console.error("Error al eliminar el producto:", error);
          alert("Error al eliminar el producto");
        });
    }
})


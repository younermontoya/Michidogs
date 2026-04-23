<?php
  require_once("../../Models/conexion_db.php");
  require_once("../../controllers/productos/verProductos.php");
  require_once("../../controllers/productos/detalles.php");
  require_once("../../Models/consultasProducto.php");
?>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Favicon del sitio -->
    <link rel="icon" href="../../img/logo.png" type="image/x-icon">
    <title>Detalles Productos</title>
     <link rel="stylesheet" href="../../css/detalleProducto.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/componentes/nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
<body>
        
<header>
        <div class="fixed-top navegacionHome">

        <nav class="navbar navbar-expand-lg" style="background-color: #3b3636;">
        <div class="container-fluid">
            <img class="logoNav" src="../../img/logo.png" alt="logo de la empresa">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex rounded-3" method="GET" action="../../controllers/productos/buscar.php">
                    <button class="border-0 iconoBuscador ms-2" type="submit"><i class="bi bi-search"></i></button>
                    <input class="form-control me-2 border-0 shadow-none" type="search" placeholder="Search" name="producto" aria-label="Search">
                </form>
                <div class="ms-auto">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="productos-nav-ul">
                      <!-- Menu compras del cliente  -->
                        <!-- <li class="nav-item" id="comprasCliente" data-index="0">
                            <a href="/" class="nav-link " aria-current="page">Compras</a>
                        </li> -->
                        <li class="nav-item" data-index="0">
                            <a href="../../index.php" class="nav-link " aria-current="page">Home</a>
                        </li>
                        <li class="nav-item" data-index="2">
                            <a href="productos.php" class="nav-link active" id="productos" aria-current="page" style="color: white">Productos</a>
                        </li>
                        <li class="nav-item" data-index="3">
                            <a href="nosotros.php" class="nav-link" aria-current="page">Nosotros</a>
                        </li>
                        <li class="nav-item" data-index="3">
                            <a href="./contacto.php" class="nav-link" aria-current="page">Contacto</a>
                        </li>
                            
                                 <style>
                                    .modal-backdrop {
                                        z-index: 1000; 
                                    }
                                    .card-body{
                                        display: flex;
                                        flex-direction: column;
                                        align-items: start;
                                    }
                                    .btnProd{
                                        background: #FA8516;
                                        border: none;
                                        border-radius: 10px;
                                        padding: 10px;
                                        transition: 0.4s;
                                        color: black;
                                        text-decoration: none !important;
                                    }
                                    .btnProd:hover{
                                        background: #fa8516;
                                        box-shadow: 5px 4px 10px rgba(255, 140, 0, 0.9);
                                        color: #ffffff;
                                    }
                                    .modal-header .modal-title {
                                    text-align: center;
                                    }
                    
                                    
                                </style>
                                
                                <!-- Botón que abre el modal -->
                                <!-- <li id="modal-historial" data-index="4">
                                    <button type="button" class="botonNavInicio" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                                     Historial compra 
                                    </button>
                                </li> -->
                                

                                <!-- Modal -->
                                <!-- <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                               <h4 id="exampleModalLabel">Historial De Compras</h4> 
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"> -->
                                                <!-- Contenido del modal -->
                                                <!-- <div class="card w-100 mb-3">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img src="img/d197f3d63e273b6f5c105412b799eae6.jpeg" class="card-img-top" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h3 class="card-title cartaTit">Ultimos pedidos</h3>                                                                
                                                                <h4>Pedido </h4>
                                                                <p>Cantidad: </p>
                                                                <p>Fecha: </p>
                                                                <p>Hora: </p>
                                                                <p>Total: </p>
                                                                
                                                                <a href="#" type="button" class="btnProd">Volver a pedir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger">CANCELADO</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                       -->
    
    
                        <li class="" id="botonNavInicio">
                            <!-- Button trigger modal -->
                            <button type="button" class="botonNavInicio" data-bs-toggle="modal" data-bs-target="#inicio">
                                Iniciar sesion <img src="https://media.tenor.com/lOJVstiH6AwAAAAi/huella-perrito-patita-footprint.gif" alt="" height="30px" width="30px">
                            </button>  
                        </li> 


                        <!-- <li class="nav-item" id="nombreCliente" data-index="3">
                            Jaime Molina <img src="https://media.tenor.com/lOJVstiH6AwAAAAi/huella-perrito-patita-footprint.gif" alt="" height="30px" width="30px" />
                        </li> -->
    
                    </ul>
                </div>
            </div>
        </div>
    </nav>

            </div>      
      
    </header>

    <main>
        <section id="containerPrincipal">

        <?php
            include_once '../../Controllers/productos/detalles.php'; // Asegúrate de que se incluya solo una vez

            // Obtén el ID del producto de la URL
            $id = isset($_GET['id']) ? $_GET['id'] : null;

            if ($id) {
                ?>
                <section id="containerPrincipal">
                    <?php
                    mostrarProducto($id); // Llama a la función con el ID del producto
                    ?>
                </section>
                <?php
            } else {
                echo "ID de producto no proporcionado.";
            }

        ?>

<h2 class="categorias"> Otros Productos </h2>


        </section>
        <section id="containerParaProductos">
                  <?php
                    cargarProductosDetalle();
                  ?>
        </section>

        


    </main>


    <?php
include ("../componentes/carrito.html");
?>


    <section id="footer-michi">
        
        <footer class="site-footer" id="footer" >
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <h6>Acerca de nosotros</h6>
                <p ></p><i>En Michidogs ,</i> creemos en la importancia de la transparencia y la calidad. Por eso, cada producto que ofrecemos está detallado con especificaciones claras y precisas, asegurando que nuestros clientes tengan una experiencia de compra informada y satisfactoria. <br>
    Nos comprometemos a apoyar a los emprendedores en su camino al éxito, proporcionando una plataforma confiable y eficiente que no solo cumple, sino que supera sus expectativas.</p>
              </div>
    
              <div class="col-xs-6 col-md-3">
                <h6>Categorias</h6>
                <ul class="footer-links">
                  <li><a href="#">Productos</a></li>
                  <li><a href="#">Juguetes</a></li>
                  <li><a href="#">Comida</a></li>
                  <li><a href="#">Snacks</a></li>
                  <li><a href="#">Arena</a></li>
       
                </ul>
              </div>
    
              <div class="col-xs-6 col-md-3">
                <h6>Contacto</h6>
                <ul class="footer-links">
                  <li><a href="#">Sobre MichiDogs</a></li>
                  <li><a href="#">Servicios</a></li>
                  <li><a href="#">Terminos y condiciones</a></li>
                  <li><a href="#">Teléfono: 3236041454</a></li>
                  <li><a href="#">Bogota D.C, Colombia</a></li>
                </ul>
              </div>
            </div>
            <hr>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2026 Derechos reservados by 
             <a href="#">Michidogs</a>.
                </p>
              </div>
    
              <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                  <li><a class="facebook" href="#">
                    <img  width="48" height="48"  src="https://img.icons8.com/ios-glyphs/30/facebook-new.png" alt="Facebook icon">
                    <i class="fa fa-facebook">
  
                    </i></a></li>
                  <li><a class="twitter" href="#">
                    <img width="48" height="48" src="https://img.icons8.com/fluency/48/instagram-new.png" alt="instagram-new"/>
                    <i class="fa fa-twitter"></i></a></li>
                  <li><a class="dribbble" href="#">
                    <img width="48" height="50" src="https://img.icons8.com/color/48/security-checked--v1.png" alt="security-checked--v1"/>
                    <i class="fa fa-dribbble"></i></a></li>  
                </ul>
              </div>
            </div>
          </div>
    </footer>
        </section>
  
        <!-- Modal carrito -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carro de compras</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <!-- Contenido del modal cuando no hay sesión iniciada -->
        <div id="no-session-message" class="d-none">
            <p>Aún no hay una sesión iniciada, por favor ingresa con tu cuenta</p>
            <button 
                type="button" 
                class="botonNavInicio" 
                data-bs-toggle="modal" 
                data-bs-target="#inicio">
                Iniciar sesión 
                <img src="https://media.tenor.com/lOJVstiH6AwAAAAi/huella-perrito-patita-footprint.gif" alt="" height="30px" width="30px">
            </button>
        </div>
        
    </div>
</div>
</div>
</div>


    <!-- Modal inicio sesion  -->

    <div class="modal fade" id="inicio" tabindex="-1" aria-labelledby="inicio" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="headerModal">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <h2><img src="https://static.vecteezy.com/system/resources/previews/009/521/733/non_2x/dog-silhouette-dog-vector.jpg"  height="30px"  width="25px" alt="">Inicio Michidogs</h2>
          <label for="" class="lineaDecorativaHome" ></label>
          <div class="modal-body">
              <form action="../../controllers/cliente/inicioController.php"  id="login"  method="POST">
                  <div class="row">
                    <div class="form-group col-md-12" >
                      <input type="email"  class="form-control inputInicio" required name="usuario" id="email"  placeholder="Email"/>
                    </div>
                    <div class="form-group col-md-12" >
                        <input type="password"  class="form-control inputInicios" required name="contrasena" id="conContrasena"  placeholder="Confirmar Contraseña"/>
                      </div>
                  </div>
                  <label for="" class="linkCuenta"> <a data-bs-toggle="modal" data-bs-target="#recuperarContrasena" >Recuperar Contraseña</a> </label>
                  <button type="submit" class="botonIniciar">Iniciar Sesión</button>
                </form>
                <a class="crearCuenta" data-bs-toggle="modal" data-bs-target="#registro">¿Cliente nuevo?  Crear cuenta </a>
          </div>
      </div>
      </div>
    </div>


    <!--Modal Crear Registro-->

  <div class="modal fade" id="registro" tabindex="-1" aria-labelledby="registro" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      <div class=" Registroheader">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="formularioRegistro" id="formularioRegistro" action="../../controllers/cliente/registroController.php" method="POST" >
          <h2><img src="https://static.vecteezy.com/system/resources/previews/009/521/733/non_2x/dog-silhouette-dog-vector.jpg"  height="30px"  width="25px" alt="">Registro Michidogs</h2>
      <div class="row">
          <div class="form-group col-md-12" >
              <label for="" class="rol">Comprador</label><input type="radio" required name="rol" value='comprador'  id="usuNombre"/>
              <label for="" class="rol">Proveedor</label><input type="radio" required name="rol" value='proveedor' id="usuNombre"/>
            </div>
        <div class="form-group col-md-6">
          <input type="text" class="form-control inputRegistro"  id="usuNombre"  required name="nombre" placeholder="Primer Nombre"/> 
        </div>
        <div class="form-group col-md-6">
          <input type="text" class="form-control inputRegistro" id="usuApellido" required name="apellido" placeholder="Primer Apellido"/>
        </div>
        <div class="form-group col-md-6">
          <input type="number" class="form-control inputRegistro"  id="usuDocumento" required name="documento" placeholder="Documento" />
        </div>
        <div class="form-group col-md-6">
            <select name="tipoDocumento" id="" class="form-control inputRegistro tipDocumento">
              <option value="seleccione">Seleccione tipo documento</option>
              <option value="C.C">Cédula de ciudadanía</option>
              <option value="T.I">Tarjeta de identidad</option>
              <option value="P.S">Pasaporte</option>
            </select>
        </div>
        <div class="form-group col-md-12">
          <input type="number" class="form-control inputRegistro"  id="usuTelefono" required name="telefono" placeholder="Teléfono" />
        </div>
        <div class="form-group col-md-12">
          <input type="text" class="form-control inputRegistro" id="usuCorreo" name="email"  required placeholder="Email"/>
        </div>
        <div class="form-group col-md-12" >
          <input type="password"  class="form-control inputRegistro" id="conPassword" required name="contrasena" placeholder="Contraseña"/>
        </div>
        <div class="form-group col-md-12" >
            <input type="password"  class="form-control inputRegistro" id="conPassword" required name="confirmarContrasena"  placeholder="Confirmar Contraseña"/>
          </div>
          <input type="hidden" name="estado" value="1">
      </div>
      <div class="form-group">
        <div class="form-check">
          <label class="form-check-label" >
            Aceptar Terminos y condiciones
          </label>
           <input  type="checkbox" id="gridCheck"/>
        </div>
      </div>
      <button type="submit" class="botonCrear">Crear Cuenta</button>
    </form>
      </div>
      </div>
  </div>
  </div> 


       <!-- Modal recuperar contraseña -->              


       <div class="modal fade"id="recuperarContrasena"aria-labelledby="exampleModalToggleLabel"tabindex="-1"aria-hidden="true"style="display: none">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="recuperarContrasenaTitle">
              Recuperar contraseña
            </h1>
            <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label class="texto1">Ingrese el correo registrado en la plataforma MichiDogs, recuerda
              que tienes que estar registrado en la plataforma.</label>
              <form action="../../controllers/cliente/recuperarContrasena.php" method="POST">
            <br />
            <br />
            <input class="emailRecuperar" type="email" name="usu_correo"/>
          </div>
          <br />
          <div class="modal-footer recuperar">
            <button class="btn btn-primary sendEmail"data-bs-target="#recuperarContrasena2"data-bs-toggle="modal" type="submit" value="Enviar">
              Enviar correo
            </button>
          </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade"id="recuperarContrasena2"aria-labelledby="exampleModalToggleLabel2"tabindex="-1"aria-hidden="true"style="display: none">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="recuperarContrasenaTitle">
              MichiDogs
            </h1>
            <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label class="texto2">Se envio al correo una contraseña temporal, revisa el correo para
            iniciar sesión</label>
          </div>
          <div class="modal-footer regresar">
            <button class="btn btn-primary return"data-bs-target="#inicio"data-bs-toggle="modal">Regresar</button>
          </div>
        </div>
      </div>
    </div>




        <!-- <script>
        // MOSTRAR EL MODAL CON LA INFORMACION SELECCIONADA
        function mostrarModal(idProducto, nombreProducto, precioProducto, imagenProducto) {
            var modalTitle = document.getElementById('exampleModalLabel');
            modalTitle.textContent = nombreProducto;

            var productImage = document.querySelector('.product-image img');
            productImage.src = imagenProducto;

            var productTitle = document.querySelector('.product-title h4');
            productTitle.textContent = nombreProducto;

            var productPrice = document.querySelector('.product-price');
            productPrice.textContent = "$ " + precioProducto;

            var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();
        }
        </script> -->
<!-- 
        <script>
          //ELIMINAR PRODUCTO DEL CARRITO DE COMPRAS
            document.addEventListener("DOMContentLoaded", function() {     
                var removeButtons = document.querySelectorAll(".remove-product");       
                removeButtons.forEach(function(button) {
                    button.addEventListener("click", function() {             
                        var product = button.closest(".product");            
                        product.remove();
                    });
                });
            });
        </script> -->




            
          <script src="../../js/carritoIndex.js"></script>
          <script src="../../js/mostrarModalCarrito.js"></script>

            <script src="jquery-3.7.1.min.js"></script>
            <script src="../../js/detalleProducto.js" ></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

            <!-- <script src="script/script.js"></script>
            <script src="js/script.js"></script> -->

            <!-- SCRIPT DEL NAV -->
            <script>
            document.addEventListener("DOMContentLoaded", function() {
                const navLinks = document.querySelectorAll('.nav-link');
                
                navLinks.forEach(link => {
                    link.addEventListener('click', function(event) {
                        navLinks.forEach(link => link.classList.remove('active')); // Remover clase activa de todos los enlaces
                        this.classList.add('active'); // Añadir clase activa al enlace clicado
                    });
                });
            });
            </script>
        </body>

        </html>


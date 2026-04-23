<?php
require_once ("../../Models/conexion_db.php");
require_once ("../../Models/consultasUsuario.php");
require_once("../../Models/consultasProducto.php");
require_once("../../controllers/productos/verProductos.php");
require_once("../../controllers/productos/filtrarCategoria.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!-- Favicon del sitio -->
  <link rel="icon" href="../../img/logo.png" type="image/x-icon">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (necesario para los modales) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  
  <title>MichiDogs</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="../../css/index.css" />
  <link rel="stylesheet" href="../../css/productosUsuario.css" />
  <link rel="stylesheet" href="../../css/componentes/nav.css" />
  <link rel="stylesheet" href="../../css/detalleProducto.css">
  <link rel="stylesheet" href="../../css/stylesCarro.css">
</head>

<body data-page="verProductosCliente">
  <header>
    <div class="navHome fixed-top">
      <!-- Navbar --->

      <nav class="navbar navbar-expand-lg" style="background-color: #3b3636;">
        <div class="container-fluid">
          <img class="logoNav" src="../../img/logo.png" alt="logo de la empresa">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="d-flex rounded-3" method="GET" action="../../controllers/productos/buscar.php">
                    <button class="border-0 iconoBuscador ms-2" type="submit"><i class="bi bi-search"></i></button>
                    <input class="form-control me-2 border-0 shadow-none" type="search" placeholder="Search" name="producto" aria-label="Search">
                </form>
            <div class="ms-auto">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="productos-nav-ul">
                <!-- Boton compras del cliente -->
                <!-- <li class="nav-item" id="comprasCliente" data-index="0">
                            <a href="/" class="nav-link " aria-current="page">Compras</a>
                        </li> -->
                <li class="nav-item" data-index="0">
                  <a href="../../index.php" class="nav-link " aria-current="page">Home</a>
                </li>
                <li class="nav-item" data-index="2">
                  <a href="./productos.php" class="nav-link active" id="productos" aria-current="page">Productos</a>
                </li>
                <li class="nav-item" data-index="3">
                  <a href="./nosotros.php" class="nav-link" aria-current="page">Nosotros</a>
                </li>
                <li class="nav-item" data-index="3">
                  <a href="./contacto.php" class="nav-link" aria-current="page">Contacto</a>
                </li>

                <style>
                  .modal-backdrop {
                    z-index: 1000;
                  }

                  .card-body {
                    display: flex;
                    flex-direction: column;
                    align-items: start;
                  }

                  .btnProd {
                    background: #FA8516;
                    border: none;
                    border-radius: 10px;
                    padding: 10px;
                    transition: 0.4s;
                    color: black;
                    text-decoration: none !important;
                  }

                  .btnProd:hover {
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
                    Iniciar sesion <img
                      src="https://media.tenor.com/lOJVstiH6AwAAAAi/huella-perrito-patita-footprint.gif" alt=""
                      height="30px" width="30px">
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
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item carouselHeader active">
          <img
            src="https://img.freepik.com/vector-gratis/portada-facebook-cuidado-mascotas-diseno-plano_23-2149648220.jpg?t=st=1725282739~exp=1725286339~hmac=c9e69950fd40a45192671effe4fa4f10e54764939cc3e93c06ab4c5117b9b135&w=1380"
            class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item carouselHeader">
          <img
            src="https://img.freepik.com/vector-gratis/portada-facebook-cuidado-mascotas-diseno-plano_23-2149648220.jpg?t=st=1725282739~exp=1725286339~hmac=c9e69950fd40a45192671effe4fa4f10e54764939cc3e93c06ab4c5117b9b135&w=1380"
            class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item carouselHeader">
          <img
            src="https://img.freepik.com/vector-gratis/portada-facebook-cuidado-mascotas-diseno-plano_23-2149648220.jpg?t=st=1725282739~exp=1725286339~hmac=c9e69950fd40a45192671effe4fa4f10e54764939cc3e93c06ab4c5117b9b135&w=1380"
            class="d-block w-100" alt="..." />
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <i class="bi bi-arrow-left-circle"></i>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <i class="bi bi-arrow-right-circle"></i>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </header>
  <main>
    <section class="categoriaProductos">
      <div class="categoriaPerro">
        <img height="120px" width="120px" src="https://cdn.pixabay.com/photo/2023/10/19/12/42/logo-8326598_1280.jpg"
          alt="" />
      </div>
      <span>AQUI ENCONTRARÁS LOS MEJORES <br />
        PRODUCTOS PARA TUS MASCOTAS</span>
      <div class="categoriaGato">
        <img height="120px" width="120px"
          src="https://cdn.pixabay.com/photo/2023/11/08/19/17/ai-generated-8375638_1280.jpg" alt="" />
      </div>
    </section>

    <div class="container">
      <div class="row" id="card-container">
        <!-- Las tarjetas se cargarán aquí dinámicamente -->

  <?php
    // Obtener la categoría desde la URL o establecer un valor por defecto
    $categoria = isset($_GET['categoria']) ? intval($_GET['categoria']) : 0;

    // Llamar a la función para mostrar los productos
    mostrarProductosPorCategoria($categoria);
  ?>




      </div>

      <!-- Paginador -->
      <div class="pagination-container">
        <nav aria-label="Page navigation">
          <ul class="pagination" id="pagination">
            <!-- Paginador se generará dinámicamente aquí -->
          </ul>
        </nav>
      </div>
    </div>
  </main>

  <!-- MODAL DETALLES PRODUCTOS -->
  <!-- 
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles Del Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                  <section id="containerPrin">
                      <div class="containerSecundario">   
                          <div  class="row">
                              <div class="col-md-2 tresPequeños">      
                                      <div class="mb-2">
                                          <img src="img/420_5f6fc5558216f.png" alt="" class="small-image">
                                      </div>
                                      <div class="mb-2">
                                          <img src="img/20201347.webp"alt="" class="small-image">
                                      </div>
                                      <div class="mb-2">
                                          <img src="img/420_5f6fc554e7397.jpg"  alt="" class="small-image">
                                      </div>     
                              </div> 
          
                                  <div class="col-md-2 contenedorImagen ">
                                      
                                      <img  src="img/20200429.webp" alt="" class="imagenPrin">
                                      
                                  </div>
          
                                  <div class="col-md-3 textosProducto" >
                                      <div class="mb-2 informacionSuperior">
                                          <h1>Nombre Del Producto</h1>
                                          <span id="nombreProducto"></span>
                                          <h2>Marca: </h2>
                                          <small>Precio</small> <br>
                                          <span id="precioProducto"></span>
                                      </div>
                                      <div class="mb-2 informacionInferior">
                                          <small>Disponible</small> <br>
                                          <span>Si</span>
                                      
                                      </div>              
                                  </div>
                         
          
                                  <div class="DetallesProducto">
                                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                                          <li class="nav-item" role="presentation">
                                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Descripción</button>
                                          </li>
                                          <li class="nav-item" role="presentation">
                                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Beneficios</button>
                                          </li>
                                      </ul>
                                      <div class="tab-content" id="myTabContent">
                                          <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"> <strong>olaaaaaaaa</strong> </div>
                                          <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"> <strong> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam dolore obcaecati nesciunt iste tempore ducimus molestias quam vel nostrum cum.</strong></div>
                                      </div>   
                                 </div>            
                      </div>
                  </div>
              </section>  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </div>
        </div> -->


  <!-- MODAL CARRO DE COMPRAS -->
  <!-- <section id="modal-carro">
       
              <div id="carrito">
                  <button type="button" class="button-container botonVerC" id="comprar-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <label for=""  id="cantidadProductos">0</label>
                    <img src="https://img.icons8.com/?size=100&id=QYui14mmaQ0R&format=png&color=000000" alt="shopaholic">
                  </button>
            </div>
             -->

  <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Carrito de compra</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body modalCompra">
                    <div class="cart-item ocultar">
                      <div class="row productoCarrito">
                        <div class="col-3">
                          <img src="https://via.placeholder.com/100" alt="product-image" class="img-fluid" height="100px" width="100px">
                        </div>
                        <div class="col-5">
                          <h5 class="nombreProducto">Nombre del Producto</h5>
                          <p class="precio precioProducto" id="idPrecio_99">Precio: $0</p>
                          <p class="precio ocultar idPrecioFijo" id="idPrecioFijo_99">Precio: $0</p>
                        </div>
                        <div class="col-1">
                          <label for="" class="label can" id="idCantidad_99">1</label>
                        </div>
                        <div class="col-1">
                          <button class="btn-increment" id="idMas_99" >+</button>
                        </div>
                        <div class="col-1">
                          <button class="btn-decrement" id="idMenos_99">-</button> 
                        </div>
                      </div>
                    </div>

                    <div class="totalModal">
                      <div class="row productoCarrito total">
                        <div class="col-7">
                          <h5>Precio total: </h5>
                        </div>
                        <div class="col-5">
                          <label for=""  class="labelCantidad" id="cantidaTotal">0</label>
                        </div>
                      </div>
                    </div>


                  </div>
                  <div class="modal-footer">
                     -->

  <!-- boton -->
  <!-- <div class="conetenedorCompra">
                          <a href="/views/componentes/wizzard.html"> <button type="submit" class="botonComprar">Realizar Compra</button></a>

                     </div>
                      -->


  </div>
  </div>
  </div>
  </div>

  </section>


     <!-- MODAL CARRO DE COMPRAS -->



     <?php 
     include ("../componentes/carrito.html");
     ?>
     
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



  <!--Footer -->
  <section id="footer-michi">

    <footer class="site-footer" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Acerca de nosotros</h6>
            <p></p><i>En Michidogs ,</i> creemos en la importancia de la transparencia y la calidad. Por eso, cada
            producto que ofrecemos está detallado con especificaciones claras y precisas, asegurando que nuestros
            clientes tengan una experiencia de compra informada y satisfactoria. <br>
            Nos comprometemos a apoyar a los emprendedores en su camino al éxito, proporcionando una plataforma
            confiable y eficiente que no solo cumple, sino que supera sus expectativas.</p>
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
                  <img width="48" height="48" src="https://img.icons8.com/ios-glyphs/30/facebook-new.png"
                    alt="Facebook icon">
                  <i class="fa fa-facebook">

                  </i></a></li>
              <li><a class="twitter" href="#">
                  <img width="48" height="48" src="https://img.icons8.com/fluency/48/instagram-new.png"
                    alt="instagram-new" />
                  <i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#">
                  <img width="48" height="50" src="https://img.icons8.com/color/48/security-checked--v1.png"
                    alt="security-checked--v1" />
                  <i class="fa fa-dribbble"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </section>
  


    <!-- ruedita de carga -->
            <div id="loading" class="loading"><img src="../../img/ruedita_carga.gif" alt="rueda de carga" height="100px" width="100px"></div>

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
                      <label for="" class="rol">Comprador</label><input type="radio" required name="rol" value='ADMIN'  id="usuNombre"/>
                      <label for="" class="rol">Proveedor</label><input type="radio" required name="rol" value='PROVEEDOR' id="usuNombre"/>
                    </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control inputRegistro"  id="usuNombre"  required name="nombre" placeholder="Primer Nombre"/> 
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control inputRegistro" id="usuApellido" required name="apellido" placeholder="Primer Apellido"/>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control inputRegistro"  id="usuDocumento" required name="numeroDocumento" placeholder="Documento" />
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
                  <input type="phone" class="form-control inputRegistro"  id="usuTelefono" required name="telefono" placeholder="Teléfono" />
                </div>
                <div class="form-group col-md-12">
                  <input type="email" class="form-control inputRegistro" id="correo" name="username"  required placeholder="Email"/>
                </div>
                <div class="form-group col-md-12" >
                  <input type="password"  class="form-control inputRegistro"  required name="password" placeholder="Contraseña"/>
                </div>
                <div class="form-group col-md-12" >
                    <input type="password"  class="form-control inputRegistro" id="conPassword" required name="conPassword"  placeholder="Confirmar Contraseña"/>
                  </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label" >
                    Aceptar Terminos y condiciones
                  </label>
                  <input  type="checkbox" id="gridCheck"/>
                </div>
              </div>
              <button type="submit" class="botonCrear ">Crear Cuenta</button>
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
            <input class="emailRecuperar" type="email" name="usu_correo" />
          </div>
          <br />
          <div class="modal-footer recuperar"  style=" border:-50px; margin-top: -50px; margin-bottom: 35px; display: inline-block; justify-content: center; align-items: center; margin-left: -55px; ">
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
            <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close" ></button>
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

    

    <script src="../../js/carritoIndex.js" ></script>
    <script src="../../js/validacionRegistro.js"></script>
    <script src="../../js/carritoProductos.js" ></script>
    <script src="../../js/carrito.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="../../js/main.js"></script>
  <!-- <script src="../../js/carrito.js" ></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <!-- <script src="./js/componentes/navbar.js" defer></script> -->
  <!-- <script src="./js/gestionarProductos.js"></script> -->
  <!-- <script src="./js/detalleProducto.js"></script> -->
  <!-- SCRIPT DEL NAV -->
  <script>
      document.addEventListener("DOMContentLoaded", function() {
          const navLinks = document.querySelectorAll('.nav-link');
          
          navLinks.forEach(link => {
              link.addEventListener('click', function(event) {
                  navLinks.forEach(link => link.classList.remove('active')); 
                  this.classList.add('active'); 
              });
          });
      });
      </script>

</body>

</html>
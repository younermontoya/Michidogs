<?php
require_once("Models/conexion_db.php");
require_once("Models/consultasUsuario.php");
require_once("Models/consultasProducto.php");
require_once("controllers/productos/verProductos.php");
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Favicon del sitio -->
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <title>MichiDogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/stylesCarro.css">
    <link rel="stylesheet" href="css/componentes/nav.css">
    
</head>
<body data-page="verProductosIndex">

    <header>
        <div class="navHome fixed-top">
          
    <nav class="navbar navbar-expand-lg" style="background-color: #3b3636;">
        <div class="container-fluid">
            <img class="logoNav" src="./img/logo.png" alt="logo de la empresa">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex rounded-3" method="GET" action="controllers/productos/buscar.php">
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
                            <a href="./index.php" class="nav-link active" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item" data-index="1">
                            <a href="views/users/productos.php" class="nav-link" id="productos" aria-current="page">Productos</a>
                        </li>
                        <li class="nav-item" data-index="2">
                            <a href="views/users/nosotros.php" class="nav-link" aria-current="page">Nosotros</a>
                        </li>
                        <li class="nav-item" data-index="3">
                            <a href="views/users/contacto.php" class="nav-link" aria-current="page">Contacto</a>
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
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item  carouselHeader  active">
                <img src="https://img.freepik.com/vector-gratis/diseno-plantilla-tienda-mascotas-dibujada-mano_23-2150339791.jpg?t=st=1725282712~exp=1725286312~hmac=9f83da90fad7eb2bb4f2096c1a0053687cd58fdf4bc17e459f6fe340a272b664&w=1380" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item carouselHeader ">
                <img src="https://img.freepik.com/vector-gratis/portada-facebook-cuidado-mascotas-diseno-plano_23-2149648220.jpg?t=st=1725282739~exp=1725286339~hmac=c9e69950fd40a45192671effe4fa4f10e54764939cc3e93c06ab4c5117b9b135&w=1380" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item carouselHeader ">
                <img src="https://img.freepik.com/vector-gratis/plantilla-tienda-mascotas-dibujada-mano_23-2150404420.jpg?t=st=1725283147~exp=1725286747~hmac=b85bba2ac9e406f6c53c5a08b7329b81f54e0602b51bbf146b2ecbc01308ee56&w=1380" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <i class="bi bi-arrow-left-circle"></i>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <i class="bi bi-arrow-right-circle"></i>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </header>

    
    <main>
    <section class="categorias">
    <h3>Categorias</h3>
    <div class="imgCaegorias">
        <ul id="lista-productos">
            <li>
                <a id="Juguetes" href="views/users/productosFiltro.php?categoria=1">
                    <img src="img/juguete-para-perro4-768x768.jpg" alt="">
                </a>
                <h5>Juguetes</h5>
            </li>
            <li>
                <a id="Accesorios" href="./views/users/productosFiltro.php?categoria=2">    
                    <img src="img/9d64f0a8c9d3d208f9b31eb63df2d7f7.jpg" alt="">
                </a>
                <h5>Accesorios</h5>
            </li>
            <li>
                <a id="Alimento" href="./views/users/productosFiltro.php?categoria=3">
                    <img src="img/comida.jpg" alt="">
                </a>
                <h5>Alimento</h5>
            </li>
            <li>
                <a id="Snacks" href="./views/users/productosFiltro.php?categoria=4">
                    <img src="img/snacks.jpg" alt="">
                </a>
                <h5>Snacks</h5>
            </li>
            <li>
                <a id="Medicina" href="./views/users/productosFiltro.php?categoria=5">
                    <img src="img/medicina.jpg" alt="">
                </a>
                <h5>Medicina</h5>
            </li>
        </ul>
    </div>
</section>

        
        <label for="" class="lineaDecorativaHome"></label>

        <section class="containerInformacion">
          <h3>Encuentra todo para tus mascotas en un mismo lugar</h3>
          <div class="informacion">
              <li>
                  <a href="#ContraEntrega">
                    <img src="img/pagocontraentrega.jpg" alt="">
                </a>   
                <h4>Pago contra entrega</h4>
                <h5>Ofrecemos pago contra entrega en todo el pais,</h5>
                <h5>pagas al recibir para una mejor experiencia.</h5>
              </li>
              <li>
                  <a href="#entregasMismoDia">
                    <img src="img/entregaProductos.jpg" alt="">
                </a>   
                <h4>Entregas el mismo dia</h4>
                <h5>Paga y recibe tu producto el mismo dia si te <h5>
                <h5>encuentras en la ciudad de Bogotá.</h5>
              </li>
              <li>
                <a href="views/users/nosotros.html">    
                  <img src="img/logo.png" alt="">
               </a>   
               <h4>Todo lo que necesitas</h4>
               <h5>Ofrecemos una gran variedad de productos, <h5>
               <h5>para el cuidado de tu mascota.</h5>
              </li>
            </ul>
          </div>
        </section>
        <br>
        <label for="" class="lineaDecorativaHome"></label>

        <section class="containerProductosHome">
          <div class="container mt-4">
            <h3 class=" decoracionTitulo">Nuestros Productos</h3>   
            <div id="productCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
                <div id="carousel-inner" class="carousel-inner">
                  
                  <?php
                    cargarIndex();
                  ?>

                </div>
                <a class="carousel-control-prev flechasProductos" href="#productCarousel" role="button" data-bs-slide="prev">
                    <i class="bi bi-arrow-left-square"></i>
                </a>
                <a class="carousel-control-next flechasProductos" href="#productCarousel" role="button"  data-bs-slide="next">
                    <i class="bi bi bi-arrow-right-square"></i>
                </a>
            </div>
           </div>

        </section>

        <label for="" class="lineaDecorativaHome"></label>

        <section class="pagosyEntregas">
          <div id="ContraEntrega" class="contraEntrega" >
            <h3>Informacion de pago contra entrega</h3>
            <p>En nuestra página web, ofrecemos la opción de pago contra entrega para clientes en toda Colombia. Esto significa que puedes realizar tu pedido de productos para perros y gatos y pagar en efectivo al momento de recibirlo en la comodidad de tu hogar. Este método de pago es conveniente y seguro, ya que te permite verificar los productos antes de realizar el pago. Además, garantizamos la calidad de nuestros productos y el cumplimiento de las entregas en todas las ciudades y regiones del país.</p>
           <h5>¡ Compra con confianza y comodidad en nuestra tienda en línea para consentir a tus mascotas !</h5>
           <img src="img/entregaaaa.jpg" alt="">
        </div>
        <div id="entregasMismoDia" class="entregas">
          <h3>Informacion de entregas el mismo dia</h3>
          <p>¡Entregas el mismo día en Bogotá para consentir a tus mascotas al máximo! Si realizas tu pedido antes de las [hora límite], tus productos llegarán a tu puerta en el transcurso del día. Este servicio exclusivo está diseñado para que tus peludos amigos disfruten rápidamente de sus nuevos juguetes, comida y accesorios. Por el momento, las entregas el mismo día solo están disponibles en la ciudad de Bogotá.</p>
          <h5>¡Haz clic ahora para consentir a tu mascota sin esperas!</h5>
          <img src="img/entregasDia.jpg" alt="">
        </div>

        </section>


                      <!-- MODAL CARRO DE COMPRAS -->
            <!-- <section id="modal-carro">
                              <div id="carrito">
                                  <button type="button" class="button-container botonVerC" id="comprar-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <label for=""  id="cantidadProductos">0</label>
                                    <img src="https://img.icons8.com/?size=100&id=QYui14mmaQ0R&format=png&color=000000" alt="shopaholic">
                                  </button>
                            </div> -->
                                                      
                            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5 titulo" id="exampleModalLabel">Carrito de compra</h1>
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
                                        <div>
                                          <button class="btn-delete">Eliminar</button>
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
                                  <div class="modal-footer" id="carrito"> -->
                                    

                                    <!-- boton -->
                                     <!-- <div class="conetenedorCompra">
                                          <a href="/views/componentes/wizzard.html"> <button type="submit" class="botonComprar">Realizar Compra</button></a>
                                     </div> -->
                                     
                
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            
              </section> 

          
            <!-- MODAL CARRO DE COMPRAS -->

                  <?php 
                  include("views/componentes/carrito.html");
                  ?>

  
<!-- Modal para productos -->
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

    </main>
    <!-- ruedita de carga -->
    <div id="loading" class="loading"><img src="img/ruedita_carga.gif" alt="rueda de carga" height="100px" width="100px"></div>

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
              <form action="Controllers/cliente/inicioController.php"  id="login"  method="POST">
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
      <form class="formularioRegistro" id="formularioRegistro" action="./Controllers/cliente/registroController.php" method="POST" >
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
          <input type="email" class="form-control inputRegistro" id="usuCorreo" name="email"  required placeholder="Email"/>
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
              <form action="controllers/cliente/recuperarContrasena.php" method="POST">
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




        <!-- Modal Detalles Del Producto -->
<div class="modal fade " id="ModalDetalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles Del Producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <section id="containerPrincipal">
                <div class="container">   
                    <div  class="row">
                        <div class="col-md-2 tresPeques">      
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
    
                            <div class="col-md-2 imagenYOU ">
                                
                                <img  src="img/20200429.webp" alt="" class="imagenPrincipal">
                                
                            </div>
    
                            <div class="col-md-3 textosPro" >
                                <div class="mb-2 infoSuperior">
                                    <h1>Nombre Producto</h1>
                                    <h2>Marca: </h2>
                                    <small>Precio</small> <br>
                                    <span>$50.000</span>
                                </div>
                                <div class="mb-2 infoInferior">
                                    <small>Disponible</small> <br>
                                    <span>Si</span>
                                
                                </div>              
                            </div>
                   
    
                            <div class="Detalles">
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
  </div>


  <script src="js/validacionRegistro.js"></script>
  <script src="js/carritoIndex.js" ></script>
  <script src="js/carrito.js"></script>


  <!-- <script src="/js/gestionarProductos.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script src="js/componentes/navbar.js" ></script> -->
    <script src="./script/script.js"></script>
    <script src="./js/script.js"></script>
  <script>
      $('#lista-productos a').click(function() {
          var id = $(this).attr('id');
          if(id=="Accesorios"){
            sessionStorage.setItem('categoria', id);
          }else if(id=="Medicina"){
            sessionStorage.setItem('categoria',id);
          }else if(id=="Alimento"){
            sessionStorage.setItem('categoria', id);
          }else if(id =="Snacks"){
            sessionStorage.setItem('categoria', id);
          }else{
            sessionStorage.setItem('categoria', id);
          }
          sessionStorage.setItem('tipo_mascota', 'tipoMascota');
          
      });
 
  </script>
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
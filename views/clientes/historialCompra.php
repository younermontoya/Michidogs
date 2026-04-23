<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasUsuario.php");
require_once("../../Models/consultasProducto.php");
require_once("../../controllers/productos/verProductosCliente.php");
require_once('../../controllers/cliente/mostrarPerfilC.php');
require_once ("../../Models/ConsultasAdmin.php");
require_once ("../../Models/historial_pedido.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Favicon del sitio -->
     <link rel="icon" href="../../img/logo.png" type="image/x-icon">
    <title>MichiDogs</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!-- Bootstrap icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!-- Bootstrap icons -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- mi css -->
    <link rel="stylesheet" href="../../css/section-carousel.css">
    <link rel="stylesheet" href="../../css/style-destacadas.css">

    <!-- Sliky and AOS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/contacto.css">
    <link rel="stylesheet" href="../../css/componentes/nav.css">
    <link rel="stylesheet" href="../../css/historial-compra.css">
</head>

<body>

    <header>
        <div class="navHome fixed-top">
        <!-- Navbar --->
        <nav class="navbar navbar-expand-lg" style="background-color: #3b3636;">
        <div class="container-fluid">
            <img class="logoNav" src="../../img/logo.png" alt="logo de la empresa">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex rounded-3">
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
                            <a href="home.php" class="nav-link " aria-current="page">Home</a>
                        </li>
                        <li class="nav-item" data-index="1">
                            <a href="productosC.php" class="nav-link" id="productos" aria-current="page">Productos</a>
                        </li>
                        <li class="nav-item" data-index="3">
                            <a href="contactoC.php" class="nav-link" aria-current="page">Contacto</a>
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
    
    
                       <div class="dropdown quit">
                        
                        <button class="btn btn-secondary dropdown-toggle cerrarSesion" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img width="25" height="25" src="https://img.icons8.com/ios-filled/50/user-male-circle.png" alt="user-male-circle"/>
                        <?PHP
                              cargarPerfil()
                          ?> 
                      </button>
                        <ul class="dropdown-menu dropdown-menu-dark active">
                        <li><a class="dropdown-item profile" href="editarPerfil.php">Editar perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item profile" href="../../controllers/administrador/cerrarSesion.php">Cerrar sesión</a></li>
                        </ul>
                      </div>


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

<!-- CONTENIDO DE CONTACTO -->
                                    
    <main>                       
      
    
  
    <section id="historial-compra">
  <!-- User Profile -->
  <div class="user-profile py-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent text-center">
              <img width="94" height="94" src="https://img.icons8.com/3d-fluency/94/shopping-cart-loaded.png" alt="shopping-cart-loaded"/>
            </div>
            <div class="card-body" style="align-items:center">
              <div class="card card-body shadow-sm border-0 mb-3" style="background: #f5f1ec;">
                <h3 style="color:#fa8516;" class="text-center mb-0">MIS PEDIDOS</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <!-- Estado de pedido -->
          <div class="card shadow-sm mb-3">
            <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Estado de pedido</h3>
            </div>
            <div class="card-body pt-0">
              <table class="table table-bordered">
                <tr class="bg-light">
                  <th>Id</th>
                  <th>Fecha_pedido</th>
                  <th>Dirección</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Telefono</th>
                  <th>Total precio</th>
                  <th>Estado</th>
                  <th>Archivo</th>
                </tr>
                <?php if (isset($error)): ?>
                  <tr>
                    <td colspan="9"><?php echo htmlspecialchars($error); ?></td>
                  </tr>
                <?php else: ?>
                  <?php $found_estado_pedido = false; ?>
                  <?php $carritos_mostrados = []; ?>
                  <?php foreach ($result as $row): ?>
                    <?php
                    if (!in_array($row["carrito_id"], $carritos_mostrados)) {
                      if ($row["carrito_estado"] == 'En Proceso' || $row["carrito_estado"] == 'Cancelado' || $row["carrito_estado"] == 'Completado') {
                        $found_estado_pedido = true;
                        $carritos_mostrados[] = $row["carrito_id"];
                    ?>
                      <tr>
                        <td><?php echo htmlspecialchars($row["carrito_id"]); ?></td>
                        <td>
                          <?php 
                          $fecha_formateada = date('Y:m:d H:i', strtotime($row["fecha_venta"]));
                          echo htmlspecialchars($fecha_formateada); 
                          ?>
                        </td>
                        <td><?php echo htmlspecialchars($row["direccion"]); ?></td>
                        <td><?php echo htmlspecialchars($row["pro_nombre"]); ?></td>
                        <td><?php echo htmlspecialchars($row["cantidad_product"]); ?></td>
                        <td><?php echo htmlspecialchars($row["telefono"]); ?></td>
                        <td><?php echo htmlspecialchars($row["precio_product"]); ?></td>
                        <td>
                          <?php
                            switch ($row["carrito_estado"]) {
                              case 'En Proceso':
                                echo '<span class="badge badge-warning" style="color:#f29721;  ">En Proceso</span>';
                                break;
                              case 'Completado':
                                echo '<span class="badge badge-success" style="color:green";>Completado</span>';
                                break;
                              case 'Cancelado':
                                echo '<span class="badge badge-danger" style="color:red";>Cancelado</span>';
                                break;
                            }
                          ?>
                        </td>
                        <td>
                          <a href="pdf_pedido.php?carrito_id=<?php echo htmlspecialchars($row['carrito_id']); ?>" class="btn btn-sm btn-success" style="background: #fa8516; border:none;">PDF</a>
                        </td>
                      </tr>
                    <?php
                      }
                    }
                    ?>
                  <?php endforeach; ?>
                  <?php if (!$found_estado_pedido): ?>
                    <tr>
                      <td colspan="9">No tienes pedidos realizados.</td>
                    </tr>
                  <?php endif; ?>
                <?php endif; ?>
              </table>
            </div>
          </div>
          <!-- Historial de pedido -->
       <div class="card shadow-sm mb-3">
    <div class="card-header bg-transparent border-0">
        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Historial de compras</h3>
    </div>
    <div class="card-body pt-0">
        <table class="table table-bordered">
            <tr class="bg-light">
                <th>Id</th>
                <th>Fecha_pedido</th>
                <th>Dirección</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Telefono</th>
                <th>Total precio</th>
                <th>Compra</th>
            </tr>
            <?php if (isset($error)): ?>
                <tr>
                    <td colspan="8"><?php echo htmlspecialchars($error); ?></td>
                </tr>
            <?php else: ?>
                <?php if (!empty($result)): ?>
                    <?php foreach ($result as $row): ?>
                        <?php if ($row["carrito_estado"] == 'Completado'): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row["carrito_id"]); ?></td>
                                <td>
                                    <?php 
                                    $fecha_formateada = date('Y:m:d H:i', strtotime($row["fecha_venta"]));
                                    echo htmlspecialchars($fecha_formateada); 
                                    ?>
                                </td>
                                <td><?php echo htmlspecialchars($row["direccion"]); ?></td>
                                <td><?php echo htmlspecialchars($row["productos"]); ?></td>
                                <td><?php echo htmlspecialchars($row["cantidades"]); ?></td>
                                <td><?php echo htmlspecialchars($row["telefono"]); ?></td>
                                <td><?php echo htmlspecialchars($row["subtotal_total"]); ?></td>
                                <td>
                                    <a href="./productosC.php" class="btn btn-sm" style="background: #fa8516; border:none; color:white; text-decoration:none; display:inline-block; padding:5px 10px; text-align:center;">Volver a pedir</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No tienes compras completadas.</td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>
        </table>
    </div>
</div>
  <!-- /User Profile -->
</section>

      
    </main>



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
            <!-- <div id="loading" class="loading"><img src="/img/ruedita_carga.gif" alt="rueda de carga" height="100px" width="100px"></div> -->

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
                  <input type="text" class="form-control inputRegistro" id="correo" name="username"  required placeholder="Email"/>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   


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

      <!-- SCRIPT DE EDITAR PERFIL -->
      <script>

      $('.form').find('input, textarea').on('keyup blur focus', function (e) {
        
        var $this = $(this),
            label = $this.prev('label');

            if (e.type === 'keyup') {
                  if ($this.val() === '') {
                label.removeClass('active highlight');
              } else {
                label.addClass('active highlight');
              }
          } else if (e.type === 'blur') {
              if( $this.val() === '' ) {
                  label.removeClass('active highlight'); 
                  } else {
                  label.removeClass('highlight');   
                  }   
          } else if (e.type === 'focus') {
            
            if( $this.val() === '' ) {
                  label.removeClass('highlight'); 
                  } 
            else if( $this.val() !== '' ) {
                  label.addClass('highlight');
                  }
          }

      });

      $('.tab a').on('click', function (e) {
        
        e.preventDefault();
        
        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');
        
        target = $(this).attr('href');

        $('.tab-content > div').not(target).hide();
        
        $(target).fadeIn(600);
        
      });
      </script>
      

    <script src="js/app.js"></script>


    </body>

    </html>
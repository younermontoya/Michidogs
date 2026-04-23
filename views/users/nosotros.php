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
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/componentes/nav.css">
    <link rel="stylesheet" href="../../css/section-carousel.css">
    <link rel="stylesheet" href="../../css/style-destacadas.css">

    <!-- Sliky and AOS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    
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
                        <li class="nav-item" data-index="1">
                            <a href="./productos.php" class="nav-link" id="productos" aria-current="page">Productos</a>
                        </li>
                        <li class="nav-item" data-index="2">
                            <a href="./nosotros.php" class="nav-link active" aria-current="page">Nosotros</a>
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
    <section class="carousel-section">
        <article class="carousel__sections-cards container">
            <div class="section__card show">
                <div class="section__card-content">
                    <h1 class="section__card-title">Quienes somos!</h1>
                    <p class="section__card-text">Somos una tienda virtual que se especializa en la venta de productos para mascotas, nacimos como un emprendimiento de cinco personas donde nos enfocamos en ofrecer productos para que sea asequible para todo el mundo, nos centramos en brindarte una buena relacion entre calidad y precio y asi ofrecerte lo mejor tanto para gatos como para perros.</p>
                    <div class="section__card-buttons">
                        <a class="button button-primary" href="./productos.php">Comprar ahora</a>
                     
                    </div>
                </div>
                <div class="section__card-imgs" data-aos="fade-down" data-aos-duration="2000"> 
                    <div class="section__card-img" >
                        <img src="https://images.unsplash.com/photo-1623387641168-d9803ddd3f35?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Imagen de mascotas">
                    </div>
                </div>
            </div>
            <div class="section__card">
                <div class="section__card-content">
                    <h1 class="section__card-title">Que hacemos!</h1>
                    <p class="section__card-text">Nos esforzamos por ser mucho más que una simple tienda, somos un destino donde la felicidad y el bienestar de tus compañeros peludos son nuestra máxima prioridad. Nos enorgullece ofrecer una amplia gama de productos cuidadosamente seleccionados que van desde alimentos nutritivos hasta juguetes divertidos y accesorios de moda. Nos comprometemos a brindarte todo lo que necesitas para hacer que la vida de tus mascotas sea lo más placentera posible.

                        </p>
                    <div class="section__card-buttons">
                        <a class="button button-primary" href="./productos.php">Comprar ahora</a>
                        
                    </div>
                </div>
                <div class="section__card-imgs">
                    <div class="section__card-img">
                        <img src="https://plus.unsplash.com/premium_photo-1664285640314-86e11343a183?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Cliente feliz">
                    </div>
                </div>
            </div>   
            <div class="section__card">
                <div class="section__card-content">
                    <h1 class="section__card-title">Misión</h1>
                    <p class="section__card-text">En MichiDogs, nuestra misión es brindar felicidad y bienestar a tus mascotas a través de productos de alta calidad y accesibles. Nos dedicamos apasionadamente a seleccionar y ofrecer una amplia gama de alimentos nutritivos, juguetes divertidos y accesorios de moda, asegurando que cada mascota encuentre lo que necesita para una vida plena y feliz. Nos esforzamos por ser un destino confiable para los dueños de mascotas, proporcionando un excelente servicio al cliente y descuentos exclusivos que faciliten el acceso a los mejores productos del mercado.</p>
                    <div class="section__card-buttons">
                        <a class="button button-primary" href="./productos.php">Comprar ahora</a>
                        
                    </div>
                </div>
                <div class="section__card-imgs">
                    <div class="section__card-img">
                        <img src="https://images.unsplash.com/photo-1450778869180-41d0601e046e?q=80&w=1586&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Perro y gato">
                    </div>
                </div>
            </div> 
            
            <div class="section__card">
                <div class="section__card-content">
                    <h1 class="section__card-title">Visión</h1>
                    <p class="section__card-text">Nuestra visión es ser la tienda virtual líder en productos para mascotas en Colombia, reconocida por nuestra dedicación al bienestar animal y la satisfacción del cliente. Aspiramos a expandir nuestras operaciones a nivel nacional, estableciendo nuevas oficinas y fortaleciendo nuestras alianzas con marcas reconocidas para seguir ofreciendo la mejor relación calidad-precio. Queremos ser el lugar de referencia donde cada dueño de mascota encuentre todo lo necesario para que sus compañeros peludos vivan felices y saludables, contribuyendo así a una comunidad más consciente y amorosa hacia los animales.</p>
                    <div class="section__card-buttons">
                        <a class="button button-primary" href="./productos.php">Comprar ahora</a>
                        
                    </div>
                </div>
                <div class="section__card-imgs">
                    <div class="section__card-img">
                        <img src="https://images.unsplash.com/photo-1557495235-340eb888a9fb?q=80&w=1413&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Amor a las mascotas">
                    </div>
                </div>
            </div>
            
            <div class="carousel-control">
                <a class="carousel__control prev" href="#"><i class="bi bi-arrow-left"></i></a>
                <a class="carousel__control next" href="#"><i class="bi bi-arrow-right"></i></a>
            </div>         
        </article>        
    </section>

    <section id="destacadas">
        <div class="container">
            <h2>Conoce a nuestro equipo</h2>
            <div class="row clasesDes">

                <article class="col-lg-4 card-destacadas" data-aos="zoom-in-up" data-aos-duration="1000">
                    <img  src="../../img/Youner.jpg" alt="prowoner">
                    <div class="cont-info">
                        <h3>Youner Montoya</h3>
                        <p>-Product Owner</p>
                    </div>
                </article>

            
            </div>
        </div>
    </section>

</main>


            <!-- ruedita de carga -->
            <!-- <div id="loading" class="loading"><img src="/img/ruedita_carga.gif" alt="rueda de carga" height="100px" width="100px"></div> -->

     <!-- ruedita de carga -->
    <!-- <div id="loading" class="loading"><img src="/img/ruedita_carga.gif" alt="rueda de carga" height="100px" width="100px"></div> -->

    <!-- Modal inicio sesion  -->

  <div class="modal fade" id="inicio" tabindex="-1" aria-labelledby="inicio" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="headerModal">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <h2>
          <img
            src="https://static.vecteezy.com/system/resources/previews/009/521/733/non_2x/dog-silhouette-dog-vector.jpg"
            height="30px" width="25px" alt="" />Inicio Michidogs
        </h2>
        <label for="" class="lineaDecorativaHome"></label>
        <div class="modal-body">
          <form action="../../controllers/cliente/inicioController.php" id="login" method="POST">
            <div class="row">
              <div class="form-group col-md-12">
                <input type="email" class="form-control inputInicio" required name="usuario" id="email"
                  placeholder="Email" />
              </div>
              <div class="form-group col-md-12">
                <input type="password" class="form-control inputInicios" required name="contrasena" id="conContrasena"
                  placeholder="Confirmar Contraseña" />
              </div>
            </div>
            <label for="" class="linkCuenta">
              <a data-bs-toggle="modal" data-bs-target="#recuperarContrasena">Recuperar Contraseña</a>
            </label>
            <button type="submit" class="botonIniciar">Iniciar Sesión</button>
          </form>
          <a class="crearCuenta" data-bs-toggle="modal" data-bs-target="#registro">¿Cliente nuevo? Crear cuenta
          </a>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Crear Registro-->

  <div class="modal fade" id="registro" tabindex="-1" aria-labelledby="registro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="Registroheader">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="formularioRegistro" id="formularioRegistro"
            action="../../controllers/cliente/registroController.php" method="POST">
            <h2>
              <img
                src="https://static.vecteezy.com/system/resources/previews/009/521/733/non_2x/dog-silhouette-dog-vector.jpg"
                height="30px" width="25px" alt="" />Registro Michidogs
            </h2>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="" class="rol">Comprador</label><input type="radio" required name="rol" value="ADMIN"
                  id="usuNombre" />
                <label for="" class="rol">Proveedor</label><input type="radio" required name="rol" value="PROVEEDOR"
                  id="usuNombre" />
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control inputRegistro" id="usuNombre" required name="nombre"
                  placeholder="Primer Nombre" />
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control inputRegistro" id="usuApellido" required name="apellido"
                  placeholder="Primer Apellido" />
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control inputRegistro" id="usuDocumento" required name="numeroDocumento"
                  placeholder="Documento" />
              </div>
              <div class="form-group col-md-6">
                <select name="tipoDocumento" id="" class="form-control inputRegistro tipDocumento">
                  <option value="seleccione">
                    Seleccione tipo documento
                  </option>
                  <option value="C.C">Cédula de ciudadanía</option>
                  <option value="T.I">Tarjeta de identidad</option>
                  <option value="P.S">Pasaporte</option>
                </select>
              </div>
              <div class="form-group col-md-12">
                <input type="phone" class="form-control inputRegistro" id="usuTelefono" required name="telefono"
                  placeholder="Teléfono" />
              </div>
              <div class="form-group col-md-12">
                <input type="text" class="form-control inputRegistro" id="correo" name="username" required
                  placeholder="Email" />
              </div>
              <div class="form-group col-md-12">
                <input type="password" class="form-control inputRegistro" required name="password"
                  placeholder="Contraseña" />
              </div>
              <div class="form-group col-md-12">
                <input type="password" class="form-control inputRegistro" id="conPassword" required name="conPassword"
                  placeholder="Confirmar Contraseña" />
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <label class="form-check-label">
                  Aceptar Terminos y condiciones
                </label>
                <input type="checkbox" id="gridCheck" />
              </div>
            </div>
            <button type="submit" class="botonCrear">Crear Cuenta</button>
          </form>
        </div>
      </div>
    </div>
  </div>




  
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
                  <input type="number" class="form-control inputRegistro"  id="usuDocumento" required name="numeroDocumento" placeholder="Documento" />
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>





    <script>
        document.addEventListener('DOMContentLoaded', function() {
  const cards = document.querySelectorAll('.section__card');
  const prevButton = document.querySelector('.carousel__control.prev');
  const nextButton = document.querySelector('.carousel__control.next');
  let currentCardIndex = 0;

  // Función para mostrar una tarjeta con transicin
  const showCard = (index, direction) => {
    // Desactivar transiciones inicialmente
    cards.forEach(card => card.style.transition = 'none');

    // Aplicar estilos para ocultar todas las tarjetas
    cards.forEach(card => {
      card.style.opacity = '0';
      card.style.transform = `translateX(${direction === 'next' ? '-' : ''}100%)`;
      card.classList.remove('show');
    });

    // Mostrar la tarjeta actual
    cards[index].classList.add('show');

    // Activar transiciones despuésde un pequeño retraso
    setTimeout(() => {
      cards.forEach(card => card.style.transition = 'opacity 0.5s, transform 0.5s');
      cards[index].style.opacity = '1';
      cards[index].style.transform = 'translateX(0)';
    }, 50);
  };

  // Función para cambiar de tarjeta
  const changeCard = (increment, direction) => {
    currentCardIndex = (currentCardIndex + increment + cards.length) % cards.length;
    showCard(currentCardIndex, direction);
  };

  // Función para desplazamiento automático
  const autoScroll = () => {
    changeCard(-1, 'next');
  };

  // Eventopara el botón "anterior"
  prevButton.addEventListener('click', (event) => {
    event.preventDefault();
    changeCard(-1, 'prev');
  });

  // Evento para el boón "siguiente"
  nextButton.addEventListener('click', (event) => {
    event.preventDefault();
    changeCard(1, 'next');
  });

  // Desplazamiento automático caa 5 seundos (ajusta el tiempo según sea necesario)
  let autoScrollInterval = setInterval(autoScroll, 5000);

  // Detener el desplazamiento automático al pasar el ratón sobre el carrusel
  document.querySelector('.carousel-section').addEventListener('mouseenter', () => {
    clearInterval(autoScrollInterval);
  });

  // Reanudar el desplazamiento automático al retirar el ratón del carrusel
  document.querySelector('.carousel-section').addEventListener('mouseleave', () => {
    autoScrollInterval = setInterval(autoScroll, 5000);
  });

  // Mostrar la primera tarjeta sin transiciones al cargr la página
  showCard(currentCardIndex, 'next');
});

    </script>
    
    
    <script>
        AOS.init();

        $(document).ready(function(){
            $('.clasesDes').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
				
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

      


<script src="js/app.js"></script>


</body>

</html>
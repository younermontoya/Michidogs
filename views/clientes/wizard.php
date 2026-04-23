<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasUsuario.php");
require_once("../../Models/consultasProducto.php");
require_once("../../controllers/productos/verProductosCliente.php");
require_once('../../controllers/administrador/mostrarPerfil.php');
require_once('../../Models/seguridadAdmin.php');
require_once("../../Models/ConsultasAdmin.php");
require_once("../../Models/consultaWizzard.php");
?>


<!DOCTYPE html>
<html lang="en">
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
    
    
    <link rel="stylesheet" href="../../css/componentes/nav.css">
    <link rel="stylesheet" href="../../css/styleWizard.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                <form class="d-flex rounded-3" method="GET" action="../../controllers/cliente/buscar.php">
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
                                <a href="home.php" class="nav-link" aria-current="page">Home</a>
                            </li>
                            <li class="nav-item" data-index="1">
                                <a href="productosC.php" class="nav-link" id="productos" aria-current="page">Productos</a>
                            </li>
                            <li class="nav-item" data-index="3">
                                <a href="contactoC.php" class="nav-link " aria-current="page">Contacto</a>
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
        
                        </ul>
                    </div>
                </div>
        </nav>

      </div>
        
    </header>

    <div id="page" class="site wizzard">
        <div class="container wizzard">
            <div class="form-box contenedor">
                <div class="progress progreso">
                    <div class="logo Wizzard"><a class="logoWizzard" href="/">PAGO CONTRAENTREGA</a>
                    <ul class="progress-steps byStep">
                        <li class="step active paso">
                            <span>1</span>
                            <p class="Pasos">Dirección<br><span>Pon tu dirección</span></p>
                        </li>
                        <li class="step paso">
                            <span>2</span>
                            <p class="Pasos">Factura<br><span>Validación correo</span></p>
                        </li>
                    </ul>
                    </div>
                </div>


<form class="formulario" action="../../controllers/cliente/checkout.php" method="POST" style="margin-top:110px;">
    <div class="form-one form-step active formuPaso" style="margin-top:-110px;">
        <div class="bg-svg"></div>
        <h2>Dirección</h2>
        <p>Ingresa los datos para tu entrega</p>
        <div>
            <label>Ciudad</label>
            <select name="ciudad" required>
                <option value="" disabled selected>Seleccione su ciudad</option>
                <option value="Bogota">Bogotá</option>
                <option value="Bucaramanga">Bucaramanga</option>
                <option value="Cali">Cali</option>
                <option value="Medellin">Medellin</option>
                <option value="Santa Marta">Santa Marta</option>
            </select>
        </div>
        <div>
            <label>Número de telefono</label>
            <input class="wizzard" type="number" name="telefono" placeholder="+57-314..." required>
            <h6 style="font-size:small;">Se puede utilizar para ayudar a la entrega</h6>
        </div>
        <div>
            <label>Dirección</label>
            <input class="wizzard" type="text" name="direccion" placeholder="Nombre de la calle" required><br>
            <input class="wizzard" type="text" name="especificacion" placeholder="Apto, torre, edificio, etc." required>
        </div>
    </div>

    <div class="form-three form-step formuPaso">
        <div class="bg-svg">
            <h2>Factura</h2>
            <p>Ingresa un correo para enviar la facturación</p>
            <div>
                <label>Email</label>
                <input class="wizzard" type="email" name="email" placeholder="correo@gmail.com" required>
            </div>
        </div>
    </div>
    <div class="btn-group">
        <button type="button" class="btn-prev volver">Volver</button>
        <button type="button" class="btn-next seguir">Siguiente paso</button>
        <button type="submit" class="btn-submit">Finalizar compra</button>
    </div>
</form>
            </div>
        </div>
    </div>
        <!-- ruedita de carga -->
        <div id="loading" class="loading"><img src="../../img/ruedita_carga.gif" alt="rueda de carga" height="100px" width="100px"></div>

    
    

    <script src="../../js/validacionesWizard.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../script/script.js"></script>
    <script src="../../js/script.js"></script>
    <script src="../../js/scriptWizard.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>
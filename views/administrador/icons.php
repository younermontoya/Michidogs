<!--
=========================================================
* Material Dashboard Dark Edition - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard-dark
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
require_once ("../../Models/conexion_db.php");
require_once ("../../Models/consultasUsuario.php");
require_once ("../../Models/consultasAdmin.php");
require_once ('../../Models/consultasUsuario.php');
require_once ('../../Models/seguridadAdmin.php');
require_once ('../../controllers/administrador/mostrarPerfil.php');
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../img/apple-icon.png">
   <!-- Favicon del sitio -->
  <link rel="icon" href="../../img/logo.png" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MichiDogs
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../../css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../demo/demo.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../../img/perroSanti.jpeg">
      <div class="logo"><a href="#" class="simple-text logo-normal">
          <img class="logo-michi"
            src="https://ffuofqj.stripocdn.email/content/guids/CABINET_3bd76a577384bab22196b91e67aa8324f155ab163c9d6fb3f12980b288b12948/images/logosin_fondo.png"
            style="width: 80px; height: 80px;" alt="Logo Michi">
          Tu amigo fiel
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
              <a class="nav-link" href="./user.php">
                <i class="material-icons">person</i>
                <p>Editar Perfil</p>
              </a>
            </li> -->
          <li class="nav-item ">
            <a class="nav-link" href="./tables.php">
              <i class="material-icons">manage_accounts</i>
              <p>Gestionar Usuarios</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./productosAdmin.php">
              <i class="material-icons">inventory_2</i>
              <p>Productos Estado</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./estadoCompra.php">
              <i class="material-icons">inventory_2</i>
              <p>Estado Compra Productos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.php">
              <i class="material-icons">how_to_reg</i>
              <p>Registrar Usuario</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="./responder_peticiones.php">
              <i class="material-icons">mark_as_unread</i>
              <p>Mensajes contacto</p>
            </a>
          </li>

          <!-- <li class="nav-item cerrarSesion">
              <form id="logoutForm" class="cerrarSesion" action="../../controllers/administrador/cerrarSesion.php" method="POST">
                <button type="submit" class="nav-link cerrarSesion">
                  <i class="material-icons">logout</i>
                  <p>Cerrar Sesión</p>
                </button>
              </form>
    
            </li> -->

        </ul>
      </div>

    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Registro De Usuarios</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <!-- <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div> -->
            </form>
            <ul class="navbar-nav">

              <?PHP
              cargarPerfil()
                ?>
              <li class="nav-item dropdown active">
                <a class="nav-link" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <img src="https://img.icons8.com/stickers/100/user.png" alt="user" width="50" height="50">
                  <p class="d-lg-none d-md-block">Some Actions</p>
                  <div class="ripple-container"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item nav-item" href="user.php">
                    <button class="nav-link" style="width: 100%; text-align: left;">
                      <div style="display: flex; align-items: center;">
                        <i class="material-icons" style="margin-right: 5px;"><img width="20" height="20"
                            src="https://img.icons8.com/ios/50/create-new.png" alt="icono de editar" /></i>
                        <h6 style="font-size: 10px; margin: 0;">Editar perfil</h6>
                      </div>
                    </button>
                  </a>


                  <a class="dropdown-item nav-item" href="javascript:void(0)">
                    <form id="logoutForm" action="../../controllers/administrador/cerrarSesion.php" method="POST">
                      <button type="submit" class="nav-link" style="width: 100%; text-align: left;">
                        <div style="display: flex; align-items: center;">
                          <i class="material-icons" style="margin-right: 5px;">logout</i>
                          <h6 style="font-size: 10px; margin: 0;">Cerrar Sesión</h6>
                        </div>
                      </button>
                    </form>
                  </a>
                </div>
              </li>


              <!-- <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your email</a>
                  <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                  <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                </div>
              </li> -->


              <!-- <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li> -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="container-fluid">


            <div class="row">
              <div class="editarPefil">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">REGISTRAR USUARIOS</h4>
                    <p class="card-category">Completa los campos </p>

                  </div>
                  <div class="card-body">
                  <form action="../../controllers/administrador/registroAdmin.php" method="POST" id="registrationForm">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" name="nombre" id="usuNombre" class="form-control" placeholder="Nombre" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Apellido</label>
                          <input type="text" name="apellido" id="usuApellido" class="form-control" placeholder="Apellido" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Correo</label>
                          <input type="email" name="email" id="usuCorreo" class="form-control" placeholder="Email" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Teléfono</label>
                          <input type="tel" name="telefono" id="usuTelefono" class="form-control" placeholder="Telefono" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Estado</label>
                          <select id="estado" name="estado" class="form-control opciones" required>
                            <option value="">Seleccione...</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                            <option value="Bloqueado">Bloqueado</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Rol</label>
                          <select id="rol" name="rol" class="form-control opciones" required>
                            <option value="">Seleccione...</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Proveedor">Proveedor</option>
                            <option value="Comprador">Comprador</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Documento</label>
                          <input type="number" name="documento" class="form-control" placeholder="Documento" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tipo de documento</label>
                          <select name="tipoDocumento" class="form-control opciones" required>
                            <option value="">Seleccione...</option>
                            <option value="C.C">Cédula</option>
                            <option value="T.I">Tarjeta de identidad</option>
                            <option value="P.S">Pasaporte</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Registrar</button>
                    <div class="clearfix"></div>
                  </form>


                  </div>
                </div>
              </div>
            </div>





          </div>
        </div>
      </div>


      <footer>

        <!-- Aqui va el footer -->
      </footer>


      <!-- <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script> -->


    </div>
  </div>


  <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple active" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="..//img/perro2.jpg" alt="">
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="/img/gato.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="/img/perroSanti.jpeg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="/img/perroygato.jpeg" alt="">
          </a>
        </li>

        <br><br><br><br><br><br><br><br><br><br>
         <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> 
      </ul>
    </div>
  </div> -->
      <!-- ruedita de carga -->
      <div id="loading" class="loading"><img src="../../img/ruedita_carga.gif" alt="rueda de carga" height="100px" width="100px"></div>



  <!--   Core JS Files   -->
  <script src="../../js/gestionarUsuarios.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="../../js/core/jquery.min.js"></script>
  <script src="../../js/core/popper.min.js"></script>
  <script src="../../js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../../js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../../js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../../js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="..//js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../../demo/demo.js"></script>

  <!-- <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>

<script> 
  document.addEventListener("DOMContentLoaded", function() {
const sidebarLinks = document.querySelectorAll('.dark-edition .sidebar li a');

sidebarLinks.forEach(function(link) {
  link.addEventListener('click', function() {
    // Remueve la clase 'active' de todos los enlaces
    sidebarLinks.forEach(function(link) {
      link.classList.remove('active');
    });
    // Agrega la clase 'active' al enlace que se hizo clic
    this.classList.add('active');
  });
});
});
  </script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    var navLinks = document.querySelectorAll('.nav-item a');

    navLinks.forEach(function(link) {
      link.addEventListener('click', function() {
        document.querySelectorAll('.nav-item').forEach(function(item) {
          item.classList.remove('active');
        });
        this.parentElement.classList.add('active');
      });
    });
  });
</script>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    var navLinks = document.querySelectorAll('.nav-item a');

    // Set the active link from localStorage
    var activePage = localStorage.getItem('activePage');
    if (activePage) {
      document.querySelector('.nav-item a[href="' + activePage + '"]').parentElement.classList.add('active');
    }

    navLinks.forEach(function(link) {
      link.addEventListener('click', function() {
        // Remove active class from all nav items
        document.querySelectorAll('.nav-item').forEach(function(item) {
          item.classList.remove('active');
        });

        // Add active class to the clicked nav item
        this.parentElement.classList.add('active');

        // Save the current page to localStorage
        localStorage.setItem('activePage', this.getAttribute('href'));
      });
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('.select2').select2();
});
</script>  -->


</body>

</html>
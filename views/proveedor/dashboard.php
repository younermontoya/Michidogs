<?php
session_start(); 

// Verifica si el proveedor está autenticado
if (!isset($_SESSION['id']) || $_SESSION['rol'] != '3') {
    echo 'Proveedor no autenticado';
    var_dump($_SESSION); // Muestra el contenido de la sesión para depurar
    exit(); // Detiene la ejecución si el proveedor no está autenticado
}

require_once('../../Models/conexion_db.php');
require_once('../../controllers/administrador/mostrarPerfil.php');
require_once('../../Models/consultasAdmin.php');
require_once('../../Models/proveedorGraficas.php'); 


$proveedor_id = $_SESSION['id']; 

$conexion = new Conexion();
$dbConnection = $conexion->get_conexion();
$proveedorModel = new ProveedorModel($dbConnection);

$productosPorMes = $proveedorModel->getProductosPorMes($proveedor_id);
$productosPorCategoria = $proveedorModel->getProductosPorCategoria($proveedor_id);
$tendenciaProductosVentas = $proveedorModel->getTendenciaProductosVentas($proveedor_id);

$proveedorModel->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <!-- Favicon del sitio -->
  <link rel="icon" href="../../img/logo.png" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MichiDogs
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../../css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/GrafPro.css">
  


 <!-- SCRIPT DE GRAFICOS PROVEEDOR -->
 <meta charset="UTF-8">
    <title>Gráficos del Proveedor</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawCharts);
        function drawCharts() {
            // Gráfico de productos agregados por mes
            var data1 = google.visualization.arrayToDataTable([
                ['Mes', 'Productos Agregados'],
                <?php 
                if (!empty($productosPorMes)) {
                    foreach ($productosPorMes as $row) {
                        echo "['".$row['mes']."', ".$row['productos_agregados']."],";
                    }
                } else {
                    echo "['Ningun producto', 0],";
                }
                ?>
            ]);
            var options1 = { title: 'Productos Agregados por Mes' };
            var chart1 = new google.visualization.ColumnChart(document.getElementById('productosPorMes'));
            chart1.draw(data1, options1);

            // Gráfico de productos por categoría
            var data2 = google.visualization.arrayToDataTable([
                ['Categoría', 'Productos Agregados'],
                <?php 
                if (!empty($productosPorCategoria)) {
                    foreach ($productosPorCategoria as $row) {
                        echo "['".$row['categoria']."', ".$row['productos_agregados']."],";
                    }
                } else {
                    echo "['Ningun producto', 0],";
                }
                ?>
            ]);
            var options2 = { title: 'Productos Agregados por Categoría' };
            var chart2 = new google.visualization.BarChart(document.getElementById('productosPorCategoria'));
            chart2.draw(data2, options2);

            // Gráfico de tendencia de productos agregados vs ventas
            var data3 = google.visualization.arrayToDataTable([
                ['Mes', 'Productos Agregados', 'Ventas'],
                <?php 
                if (!empty($tendenciaProductosVentas)) {
                    foreach ($tendenciaProductosVentas as $row) {
                        echo "['".$row['mes']."', ".$row['productos_agregados'].", ".$row['total_ventas']."],";
                    }
                } else {
                    echo "['No información', 0, 0],";
                }
                ?>
            ]);
            var options3 = { title: 'Tendencia de Productos Agregados vs Ventas' };
            var chart3 = new google.visualization.ComboChart(document.getElementById('tendenciaProductosVentas'));
            chart3.draw(data3, options3);
        }
    </script>

</head>

<body class="dark-edition" id="layout" data-page="perfilProveedor">
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="/img/perroSanti.jpeg">
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
              <a class="nav-link" href="./editUser.php">
                <i class="material-icons">person</i>
                <p>Editar Perfil</p>
              </a>
            </li>      -->
          <li class="nav-item ">
            <a class="nav-link" href="./gestionProductos.php">
              <i class="material-icons">content_paste</i>
              <p>Gestionar Productos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./registrarProductos.php">
              <i class="material-icons">bubble_chart</i>
              <p>Registrar Productos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./inventario.php">
              <i class="material-icons">content_paste</i>
              <p>inventario</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./moduloCompras.php">
              <i class="material-icons">notifications</i>
              <p>Lista De Ventas</p>
            </a>
          </li>
          <!-- <li class="nav-item cerrarSesion">
              <form id="logoutForm" action="../../controllers/administrador/cerrarSesion.php" method="POST">
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
            <a class="navbar-brand" href="javascript:void(0)">Estadisticas proveedor</a>
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
                  <a class="dropdown-item nav-item" href="editUser.php">
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
              <!-- <li class="nav-item dropdown active">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                <div class="ripple-container"></div></a>
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
       <!-- CONTENIDO GRAFICAS PROVEEDOR -->
       <div class="container">
      <div class="chart-title">Productos por Mes</div>
      <div id="productosPorMes" class="chart"></div>
      
      <div class="chart-title">Productos por Categoría</div>
      <div id="productosPorCategoria" class="chart"></div>

      <div class="chart-title">Tendencia de Productos por Ventas</div>
      <div id="tendenciaProductosVentas" class="chart"></div>
      
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
            <img src="../../img/perro2.jpg" alt="">
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../../img/gato.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../../img/perroSanti.jpeg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../../img/perroygato.jpeg" alt="">
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



  <!--   Core JS Files   -->
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
  <!-- <script src="/js/material-dashboard.js?v=2.1.0"></script> -->
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../../demo/demo.js"></script>
  <!-- <script src="/js/componentes/dashboard.js"></script> -->


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
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

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
  import { loadSidebar } from '/js/componentes/sidebar.js';

  window.addEventListener('load', () => {
      loadSidebar('contenedorPrincipal');
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
</script> -->




</body>

</html>
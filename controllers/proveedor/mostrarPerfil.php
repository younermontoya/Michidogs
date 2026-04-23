<?php
require_once ("../../Models/consultasProv.php");
require_once ("../../Models/conexion_db.php");
require_once ("../../Models/consultasUsuario.php");


function cargarPerfil(){
    //Utilizamos la variable de sesion global para traer todos los datos del usuario
    $id = $_SESSION['id'];
    $objConsultas = new ConsultaProv();
    $result = $objConsultas -> cargarUsuario($id);

    foreach ($result as $f){
        echo'
        <span class="user-avatar">'.$f['usu_nombre'].'  '.$f['usu_apellido'].'
        <i class="ti-angle-down f-s-10"></i>
    </span>
        ';
    }
}
function cargarPerfilPrincipal(){
 $id = $_SESSION['id'];

 $objConsultas = new ConsultaProv();
 $result = $objConsultas -> cargarUsuario($id);

 foreach ($result as $f){
    echo '<div class="user-profile">
    <div class="row">
      <div class="col-lg-4">
        <div class="user-work">
            <h2> '.$f['usu_nombre'].'  '.$f['usu_apellido'].' </h2>
          <div class="work-content">
            <p> '.$f['usu_telefono'].' </p>
            <p> '.$f['usu_correo'].' </p>

          </div>
          <div class="work-content">

          </div>
        </div>

      </div>
      <div class="col-lg-8">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Datos de la cuenta </button>
            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Cambiar contraseña </button>
          
      </nav>
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<div class="card"><h3> Modificar datos de la cuenta </h3></div>
<form action="../../controllers/proveedor/modificarPerfil.php" method="post">
<form action="modificarPerfil.php" method="POST" enctype="multipart/form-data">

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Id usuario</label>
                            <input type="text" readonly value="'.$f['id'].'" name="id" class="form-control" placeholder="example: 2846482" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="">Nombre</label>
                        <input type="text" value="'.$f['usu_nombre'].'" name="nombre"class="form-control" placeholder="Nombre" required >
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="">Apellido</label>
                        <input type="text" value="'.$f['usu_apellido'].'" name="apellido"class="form-control" placeholder="Apellido" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="">Correo</label>
                        <input type="email" value="'.$f['usu_correo'].'" name="email" class="form-control" placeholder="Email" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="">Teléfono</label>
                        <input type="text" value="'.$f['usu_telefono'].'" name="telefono" class="form-control" placeholder="Telefono" required>
                        </div>
                      </div>
           
                    </div>

                    <button type="submit" class="btn btn-primary pull-right" style="background-color: #ffc107" id="btnActualiPer" >Actualizar Perfil</button>
            </form>
</form>

</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

<div class="card"><h3> Modificar contraseña </h3></div>
<form action="../../controllers/proveedor/cambiarContrasena.php" method="POST" enctype="multipart/form-data">
                <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                            <label> Contraseña actual </label>
                            <input type="password"  name="aContrasena"class="form-control" placeholder="****" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label> Nueva contraseña </label>
                            <input type="password"  name="nContrasena"class="form-control" placeholder="****" required>
                        </div>
                      </div>

                </div>
                    <button type="submit" class="btn btn-primary pull-right" style="background-color: #ffc107" id="btnActualiPer" >Actualizar Contraseña</button>
</form>
</div>

      </div>
    </div>
    
    
    ';
 }
}

?>

<!-- <div class="col-md-6">
                        <div class="form-group">
                          <label class="">Numero de documento </label>
                          <input type="text" id="numeroDocumento" class="form-control">
                        </div>
                      </div> -->
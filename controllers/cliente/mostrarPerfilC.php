<?php
require_once ("../../Models/consultasAdmin.php");
require_once ("../../Models/conexion_db.php");
require_once ("../../Models/consultasUsuario.php");


function cargarPerfil(){
    //Utilizamos la variable de sesion global para traer todos los datos del usuario
    $id = $_SESSION['id'];
    $objConsultas = new ConsultaAdmin();
    $result = $objConsultas -> cargarUsuario($id);

    foreach ($result as $f){
        echo'
        <span class="user-avatar">'.$f['usu_nombre'].'  '.$f['usu_apellido'].'
        <i class="ti-angle-down f-s-10"></i>
    </span>
        ';
    }
}
function cargarPerfilC(){
 $id = $_SESSION['id'];

 $objConsultas = new ConsultaAdmin();
 $result = $objConsultas -> cargarUsuario($id);

 foreach ($result as $f){
    echo '<div class="form editar">
        
        <ul class="tab-group">
          <li class="tab active" ><a href="#signup">Datos del usuario</a></li>
          <li class="tab"><a href="#login">Contraseña</a></li>
        </ul>
        
        <div class="tab-content">
          <div id="signup">   
            <h1 class="editTitle">Ingrese los nuevos datos</h1>
            
            <form action="../../controllers/cliente/modificarPerfil.php" method="post">
            
            <div class="top-row">
              <div class="field-wrap">
                <label class="editProfile">
                  <span class="req"></span>
                </label>
                  <input type="text" value="'.$f['usu_nombre'].'" name="nombre"class="form-control" placeholder="Nombre" required>
              </div>
          
              <div class="field-wrap">
                <label class="editProfile">
                  <span class="req"></span>
                </label>
                  <input type="text" value="'.$f['usu_apellido'].'" name="apellido"class="form-control" placeholder="Apellido" required>
              </div>
            </div>

            <div class="field-wrap">
              <label class="editProfile">
                <span class="req"></span>
              </label>
                  <input type="email" value="'.$f['usu_correo'].'" name="email" class="form-control" placeholder="Email" required>
            </div>
            
            <div class="field-wrap">
              <label class="editProfile">
                <span class="req"></span>
              </label>
                  <input type="text" value="'.$f['usu_telefono'].'" name="telefono" class="form-control" placeholder="Telefono" required>
            </div>
            <div class="field-wrap" style="display: none;">
              <label class="editProfile">
                <span class="req"></span>
              </label>
                <input type="text" readonly value="'.$f['id'].'" name="id" class="form-control" placeholder="example: 2846482" >
            </div>
            <div class="field-wrap">
              <label class="editProfile">
                <span class="req"></span>
              </label>
                <input type="text" readonly value="'.$f['usu_documento'].'" name="documento" class="form-control" placeholder="example: 2846482">
            </div>
            
            <button type="submit" class="button button-block"/>Modificar</button>
            
            </form>

          </div>
          
          <div id="login">   
            <h1 class="editTitle">Ingrese los datos</h1>
            
            <form action="../../controllers/cliente/cambiarContrasena.php" method="post">
            
              <div class="field-wrap">
              <label class="editProfile">
                Contraseña antigua<span class="req">*</span>
              </label>
                <input type="password"  name="aContrasena"class="form-control" placeholder="" required>
            </div>
            
            <div class="field-wrap">
              <label class="editProfile">
                Nueva contraseña<span class="req">*</span>
              </label>
                <input type="password"  name="nContrasena"class="form-control" placeholder="" required>
            </div>
            
            <button class="button button-block" type="submit">Modificar</button>
            
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
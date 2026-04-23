<?php
//Importamos las dependencias
require_once("../../Models/conexion_db.php");
require_once('../../Models/consultasAdmin.php');

//Captura en variables los datos enviados 
//Desde el formulario a través del método post y los name de los campos
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$id=$_POST['id'];
$email = $_POST['email'];
$rol = $_POST["rol"];
$estado = $_POST["estado"];


if($rol=='Administrador'){
    $rol=1;
}
else if ($rol=='Comprador'){
    $rol=2;
}
else if ($rol== 'Proveedor'){
    $rol= 3;
}
 
     $objConsultas = new ConsultaAdmin();
     $result = $objConsultas->editarUsuario($apellido, $nombre, $email, $telefono, $rol, $estado,$id);


?>
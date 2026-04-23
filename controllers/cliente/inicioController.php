<?php
require_once("../../Models/conexion_db.php");
require_once('../../Models/consultasUsuario.php');

$usuario=$_POST['usuario'];
$contrasena=md5($_POST['contrasena']);

$objConsultas = new ConsultaUsuario();
$result = $objConsultas->validarSesion($usuario, $contrasena);

?>
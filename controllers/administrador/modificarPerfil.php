<?php

require_once("../../Models/ConsultasAdmin.php");
require_once("../../Models/conexion_db.php");


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

$objConsultas = new ConsultaAdmin();
$result = $objConsultas -> modificarPerfil($id, $nombre, $apellido, $telefono, $email);

?>
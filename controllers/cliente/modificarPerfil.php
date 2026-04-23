<?php

require_once("../../Models/consultasCliente.php");
require_once("../../Models/conexion_db.php");


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$documento = $_POST['documento'];

$objConsultas = new consultasCliente();
$result = $objConsultas -> modificarPerfil($id, $nombre, $apellido, $telefono, $email, $documento);

?>
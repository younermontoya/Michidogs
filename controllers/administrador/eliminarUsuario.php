<?php
require_once("../../Models/conexion_db.php");
require_once('../../Models/consultasAdmin.php');

$id = $_GET['id'];

$objConsultas = new ConsultaAdmin();
$result = $objConsultas->eliminarUsers($id);
?>
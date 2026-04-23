<?php
require_once("../../Models/conexion_db.php");
require_once('../../Models/consultasAdmin.php');

$id = $_GET["id"];
$disponibilidad = $_GET["disponibilidad"];

$objConsultas = new ConsultaAdmin();

$result = $objConsultas->editarEstadoProducto($id, $disponibilidad);
?>
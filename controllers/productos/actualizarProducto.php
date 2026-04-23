<?php
    require_once("../../Models/conexion_db.php");
    require_once("../../Models/consultasProducto.php");

$nombre = $_POST['nombreProducto'];

$precio = $_POST['precio'];
$fecha = $_POST['fecha'];
$stock = $_POST['stock'];
$peso = $_POST['peso'];
$disponibilidad = $_POST['disponibilidad'];
$tipoMascota = $_POST['tipoMascota'];
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];
$idProducto = $_POST['idProducto'];

$objConsultas = new ConsultasProducto();

$result = $objConsultas->actualizarProducto($nombre,$precio,$fecha,$stock,$peso,$disponibilidad,$tipoMascota,$categoria,$descripcion,$idProducto);

?>
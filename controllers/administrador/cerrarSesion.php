<?php
require_once("../..//Models/conexion_db.php");
require_once("../../Models/consultasUsuario.php");

$objConsultas = new ConsultaUsuario();
$result = $objConsultas -> cerrarSesion();

?>
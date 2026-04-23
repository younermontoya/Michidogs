<?php
    require_once("../../Models/conexion_db.php");
    require_once("../../Models/consultasProducto.php");

    $pro_id = $_GET['id'];

    $objConsultas = new ConsultasProducto();

    $result=$objConsultas->eliminarProducto($pro_id);
?>
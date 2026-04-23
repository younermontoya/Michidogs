<?php
    require_once("../../Models/conexion_db.php");
    require_once('../../Models/consultasAdmin.php');

    $id = $_GET['id'];
    $estado = $_GET['estado'];

    $objConsultas = new ConsultaAdmin();
    $result = $objConsultas->editarEstado($id, $estado);

?>
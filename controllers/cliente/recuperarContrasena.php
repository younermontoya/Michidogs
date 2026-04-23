<?php

require_once("../../Models/conexion_db.php");
require_once("../../Models/generarClaveEmail.php");

$email = $_POST['usu_correo'];

$objClave = new generarClave();

$result = $objClave -> enviarNuevaClave($email);

?>
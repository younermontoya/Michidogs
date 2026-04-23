<?php
require_once("../../Models/conexion_db.php");
require_once('../../Models/consultasUsuario.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$confirmarContrasena = $_POST['confirmarContrasena'];
$rol = $_POST["rol"];
$estado = "Activo";
$fecha_creacion = date('y-m-d');
$documento = $_POST['documento'];
$tipoDocumento = $_POST['tipoDocumento'];

if($rol=='comprador'){
    $rol=2;
} else {
    $rol=3;
}

$objConsultas = new ConsultaUsuario();

if ($objConsultas->emailExiste($email)) {
    echo '<script>alert("El correo electrónico ya está registrado.")</script>';
    echo "<script> location.href='../../index.php' </script>";
    exit; 
}

if ($contrasena == $confirmarContrasena) {
    $contrasenaMD = md5($contrasena);

    $objConsultas->registrarUsuario($apellido, $nombre, $email, $telefono, $contrasenaMD, $rol, $estado, $fecha_creacion, $documento, $tipoDocumento);
} else {
    echo '<script>alert("Las contraseñas no coinciden.")</script>';
    echo "<script> location.href='../../index.php' </script>";
}
?>

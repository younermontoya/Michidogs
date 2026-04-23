<?php
    require_once("../../Models/conexion_db.php");
    require_once("../../Models/consultasProducto.php");
    require_once("../../Models/consultasUsuario.php");
session_start();

$pro_id = $_POST['pro_id'];
$nombre = $_POST['nombreProducto'];
$marca = $_POST['marca'];
$precio = $_POST['precio'];
$fecha = $_POST['fecha'];
$stock = $_POST['stock'];
$peso = $_POST['peso'];
$disponibilidad = $_POST['disponibilidad'];
$tipoMascota = $_POST['tipoMascota'];
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];
$usuario = $_SESSION['id'];
$cantMaxima = $_POST['cantMaxima'];
$cantMinima = $_POST['cantMinima'];

$imagen="../../Uploads/".$_FILES['imagen']['name'];
$mover = move_uploaded_file($_FILES['imagen']['tmp_name'],$imagen);

$imagen2="../../Uploads/".$_FILES['imagen2']['name'];
$mover = move_uploaded_file($_FILES['imagen2']['tmp_name'],$imagen2);

$imagen3="../../Uploads/".$_FILES['imagen3']['name'];
$mover = move_uploaded_file($_FILES['imagen3']['tmp_name'],$imagen3);
$objConsultas = new ConsultasProducto();


if ($objConsultas->verificarCodigoProducto($pro_id)) {

  echo "<script>
            alert('El código del producto ya existe. Por favor, elige otro código.');
            location.href='../../views/proveedor/registrarProductos.php';
          </script>";       

}else{
    $result = $objConsultas->registrarProducto($pro_id, $nombre, $marca, $precio, $fecha, $stock, $peso, $disponibilidad, $tipoMascota, $categoria, $imagen, $descripcion, $usuario, $imagen2, $imagen3, $cantMaxima, $cantMinima);
    echo "<script>
              alert('El producto ha sido registrado exitosamente');
              location.href='../../views/proveedor/registrarProductos.php';
          </script>";
}
?>
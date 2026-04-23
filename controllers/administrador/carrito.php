<?php
require_once("../../Models/conexion_db.php");
require_once('../../Models/guardar_carrito.php');
require_once('../../Models/consultasUsuario.php');

session_start();


if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'agregarProducto':
            agregarProducto($_POST['idCarrito'],$_POST['idProducto'],$_POST['precio']);
            break;

        case 'carritoNueva':
            crearCarrito();
            break;
        case 'renderizarCarrito':
            cargarCarrito();
            break;
        case 'actulizarCantidad':
            actualizarCantidad($_POST['cantidad'],$_POST["idProducto"],$_POST['idCarrito']);
            break;
        case 'eliminarProducto':
            eliminarProducto($_POST["idProducto"],$_POST['idCarrito']);
            break;
        default:
            echo json_encode(['message' => 'Función no encontrada']);
            break;
    }
}

function eliminarProducto($idProducto,$idCarrito){
    $result = Carrito::eliminarProducto($idCarrito,$idProducto);
    if($result){
        echo json_encode($result);
    }
}

function actualizarCantidad($cantidad,$idProducto,$idCarrito){
    $result = Carrito::actualizarCarrito($cantidad,$idCarrito,$idProducto);

    if($result){
        echo json_encode($result);
    }
}

function cargarCarrito(){
    $idUsuario =$_SESSION['id'];
    $result = Carrito::cargarCarrito($idUsuario);

    if($result){
        $productos = array();
        
        while($row= $result->fetch(PDO::FETCH_ASSOC)){
            $productos[] =  $row;
        }

         echo json_encode($productos);
    
    }else{
        echo throw new Exception("No se pudo cargar el carrito");
    }
}

function agregarProducto($idCarrito,$idProducto,$precio){
$iva = 15;
$cantidad =1;
$result =  Carrito::agregarCarrito($idCarrito,$idProducto,$precio,$iva,$cantidad);
if($result){
    echo json_encode($result);
    }
} 

function crearCarrito(){
    $idUsuario =$_SESSION['id'];
    $estado ="Activo";
    $total = 0;

    $result = Carrito::crearCarrito($idUsuario,$estado, $total);

    if($result){
        echo json_encode($result);
    }

}





?>
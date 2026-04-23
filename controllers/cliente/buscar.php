<?php
include '../../Models/conexion_db.php'; // Ajusta la ruta según tu estructura de carpetas

// Crear una instancia de la clase Conexion y obtener la conexión
$conexion = new Conexion();
$pdo = $conexion->get_conexion();

if (isset($_GET['producto']) && !empty($_GET['producto'])) {
    $producto = $_GET['producto'];

    // Preparar la consulta SQL
    $stmt = $pdo->prepare("SELECT * FROM productos WHERE pro_nombre LIKE :producto LIMIT 8");
    $stmt->execute(['producto' => "%$producto%"]);

    // Obtener el primer resultado
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        // Redirigir a la página de detalles del producto con el ID del producto
        header("Location: ../../views/clientes/detalleBusqueda.php?id=" . $resultado['pro_id']);
        exit();
    } else {        
        echo "<script>
        alert('No se a encontrado ningun producto con ese nombre, intentelo nuevamente');
        location.href='../../views/clientes/productosC.php';
      </script>";  
    }
} else {
    echo "<script>
    alert('Ingrese por favor el nombre de un producto para realizar la busqueda');
    location.href='../../views/clientes/productosC.php';
  </script>";  
}
?>

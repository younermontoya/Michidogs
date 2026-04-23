<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['rol'] != '2') {
    echo 'comprador no autenticado';
    var_dump($_SESSION);
    exit();
}
require_once('conexion_db.php');

$user_id = $_SESSION['id'];

try {
    $conexion = (new Conexion())->get_conexion();
    $sql = "SELECT
    c.id_carrito AS carrito_id,
    MAX(c.total) AS carrito_total,
    MAX(pco.estado) AS carrito_estado,
    MAX(v.fecha) AS fecha_venta,
    MAX(pco.direccion) AS direccion,
    MAX(pco.telefono) AS telefono,
    MAX(p.pro_nombre) AS pro_nombre,
    MAX(d.cantidad_product) AS cantidad_product,
    MAX(d.precio_product) AS precio_product,
    GROUP_CONCAT(DISTINCT p.pro_nombre ORDER BY d.id_detall_carrito SEPARATOR ', ') AS productos,
    GROUP_CONCAT(DISTINCT d.cantidad_product ORDER BY d.id_detall_carrito SEPARATOR ', ') AS cantidades,
    SUM(d.cantidad_product * d.precio_product) AS subtotal_total
FROM
    carrito c
JOIN
    detalle_carrito d ON c.id_carrito = d.id_carrito
JOIN
    productos p ON d.id_producto = p.pro_id
LEFT JOIN
    ventas v ON c.id_carrito = v.id_carrito
LEFT JOIN
    procesocompra pco ON c.id_carrito = pco.id_compra
WHERE
    c.id_usuario = :user_id
GROUP BY
    c.id_carrito
ORDER BY
    fecha_venta DESC;

";

    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Error: " . $e->getMessage();
}
?>
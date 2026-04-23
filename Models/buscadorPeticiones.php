<?php

require_once('conexion_db.php'); 


$conexion = new Conexion();
$pdo = $conexion->get_conexion();


$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM mensajes_contacto WHERE 
        nombre LIKE :search OR 
        telefono LIKE :search OR 
        email LIKE :search OR 
        asunto LIKE :search OR 
        mensaje LIKE :search OR 
        estado LIKE :search";


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':search', '%' . $search . '%');
$stmt->execute();


$mensajes_contacto = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasUsuario.php");
require_once("../../Models/consultasAdmin.php");
require_once("../../Models/seguridadAdmin.php");
require_once("../../controllers/administrador/mostrarPerfil.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';

// Conexión a la base de datos
$conexion = new Conexion();
$db = $conexion->get_conexion();

// Obtener datos del formulario
$mensaje_contacto_id = $_POST['mensaje_contacto_id'];
$respuesta = $_POST['respuesta'];
$estado = $_POST['estado'];

// Obtener el correo electrónico del usuario
$sql_email = "SELECT email FROM mensajes_contacto WHERE id = :id";
$stmt_email = $db->prepare($sql_email);
$stmt_email->bindParam(':id', $mensaje_contacto_id);
$stmt_email->execute();
$user_email = $stmt_email->fetchColumn();

try {
    // Insertar la respuesta en la base de datos
    $sql = "INSERT INTO respuestas_contacto (mensaje_contacto_id, respuesta, estado) VALUES (:mensaje_contacto_id, :respuesta, :estado)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':mensaje_contacto_id', $mensaje_contacto_id);
    $stmt->bindParam(':respuesta', $respuesta);
    $stmt->bindParam(':estado', $estado);
    $stmt->execute();

    // Actualizar el estado de la petición
    $sql_update = "UPDATE mensajes_contacto SET estado = :estado WHERE id = :id";
    $stmt_update = $db->prepare($sql_update);
    $stmt_update->bindParam(':estado', $estado);
    $stmt_update->bindParam(':id', $mensaje_contacto_id);
    $stmt_update->execute();

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                           // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';      // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                  // Enable SMTP authentication
        $mail->Username   = 'michidogssoporte@gmail.com'; // SMTP username
        $mail->Password   = 'pwhminxcmtsnrveb';    // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
        $mail->Port       = 465;                   // TCP port to connect to

        // Destinatarios
        $mail->setFrom('michidogssoporte@gmail.com', 'Soporte Michidogs');
        $mail->addAddress($user_email); // Correo del usuario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Respuesta a tu petición en Michidogs';
        $mail->Body    = '
            <p>Hola,</p>
            <p>Tu petición ha sido respondida.</p>
            <p><strong>Respuesta:</strong> ' . htmlspecialchars($respuesta) . '</p>
            <p><strong>Estado:</strong> ' . htmlspecialchars($estado) . '</p>
            <p>Gracias por contactarnos.</p>
            <p>Saludos,<br>El equipo de Michidogs</p>
        ';

        $mail->send();
        echo '<script>alert("Respuesta guardada y correo enviado correctamente.")</script>';
    } catch (Exception $e) {
        echo '<script>alert("El mensaje no se pudo enviar. Mailer Error: ' . $mail->ErrorInfo . '")</script>';
    }
} catch (PDOException $e) {
    echo '<script>alert("Error en la base de datos: ' . $e->getMessage() . '")</script>';
}
?>

<?PHP
require_once("../../Models/conexion_db.php");
require_once('../../Models/consultasUsuario.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

$correo = $_POST['correo'];

$objConsultas= new recuperarClave();



?>
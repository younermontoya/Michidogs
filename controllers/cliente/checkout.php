<?php
session_start();

require_once("../../Models/conexion_db.php");
require_once('../../Models/consultasCliente.php');
require_once('../../Models/guardar_carrito.php');
require_once('../../tcpdf/tcpdf.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';
require_once ("../../Models/consultasUsuario.php");
require_once ("../../Models/consultasAdmin.php");

$ciudad = $_POST['ciudad'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$especificacion = $_POST['especificacion'];

$email = $_POST['email'];

$id_usuario = $_SESSION['id'];


$compraModel = new consultasCliente();

$compraModel->procesoCompra($id_usuario, $ciudad, $telefono, $direccion, $especificacion, $email);

generarFactura($direccion,$especificacion,$ciudad,$email);


function generarFactura($direccion,$especificacion,$ciudad,$email){
    
$idUsuario =$_SESSION['id'];
$result = Carrito::cargarCarrito($idUsuario);
Carrito::actualizarCarritoEstado($idUsuario);

$productos = array();   


if($result){    
while($row= $result->fetch(PDO::FETCH_ASSOC)){
     $productos[] =  $row;
}  
}else{
    echo throw new Exception("No se pudo cargar el carrito");
}


$id = $_SESSION['id'];

$objConsultas = new ConsultaAdmin();
$result = $objConsultas -> cargarUsuario($id);
    
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Michidogs');
$pdf->SetTitle('Factura');
$pdf->SetSubject('Factura PDF');

$pdf->SetHeaderData('', 0, 'Michidogs');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->AddPage();

$html = '
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 10px;
        }
        .invoice {
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 10px;
            background: #fff;
            border-radius: 0;
            box-shadow: none;
            border: 1px solid #ddd;
        }
        header {
            display: flex;
            align-items: stretch; 
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }
        .company-info, .recipient-info {
            width: 48%;
            padding: 0 10px;
        }
        .company-info {
            line-height: 1.4;
        }
        .company-info img {
            width: 80px; 
            margin-left: 300px;
            margin-bottom: 5px;
        }
        .company-info h1 {
            font-size: 14px;
            margin: 0;
        }
        .company-info p {
            font-size: 10px;
            margin: 0;
        }
        .recipient-info {
            text-align: left;
            line-height: 1.4;
        }
        .recipient-info h2 {
            font-size: 12px; 
            margin: 0;
        }
        .recipient-info p {
            font-size: 10px; 
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: left;
            font-size: 10px;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        tfoot {
            font-weight: bold;
        }
        .total-label {
            text-align: right;
        }
        footer {
            border-top: 1px solid #333;
            padding: 5px 0;
            text-align: center;
            background-color: #f4f4f4;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            font-size: 10px;
        }
        .footer-info p {
            margin: 0;
            font-size: 10px;
        }
    </style>

    <div class="invoice">
        <header>
            <div class="company-info">
                <img src="../../img/logo.png" alt="Logo de la Empresa">
                <h1>MICHIDOGS</h1>
                <p>michidogssoporte@gmail.com</p>
                <p>+57 323 604 1454 </p>
            </div>
            <div class="recipient-info">
                <h2>Cliente</h2>
                <p>'.$result[0]['usu_nombre'].' '.$result[0]['usu_apellido'].'</p>
                <p>'.$email.'</p>
                <p>'.$result[0]['usu_telefono'].'</p>
                <p>'.$direccion.', '.$especificacion.'</p>
                <p>'.$ciudad.' </p>
            </div>
        </header>

        <section class="invoice-details">
            <h2>Factura</h2>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>IVA</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>';

foreach ($productos as $p) {

    $precioProducto = number_format($p['pro_precio'], 2); 
    $precioProductoT = number_format($p['precio_product'], 2); 
    $html .= '
                <tr>
                    <td>'.$p['pro_nombre'].'</td>
                    <td>'.$p['cantidad_product'].'</td>
                    <td>'.$p['iva'].'%</td>
                    <td>$'.$precioProducto.'</td>
                    <td>$'.$precioProductoT.'</td>
                </tr>';
}

$precioTotal = isset($productos[0]['total']) ? (float) $productos[0]['total'] : 0;


$precioIva = $precioTotal * (15 / 100);


$precioSinIva = $precioTotal - $precioIva;


$precioIva = number_format($precioIva, 2, '.', ',');
$precioSinIva = number_format($precioSinIva, 2, '.', ',');
$html .= '
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="total-label">Precio sin iva</td>
                    <td>'.$precioSinIva.'</td>
                </tr>
                <tr>
                    <td colspan="4" class="total-label">IVA (15%)</td>
                    <td>'.$precioIva.'</td>
                </tr>
                <tr>
                    <td colspan="4" class="total-label">Total</td>
                    <td>'.number_format($productos[0]['total'],2).'</td>
                </tr>
            </tfoot>
        </table>
    </section>

    <footer>
        <div class="footer-info">
            <p>Bogotá D.C, Colombia </p>
            <p>michidogssoporte@gmail.com </p>
            <p>+37 323 604 1454 </p>
            <p>Cualquier inquietud contactanos.</p>
        </div>
    </footer>
</div>';


$pdf->writeHTML($html, true, false, true, false, '');


$invoice_filename = __DIR__ . '/Factura_Michidogs_' . time() . '.pdf';
$pdf->Output($invoice_filename, 'F');


if (!file_exists($invoice_filename)) {
    die("Error: The PDF file was not created.");
}


$mail = new PHPMailer(true);
try {
    
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'michidogssoporte@gmail.com';  
    $mail->Password   = 'pwhminxcmtsnrveb';   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

 
    $mail->setFrom('michidogssoporte@gmail.com', 'Soporte Michidgos');
    $mail->addAddress($result[0]['usu_correo'], $result[0]['usu_nombre']);  
    $mail->addAddress($email, $result[0]['usu_nombre']);  
    $mail->addAddress('michidogssoporte@gmail.com');  


 
    $mail->addAttachment($invoice_filename);

 
    $mail->isHTML(true);
    $mail->Subject = 'Factura';
    $mail->Body    = 'Resumen compra';
    $mail->AltBody = 'Adjunto PDF encontrará su factura.';

 
    $mail->send();
    echo "<script>
    alert('Su compra ha sido realizada con éxito. Una factura ha sido enviada al correo electrónico proporcionado.');
    location.href='../../views/clientes/home.php';
  </script>";   

     unlink($invoice_filename);

} catch (Exception $e) {
    echo "<script>
    alert('No se a podido enviar la factura al correo, reviselo y vuelva a intentarlo');
    location.href='../../views/clientes/productosC.php';
  </script>";   
    
    if (file_exists($invoice_filename)) {
        unlink($invoice_filename);
    }
}
}

?>
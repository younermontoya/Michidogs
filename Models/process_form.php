<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
require 'conexion_db.php';

$response = ['status' => 'error', 'message' => ''];

// Validación de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $names = $_POST['names'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    if (!preg_match("/^[a-zA-Z ]*$/", $names)) {
        $response['message'] = 'El nombre solo debe contener letras y espacios.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'El correo electrónico no es válido.';
    } elseif (strlen($mensaje) > 1000) {
        $response['message'] = 'El mensaje no debe exceder los 1000 caracteres.';
    } elseif (strlen($phone) < 10) {
        $response['message'] = 'El teléfono debe tener al menos 10 dígitos.';
    }  else {
        // Conexión a la base de datos
        $conexion = new Conexion();
        $db = $conexion->get_conexion();

        try {
            $sql = "INSERT INTO mensajes_contacto (nombre, telefono, email, asunto, mensaje) VALUES (:nombre, :telefono, :email, :asunto, :mensaje)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':nombre', $names);
            $stmt->bindParam(':telefono', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':asunto', $asunto);
            $stmt->bindParam(':mensaje', $mensaje);

            if ($stmt->execute()) {
                // Enviar correo electrónico
                $mail = new PHPMailer(true);

                try {
                    // Configuración del servidor
                    $mail->SMTPDebug = 0; 
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Cambia según tu servidor SMTP
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'michidogssoporte@gmail.com';                     //SMTP username
                    $mail->Password   = 'pwhminxcmtsnrveb'; 
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465; 

                    // Destinatarios
                    $mail->setFrom($email, $names);
                    $mail->addAddress('michidogssoporte@gmail.com'); // El correo de destino

                    // Contenido del correo
                    $mail->isHTML(true);
                    $mail->Subject = 'Nuevo mensaje de contacto: ' . $asunto;
                    $mail->Body    = '
                            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

                    <head>
                        <meta charset="UTF-8">
                        <meta content="width=device-width, initial-scale=1" name="viewport">
                        <meta name="x-apple-disable-message-reformatting">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta content="telephone=no" name="format-detection">
                        <title></title>
                        <!--[if (mso 16)]>
                        <style type="text/css">
                        a {text-decoration: none;}
                        </style>
                        <![endif]-->
                        <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
                        <!--[if gte mso 9]>
                    <xml>
                        <o:OfficeDocumentSettings>
                        <o:AllowPNG></o:AllowPNG>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                        </o:OfficeDocumentSettings>
                    </xml>
                    <![endif]-->
                        <!--[if !mso]><!-- -->
                        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,400i,700,700i" rel="stylesheet">
                        <!--<![endif]-->
                    </head>

                    <body>
                        <div dir="ltr" class="es-wrapper-color">
                            <!--[if gte mso 9]>
                                <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                                    <v:fill type="tile" color="#f6f6f6"></v:fill>
                                </v:background>
                            <![endif]-->
                            <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td class="esd-email-paddings" valign="top">
                                            <table cellpadding="0" cellspacing="0" class="es-header esd-header-popover" align="center">
                                                <tbody>
                                                    <tr>
                                                        <td class="es-adaptive esd-stripe" align="center">
                                                            <table class="es-header-body" width="580" cellspacing="0" cellpadding="0" align="center" bgcolor="#3b3636" style="border-top: 5px solid transparent; border-bottom: 5px solid transparent; background-color: #3b3636;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="esd-structure esdev-adapt-off" align="left">
                                                                            <table width="580" cellpadding="0" cellspacing="0" class="esdev-mso-table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="esdev-mso-td" valign="top">
                                                                                            <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td width="459" class="es-m-p0r esd-container-frame" valign="top" align="center">
                                                                                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td align="center" class="esd-block-text h-auto" height="115">
                                                                                                                            <p style="font-size: 34px; color: #ffffff; line-height: 100%; font-family: helvetica,arial, verdana, sans-serif;"><strong><span style="line-height: 100%;">MENSAJE DE CONTACTO RECIBIDO</span></strong></p>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td class="esdev-mso-td" valign="top">
                                                                                            <table class="es-right" cellpadding="0" cellspacing="0" align="right">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td width="121" align="left" class="esd-container-frame">
                                                                                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td align="center" class="esd-block-image es-p10t es-p40r es-m-txt-c" style="font-size: 0px;"><a target="_blank"><img src="https://ffuofqj.stripocdn.email/content/guids/CABINET_5785499cdfff6bf03aa878e6a4b03cd7c46d5860b936deae9b98915b74758690/images/logosin_fondo_Yp0.png" alt style="display: block;" width="81"></a></td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table cellpadding="0" cellspacing="0" class="es-header" align="center">
                                                <tbody>
                                                    <tr>
                                                        <td class="es-adaptive esd-stripe" align="center">
                                                            <table class="es-header-body" width="580" cellspacing="0" cellpadding="0" align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="esd-structure" align="left">
                                                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="esd-container-frame" width="580" valign="top" align="center">
                                                                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td class="esd-block-menu" esd-img-prev-h="16" esd-img-prev-w="16" esd-tmp-divider="20|solid|#dddabb" esd-tmp-menu-padding="5|0">
                                                                                                            <table class="es-menu" width="100%" cellspacing="0" cellpadding="0">
                                                                                                                <tbody>
                                                                                                                    <tr class="links">
                                                                                                                        <td class="es-p10t es-p10b es-p5r es-p5l" style="padding-bottom: 0px; padding-top: 5px;" width="100%" bgcolor="#333333" align="center"><a target="_blank" style="color: #ffffff;" href></a></td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                                <tbody>
                                                    <tr>
                                                        <td class="esd-stripe" align="center">
                                                            <table class="es-content-body" style="background-color: #fdfcdd;" width="580" cellspacing="0" cellpadding="0" bgcolor="#fdfcdd" align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="esd-structure esd-checked es-p15t es-p20r es-p20l" esd-general-paddings-checked="true" align="left">
                                                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="esd-container-frame" width="540" valign="top" align="center">
                                                                                            <table style="border-collapse: separate;" width="100%" cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align="left" class="esd-block-text es-p20t es-p20b" style="padding: 40px;" >
                                                                                                            <p style="font-size: 15px; font-family: helvetica, arial, sans-serif;"><strong>Nombre:&nbsp;</strong> '.$names.' </p>
                                                                                                            <p style="font-size: 15px; font-family: helvetica, arial, sans-serif;"><strong>Teléfono:</strong> '.$phone.' </p>
                                                                                                            <p style="font-size: 15px; font-family: helvetica, arial, sans-serif;"><strong>Email:</strong> '.$email.'</p>
                                                                                                            <p style="font-size: 15px; font-family: helvetica, arial, sans-serif;"><strong>Asunto:</strong> '.$asunto.'</p>
                                                                                                            <p style="font-size: 15px; font-family: helvetica, arial, sans-serif;"><strong>Mensaje:</strong> '.$mensaje.'</p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="esd-structure" align="left">
                                                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td width="580" class="esd-container-frame" align="center" valign="top">
                                                                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align="center" class="esd-block-image es-p5t es-p10b" style="font-size: 0px;"><a target="_blank"><img src="https://ffuofqj.stripocdn.email/content/guids/CABINET_5785499cdfff6bf03aa878e6a4b03cd7c46d5860b936deae9b98915b74758690/images/xd.jpg" alt style="display: block;" height="132"></a></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table cellpadding="0" cellspacing="0" class="es-footer esd-footer-popover" align="center">
                                                <tbody>
                                                    <tr>
                                                        <td class="esd-stripe" align="center">
                                                            <table class="es-footer-body" width="580" cellspacing="0" cellpadding="0" align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="esd-structure es-p15t es-p20b es-p20r es-p20l" esd-general-paddings-checked="true" align="left" style="border-radius: 5px;">
                                                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="esd-container-frame" width="540" valign="top" align="center">
                                                                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td class="esd-block-social es-p10b" align="center" style="font-size:0; background-color: #3b3636; ">
                                                                                                            <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Facebook" src="https://ffuofqj.stripocdn.email/content/assets/img/social-icons/logo-gray/facebook-logo-gray.png" alt="Fb" width="32" height="32"></a></td>
                                                                                                                        <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Twitter" src="https://ffuofqj.stripocdn.email/content/assets/img/social-icons/logo-gray/twitter-logo-gray.png" alt="Tw" width="32" height="32"></a></td>
                                                                                                                        <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Instagram" src="https://ffuofqj.stripocdn.email/content/assets/img/social-icons/logo-gray/instagram-logo-gray.png" alt="Inst" width="32" height="32"></a></td>
                                                                                                                        <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Youtube" src="https://ffuofqj.stripocdn.email/content/assets/img/social-icons/logo-gray/youtube-logo-gray.png" alt="Yt" width="32" height="32"></a></td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="esd-block-text es-p5t es-p5b" align="center" esd-links-underline="none" style="background-color: #3b3636; color: #ffffff;" >
                                                                                                            <p style="line-height: 21px;">© 2026 Michidogs. Todos los derechos reservados.<br></p>
                                                                                                            <p style="line-height: 21px;">Bogotá DC</p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </body>

                    </html>
                            ';

                    $mail->send();
                    $response['status'] = 'success';
                    $response['message'] = 'El mensaje ha sido enviado correctamente, Nos comunicaremos los mas pronto posible!.';
                } catch (Exception $e) {
                    $response['message'] = "El mensaje no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $response['message'] = 'Error al guardar el mensaje en la base de datos.';
            }
        } catch (PDOException $e) {
            $response['message'] = "Error de base de datos: " . $e->getMessage();
        }
    }

    // Respuesta JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';

class generarClave{
    public function enviarNuevaClave($email){

        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion -> get_conexion();
        $verificar = "SELECT * FROM usuarios WHERE usu_correo=:email";

        $result = $conexion -> prepare($verificar);
        $result -> bindParam(":email", $email);
        $result -> execute();

        $f = $result -> fetch();

        if($f){

            $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $longitud = 8;
            $nuevaContra = substr(str_shuffle($caracteres),0,$longitud);
            $emailFor = $f['usu_correo'];
            $contraMd = md5($nuevaContra);

            $id = ($f['id']);

            $actualizarClave = "UPDATE usuarios SET usu_contrasena=:contraMd WHERE id=:id";

            $result = $conexion->prepare($actualizarClave);
            $result -> bindParam(":id", $id);
            $result -> bindParam(":contraMd", $contraMd); 

            $result->execute();

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'michidogssoporte@gmail.com';                     //SMTP username
            $mail->Password   = 'pwhminxcmtsnrveb';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            //emisor
            $mail->setFrom('michidogssoporte@gmail.com', 'Soporte Michidgos');
            //receptor
            $mail->addAddress($emailFor);     //Add a recipient
           // $mail->addAddress('ellen@example.com');               //Name is optional
           // $mail->addReplyTo('info@example.com', 'Information');
           // $mail->addCC('cc@example.com');
           // $mail->addBCC('bcc@example.com');
        
            //Attachments
           // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
           // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->CharSet = "UTF-8";
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'RECUPERACION DE CONTRASEÑA || MICHIDOGS';
            $mail->Body    = '
           <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="es" style="padding:0;Margin:0">
            <head>
              <meta charset="UTF-8">
              <meta content="width=device-width, initial-scale=1" name="viewport">
              <meta name="x-apple-disable-message-reformatting">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta content="telephone=no" name="format-detection">
              <title>Nuevo mensaje</title><!--[if (mso 16)]>
                <style type="text/css">
                a {text-decoration: none;}
                </style>
                <![endif]--><!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!--[if gte mso 9]>
            <xml>
                <o:OfficeDocumentSettings>
                <o:AllowPNG></o:AllowPNG>
                <o:PixelsPerInch>96</o:PixelsPerInch>
                </o:OfficeDocumentSettings>
            </xml>
            <![endif]-->
              <style type="text/css">
            #outlook a {
              padding:0;
            }
            .ExternalClass {
              width:100%;
            }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
              line-height:100%;
            }
            .es-button {
              mso-style-priority:100!important;
              text-decoration:none!important;
            }
            a[x-apple-data-detectors] {
              color:inherit!important;
              text-decoration:none!important;
              font-size:inherit!important;
              font-family:inherit!important;
              font-weight:inherit!important;
              line-height:inherit!important;
            }
            .es-desk-hidden {
              display:none;
              float:left;
              overflow:hidden;
              width:0;
              max-height:0;
              line-height:0;
              mso-hide:all;
            }
            @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120%!important } h1 { font-size:30px!important; text-align:center } h2 { font-size:26px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:16px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:20px!important; display:block!important; padding-left:0px!important; padding-right:0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important } .h-auto { height:auto!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } }
            @media screen and (max-width:384px) {.mail-message-content { width:414px!important } }
            </style>
            </head>
            <body style="width:100%;font-family:verdana, geneva, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
              <div dir="ltr" class="es-wrapper-color" lang="es" style="background-color:#F6F6F6"><!--[if gte mso 9]>
                  <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                    <v:fill type="tile" color="#f6f6f6"></v:fill>
                  </v:background>
                <![endif]-->
              <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#F6F6F6">
                <tr style="border-collapse:collapse">
                  <td valign="top" style="padding:0;Margin:0">
                  <table cellpadding="0" cellspacing="0" class="es-header" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr style="border-collapse:collapse">
                      <td class="es-adaptive" align="center" style="padding:0;Margin:0">
                      <table class="es-header-body" cellspacing="0" cellpadding="0" align="center" bgcolor="#fff2cc" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#3b3636;border-top:5px solid transparent;width:580px;border-bottom:5px solid transparent" role="none">
                        <tr style="border-collapse:collapse">
                          <td class="esdev-adapt-off" align="left" style="padding:0;Margin:0">
                          <table cellpadding="0" cellspacing="0" class="esdev-mso-table" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:580px">
                            <tr style="border-collapse:collapse">
                              <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                              <table cellpadding="0" cellspacing="0" class="es-left" align="left" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                  <td class="es-m-p0r" valign="top" align="center" style="padding:0;Margin:0;width:459px">
                                  <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr style="border-collapse:collapse">
                                      <td align="center" height="115" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica,arial, verdana, sans-serif;line-height:43px;color:#ffffff;font-size:36px"><strong>CLAVE NUEVA GENERADA</strong></p></td>
                                    </tr>
                                  </table></td>
                                </tr>
                              </table></td>
                              <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                              <table class="es-right" cellpadding="0" cellspacing="0" align="right" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                  <td align="left" style="padding:0;Margin:0;width:121px">
                                  <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr style="border-collapse:collapse">
                                      <td align="center" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:10px;padding-right:40px;font-size:0px"><img src="https://ffuofqj.stripocdn.email/content/guids/CABINET_3bd76a577384bab22196b91e67aa8324f155ab163c9d6fb3f12980b288b12948/images/logosin_fondo_hrA.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="81"></td>
                                    </tr>
                                  </table></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
                  <table cellpadding="0" cellspacing="0" class="es-header" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr style="border-collapse:collapse">
                      <td class="es-adaptive" align="center" style="padding:0;Margin:0">
                      <table class="es-header-body" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#ffffff;width:580px">
                        <tr style="border-collapse:collapse">
                          <td align="left" style="padding:0;Margin:0">
                          <table width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td valign="top" align="center" style="padding:0;Margin:0;width:580px">
                              <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                  <td style="padding:0;Margin:0">
                                  <table class="es-menu" width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr class="links" style="border-collapse:collapse">
                                      <td style="Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:0px;border:0" width="100%" bgcolor="#333333" align="center"><a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;font-family:verdana, geneva, sans-serif;color:#ffffff;font-size:14px" href=""></a></td>
                                    </tr>
                                  </table></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
                  <table class="es-content" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                      <td align="center" style="padding:0;Margin:0">
                      <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#fdfcdd;width:580px" cellspacing="0" cellpadding="0" bgcolor="#fdfcdd" align="center" role="none">
                        <tr style="border-collapse:collapse">
                          <td align="left" style="padding:0;Margin:0;padding-top:15px;padding-left:20px;padding-right:20px">
                          <table width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td valign="top" align="center" style="padding:0;Margin:0;width:540px">
                              <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px" width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                <tr style="border-collapse:collapse">
                                  <td class="h-auto" align="center" valign="middle" height="207" style="Margin:0;padding-top:15px;padding-left:15px;padding-right:15px;padding-bottom:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:verdana, geneva, sans-serif;line-height:17px;color:#333333;font-size:14px">Estimado(a) usuario,</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:verdana, geneva, sans-serif;line-height:17px;color:#333333;font-size:14px">Hemos generado una nueva contraseña para tu cuenta. Te recomendamos cambiarla por una más segura y fácil de recordar lo antes posible. Mantén tus credenciales en un lugar seguro y no las compartas. Gracias por confiar en Michidogs.</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:verdana, geneva, sans-serif;line-height:22px;color:#ffa500;font-size:18px"><br></p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:verdana, geneva, sans-serif;line-height:22px;color:#ff9100;font-size:18px"><strong>Nueva Contraseña:</strong>  <br> <strong>'.$nuevaContra.'</strong> </p></td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                  <td align="center" style="padding:0;Margin:0;padding-bottom:40px;font-size:0px"><img class="adapt-img" src="https://ffuofqj.stripocdn.email/content/guids/CABINET_3bd76a577384bab22196b91e67aa8324f155ab163c9d6fb3f12980b288b12948/images/kristamangulsone9gz3wfhr65uunsplash.jpeg" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="426"></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
                  <table cellpadding="0" cellspacing="0" class="es-footer" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr style="border-collapse:collapse">
                      <td align="center" style="padding:0;Margin:0">
                      <table class="es-footer-body" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;width:580px">
                        <tr style="border-collapse:collapse">
                          <td align="left" style="Margin:0;padding-top:15px;padding-bottom:20px;padding-left:20px;padding-right:20px;border-radius:5px">
                          <table width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td valign="top" align="center" style="padding:0;Margin:0;width:540px">
                              <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                  <td align="center" style="padding:0;Margin:0;padding-bottom:10px;font-size:0">
                                  <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr style="border-collapse:collapse">
                                      <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px"><img title="Facebook" src="https://ffuofqj.stripocdn.email/content/assets/img/social-icons/logo-gray/facebook-logo-gray.png" alt="Fb" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></td>
                                      <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px"><img title="Twitter" src="https://ffuofqj.stripocdn.email/content/assets/img/social-icons/logo-gray/twitter-logo-gray.png" alt="Tw" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></td>
                                      <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px"><img title="Instagram" src="https://ffuofqj.stripocdn.email/content/assets/img/social-icons/logo-gray/instagram-logo-gray.png" alt="Inst" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></td>
                                      <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px"><img title="Youtube" src="https://ffuofqj.stripocdn.email/content/assets/img/social-icons/logo-gray/youtube-logo-gray.png" alt="Yt" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                  <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:verdana, geneva, sans-serif;line-height:21px;color:#FFFFFF;font-size:14px">© 2026 Michidogs. Todos los derechos reservados.<br></p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:verdana, geneva, sans-serif;line-height:21px;color:#FFFFFF;font-size:14px">Bogotá DC</p></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              </div>
            </body>
            </html>
                           ';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo '<script>alert(" Se ha generado una nueva contraseña en el correo electronico ")</script> ';
            echo "<script>location.href='../../index.php'</script>";
        } 

        catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
    
        //class GenerarClave{

    //public function enviarNuevaClave($identificacion,$email){
        
    //}
//}

    }
    else{
        echo '<script>alert(" La contraseña se envio a su correo ")</script> ';
        echo "<script>location.href='../../index.php'</script>";
        }
    }

}

?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../Src/phpmailer/src/PHPMailer.php';
require_once '../Src/phpmailer/src/Exception.php';
require_once '../Src/phpmailer/src/SMTP.php';


$My_Email = "";
$My_Name = "";
$Pwd = "";

// ---- Destinatario
$Cl_Email = "";
$Cl_Name = "Carlos";

// ---- Asunto del Mensaje
$Subject = "Estado de cuenta";

// ---- Pagina Web o Mensaje 
$Message = "";

// ---- Ruta de Archivo Abjunto 
$Files ="";

$mail = new PHPMailer(true);

try {

// ---- Configuracion
  $mail->isSMTP();
  $mail->SMTPDebug = 1;
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  $mail->Username = $My_Email;
  $mail->Password = $Pwd;
  $mail->SMTPOptions = array(
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    )
  );

// ---- Recipients
  $mail->setFrom($My_Email, $My_Name);
  $mail->addAddress(trim($Cl_Email), trim($Cl_Name));

// ---- Contenido del mensaje
  $mail->isHTML(true); 
  $mail->Subject = $Subject;
  $mail->Body = $Message;

// ---- Archivo Abjunto
  if(Empty($Files)) {
    $mail->addAttachment($Files);
  }
  
  $mail->send();

  echo 'Message has been sent';
} catch (Exception $e) {

  echo "Mailer Error: {$mail->ErrorInfo}";
}

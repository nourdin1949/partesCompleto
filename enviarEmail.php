<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

session_start();



// Carga la configuración

$config = parse_ini_file('configuracion/configEmail.ini');



$mail = new PHPMailer;

$mail->isSMTP();

// SMTPDebug = 0 -> desactivado (para uso en producción)

// SMTPDebug = 1 -> mensajes del cliente

// SMTPDebug = 2 -> mensajes del cliente y servidor

$mail->SMTPDebug = $config['SMTPDebug'];

$mail->Host = $config['host'];

$mail->Port = $config['port'];

$mail->SMTPAuth = $config['SMTPAuth'];

$mail->SMTPSecure = $config['SMTPSecure'];

// Usuario de google

$mail->Username = $config['username'];

// Clave

$mail->Password = $config['password'];

$mail->setFrom('daw.modulos@gmail.com', 'MODULO DAW');

// Los destinatarios se añaden con addAdrress()

$mail->addAddress($config['email'], $config['remitente']);

// Asunto del correo

$mail->Subject = $config['asunto'];

$mail->Body = 'Parte de mala conducta por desobedecer al profesor,para el alumno/a '. $_SESSION["alumno"];


//$mail->addAttachment('test.txt');



// Enviar

if (!$mail->send()) {

   echo 'Error en el envío: ' . $mail->ErrorInfo;

} else {

   echo 'El email ha sido enviado correctamente.';

}



?>
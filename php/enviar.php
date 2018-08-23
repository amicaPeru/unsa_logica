<?php
//Librerías para el envío de mail
include_once('class.phpmailer.php');
include_once('class.smtp.php');

//Recibir todos los parámetros del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$mensaje = $_POST['message'];
// para adjuntar archivos
// $archivo = $_FILES['carnet'];
// $archivo2 = $_FILES['ensayo'];
// $template="../email-template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje


//Este bloque es importante
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;

//Nuestra cuenta
$mail->Username ='logicayciencia@gmail.com';
$mail->Password = "logiciencia2018";

//Agregar destinatario
$mail->AddAddress("logicayciencia@unsa.edu.pe");
$mail->Subject = $name;
$mail->Body = 
	"Nombre: $name \n".
    "Email: $email \n".
    "Telefono: $phone \n".
    "Mensaje: $mensaje \n";
	
//Para adjuntar archivo
// $mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
// $mail->AddAttachment($archivo2['tmp_name'], $archivo2['name']);
//
// $message = file_get_contents($template);
// $message = str_replace('{{first_name}}', $mail_setFromName, $message);
// $message = str_replace('{{message}}', $txt_message, $message);
// $message = str_replace('{{customer_email}}', $mail_setFromEmail, $message);
// $mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
// $mail->msgHTML($message);


//Avisar si fue enviado o no y dirigir al index
if($mail->Send())
{
	echo'<script type="text/javascript">
			alert("Enviado Correctamente");
			window.location="http://www.logicayciencia.org";
		 </script>';
}
else{
	echo'<script type="text/javascript">
			alert("NO ENVIADO, intentar de nuevo");
		 </script>';
}
?>


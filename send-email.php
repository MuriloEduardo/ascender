<?php
require("./PHPMailer-6.6.0/src/PHPMailer.php");
require("./PHPMailer-6.6.0/src/SMTP.php");

$json = file_get_contents("php://input");
$object = json_decode($json);

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.zoho.com";
$mail->Port = 465;
$mail->IsHTML(true);
$mail->Username = "contato@ascenderti.com.br";
$mail->Password = "A198716.a";
$mail->SetFrom("contato@ascenderti.com.br");
$mail->Subject = "Novo contato do site de " . $object->name;
$mail->Body = "Nome: " . $object->name . "<br>Email: " . $object->email . "<br>Celular: " . $object->phone . "<br>Mensagem: " . $object->message;
$mail->AddAddress("contato@ascenderti.com.br");

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    return;
}
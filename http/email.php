<?php
$nome=$_POST['nome'];
$email=$_POST['email'];
$date=date("d/m/Y");
$msg=$_POST['mensagem'];
$mensagem= 'Esta mensagem foi enviada através do formulário<br><br>';
$mensagem.='<b>Nome: </b>'.$nome.'<br>';
$mensagem.='<b>E-Mail:</b> '.$email.'<br>';
$mensagem.='<b>Data de envio:</b> '.$date.'<br>';
$mensagem.='<b>Mensagem:</b><br> '.$msg;
require("phpmailer/src/PHPMailer.php");
require("phpmailer/src/SMTP.php");
require ("phpmailer/src/Exception.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host       = 'smtp-mail.outlook.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'resgate.animais3@hotmail.com';
$mail->Password   = 'resani333';
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->CharSet = 'UTF-8';

$mail->setFrom('resgate.animais3@hotmail.com', 'Site');
$mail->addAddress('resgate.animais3@hotmail.com');
$mail->addReplyTo($email, $nome);
$mail->isHTML(true);
$mail->Subject = 'Mensagem do site resgate de animais';
$mail->Body    = $mensagem;
$mail->AltBody = $mensagem;

if(!$mail->Send()) {
    echo "<script>alert('Erro ao enviar o E-Mail');window.location.assign('index.html');</script>";
 }else{
    echo "<script>alert('E-Mail enviado com sucesso!');window.location.assign('index.html');</script>";
 }
 die
?>
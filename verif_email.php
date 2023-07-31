<?php
session_start();
//connexion à la base de données
include "config.php";
if(isset($_POST['forgotpassword'])){
$email=$_POST['email'];

$user=$cnx->query("select * from clients where email='$email'")->fetch(PDO::FETCH_OBJ);

//vérifier l'utilisateur
if(!empty($user))
{
//send email
$to      = $email;
$subject = 'password reset';
$message = 'cliquez sur ce lien pour changer votre mot de passe : <a href="http://127.0.0.1:8989/chap1php/change_password.php?email='.$email.'"></a>';
$headers = 'From: aziz2pr@gmail.com' . "\r\n" .
'Reply-To: aziz2pr@gmail.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)){
    header("location:index.php?success=vérifier votre boite email!");
}

}else{
    header("location:index.php?error=cet email n'existe pas!");
}
}else{
    header("location:index.php");
}
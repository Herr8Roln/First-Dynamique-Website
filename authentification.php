<?php
session_start();
//connexion à la base de données
include "config.php";
if(isset($_POST['signin'])){
$email=$_POST['email'];
$password= $_POST['password'];

if ($email=="admin@gmail.com" and $password=="adminpsswd"  ) {
    header("location:affichageClients.php");

}

$user=$cnx->query("select * from clients where Email='$email'")->fetch(PDO::FETCH_OBJ);
$hash=$user->password;

//vérifier l'utilisateur
if(password_verify($password, $hash))
{
$_SESSION['IdClient ']=$user->IdClient ;
$_SESSION['email']=$email;
$_SESSION['password']=$password;

    header("location:affichageClients.php");
}else{
    header("location:index.php?error=verifier vos parametres de connexion!");
}
}else{
    header("location:index.php");
}
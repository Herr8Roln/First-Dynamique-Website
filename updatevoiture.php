<?php
include "config.php";

if(isset($_POST['upd'])){
    //recuperation des variables du formulaire
    $IdClient=$_POST['IdClient'];

    $nom=$_POST['Nom'];
    $prenom=$_POST['Prenom'];
    $email=$_POST['CodePostal'];
    $Localite=$_POST['Localite'];
    $Telephone=$_POST['Telephone'];
    $Email=$_POST['Email'];
    $photo_cin=$_POST['photo'];

    $error= controle([$nom,$prenom,$email,$Localite,$Telephone,$Email,$photo_cin],["IdClient ","Nom","Prenom","CodePostal","Localite","Telephone","Email","photo_cin"]);

    if(valid_email($email)==FALSE){
    $error.="<br>Veuillez vérifier le format de l'email";
    }

    if(!empty($error))
   header("location:list_inscrit.php?error=$error");
else{

    //mise a jour d'un inscrit selon l'id_inscrit
    $sql="update inscrits set nom='$nom',prenom='$prenom',email='$email',num_tel='$num_tel' where id_inscrit='$id_inscrit'";
    if($cnx->exec($sql)){
        header("location:list_inscrit.php?success=la modification est effectuée avec succes!");
    }
}

}

?>
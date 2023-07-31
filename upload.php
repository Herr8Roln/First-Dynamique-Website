<?php

function verif($file_name,$folder){
    $photo_name=time().$file_name;
if(file_exists($folder."/".$photo_name)){
    verif($file_name,$folder);
}else{
    return $photo_name;
}

}
//recupérer le nom du fichier
$photo_name=$_FILES['photo']['name'];
//renomer le nom du fichier
$photo_name=verif($photo_name,"uploads");
$error="";
//verifier le type du fichier (accepter que des images de type png, gif, jpeg, jpg)
if (($_FILES["photo"]["type"] != "image/gif")
&& ($_FILES["photo"]["type"] != "image/jpeg")
&& ($_FILES["photo"]["type"] != "image/jpg")
&& ($_FILES["photo"]["type"] != "image/png"))
{
    $error.="vérifier le type de votre fichier!<br>";
}

//vérifier la taille du fichier ne doit pas dépasser 2Mo
if($_FILES['photo']['size']/1024>2048){
    $error.="vérifier la taille de votre fichier!<br>";
}

//copier la copie temporaire dans le dossier /uploads/
//jusqu'a php 7.x (deprecated)
//move_uploaded_file($_FILES['photo']['name'],"uploads/$photo_name");
//à partir de php8.x
if(empty($error)){
copy($_FILES['photo']['tmp_name'],"uploads/$photo_name");
echo "success d'upload!";
}
else
echo $error."<a href='upload.html'><button>Réessayer</button></a>";

?>
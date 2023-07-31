<?php
    //connexion à la base de données
    $cnx = new PDO('mysql:host=localhost;dbname=location_de_voiture', "root", "");

if($_FILES['csv']['error']>0)
echo "une erreur s'est produite!";
else{
    //ouvrir le fichier en lecture
$file=fopen($_FILES['csv']['tmp_name'],"r");
    //parcourir le contenu du fichier et l'inserrer dan la base de données
    while (($row = fgetcsv($file, 10000, ",")) !== FALSE) {
       $sql="insert into emails(email) values('".$row[0]."')"; 
       //
       $result=$cnx->exec($sql);
}
if (! empty($result)) {
    $type = "success";
    $message = "Les Données sont importées dans la base de données";
  } else {
    $type = "error";
    $message = "Problème lors de l'importation de données CSV";
  }
  echo $message;
}
?>
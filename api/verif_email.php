<?php
include "../config.php";
//requete interne
if(isset($_POST['email'])){
$email=$_POST['email'];
$update=$_POST['update'];
$id_inscrit=$_POST['id_inscrit'];
}else{
//requete externe
$array=json_decode(file_get_contents('php://input'), true);
$email=$array['email'];
$update=$array['update'];
$id_inscrit=$array['id_inscrit'];
}
//vérifier l'existance de cet email dans la base de donnée
if($update==0)
$sql="select * from inscrits where email ='$email'";
else
$sql="select * from inscrits where email ='$email' and id_inscrit!='$id_inscrit'";

$record=$cnx->query($sql)->fetch(PDO::FETCH_OBJ);
if(!empty($record))
echo json_encode($record);
else
echo false;
?>
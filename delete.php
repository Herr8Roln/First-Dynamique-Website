<?php
include "config.php";

if(isset($_POST['supp'])){
    //recuperation des variables du formulaire
    $id_inscrit=$_POST['id_inscrit'];
    //supprimer un inscrit selon l'id_inscrit
    $sql="delete from inscrits where id_inscrit='$id_inscrit'";
    if($cnx->exec($sql)){
        header("location:list_inscrit.php?success=la suppression est effectuée avec succes!");
    }

}

?>
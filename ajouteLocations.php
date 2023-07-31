<?php

include "config.php";

function controle($tabvar,$tabfield){
    $errors="";
    foreach($tabvar as $indice=>$var){
    if(empty($var)){
        $errors.="Le champ ".$tabfield[$indice]." est obligatoire!<br>";
    }
}
    return $errors;

}
//recuperer les données du form
if(isset($_POST['submit'])){

    $IdClient=htmlentities($_POST['IdClient']);
    $IdLocation=htmlentities($_POST['IdLocation']);
    $immatriculation=htmlentities($_POST['immatriculation']);
    $DateDebut=htmlentities($_POST['DateDebut']);
    $DateFin=htmlentities($_POST['DateFin']);
    $DateRentree=htmlentities($_POST['DateRentree']);
    $message=controle([$IdClient,$IdLocation,$immatriculation,$DateDebut,$DateFin,$DateRentree],
    ["IdClient","IdLocation","immatriculation","DateDebut","DateFin","DateRentree"]);

    if(!empty($message))
    header("location:formulaireLocation.php?message=$message&type=danger");
    else{
        //insertion dans la base de données
        $sql="insert into locations (IdClient,IdLocation,immatriculation,DateDebut,DateFin,DateRentree) values('$IdClient','$IdLocation','$immatriculation','$DateDebut','$DateFin','$DateRentree')";
        echo $sql;
        if($cnx->exec($sql)){
            echo $sql;
            $message="insertion effectuée avec success!";
            header("location:formulaireLocation.php?message=$message&type=success");
        }
    }
}else{
    header("location:formulaireLocation.php");
}
?>
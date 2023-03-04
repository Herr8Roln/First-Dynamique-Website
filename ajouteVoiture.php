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

    $immat=htmlentities($_POST['immatriculation']);
    $Marque=htmlentities($_POST['marque']);
    $modele=htmlentities($_POST['Modele']);
    $cylindre=htmlentities($_POST['Cylindree']);
    $datea=htmlentities($_POST['dateachat']);
    $message=controle([$immat,$Marque,$modele,$cylindre,$datea],["immatriculation","marque","Modele","Cylindree","dateachat"]);

    if(!empty($message))
    header("location:formulaireVoiture.php?message=$message&type=danger");
    else{
        //insertion dans la base de données
        $sql="insert into voiture (immatriculation,marque,Modele,Cylindree,dateachat) values('$immat','$Marque','$modele','$cylindre','$datea')";
        echo $sql;
        if($cnx->exec($sql)){
            $message="insertion effectuée avec success!";
            header("location:formulaireVoiture.php?message=$message&type=success");
        }
    }
}else{
header("location:formulaireVoiture.php");
}
?>
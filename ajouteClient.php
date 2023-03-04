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

    $cin=htmlentities($_POST['cin']);
    $name=htmlentities($_POST['name']);
    $prenom=htmlentities($_POST['prenom']);
    $code=htmlentities($_POST['code']);
    $localite=htmlentities($_POST['localite']);
    $tel=htmlentities($_POST['tel']);
    $email=htmlentities($_POST['email']);
    $message=controle([$cin,$name,$prenom,$code,$localite,$tel,$email],["cin","name","prenom","code","localite","tel","email"]);

    if(!empty($message))
    header("location:formulaireClients.php?message=$message&type=danger");
    else{
        
        //insertion dans la base de données
        $sql="insert into clients (IdClient,Nom,Prenom,CodePostal,Localite,Telephone,Email) values('$cin','$name','$prenom','$code','$localite','$tel','$email');";
        echo $sql;
        if($cnx->exec($sql)){
            $message="insertion effectuée avec success!";
            header("location:formulaireClients.php?message=$message&type=success");
        }
    }
}else{
header("location:formulaireClients.php");
}
?>
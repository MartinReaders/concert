<?php

include "lib/init.php";

//ON indique que l'on retourne de foramt json
header("Content-type: application/json; charset=utf-8");


//verifie la connexion
if(! estConnecter()) {
    //On fabrique le tableu a retourner en json
    $result = ["cr"=>"CONN"];
    echo json_encode($result);

    //On le converti est on l'envoie
    exit;
}




$liste= utilisatuerConnecte()->listeMessageDejaLue();


//Fabrique le result en mode tableu
$result = [];
foreach ($liste as $msg){ //O, parcours le result de la recherhe messages par l'objet message
    $result[] = [
        "id"=>$msg->getId(),
        "expediteur"=>$msg->getExpediteur()->getNom(),
        "texte"=>$msg->getTexte(),
        "date" =>$msg->getDate(),
        "photo"=> $msg->getPhoto()
    ];

}

header("Content-type: application/json; charset=utf-8");
echo json_encode($result);



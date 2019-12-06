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




//$liste= utilisatuerConnecte()->listeMessageNonLus();
//$liste = utilisatuerConnecte()->listeMessageNonLus();

$result = utilisatuerConnecte()->ajaxTab();

header("Content-type: application/json; charset=utf-8");
echo json_encode($result);


//Fabrique le result en mode tableu
//$result = [];
//foreach ($liste as $msg){ //O, parcours les messages par l'objet message
//    $result[] = [
//        "id"=>$msg->getId(),
//        "expediteur"=>$msg->getExpediteur()->getNom(),
//        "texte"=>$msg->getTexte(),
//        "date" =>$msg->getDate()
//    ];
//
//}


//$liste = utilisatuerConnecte()->ajaxTab();
//var_dump($liste);




//
//$liste = utilisatuerConnecte()->listeMessageNonLus();
//
////constuire le tableu de resulatat
//var_dump($liste);
//$result = ["cr"=>"OK", "result"=>$liste];
//echo json_encode($result);


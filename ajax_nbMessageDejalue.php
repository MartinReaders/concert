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

$nbNonlu = utilisatuerConnecte()->nbMessagesDejaLus();

//constuire le tableu de resulatat

$result = ["cr"=>"OK", "result"=>$nbNonlu ];
echo json_encode($result);
<?php
/*
 * Controlleur pour Ajax remont le nombre de messages non lus de l'utilosatuer courant
 * Paramtre non
 * //Retour : format JSON
 *          (
 *              cr : compte-rendu de la requette : Ok(on a resuusi) CONN(connexion), NO(operation interdi) , KO (autre erruer)
 *              result : nb de message
 *
 *
 *
 *            )
 */



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

$nb = utilisatuerConnecte()->nbMessagesNonLus();

//constuire le tableu de resulatat

$result = ["cr"=>"OK", "result"=>$nb];
echo json_encode($result);
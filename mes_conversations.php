<?php

/*
 * Controleur charge de produire la page listane toute mes conversation
 *  Paramtres ; non
 */

include "lib/init.php";



include "lib/connexion_obligatoire.php";

//  s'assure que l'on a le droit a'afficher la liste des conversations :
//est - on connecte

include "lib/connexion_obligatoire.php";


//Recupere mes conversations (recupere une $liste de messages)
$messages = new message();
$liste = $messages->listeMessageNonLus(idutilisatuerConnecte());


//Afficher
include "templates/pages/liste_conversations.php";

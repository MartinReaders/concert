<?php

/*
 * Controille : gestion de la connection
 * Paramtres
 *          Post
 *              email
 *              password
 */

include "lib/init.php";

//on commence par deconnecter (on ca d'echec on sera do, sur de ne pa ertee sue une ancien conncetoion

deconnect();


//recuperation des elements saisi
$mail = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

//On va teste lesodes
$utilisatuer = new utilisatuer(); //Class utilisatuer va chrge

if($utilisatuer->verifie($mail, $password)){
    //on a pu se connceter
    connecte($utilisatuer);
    //On affihce oage liste_concerts

    //Recupere mes conversations (recupere une $liste de messages)
    $messages = new message();
    $liste = $messages->listeConversationsUser(idUtilisatuerConnecte());
    include "templates/pages/liste_concerts.php";
}else{
    include "templates/pages/connection.php";
}
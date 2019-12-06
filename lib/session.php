<?php
/*
 * Fonctions de gesion de la session
 */

/*
 * $_SESSION : tableu global recupere par session_sort (ce que l'on y stoke est recuepre dun aprrel durl a lautre
 *
 * on va stoiker 2 index
 *      User : id d'utilisatuer qui set connecte
 *      Connecte : true si on est connecte , false so in n'est pas connecte
 *
 *
 * Variable global: $utilisatuer: objet utilisateur correspandatn a l'utilisatuer connecte
 */

function estConnecter(){
    //Role : remontre si on est connetce ou pas
    //repour true si on est connecte , false sinon
    //Paramtres non

    if(isset($_SESSION["connecte"]) and $_SESSION["connecte"] === true){
        return true;
    } else{
        return false;
    }
}


function idUtilisatuerConnecte(){
    //Role : donner l'id de l'utilisatuer connecte (0 si non)
    //Reour id user ou 0
    //Paramtre : non
    if(! estConnecter()){
        return 0;
    }

    if(isset($_SESSION["user"])){
        return $_SESSION["user"];
    } else{
        return 0;
    }
}

function utilisatuerConnecte(){
    //Role : recupere l'objet correspendatn a l'utiloisatuer connecte
    //Rertour : objet utilisatuer charche
    //Paramtres : non

    //recupere la variable global
    global $utilisatuer;

    if(! isset($utilisatuer)){
        //On ne l'a pas charge
        $utilisatuer = new utilisatuer(idUtilisatuerConnecte());

    }
    return $utilisatuer;
}

function deconnect(){
    //Role deconection de lutilisatuer courant
    //Retour non
    //Paramtres non
    $_SESSION["connecte"] = false;
}

function connecte($utilisatuer){
    //Role connecter un utukusateru
    //Retour non
    //Parametrs ;
            //$utilisatuer  objet utilisatuer
    $_SESSION["connecte"] = true;
    $_SESSION["user"] = $utilisatuer->getId();

    $GLOBALS["utilisatuer"] = $utilisatuer;
}
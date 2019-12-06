<?php
/*
 *
 * Template: header de toutes  les pzgrd sien on est connecter
 * Parametres (varibale initialises: non)
 *(on recupere les info sir l'utiklisatuer connecte ou pas via la libraire de fonctions session.php
 *
 * Si on est pas connecte , on affiche header1 , si on n\'est connecte on affiche header2
 */

?>

<header>
    <img src="" alt="">
    <nav>
        <a class="" href="mes_concerts.php">Mes concerts</a>
        <a class="" href="recherche_concerts.php">Concerts organises</a>
        <a class="" href="recherche_concerts.php">Chercher un artiste</a>
    </nav>
    <div class="utilisatuer">
           <?= utilisatuerConnecte()->htmlNom() . " " . utilisatuerConnecte()->htmlPrenom() ?>
        <nav style="display: none">
            <a href="form_connection.php">Se deconnecter</a>
            <a href="mon_profil.php">Gerer mon compte</a>
        </nav>
    </div>
    <?php //Si on a deja echange des messages , on affiche l'icon de messagrie
    //Si message plus que 0 on affiche header_msg
    if(utilisatuerConnecte()->nbMessages() > 0 ){
        include "templates/fragments/header_msg.php";
    }
    ?>
</header>
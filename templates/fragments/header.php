<?php
/*
 *
 * Template: header de toutes  lespages
 * Parametres (varibale initialises: non)
 *(on recupere les info sir l'utiklisatuer connecte ou pas via la libraire de fonctions session.php
 *
 * Si on est pas connecte , on affiche header1 , si on n\'est connecte on affiche header2
 */
if( estConnecter()){
    include "templates/fragments/header2.php";
}else{
    include "templates/fragments/header1.php";
}
?>

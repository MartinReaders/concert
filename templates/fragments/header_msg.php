<?php
/*
 *
 * Template: div messagrie pour les header
 * Parametres (varibale initialises: non)
 *
 *
 * Si on est pas connecte , on affiche header1 , si on n\'est connecte on affiche header2
 */
?>

<div class="header_msg">

    <a href="mes_conversations.php" class="btn btn-primary">Messages :  <!--Il fuat mettre une imgae-->
    <span class="badge badge-light"><?= utilisatuerConnecte()->nbMessagesNonLus() ?></span>
    </a>
    <a href="mes_convertation_deja_lue.php" class="btn btn-secondary">Message deja lu :
    <i class="nonLue badge badge-light"> <?= utilisatuerConnecte()->nbMessagesDejaLus() ?></i>
    </a>
</div>

<?php

//conextion la base de donnes


ini_set('display_errors', 1);
error_reporting(E_ALL);

//Gere des seesions
session_start();


//Chargement et fonctions
include "lib/session.php";
include "lib/bdd.php";

include "classes/message.php";
include "classes/utilisatuer.php";



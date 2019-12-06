<?php
//Fonctions d'acces a la base de donnes

ini_set('display_errors', 1);
error_reporting(E_ALL);



function BDDopen() {
    //Role : initilasatioin (overture de la base de donnes
    //Retour : objet PDO correspandant a la base de donnes ouvret
    //Parametre non

    global $bdd;

    //Si la base n'est pas oivert , on l'ouvre
    if(! isset($bdd)){
        $bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql; dbname=khanpherian;charset=UTF8", "khanpherian", "Cypher42000");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    return $bdd;
}

function BDDselect($sql, $param){
    //Role : executer une reqiete de type SELECT
    //Retour : obj PDO_Statement(reqiete executer)
    //Paramtre:
        //$sql : texte de la requete a preparer (avec des paramtres: xxx)
        //$pram : tableu de lvalorasitaion des paramtres : xxx

    //Recupere la base de donnes ouvert
    $bdd = BDDopen();

    //Prapre la requete
    $req = $bdd->prepare($sql);

    //executer la requete
    if($req->execute($param) === false){
        echo "Erreur Requete : $sql";
        print_r($param);

    }

    //On reour la requezte exexuter
    return $req;
}

function BDDquery($sql, $param){
    //Role : executer une reqiete quelqoncea
    //Retour : nombre delement affecter (-1 si requete echoue)
    //Paramtre:
        //$sql : texte de la requete a preparer (avec des paramtres: xxx)
        //$pram : tableu de lvalorasitaion des paramtres : xxx

    //Recupere la base de donnes ouvert
    $bdd = BDDopen();

    //Prapre la requete
    $req = $bdd->prepare($sql);

    //executer la requete
    if($req->execute($param) === false){
        echo "Erreur Requete : $sql";
        print_r($param);
        return -1;

    }

    //On reour la requezte exexuter
    return $req->rowCount();
}

function BDDlastId(){
    //Role : recypere le dernier id cree
    //retour le deriner id
    //Paramtres : neatn


    //Recupere la base de donnes ouvert
    $bdd = BDDopen();

    //Retunr l'id
    return $bdd->lastInsertId();

}
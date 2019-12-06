<?php
/*
 * Classe : message
 *  Gestion des messages echanges (objet message du MCD

*/

include_once "lib/bdd.php";


class message
{
    protected $date;                //Date - heur du message
    protected $expediteur;          //Objet "utlisisatuer"
    protected $destinataire;        //Objet "utlisisatuer"
    protected $texte;               //Text du messgae
    protected $date_lecture;        //Date - heur de lecture (si non lu : null si
    protected $archive;             //"O" ou "N"

    //Attributs supplementers du modele physique
    protected $id;                  //Id dans la base de donnes (0 si pas d'id

    //CONSTRUCT
    public function __construct($id = null)
    {
        //Role : construct, automatiquemnt appele apres une insaqtction de l'objet new meassge
        //                  Initialsitaiin les different attribus de l(objet
        //Retour : neant
        //Parametres:
        //          $id : id du message a charher (optionel
        //Si on dinne un id , on charge l'ibjet , sinon , onm et des valuers par defaut
        if (!is_null($id)) {
            //On charege l'objet a partitre de son id(utilisation de la methode loadFromId())
            $this->loadFromId($id);
        } else {
            //On donne des valuers par defaut aux attributs
            $this->id = 0;
            $this->date = date('Y-m-d H:i:s');
            $this->expediteur = new utilisatuer();
            $this->destinataire = new utilisatuer();
            $this->texte = "";
            $this->date_lecture = null;
            $this->archive = "N";
        }
    }

    //Methode pour changer des attributs

    public function setId($id){
        $this->id=$id;
        return true;
    }
    public function setDate($date)
    {
        //Role : initialiser l'attribut date a partire de la valeur passe
        //Retour trou si reussit ,false sinon
        //Parametres :
        //$date: date a donner ("YYYY-MM-JJ HH:mm:ii)

        //Il faut contrioller que la date est valid

        //Changer la valeur d'alltrinut
        $this->date = $date;
        return true;
    }

    public function setExpediteur($id)
    {
        //Role : changer la val de lattriubt expedituer
        //Retour trou si reussit ,false sinon
        //Paramtres :
        //$id : id de l'utlidsatuer expedituer(null si on veux "vider" lexpedituer)

        //On fabrique l'objet utlisiteur a partirt de l'id
        $this->expediteur = new utilisatuer($id);
        return true;
    }

    public function setDestinataire($id)
    {
        //Role : changer la val de lattriubt destinataire
        //Retour trou si reussit ,false sinon
        //Paramtres :
        //$id : id de l'utlidsatuer destinataire(null si on veux "vider" destinataire)

        //On fabrique l'objet utlisiteur a partirt de l'id
        $this->destinataire = new utilisatuer($id);
        return true;
    }

    public function setTexte($texte)
    {
        //Role : initialiser l'attribut text a partire de la valeur passe
        //Retour trou si reussit ,false sinon
        //Parametres :
        //$texte : text du message


        //Il faut contrioller que la date est valid

        //Changer la valeur d'alltrinut
        $this->texte = $texte;
        return true;
    }

    public function setDate_lecture($date)
    {
        //Role : initialiser l'attribut date_lecture a partire de la valeur passe
        //Retour trou si reussit ,false sinon
        //Parametres :
        //$date: date a donner ("YYYY-MM-JJ HH:mm:ii)

        //Il faut contrioller que la date est valid

        //Changer la valeur d'alltrinut
        $this->date_lecture = $date;
        return true;
    }

    public function setArchive($val)
    {
        //Role : initialiser l'attribut archive a partire de la valeur passe
        //Retour trou si reussit ,false sinon
        //Parametres :
        //$val : O ou N (Selon que ces archvere uo pas)

        //Il faut contrioller que la date est valid


        //Changer la valeur d'alltrinut
        if ($val === "O" or $val === "o") {
            $this->archive = "O";
        } else {
            $this->archive = "N";
        }
        return true;
    }

    public function setFromTab($tab)
    {
//        Role : chanfer la valeur de plusieurs attributs
//        Retour : true
//        Paramtres:
//        $tab : tableu dont les index sont les noms des attrinuts a changer et les valeurs adonner
//        Pour chaque attribut:
//        Si il est dans le tableu
//        Changer sa valeur par la mehode setXxx


        foreach (["id","date", "expediteur", "destinataire", "texte", "date_lecture", "archive"] as $nomAttribut) {
            //l'attribut $$nomAttribut est dan le tableu (en index)
            if (isset($tab[$nomAttribut])) {
                //Pn a truve l'attribut : on constuirit le nom de la methode
                $setter = "set" . ucfirst($nomAttribut);
                $this->$setter($tab[$nomAttribut]);
            }
        }
        return true;
    }

//        if (isset($tab["id"])) {
//
//            $this->id = $tab["id"];
//
//        }
//
//        if (isset($tab["date"])) {
//
//            $this->setDate($tab["date"]);
//
//        }
//
//        if (isset($tab["expediteur"])) {
//
//            $this->setExpediteur($tab["expediteur"]);
//
//        }
//
//        if (isset($tab["destinataire"])) {
//
//            $this->setDestinataire($tab["destinataire"]);
//
//        }
//
//        if (isset($tab["texte"])) {
//
//            $this->setTexte($tab["texte"]);
//
//        }
//
//        if (isset($tab["date_lecture"])) {
//
//            $this->setDate_lecture($tab["date_lecture"]);
//
//        }
//
//        if (isset($tab["archive"])) {
//
//            $this->setArchive($tab["archive"]);
//
//        }
//
//        return true;
//    }

    //ACEDER aux attributs
    public function getId()
    {
        //Role recupere l'id curant
        //retour l'id currant (0 = pas d'id)
        //Paramtres non
        return $this->id;
    }

    public function getDate()
    {
        //Role recupere date curant
        //retour date currant  ("YYYY-MM-JJ HH:mm:ss" ou null)
        //Paramtres non
        return $this->date;

    }

    public function getTexte()
    {
        //Role recupere date curant
        //retour date currant  ("YYYY-MM-JJ HH:mm:ss" ou null)
        //Paramtres non
        return $this->texte;

    }

    public function getExpediteur()
    {
        //Role recupere expediteobjet
        //Reour expediteur (obj utlisatuer)
        //Paramtres non
        return $this->expediteur;

    }

    public function getDestinataire()
    {
        //Role recupere Destinataire
        //Reour Destinataire (obj utlisatuer)
        //Paramtres non
        return $this->destinataire;

    }

    public function getDate_lecture()
    {
        //Role recupere date curant
        //retour date lecture currant  ("YYYY-MM-JJ HH:mm:ss" ou null)
        //Paramtres non
        return $this->date_lecture;

    }

    public function getArchive()
    {
        //Role recupere linformation archvie
        //retour O iu N
        //Paramtres non
        return $this->archive;

    }


    //REcupere les attributes en foramt affichable

    public function htmlDate()
    {
        //Role recupere date curant
        //retour date currant  ("YYYY-MM-JJ HH:mm:ss" ou null)
        //Paramtres non
        return htmlentities($this->date);

    }

    public function htmlText()
    {
        //Role recupere date curant
        //retour date currant  ("YYYY-MM-JJ HH:mm:ss" ou null)
        //Paramtres non
        return htmlentities($this->texte);

    }


    public function htmlExpediteur()
    {
        //Role recupere expediteobjet
        //Reour expediteur (obj utlisatuer)
        //Paramtres non
        return htmlentities($this->expediteur->getPrenom() . " " . $this->expediteur->getPrenom());

    }

    public function htmlDestinataire()
    {
        //Role recupere Destinataire
        //Reour Destinataire (obj utlisatuer)
        //Paramtres non
        return htmlentities($this->destinataire->getPrenom() . " " . $this->destinataire->getPrenom());

    }

    public function htmlDate_lecture()
    {
        //Role recupere date curant
        //retour date lecture currant  ("YYYY-MM-JJ HH:mm:ss" ou null)
        //Paramtres non
        if (is_null($this->date_lecture)) {
            return "non lu";
        } else {
            return htmlentities($this->date_lecture);
        }


    }

    public function htmlArchive()
    {
        //Role recupere linformation archvie
        //retour O iu N
        //Paramtres non
        return $this->archive;

    }


    //METHODE d"acces a la bas de done
    public function loadFromId($id)
    {
        //Role : recupere les attributs de l'objet dans le base de donnee
        //retou true si trouve false sinon
        //Paramtrees id de rechecrte

        //initaliastion SQL et paramtres:
        $sql = "SELECT * FROM `message` WHERE `id`=:id";
        $param = [":id" => $id];

        //Passe le requete
        $req = BDDselect($sql, $param);

        //Lire la premier ligne
        $ligne = $req->fetch(PDO::FETCH_ASSOC);

        //Si la ligne nest pas vide on remolir l'objet
        if (!empty($ligne)) {
            $this->setFromTab($ligne);
            return true;
        } else {
            $this->id = 0;
            return false;
        }
    }

    public function insert()
    {
        //Role: cree meassge dans la base de donet
        //Retour triue si resuiti false sinon
        //Paramtyres non

        //initaliastion SQL et paramtres:
        $sql = "INSERT INTO `message` SET `date`= :date, `expediteur`=:expediteur, `destinataire`=:destinataire, `text`=:texte, `date_lecture`=:date_lecure, `archive`=:archive";
        $param = ["date" => $this->date, ":expediteur" => $this->expediteur->getId(), ":destinataire" => $this->destinataire->getId(), ":text" => $this->texte, ":date_lecure" => $this->date_lecture, ":archive" => $this->archive];

        //Passe le requete
        if (BDDquery($sql, $param) === 1) {
            $this->id = BDDlastId();      //On met a jour id
            return true;
        } else {
            echo "Eroore cration Message";
            return false;
        }
    }

    public function update()
    {
        //Role: met a jour l'objet courtant dans la base de donet
        //Retour triue si resuiti false sinon
        //Paramtyres non

        //initaliastion SQL et paramtres:
        $sql = "UPDATE `message` SET `date`= :date, `expediteur`=:expediteur, `destinataire`=:destinataire, `text`=:texte, `date_lecture`=:date_lecure, `archive`=:archive WHERE `id`=:id";
        $param = ["date" => $this->date, ":expediteur" => $this->expediteur->getId(), ":destinataire" => $this->destinataire->getId(), ":text" => $this->texte, ":date_lecure" => $this->date_lecture, ":archive" => $this->archive, ":id" => $this->id];

        //Passe le requete
        if (BDDquery($sql, $param) !== 1) {
            return true;
        } else {
            echo "Eroore mise a jour message" . $this->id;
            return false;
        }
    }

    public function delete()
    {
        //Role : suprimer lbojet courabt de la base de donner
        //retou true si trouve false sinon
        //Paramtree non

        //initaliastion SQL et paramtres:
        $sql = "DELETE * FROM `message` WHERE `id`=:id";
        $param = [":id" => $this->id];

        //Passe le requete
        if (BDDquery($sql, $param) !== -1) {
            return true;
        } else {
            echo "Eroore de suppression message" . $this->id;
            return false;
        }
    }

    //Etablissement de listes
        //-les messges d'une conversation
        //les converstion d'un utlistauer


    public function listeMessagesConresation($user1, $user2)
{
    //Role : extriare une liste des messages d'une convertaiton
    //Retour : tableu d'objet  messages (index par l'id du message)
    //Paramtres:
    //$user1: id d'un des 2 interlcuters
    //$user2 : id de l'autre intercolteur

    $sql = "SELECT * FROM `message` WHERE "
        . " (`expediteur`=:user1 AND `destinataire`=:user2)"
        . "OR (`expediteur`=:user2 AND `destinataire`=:user1) "
        . "ORDER BY `date`";


    $param = [":user1" => $user1, ":user2" => $user2];

    //Passe le requete
    $req = BDDselect($sql, $param);

    $result = [];           //  ON part d'un tableu vide
    //TAnt que on a une ligne recuepre par la requetre
    while (($ligne = $req->fetch(PDO::FETCH_ASSOC)) != false) {
        $message = new message();
        $message->setFromTab($ligne);
        $result[$message->getId()] = $message;
    }

    //On renvoie le resumt
    return $result;

}

    public function listeConversationsUser($user)
    {
        //Role : liste les conversation d'un utilisateur (les dentiers messages de chaque conversation
        //retour : liste (tableu indexe par l'id) d'objet  messages
        //Paramtres :
        //$user : utilisatuer dont on cherche les conversation

        //Allezr chercher tous les interlociteurs que l'on a eu dans des messgaes
        $sql = "SELECT DISTINCT IF(`expediteur`= :user, `destinataire`,`expediteur`) AS 'interlocuteur' FROM `message` "
            . " WHERE `expediteur`=:user OR `destinataire`=:user ORDER BY `date` DESC";
        //Le IF (conditions , val si vair , val si faux ) permetre dans ce cas remonter l'intercouter:
        //la condtions (`expediteur =:user`) : teste si lexpedituet est utilisatuer conecrne
        //si oi il es lexipirtur , donc son ontercouter est destinatuer
        // Si non son interlocuter est lexipidteru
        $param = [":user" => $user];
        $req = BDDselect($sql, $param);

        $result = [];  //Tab de resumt
        //Pour chaque interlocuerte : recupere le message le pkus recent echanger et lajouter dans le tableu
        while (($ligne = $req->fetch(PDO::FETCH_ASSOC)) != false) {

            $interlocuteur = $ligne["interlocuteur"];
            //On recupere le deriner messge aved cet interlocuteur
            $lastMessage = $this->lastMessage($user, $interlocuteur);
            if($lastMessage !== false){
                $result[$lastMessage->getId()] = $lastMessage;
            }
        }

        return $result;

    }

    public function lastMessage($user1, $user2)
    {
        //Role : recupere le dernier change entree 2 persone
        //rertour un objet message ou false
        //Paramtres

        $sql = "SELECT * FROM `message` WHERE "
            . " (`expediteur`=:user1 AND `destinataire`=:user2)"
            . "OR (`expediteur`=:user2 AND `destinataire`=:user1) "
            . "ORDER BY `date` DESC LIMIT 1";  //On trier de plus recent au pmus anicet et on presn que la premoer


        $param = [":user1" => $user1, ":user2" => $user2];

        //Passe le requete
        $req = BDDselect($sql, $param);

        //On recupere
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if ($ligne === false) {
            return false;
        } else {
            $message = new message();
            $message->setFromTab($ligne);
            return $message;
        }

    }

    public function nbMessages($id){
        //Role : compte le nombre de messages d'un uitlisteur
        //Retour : nb de message
        //Paramtres
                //$id: id de l'utiolistuer
        //Requete SQL
        $sql = "SELECT COUNT(`id`) AS 'nb' FROM `message` WHERE `expediteur`=:user OR `destinataire`=:user";
        $param = [":user" =>$id];

        //Executer la requete
        $req = BDDselect($sql, $param);
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne === false){
            return 0;
        }else{
            //AS nb = id
            return $ligne["nb"];
        }
    }
    public function nbMessagesNonLus($id){
        //Role : compte le nombre de messages d'un uitlisteur
        //Retour : nb de message
        //Paramtres
                //$id: id de l'utiolistuer
        //Requete SQL
        $sql = "SELECT COUNT(`id`) AS 'nb' FROM `message` WHERE `destinataire`=:user AND `date_lecture` IS NULL ";
        $param = [":user" =>$id];

        //Executer la requete
        $req = BDDselect($sql, $param);
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne === false){
            return 0;
        }else{
            //AS nb = id
            return $ligne["nb"];
        }
    }


    public function nbMessagesDejaLus($id){
        //Role : compte le nombre de messages d'un uitlisteur
        //Retour : nb de message
        //Paramtres
        //$id: id de l'utiolistuer
        //Requete SQL
        $sql = "SELECT COUNT(`id`) AS 'nb' FROM `message` WHERE `destinataire`=:user AND `date_lecture` IS NOT NULL ";
        $param = [":user" =>$id];

        //Executer la requete
        $req = BDDselect($sql, $param);
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne === false){
            return 0;
        }else{
            //AS nb = id
            return $ligne["nb"];
        }
    }

    public function listeMessageNonLus($id){
        //Role prendre tous les message qui sin no pas lus
        //Parametres id de litutilisateur
        //reour les messages non lue, false sinin

        $sql = "SELECT * FROM `message` WHERE `destinataire`=:user AND `date_lecture` IS NULL";
        $param = [":user" => $id];
        $req = BDDselect($sql, $param);

        $result = [];  //tableu de resumt
        //Parcout des lignes
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)){
            //$ligne est un tableu contentant un categorie
            //en faire in objet
            $message = new message();
            $message ->setFromTab($ligne);  //obj message

            $result[$ligne["id"]] = $message;
        }
        return $result;


    }

    public function listeMessagesDejaLue($id){
        //Role prendre tous les message qui son deja lue
        //Parametres id de litutilisateur
        //reour les messages deja lue, false sinin

        $sql = "SELECT * FROM `message` WHERE `destinataire`=:user AND `date_lecture` IS NOT NULL";
        $param = [":user" => $id];
        $req = BDDselect($sql, $param);

        $result = [];  //tableu de resumt
        //Parcout des lignes
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)){
            //$ligne est un tableu contentant un categorie
            //en faire in objet
            $message = new message();
            $message ->setFromTab($ligne);  //obj message

            $result[$ligne["id"]] = $message;
        }
        return $result;


    }

    public function ajaxtab($id){
        //Role transofrme ajax en table
        //Paramtres $id de message courant
        //Retour tableu
        $message = new message();
        $liste = $message->listeMessageNonLus($id);
        $result = [];
        foreach ($liste as $msg) {
            $result[] = [
                "id"=>$msg->getId(),
                "expediteur"=>$msg->getExpediteur()->getNom(),
                "texte"=>$msg->getTexte(),
                "date" =>$msg->getDate()
            ];

        }
        return $result;

        }

    }

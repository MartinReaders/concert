<?php


class utilisatuer
{
    protected $email;
    protected $nom;
    protected $prenom;
    protected $password;
    protected $notification;             //"O" ou "N"

    //Attributs supplementers du modele physique
    protected $id;                  //Id dans la base de donnes (0 si pas d'id

    //CONSTRUCT
    public function __construct($id = null)
    {
        //Role : construct, automatiquemnt appele apres une insaqtction de l'objet new meassge
        //                  Initialsitaiin les different attribus de l(objet
        //Retour : neant
        //Parametres:
        //          $id : id uyilistauer a charher (optionel
        //Si on dinne un id , on charge l'ibjet , sinon , onm et des valuers par defaut
        if (!is_null($id)) {
            //On charege l'objet a partitre de son id(utilisation de la methode loadFromId())
            $this->loadFromId($id);
        } else {
            //On donne des valuers par defaut aux attributs
            $this->id = 0;
            $this->email = "";
            $this->nom = "";
            $this->prenom = "";
            $this->password = "";
            $this->notification = "Y";
        }
    }

    public function setId($val)
    {
        //Role : initialiser l'attribut email a partire de la valeur passe
        //Retour trou si reussit ,false sinon
        //Parametres :
        //$val: valeur

        //Il faut contrioller que la date est valid

        //Changer la valeur d'alltrinut
        $this->id = $val;
        return true;
    }

    public function setEmail($val)
    {
        //Role : initialiser l'attribut email a partire de la valeur passe
        //Retour trou si reussit ,false sinon
        //Parametres :
        //$val: valeur

        //Il faut contrioller que la date est valid

        //Changer la valeur d'alltrinut
        $this->email = $val;
        return true;
    }


    public function setNom($val)
    {
        //Role : initialiser l'attribut dnom a partire de la valeur passe
        //Retour trou si reussit ,false sinon
        //Parametres :
        //$val: valeur

        //Il faut contrioller que la date est valid

        //Changer la valeur d'alltrinut
        $this->nom = $val;
        return true;
    }


    public function setPrenom($val)
    {
        //Role : initialiser l'attribut dnom a partire de la valeur passe
        //Retour trou si reussit ,false sinon
        //Parametres :
        //$val: valeur

        //Il faut contrioller que la date est valid

        //Changer la valeur d'alltrinut
        $this->prenom = $val;
        return true;
    }


    public function setPassword($val)
    {
        //Role : initialiser l'attribut dnom a partire de la valeur passe
        //Retour trou si reussit ,false sinon
        //Parametres :
        //$val: valeur

        //Il faut contrioller que la date est valid

        //Changer la valeur d'alltrinut
        $this->password = $val;
        return true;
    }



    public function setNotification($val)
    {
        //Role : initialiser l'attribut archive a partire de la valeur passe
        //Retour trou si reussit ,false sinon
        //Parametres :
        //$val : O ou N (Selon que ces archvere uo pas)

        //Il faut contrioller que la date est valid


        //Changer la valeur d'alltrinut
        if ($val === "O" or $val === "o") {
            $this->notification = "O";
        } else {
            $this->notification = "N";
        }
        return true;
    }

    public function setFromTab($tab)
    {
        //Role : chanfer la valeur de plusieurs attributs
        //Retour : true
        //Paramtres:
        //$tab : tableu dont les index sont les noms des attrinuts a changer et les valeurs adonner
        //Pour chaque attribut:
        //Si il est dans le tableu
        //Changer sa valeur par la mehode setXxx

        foreach (["id","email", "nom", "prenom", "password", "notification"] as $nomAttribut) {
            //l'attribut $$nomAttribut est dan le tableu (en index)
            if (isset($tab[$nomAttribut])) {
                //Pn a truve l'attribut : on constuirit le nom de la methode
                $setter = "set" . ucfirst($nomAttribut);
                $this->$setter($tab[$nomAttribut]);
            }
        }
        return true;
    }



    //ACEDER aux attributs
    public function getId()
    {
        //Role recupere l'id curant
        //retour l'id currant (0 = pas d'id)
        //Paramtres non
        return $this->id;
    }

    public function getEmail()
    {
        //Role recupere date curant
        //retour date currant  ("YYYY-MM-JJ HH:mm:ss" ou null)
        //Paramtres non
        return $this->email;

    }

    public function getNom()
    {
        //Role recupere expediteobjet
        //Reour expediteur (obj utlisatuer)
        //Paramtres non
        return $this->nom;

    }

    public function getPrenom()
    {
        //Role recupere Destinataire
        //Reour Destinataire (obj utlisatuer)
        //Paramtres non
        return $this->prenom;

    }


    public function getNotification()
    {
        //Role recupere linformation archvie
        //retour O iu N
        //Paramtres non
        return $this->notification;

    }

    //REcupere les attributes en foramt affichable

    public function htmlEmail()
    {
        //Role l'amil en foramt affichable
        //retour emaiol
        //Paramtres non
        return htmlentities($this->email);

    }

    public function htmlNom()
    {
        //Role recupere date curant
        //retour date currant  ("YYYY-MM-JJ HH:mm:ss" ou null)
        //Paramtres non
        return htmlentities($this->nom);

    }

    public function htmlPrenom()
    {
        //Role recupere date curant
        //retour date currant  ("YYYY-MM-JJ HH:mm:ss" ou null)
        //Paramtres non
        return htmlentities($this->prenom);

    }

    public function htmlNotification()
    {
        //Role recupere date curant
        //retour date currant  ("YYYY-MM-JJ HH:mm:ss" ou null)
        //Paramtres non
        return htmlentities($this->notification);

    }




    //METHODE d"acces a la bas de done
    public function loadFromId($id)
    {
        //Role : recupere les attributs de l'objet dans le base de donnee
        //retou true si trouve false sinon
        //Paramtrees id de rechecrte

        //initaliastion SQL et paramtres:
        $sql = "SELECT * FROM `utilisateur` WHERE `id`=:id";
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
        $sql = "INSERT INTO `utilisateur` SET `email`= :email, `nom`=:nom, `prenom`=:ptrnom, `password`=:password, `notif`=:notif";
        $param = [":email" => $this->email, ":nom" => $this->nom, ":prenom" => $this->prenom, ":password" => $this->password, ":notif" => $this->notification];

        //Passe le requete
        if (BDDquery($sql, $param) === 1) {
            $this->id = BDDlastId();      //On met a jour id
            return true;
        } else {
            echo "Eroore cration Util";
            return false;
        }
    }

    public function update()
    {
        //Role: met a jour l'objet courtant dans la base de donet
        //Retour triue si resuiti false sinon
        //Paramtyres non

        //initaliastion SQL et paramtres:
        $sql = "UPDATE `utilisateur` SET `email`= :email, `nom`=:nom, `prenom`=:ptrnom, `password`=:password, `notif`=:notif";
        $param = [":email" => $this->email, ":nom" => $this->nom, ":prenom" => $this->prenom, ":password" => $this->password, ":notif" => $this->notification];

        //Passe le requete
        if (BDDquery($sql, $param) !== 1) {
            return true;
        } else {
            echo "Eroore mise a jour utilisatuer" . $this->id;
            return false;
        }
    }

    public function delete()
    {
        //Role : suprimer lbojet courabt de la base de donner
        //retou true si trouve false sinon
        //Paramtree non

        //initaliastion SQL et paramtres:
        $sql = "DELETE * FROM `utilisateur` WHERE `id`=:id";
        $param = [":id" => $this->id];

        //Passe le requete
        if (BDDquery($sql, $param) !== -1) {
            return true;
        } else {
            echo "Eroore de suppression utilisatuer" . $this->id;
            return false;
        }
    }


    //Information specefiques
    public function nbMessages(){
        //Role : retourne le nombre de messages echanges par utlisatuer charge
        //Retour : nb de smessages
        //Paramtres : non


        //On a pas utilisater charge : on retourne 0
        if(empty($this->id)){
            return 0 ;
        }

        //ON insatncie un objet message
        $message = new message();
        return $message->nbMessages($this->id);


    }

    public function nbMessagesNonLus(){
        //Role : retourne le nombre de messages  non lu par utlisatuer charge
        //Retour : nb de smessages
        //Paramtres : non


        //On a pas utilisater charge : on retourne 0
        if(empty($this->id)){
            return 0 ;
        }

        //ON insatncie un objet message
        $message = new message();
        return $message->nbMessagesNonLus($this->id);


    }

    public function nbMessagesDejaLus(){
        //Role : retourne le nombre de messages  non lu par utlisatuer charge
        //Retour : nb de smessages
        //Paramtres : non


        //On a pas utilisater charge : on retourne 0
        if(empty($this->id)){
            return 0 ;
        }

        //ON insatncie un objet message
        $message = new message();
        return $message->nbMessagesDejaLus($this->id);


    }

        public function listeMessageNonLus(){
        //Role : rtetouyrne tou les messgaes non lus
        //Repour tou les message non lu
            //Parametrs non

            //On a pas util on retoiurn 0
            if(empty($this->id)){
                return 0 ;
            }

            //on a objet message
            $message = new message();
            return $message->listeMessageNonLus($this->id);
        }

        public function listeMessageDejaLue(){
        //Role : rtetouyrne tou les messgaes non lus
        //Repour tou les message non lu
            //Parametrs non

            //On a pas util on retoiurn 0
            if(empty($this->id)){
                return 0 ;
            }

            //on a objet message
            $message = new message();
            return $message->listeMessagesDejaLue($this->id);
        }

    public function verifie($mail,$password){
        //Role : verififer si utilisatuer a cet email et password
                //Charge dans l'objet courant si oui
        //Rertour true si oui , false sinon
        //Paramtres:
                //$mail ; email
                //$Password : mot de pase
        //Cherche l'utilisatuer qui a cet (email est unique)
        $sql = "SELECT * FROM `utilisateur` WHERE `email`=:email";
        $req = BDDselect($sql, [":email"=>$mail]);
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne === false){
            return false;
        }
        //On a trouve
        //On copare les mots de pasee
        if($ligne["password"] === $password){
            //On a toruve
            $this->setFromTab($ligne);
            return true;
        }else{
            //le mote de passe ne corresponde pas
            return false;
        }
    }

    public function ajaxTab(){
        //Role : rtetouyrne tou les messgaes deja lu en form tableu
        //Repour tou les message d'uttilisatuer courant non lu en tableu
        //Parametrs non
        if(empty($this->id)){
            return 0 ;
        }

        //on a objet message
        $message = new message();
        return $message->ajaxtab($this->id);
    }



}
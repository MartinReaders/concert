/*
Fonctions et initalisations pour la messagerie
 */

function demandeNbMessages() {
    //Role dema,der au servar le nombre de messages non lus et de positioiner la fonction qui sera declance a la reception de resultat
    //retour non
    //paramter non

    //Demander au server la mise a jour du nombre de message
    $.ajax("ajax_nbMessages.php",{
        method: "POST",
        data: {},
        success: updateNbMessages,
        error: function () {
            alert("ajax");
        }
    });
}

function updateNbMessages(data) {
    //Role: mettre a jour sie la pge DOM le nombre de message non lus
    //Retour :non
    //Paramtes
            //data : donnez envoye par le seveur
    //Retour : format JSON
        //(
        //cr : compte-rendu de la requette : Ok(on a resuusi) CONN(connexion), NO(operation interdi) , KO (autre erruer)
            //result : nb de message
        //)

    //Si le CR es OK, metre a jour le nombre de mesages
    if(data.cr === "OK"){
        afficheNbMessage(data.result);
    }else  if(data.cr === "CONN"){
        //Connexiont reqiose
        window.location = "form_connection.php";
    }else {
        console.warn("Errore recuperation nombre messae");
    }


 }


 function afficheNbMessage(nb) {
     //Role : ecrrire dans le DOM le nombre de messages non lus
     //Retour : non
     //Paramtrees :
                //nb : nobre de messages
     $(".header_msg span").html(nb);
 }

 $(document).ready(function () {
    //il faut mettree en place un timer pour vetifier tou les secondes le nombre de message
    window.setInterval(demandeNbMessages, 1000) ;


 });









//MESSAGES NON LUES

function demandeToutMessages() {
    //Role dema,der au servar de messages non lus et de positioiner la fonction qui sera declance a la reception de resultat
    //retour non
    //paramter non

    //Demander au server la mise a jour des messages non lu
    $.ajax("ajax_listeConver.php",{
        method: "POST",
        data: {},
        success: updateTousMessages,
        error: function () {
            alert("ajax erorre");
        }
    });
}


function updateTousMessages(data) {
    //Role: mettre a jour sie la pge DOM le les message non lus
    //Retour :non
    //Paramtes
    //data : donnez envoye par le seveur
    //Retour : format JSON
    //(
    //cr : compte-rendu de la requette : Ok(on a resuusi) CONN(connexion), NO(operation interdi) , KO (autre erruer)
    //result : liste de message
    //)

    //Si le CR es OK, metre a jour le nombre de mesages
    if(data.cr === "OK"){
        afficheTousMessage(data.result);
    }else  if(data.cr === "CONN"){
        //Connexiont reqiose
        window.location = "form_connection.php";
    }else {
        console.warn("Errore recuperation nombre messae");
    }


}


function afficheTousMessage(liste) {
    //Role : ecrrire dans le DOM le nombre les messages non lus
    //Retour : non
    //Paramtrees :
    //liste : liste des message

    $(".ajx p").html(liste);
}

$(document).ready(function () {
    //verifier les messages non lue
    window.setInterval(demandeToutMessages ,1000);


});




//NB Messages deja lu

function demandeNbMessagesDejaLue() {
    //Role demande au serveur tou les messages qui sont deja lue
    //Paramtres non
    //reourt non

    $.ajax("ajax_nbMessageDejalue.php",{
        method : "POST",
        data: {},
        success: updateNbMessagesDejaLue,
        error: function () {
            alert ("errore AJax nbmessagedejalue")
        }
    })
}

function updateNbMessagesDejaLue(data) {
    //Role: mettre a jour sie la pge DOM le nombre de message deja lue
    //Retour :non
    //Paramtes
    //data : donnez envoye par le seveur
    //Retour : format JSON
    if(data.cr === "OK"){
        afficheNbMessageDejaLue(data.result);
    }else if(data.cr === "CONN"){
        window.location = "form_connection.php";
    }else {
        console.warn("Erore requete messasgge deja lue");
    }

}

function afficheNbMessageDejaLue (liste) {
    //Role : ecrrire dans le DOM le nombre les messages deja lue
    //Retour : non
    //Paramtrees :
    //liste : liste des message deja lue
    $(".header_msg .nonLue").html(liste);

}

$(document).ready(function () {
    window.setInterval(demandeNbMessagesDejaLue ,1000);
})



// LISTE MESSGA DEJA LUE

function demandeMessageDejaLue() {
    //Role : demande au serveur tou les messages qui sont deaj lue
    //Paramtres no
    //Retour non
    $.ajax("ajax_listeMessageDejaLue", {
        method: "POST",
        data: {},
        success: updateListeMessagesDejaLue,
        error: function () {
            alert("Erore ajax liste message deja lue")
        }
    })

}

function updateListeMessagesDejaLue(data) {
    //Role: mettre a jour sie la pge DOM les messages qui son deja lue
    //Retour :non
    //Paramtes
    //data : donnez envoye par le seveur
    //Retour : format JSON

    if(data.ct === "OK"){
        afficheListeMessageDejaLue(data.result);
    }else if(data.ct === "CONN"){
        window.location = "form_connection.php";
    }else {
        console.warn("Erore requete liste message deja lue");
    }
}

function afficheListeMessageDejaLue(liste) {
    //Role : ecrrire dans le DOM le nombre les messages deja lue
    //Retour : non
    //Paramtrees :
    //liste : liste des message deja lue
    $(".table .table-dark .msg_dejaLue").html(liste);
}

$(document).ready(function () {
    window.setInterval(demandeMessageDejaLue ,1000);
})

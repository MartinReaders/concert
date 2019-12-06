<?php
include "lib/init.php";
$msg = new message();
$test = $msg->listeMessageNonLus(idUtilisatuerConnecte());

?>



<div class="ajx">

<?php
var_dump($test);
foreach ($test as $msge){

    echo "<p>" . $msge->htmlText() ."</p>" ."<br>";
    echo $msge->htmlDate();
}

?>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/messagerie.js"></script>
<?php
/*Controleur : arrive sur lapli liste conercv
* Paramtrs  (varibale a initialiser avzant d'inclure le templates)
 *  $list
 *
 *
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Un concert dans mon salon</title>
</head>
<body>
<?php include "templates/fragments/header.php" ?>



    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Expedituer</th>
            <th scope="col">Message</th>
            <th scope="col">Date</th>

        </tr>








<?php



foreach ($liste as $id=>$msg) {
    include "templates/fragments/mes_messages_non_lus.php";
}
?>



        </thead>
        <tbody>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="js/messagerie.js"></script>
</html>

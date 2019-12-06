<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php include "templates/fragments/header.php" ?>
    <form action="connecter.php" method="post">
        <label for="Email">Votre Email</label>
        <input type="email" id="email" name="email">
        <label for="password">Votre mote de passe</label>
        <input type="password" id="password" name="password">
        <input type="submit" value="Se connecter">

    </form>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
</body>
</html>

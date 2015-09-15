<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
    header('Location: login.php');
    die();
}

if ( !empty($_POST) ) {
    $pdo->query(
        'INSERT INTO topics (creation, creatorId, title, description) VALUES (NOW(), "' . $_SESSION['user']['id'] . '", "' . $_POST['title'] . '", "' . $_POST['description'] . '");'
    );
    header('Location: ./');
    die();
}
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <title>Index</title>
</head>
<body>
    <header>
        <i class="fa fa-user fa-2x"></i>&nbsp;&nbsp;Bonjour, <i><b><?=$_SESSION['user']['pseudo']?></i></b><a href="logout.php" class="corner_rigth_top">Se déconnecter</a>
    </header>

    <div class="form-container">
        <h1>Créer un Topic</h1>
        <form action="creertopic.php">
            titre:
            <input type="text" placeholder="Titre du Topic" name="titre">
            description:
            <textarea placeholder="Description du Topic" name="message"></textarea>
        </form>
    </div>
</body>
</html>
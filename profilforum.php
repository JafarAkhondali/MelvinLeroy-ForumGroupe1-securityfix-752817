<!DOCTYPE html>
<html lang="FR-fr">
<head>
	<meta charset="UTF-8">
    <title>Profil</title>
	<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="profil.css" type="text/css">
</head>
<body>
<?php

session_start();

$dsn = 'mysql:host=localhost;dbname=forumgroupe1';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);

$request = $pdo->query('SELECT * FROM users WHERE id= "' . $_SESSION['user']['id'] . '";');
$result = $request->fetchAll();

if (empty ($_SESSION['user']) ) {
	header('Location: connexion.html');
	die();
}


?>


<h1>Page de profil</h1>
<div class="container">
<p>Pseudo: <?=$result[0]['pseudo']?></p>
<p>Email: <?=$result[0]['email']?></p>
<p>Password: <?=$result[0]['password']?></p>
<p>Description: <?=$result[0]['description']?></p>
</div>
<a href="modifierprofil.php">Modifier mes informations</a>
<a href="deconnexion.php">Log Out</a>
	
</body>
</html>
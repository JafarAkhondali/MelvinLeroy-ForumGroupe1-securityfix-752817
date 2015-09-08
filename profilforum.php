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
$dsn = 'mysql:host=localhost;dbname=forumgroupe1';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);

$request = $pdo->query('SELECT * FROM users;');
$result = $request->fetchAll();

?>


<h1>Page de profil</h1>
<div class="container">
<p>Pseudo:?<?=$result[$i]['titre']?></p>
<p>Email:</p>
<p>Password:</p>
<p>Description:</p>
</div>


	
</body>
</html>
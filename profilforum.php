<!DOCTYPE html>
<html lang="FR-fr">
<head>
	<meta charset="UTF-8">
    <title>Profil</title>
	<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="profil.css" type="text/css">
</head>
<body>
<style scoped>
 body{
	font: 16px 'Oxygen' , sans-serif;
	background: url(image/new-wallpaper-14.jpg)scroll no-repeat 0 0;
}
h1{  
	 line-height:45px;
     width:800px;
     top: 100;
     margin: 0 auto ;
     background: rgba(255,255,255,0.5);
     box-shadow:0 2px 2px #999;
     color: #fff;
     text-align: center;
     border-radius: 5px ;
     letter-spacing :7px;
     border: solid 2px #fff;
}
.container{
	width: 800px; 
	height: 150px;
	border: solid 2px #e0e0e0;
    background: rgba(255,255,255,0.5);
	color: #fff;
	margin-left: 200px;
	margin: 0 auto ;
	border-radius: 5px ;
}
a{  
	border: solid 2px #fff;
	border-radius: 5px;
	color: #fff;
	margin: 0 auto;
    background: rgba(255,255,255,0.5);

}
</style>
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
// Connexion BDD
$request = $pdo->query('SELECT * FROM users WHERE id= "' . $_SESSION['user']['id'] . '";');
$result = $request->fetchAll();
//REquete pour afficher le bon profil
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

<a href="modifierprofil.php">Modifier mes informations</a>
<a href="deconnexion.php">Log Out</a>
	</div>
</body>
</html>
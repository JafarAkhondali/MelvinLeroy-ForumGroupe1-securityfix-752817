<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
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



$requestA = $pdo->query('SELECT * FROM messages WHERE id = ' . $_GET['id'] . ';');
$resultA = $requestA->fetchAll();

$requestB = $pdo->query('SELECT * FROM topics WHERE id = ' . $_GET['id'] . ';');
$resultB = $requestB->fetchAll();

$request = $pdo->query('SELECT * FROM messages WHERE id = ' . $_GET['id'] . ';');
$result = $request->fetch();

$request = $pdo->query('SELECT * FROM topics WHERE id = ' . $_GET['id'] . ';');
$result = $request->fetchAll();

$requestB = $pdo->query('SELECT * FROM topics WHERE id = ' . $_GET['id'] . ';');
$resultB = $requestB->fetch();

?>

<h1><?=$resultB[0]['title']?> le <?=$resultB[0]['creation']?></h1>

<a href="topics_liste.php">Précédent</a>

<a href="postmessage.html">Créer un message</a>
<style scoped>
body{
	font:16px 'Oxygen' sans-serif;
	background: url(image/wallpaper-1520964.jpg)scroll no-repeat 0 0;
}
	
	h1{
	
	text-align: center;
	background:#90A4AE;
	opacity:0.8;
	width:800px;
	border-radius:5px;
	border:1px solid #000;
	margin:0 auto;
	box-shadow: 0 2px 2px #999;
	color:white;
}
	a{
	color: #fff;
	border-radius: 5px;
	margin-top: 200px;

	}

</style>

<a href="formpostmessage.php?id=<?=$_GET['id']?>">Créer un message</a>


</body>
</html>

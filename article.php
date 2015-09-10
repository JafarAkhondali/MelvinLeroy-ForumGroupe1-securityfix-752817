<html>
<head>
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

$requestB = $pdo->query('SELECT * FROM topics WHERE id = ' . $_GET['id'] . ';');
$resultB = $requestB->fetch();
?>

<h1><?=$resultB[0]['title']?> le <?=$resultB[0]['creation']?></h1>

<a href="topics_liste.php">Précédent</a>
<a href="formpostmessage.php?id=<?=$_GET['id']?>">Créer un message</a>

</body>
</html>
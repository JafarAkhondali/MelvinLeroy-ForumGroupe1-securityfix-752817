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

$request = $pdo->query('SELECT * FROM topics WHERE id = ' . $_GET['id'] . ';');
$result = $request->fetchAll();

?>

<h1><?=$result[0]['titre']?></h1>
<p><?=$result[0]['article']?></p>
<a href="articles_liste.php">Précédent</a>

</body>
</html>
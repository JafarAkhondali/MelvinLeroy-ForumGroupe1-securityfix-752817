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

<<<<<<< HEAD
$request = $pdo->query('SELECT * FROM messages WHERE id = ' . $_GET['id'] . ';');
$result = $request->fetch();
=======
$request = $pdo->query('SELECT * FROM topics WHERE id = ' . $_GET['id'] . ';');
$result = $request->fetchAll();
>>>>>>> origin/master

?>

<h1><?=$result[0]['title']?> le <?=$result[0]['creation']?></h1>
<p><?=$result[0]['messages']?></p>
<a href="topics_liste.php">Précédent</a>

</body>
</html>
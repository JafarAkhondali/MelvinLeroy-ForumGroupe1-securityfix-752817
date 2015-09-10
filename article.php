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

$requestA = $pdo->query('SELECT * FROM messages WHERE id = ' . $_GET['id'] . ';');
$resultA = $requestA->fetchAll();

$requestB = $pdo->query('SELECT * FROM topics WHERE id = ' . $_GET['id'] . ';');
$resultB = $requestB->fetchAll();
=======
$request = $pdo->query('SELECT * FROM messages WHERE id = ' . $_GET['id'] . ';');
$result = $request->fetch();

$request = $pdo->query('SELECT * FROM topics WHERE id = ' . $_GET['id'] . ';');
$result = $request->fetchAll();
>>>>>>> origin/master


?>

<h1><?=$resultB[0]['title']?> le <?=$resultB[0]['creation']?></h1>
<p><?=$resultA[0]['message']?></p>
<a href="topics_liste.php">Précédent</a>
<a href="postmessage.html">Créer un message</a>

</body>
</html>
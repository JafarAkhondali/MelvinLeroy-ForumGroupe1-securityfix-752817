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



$requestA = $pdo->query('SELECT * FROM messages WHERE id = ' . $_GET['id'] . ';');
$resultA = $requestA->fetchAll();

$requestB = $pdo->query('SELECT * FROM topics WHERE id = ' . $_GET['id'] . ';');
$resultB = $requestB->fetchAll();


?>

<h1><?=$resultB[0]['title']?> le <?=$resultB[0]['creation']?></h1>

<?php 
for ( $i = 0; $i < count($resultA); $i++ ) {
?>


<p><?=$resultA[$i]['message']?></p>

<?php
}

?>

<a href="topics_liste.php">Précédent</a>
<a href="postmessage.html">Créer un message</a>

</body>
</html>
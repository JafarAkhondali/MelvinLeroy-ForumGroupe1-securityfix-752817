<html>
<head>
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

$request = $pdo->query('SELECT * FROM messages;');
$result = $request->fetchAll();


for ( $i = 0; $i < count($result); $i++ ) {
?>

<h2><?=$result[$i]['titre']?></h2>
<br />
<br />

<?php
}

?>
<a href="créearticles.html"> Créer un article &raquo;</a>
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

<a href="profilforum.php?id=<?=$result[$i]['id']?>"> Mon Profil </a>
</body>
</html>
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

<<<<<<< HEAD:messages_liste.php
$request = $pdo->query('SELECT * FROM messages;');
=======
$request = $pdo->query('SELECT * FROM topics;');
>>>>>>> origin/master:articles_liste.php
$result = $request->fetchAll();


for ( $i = 0; $i < count($result); $i++ ) {
?>

<<<<<<< HEAD:messages_liste.php
<h2><?=$result[$i]['titre']?></h2>
=======
<h2><?=$result[$i]['tilre']?></h2>
<a href="article.php?id=<?=$result[$i]['id']?>">lire</a>
>>>>>>> origin/master:articles_liste.php
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
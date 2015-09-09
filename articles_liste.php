<html>
<head>
</head>
<body>
<style scoped>
body{
	font:16px sans-serif;
}
h2{
	background: black;
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

$request = $pdo->query('SELECT * FROM topics;');
$result = $request->fetchAll();

//print_r($result);

for ( $i = 0; $i < count($result); $i++ ) {
?>

<h2><?=$result[$i]['tilre']?></h2>
<a href="article.php?id=<?=$result[$i]['id']?>">lire</a>
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
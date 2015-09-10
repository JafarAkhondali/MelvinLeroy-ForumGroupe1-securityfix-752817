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

$request = $pdo->query('SELECT * FROM topics;');
$result = $request->fetchAll();

//print_r($result);

for ( $i = 0; $i < count($result); $i++ ) {
	$_SESSION['topic'] = $result[$i]['id'];
?>

<h2><?=$result[$i]['title']?>&nbsp;crée le : <?=$result[$i]['creation']?></h2>
<h3><?=$result[$i]['description']?></h3>
<a href="article.php?id=<?=$result[$i]['id']?>">Voir les Messages &raquo;</a>
<br />
<br />

<?php
}

?>
<a href="créearticles.html"> Créer un Topics &raquo;</a><br>
<?php

$request = $pdo->query('SELECT * FROM users;');
$result = $request->fetchAll();

?>

<a href="profilforum.php?id=<?=$result[$i]['id']?>"> Mon Profil </a>
</body>
</html>
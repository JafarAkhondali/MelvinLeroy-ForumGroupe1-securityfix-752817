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


$request = $pdo->query('SELECT * FROM users WHERE id = ' . $_SESSION['user']['id'] . ';');
$result = $request->fetchAll();


?>

<h1>Modifier vos informations</h1>
<form action="modifier-update.php" method="post">

<input type="text" name="pseudo" placeholder="Nouveau Pseudo" value="<?=$result[0]['pseudo']?>" />
<input type="text" name="email" placeholder="Nouvel Email" value="<?=$result[0]['email']?>" />
<input type="text" name="password" placeholder="Nouveau Mot de Passe" value="<?=$result[0]['password']?>" />
<textarea name="description" placeholder="Décris-Toi"><?=$result[0]['description']?></textarea>
<input type="submit" value="Modifier" />

</form>
</body>
</html>


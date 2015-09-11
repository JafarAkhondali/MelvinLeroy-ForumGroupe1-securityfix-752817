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

$request = $pdo->query(
	'INSERT INTO `users`(id, email, password,pseudo) VALUES (NULL,"' . $_POST['email'] . '","' . $_POST['password']. '","'.$_POST['pseudo'].'");'
);
$request2= $pdo->query(
	'SELECT email FROM users WHERE email="' . $_POST['email'] . '";'
	);
$result = $request2->fetchAll();


if ( $request ) {
	 header('Location: connexion.html');
	 
} else {

	//header('Location: inscription.html');
	echo "<h2>Email déjà utilisé</h2>";

}

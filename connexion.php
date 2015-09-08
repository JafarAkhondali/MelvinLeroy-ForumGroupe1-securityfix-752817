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
	'SELECT * FROM users WHERE email="' . $_POST['email'] . '" AND password = "' . $_POST['password']. '";'
);

$result = $request->fetchAll();

if ( count($result) > 0 ) {
	
	$_SESSION['user'] = $result[0];
	header('Location: articles_liste.php');

} else {

	header('Location: connexion.html');

}

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
// Connexion a la bdd
$request = $pdo->query(
	'SELECT * FROM users WHERE email="' . $_POST['email'] . '" AND password = "' . $_POST['password']. '";'
);
// requete de Sélection de al base pour verifier sur l'user est inscrit sur le site

$result = $request->fetchAll();
 
	if(count($result) > 0){
	
	$_SESSION['user'] = $result[0];
	header('Location: topics_liste.php');
// l'user est loggé, redirection
} else {

	header('Location: connexion.html');
// l'user n'éxiste pas pas on le dirige sur connexion
}

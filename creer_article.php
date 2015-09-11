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
// Connexion BDD
$pdo->query('INSERT INTO topics(creation, creatorId, title, description) VALUES(NOW(),"' .$_SESSION['user']['id']. '", "' .$_POST['title']. '", "' .$_POST['message']. '");');
header('Location: topics_liste.php');
// Requete Insertion des topics dans la BDD


// Melvin si tu ouvre ce fichier on a réussi a faire que l'id se transfere d epage en page mais les messages ne s'affiche toujours pas

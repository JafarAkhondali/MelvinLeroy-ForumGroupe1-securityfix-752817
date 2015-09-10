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
<<<<<<< HEAD
$pdo->query('INSERT INTO topics(creation, creatorId, title, description) VALUES(NOW(),"' .$_SESSION['user']['id']. '", "' .$_POST['title']. '", "' .$_POST['message']. '");');
header('Location: topics_liste.php');
=======

$pdo->query('INSERT INTO topics(title, description) VALUES("' . $_POST['title'] . '", "' . $_POST['description'] . '");');

header('Location: articles_liste.php');
>>>>>>> origin/master

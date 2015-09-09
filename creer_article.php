<?php


$dsn = 'mysql:host=localhost;dbname=forumgroupe1';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);

$pdo->query('INSERT INTO topics(title, description) VALUES("' . $_POST['title'] . '", "' . $_POST['description'] . '");');

header('Location: articles_liste.php');

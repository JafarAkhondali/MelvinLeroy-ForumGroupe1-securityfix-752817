<?php


$dsn = 'mysql:host=localhost;dbname=forumgroupe1';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);

$pdo->query('INSERT INTO articles(titre, article) VALUES("' . $_POST['titre'] . '", "' . $_POST['article'] . '");');

header('Location: article.html');
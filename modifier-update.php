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

$sql = 'UPDATE users SET pseudo = "' . $_POST['pseudo'] . '", email = "' . $_POST['email'] . '", password= "'.$_POST['password'].'", description= "' .$_POST['description']. '" WHERE id= "'.$_SESSION['user']['id'].'"';

$pdo->query($sql);

header('Location: profilforum.php');
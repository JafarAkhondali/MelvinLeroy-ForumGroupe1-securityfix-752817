<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
	header('Location: login.php');
	die();
}

$request=$pdo->query('INSERT INTO messages(creation,creatorId,topicId,message) VALUES(NOW(), "'.$_SESSION['user']['id'].'","'.$_GET['id'].'", "'.$_POST['message'].'")');


header('Location:topic.php?id='.$_GET['id'].'');


<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
	header('Location: login.php');
	die();
}



//$sql='INSERT INTO messages(creation,creatorId,topicId,message) VALUES (NOW(),"1","6","'.$message.'")';
$sql='INSERT INTO messages(creation,creatorId,topicId,message) VALUES (NOW(), "'.$_SESSION['user']['id'].'","'.$_GET['id'].'", "'.$_POST['textmessage'].'")';
$request=$pdo->query($sql);
header('Location:topic.php?id='.$_GET['id'].'');



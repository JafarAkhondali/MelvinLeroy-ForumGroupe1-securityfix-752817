<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
	header('Location: login.php');
	die();
}else{
	$request = $pdo->query('SELECT * FROM topics WHERE title="' . $_POST['search'] . '" ORDER BY creation DESC');
	$result = $request->fetchAll();
}
?>


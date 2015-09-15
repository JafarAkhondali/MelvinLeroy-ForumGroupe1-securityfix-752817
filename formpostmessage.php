<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
	header('Location: login.php');
	die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Post-Message</title>
</head>
<body>
	<form action="postmessage.php?id=<?=$_GET['id']?>" method="post" >
	<textarea placeholder="Ecris ton message" name="message"></textarea>
	<input type="submit" value="Envoyer le message">
	</form>
</body>
<style scoped>

</style>
</html>
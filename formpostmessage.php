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
<style scoped>
body{
	font:16px sans-serif;
	background: url(img/post-it-humour.jpg)scroll no-repeat 0 0;
}
textarea{
	margin:0 auto;
}
.msg{
	width:300px;
	height:200px;
}
.send{
	border-radius:5px;
	background: blue;
	margin:0 auto;
}
</style>
	<div class="container">
	<form action="postmessage.php?id=<?=$_GET['id']?>" method="post" >
	<textarea placeholder="Ecris ton message" class="msg" name="message"></textarea>
	<input type="submit" class="send" value="Envoyer le message">
	</form>
	</div>
</body>
<style scoped>

</style>
</html>
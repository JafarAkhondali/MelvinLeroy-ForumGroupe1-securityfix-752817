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
<<<<<<< HEAD
	<meta charset="UTF-8">
	<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
	<title>Post-Message</title>
=======
<meta charset="UTF-8">
<title>Post-Message</title>
>>>>>>> origin/master
</head>
<body>
<style scoped>
body{
	font:16px sans-serif;
	background: url(img/message.jpeg)scroll no-repeat 0 0;
}
h1{
	text-align: center;
	border-radius:5px;
	background: red;
	color:#fff;
	opacity:0.7;
}
textarea{
	margin-left: 799px;
}
.msg{
	width:300px;
	height:200px;
}
.send{
	background: red;
	width:190px;
    line-height: 30px;
    text-align: center;
    color:#fff;
    border-radius:4px;
    margin:10px auto;
    color: #fff;
    border: solid 1px  #212121;
    display:block;
    opacity: 0.8;
    height: 35px;
     -moz-box-shadow:  2px 2px 2px #656565;
-webkit-box-shadow: 2px 2px 2px #656565;
-o-box-shadow: 2px 2px 2px #656565;
box-shadow: 2px 2px 2px #656565;
}
img{
	bottom:10px;
}
</style>
	<div class="container">
	<h1><img src="img/icons/1442499225_new_post.png" alt="" class="imgi" />&nbsp;Ecrire un message</h1>
	<form action="postmessage.php?id=<?=$_GET['id']?>" method="post" >
	<textarea placeholder="Ecris ton message" class="msg" name="message"></textarea>
	<input type="submit" class="send" value="Envoyer le message">
	</form>
</body>
</html>
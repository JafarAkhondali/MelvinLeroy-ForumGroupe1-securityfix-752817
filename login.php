<?php

include('includes/db.php');

$error = '';
if ( !empty($_POST) ) {

	$request = $pdo->query('SELECT * FROM users WHERE email = "' . $_POST['email'] . '" AND password = "' . $_POST['password'] . '";');
	$result = $request->fetchAll();
	if ( $result ) {
		$_SESSION['user'] = $result[0];
		header('Location: ./');
		die();
	}
	$error = 'Email ou mot de passe invalide !';
}

?><!DOCTYPE html>
<html>
<head>
<title>Your Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="js/jwysiwyg/jquery.wysiwyg.old-school.css"/>
<!-- jQuery AND jQueryUI -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/min.js"></script>
</head>
<body class="wood dark">
<div id="content" class="login">
	<h1><img src="img/icons/lock-closed.png" alt=""/>Connection au forum</h1>

	<?php if ( $error ) { ?>
	<div class="notif error">
		<?=$error?>
	</div>
	<?php } else { ?>
	<div class="notif tip">
		Entrer votre email et votre mot de passe pour vous connecter
	</div>
	<?php } ?>

	<form action="login.php" method="post">
		<div class="input placeholder">
			<input type="text" id="login" name="email" placeholder="email" />
		</div>

		<div class="input placeholder">
			<input type="password" id="pass" name="password" placeholder="password" value=""/>
		</div>

		<!--
		<div class="checkbox">
			<input type="checkbox" id="remember"/>
			<label class="inline" for="remember">Se souvenir de moi</label>
		</div>
		-->

		<div class="submit">
			<input name="connection" type="submit" value="Se connecter"/>
		</div>

		<a href="register.php" style="float: right; margin: 0.25em 0.5em; " class="button">inscription</a>

	</form>
</div>
</body>
</html>

<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
	header('Location: login.php');
	die();
}


if ( !empty($_POST) ) {
	$pdo->query(
		'UPDATE users SET email = "' . $_POST['email'] . '", pseudo = "' . $_POST['pseudo'] . '" WHERE id = ' . $_SESSION['user']['id']
	);
	header('Location: profile.php');
	die();
}

$req = $pdo->query('SELECT * FROM users WHERE id = ' . $_SESSION['user']['id']);
$result = $req->fetchAll();
$user = $result[0];


?><!DOCTYPE html>
<html>
    <head>
        <title>Your Admin Panel</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <!-- Main stylesheed  (EDIT THIS ONE) -->
        <link rel="stylesheet" href="css/style.css" />

        <link rel="stylesheet" href="js/jwysiwyg/jquery.wysiwyg.old-school.css" />

        <!-- jQuery AND jQueryUI -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>

        <!-- jQuery Cookie - https://github.com/carhartl/jquery-cookie -->
        <script type="text/javascript" src="js/cookie/jquery.cookie.js"></script>

        <!-- jWysiwyg - https://github.com/akzhan/jwysiwyg/ -->
        <link rel="stylesheet" href="js/jwysiwyg/jquery.wysiwyg.old-school.css" />
        <script type="text/javascript" src="js/jwysiwyg/jquery.wysiwyg.js"></script>


        <!-- Tooltipsy - http://tooltipsy.com/ -->
        <script type="text/javascript" src="js/tooltipsy.min.js"></script>

        <!-- iPhone checkboxes - http://awardwinningfjords.com/2009/06/16/iphone-style-checkboxes.html -->
        <script type="text/javascript" src="js/iphone-style-checkboxes.js"></script>
        <script type="text/javascript" src="js/excanvas.js"></script>

        <!-- Load zoombox (lightbox effect) - http://www.grafikart.fr/zoombox -->
        <script type="text/javascript" src="js/zoombox/zoombox.js"></script>

        <!-- Charts - http://www.filamentgroup.com/lab/update_to_jquery_visualize_accessible_charts_with_html5_from_designing_with/ -->
        <script type="text/javascript" src="js/visualize.jQuery.js"></script>

        <!-- Uniform - http://uniformjs.com/ -->
        <script type="text/javascript" src="js/jquery.uniform.js"></script>


        <!-- Main Javascript that do the magic part (EDIT THIS ONE) -->
        <script type="text/javascript" src="js/main.js"></script>
    </head>
    <body class="wood dark">

        <!--
                HEAD
                        -->
        <div id="head">
            <div class="left">
                <a href="#" class="button profile"><img src="img/icons/top/huser.png" alt="" /></a>
                Bonjour
                <?=$_SESSION['user']['pseudo']?>
            </div>
        </div>


        <!--
                SIDEBAR
                         -->
        <div id="sidebar" class="black">
            <ul>
                <li class="current"><a href="#"><img src="img/icons/menu/layout.png" alt="" /> Menu</a>
                    <ul>
                        <li><a href="./">Liste des topics</a></li>
                        <li><a href="profile.php">Mon profil</a></li>
                        <li><a href="logout.php">Déconnection</a></li>
                    </ul>
                </li>
            </ul>
            <a href="#collapse" id="menucollapse">&#9664; Réduire la sidebar</a>

        </div>




        <!--
              CONTENT
                        -->
        <div class="bloc">
        <form action="profile.php" method="post">
                <div class="title">Profil</div>
                <div class="content">
                    <div class="input medium">
                        <label for="input2">pseudo</label>
                        <input type="text" id="input2" name="pseudo" value="<?=$user['pseudo']?>">
                    </div>
                    <div class="input medium">
                        <label for="input2">email</label>
                        <input type="text" id="input2" name="email" value="<?=$user['email']?>">
                    </div>
                </div>
            </form>
        <div id="content" class="black">


            <h1><img src="img/icons/posts.png" alt="" /> Modifier mon profil</h1>
            <div class="bloc">
		<form action="profile.php" method="post">
                <div class="title">Profil</div>
                <div class="content">
                    <div class="input medium">
                        <label for="input2">pseudo</label>
                        <input type="text" id="input2" name="pseudo" value="<?=$user['pseudo']?>">
                    </div>
                    <div class="input medium">
                        <label for="input2">email</label>
                        <input type="text" id="input2" name="email" value="<?=$user['email']?>">
                    </div>


		    <div class="submit">
                        <input type="submit" value="Enregistrer">
                    </div>

                </div>
		</form>
            </div>








        </div>

    </body>
</html>

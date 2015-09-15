<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
	header('Location: login.php');
	die();
}


if ( !empty($_POST) ) {
	$pdo->query(
		'INSERT INTO topics (creation, creatorId, title, description) VALUES (' .
		'"' . date('Y-m-d H:i:s') . '", "' . $_SESSION['user']['id'] . '", "' . $_POST['title'] . '", "' . $_POST['description'] . '");'
	);
	header('Location: ./');
	die();
}





?><!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
=======
<html>
    <head>
>>>>>>> origin/master
    <meta charset="UTF-8">
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
        <div id="sidebar" class="black">
            <ul>
                <li class="current"><a href="#"><img src="img/icons/menu/layout.png" alt="" /> Menu</a>
                    <ul>
                        <li><a href="./">Liste des topics</a></li>

                        <li><a href="logout.php">D&eacute;connexion</a></li>

                        <li><a href="profile.php">Mon profil</a></li>
                        <li><a href="logout.php">D&eacute;connection</a></li>

                    </ul>
                </li>
            </ul>
            <a href="#collapse" id="menucollapse">&#9664; R&eacute;duire la sidebar</a>
            <form action="resultsearch.php" method="post"  class="search">
                <input type="text" name="search" placeholder="Rechercher">
            </form>
        </div>

        <div id="content" class="black">


            <h1><img src="img/icons/posts.png" alt="" /> Cr&eacute;er un topic</h1>
            <div class="bloc">
		<form action="index.php" method="post">
                <div class="title">Cr&eacute;ation</div>
                <div class="content">
                    <div class="input medium">
                        <label for="input2">Titre du topic</label>
                        <input type="text" id="input2" name="title">
                    </div>

                    <div class="input textarea">
                        <label for="textarea1">Description</label>
                        <textarea id="textarea1" rows="7" cols="4" name="description"></textarea>
                    </div>

		    <div class="submit">
                        <input type="submit" value="Cr&eacute;er">
                    </div>

                </div>
		</form>
            </div>




            <h1><img src="img/icons/posts.png" alt="" /> Liste des topics</h1>
            <div class="bloc">
                <div class="title">
                    Liste
                </div>
                <div class="content">
                    <table>
                        <thead>
                            <tr>
                                <th>Creation</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>

			<?php

				$request = $pdo->query('SELECT * FROM topics ORDER BY creation DESC;');
				$results = $request->fetchAll();
				foreach ( $results as $result ) {

			?>

                            <tr>
                                <td><?=$result['creation']?></td>
                                <td><a href="topic.php?id=<?=$result['id']?>">Topic <?=$result['id']?> : <?=$result['title']?></a></td>
                                <td><?php


					$request = $pdo->query('SELECT * FROM users WHERE id = ' . $result['creatorId']);
					$resultB = $request->fetchAll();
					echo $resultB[0]['pseudo'];


				?></td>
                                <td><?=$result['description']?></td>
                            </tr>

			<?php

				}

			?>



                        </tbody>
                    </table>
                </div>
            </div>




        </div>

    </body>
</html>

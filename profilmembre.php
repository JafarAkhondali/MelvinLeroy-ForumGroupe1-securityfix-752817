<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
	header('Location: login.php');
	die();
}

  $request = $pdo->query('SELECT * FROM users WHERE id= "' . $_GET['id'] . '";');
  $results = $request->fetchAll();
  $requestB=$pdo->query('SELECT * FROM topics WHERE creatorId= "' . $_GET['id'] . '";');
  $resultB=$requestB->fetchAll();
  $countT=count($resultB);
?>

<!DOCTYPE html>
<html lang="FR-fr">
<head>
	<meta charset="UTF-8">
	<title>Profil de <?=$results[0]['pseudo']?></title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!--[if IE]>
   <script type="text/javascript" src="js/modernizr.custom.53495.js">
   </script>
<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <!-- Main stylesheed  (EDIT THIS ONE) -->
        <link rel="stylesheet" href="css/style.css" />

        <link rel="stylesheet" href="js/jwysiwyg/jquery.wysiwyg.old-school.css" />

          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

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
                        <li><a href="profile.php">Mon profil</a></li>
                        <li><a href="logout.php">D&eacute;connexion</a></li>
                    </ul>
                </li>
            </ul>
            <a href="#collapse" id="menucollapse">&#9664; R&eacute;duire la sidebar</a>
             <form action="resultsearch.php" method="post"  class="search">
                <input type="text" name="search" placeholder="Rechercher">
            </form>
            <?php
            $requestC = $pdo->query('SELECT * FROM users ORDER BY pseudo ASC;');
            $resultsC = $requestC->fetchAll();
            $countD=count($resultsC);
            ?>
            <ul>
            <h2>
            <div class="listemembre">
            <?php
            for ($i=0; $i < $countD; $i++) { 
                ?>
                <li><i class="fa fa-eye"></i><a href="profilmembre.php?id=<?=$resultsC[$i]['id']?>"><?=$resultsC[$i]['pseudo']?></a></li>
                <?php
            }
            ?>
            </div>
            </ul>

        </div>
        <?php 
        $requestD = $pdo->query('SELECT * FROM users WHERE id = "' . $_GET['id'] . '" ORDER BY pseudo ASC;');
        $resultsD = $requestD->fetchAll();
        ?>
        <div id="content" class="black">
        <div class="bloc">
        <ul>
        <div class="title">Profil</div>
        <div class="content">
         <div class="input medium">
            <li class="input3 ">Pseudo</li>
            <li><?=$resultsD[0]['pseudo']?></li>
        </div>
        <div class="input medium">
            <li class="input3">Age</li>
            <li><?=$resultsD[0]['age']?> ans</li>
        </div>
        <div class="input medium">
            <li class="input3">Sexe</li>
            <li><?=$resultsD[0]['sexe']?></li>
        </div>
        <div class="input medium">
            <li class="input3">Description</li>
            <li><?=$resultsD[0]['description']?></li>
        </div>
		 <div class="input medium">
            <li class="input3">Nombre de Topic crées</li>
            <?php
            for ($i=0; $i < $countT ; $i++) { 
         	?>
            <li class="topiclist"><a href="topic.php?id=<?=$resultB[$i]['id']?>"><?=$resultB[$i]['title']?><?=$resultB[$i]['description']?></a></li>
            <?php
        }
        ?>
        </div>
        </ul>
        </div>
        </div>
        <div id="content" class="black">

        </ul>
        </div>
        </div>

</body>
</html>
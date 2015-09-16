<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
	header('Location: login.php');
	die();
}

$request=$pdo->query('SELECT * FROM messages WHERE topicId="'.$_GET['id'].'" ORDER BY creation DESC;');
$result=$request->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/topic.css">
	<title>Liste des Messages du topic</title>
</head>
<body>
<style scoped>
body{
    font:16px sans-serif;
    background: url(img/1440.jpg)scroll no-repeat 0 0;
}
h1{
    text-align: center;
    border-radius:5px;
    background: #8D6E63;
    color:#fff;
    opacity:0.7;
}
.content{
    border-radius:5px;
    border:solid 1px #ccc;
    box-shadow:0.5;
}
ul{
    text-align: center;
    list-style: none;
}
li{
    color:#fff;
}
.send{
    border-radius:5px;
    background:#8D6E63;
    margin:0 auto;
    display:block;
    margin-left: 30%;
}
.back{
    border-radius:5px;
    background: #8D6E63;
    margin:0 auto;
    display:block;
    margin-left: 30%;
}
</style>
	 <h1><img src="img/icons/posts.png" alt="" /> Messages sur Le topic</h1>
            <div class="bloc">
                <div class="title">
                </div>
                <div class="content">
                        

			<?php

				$request = $pdo->query('SELECT * FROM messages WHERE topicId= "' . $_GET['id'] . '" ORDER BY creation DESC;');
				$results = $request->fetchAll();
				foreach ( $results as $result ) {

                $request = $pdo->query('SELECT * FROM users WHERE id = "' .$_SESSION['user']['id'].'"');
                $resultB = $request->fetchAll();
                echo $_SESSION['user']['pseudo'];
			?>

                            <ul>
                                <li><?=$result['creation']?>&nbsp;<?=$result['message']?></li>
                                <li><?php


					


				?></li>
                                
                            </ul>

			<?php

				}

			?>


                </div>
            </div>
            <form action="formpostmessage.php?id=<?=$_GET['id']?>" method="post">
            <input type="submit" class="send" value="Envoyer un message">
            </form>
            <form action="index.php" method="post">
            <input type="submit" class="back" value="Retour au Topic">
            </form>
</body>
</html>





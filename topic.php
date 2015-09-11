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
	<title>Liste des Messages du topic</title>
</head>
<body>
	 <h1><img src="img/icons/posts.png" alt="" /> Messages sur Le topic</h1>
            <div class="bloc">
                <div class="title">
                </div>
                <div class="content">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Creation</th>
                                <th>Auteur</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>

			<?php

				$request = $pdo->query('SELECT * FROM messages WHERE topicId = "'.$_GET['id'].'" ORDER BY creation DESC;');
				$results = $request->fetchAll();
				foreach ( $results as $result ) {

			?>

                            <tr>
                                <td><?=$result['creation']?></td>
                                <td><?php


					$request = $pdo->query('SELECT * FROM users WHERE id = "' .$_SESSION['user']['id'].'"');
					$resultB = $request->fetchAll();
					echo $_SESSION['user']['pseudo'];


				?></td>
                                <td><?=$result['message']?></td>
                            </tr>

			<?php

				}

			?>



                        </tbody>
                    </table>
                </div>
            </div>
            <form action="formpostmessage.php?id=<?=$_GET['id']?>" method="post">
            <input type="submit" class="send" value="Envoyer un message">
            </form>
            <br />
            <form action="index.php" method="post">
            <input type="submit" class="back" value="Retour au Topic">
            </form>
</body>
<style scoped>
body{
    font:16px sans-serif;
    background: url(img/new-wallpaper-14.jpg)scroll no-repeat 0 0;
}
h1{
    text-align: center;
    border-radius:5px;
    background: #1a89db;
    color:#fff;
    opacity:0.7;
}
th{
    background: #1a89db;
    opacity:0.9;
    color:#fff;
}
td{
    color:#fff;
}
table{
    margin:0 auto;
    margin-top:170px;
}
.send{
    border-radius:5px;
    background: #1a89db;
    margin:0 auto;
    display:block;
    margin-left: 30%;
}
.back{
       border-radius:5px;
    background: #1a89db;
    margin:0 auto;
    display:block;
    margin-left: 30%;
}
</style>
</html>





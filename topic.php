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
    background: url(img/851528-metal-wallpaper.jpg)scroll no-repeat 0 0;
}
h1{
    text-align: center;
    border-radius:5px;
    background: #212121;
    color:#fff;
    opacity:0.8;
-moz-box-shadow:  2px 2px 2px #656565;
-webkit-box-shadow: 2px 2px 2px #656565;
-o-box-shadow: 2px 2px 2px #656565;
box-shadow: 2px 2px 2px #656565;

}
ul{
    text-align: center;
    list-style: none;
}
.send{

    border-radius:5px;
    background:#535353;
    margin:0 auto;
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
.back{

    border-radius:5px;
    background: #535353;
    margin:0 auto;
    display:block;
    border: solid 1px  #212121;
    color: #fff ;
    opacity: 0.8;
    margin-top: 16px;
    height: 35px;
      -moz-box-shadow:  2px 2px 2px #656565;
-webkit-box-shadow: 2px 2px 2px #656565;
-o-box-shadow: 2px 2px 2px #656565;
box-shadow: 2px 2px 2px #656565;

}
.msglist{
    border:solid 1px #212121;
    color:#fff;
    margin-top: 0 ;
    border-bottom-left-radius: 8px; 
    border-bottom-right-radius: 8px;
    background: #616161;
    opacity: 0.8;
    padding-left: 0;
    -moz-box-shadow:  2px 2px 2px #656565;
-webkit-box-shadow: 2px 2px 2px #656565;
-o-box-shadow: 2px 2px 2px #656565;
box-shadow: 2px 2px 2px #656565;
}

.date{
    border:solid 1px #212121;
    background: #212121;
    color: #ccc;
    height: 30px;
    padding-top: 10px;
    margin-bottom: 0 ;
    border-top-right-radius: 8px;
    border-top-left-radius: 8px;
    opacity: 0.8;
    padding-left: 0;
}
.content{
    width: 850px;
    margin: 0 auto;

}
.julientesrelou{
    text-align: center;
    padding-left: 10px;
    margin: 0 auto;
    display: inline;

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
            
			?>
                <ul class="date">
                    <li><?=$result['creation']?></li>
                </ul>    

                            <ul class="msglist">
                            <div class="popo">

                                <li><?=$_SESSION['user']['pseudo']?> a écrit :</li>
                                <li class="julientesrelou"><?=nl2br($result['message'], false)?></li>
                            </div>
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





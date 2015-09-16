<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css">
</head>
<body>
<?php

session_start();


$dsn = 'mysql:host=localhost;dbname=forumgroupe1';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);

$request = $pdo->query('SELECT * FROM topics;');
$result = $request->fetchAll();

//print_r($result);

for ( $i = 0; $i < count($result); $i++ ) {
	$_SESSION['topic'] = $result[$i]['id'];
?>
<h1>Liste des topics</i></h1>
<h2><?=$result[$i]['title']?>&nbsp;crée le : <?=$result[$i]['creation']?></h2>
<h3><?=$result[$i]['description']?></h3>
<div class="container">
<a href="article.php?id=<?=$result[$i]['id']?>">Voir les Messages &raquo;</a>
<br />
<br />
</div>
<?php
}

?>
<div class="lol">
<a href="créearticles.html"> Créer un Topics &raquo;</a><br>

<?php

$request = $pdo->query('SELECT * FROM users;');
$result = $request->fetchAll();

?>

<a href="profilforum.php?id=<?=$result[$i]['id']?>"> Mon Profil </a>
</div>

<style scoped>
body{
	font:16px 'Oxygen' sans-serif;
	background: url(image/wallpaper-1520964.jpg)scroll no-repeat 0 0;
}
h1{
	
	text-align: center;
	background:#90A4AE;
	opacity:0.8;
	width:800px;
	border-radius:5px;
	border:1px solid #000;
	margin:0 auto;
	box-shadow: 0 2px 2px #999;
	color:white;
}
h2{ 
	width:800px;
	text-align: center;
	border-radius:5px;
	background:#90A4AE;
    border:1px solid #000;
    box-shadow: 0 2px 2px #999;
    margin: 0 auto ;
    color:white;
    opacity:0.8;

}
.container{
	background: #90A4AE;
	opacity:0.8;
	border-radius:5px;
	border:1px solid #000;
	width:800px;
    height: 250px;
	padding:5px 0 5px 0;
	margin:8px auto;
	box-shadow: 0 2px 2px #999;
}
a{
	color: #fff;
	border-radius: 5px;
	margin-top: 200px;
}
.lol{
	background: #90A4AE;
	opacity:0.8;
	border-radius:5px;
	border:2px solid #000;
	width:800px;
    padding:5px 0 5px 0;
	margin:8px auto;
	box-shadow: 0 2px 2px #999;
}




</style>
</body>
</html>
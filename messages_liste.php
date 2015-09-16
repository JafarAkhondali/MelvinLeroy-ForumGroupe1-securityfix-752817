<html>
<head>
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


$request = $pdo->query('SELECT * FROM messages;');

$request = $pdo->query('SELECT * FROM topics;');

$result = $request->fetchAll();


for ( $i = 0; $i < count($result); $i++ ) {
?>


<h2><?=$result[$i]['titre']?></h2>

<h2><?=$result[$i]['tilre']?></h2>

<a href="article.php?id=<?=$result[$i]['id']?>">lire</a>

<br />
<br />

<?php
}

?>
<div class="container">
<a href="créearticles.html"> Créer un article &raquo;</a>
<?php

$dsn = 'mysql:host=localhost;dbname=forumgroupe1';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);

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
	a{
	color: #fff;
	border-radius: 5px;
	margin-top: 200px;


	}
	.container{
	width:800px;
	text-align: center;
	border-radius:5px;
	background:#90A4AE;
    border:1px solid #000;
    box-shadow: 0 2px 2px #999;
     margin: 0 auto ;
    height: 45px;
	}

</style>
</body>
</html>
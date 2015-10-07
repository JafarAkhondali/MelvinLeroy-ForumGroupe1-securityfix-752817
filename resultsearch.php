<?php

include('includes/db.php');

if ( empty($_SESSION['user']) ) {
	header('Location: login.php');
	die();
}else{
	$request = $pdo->query('SELECT * FROM topics WHERE title="' . $_POST['search'] . '" ORDER BY creation DESC');
	$result = $request->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<title>Résultat de recherche</title>
</head>
<body>




<style scoped>




	body{
		background: url(img/natural.jpg) no-repeat center center fixed ;
		background-size: cover;
	}
	td,th,a,h1{
		color: #fff;
		text-decoration: none;
	}
	td,th{
		width: 300px;
		text-align: center;
	}
	table{
		margin: 0 auto;
		background: #999;
	}
	h1{
		text-align: center;
	}
	th,td{
		background-color:#555;
		box-shadow:
		0px 2px 2px 0px rgba(0, 0, 0, 0.5) inset,
		0px 2px 2px 0px rgba(255, 255, 255, 0.5);
	}
	.lien:hover{
		color: #5A833E;
	}



</style>




	<h1>Résultats pour : <?=$_POST['search']?></h1>
	<table border="1">
		<thead>
			<th> Date de cr&eacute;ation
				<td><b>Titre du Topic</b></td>
			</th>
		</thead>
		<tbody>
		<?php
	for ($i=0; $i < count($result) ; $i++) { 
		?>
			<tr>
				<td><?=$result[$i]['creation']?></td>
				<td><a href="topic.php?id=<?=$result[$i]['id']?>" class="lien"><?=$result[$i]['title']?></a></td>
			</tr>
		<?php
			}
		?>
		</tbody>
	</table>
</body>
</html>

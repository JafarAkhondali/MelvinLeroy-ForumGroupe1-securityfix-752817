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
	<table border="1">
		<thead>
			<th>
				<td>Date de Creation</td>
				<td>Titre du Topic</td>
			</th>
		</thead>
		<tbody>
		<?php
	for ($i=0; $i < count($result) ; $i++) { 
		?>
			<tr>
				<td><a href="<?=$result[$i]['creation']?>"><?=$result[$i]['creation']?></td>
				<td><a href="<?=$result[$i]['title']?>"><?=$result[$i]['title']?></td>
				<td><a href="<?=$result[$i]['creatorId']?>"><?=$result[$i]['creatorId']?></td>
			</tr>
		<?php
			}
		?>
		</tbody>
	</table>
</body>
</html>

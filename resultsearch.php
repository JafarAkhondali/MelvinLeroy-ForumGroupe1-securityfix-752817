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
				<td>Titre du Topic</td>
			</th>
		</thead>
		<tbody>
		<?php
	for ($i=0; $i < count($result) ; $i++) { 
		?>
			<tr>
				<td><?=$result[$i]['creation']?></td>
				<td><a href="topic.php?id=<?=$result[$i]['id']?>"><?=$result[$i]['title']?></a></td>
			</tr>
		<?php
			}
		?>
		</tbody>
	</table>
</body>
</html>

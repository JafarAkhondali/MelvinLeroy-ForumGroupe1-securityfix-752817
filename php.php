<!-- Avant le Code HTML -->


<!-- Dans le tbody -->

<?php

				$request = $pdo->query('SELECT * FROM topics ORDER BY creation DESC;');
				$results = $request->fetchAll();
				foreach ( $results as $result ) {

			?>

                            <tr>
                                <td><?=$result['creation']?></td>
                                <td><a href="topic.php?id=<?=$result['id']?>"><?=$result['title']?></a></td>
                                <td><?php


					$request = $pdo->query('SELECT * FROM users WHERE id = "' . $result['creatorId'] . '"');
					$resultB = $request->fetchAll();
					echo $resultB[0]['pseudo'];


				?></td>
                                <td><?=$result['description']?></td>
                            </tr>

			<?php

				}

			?>

<?php 
class forum{

	var $pdo;

	function __construct( $pdo ){

			$this->pdo = $pdo;
	}


	function creerTopic( $userId, $title, $description ){

		$request = $this->pdo->prepare(
		'INSERT INTO topics (creation, creatorId, title, description) VALUES (NOW(), :userId, :topicTitle, :topicDescription);');

		$request->execute([
				':userId'=>$userId,
				':topicTitle'=>$title,
				':topicDescription'=>$description
			]);




	}
	function topicList(){

			$request = $this->pdo->prepare(
		'SELECT * FROM topics ORDER BY creation DESC;');

			$request->execute([
				]);

		return $request->fetchAll();
				
	}function userList(){

			$request = $this->pdo->prepare(
		'SELECT * FROM users ORDER BY pseudo ASC;');

			$request->execute([
				]);

		return $request->fetchAll();

	}
	function topicCreator($creatorId){
		
			$request = $this->pdo->prepare(
		'SELECT * FROM users WHERE id = :creatorId');

			$request->execute([
					':creatorId'=>$creatorId
				]);
		return $request->fetchAll();
	}
	function changerInfoPerso($email, $pseudo, $age, $sexe, $description, $id){
			$this->pdo->query('UPDATE users SET email = "' . $email . '", pseudo = "' . $pseudo . '", age = "' . $age . '", sexe = "' . $sexe . '", description = "' . $description . '" WHERE id = ' . $id
	);
	} 
	function searchByUserId($userId){
			return $this->pdo->query('SELECT * FROM users WHERE id = ' . $userId)->fetchAll();
	}
	function afficherMessageTopic($id){

			return $this->pdo->query('SELECT * FROM messages WHERE topicId="'.$id.'" ORDER BY creation DESC;')->fetchAll();
}

}
?>
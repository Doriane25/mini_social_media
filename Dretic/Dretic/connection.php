<?php
session_start();
$bdd = new PDO ('mysql:host=localhost;dbname=dbserver;charset=utf8;', 'root', '');

if(isset($_POST['valider'])){
	if(!empty($_POST['name'])){

		$recupUser = $bdd->prepare('SELECT * FROM users WHERE name = ?');
		$recupUser->execute(array($_POST['name']));

		if($recupUser->rowCount() > 0){

			$_SESSION['name'] = $_POST['name'];
			$_SESSION['id'] = $recupUser->fetch() ['id'];
			header('Location: index.php');

		}else{
			echo "Aucun résultat";
		}

	}else{
		echo "Veuiller saisir votre Nom d'utilisateur";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="carlos.css">
	<title></title>
</head>
<body>
	<form method="POST" action="" class="connect">
		<input type="text" name="name" placeholder="Nom d'utilisateur">
		<input type="submit" name="valider">
	</form>

	<div>
		
	</div>

</body>
</html>
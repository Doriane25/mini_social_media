<?php
session_start();
$bdd = new PDO ('mysql:host=localhost;dbname=dbserver;charset=utf8;', 'root', '');

if(isset($_POST['valider'])){
	if(!empty($_POST['name'])){

		$recupUser = $bdd->prepare('SELECT * FROM user WHERE name = ?');
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
	<title>Connexion-Messagerie</title>
</head>
<body>

	<h1>Se Connecter</h1>

   
	<form method="POST" action="">
		<div  class="formul">
			<input class="fo1" type="text" name="name" placeholder="Nom d'utilisateur">
			<input class="fo2" type="submit" name="valider">
		</div>
	</form>

	<div>
		
	</div>

</body>
</html>
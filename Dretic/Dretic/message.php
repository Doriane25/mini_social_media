<?php
session_start();
$bdd = new PDO ('mysql:host=localhost;dbname=dbserver;charset=utf8;', 'root', ''); 
if(!$_SESSION['name']){
	header('Location: connection.php');
}

if(isset($_GET['id']) AND !empty($_GET['id'])){

	$getid = $_GET['id'];
	$recupUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
	$recupUser->execute(array($getid)); 
	if($recupUser->rowCount() > 0){    
		if(isset($_POST['Envoyer'])){
			$message = htmlspecialchars($_POST['message']);
			$insererMessage = $bdd->prepare('INSERT INTO messages(message, recipient_id, sender_id)VALUES(?, ?, ?)');
			$insererMessage->execute(array($message, $_GET['id'], $_SESSION['id']));
		}

	}else{
		echo "Aucun utilisateur trouvé";
	}

}else{
	echo"Aucun identifiant trouvé";  
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<section id="messages">
		<?php
			$recupMessages = $bdd->prepare('SELECT * FROM messages WHERE sender_id = ? AND recipient_id = ? OR sender_id = ? AND recipient_id = ?');
			$recupMessages->execute(array($_SESSION['id'], $getid, $getid, $_SESSION['id']));
			while($message = $recupMessages->fetch()){
				if($message['recipient_id'] == $_SESSION['id']){
					?>
					<p style="color:blue;"> <?= $message['message']; ?> </p>
					<?php
				}elseif ($message['recipient_id'] == $getid) {
					?>
					<p style="color:red;"> <?= $message['message']; ?> </p>
					<?php
				}
			}
		?>     
	</section>    

	<form method="POST" action="">
		<textarea name="message"></textarea>
		<input type="submit" name="Envoyer">
	</form>

	<a href="deconnection.php">
		<button>Se Déconnecter</button>
	</a>



</body>
</html>
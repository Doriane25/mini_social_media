<?php
session_start();
$bdd = new PDO ('mysql:host=localhost;dbname=dbserver;charset=utf8;', 'root', ''); 
if(!$_SESSION['name']){
	header('Location: connection.php');
}

if(isset($_GET['id']) AND !empty($_GET['id'])){

	$getid = $_GET['id'];
	$recupUser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
	$recupUser->execute(array($getid)); 
	if($recupUser->rowCount() > 0){    
		if(isset($_POST['Envoyer'])){
			$message = htmlspecialchars($_POST['message']);
			$insererMessage = $bdd->prepare('INSERT INTO messages(message, recipient_id, sender_id)VALUES(?, ?, ?)');
			$insererMessage->execute(array($message, $_GET['id'], $_SESSION['userid']));
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
	<link rel="stylesheet" type="text/css" href="carlos.css">
	<title></title>
</head>
<body>
	
	<section id="messages">


		<div class="discussion">
			<?php
				$recupMessages = $bdd->prepare('SELECT * FROM messages WHERE sender_id = ? AND recipient_id = ? OR sender_id = ? AND recipient_id = ?');
				$recupMessages->execute(array($_SESSION['userid'], $getid, $getid, $_SESSION['userid']));
				while($message = $recupMessages->fetch()){
					if($message['recipient_id'] == $_SESSION['userid']){
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
		</div>  
	   

    <div class="formulaire">
		<form method="POST" action="" class="data">
			<textarea name="message" class="mess" ></textarea>
			<input type="submit" name="Envoyer" style="margin-left: 10px; margin-top: 90px; border-radius: 5px; border:none; padding: 5px; color: white; background: grey;">
		</form>
	</div>

	
	</a>
</section> 


</body>
</html>
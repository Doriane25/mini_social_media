<?php
session_start();
$bdd = new PDO ('mysql:host=localhost;dbname=dbserver;charset=utf8;', 'root', ''); 
if(!$_SESSION['name']){
	header('Location: connection.php');
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

	<?php
		$recupUser = $bdd->query('SELECT * FROM user');
		while($user = $recupUser->fetch()){
			?>
			<a href="message.php?id=<?php echo $user['id']; ?>">
				<p><?php echo $user['name']; ?></p>
			</a> 
			<?php
		}
	?>

</body>
</html>

<!DOCTYPE html>
<html lang="fr"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Test-stage">
  
  <title>Test</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style-lydia.css">
  
  <link rel="icon" href="images/dretic.svg">
  <link rel="stylesheet" href="https://use.typekit.net/rtg5odd.css">
  <link rel="stylesheet" href="https://use.typekit.net/rtg5odd.css">
  <link rel="stylesheet" href="https://use.typekit.net/rtg5odd.css">
  <link rel="stylesheet" href="https://use.typekit.net/uif3saw.css">
</head>
<header>
  <?php include('nav-bar.php') ?>
</header>
<div class="center">
  <h1>Ajouter un projet </h1>
  <?php 
    	include('database.php');
    	if (isset($_POST['submit'])) {
    		extract($_POST);
    		$content_dir = 'images/';
    		$tmp_file = $_FILES['fichier']['tmp_name'];
    		if (!is_uploaded_file($tmp_file)) {
    			exit('le fichier est introuvable');
    			# code...
    		}
    		$type_file = $_FILES['fichier']['type'];
    		if (!strstr($type_file, 'jpeg') && !strstr($type_file, 'png')){
    			exit('ce fichier nest pas une image');

    		}
    		$name_file =  time().'.jpg';
    		if (!move_uploaded_file($tmp_file,$content_dir.$name_file)){
    			exit('impossible de copier le fichier');
    		}
    		$save_article = $db->prepare('INSERT INTO poste(title,content,media) VALUES (?,?,?)');
    		$save_article->execute(array($titre,$contenu,$name_file));
    		echo "operation reussie";
    		

    }		 

  ?>

 
  <form method="POST" action="" enctype="multipart/form-data">
    <input type="text" name="titre" placeholder="Entrer le titre de votre projet" class="form form-control"><br>
    <textarea name="contenu" class="form form-control" placeholder=" Entrer le contexte de votre projet">
    </textarea>
    <br>
    <input type="file" name="fichier" class="file"><br><br>
    <a href="profile.php"><input type="submit" name="submit" class="btn btn-primary" value="Ajouter"></a>
    </form>
      
  

 
</div>
</html>

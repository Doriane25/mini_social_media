<?php include('database.php'); 
session_start();
$conn = mysqli_connect("localhost", "root", "", "dbserver");
$sessionId = $_SESSION["userid"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id = $sessionId"));

?>
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
<body>

  <div class="center">
 <h1>Modifier mes informations</h1>



    
<form method="POST" action="modifier.php" enctype="multipart/form-data">

 
    
<?php
if (!isset($_SESSION["userid"])) {
    header("Location: home.php");
    exit;
}
// Connexion à la base de données

$serveur = "localhost";
$utilisateur = "root";
$motdepasse ="";
$base = "dbserver";

$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $base);

// Vérifier la connexion
if (!$connexion) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password'])) {
   $id=$_SESSION["userid"];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Mettre à jour la base de données
    $requete = "UPDATE users SET name = '$name', email='$email', password='$password_hash' WHERE id= $sessionId  ";

    if (mysqli_query($connexion, $requete)) {
        echo "Modification réussie.";
    } else {
        echo "Erreur lors de la modification: " . mysqli_error($connexion);
    }

    // Fermer la connexion
    mysqli_close($connexion);
}
?>

    <?php  $req=$db->prepare("SELECT profile_picture FROM profil");
      $req->execute();
      $reponse=$req->fetch(PDO::FETCH_OBJ);
      ?> 


   

 
    <input type="text" name="name" placeholder="Name" class="form form-control"><br><br>
    <input type="text" name="email" placeholder="Email" class="form form-control"><br><br>
    <input type="password" name="password" placeholder="Password" class="form form-control"><br><br>
    

    <!--<input type="text" name="email" placeholder="Nouvelle adresse mail" class="form form-control"><br>
    <input type="password" name="mdp" placeholder="Nouveau mot de passe" class="form form-control"><br>-->
    
    
    <input type="submit" name="submit" class="btn btn-primary" value="Confirmer">

    </div>
    </form>
    </body>
    </html>

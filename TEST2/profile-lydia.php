<?php 

session_start();

    include('database.php'); 

    // S'il n'y a pas de session alors on ne va pas sur cette page
  

    // On récupère les informations de l'utilisateur connecté
   if (!isset($_SESSION["userid"])) {
    header("Location: home.php");
    exit;
}
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
  <?php include('nav-bar.php') ; ?>
  
</header>
<body>

<div class="container">
  <div class="row">
    <div class="col-12">
     <div class="section01">
      <?php
    
require 'database.php';

$sessionId = $_SESSION["userid"];
$conn = mysqli_connect("localhost", "root", "", "dbserver");
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id = $sessionId"));
?>

  <style media="screen">
    .upload{
      width: 140px;
      position: relative;
      text-align: center;


    }
    .upload img{
     
      border: 3px solid rgba(0, 0, 0, 0.172);
      position: relative;
   height: 200px;
   width: 200px;
   border-radius: 50%;
   margin-right: 80px;
   float: left;
    }
    .upload .rightRound{
      position: absolute;
      top: calc(20% 20px 20px);
      margin-left: 10px;
      right: 0;
      background: rgba(0, 0, 0, 0.172);
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }
    .upload .leftRound{
      position: absolute;
      top: calc(20% 20px 20px);
      margin-left: 30px;
      background: rgba(0, 0, 0, 0.172);
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }
    .upload .fa{
      color: white;
    }
    .upload input{
      position: absolute;
      transform: scale(2);
      opacity: 0;
    }
    .upload input::-webkit-file-upload-button, .upload input[type=submit]{
      cursor: pointer;
    }
  </style>

    <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
      <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
      <div class="upload">
        <img src="images/<?php echo $user['profile_picture']; ?>" id = "image">

        <div class="rightRound" id = "upload">
          <input type="file" name="fileImg" id = "fileImg" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera"></i>
        </div>

        <div class="leftRound" id = "cancel" style = "display: none;">
          <i class = "fa fa-times"></i>
        </div>
        <div class="rightRound" id = "confirm" style = "display: none;">
          <input type="submit">
          <i class = "fa fa-check"></i>
        </div>
      </div>
    </form>

    <script type="text/javascript">
      document.getElementById("fileImg").onchange = function(){
        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

        document.getElementById("cancel").style.display = "block";
        document.getElementById("confirm").style.display = "block";

        document.getElementById("upload").style.display = "none";
      }

      var userImage = document.getElementById('image').src;
      document.getElementById("cancel").onclick = function(){
        document.getElementById("image").src = userImage; // Back to previous image

        document.getElementById("cancel").style.display = "none";
        document.getElementById("confirm").style.display = "none";

        document.getElementById("upload").style.display = "block";
      }
    </script>

    <?php
    if(isset($_FILES["fileImg"]["name"])){
      $id = $_POST["id"];

      $src = $_FILES["fileImg"]["tmp_name"];
      $imageName = uniqid() . $_FILES["fileImg"]["name"];

      $target = "images/". $imageName;

      move_uploaded_file($src, $target);

      $query = "UPDATE user SET profile_picture = '$imageName' WHERE id = $id";
      mysqli_query($conn, $query);
    }
    ?>
    
<form method="POST" action="modifier.php" enctype="multipart/form-data">

 
    

        
      <div class="mr-0" >
         
      <h1><?php echo $_SESSION["name"]; ?></h1>
        <?php
$req = $db->query('SELECT COUNT(*) as nb_followers FROM social_follow');
$donnee = $req->fetch();
$req->closeCursor();
?>

      <?php
$req = $db->query('SELECT COUNT(*) as nb_photos FROM poste');
$donnees = $req->fetch();
$req->closeCursor();
?>

      <h5> <?php echo $donnees['nb_photos']; ?> Projets publiés   <?php echo $donnee['nb_followers']; ?>  followers  </h5>
      <a href="modifier-lydia.php"><input type="button" name="" value="Modifier le profile" class="btnn"></a>
      <a href="ajout-lydia.php"><input type="button" name="" value="Ajouter un projet" class="btnn"></a>
      </div>
    </div>
      
    </div>
    
  </div>
  
</div>
<div class="section02">
<div class="container">
  <div class="row">
    <div class="col-12 col-md-2">
      <div class="mt-1">
        <?php
$req = $db->query('SELECT COUNT(*) as nb_photos FROM poste');
$donnees = $req->fetch();
$req->closeCursor();
?>
        <h5> Projets publiés ( <?php echo $donnees['nb_photos']; ?> )</h5>
        
      </div>
     
    </div>
    <div class="col-12 col-md-8">
      
    </div>
    
  </div>
  
</div>
</div>
<div class="section03">
      <?php

      $req=$db->prepare('SELECT * FROM poste');
      $req->execute();
      while ($reponse=$req->fetch(PDO::FETCH_OBJ)) {
      ?>
      <div class="card" style="width: 30rem; height: 35rem; margin-left: 10%; margin-bottom: 15%;">
        <h3 class="card-title"><?php echo $reponse->title; ?></h3>
   <a href="#?titre=<?php echo $reponse->title;?>&content=<?php echo $reponse->content; ?>&media=<?php echo $reponse->media; ?>" class="modal-btn modal-trigger"><img src="images/<?php echo $reponse->media ?>" class="card-img-top imgh5"></a>
  <div class="card-body">
    <p><?php echo $reponse->content; ?></p>


    

    <a href="#" class="btn"><img src="images/coeur2.svg" class="icon1"></a>
    <a href="#" class="btn"><img src="images/commentaire3.svg" class="icon1"></a>
    <a href="#" class="btn"><img src="images/send.svg" class="icon1" name='projet'></a>
    <td><a href="profile.php?id=<?php echo $reponse->post_id; ?>"><img src="images/close.svg" class="icon2" name='projet' style="width: 25px; margin-left: 80px;"></a> </td>
   


    
    
  </div>

</div>


<?php } ?>


 <div class="modal-container" id="popup">
  <div class="overlay modal-trigger"></div>
   <h1><?php echo $_GET['titre'] ?></h1>
    <img style="max-width:20%;" src="images/<?php echo $_GET['media'] ?>">
    <p><?php echo $_GET['content'] ?></p>
    </div>
      </div>
 

      

    <script src="app.js"></script>
  </body>
  </html>

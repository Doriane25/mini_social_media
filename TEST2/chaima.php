<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'Database/Database.php';
include_once 'class/user.php';


$database = new Database();
$db = $database->getConnection();

$user = new User($db);
// Check if the user is not logged in, then redirect the user to login page
if (!isset($_SESSION["userid"])) {
  header("Location: home.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dretic</title>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="follow_unfollow.js"></script>


  <script src="follow_unfollow.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="images/png" href="/images/favicon.png">
  <link rel="stylesheet" href="chaima-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="css/swiper-bundle.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style-lydia.css">

</head>
<header>

  <?php include('nav-bar.php') ; ?> 
   <div>
        <p>
          <a href="logout.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" style="margin-left :1300px; margin-top :20px;" >Log Out</a>
        </p>
      </div>
    
  
</header>

<body>
  <?php
  date_default_timezone_set('Europe/Paris');

  include 'connectdb.php';
  include 'comments.php';
  ?>
  <section>
    <video autoplay muted loop class="bg-video">
      <source src="images/Render_1.mp4" type="video/mp4"> Votre navigateur ne prend pas en charge la balise vidéo.
    </video>
    <div class="text-bg">
      <p id="p1"> Bienvenue dans le monde de Art Numérique.</p>
      <div class="text-bg-big">
        <p id="t1">Explorez, </p>
        <p id="t2">l'art numérique et</p>
        <p id="t3"> le développement web</p>
        <p id="t4"> sans limites.</p>
      </div>
    </div>
  </section>
  <!-- _____________________________SLIDER-SECTION________________________ -->
  <section class="suggetion">
    <!-- Welcome your name -->
    <div class="container_welcome">
        <div class="row">
            <div class="col-md-12">
                <h1 style="width: 1000px;text-align: center;padding-bottom: 220px;">Hello, <strong><?php echo $_SESSION["name"]; ?></strong>. Welcome to demo site.</h1>
            </div>
        </div>
    </div>

    <div class="slide-container swiper">
      <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">

        <!-- follow and unfollow -->
         
        <?php 
					$unfollowedUserResult = $user->getUnfollowedUsers();
					while ($unfollowedUser = $unfollowedUserResult->fetch_assoc()) { 	
					?>	
        <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>
              <div class="card-image">
                <img src="images/avatar1.png" alt="avatar" class="card-img">
              </div>
            </div>
            <div class="card-content">
              <h2 class="name"><?php echo $unfollowedUser['name']; ?></h2>
              <li class="list-group-item" style="padding:15px;">
              <button type="button" id="follow_<?php echo $unfollowedUser['id']; ?>" data-userid="<?php echo $unfollowedUser['id']; ?>" class="button follow" style="margin:5px 5px 0px 0px;">Follow </button>
              </li>
            </div>
          </div>
                <!-- follow and unfollow -->
          <?php } ?>	
        </div>



        <div class="card-wrapper swiper-wrapper">

        </div>
      </div>
      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
  <!-- __________________________Filtre___________________________________________________________________ -->
  <main>
    <div class="wrap">
      <div class="buttons">
        <button class="button-value">Animation</button>
        <button class="button-value">Web design</button>
        <button class="button-value">Web Development </button>
        <button class="button-value">Product design</button>
        <button class="button-value">Graphisme</button>
      </div>
      <div class="filter-menu">
        <div class="filter-btn">
          <span class="filter">Filtre</span>
          <i class="fa-solid fa-bars-filter" style="color: #000000;"></i>
        </div>
        <ul class="options">
          <li class="option">
            <span class="option-text">github</span>
          </li>
        </ul>
        <ul class="options">
          <li class="option">
            <span class="option-text">github</span>
          </li>
        </ul>
        <ul class="options">
          <li class="option">
            <span class="option-text">github</span>
          </li>
        </ul>
        <ul class="options">
          <li class="option">
            <span class="option-text">github</span>
          </li>
        </ul>
      </div>
    </div>
    </div>
    <!-- __________________posts______________________________________________________________________________________ -->

    <div class="container">
      <div class="block-post">
        <div class="post">
          <button id="myBtn"><img class="image1" src="images/1.jpg" alt="img" data-toggle="modal" data-target="#myModal"></button>
        </div>
        <div class="react-container">
          <div class="block-user">
            <img src="images/avatar5.jpg" alt="avatar" class="avatar">
            <p>Leo Natsume</p>
          </div>
          <div class="tool-icon">
            <span class="likes">
              <i class="fa-sharp fa-solid fa-heart fa-xl" style="color: #adadad;"></i>
            </span>
            <span class="count"></span>
            <span class="save">
              <i class="fa-regular fa-bookmark fa-xl"></i>
            </span>
          </div>
        </div>
      </div>

      <div class="block-post">
        <div class="post">
          <button id="myBtn"><img class="image1" src="images/prototype1.webp" alt="img" data-toggle="modal" data-target="#myModal"></button>
        </div>
        <div class="react-container">
          <div class="block-user">
            <img src="images/avatar9.jpg" alt="avatar" class="avatar">
            <p>Shaya_draw</p>
          </div>
          <div class="tool-icon">
            <span class="likes">
              <i class="fa-sharp fa-solid fa-heart fa-xl" style="color: #adadad;"></i>
            </span>
            <span class="count"></span>
            <span class="save">
              <i class="fa-regular fa-bookmark fa-xl"></i>
            </span>
          </div>
        </div>
      </div>

      <div class="block-post">
        <div class="post">
          <button id="myBtn"><img class="image1" src="images/prototype1.webp" alt="img" data-toggle="modal" data-target="#myModal"></button>
        </div>
        <div class="react-container">
          <div class="block-user">
            <img src="images/avatar9.jpg" alt="avatar" class="avatar">
            <p>Shaya_draw</p>
          </div>
          <div class="tool-icon">
            <span class="likes">
              <i class="fa-sharp fa-solid fa-heart fa-xl" style="color: #adadad;"></i>
            </span>
            <span class="count"></span>
            <span class="save">
              <i class="fa-regular fa-bookmark fa-xl"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="block-post">
        <div class="post">
          <button id="myBtn"><img class="image1" src="images/prototype1.webp" alt="img" data-toggle="modal" data-target="#myModal"></button>
        </div>
        <div class="react-container">
          <div class="block-user">
            <img src="images/avatar9.jpg" alt="avatar" class="avatar">
            <p>Shaya_draw</p>
          </div>
          <div class="tool-icon">
            <span class="likes">
              <i class="fa-sharp fa-solid fa-heart fa-xl" style="color: #adadad;"></i>
            </span>
            <span class="count"></span>
            <span class="save">
              <i class="fa-regular fa-bookmark fa-xl"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="block-post">
        <div class="post">
          <button id="myBtn"><img class="image1" src="images/prototype1.webp" alt="img" data-toggle="modal" data-target="#myModal"></button>
        </div>
        <div class="react-container">
          <div class="block-user">
            <img src="images/avatar9.jpg" alt="avatar" class="avatar">
            <p>Shaya_draw</p>
          </div>
          <div class="tool-icon">
            <span class="likes">
              <i class="fa-sharp fa-solid fa-heart fa-xl" style="color: #adadad;"></i>
            </span>
            <span class="count"></span>
            <span class="save">
              <i class="fa-regular fa-bookmark fa-xl"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="block-post">
        <div class="post">
          <button id="myBtn"><img class="image1" src="images/prototype1.webp" alt="img" data-toggle="modal" data-target="#myModal"></button>
        </div>
        <div class="react-container">
          <div class="block-user">
            <img src="images/avatar9.jpg" alt="avatar" class="avatar">
            <p>Shaya_draw</p>
          </div>
          <div class="tool-icon">
            <span class="likes">
              <i class="fa-sharp fa-solid fa-heart fa-xl" style="color: #adadad;"></i>
            </span>
            <span class="count"></span>
            <span class="save">
              <i class="fa-regular fa-bookmark fa-xl"></i>
            </span>
          </div>
        </div>
      </div>
   
   
     
    
      
     
      
    
   
    </div>
    <!-- _________________________________________ -->

    <!-- ________________________________________________________________________________________________________ -->
    
    <!-- Trigger/Open The Modal -->
    <!-- <button id="myBtn">Open Modal</button> -->

    <!-- The Modal -->
    <div id="myModal" class="modal">
      <span class="close">&times;</span>
      <!-- Modal content -->

      <div class="modal-content">

        <div class="modal-caption">
          <img class="modal-image1" src="images/1.jpg" alt="img">
          <p>Some text in the Modal..</p>
        </div>
        <div class="comment-system">
          <div class="head-section">
            <img src="images/avatar5.jpg" alt="avatar" class="modal-avatar">
            <p>Leo Natsume</p>
          </div>
          <hr>
          <?php
          echo "<form method='POST' action='" . setComments($conn) . "'>
            <input type='hidden' name='user_id' value='Anonymous'>
            <input type='hidden' name='date' value='" . date('Y-m-d H:i:s') . "'>
            <textarea name='message'></textarea>
            <button type='submit' name='commentSubmit'>Comment</button>
          </form>";
          ?>

        </div>

      </div>

    </div>


  </main>
  <div class="section03" style="margin-right: 60px;">
      <?php

      $req=$db->prepare('SELECT * FROM poste');
      $req->execute();
      while ($reponse=$req->fetch(PDO::FETCH_OBJ)) {
      ?>
      <div class="card" style="width: 60rem; height: 25rem; margin-left: 10%; margin-bottom: 15%;">
        <h3 class="card-title"><?php echo $reponse->title; ?></h3>
   <a href="#?titre=<?php echo $reponse->title;?>&content=<?php echo $reponse->content; ?>&media=<?php echo $reponse->media; ?>" class="modal-btn modal-trigger"><img src="images/<?php echo $reponse->media ?>" class="card-img-top imgh5"></a>
  <div class="card-body">
    <p><?php echo $reponse->content; ?></p>
    <a href="#" class="btn"><img src="images/coeur2.svg" class="icon1"></a>
    <a href="#" class="btn"><img src="images/commentaire3.svg" class="icon1"></a>
    <a href="#" class="btn"><img src="images/send.svg" class="icon1" name='projet'></a>
    
  </div>

</div>




<?php } ?>
 <div class="modal-container" id="popup">
  <div class="overlay modal-trigger"></div>
   <h1><?php echo $_GET['titre'] ?></h1>
    <img src="images/<?php echo $_GET['media'] ?>">
    <p><?php echo $_GET['content'] ?></p>
    </div>
      </div>
         


   
    <!-- The Modal -->
    <div id="myModal" class="modal">
    
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
      </div>
    
    </div>
    
    <button class="open-modal-btn" data-toggle="modal" data-target="#myModal">Open Modal</button>
    

<script src="app.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="chaima-js/swiper-bundle.min.js"></script>
  <script src="chaima-js/index.js"></script>

  <script src="app.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/index.js"></script>


</body>

</html>
<?php
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
    <title>Welcome <?php echo $_SESSION["name"]; ?></title>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>			
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">        

        <script src="follow_unfollow.js"></script>
</head>

<body>
    <div class="container_welcome">
        <div class="row">
            <div class="col-md-12">
                <h1>Hello, <strong><?php echo $_SESSION["name"]; ?></strong>. Welcome to demo site.</h1>
            </div>
            <p>
                <a href="logout.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Log Out</a>
            </p>
        </div>
    </div>

 
    <button type="button" id="follow" class="btn btn-primary pull-left follow" data-user-id="follow-1" type="button">Follow</button>
    <button  type="button" class="btn btn-primary pull-left unfollow" id="unfollow">Unfollow</button>

    <div class="col-md-3">
			<div class="card gedf-card">
				<div class="card-body" style="padding:5px;">
					<h5 class="card-title">You might like</h5>				
					<?php 
					$unfollowedUserResult = $user->getUnfollowedUsers();
					while ($unfollowedUser = $unfollowedUserResult->fetch_assoc()) { 	
					?>					
					<li class="list-group-item" style="padding:15px;">
                        <label><?php echo $unfollowedUser['name']; ?></label> 
						<button type="button" id="follow_<?php echo $unfollowedUser['id']; ?>" data-userid="<?php echo $unfollowedUser['id']; ?>" class="btn btn-primary pull-right follow" style="margin:5px 5px 0px 0px;">Follow</button>
					</li>					
					<?php } ?>				
				</div>
			</div>	

</body>

</html>
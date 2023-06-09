<?php
include_once 'Database/Database.php';
include_once 'class/user.php';


$database = new Database();
$db = $database->getConnection();

$user = new User($db);



if(!empty($_POST['action']) && $_POST['action'] == 'followUser') {
	$user->followUserId = $_POST["userId"];	
	$user->followUser();
}

if(!empty($_POST['action']) && $_POST['action'] == 'unfollowUser') {
	$user->followUserId = $_POST["userId"];	
	$user->unfollowUser();
}
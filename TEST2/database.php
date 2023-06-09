<?php 
try {
	$db = new PDO('mysql:host=localhost;dbname=dbserver;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
	return $db;
} catch (Exception $e) {
	echo "erreur de connexion à la bdd".$r->getMessage();
}



 ?>
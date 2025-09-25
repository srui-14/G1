<?php
$dbhost="localhost";
$dbname="take";
$dbuser="take_admin";
$dbpass="takeadmin";

try {
	$dbcon=new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
} catch(PDOException $e){
	die("Database connection failed:" . $e->getMessage() ); 
}
?>

<?php
require_once("dbconnect.php"); 
$sql = "SELECT * FROM useraccount2";
try{
 $stmt = $dbcon->query($sql);
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['name'] . " " . $row['address'] . " " . $row['bank'] . " " . $row['mail'] ."<br>\n";
 }
 $stmt->closeCursor();
}catch(PDOException $e){die( $e->getMessage());}
$dbcon = null;
 
 ?>
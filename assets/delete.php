<?php
include_once 'connect.php'; 
$database = new Database(); 
$conn = $database->getConnection();
 
// initialize object
$asset = new Asset($database);
 
$asset->id_asset =$_POST['id_asset'];
$product->delete();
?>

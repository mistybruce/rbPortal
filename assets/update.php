<?php
include_once 'connect.php'; 
$database = new Database(); 
$conn = $database->getConnection();
 
// initialize object
$asset = new Asset($database);
 
// set values
$asset->name=$_POST['name'];
$asset->id_asset=$_POST['id_asset'];
$asset->id_asset_type=$_POST['id_asset_type'];
     
// update 
$asset->update();
?>
<?php
include_once 'connect.php'; 
$database = new Database(); 
$conn = $database->getConnection();



if($_POST){

    // set product property values
    $asset->name = $_POST['name'];
    $asset->id_asset = $_POST['id_asset'];
    $asset->id_asset = $_POST['id_asset_type'];
 
    // create the product
    if($asset->create()){     
            echo "asset was created.";
    }

    // if unable to create the product, tell the user
    else{
            echo "Unable to create product.";
    }
}
?>
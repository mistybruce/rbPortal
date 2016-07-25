<?php
include_once 'connect.php'; 
$database = new Database(); 
$conn = $database->getConnection();

 
// initialize object
$asset = new Asset($database);
 
// query products
$stmt = $asset->readAll();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // start table
    echo "<table class='table table-bordered table-hover'>";
     
        // creating our table heading
        echo "<tr>";
            echo "<th class='width-30-pct'>Name</th>";
            echo "<th class='width-30-pct'>id_asset</th>";
            echo "<th>id_asset_type</th>";
            echo "<th>Created</th>";
              
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row

            extract($row);
             
            // creating new table row per record
            echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>{$id_asset}</td>";
                echo "<td>{$id_asset_type}</td>";
               
                    // add the record id here, it is used for editing and deleting products
                    echo "<div class='id_asset display-none'>{$id}</div>";
                     
                    // edit button
                    echo "<div class='btn btn-info edit-btn margin-right-1em'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</div>";
                     
                    // delete button
                    echo "<div class='btn btn-danger delete-btn'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</div>";
                echo "</td>";
            echo "</tr>";
        }
         
    //end table
    echo "</table>";
     
}
 
// tell the user if no records found
else{
    echo "<div class='alert alert-info'>No records found.</div>";
}
 
?>
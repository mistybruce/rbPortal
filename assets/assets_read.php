<?php

include_once 'connect.php'; 
$database = new Database(); 
$conn = $database->getConnection();
 
$result = $conn->query("SELECT id_asset_type, name, description FROM asset_types");
 
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id_asset_type":"'  . $rs["id_asset_type"] . '",';
    $outp .= '"name":"'   . $rs["name"]        . '",';
    $outp .= '"description":"'. $rs["description"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();
 
echo($outp);
?>



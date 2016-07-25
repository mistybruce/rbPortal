<?php
include_once 'connect.php'; 
$database = new Database(); 
$conn = $database->getConnection();

class Asset{
    // table name
   
    private $table_name = "assets";
 
    // object properties
    public $id_asset;
    public $name;
    public $id_asset_type;
 
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name = ?,";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=($this->name);
        $this->id_asset=($this->id_asset);
        $this->id_asset_type=($this->id_asset_type);
       
 
        // bind values
        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->id_asset);
        $stmt->bindParam(3, $this->id_asset_type);
       
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

       // read products
       function readAll(){
 
        // select all query
            $query = "SELECT 
                id_asset, name, id_asset_type
            FROM 
                " . $this->assets . "
            ORDER BY 
                id DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
     
    // execute query
    $stmt->execute();
     
    return $stmt;
}

      // used when filling up the update product form
function readOne(){
     
    // query to read single record
    $query = "SELECT 
                name, id_asset, id_asset_type  
            FROM 
                " . $this->assets . "
            WHERE 
                id = ? 
            LIMIT 
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
     
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
     
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // set values to object properties
    $this->name = $row['name'];
    $this->id_asset = $row['id_asset'];
    $this->id_asset_type = $row['id_asset_type'];
}
 
    }
}

// update the product
function update(){
 
    // update query
    $query = "UPDATE 
                " . $this->asset . "
            SET 
                name = :name, 
                id_asset = :id_asset, 
                id_asset_type = :id_asset_type 
            WHERE
                id_asset = :id_asset";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->name=htmlspecialchars(strip_tags($this->name));
   
 
    // bind new values
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':id_asset', $this->id_asset);
    $stmt->bindParam(':id_asset_type', $this->id_asset_type);
     
    // execute the query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

// delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->asset . " WHERE id_asset = ?";
     
    // prepare query
    $stmt = $this->conn->prepare($query);
     
    // bind id of record to delete
    $stmt->bindParam(1, $this->id_asset);
 
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

?>
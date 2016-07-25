<?php 

class Database{ 
 
    // specify your own database credentials 
    private $host = "localhost"; 
    private $db_name = "RBPortalDB"; 
    private $username = "root"; 
    private $password = "P@55word"; 
    public $conn; 
 
    // get the database connection 
    public function getConnection(){ $this->conn = null;
         
        try{
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
?>
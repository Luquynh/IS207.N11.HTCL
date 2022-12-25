<?php
class DB{
    public $conn;
    protected $servername="localhost";
    protected $username="root";
    protected $password="";
    protected $dbname="web_dongho";
    function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }

    
        
    
}
?>
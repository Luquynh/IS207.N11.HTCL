<?php
class DB1{
    public $conn;
    protected $servername="localhost";
    protected $username="root";
    protected $password="";
    protected $dbname="web_dongho2";
    function __construct(){
        $this->conn=mysqli_connect($this->servername,$this->username,$this->password);
        mysqli_select_db($this->conn,$this->dbname);
        mysqli_query($this->conn,"SET NAMES 'utf8'");
    }

    
        
    
}
?>
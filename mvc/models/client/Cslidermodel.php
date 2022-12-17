<?php
class Cslidermodel extends DB1{
    public function GetData(){
        $sql="SELECT * from slider where tt_xoa=0";
        return mysqli_query($this->conn, $sql);
    }
}
?>
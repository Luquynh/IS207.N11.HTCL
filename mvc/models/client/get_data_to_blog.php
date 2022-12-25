<?php
    class get_data_to_blog extends DB1 {
        public function get(){
            $sql = "SELECT mablog, tieude, noidung, img FROM blog";
            return mysqli_query($this->conn, $sql);
        }
        public function getdetails($mablog){
            $sql = "SELECT mablog, tieude, noidung, img FROM blog WHERE mablog = '$mablog'";
            return mysqli_query($this->conn, $sql);
        }
    }
?>
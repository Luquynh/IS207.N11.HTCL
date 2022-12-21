<?php
    class get_data_to_pro_menwo extends DB1 {
        public function get_menwo1($gt){
            $sql = "SELECT bosuutap.tenbosuutap AS tenbosuutap, bosuutap.img AS img
            FROM bosuutap
            INNER JOIN kichthuoc ON bosuutap.makichthuoc = kichthuoc.makichthuoc
            WHERE bosuutap.gioitinh = '$gt'";
            return mysqli_query($this->conn, $sql);
        }
        public function get_menwo2($gt){
            $sql = "SELECT kichthuoc.kichthuoc AS kichthuoc
            FROM bosuutap
            INNER JOIN kichthuoc ON bosuutap.makichthuoc = kichthuoc.makichthuoc
            WHERE bosuutap.gioitinh = '$gt'";
            return mysqli_query($this->conn, $sql);
        }
        public function get_menwo3($gt){
            $sql = "SELECT DISTINCT sanpham.mausac 
            FROM sanpham
            INNER JOIN bosuutap ON sanpham.mabosuutap = bosuutap.mabosuutap
            WHERE bosuutap.gioitinh = '$gt'";
            return mysqli_query($this->conn, $sql);
        }
        public function get_all_spmenwo($gt){
            $sql = "SELECT masp, tensp, gia, sanpham.img AS img, 
            bosuutap.tenbosuutap AS tenbosuutap, mausac, kichthuoc.kichthuoc AS kichthuoc
            from sanpham 
            INNER JOIN bosuutap 
            ON sanpham.mabosuutap = bosuutap.mabosuutap
            INNER JOIN kichthuoc 
            ON bosuutap.makichthuoc = kichthuoc.makichthuoc 
            where bosuutap.gioitinh = '$gt'";
            return mysqli_query($this->conn, $sql);
        }
    }
?>
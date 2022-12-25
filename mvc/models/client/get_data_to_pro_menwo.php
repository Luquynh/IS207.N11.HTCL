<?php
    class get_data_to_pro_menwo extends DB1 {
        public function get_menwo1($gt){
            $sql = "SELECT bosuutap.tenbosuutap AS tenbosuutap, bosuutap.img AS img
            FROM bosuutap
            INNER JOIN kichthuoc ON bosuutap.makichthuoc = kichthuoc.makichthuoc
            WHERE bosuutap.gioitinh = '$gt'";
            return mysqli_query($this->conn, $sql);
        }
        public function alldhbst(){
            $sql = "SELECT tenbosuutap, gioitinh, img
            FROM bosuutap
            INNER JOIN kichthuoc ON bosuutap.makichthuoc = kichthuoc.makichthuoc";
            return mysqli_query($this->conn, $sql);
        }
//
        public function get_menwo2($gt){
            $sql = "SELECT kichthuoc
            FROM bosuutap
            INNER JOIN kichthuoc ON bosuutap.makichthuoc = kichthuoc.makichthuoc
            WHERE bosuutap.gioitinh = '$gt'";
            return mysqli_query($this->conn, $sql);
        }
        public function alldhkichthuoc(){
            $sql = "SELECT kichthuoc
            FROM bosuutap
            INNER JOIN kichthuoc ON bosuutap.makichthuoc = kichthuoc.makichthuoc";
            return mysqli_query($this->conn, $sql);
        }
//
        public function get_menwo3($gt, $day){
            if($day != 0) {
                $day = 2;
            }else{
                $day = 1;
            }
            $sql = "SELECT DISTINCT sanpham.mausac 
            FROM sanpham
            INNER JOIN bosuutap ON sanpham.mabosuutap = bosuutap.mabosuutap
            WHERE bosuutap.gioitinh = '$gt' AND sanpham.maloaisp = '$day'";
            return mysqli_query($this->conn, $sql);
        }
        public function alldhmausac($day){
            $sql = "SELECT DISTINCT sanpham.mausac 
            FROM sanpham
            INNER JOIN bosuutap ON sanpham.mabosuutap = bosuutap.mabosuutap
            WHERE sanpham.maloaisp = '$day'";
            return mysqli_query($this->conn, $sql);
        }
//
        public function get_all_spmenwo($gt, $day){
            if($day != 0) {
                $day = 2;
            }else{
                $day = 1;
            }
            $sql = "SELECT masp, tensp, gia, sanpham.img AS img, 
            bosuutap.tenbosuutap AS tenbosuutap, mausac, kichthuoc
            from sanpham 
            INNER JOIN bosuutap 
            ON sanpham.mabosuutap = bosuutap.mabosuutap
            INNER JOIN kichthuoc 
            ON bosuutap.makichthuoc = kichthuoc.makichthuoc 
            where bosuutap.gioitinh = '$gt' AND sanpham.maloaisp = '$day'";
            return mysqli_query($this->conn, $sql);
        }
        public function alldh($day){
            $sql = "SELECT masp, tensp, gia, sanpham.img AS img, 
            bosuutap.tenbosuutap AS tenbosuutap, bosuutap.gioitinh AS gioitinh, mausac, kichthuoc
            from sanpham 
            INNER JOIN bosuutap 
            ON sanpham.mabosuutap = bosuutap.mabosuutap
            INNER JOIN kichthuoc 
            ON bosuutap.makichthuoc = kichthuoc.makichthuoc 
            where sanpham.maloaisp = '$day'";
            return mysqli_query($this->conn, $sql);
        }
    }
?>
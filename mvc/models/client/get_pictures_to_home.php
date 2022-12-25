<?php
    class get_pictures_to_home extends DB1 {
        public function get_best_seller($gioitinh) {
            $sql = "SELECT masp, tensp, gia, sanpham.img, tenbosuutap
            from sanpham 
            INNER JOIN bosuutap 
            ON sanpham.mabosuutap = bosuutap.mabosuutap 
            where bosuutap.gioitinh = '$gioitinh' AND sanpham.maloaisp = '1'
            ORDER BY soluong
            LIMIT 4"; 
            return mysqli_query($this->conn, $sql);     
        }
        public function get_avatar($gioitinh) {
            $sql = "SELECT img, tenbosuutap from bosuutap where gioitinh = '$gioitinh'";
            return mysqli_query($this->conn, $sql);
        }
        public function search($kyw){
            $sql = "SELECT masp, tensp, gia, sanpham.img, tenbosuutap
            from sanpham 
            INNER JOIN bosuutap 
            ON sanpham.mabosuutap = bosuutap.mabosuutap 
            where ((tensp LIKE '%".$kyw."%') OR (tenbosuutap LIKE '%".$kyw."%')) AND sanpham.maloaisp = '1'";
            return mysqli_query($this->conn, $sql);
        }
    }
?>
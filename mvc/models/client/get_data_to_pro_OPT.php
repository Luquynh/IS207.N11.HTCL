<?php
    class get_data_to_pro_OPT extends DB1 {
        public function get_mausac($tenbst){
            $sql = "SELECT DISTINCT sanpham.mausac
            FROM sanpham
            INNER JOIN bosuutap ON sanpham.mabosuutap = bosuutap.mabosuutap
            WHERE bosuutap.tenbosuutap = '$tenbst' AND sanpham.maloaisp = '1'";
            return mysqli_query($this->conn, $sql);
        }
        public function get_anh_mota($tenbst){
            $sql = "SELECT mota, imgmain
            FROM bosuutap
            WHERE bosuutap.tenbosuutap = '$tenbst'";
            return mysqli_query($this->conn, $sql);
        }
        public function get_gioitinh($tenbst){
            $sql = "SELECT DISTINCT gioitinh
            FROM bosuutap
            WHERE tenbosuutap = '$tenbst'";
            return mysqli_query($this->conn, $sql);
        }
        public function get_all_spOPT($tenbst, $sapxep){
            $sql = "SELECT masp, tensp, gia, sanpham.img, bosuutap.tenbosuutap, mausac
            from sanpham 
            INNER JOIN bosuutap 
            ON sanpham.mabosuutap = bosuutap.mabosuutap 
            where tenbosuutap = '$tenbst' AND sanpham.maloaisp = '1'";
            if($sapxep == 1){
                $sql.=" ORDER BY gia ASC";
            } else if ($sapxep == -1) {
                $sql.=" ORDER BY gia DESC";
            } else{}
            return mysqli_query($this->conn, $sql);
        }
    }
?>
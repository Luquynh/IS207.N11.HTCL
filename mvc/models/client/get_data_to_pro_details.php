<?php
    class get_data_to_pro_details extends DB1 {
        public function get_table_sanpham($masp) {
            $sql = "select sanpham.tensp AS tensp, sanpham.gia AS gia, sanpham.img AS img,
            sanpham.img1 AS img1, sanpham.img2 AS img2, bosuutap.tenbosuutap AS tenbosuutap, bosuutap.gioitinh AS gioitinh
            from sanpham 
            INNER JOIN bosuutap 
            ON sanpham.mabosuutap = bosuutap.mabosuutap 
            where sanpham.masp = '$masp'";
            return mysqli_query($this->conn, $sql);
        }
    }
?>
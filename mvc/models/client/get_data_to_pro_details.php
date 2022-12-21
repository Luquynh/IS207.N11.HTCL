<?php
    class get_data_to_pro_details extends DB1 {
        public function get_table_sanpham($masp) {
            $sql = "select sanpham.masp AS masp,sanpham.tensp AS tensp, sanpham.gia AS gia, sanpham.mausac AS mausac,
            sanpham.mota AS mota, sanpham.img AS img, sanpham.img1 AS img1, sanpham.img2 AS img2,
            bosuutap.tenbosuutap AS tenbosuutap, bosuutap.gioitinh AS gioitinh, kichthuoc.kichthuoc AS kichthuoc 
            from sanpham 
            INNER JOIN bosuutap 
            ON sanpham.mabosuutap = bosuutap.mabosuutap
            INNER JOIN kichthuoc
            ON kichthuoc.makichthuoc = bosuutap.makichthuoc 
            where sanpham.masp = '$masp'";
            return mysqli_query($this->conn, $sql);
        }
        
    }
?>
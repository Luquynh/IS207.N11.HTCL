<?php
    class get_data_to_pro_details extends DB1 {
        public function get_table_sanpham($masp) {
            $sql = "select sanpham.masp AS masp,sanpham.tensp AS tensp, sanpham.gia AS gia, sanpham.mausac AS mausac,
            sanpham.mota AS mota, sanpham.img AS img, sanpham.img1 AS img1, sanpham.img2 AS img2, sanpham.soluong AS soluong,
            bosuutap.tenbosuutap AS tenbosuutap, bosuutap.gioitinh AS gioitinh, kichthuoc.kichthuoc AS kichthuoc 
            from sanpham 
            INNER JOIN bosuutap 
            ON sanpham.mabosuutap = bosuutap.mabosuutap
            INNER JOIN kichthuoc
            ON kichthuoc.makichthuoc = bosuutap.makichthuoc 
            where sanpham.masp = '$masp'";
            return mysqli_query($this->conn, $sql);
        }
        public function count($masp){
            $sql = "SELECT COUNT(mabl) AS count
            FROM binhluan
            WHERE masp = '$masp'";
            return mysqli_query($this->conn, $sql);
        }
        public function star($masp){
            $sql = "SELECT AVG(a.star) AS star FROM (SELECT star FROM `binhluan` AS SP1 
                                            WHERE masp = '$masp' AND mabl >= 
                                            (SELECT MAX(mabl) FROM `binhluan` AS SP2 
                                                WHERE SP1.makh = SP2.makh GROUP BY makh)) AS a";
            return mysqli_query($this->conn, $sql);
        }
    }
?>
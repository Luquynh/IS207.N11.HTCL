<?php
    class homemodel extends DB{
        //đếm tất cả các hóa đơn hay don hang
        function CountAllOrder(){
            $sql = "SELECT count(*) as tong FROM donhang WHERE matrangthai >0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //đếm tổng doanh thu của web
        function CountAllMony(){
            $sql = "SELECT sum(tonggiatri) as tong FROM donhang WHERE matrangthai= 4";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //đếm tổng số đơn hàng đã giao
        function CountOrderSuccess(){
            $sql = "SELECT count(*) as tong FROM donhang WHERE matrangthai= 4";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //lấy ra 10 đơn hàng gần đây nhất
        function OrderNew(){
            $sql = "SELECT * FROM donhang WHERE matrangthai= 1  order by madonhang desc limit 4";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //đếm tổng số thành viên
        function CountUser(){
            $sql = "SELECT count(*) as tong FROM khachhang WHERE tt_xoa=0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>
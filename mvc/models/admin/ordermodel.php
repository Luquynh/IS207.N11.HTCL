<?php
    class ordermodel extends DB{
        //Lấy toàn bộ danh sách đơn hàng theo trang
        function GetAllOrder($limit,$offset){
            $sql = "SELECT * FROM donhang ORDER BY 'madonhang' ASC LIMIT $limit OFFSET $offset";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //Lấy số lượng tất cả các đơn hàng để làm phân trang
        function GetNumberOrder(){
            $sql = "SELECT * FROM donhang ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->rowCount();
            return $result;
        }

        //Lấy thông tin khách hàng theo id (để làm trang chi tiết đơn hàng)
        function GetInfoUserById($id){
            $sql = "SELECT * FROM user_account WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //Lấy chi tiết đơn hàng
        function GetOrderDetails($id_order){
            $sql = "SELECT * FROM chitietdonhang WHERE madonhang = '$id_order'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //Xử Lý đơn hàng
        function orderprocessing($id){
            $sql = "UPDATE donhang SET status='Đã Xử Lý' WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }
        //hàm lấy trạng thái đơn hàng đã được xử lý hay chưa
        function GetStatusOrder($id){
            $sql = "SELECT * FROM donhang WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>
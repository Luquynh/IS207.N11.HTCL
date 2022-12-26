<?php
    class ordermodel extends DB{
        //Lấy toàn bộ danh sách đơn hàng theo trang
        function GetAllOrder($limit,$offset){
            $sql = "SELECT * FROM donhang as d
            INNER JOIN khachhang as k on k.makh=d.makh
            ORDER BY 'madonhang' DESC LIMIT $limit OFFSET $offset";
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
        
        //Lấy thông tin khách hàng theo madonhang(để làm trang chi tiết đơn hàng)
        function GetInfoUserById($id){
            $sql = "SELECT * FROM khachhang as k INNER JOIN donhang as d  ON
            d.makh=k.makh
             WHERE d.makh= $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_decode(json_encode($result),true);
        }

        //Lấy chi tiết đơn hàng<thuan client>
        function GetOrderDetails($id_order){
            $sql = "SELECT * FROM chitietdonhang WHERE madonhang = $id_order";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        //Lay chi tiet don hang admin
        function GetOrderDetailsadmin($id_order){
            $sql = "SELECT * FROM sanpham as s
            INNER JOIN chitietdonhang as c on
            c.masp= s.masp
             WHERE c.madonhang = $id_order";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        //Lay order thong tin by id admin
        function GetorderByIdadmin($id){
            $sql = "SELECT * FROM donhang as d
            INNER JOIN trangthaidonhang as t
            on t.matrangthai=d.matrangthai
             WHERE d.madonhang= $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_decode(json_encode($result),true);
        }

        //Update order information
        function updateorder($id,$sodt,$diachi){
            $sql = "UPDATE donhang SET sodt='$sodt',diachi='$diachi' WHERE madonhang = '$id'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
        //update ngaygiao
        function updatengaygiao($id){
            $sql = "UPDATE donhang SET ngaygiao=CURRENT_TIME() WHERE madonhang = '$id'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
        //Lay thang va nam cua don hang
        
        function GetyearOrder($id){
            $sql = "SELECT year(ngaygiao) as year FROM donhang WHERE madonhang= $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function GetMonthOrder($id){
            $sql = "SELECT month(ngaygiao) as month FROM donhang WHERE madonhang= $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        //Xử Lý đơn hàng
        function orderprocessing($id){
            $sql = "UPDATE donhang SET status='Đã Xử Lý' WHERE madonhang= $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }
        //hàm lấy trạng thái đơn hàng đã được xử lý hay chưa
        function GetStatusOrder($id){
            $sql = "SELECT * FROM donhang WHERE madonhang= $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        //Update status
        function updatestatus($id,$matt){
            $sql = "UPDATE donhang SET matrangthai = $matt WHERE madonhang = '$id'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
        //get trang thai in table trangthaidonhang
        function Getallstatus(){
            $sql = "SELECT * FROM trangthaidonhang ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>
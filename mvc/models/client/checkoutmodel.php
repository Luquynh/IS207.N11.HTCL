<?php
    class checkoutmodel extends DB{
        //Ghi dữ liệu vào bảng order_product trong database
        function AddDonhang($id_user,$phone,$address,$ship, $total){
            $sql = "INSERT INTO donhang VALUES ('','$address','$phone',$total,current_time(),'', 1, $id_user, $ship, 0)";
            $query = $this->conn->prepare($sql);
            $query->execute();
            // $this->conn->exec($sql);
            $id_order = $this->conn->lastInsertId();
            return $id_order;
        }

        //Ghi dữ liệu vào bảng order_details trong database
        function AddChitietdonhang($id_order,$id_product,$quantity,$unit_price){
            $sql = "INSERT INTO chitietdonhang VALUES ('',$id_order,$id_product, $quantity, $unit_price)";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        //Lấy ra số lượng hiện có của sản phẩm tức là cột quantity của sản phẩm
        function GetQuantityById($id){
            $sql = "SELECT soluong FROM sanpham WHERE masp = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //cập nhật lại số lượng sản phẩm sau khi đã bán
        function UpdateQuantityById($id,$quantity){
            $sql = "UPDATE sanpham SET soluong = $quantity WHERE masp = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }
        // Lấy tên trạng thái đơn hàng
        function getTrangthaidonhang($id){
            $sql = "SELECT tentrangthai from trangthaidonhang where matrangthai = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        //Lấy số lượng đã bán cột pay trong bảng product
        function GetProductPay($id){
            $sql = "SELECT pay FROM product WHERE id = $id and status_delete = 0";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        //Cập nhật số lượng sản phẩm đã bán trong mỗi sản phẩm (cột pay trong csdl)
        function PayProduct($id,$quantity){
            $sql = "UPDATE product SET pay = $quantity WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        //lấy đơn hàng theo id khách hàng(dùng để hiển thị lịch sử mua hàng của khách hàng)
        function GetHistotyOrder($id){
            // $sql = "select * from order_product where user_id = $id and cancel_order = 0 and delete_order = 0";
            $sql = "SELECT * from donhang where makh = $id and tt_xoa = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        //xử lý khách hàng bấm nút xác nhận đã nhận hàng
        function Confirm($id){
            $sql = "UPDATE order_product SET status_recieve = 'true' WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $sql = "UPDATE order_product SET status = 'Đã Nhận Hàng' WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        //xử lý khi khách hàng bấm xóa đơn hàng
        function DeleteOrder($id){
                $sql = "UPDATE  order_product SET delete_order = 1 WHERE id = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
        }
        function CancelOrder($id){
            $sql = "UPDATE  order_product SET cancel_order = 1 WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
    }
    }
?>
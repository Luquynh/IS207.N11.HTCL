<?php
    class accountmodel extends DB{
        //Đăng nhập người dùng
        function LoginUser($email,$pass){
            $sql = "SELECT * FROM khachhang WHERE email = '$email' and matkhau  = '$pass'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }
        
        //Kiểm tra người dùng có bị block tài khoản hay không
        function CheckBlockUser($email){
            $sql = "SELECT * FROM khachhang WHERE email = '$email' and active_status = 'block'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }

        //Lấy thông tin người dùng
        function GetNameUser($email,$pass){
            $sql = "SELECT * FROM khachhang WHERE email = '$email' and matkhau  = '$pass'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  json_encode($query->fetchAll(PDO::FETCH_ASSOC));
            return json_decode($result,true);
        }

        //Lấy danh sách người dùng theo trang
        function GetAllUser($limit,$offset){
            $sql = "SELECT * FROM khachhang ORDER BY 'id' ASC LIMIT $limit OFFSET $offset";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //Lấy ra số lượng người dùng để phân trang
        function GetNumberUser(){
            $sql = "SELECT * FROM khachhang";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }

        //Hàm xử lý mở hoặc khóa tài khoản người dùng
        function StatusAccountUser($id,$status){
            if($status == "Hoạt Động"){
                $sql = "UPDATE khachhang SET active_status='Block' WHERE id = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }else{
                $sql = "UPDATE khachhang SET active_status='Hoạt Động' WHERE id = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }
        }
    }
?>
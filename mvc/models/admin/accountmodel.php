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
        function Loginadmin($email,$pass){
            $sql = "SELECT * FROM admin_account WHERE email = '$email' and matkhau  = '$pass'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }
        
        //Kiểm tra người dùng có bị block tài khoản hay không
        function CheckBlockUser($email){
            $sql = "SELECT * FROM khachhang WHERE email = '$email' and tt_xoa = '1'";
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

        //Lấy thông tin admin
        function GetNameAdmin($email,$pass){
            $sql = "SELECT * FROM admin_account WHERE email = '$email' and matkhau  = '$pass'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  json_encode($query->fetchAll(PDO::FETCH_ASSOC));
            return json_decode($result,true);
        }

        //Lấy danh sách người dùng theo trang
        function GetAllUser($limit,$offset){
            $sql = "SELECT * FROM khachhang ORDER BY 'makh' ASC LIMIT $limit OFFSET $offset";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //Lấy danh sách người dùng theo trang
        function GetEmailAllUser(){
            $sql = "SELECT * FROM khachhang ";
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
        function StatusAccountUser($makh,$status){
            if($status == 0){
                $sql = "UPDATE khachhang SET tt_xoa=1 WHERE makh = $makh";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }else{
                $sql = "UPDATE khachhang SET tt_xoa=0 WHERE makh = $makh";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }
        }
    }
?>
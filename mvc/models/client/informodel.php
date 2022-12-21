<?php
    class informodel extends DB{
        //thay đổi thông tin người dùng
        function ChangerInfo($id, $name, $email, $address, $xaid, $maqh, $matp, $phone, $gender){
            $sql = "UPDATE khachhang SET tenkh = '$name', email = '$email', sodt = '$phone', diachi = '$address', xaid = '$xaid', maqh = '$maqh', matp = '$matp', gioitinh = '$gender', ngaysua = current_time() where makh = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }
        //Cập nhật thông tin người dùng khi order 
        function ChangerInfoorder($id, $name, $email, $address, $xaid, $maqh, $matp, $phone){
            $sql = "UPDATE khachhang SET tenkh = '$name', email = '$email', sodt = '$phone', diachi = '$address', xaid = '$xaid', maqh = '$maqh', matp = '$matp', ngaysua = current_time() where makh = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }
        //lấy thông tin người dùng theo id
        function GetInfoUser($id){
            $sql = "SELECT * FROM khachhang where makh = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //đổi mật khẩu người dùng
        function ChangerPassUser($id, $pass){
            $sql = "UPDATE khachhang SET matkhau = '$pass' where makh = '$id' ";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        //Lấy tên quận huyện
        function getNameDistrict($maqh) {
            $sql = "SELECT name FROM devvn_quanhuyen Where maqh = '$maqh'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //Lấy tên xã phường thị trấn
        function getNameWard($xaid) {
            $sql = "SELECT name FROM devvn_xaphuongthitran Where xaid = '$xaid'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //Lấy tên thành phố
        function getNameCity($matp) {
            $sql = "SELECT * FROM devvn_tinhthanhpho Where matp = '$matp'";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>
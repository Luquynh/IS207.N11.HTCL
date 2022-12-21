<?php
    class commonmodel extends DB{

        //Hàm đăng nhập tài khoản
        function Login($user,$pass,$table){
            $sql = "SELECT * FROM $table WHERE user_name = '$user' and pass_word  = '$pass'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }
        //hàm lấy cookie từ database
        function AddCookie($user,$cookie,$table){
            $sql = "UPDATE $table SET cookie = '$cookie' WHERE user_name = '$user'";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        // đổi mật khẩu
        function ChangePassword($passnew,$cookie,$table){
            $sql = "UPDATE $table SET pass_word = '$passnew' WHERE cookie = '$cookie'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }

        // hàm dùng để lấy ra mật khẩu cũ từ database mục đích dùng để đăng nhập và đổi mật khẩu
        function GetPassOld($cookie,$table){
            $sql = "SELECT pass_word FROM $table WHERE cookie = '$cookie'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //lấy cookie từ database dùng để kiểm tra lưu đăng nhập
        function GetCookie($cookie,$table){
            $sql = "SELECT cookie FROM $table WHERE cookie = '$cookie'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }

        // dùng để lấy tổng số lượng bản ghi
        function GetNumber($table){
            $sql = "SELECT * FROM $table WHERE tt_xoa = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }
        //lấy danh mục sản phẩm theo số lượng để phân trang
        function GetCategoryPage($limit,$offset,$table,$id_name){
            $sql = "SELECT * FROM $table WHERE tt_xoa = 0  ORDER BY $id_name ASC LIMIT $limit OFFSET $offset";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        //lấy sản phẩm hoặc danh mục theo id dùng để sửa sản phẩm hoặc danh mục
        function GetData($id,$table,$maid){
            $sql = "SELECT * FROM $table WHERE $maid = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_decode(json_encode($result),true);
        }
        function GetDataslider($id,$table){
            $sql = "SELECT * FROM $table WHERE maslider = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_decode(json_encode($result),true);
        }

        //kiểm tra xem tài khoản đã tồn tại hay chưa dùng trong đăng kí tài khoản
        function checkemail($email){
            $sql ="SELECT * FROM khachhang WHERE email = '$email'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->rowCount();
            return $result;
        }
        
        function sigin($email, $pass, $name, $address, $xaid, $maqh, $matp, $phonenumber, $gender,$diachi_dd){
            $sql ="INSERT INTO khachhang VALUES ('','$name','$gender','$email','$pass','$phonenumber','$matp','$maqh','$xaid','$address','$diachi_dd',current_time(),'',0)";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        //lấy sản phẩm mới nhất
        function GetProductNew(){
                $sql = "SELECT * FROM sanpham WHERE status_delete = 0  ORDER BY ngaytao DESC LIMIT 4";
                $query = $this->conn->prepare($sql);
                $query->execute();
                $result =  $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        }

        //hàm lấy sản phẩm theo id
        function GetProductById($id){
            $sql = "SELECT * FROM sanpham WHERE masp = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        function getBosuutap($mabosuutap){
            $sql = "SELECT * FROM bosuutap WHERE mabosuutap = '$mabosuutap'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        function getKichthuoc($makichthuoc){
            $sql = "SELECT * FROM kichthuoc WHERE makichthuoc = '$makichthuoc'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        //lấy ra số lượng sản phẩm theo từng danh mục
        function NumberProductById($id){
                $sql = "SELECT * FROM sanpham WHERE category_id = $id and status_delete = 0";
                $query = $this->conn->prepare($sql);
                $query->execute();
                $result =  $query->rowCount();
                return $result;
        }

        // Sản phẩm bán chạy nhất
        function MSProduct(){
            $sql = "SELECT * FROM sanpham WHERE status_delete = 0  ORDER BY pay DESC LIMIT 3";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        // Sản phẩm khuyến mãi
        function ProductSale(){
            $sql = "SELECT * FROM sanpham WHERE status_delete = 0  ORDER BY sale_product DESC LIMIT 3";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

    }
?>
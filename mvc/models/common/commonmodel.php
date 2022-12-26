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
        //lấy thông tin admin theo id
        function GetInfoAdmin($id){
            $sql = "SELECT * FROM admin_account where maadmin = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        // đổi mật khẩu admin
        function ChangePasswordAdmin($id, $pass){
            $sql = "UPDATE admin_account SET matkhau = '$pass' where maadmin = '$id' ";
            $query = $this->conn->prepare($sql);
            $query->execute();
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
        function UpLoadFiles($url,$file = []){
            //tạo đường dẫn khi upload lên sever
            // echo "<pre>";
            // print_r($file);die;
            
                $target_file = $url.basename($file["img"]["name"]);
            //kiểm tra dung lượng của file
            $error =[];
           
                if($file["img"]["size"] > 5242880){
                    $error = ["size"=>"file ".$file["img"]["name"]." vượt quá 5MB"];
                }
    
            //Kiểm tra loại file
            
                $file_type = pathinfo($file["img"]["name"], PATHINFO_EXTENSION);
                $array_file_type = ["jpg","png","jpeg","gif"];
                if(!in_array(strtolower($file_type),$array_file_type)){
                    $error = ["file ".$file["img"]["name"]." không đúng định dạng"];
                }
            
            //Kiểm tra đã tồn tại trên sever hay chưa
            
                if(file_exists($target_file)){
                    $error = ["exits"=>"file ".$file["img"]["name"]." đã tồn tại trên hệ thống"];
                }
            //upload lên sever
            if(empty($error)){
                    if(move_uploaded_file($file["img"]["tmp_name"],$target_file)){
                        $success = true;
                    }
            }else{
                return $error;
            }
            return $success;
        }
        //lấy danh mục sản phẩm theo số lượng để phân trang
        function GetCategoryPage($limit,$offset,$table,$id_name){
            $sql = "SELECT * FROM $table WHERE tt_xoa = 0  ORDER BY $id_name ASC LIMIT $limit OFFSET $offset";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        //Lấy ra kích thước của sản phẩm 
        function GetCategorysize($limit,$offset){
            $sql = "SELECT * FROM bosuutap as s
            INNER JOIN kichthuoc as k on k.makichthuoc=s.makichthuoc
            WHERE tt_xoa=0
            ORDER BY mabosuutap ASC LIMIT $limit OFFSET $offset";
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
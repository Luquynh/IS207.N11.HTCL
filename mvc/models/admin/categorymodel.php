<?php

    class categorymodel extends DB{
        //Hàm lấy tất cả danh mục sản phẩm
        function GetCategory(){
            $sql = "SELECT * FROM category ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        //Hàm xóa danh mục sản phẩm
        function DeleteCategory($id){
            $sql = "UPDATE  category SET tt_xoa = 1 WHERE mabosuutap = '$id'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
        //Hàm them danh mục sản phẩm
        function AddCategory($name,$status,$slug){
            $sql = "INSERT INTO category VALUES ('','$name','$slug','$status',current_time(),'',0)";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        //Hàm lấy danh mục sản phẩm theo id
        function GetCategoryId($id){
            $sql = "SELECT * FROM category WHERE mabosuutap = '$id' and tt_xoa = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        //Hàm xử lý thay đổi trạng thái hiển thị của danh mục sản phẩm
        function StatusCategory($id,$status){
            if($status == 0){
                $sql = "UPDATE bosuutap SET tt_xoa=1 WHERE mabosuutap = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }else{
                $sql = "UPDATE bosuutap SET tt_xoa=0 WHERE mabosuutap = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }
        }

        //Hàm xử lý chỉnh sửa danh mục sản phẩm
        function EditCategory($name,$gioitinh,$id,$makichthuoc,$mota,$img,$imgmain){
            
            $sql = "UPDATE `bosuutap` SET `tenbosuutap`='$name',`gioitinh`='$gioitinh',`makichthuoc`='$makichthuoc',`mota`='$mota',`img`='$img',`imgmain`='$imgmain' WHERE mabosuutap=$id";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        function GetDatacategory($id,$maid){
            $sql = "SELECT * FROM bosuutap as b INNER JOIN kichthuoc as k  on b.makichthuoc =k.makichthuoc  WHERE $maid = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_decode(json_encode($result),true);
        }
        function getkichthuoc(){
            $sql = "SELECT * FROM kichthuoc ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        function getsanpham($id){
            $sql = "SELECT * FROM sanpham where mabosuutap=$id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_decode(json_encode($result),true);
        }
    }

?>
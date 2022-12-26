<?php

    class productmodel extends DB{
        //Thêm sản phẩm
        function AddProduct($name,$price,$img,$quantity,$decsription,$id_category,$sale,$mausac,$loaisp){
            $sql = "insert into sanpham values ('','$name','$price','$mausac','$decsription','$img','','',current_time(),'',$id_category,$loaisp,$quantity,$sale,0)";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        //Xóa sản phẩm
        function DeleteProduct($id){
            $sql = "UPDATE sanpham SET tt_xoa = 1 WHERE id = '$id'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
        //hàm lấy sản phẩm theo id
        function GetProductById($id){
            $sql = "SELECT * FROM 
            bosuutap as b 
            INNER JOIN sanpham as s on b.mabosuutap=s.mabosuutap
            WHERE s.masp = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        function GetbosuutapById($id){
            $sql = "SELECT b.tenbosuutap FROM 
            bosuutap as b 
            INNER JOIN sanpham as s on b.mabosuutap=s.mabosuutap
            WHERE s.masp = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
     //lấy danh mục sản phẩm theo số lượng để phân trang
     function GetCategoryPage($limit,$offset,$id_name){
        $sql = "SELECT * FROM bosuutap as b 
        INNER JOIN sanpham as s on b.mabosuutap=s.mabosuutap
        WHERE s.tt_xoa = 0  ORDER BY $id_name ASC LIMIT $limit OFFSET $offset";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }
        //xóa những sản phẩm thuộc danh mục bị xóa
        function UpdateProduct($id){
            $sql =  "UPDATE  sanpham SET tt_xoa = 1 where mabosuutap = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
        // lấy sản phẩm theo id với số lượng là litmit và bắt đầu từ offset
        function GetProductPage($id,$limit,$offset){
            $sql = "SELECT * FROM product where category_id = $id and status_delete = 0 ORDER BY 'id' ASC LIMIT $limit OFFSET $offset";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_decode(json_encode($result),true);
        }
        //lấy số lượng sản phẩm theo danh mục
        function GetNumber($id){
            $sql = "SELECT * FROM product where category_id = $id and status_delete = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }
        // cập nhật lại sản phẩm sau khi sửa
        function UpdateProductById($id,$name,$price,$img,$quantity,$decsrip,$id_category){
            $sql = "UPDATE sanpham SET gia = $price, img = '$img', soluong = $quantity, mota = '$decsrip', ngaysua = current_time(), mabosuutap = $id_category WHERE masp = $id";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
    }
?>
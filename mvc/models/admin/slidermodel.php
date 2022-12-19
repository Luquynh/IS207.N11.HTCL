<?php
    class slidermodel extends DB{
        // Hiển thị Slider
        function ShowSlider(){
            $sql = "SELECT * FROM slider";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        function getimg(){
            $sql = "SELECT banner_img FROM slider";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        //Thêm Slider
        function AddSlider($pretitle,$title,$subtitle,$img){
            $sql = "INSERT INTO slider values ('','$pretitle','$title','$subtitle',current_time(),current_time(),'$img',0)";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        //dùng để hiển thị hoặc ẩn slider trang người dùng
        function statusslider($id,$status){
            if($status == 0){
                $sql = "UPDATE slider SET tt_xoa='1' WHERE maslider = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }else{
                $sql = "UPDATE slider SET tt_xoa='0' WHERE maslider = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }
        }

        //Xóa slider
        function DeleteSlider($id){
            $sql = "DELETE from slider WHERE maslider = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
        function Editslider($id,$name,$slogan,$content,$img){
            $sql = "UPDATE slider SET pretitle='$name', title='$content', subtitle='$slogan', banner_img='$img' WHERE maslider = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }
        function counthd(){
            $sql = "SELECT count(*) as sohd FROM donhang WHERE tt_xoa= 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>
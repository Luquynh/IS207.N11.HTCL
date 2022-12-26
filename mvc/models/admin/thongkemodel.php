<?php
    class thongkemodel extends DB{
        // add vo bang thong ke
        function addthongke($year,$month,$profit){
            $sql = "insert into doanhthu values ('','$year','$month','$profit')";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        //get du lieu doanh thu
       function getdoanhthu($month,$year){
        $sql = "SELECT profit FROM doanhthu WHERE year='$year' and month='$month'";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
       }
       function Updatedoanhthu($year,$month,$profit){
        $sql = "UPDATE doanhthu SET profit='$profit' 
        WHERE year='$year' and month='$month'";
        $query = $this->conn->prepare($sql);
        $result=$query->execute();
        
        return $result;
       }
       function getyeardoanhthu(){
        
        $query = "SELECT year FROM doanhthu GROUP BY year DESC";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
       }
       function getdatabyyear($year){
            $query = "
                    SELECT * FROM doanhthu 
                    WHERE year = '$year' 
                    ORDER BY month ASC
                    ";
                    $statement = $this->conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    return $result;
       }
    }
?>
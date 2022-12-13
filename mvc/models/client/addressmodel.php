<?php 
    class addressmodel extends DB {

        function city_all(){
            $sql = 'SELECT * FROM devvn_tinhthanhpho';
            $query = $this->conn->prepare($sql);
            $result = $query->execute();

            return $result;
        }

        function district($id_city) {
            $sql = 'SELECT * FROM devvn_quanhuyen WHERE matp = $id_city';
            $query = $this->conn->prepare($sql);
            $result = $query->execute();

            return $result;
        }

        function sub_district($id_district) {
            $sql = 'SELECT * FROM devvn_xaphuongthitran WHERE maqh = $id_district';
            $query = $this->conn->prepare($sql);
            $result = $query->execute();

            return $result;
        }
    }
?>
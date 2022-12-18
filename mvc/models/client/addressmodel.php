<!-- <?php 
    class addressmodel extends DB {

        function city_all(){
            $sql = 'SELECT * FROM devvn_tinhthanhpho';
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        function getDistrict($id_city) {
            $sql = "SELECT * FROM devvn_quanhuyen WHERE matp = '$id_city'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        function getWard($id_district) {
            $sql = "SELECT * FROM devvn_xaphuongthitran WHERE maqh = '$id_district'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        // Lấy quận huyện theo id
        function getNameDictrict($maqh) {
            $sql = "SELECT name FROM devvn_quanhuyen Where maqh = '$maqh'";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?> -->
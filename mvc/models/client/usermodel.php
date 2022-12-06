<?php
    class usermodel extends DB{

        function sigin($email,$pass,$name,$address,$phonenumber,$gender){
            $sql ="INSERT INTO user_account VALUES ('','$name','$email','$pass','$phonenumber','$gender','$address',current_time(),'','true')";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        function checkemail($email){
            $sql ="SELECT * FROM user_account WHERE email = $email";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->rowCount();
            return $result;
        }
    }
?>
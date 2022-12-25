<?php
class contact extends Controller {
    var $header;
    function __construct()
    {
        $this->header=$this->ModelClient("get_pictures_to_home");
        
    }

    function show(){
        $total = 0;
            if(isset($_SESSION["cart"])){
                foreach($_SESSION["cart"] as $key=>$values){
                    $total+=$values["total"];
                }
            }
            //Tính phí ship
            if (intval($total) > 700000){
                $phiship = 0;
            } else $phiship = 30000;

        if (isset($_POST['send'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = nl2br($_POST['message']);
            sendcontactus($name, $phone, $email, $message);
            header("location:".base);
        }
        $data = [
            "avatar_men" => $this->header->get_avatar("men"),
            "avatar_women" => $this->header->get_avatar("women"),
            "total" => $total
        ];

        $this->ViewClient('contact', $data);
    }

}
?>
<?php
class callMCdisplaysp extends Controller{
    function __construct(){}
    function show(){
        $header = $this->ModelClient("get_pictures_to_home");
        $total = 0;
        if(isset($_SESSION["cart"])){
            foreach($_SESSION["cart"] as $key=>$values){
                $total+=$values["total"];
            }
        }
        $kyw="";
        if(isset($_POST["kyw"])&&($_POST["kyw"]!="")) {
            $kyw = $_POST["kyw"];
        }
        $data = [
        "avatar_men" => $header->get_avatar("men"),
        "avatar_women" => $header->get_avatar("women"),
        "search" => $header->search($kyw),
        ];
        $this->ViewClient("require_display_sanpham",$data);
    }
}
?>
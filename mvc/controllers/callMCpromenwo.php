<?php
class callMCpromenwo extends Controller{
    function __construct(){}
    function show($gt, $day = 0){
        $header = $this->ModelClient("get_pictures_to_home");
        $a = $this->ModelClient("get_data_to_pro_menwo");
        $total = 0;
        if(isset($_SESSION["cart"])){
            foreach($_SESSION["cart"] as $key=>$values){
                $total+=$values["total"];
            }
        }
        $sapxep=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sapxep=$_POST["sapxep"];
        }
        $data = [
        "avatar_men" => $header->get_avatar("men"),
        "avatar_women" => $header->get_avatar("women"),
        // "only1pro" => $a->get_table_sanpham("$masp")
        "gioitinh" => "$gt",
        "get_menwo1" => $a->get_menwo1($gt),
        "get_menwo2" => $a->get_menwo2($gt),
        "get_menwo3" => $a->get_menwo3($gt, $day),
        "get_all_spmenwo" => $a->get_all_spmenwo($gt, $day, $sapxep),
        "day" => "$day",
        "alldh" => $a->alldh($day, $sapxep),
        "alldhbst" => $a->alldhbst(),
        "alldhkichthuoc" => $a->alldhkichthuoc(),
        "alldhmausac" => $a->alldhmausac($day),
        'total' => $total
        ];
        if ($gt=='alldh') {
            $this->ViewClient("require_pro_alldh",$data);
        } else {
            $this->ViewClient("require_pro_menwo",$data);
        }
    }
}
?>
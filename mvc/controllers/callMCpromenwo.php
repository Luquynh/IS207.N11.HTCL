<?php
class callMCpromenwo extends Controller{
    function __construct(){}
    function show($gt){
        $header = $this->ModelClient("get_pictures_to_home");
        $a = $this->ModelClient("get_data_to_pro_menwo");
        $data = [
        "avatar_men" => $header->get_avatar("men"),
        "avatar_women" => $header->get_avatar("women"),
        // "only1pro" => $a->get_table_sanpham("$masp")
        "gioitinh" => "$gt",
        "get_menwo1" => $a->get_menwo1($gt),
        "get_menwo2" => $a->get_menwo2($gt),
        "get_menwo3" => $a->get_menwo3($gt),
        "get_all_spmenwo" => $a->get_all_spmenwo($gt)];
        $this->ViewClient("require_pro_menwo",$data);
    }
}
?>
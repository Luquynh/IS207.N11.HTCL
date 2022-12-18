<?php
class callMCproOPT extends Controller{
    function __construct(){}
    function show($tenbst){
        $header = $this->ModelClient("get_pictures_to_home");
        $a = $this->ModelClient("get_data_to_pro_OPT");
        $data = [
        "avatar_men" => $header->get_avatar("men"),
        "avatar_women" => $header->get_avatar("women"),
        // "only1pro" => $a->get_table_sanpham("$masp")
        "tenbst" => "$tenbst",
        "gioitinh" => $a->get_gioitinh($tenbst),
        "anhmota" => $a->get_anh_mota($tenbst),
        "mausac" => $a->get_mausac($tenbst),
        "get_all_spOPT" => $a->get_all_spOPT($tenbst)];
        $this->ViewClient("require_pro_OPT",$data);
    }
}
?>
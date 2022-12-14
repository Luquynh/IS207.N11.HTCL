<?php
class callMCprodetails extends Controller{
    var $header;
    function __construct(){
        $this->header=$this->ModelClient("get_pictures_to_home");
    }
    // function show($params){
    //     $a = $this->ModelClient("get_data_to_pro_details");
    //     $this->ViewClient("require_pro_details",["only1pro" => $a->get_table_sanpham($params)]);
    // }
    function show($masp){
        $a = $this->ModelClient("get_data_to_pro_details");
        $data = [
        "avatar_men" => $this->header->get_avatar("men"),
        "avatar_women" => $this->header->get_avatar("women"),
        "only1pro" => $a->get_table_sanpham("$masp")
        ];
        
        $this->ViewClient("require_pro_details",$data);
    }
}
?>
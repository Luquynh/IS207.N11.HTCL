<?php
class callMCprodetails extends Controller{
    function __construct(){}
    // function show($params){
    //     $a = $this->ModelClient("get_data_to_pro_details");
    //     $this->ViewClient("require_pro_details",["only1pro" => $a->get_table_sanpham($params)]);
    // }
    function show($masp){
        $a = $this->ModelClient("get_data_to_pro_details");
        $this->ViewClient("require_pro_details",["only1pro" => $a->get_table_sanpham("$masp")]);
    }
}
?>
<?php
class callMCabout extends Controller{
    function __construct(){}
    function show(){
        $header = $this->ModelClient("get_pictures_to_home");
        $data = [
            "avatar_men" => $header->get_avatar("men"),
            "avatar_women" => $header->get_avatar("women")];
        $this->ViewClient("require_about", $data);
    }
}
?>
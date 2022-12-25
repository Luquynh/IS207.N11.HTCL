<?php
class callMCmainblog extends Controller{
    function __construct(){}
    function show($blog = 0){
        $header = $this->ModelClient("get_pictures_to_home");
        $a = $this->ModelClient("get_data_to_blog");

        $data = [
        "avatar_men" => $header->get_avatar("men"),
        "avatar_women" => $header->get_avatar("women"),
        "get" => $a->get(),
        "getdetails" => $a->getdetails($blog)
        ];
        if ($blog == 0) {
            $this->ViewClient("require_main_blog",$data);
        } else {
            $this->ViewClient("require_details_blog",$data);
        }
    }
}
?>
<?php
class home extends Controller{
   var $categorymodel;
    function __construct()
        {
            // $this->commonmodel = $this->ModelCommon("commonmodel");
            // $this->categorymodel = $this->ModelClient("homemodel");
            // $this->slider = $this->ModelClient("slidermodel");
            // $this->checkoutmodel = $this->ModelClient("checkoutmodel");
        }
    function show(){
        // $this->ViewClient("masterlayout",[]);
        $a = $this->ModelClient("get_pictures_to_home");
        $this->ViewClient("masterlayout",
            ["best_men" => $a->get_best_seller("men"),
            "best_women" => $a->get_best_seller("women"),
            "avatar_men" => $a->get_avatar("men"),
            "avatar_women" => $a->get_avatar("women"),
            ]);
    }
    function error404(){
        $data = [];
        $this->ViewAdmin("error404",$data);
    }

}
?>
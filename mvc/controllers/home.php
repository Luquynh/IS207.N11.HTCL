<?php
class home extends Controller{
   var $categorymodel;
   var $slider;
   var $informodel;
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
        $slider=$this->ModelClient("Cslidermodel");
        $total = 0;
        if(isset($_SESSION["cart"])){
            foreach($_SESSION["cart"] as $key=>$values){
                $total+=$values["total"];
            }
        }
        $this->ViewClient("masterlayout",
            ["best_men" => $a->get_best_seller("men"),
            "best_women" => $a->get_best_seller("women"),
            "avatar_men" => $a->get_avatar("men"),
            "avatar_women" => $a->get_avatar("women"),
            "banner"=>$slider->GetData(),
            "total"=>$total
            // "banner_img"=>$slider->GetData("banner_img"),
            // "pretitle"=>$slider->GetData("pretitle"),
            // "title"=>$slider->GetData("title"),
            // "subtitle"=>$slider->GetData("subtitle"),
            ]);
    }
    function error404(){
        $data = [];
        $this->ViewAdmin("error404",$data);
    }

}
?>
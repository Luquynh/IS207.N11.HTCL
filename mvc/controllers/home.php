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
        $this->ViewClient("masterlayout",[]);
    }
    function error404(){
        $data = [];
        $this->ViewAdmin("error404",$data);
    }

}
?>
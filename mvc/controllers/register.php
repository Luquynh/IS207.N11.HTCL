<?php
class register extends Controller{
   var $registermodel;
    function __construct()
        {
            $this->commonmodel = $this->ModelCommon("commonmodel");
            // $this->categorymodel = $this->ModelClient("homemodel");
            // $this->slider = $this->ModelClient("slidermodel");
            // $this->checkoutmodel = $this->ModelClient("checkoutmodel");
        }
    function register(){
        $this->ViewClient("register",[]);
    }
    
}
?>
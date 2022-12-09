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
    function show(){
        $mess = "";
        $data = ["mess"=>$mess];
        $this->ViewClient("register",$data);
        
    }
    function register(){
        // $this->ViewClient("register",[]);
        $mess = "";
        if(!isset($_SESSION["info"])){
            if(isset($_POST["sigin"])){
                $post = $_POST["data"];
                if($post["pass"] == $post["pass_confirm"]){
                    $checkuser = $this->commonmodel->checkemail($post["email"]);
                    if($checkuser < 1){
                        // $address = $post["address"].', '. $post["ward"].', '.$post["district"].', '.$post["city"];
                        // echo $post["ward"];
                        $user = $this->commonmodel->sigin($post["email"],md5($post["pass"]),$post["name"],$post["city"] ,$post["phonenumber"], $post["gender"]);
                        if($user){
                            NotifiSiginSuccess();
                        }
                    }
                    else{
                        $mess = "<p style='color: red; '>Email này đã có người khác sử dụng</p>";
                    }
                }else{
                    $mess = "<p style='color: red;'>Xác nhận mật khẩu không khớp</p>";
                }
            }
            $data = ["mess"=>$mess];
            $this->ViewClient("register",$data);
        }else header("location:".base);
    }
    // function show(){
    //     $this->ViewClient("masterlayout",[]);
    // }
    


    
}
?>
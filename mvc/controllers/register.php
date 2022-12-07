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
        if(!isset($_SESSION["info"])){
            $mess = "";
            if(isset($_POST["register"])){
                $post = $_POST["data"];
                if($post["pass"] == $post["pass_confirm"]){
                    $checkuser = $this->commonmodel->checkemail($post["email"]);
                    if($checkuser < 1){
                        $user = $this->commonmodel->sigin($post["email"],md5($post["pass"]),$post["name"],$post["address"],$post["phonenumber"]);
                        if($user){
                            NotifiSiginSuccess();
                        }
                    }else{
                        $mess = "<p style='color: red;'>Email này đã có người khác sử dụng</p>";
                    }
                }else{
                    $mess = "<p style='color: red;'>Xác nhận mật khẩu không khớp</p>";
                }
            }
            $data = ["mess"=>$mess];
            $this->ViewClient("register",$data);
        }else header("location:".base."home/index");
    }

    


    
}
?>
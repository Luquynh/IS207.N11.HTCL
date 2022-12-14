<?php
class register extends Controller{
    var $registermodel;
    var $header;
    function __construct()
        {
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->header=$this->ModelClient("get_pictures_to_home");
            // $this->categorymodel = $this->ModelClient("homemodel");
            // $this->slider = $this->ModelClient("slidermodel");
            // $this->checkoutmodel = $this->ModelClient("checkoutmodel");
        }
    function show(){
        $mess = "";
        $data = ["mess"=>$mess,
        "avatar_men" => $this->header->get_avatar("men"),
        "avatar_women" => $this->header->get_avatar("women"),
    ];
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
                        $user = $this->commonmodel->sigin($post["email"],md5($post["pass"]),$post["name"],$post["address"],$post["ward"],$post["district"],$post["city"] ,$post["phonenumber"], $post["gender"]);
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
            $data = ["mess"=>$mess,
            "avatar_men" => $this->header->get_avatar("men"),
            "avatar_women" => $this->header->get_avatar("women"),
        ];
            $this->ViewClient("register",$data);
        }else header("location:".base);
    }
    // function show(){
    //     $this->ViewClient("masterlayout",[]);
    // }
    


    
}
?>
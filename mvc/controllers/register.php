<?php
class register extends Controller{
    var $registermodel;
    var $header;
    var $full_address;
    var $informodel;

    function __construct()
        {
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->header=$this->ModelClient("get_pictures_to_home");
            $this->full_address = $this->ModelClient("addressmodel");
            $this->informodel = $this->ModelClient("informodel");
            // $this->categorymodel = $this->ModelClient("homemodel");
            // $this->slider = $this->ModelClient("slidermodel");
            // $this->checkoutmodel = $this->ModelClient("checkoutmodel");
        }
    function show(){
        $mess = "";
        $listCity = $this->full_address->city_all();
        $data = ["mess"=>$mess,
        "avatar_men" => $this->header->get_avatar("men"),
        "avatar_women" => $this->header->get_avatar("women"),
        "list_city" => $listCity
    ];
        $this->ViewClient("register",$data);
        
    }
    // function showDistrict(){
    //     $id_city = $_POST['id_city'];
    //     $list_district = $this->full_address->showDistrict($id_city);
    //     $num = $list_district->rowCount();

    // }

    function register(){
        // $this->ViewClient("register",[]);
        $mess = "";
        $listCity = $this->full_address->city_all();

        if(!isset($_SESSION["info"])){
            if(isset($_POST["sigin"])){
                $post = $_POST["data"];
                
                if($post["pass"] == $post["pass_confirm"]){
                    $checkuser = $this->commonmodel->checkemail($post["email"]);
                   
                    //lấy thông tin địa chỉ của người dùng 
                    $nameCity = $this->informodel->getNameCity($post["city"]);
                    $nameDistrict = $this->informodel->getNameDistrict($post["district"]);
                    $nameWard = $this->informodel->getNameWard($post["ward"]);
                    $diachi_dd =$post["address"].", ".$nameWard[0]['name'].", ".$nameDistrict[0]['name'].", ".$nameCity[0]['name']."";
                    if($checkuser < 1){
                        $user = $this->commonmodel->sigin($post["email"],md5($post["pass"]),$post["name"],$post["address"],$post["ward"],$post["district"],$post["city"] ,$post["phonenumber"], $post["gender"],$diachi_dd);
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
            "list_city" => $listCity
        ];
            $this->ViewClient("register",$data);
        }else header("location:".base);
    }
    // function show(){
    //     $this->ViewClient("masterlayout",[]);
    // }
    


    
}
?>
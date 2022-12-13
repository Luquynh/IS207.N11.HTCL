<?php
class login extends Controller{
    var $commonmodel;
    var $tableAdmin = "admin_account";
    var $accountmodel;
    var $header;
    function __construct()
    {
        $this->commonmodel = $this->ModelCommon("commonmodel");
        $this->accountmodel = $this->ModelAdmin("accountmodel");
        $this->header=$this->ModelClient("get_pictures_to_home");

    }
    function show(){
        $mess="";
        $email = "";
        $pass = "";
                    $data = [
                "mess"=>$mess,
                "email"=>$email,
                "pass"=>$pass,
            "avatar_men" => $this->header->get_avatar("men"),
            "avatar_women" => $this->header->get_avatar("women"),
            ];
            $this->ViewClient("login",$data);
    }
    function login(){
        if(!isset($_SESSION["info"])){
            $mess = "";
            $email = "";
            $pass = "";
            if(isset($_POST["login"])){
                $email = $_POST["email"];
                $pass = $_POST["password"];
                // $check_block_user = $this->accountmodel->CheckBlockUser($email);
                if(1){
                    $check = $this->accountmodel->LoginUser($email,md5($pass));
                    if($check >=1){
                        $name = $this->accountmodel->GetNameUser($email,md5($pass));
                        $_SESSION["info"]["id"]= $name[0]["makh"];
                        $_SESSION["info"]["name"] = $name[0]["tenkh"];
                        $_SESSION["info"]["gender"] = $name[0]["gioitinh"];
                        $_SESSION["info"]["email"] = $name[0]["email"];
                        $_SESSION["info"]["matkhau"] = $name[0]["matkhau"];
                        notification("success","Đăng Nhập Thành Công","","","false","");
                        header('Refresh: 1; URL='.base.'home');
                    }
                    else{
                        notification("error","Đăng Nhập Thất Bại","Thông tin tài khoản hoặc mật khẩu không chính xác","OK","true","#3085d6");
                        header('Refresh: 1; URL='.base.'login');
                    }
                }else{
                    notification("error","Đăng Nhập Thất Bại","Tài khoản của bạn đã bị khóa vui lòng liên hệ quản trị viên để được mở khóa","OK","true","#3085d6");
                    // $mess = "Tài khoản của bạn đã bị khóa vui lòng liên hệ quản trị viên để được mở";
                }
            }
            $data = [
                "mess"=>$mess,
                "email"=>$email,
                "pass"=>$pass,
            "avatar_men" => $this->header->get_avatar("men"),
            "avatar_women" => $this->header->get_avatar("women"),
            ];
            $this->ViewClient("login",$data);
        }else header("location:".base."home");
    }
    }

?>
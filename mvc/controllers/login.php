<?php
class login extends Controller{
    var $commonmodel;
    var $tableAdmin = "admin_account";
    var $accountmodel;
    var $header;
    var $informodel;
    function __construct()
    {
        $this->commonmodel = $this->ModelCommon("commonmodel");
        $this->accountmodel = $this->ModelAdmin("accountmodel");
        $this->header=$this->ModelClient("get_pictures_to_home");
        $this->informodel = $this->ModelClient("informodel");

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
                "avatar_women" => $this->header->get_avatar("women")
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
                $check_block_user = $this->accountmodel->CheckBlockUser($email);
                if($check_block_user < 1){
                    $check = $this->accountmodel->LoginUser($email,md5($pass));
                    if($check >= 1){
                        $name = $this->accountmodel->GetNameUser($email,md5($pass));
                        $_SESSION["info"]["id"]= $name[0]["makh"];
                        $_SESSION["info"]["name"] = $name[0]["tenkh"];
                        $_SESSION["info"]["gender"] = $name[0]["gioitinh"];
                        $_SESSION["info"]["email"] = $name[0]["email"];
                        $_SESSION["info"]["pass"] = $name[0]["matkhau"];
                        $_SESSION["info"]["address"] = $name[0]['diachi'];
                        $_SESSION["info"]["ward"] = $name[0]['xaid'];
                        $_SESSION["info"]["district"] = $name[0]['maqh'];
                        $_SESSION["info"]["city"] = $name[0]['matp'];
                        notification("success","????ng Nh???p Th??nh C??ng","","","false","");
                        header('Refresh: 1; URL='.base.'home');
                    }
                    else{
                        notification("error","????ng Nh???p Th???t B???i","Th??ng tin t??i kho???n ho???c m???t kh???u kh??ng ch??nh x??c","OK","true","#3085d6");
                        // header('Refresh: 1; URL='.base.'login/login');
                    }
                }else{
                    notification("error","????ng Nh???p Th???t B???i","T??i kho???n c???a b???n ???? b??? kh??a vui l??ng li??n h??? qu???n tr??? vi??n ????? ???????c m??? kh??a","OK","true","#3085d6");
                    // $mess = "T??i kho???n c???a b???n ???? b??? kh??a vui l??ng li??n h??? qu???n tr??? vi??n ????? ???????c m???";
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
        }else header("location:".base);
    }

    function resetpassword(){
        $mess = '';
        $email = "";
        if(isset($_POST['resetpass'])){
            $email = $_POST['email'];
            $check = $this->informodel->checkemail($email);
            if ($check >= 1) {
                $mess = "<p style='color: green;'>X??c nh???n email h???p l???</p>";
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                $pass_temp = substr(str_shuffle($permitted_chars), 0, 10);
                $infor_user = $this->informodel->GetInfoUserbyEmail($email);
                $this->informodel->ChangerPassUser($infor_user[0]['makh'], md5($pass_temp));
                $name = $infor_user[0]['tenkh'];
                sendpass($email, $name, $pass_temp);
                NotifiResetpassSuccess();
                // header("location:".base."login");
            } else {
                notification("error","Email kh??ng h???p l??? !!","Vui l??ng ki???m tra email c???a b???n","OK","true","#3085d6");
                $mess = "<p style='color: red;'>X??c nh???n email kh??ng h???p l???</p>";
            }
        }
        $data = [
            "email" => $email,
            "mess"=>$mess,
            "avatar_men" => $this->header->get_avatar("men"),
            "avatar_women" => $this->header->get_avatar("women"),
        ];
        $this->ViewClient("resetpassword",$data);
    }
}

?>
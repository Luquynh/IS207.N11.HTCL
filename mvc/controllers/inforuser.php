<?php 
    class inforuser extends Controller{
        var $informodel;
        var $header;
        var $full_address;
        var $checkoutmodel;
        var $ordermodel;
        var $commonmodel;
        function __construct()
        {
            $this->header = $this->ModelClient("get_pictures_to_home");
            $this->informodel = $this->ModelClient("informodel");
            $this->full_address = $this->ModelClient("addressmodel");
            $this->checkoutmodel = $this->ModelClient("checkoutmodel");
            $this->ordermodel = $this->ModelAdmin("ordermodel");
            $this->commonmodel = $this->ModelCommon('commonmodel');
            if(!isset($_SESSION["info"])){
                $_SESSION["error_login"] = "Vui Lòng đăng nhập";
                header("location:".base."login/login");
            }
        }

        // function show(){
        //     $mess = "";
        //     $data = ["mess"=>$mess,
        //     "avatar_men" => $this->header->get_avatar("men"),
        //     "avatar_women" => $this->header->get_avatar("women")
        //     ];
        //     $this->ViewClient("inforuser",$data);
            
        // }

        function show()
        {
            //lấy thông tin người dùng nhờ có session id
            $id_user = $_SESSION["info"]["id"];
            $info_user = $this->informodel->GetInfoUser($id_user);
            
            $matp = $info_user[0]['matp'];
            $maqh = $info_user[0]['maqh'];
            $xaid = $info_user[0]['xaid'];

            $nameCity = $this->informodel->getNameCity($matp);
            $nameDistrict = $this->informodel->getNameDistrict($maqh);
            $nameWard = $this->informodel->getNameWard($xaid);

            //Lấy kí tự đầu tiên của Name
            $nameUser = $_SESSION['info']['name'];
            $explode_name = explode(' ', $nameUser);
            if (count($explode_name) > 1){
                $first_name = $explode_name[0];
                $last_name = $explode_name[count($explode_name) - 1];
                $avt = $first_name[0].$last_name[0];
            } else $avt = $explode_name[0][0];
            $total = 0;
            if(isset($_SESSION["cart"])){
                foreach($_SESSION["cart"] as $key=>$values){
                    $total+=$values["total"];
                }
            }
            $data = [
                "info" => $info_user,
                "city" => $nameCity,
                "district" => $nameDistrict,
                "ward" => $nameWard,
                // 'avt' => [$first_name[0], $last_name[0]]
                'avt' => $avt,
                "avatar_men" => $this->header->get_avatar("men"),
                "avatar_women" => $this->header->get_avatar("women"),
                'total' => $total
            ];
            $this->ViewClient("inforuser",$data);
        }

        function logout(){
            unset($_SESSION["info"]);
            unset($_SESSION["cart"]);
            header("location:".base);
        }

        function changeinfor()
        {
           
            //lấy thông tin người dùng nhờ có session id
            $id_user = $_SESSION["info"]["id"];
            $info_user = $this->informodel->GetInfoUser($id_user);
            if(isset($_POST["change_infor"])){
                $info = $_POST["data"];
              
                $matp = $info_user[0]['matp'];
                $maqh = $info_user[0]['maqh'];
                $xaid = $info_user[0]['xaid'];
                //tao dia chi day du 
                $nameCity = $this->informodel->getNameCity($matp);
                $nameDistrict = $this->informodel->getNameDistrict($maqh);
                $nameWard = $this->informodel->getNameWard($xaid);
                $diachi_dd =$info["address"].", ".$nameCity[0]["name"].", ".$nameDistrict[0]["name"].", ".$nameWard[0]["name"]."";
               
                // ChangerInfo($id, $name, $email, $address, $xaid, $maqh, $matp, $phone, $gender)
                $this->informodel->ChangerInfo($id_user, $info["name"], $info["email"], $info["address"], $info["ward"], $info["district"], $info["city"], $info["phonenumber"], $info["gender"],$diachi_dd);
                notifichanger("Thay đổi thông tin thành công");
                
                $_SESSION["info"]["name"] = $info["name"];
                header("Refresh: 1.2; URL=".base."inforuser");
            }
            
            //Lấy name của quận, huyện. phường, xã
            
            $matp = $info_user[0]['matp'];
            $maqh = $info_user[0]['maqh'];
            $xaid = $info_user[0]['xaid'];

            $nameCity = $this->informodel->getNameCity($matp);
            $nameDistrict = $this->informodel->getNameDistrict($maqh);
            $nameWard = $this->informodel->getNameWard($xaid);

            //Lấy kí tự đầu tiên của Name
            $nameUser = $_SESSION['info']['name'];
            $explode_name = explode(' ', $nameUser);
            if (count($explode_name) > 1){
                $first_name = $explode_name[0];
                $last_name = $explode_name[count($explode_name) - 1];
                $avt = $first_name[0].$last_name[0];
            } else $avt = $explode_name[0][0];

            $data = [
                "info" => $info_user,
                "city" => $nameCity,
                "district" => $nameDistrict,
                "ward" => $nameWard,
                'mess' => '',
                'avt' => $avt,
                "avatar_men" => $this->header->get_avatar("men"),
                "avatar_women" => $this->header->get_avatar("women")
            ];
            $this->ViewClient("changeinfor",$data);
        }

        function changepassword(){
            //lấy thông tin người dùng nhờ có session id
            $id_user = $_SESSION["info"]["id"];
            $info_user = $this->informodel->GetInfoUser($id_user);
            $mess = '';
            if(isset($_POST["change_password"])){
                $info = $_POST["data"];
                if(md5($info["pass_old"]) == $info_user[0]["matkhau"] ){
                    if($info["pass_confirm"] == $info["pass_new"]){
                        $this->informodel->ChangerPassUser($id_user, md5($info["pass_new"]));
                        notification("success","Thông Báo","Thay đổi mật khẩu thành công","","false","");
                        header("Refresh: 1.2; URL=".base."inforuser/inforuser");
                    }else NotifiError('Xác nhận mật khẩu không khớp','inforuser/changepassword');
                    // $mess = "<p style='color: red; '>Xác nhận mật khẩu không khớp</p>";
                }else NotifiError('Mật khẩu cũ không đúng', 'inforuser/changepassword');
                // $mess =  "<p style='color: red; '>Mật khẩu cũ không đúng</p>";die;
                
            }

            //Lấy name của quận, huyện. phường, xã
            $matp = $_SESSION["info"]['city'];
            $maqh = $_SESSION["info"]['district'];
            $xaid = $_SESSION["info"]['ward'];

            $nameCity = $this->informodel->getNameCity($matp);
            $nameDistrict = $this->informodel->getNameDistrict($maqh);
            $nameWard = $this->informodel->getNameWard($xaid);

            //Lấy kí tự đầu tiên của Name
            $nameUser = $_SESSION['info']['name'];
            $explode_name = explode(' ', $nameUser);
            if (count($explode_name) > 1){
                $first_name = $explode_name[0];
                $last_name = $explode_name[count($explode_name) - 1];
                $avt = $first_name[0].$last_name[0];
            } else $avt = $explode_name[0][0];

            $data = [
                "mess" => $mess,
                "info" => $info_user,
                "city" => $nameCity,
                "district" => $nameDistrict,
                "ward" => $nameWard,
                'avt' => $avt,
                "avatar_men" => $this->header->get_avatar("men"),
                "avatar_women" => $this->header->get_avatar("women")
            ];
            $this->ViewClient("changepassword",$data);
        }

        function history()
        {
            if(isset($_SESSION["info"])){
                if(isset($_POST["confirm"])){
                    $id = $_POST["id"];
                    $id = (int) $id;
                    $this->checkoutmodel->Confirm($id);
                    
                }
                if(isset($_POST["cancel"])){
                    $id = $_POST["id"];
                    $id = (int) $id;
                    $Allorder = $this->ordermodel->GetOrderDetails($id);
                    foreach($Allorder as $row):
                        $quantity = $this->checkoutmodel->GetQuantityById($row['masp']);
                        $quantity_new = $quantity[0]['soluong'] + $row['soluong'];
                        $this->checkoutmodel->UpdateQuantityById($row['masp'], $quantity_new);
                    endforeach;
                    $this->checkoutmodel->CancelOrder($id);
                }
                // if(isset($_POST["delete"])){
                //     $id = $_POST["id"];
                //     $this->checkoutmodel->DeleteOrder($id);
                // }
                // if(isset($_POST["details"])){
                    
                // }

                //Lấy id của người dùng
                $id_user = $_SESSION["info"]["id"];
                //lấy thông tin người dùng nhờ có session id
                $info_user = $this->informodel->GetInfoUser($id_user);
                
                
                //Lấy kí tự đầu tiên của Name
                $nameUser = $_SESSION['info']['name'];
                $explode_name = explode(' ', $nameUser);
                if (count($explode_name) > 1){
                    $first_name = $explode_name[0];
                    $last_name = $explode_name[count($explode_name) - 1];
                    $avt = $first_name[0].$last_name[0];
                } else $avt = $explode_name[0][0];
                //Tính  tổng tiền
                $total = 0;
                if(isset($_SESSION["cart"])){
                    foreach($_SESSION["cart"] as $key=>$values){
                        $total+=$values["total"];
                    }
                }

                //lấy id khách hàng sau đó lấy ra nhưng đơn hàng của khách hàng đó
                $order = $this->checkoutmodel->GetHistotyOrder($id_user);
                
                $data = [
                    "order"=>$order,
                    "info" => $info_user,
                    'avt' => $avt,
                    "avatar_men" => $this->header->get_avatar("men"),
                    "avatar_women" => $this->header->get_avatar("women"),
                    'total' => $total
                ];
                $this->ViewClient("history",$data);
            }else{
                $_SESSION["error_login"] = "Vui Lòng đăng nhập";
                header("location:".base."login/login");
            }
            
        }
    }
?>
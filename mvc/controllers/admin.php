<?php
    class admin extends Controller{
        var $categorymodel;
        var $accadminmodel;
        var $commonmodel;
        var $productmodel;
        var $slider;
        var $ordermodel;
        var $table = "admin";
        var $homemodel;
        var $accountmodel;
        var $informodel;
        var $full_address;
        var $thongkemodel;
        function __construct()
        {
            $this->accountmodel = $this->ModelAdmin("accountmodel");
            $this->homemodel  = $this->ModelAdmin("homemodel");
            $this->categorymodel = $this->ModelAdmin("categorymodel");
            $this->accadminmodel = $this->ModelAdmin("accountmodel");
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->productmodel = $this->ModelAdmin("productmodel");
            $this->slider = $this->ModelAdmin("slidermodel");
            $this->ordermodel=$this->ModelAdmin("ordermodel");
            $this->informodel = $this->ModelClient("informodel");
            $this->full_address = $this->ModelClient("addressmodel");
            $this->thongkemodel=$this->ModelAdmin("thongkemodel");
            //check người dùng đã đăng nhập hay chưa hoặc đã đăng nhập trước đó mà chưa đăng xuất
            
            
        }
        function show(){
            // if(isset($_SESSION["thongtin"])){
            //     unset($_SESSION["thongtin"]);
            // }
        $mess="";
        $email = "";
        $pass = "";
                    $data = [
                "mess"=>$mess,
                "email"=>$email,
                "pass"=>$pass
            ];
            $this->ViewAdmin("login",$data);
        }
        function logout(){
            if(isset($_SESSION["thongtin"])){
                unset($_SESSION["thongtin"]);
            }
            $mess="";
            $email = "";
            $pass = "";
                        $data = [
                    "mess"=>$mess,
                    "email"=>$email,
                    "pass"=>$pass
                ];
                $this->ViewAdmin("login",$data);
        }
        function login(){
            
            if(!isset($_SESSION["thongtin"])){
                $mess = "";
                $email = "";
                $pass = "";
                if(isset($_POST["login"])){
                    $email = $_POST["email"];
                    $pass = $_POST["password"];
                    // $check_block_user = $this->accountmodel->CheckBlockUser($email);
                    if(1){
                        $check = $this->accountmodel->Loginadmin($email,md5($pass));
                        if($check >=1){
                            // $_SESSION["thongtin"]["tt_xoa"] = $check[0]['tt_xoa'];
                            $name = $this->accountmodel->GetNameAdmin($email,md5($pass));
                            $_SESSION["thongtin"]["id"]= $name[0]["maadmin"];
                            notification("success","Đăng Nhập Thành Công","","","false","");
                            header('Refresh: 1; URL='.base.'admin/home');
                        }
                        else{
                           
                            notification("error","Đăng Nhập Thất Bại","Thông tin tài khoản hoặc mật khẩu không chính xác","OK","true","#3085d6");
                            header('Refresh: 1; URL='.base.'admin');
                        }
                    }else{
                        notification("error","Đăng Nhập Thất Bại","Tài khoản của bạn đã bị khóa vui lòng liên hệ quản trị viên để được mở khóa","OK","true","#3085d6");
                        // $mess = "Tài khoản của bạn đã bị khóa vui lòng liên hệ quản trị viên để được mở";
                    }
                }
                // $data = [
                //     "mess"=>$mess,
                //     "email"=>$email,
                //     "pass"=>$pass
                
                // ];
                // $this->ViewClient("login",$data);
            }else header("location:".base."admin");
        }

        //Lỗi đường dẫn 404
        

        //Trang home admin
        function home(){
           if(1){
            //lấy ra số lượng tất cả các đơn hàng
           $countallorder = $this->homemodel->CountAllOrder();
           //lấy ra tổng doanh thu của web
           $totalmony = $this->homemodel->CountAllMony();
           //lấy ra tổng các đơn hàng đã giao thành công
           $ordersuccess = $this->homemodel->CountOrderSuccess();
           //lấy ra tổng số lượng thành viên
           $totaluser = $this->homemodel->CountUser();
           //lấy ra thông tin các đơn hàng chưa xử lí
           $ordernew = $this->homemodel->Orderprocess();
           $data = [
               "folder"=>"home",
               "file"  =>"homeadmin",
               "totalorder"=>$countallorder[0]["tong"],
               "totalmony"=>$totalmony[0]["tong"],
               "ordersuccess"=>$ordersuccess[0]["tong"],
               "ordernew"=>$ordernew,
               "totaluser"=>$totaluser[0]["tong"]
           ];
          
            $this->ViewAdmin("masterlayout",$data);
           }
           else{
            header('Refresh: 1; URL='.base.'admin');
           }
        }

        //quản lí danh mục sản phẩm
        function showcategory(){
            $limit = 3;
            //lấy số trang
            if(isset($_GET['page'])){
                $currentpage =  $_GET['page'];
            }else $currentpage = 1;
            // hiển thị sản phẩm tương ứng số trang
            $offset = ($currentpage - 1)*$limit;
            $totalcategory = $this->commonmodel->GetNumber("bosuutap");
            $totalpage = ceil($totalcategory / $limit);
            $mess = "";
            $temp = $this->commonmodel->GetCategorysize($limit,$offset);
            $result = json_decode($temp,true);
            if( isset($_SESSION["DeleteCategory"]) ){
                $mess  = $_SESSION["DeleteCategory"];
                unset($_SESSION["DeleteCategory"]);
            }
            $data = [
            "folder"     =>"category",
            "file"       =>"showcategory",
            "title"      =>"Danh Sách Bộ sưu tập",
            "data"       =>$result,
            "mess"       =>$mess,
            "total"  =>$totalpage,
            "currentpage"=>$currentpage
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        //Xóa danh mục sản phẩm 
        function deletecategory($id,$page,$stt){
            
            $totalcategory = $this->categorymodel->GetNumbersp($id);
            if($totalcategory == 0){
                $this->categorymodel->DeleteCategory($id);
                $this->productmodel->UpdateProduct($id);
                
                    if($stt % 3 == 1){
                        $page-=1;
                    }
                    $_SESSION["DeleteCategory"] = "Xóa Danh Mục Thành Công!";
                    // notifichanger("Xóa Danh Mục Thành Công!");
                    header("location:".base."admin/showcategory&page=".$page."");
                
            }
            else{
                $_SESSION["DeleteCategory"] = "Xóa Danh Mục không Thành Công! Do số lượng sản phẩm trong bộ sưu tập đang lớn hơn 0";
                // notifichanger("Xóa Danh Mục không Thành Công!");

                    header("location:".base."admin/showcategory&page=".$page."");
            }
           
            
        }

        //Thêm Danh Mục Sản Phẩm 
        function addcategory(){
            $mess = "";
            $datakt=$this->categorymodel->getkichthuoc();
            if(isset($_POST["submit"])){
                $info= $_POST["data"];
                if ($_FILES['img']['size'] == 0 || $_FILES['imgmain']['size']==0){  
                    {
                        if($_FILES['img']['size'] == 0){
                            $mess="Vui long nhap hinh anh";
                        }
                        if($_FILES['imgmain']['size'] == 0){
                            $mess="Vui long nhap hinh anh";
                        }
                    }          
            
                }
                else{
                    $imgmain=$_FILES['imgmain']['name'];
                    $img=$_FILES['img']['name'];
                    $this->categorymodel->AddCategory($info['name'],$info['gioitinh'],$info['makichthuoc'],$info['mota'],$img,$imgmain);
               notifichanger("Them thanh cong");
                }
              
                

            }
            $data = [
                "folder"=>"category",
                "file"  =>"addcategory",
                "title" =>"Thêm Mới Danh Mục Sản Phẩm",
                "datakt"=>$datakt,
                "mess"  =>$mess
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        //Thay đổi trạng thái hiển thị danh mục sản phẩm
        function statuscategory(){
            $id = $_GET['id'];
            $status = $_GET['status'];
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else $page =1;
            $this->categorymodel->StatusCategory($id,$status);
            header("location:".base."admin/showcategory&page=".$page."");
        }
        
        //Chỉnh sửa danh mục sản phẩm
        function editcategory(){
            $id = $_GET['id'];
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else{
                $page = 1;
            }
            // $img="";
            // $imgmain="";
            $info_category= $this->categorymodel->GetDatacategory($id,"mabosuutap");
            $result=$this->commonmodel->GetData($id,"bosuutap","mabosuutap");
            $datakt=$this->categorymodel->getkichthuoc();
            $mess="";
            if(isset($_POST['submit'])){
                $info = $_POST["data"];
                $img1=$_FILES['imgmain']['name'];
                if ($_FILES['img']['size'] == 0 || $_FILES['imgmain']['size']== 0 ){  
                    foreach($result as $row){
                        if($_FILES['img']['size'] == 0){
                            $img=$row["img"];
                        }
                        if($_FILES['imgmain']['size'] == 0){
                            $img1=$row["imgmain"];
                            // echo"ko load dc";
                        }
                    }          
            
                }
                else{
                    $img1=$_FILES['imgmain']['name'];
                    $img=$_FILES['img']['name'];
                    echo"ko load dc";
                }
                // $imgmain=$_POST["imgmain"];
                $this->categorymodel->EditCategory($info["name"],$info["gioitinh"],$id,$info["makichthuoc"],$info["mota"],$img,$img1);
                notifichanger("Thay đổi thông tin thành công");
                header("Refresh: 1; URL=".base."admin/showcategory");
                

            }
            
            $data = [
                "folder"      =>"category",
                "file"        =>"editcategory",
                "title"       =>"Sửa Danh Mục Sản Phẩm",
                "info"        =>$info_category,
                "mess"        =>$mess,
                "page"        =>$page,
                
                "datakt" =>$datakt,
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        function detailcategory(){
            
            $id = $_GET['id'];
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else{
                $page = 1;
            }
            $limit = 3;
            //lấy số trang
            if(isset($_GET['page'])){
                $currentpage =  $_GET['page'];
            }else $currentpage = 1;
            // hiển thị sản phẩm tương ứng số trang
            $offset = ($currentpage - 1)*$limit;
            echo $offset;
            $totalcategory = $this->categorymodel->GetNumbersp($id);
            $totalpage = ceil($totalcategory / $limit);
            $mess = "";
            $temp = $this->categorymodel->GetCategorysize($limit,$offset,$id);
            $result = json_decode($temp,true);
            $info_category= $this->categorymodel->GetDatacategory($id,"mabosuutap");
            $info_sp=$this->categorymodel->getsanpham($id);
            //thong tin cua tung san pham trong bo suu tap 
            // thong tin cua bo suu tap 
            $data = [
                "folder"      =>"category",
                "file"        =>"detailcategory",
                "title"       =>"Chi tiết Bộ Sưu Tập",
                "info"        =>$info_category,
                "info_sp"    =>$result,
                "page"        =>$page,
                "total"  =>$totalpage,
                "currentpage"=>$currentpage,
                
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        //Đổi mật khẩu admin
        function changepass(){
            $id_admin = $_SESSION['thongtin']['id'];
            $info_admin = $this->commonmodel->GetInfoAdmin($id_admin);
                if(isset($_POST["submit"])){
                    $post = $_POST["data"];
                    if(md5($post["pass_old"]) == $info_admin[0]["matkhau"]){
                        if($post["pass_new"]==$post["pass_again"]){
                            $passnew = $post["pass_new"];
                            $this->commonmodel->ChangePasswordAdmin($id_admin, md5($passnew));
                            notification("success","Thành Công!","Mật khẩu đã được thay đổi!","Xác Nhận","true","#3085d6");                        
                        } else{
                            notification("error","Thất Bại","Nhập lại mật khẩu không khớp!","Xác Nhận","true","#3085d6");
                        }
                    } else{
                        notification("error","Thất Bại","Mật khẩu cũ không chính xác!","Xác Nhận","true","#3085d6");
                    }
                }
            $data = ["folder"=>"changepass","file"=>"changepass","titel"=>"Đổi Mật Khẩu"];
            $this->ViewAdmin("masterlayout",$data);
        }

        // Thêm Sản Phẩm Mới
        function addproduct(){
            $data_category = json_decode($this->categorymodel->GetCategory(),true);
            $notifi = [];
            $addsuccess="";
            if(isset($_POST["submit"])){
                $product = $_POST["product"];
                // echo "<pre>";
                // echo $_FILES["img"]["name"];die;
                if($product["id_category"] == "true"){
                    $notifi["category"] = "Vui Lòng Chọn Danh Mục";
                }
                if($product["name"] == ""){
                    $notifi["name"] = "Vui Lòng Nhập Tên Sản Phẩm";
                }
                if($product["price"] == ""){
                    $notifi["price"] = "Vui Lòng Nhập Giá Sản Phẩm";
                }
                if($_FILES["img"]["name"] == ""){
                    $notifi ["img"] = "Vui Lòng Chọn Ảnh Sản Phẩm";
                }
                if($product["quantity"] == ""){
                    $notifi["quantity"] = "Vui Lòng Nhập Số Lượng Sản Phẩm";
                }
                if($product["sale"] == ""){
                    $notifi["sale"] = "Vui Lòng Nhập % Giảm Giá";
                }
                if($product["mausac"] == ""){
                    $notifi["mausac"] = "Vui Lòng Nhập % Giảm Giá";
                }
                if($notifi == null){
                    $img_product = $_FILES["img"]["name"];
                    // $checkUpLoad = UpLoadFiles(urlFileProduct,$_FILES);
                    // if($checkUpLoad != 1){
                    //     $notifi["img"] = $checkUpLoad["exits"];
                    // }
                }
                //lấy tên danh mục sản phẩm mà người quản trị chọn để lưu vào name_category
                
                
                if($notifi == null){
                    $result = $this->productmodel->AddProduct($product["name"],$product["price"],$img_product,$product["quantity"],$product["decs"],$product["id_category"],$product["sale"],$product["mausac"],$product["loaisp"]);
                    if($result == true){
                        notifichanger("Thêm thành công!");
                    }
                };
            }
            $data = [
            "folder" =>"product",
            "file"=>"addproduct",
            "title"=>"Thêm Mới Sản Phẩm",
            "data"=>$data_category,
            "notifi"=>$notifi,
            "addsuccess"=>$addsuccess
            ];
            $this-> ViewAdmin("masterlayout",$data);
        }

        //Quản lí sản phẩm
        function showproduct(){
            //hiện thông báo xóa sản phẩm
            if( isset($_SESSION["DeleteProduct"]) ){
                $mess  = $_SESSION["DeleteProduct"];
                unset($_SESSION["DeleteProduct"]);
            }else{
                $mess = "";
            }
            //lấy số trang
            if(isset($_GET['page'])){
                $currentpage =  $_GET['page'];
            }else $currentpage = 1;
            // hiển thị sản phẩm tương ứng số trang
            $limit = 4;
            $totalproduct = $this->commonmodel->GetNumber("sanpham");
            $totalpage = ceil($totalproduct / $limit);
            $offset = ($currentpage - 1) * $limit;
            $result = json_decode($this->productmodel->GetCategoryPage($limit,$offset,"masp"),true);
            $totalpage = ceil($totalproduct / $limit);
            $data = [
                "folder"      =>"product",
                "file"        =>"showproduct",
                "title"       =>"Danh Sách Sản Phẩm",
                "data"        =>$result,
                "total"       =>$totalpage,
                "currentpage" =>$currentpage,
                "mess"        =>$mess
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        //Xóa sản phẩm
        function deleteproduct($id,$page,$stt){
            $result = $this->productmodel->DeleteProduct($id);
            
            if($result){
                $_SESSION["DeleteProduct"] = "Xóa Sản Phẩm Thành Công!";
                header("location:".base."admin/showproduct");
            }
        }
        //Chỉnh sửa thông tin sản phẩm
        function editproduct(){
            //lấy trang của id cần sửa
            if(isset( $_GET["page"])){
                $page = $_GET["page"];
            }else $page =1;
            //lấy id cần sửa
            $id = $_GET['id'];
            //lấy sản phẩm cần sửa
            $product = $this->commonmodel->GetProductById($id);
            $name_category = $this->productmodel->GetbosuutapById($id);
            // lấy danh sách danh mục sản phẩm
            $category = json_decode($this->categorymodel->GetCategory(),true);
            $notifi = [];
            if(isset($_POST["submit"])){
                $editproduct = $_POST["product"];
                if($_FILES["img"]["name"] == ""){
                    $notifi ["img"] = "Vui Lòng Chọn Ảnh Sản Phẩm";
                }else{
                    $img_product = $_FILES["img"]["name"];
                    // $checkUpLoad = $this->commonmodel->UpLoadFiles(urlFileProduct,$_FILES);
                    // if($checkUpLoad != 1){
                    //     $notifi["img"] = $checkUpLoad["exits"];
                    // }
                }
                // kiểm tra lỗi
                if($notifi == null){
                    
                    // $name_category = json_decode($temp,true);
                    $result = $this->productmodel->UpdateProductById($id,$editproduct["tensp"],$editproduct["gia"],$img_product,$editproduct["soluong"],$editproduct["mota"],$editproduct["mabosuutap"]);
                    if($result != null){
                        notification("success","Sửa Sản Phẩm Thành Công","","","false","");
                        header('Refresh: 1; URL='.base.'admin/showproduct');
                    }
                }
            }

            $data = [
                "folder"=>"product",
                "file"  =>"editproduct",
                "title" =>"Sửa Sản Phẩm",
                "product"=>$product,
                "tenbosuutap"=>$name_category,
                "category"=>$category,
                "notifi"=>$notifi,
                "page"  =>$page
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        //Hiển thị slider
        function showslider(){
            if(isset($_SESSION["DeleteSlider"])){
                $mess = $_SESSION["DeleteSlider"];
                unset($_SESSION["DeleteSlider"]);
            }else $mess="";
            $sliders = $this->slider->ShowSlider();
            $data = [
                "folder"=>"slider",
                "file"  =>"showslider",
                "title" =>"Quản Lí Slider",
                "mess"  =>$mess,
                "slider"=>$sliders
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        
        //Thêm mới slider
        function addslider(){
            $mess = "";
            if( isset($_POST['submit']) ){
                $slider = $_POST["slider"];
                $result = $this->slider->AddSlider($slider["pretitle"],$slider["title1"],$slider["subtitle"],$slider["img"]);
                if($result != null){
                    $mess = "Thêm Slider Thành Công!";
                }else $mess = "Thêm Slider Thất Bại!";
            }
            $data = [
                "folder"=>"slider",
                "file"  =>"addslider",
                "title" =>"Thêm Mới Slider",
                "mess"  =>$mess
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        
        //Xóa slider
        function deleteslider($id){
            $result = $this->slider->DeleteSlider($id);
            if($result){
                $_SESSION["DeleteSlider"] = "Xóa Slider Thành Công!";
                header("location:".base."admin/showslider");
            }
        }
        
        //Trạng thái slider
        function statusslider(){
            $id = $_GET['id'];
            $status = $_GET['status'];
            $this->slider->statusslider($id,$status);
            header("location:".base."admin/showslider");
        }
        function editslider(){
            $id = $_GET['id'];
            $img_dp="";
            $result1= $this->commonmodel->GetDataslider($id,"slider");
            $mess="";
            if(isset($_POST['submit'])){          
                $name = $_POST['name'];
                $content = $_POST['content'];
                $slogan=$_POST['slogan'];
                if ($_FILES['img']['size'] == 0 ){  
                    foreach($result1 as $row){
                        $img=$row["banner_img"];
                    }          
            
                }
                else{
                    $img=$_FILES['img']['name'];
                    
                }
           
                $this->slider->Editslider($id,$name,$slogan,$content,$img);
                notifichanger("Thay đổi thông tin thành công");
            }
            $result = $this->commonmodel->GetDataslider($id,"slider");
            $data = [
                "folder"      =>"slider",
                "file"        =>"editslider",
                "title"       =>"Sửa thông tin slider",
                "data"        =>$result,
                "mess"        =>$mess,
                "img_dp"      =>$img_dp,
                
                
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        // Spam mail quãng cáo với nội dung của slider
        function spamquangcao(){
            $id = $_GET['id'];
            $result = $this->commonmodel->GetDataslider($id,"slider");
            $mess="";         
                $tieude = $result[0]['pretitle'];
                $content = '<h2>'.$result[0]['title'];
                $content .= '<br>'.$result[0]['subtitle'].'</h2>';
                $img = $result[0]['banner_img'];
                $content .= '<img src="cid:'.$img.'"  alt="" style="width: 100%;">';
                $email_list = $this->accountmodel->GetEmailAllUser();
                foreach ($email_list as $key => $row){
                    sendmailspam($row['email'],$tieude,$content,$img);
                };
                // $this->slider->Editslider($id,$name,$slogan,$content,$img);
                // header("location:".base."admin/showslider");
                // notifichanger("Gửi quãng cáo thành công");
                NotifiOrder("Đã gửi quảng cáo cho toàn bộ khách hàng","admin/showslider");
            
        }
        //Quản lí tài khoản người dùng
        function useraccount(){
            $gioitinh="";
            //lấy số trang mà người dùng chọn
            if(!isset($_GET['page']) || $_GET['page'] < 1){
                $currentpage = 1;
            }else $currentpage =  $_GET['page'];
            $limit = 6;
            $offset = ($currentpage-1)*$limit;
            $listaccount = $this->accadminmodel->GetAllUser($limit,$offset);
            $numberaccount = $this->accadminmodel->GetNumberUser();
         
            $totalpage = ceil($numberaccount/$limit);
            $data = [
                "folder"=>"useraccount",
                "file"  =>"useraccount",
                "title" =>"Quản Lí Tài Khoản Người Dùng",
                "listaccount"=>$listaccount,
                "currentpage"=>$currentpage,
                "totalpage"=>$totalpage,
                "gioitinh"=>$gioitinh,
                
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        function editaccount(){
            $id = $_GET['id'];
           
            $info_user= $this->commonmodel->GetData($id,"khachhang","makh");
            $mess="";
            $matp = $info_user[0]['matp'];
            $maqh = $info_user[0]['maqh'];
            $xaid = $info_user[0]['xaid'];
            //tao dia chi day du 
            $nameCity = $this->informodel->getNameCity($matp);
            $nameDistrict = $this->informodel->getNameDistrict($maqh);
            $nameWard = $this->informodel->getNameWard($xaid);
            if(isset($_POST['submit'])){          
                $info = $_POST["data"];

                $matp = $info_user[0]['matp'];
                $maqh = $info_user[0]['maqh'];
                $xaid = $info_user[0]['xaid'];
                //tao dia chi day du 
                $nameCity1 = $this->informodel->getNameCity($matp);
                $nameDistrict1 = $this->informodel->getNameDistrict($maqh);
                $nameWard1 = $this->informodel->getNameWard($xaid);
                $diachi_dd =$info["address"].", ".$nameWard1[0]["name"].", ".$nameDistrict1[0]["name"].", ".$nameCity1[0]["name"]."";
               
                
                $this->informodel->ChangerInfo($id, $info["name"], $info["email"], $info["address"], $info["ward"], $info["district"], $info["city"], $info["phonenumber"], $info["gender"],$diachi_dd);
                notifichanger("Thay đổi thông tin thành công");
                header("Refresh: 1; URL=".base."admin/useraccount");
               

            }
           
            $data = [
                "folder"      =>"useraccount",
                "file"        =>"editaccount",
                "city" => $nameCity,
                "district" => $nameDistrict,
                "ward" => $nameWard,
                "title"       =>"Sửa thông tin khách hàng",
                "info"        =>$info_user,
                "mess"        =>$mess,
               
                
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        
        //Xử Lý mở hoặc khóa tài khoản người dùng
        function statusaccountuser(){
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else $page = 1;
            $id = $_GET['id'];
            $status = $_GET['status'];
            $this->accadminmodel->StatusAccountUser($id,$status);
            header("location:".base."admin/useraccount&page=".$page."");
        }

        //Quản lí đơn hàng
        function order(){
            //lấy số trang mà người dùng chọn
            if(!isset($_GET['page']) || $_GET['page'] < 1){
                $currentpage = 1;
            }else $currentpage =  $_GET['page'];
            //lấy ra số lượng sản phẩm để phân trang
            $numberorder = $this->ordermodel->GetNumberOrder();
            $limit =  6;
            $totalpage = ceil($numberorder / 6);
            $offset = ($currentpage - 1) * 6;
            //lấy ra sản phẩm theo số trang mà người dùng chọn
            $listorder = $this->ordermodel->GetAllOrder($limit,$offset);
            $data = [
                "folder"=>"order",
                "file"  =>"order",
                "title" =>"Quản Lí Đơn Hàng",
                "listorder"=>$listorder,
                "currentpage"=>$currentpage,
                "totalpage"=>$totalpage
            ];
            $this->ViewAdmin("masterlayout",$data);
        }


      
        //Chi tiết đơn hàng
        function orderdetails(){
            $mess ="";
            $id_user = $_GET["id_user"];
            $id_order = $_GET["id_order"];
            // $gioitinh="";
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else{
                $page = 1;
            }
            //lấy thông tin trạng thái đơn hàng
            $info_order = $this->ordermodel->GetorderByIdadmin($id_order);
            //lấy thông tin chi tiết đơn hàng
            $order_details = $this->ordermodel->GetOrderDetailsadmin($id_order);
            // lấy thông tin người dùng
            $info_user = $this->ordermodel->GetInfoUserById($id_user); 
            //get data from trangthaidonhang
            $info_tt=$this->ordermodel->Getallstatus();
            //xử lý khi người dùng bấm nút thanh toán
            if(isset($_POST["update"])){
                //hàm xử lý trang thai don hang
                $matt=$_POST['matt'];
                $this->ordermodel->updatestatus($id_order,$matt);
                // sendmail();
                sendmailstatus($info_user[0]["email"], $matt, $id_order);
                if($matt==4){
                    $this->ordermodel->updatengaygiao($id_order);
                    $year=$this->ordermodel->GetyearOrder($id_order);
                    $month=$this->ordermodel->GetMonthOrder($id_order);
                    $profit_now=$this->thongkemodel->getdoanhthu($month[0]["month"],$year[0]["year"]);
                    if($profit_now == null){
                        $doanhthuthang=0;
                        $profit=$info_order[0]["tonggiatri"]+$doanhthuthang;
                        $this->thongkemodel->addthongke($year[0]["year"],$month[0]["month"],$profit);
                    }
                    else{
                        $doanhthuthang=$profit_now[0]["profit"];
                        
                        $profit=$info_order[0]["tonggiatri"]+$doanhthuthang;
                        $this->thongkemodel->Updatedoanhthu($year[0]["year"],$month[0]["month"],$profit);
                    }
                    
                    
                    
                }
                notification("success","Thành Công","Đơn hàng đã được xử lý","","false","#3085d6");
                header('Refresh: 1; URL='.base.'admin/order');
            }
            $data = [
                "folder"=>"order",
                "file"  =>"orderdetails",
                "title" =>"Quản Lí Đơn Hàng",
                "mess"  =>$mess,
                "infouser"=>$info_user,
                "orderdetails"=>$order_details,
                "id" => $id_order,
                "page"=>$page,
                "info_order"=>$info_order,
                "info_tt"=>$info_tt
                
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        //Chinh sua thong tin order 
        function editorder(){
            $id_user = $_GET["id_user"];
            $id_order = $_GET["id_order"];
            // $gioitinh="";
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else{
                $page = 1;
            }
            
          //lấy thông tin trạng thái đơn hàng
            $info_order = $this->ordermodel->GetorderByIdadmin($id_order);
            //lấy thông tin chi tiết đơn hàng
            $order_details = $this->ordermodel->GetOrderDetailsadmin($id_order);
            // lấy thông tin người dùng
            $info_user = $this->ordermodel->GetInfoUserById($id_user); 
            //lấy thông tin trạng thái đơn hàng
            $info_order = $this->ordermodel->GetorderByIdadmin($id_order);
            //lấy thông tin chi tiết đơn hàng
            $order_details = $this->ordermodel->GetOrderDetailsadmin($id_order);
            // lấy thông tin người dùng
            $info_user = $this->ordermodel->GetInfoUserById($id_user); 
            //get data from trangthaidonhang
            $info_tt=$this->ordermodel->Getallstatus();
            //xử lý khi người dùng bấm nút thanh toán
            if(isset($_POST["submit"])){
                //hàm xử lý trang thai don hang
                $sodt=$_POST['sodt'];
                $diachi=$_POST['diachi'];
                $this->ordermodel->updateorder($id_order,$sodt,$diachi);
                // sendmail();
                
                notification("success","Thành Công","Thông tin đơn hàng đã được sửa","","false","#3085d6");
                header('Refresh: 1; URL='.base.'admin/orderdetails&id_order='.$id_order.'&id_user='.$id_user);
            }
            $data = [
                "folder"=>"order",
                "file"  =>"editorder",
                "title" =>"Sửa Thông Tin Đơn Hàng",
                
                "infouser"=>$info_user,
                "orderdetails"=>$order_details,
                "id" => $id_order,
                "page"=>$page,
                "info_order"=>$info_order,
                "info_tt"=>$info_tt
                
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        function thongke(){
            
            $data = [
                "folder"=>"thongke",
                "file"  =>"thongke",
                 ];
            $this->ViewAdmin("masterlayout",$data);
        }
    }
?>
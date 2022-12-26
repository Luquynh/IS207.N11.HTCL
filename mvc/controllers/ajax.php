<!-- <?php

use function PHPSTORM_META\type;

    class ajax extends Controller{
        var $commonmodel;
        var $homeclientmodel;
        var $checkoutmodel;
        var $ordermodel;
        var $full_address;
        var $productmodel;
        var $informodel;
        function __construct()
        {
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->full_address = $this->ModelClient("addressmodel");
            $this->productmodel = $this->ModelClient("get_data_to_pro_details");
            // $this->homeclientmodel = $this->ModelClient("homemodel");
            $this->checkoutmodel = $this->ModelClient("checkoutmodel");
            $this->ordermodel = $this->ModelAdmin("ordermodel");
            $this->informodel = $this->ModelClient('informodel');

        }

        //Show list quận huyện theo thành phố
        public function district(){
            $id=$_POST['id_city'];
            $query = $this->full_address->getDistrict($id);
            // $list = $this->Mdistrict->district_provinceid($id);
            $html="<option value ='0' selected>---Chọn quận huyện---</option>";
            foreach ($query as $row) 
            {
                $html.='<option value = '.$row["maqh"].'>'.$row["name"].'</option>';
            }
            echo $html;
        }
        //Show list xã phường trị trấn theo quận huyện
        public function ward(){
            $id = $_POST['id_district'];
            $query = $this->full_address->getWard($id);
            // $list = $this->Mdistrict->district_provinceid($id);
            $html="<option value ='0' selected>---Chọn xã phường---</option>";
            foreach ($query as $row) 
            {
                $html.='<option value = '.$row["xaid"].'>'.$row["name"].'</option>';
            }
            echo $html;
        }
        //kiểm tra xem tài khoản này có ai sử dụng hay chưa (lúc đăng kí tài khoản)
        function checkuser(){
            $email = $_POST["email"];
            if(CheckUnicode($email) == 0){
                $check = $this->commonmodel->checkemail($email);
                if($check >=1){
                    $mess = "<p style='color: red;'>Email này đã có người khác sử dụng</p>";
                }else{
                    $mess= "<p style='color: green;'>Email hợp lệ</p>";
                }
            }else {
                $mess ="<p style='color: red;'>Email và mật khẩu không được chứa kí tự đặc biệt</p>";
            }
            echo $mess;
        }

        //kiểm tra xem người dùng xác nhận mật khẩu khớp hay không (lúc đăng kí tài khoản)
        function checkpass(){
            $pass = $_POST["pass"];
            $pass_confirm = $_POST["pass_confirm"];
            
            if($pass != $pass_confirm){
                $mess = "<p style='color: red;'>Xác nhận mật khẩu không khớp</p>";
            }else {
                $mess = "<p style='color: green;'>Xác nhận mật khẩu trùng khớp</p>";
            }
            echo $mess;
        }
        //Kiểm tra định dạng số điện thoại
        function checkSodt(){
            $sodt = $_POST["phonenumber"];
            $vnf_regex = '/((09|03|07|08|05)+([0-9]{8})\b)/';
            if($sodt !==''){
                if (preg_match($vnf_regex, $sodt) == false) 
                {
                    $mess = "<p style='color: red;'>Số điện thoại của bạn không đúng định dạng!";
                }else{
                    $mess = "<p style='color: green;'>Số điện thoại của bạn hợp lệ!";
                }
            }else{
                $mess = "<p style='color: red;'>Bạn chưa điền số điện thoại!";
            }
            echo $mess;
        }

        //Kiểm tra định dạng email
        function checkEmail(){
            $email = $_POST["email"];
            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
            if($email !==''){
                if (preg_match($pattern, $email) == false) 
                {
                    $mess = "<p style='color: red;'>Email của bạn không đúng định dạng!";
                }else{
                    // $mess = "<p style='color: green;'>Email của bạn hợp lệ!";
                    $check = $this->commonmodel->checkemail($email);
                    if($check >=1){
                        $mess= "<p style='color: green;'>Email hợp lệ</p>";
                    }else{
                        $mess = "<p style='color: red;'>Email chưa được đăng ký tài khoản!!</p>";
                    }
                }
            }else{
                $mess = "<p style='color: red;'>Bạn chưa điền email!";
            }
            
            echo $mess;
        }

        //Kiểm tra xem người dùng có chọn tỉnh thành phố hay không 
        function checkCity(){
            $check_city = $_POST['city'];
            if($check_city === '0')
            {
                $mess = "<p style='color: red; '>Vui lòng chọn Tỉnh / thành phố</p>";
            } 
            else $mess ="<p style='color: red; '>Vui lòng chọn Quận / huyện</p>";
            echo $mess;
        }
        //Kiểm tra xem người dùng có chọn quận huyện hay không 
        function checkDistrict (){
            $check_district = $_POST['district'];
            if($check_district === '0')
            {
                $mess = "<p style='color: red; '>Vui lòng chọn Quận / huyện</p>";
            } 
            else $mess = "<p style='color: red; '>Vui lòng chọn Phường / xã</p>";
            echo $mess;
        }
        //Kiểm tra xem người dùng có chọn tỉnh thành phố hay không 
        function checkWard(){
            $check_ward = $_POST['ward'];
            if($check_ward === '0')
            {
                $mess = "<p style='color: red; '>Vui lòng chọn Phường / xã</p>";
            }
            else $mess = '';
            echo $mess;
        }
        //Địa chỉ không được để trống
        function checkAddress(){
            $address = $_POST["address"];
            if(empty($address)){
                $mess = "<p style='color: red;'>Bạn chưa điền địa chỉ!";
            }else{
                $mess = '';
            }
            echo $mess;
        }
        // hiển chi tiết sản phẩm khi người dùng bấm vào mua sản phẩm
        function details(){
            $id = $_POST["id"];
            $product = $this->commonmodel->GetProductById($id);
            $listComment = $this->homeclientmodel->ShowComment($id);
            echo '
                <div class="col-sm-12 padding-right">
                    <i style="font-size: 35px; color: orange;position: absolute;right: 0;z-index: 2;" class="fas fa-times-circle"></i>
                    <div class="product-details" style="min-height: 470px;"><!--product-details-->
                        <div class="col-sm-6" style="min-height: 470px;">
                            <div class="view-product">
                                <img style="object-fit: cover; min-height: 470px;" src="public/images/img_product/'.$product[0]["img_product"].'" alt="" />
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="product-information"><!--/product-information-->
                                <img src="public/client/images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2 style="color: #FE980F;">'.$product[0]["name"].'</h2>
                                <p><b>Giá : '.number_format ($product[0]["price"] * (1-$product[0]["sale_product"]/100) , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ).' Đồng</b></p>
                                <p><b>Số lượng đã bán:</b> '.$product[0]["pay"].'</p>
                                <p><b>Số Lượng còn:</b> '.$product[0]["quantity"].'</p>
                                <p><b>Nhà cung cấp:</b> '.$product[0]["production_company"].'</p>
                                <p><b>Mô tả: </b>'.$product[0]["descrip"].'</p>
                                <span>
                                    <a href="javascript:void(0)" class="btn btn-fefault cart addcart" idproduct = '.$product[0]["id"].'>
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm Vào Giỏ Hàng
                                    </a>
                                </span>
                            </div>
                            <div >
                            <div style="max-height: 170px; overflow-y: scroll;" id="list-comment">
                            ';
                            foreach($listComment as $key=>$value){
                                echo '
                            <!----------------hiển thị bình luận của từng sản phẩm-------------------->
                            
                            <div class="col-md-12 scroll">
                                <div class="d-flex flex-column comment-section">
                                    <div class="bg-white p-2">
                                        <div class="d-flex flex-row user-info" style="display: flex;">
                                            <img  class="rounded-circle" src="data:image/png;base64,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" width="40">
                                            <div class="d-flex flex-column justify-content-start ml-2" style="display: flex;align-items: center;">
                                                <span class="d-block font-weight-bold name" style="font-weight: bold; margin-left:5px;">'.$value["name_user"].'</span>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <p class="comment-text" style="margin-left: 45px;">'.$value["content"].'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                                ';
                            }
                            echo '
                            </div>
                            <div class="bg-light p-2 ">
                                    <div class="d-flex flex-row align-items-start">
                                        <textarea class="form-control ml-1 shadow-none textarea content-comment" id="content-comment"></textarea>
                                    </div>
                                    <div class="mt-2 text-right">
                                        <button idproduct = '.$product[0]["id"].' class="btn btn-primary btn-sm shadow-none comment-product" type="button">Bình Luận</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div><!--/product-details-->
                </div>
            ';
        }
        //phân trang sản phẩm
        function paging(){
            if(isset($_POST["page"])){
                $current_page = $_POST["page"];
            }else $current_page = 1;
            if(isset($_POST["id"])){
                $id = $_POST["id"];
                if($id != 0){
                    $numberproduct = $this->commonmodel->NumberProductById($id);
                }else{
                    $numberproduct = $this->commonmodel->GetNumber("product");
                }
                $totalpage =ceil($numberproduct/6);
                for($i = 1; $i <= $totalpage;$i++){
                    if($current_page != $i){
                        if($current_page -5 < $i && $i < $current_page +5 ){
                            echo '
                            <a href="javascript:void(0)" class="paging nextpage" numPage ="'.$i.'">'.$i.'</a>
                            ';
                        }
                    }else {
                        echo '
                        <span class="paging paging-current">'.$i.'</span>
                        ';
                    }
                }
            }
        }

        //Thanh toán ngay
        function buynow(){
            if(isset($_SESSION["info"]["name"])){
                if(isset($_POST["id"])){
                    $id = $_POST["id"];
                    $product_temp = $this->commonmodel->GetProductById($id);
                    $mabosuutap = $product_temp[0]["mabosuutap"];
                    $bosuutap = $this->commonmodel->getBosuutap($mabosuutap);
                    $makichthuoc = $bosuutap[0]['makichthuoc'];
                    $kichthuoc = $this->commonmodel->getKichthuoc($makichthuoc);
                    $product = [
                        "id"=>$product_temp[0]["masp"],
                        "name"=>str_replace('_', ' ', $product_temp[0]["tensp"]),
                        "gioitinh"=>$bosuutap[0]['gioitinh'],
                        "price_new"=>$product_temp[0]["gia"] * (1-$product_temp[0]["giamgia"]/100),
                        "price_old"=>$product_temp[0]["gia"],
                        "img"=>$product_temp[0]["img"],
                        "color" => $product_temp[0]["mausac"],
                        "size" => $kichthuoc[0]["kichthuoc"],
                        "quantity"=>1,
                        "sale"=>$product_temp[0]["giamgia"],
                        "total" => 0
                    ];
                    if($product_temp[0]["soluong"] > 0){
                        if(!isset($_SESSION["cart"][$id])){ //Nếu chưa có sản phẩm $id
                            $_SESSION["cart"][$id] = $product;
                            $_SESSION["cart"][$id]["total"] = $_SESSION["cart"][$id]["price_new"];
                            echo '<script> location.reload() </script>';
                            echo '<script>location.href="'.base.'cart/showcart"</script>';
                        }
                        else{
                            if ($_SESSION['cart'][$id]['quantity'] < $product_temp[0]["soluong"]){
                                $_SESSION["cart"][$id]["quantity"]+=1;
                                $_SESSION["cart"][$id]["total"] = $_SESSION["cart"][$id]["quantity"] * $_SESSION["cart"][$id]["price_new"];
                                echo '<script> location.reload() </script>';
                                echo '<script>location.href="'.base.'cart/showcart"</script>';
                            } else {
                                NotifiErrorQuantity('Số lượng sản phẩm không đủ!!');
                            }
                        }

                    }else{
                        NotifiErrorQuantity("Sản phẩm đã được bán hết quay lại sau nhé!");
                    }
                }
            }else{
                $_SESSION["error_login"] = "Vui Lòng đăng nhập";
                $error_login = '<script>location.href="'.base.'login/"</script>';
                echo $error_login;
            }
        }
        //Thêm sản phẩm vào giỏ hàng
        function addcart(){
            if(isset($_SESSION["info"]["name"])){
                if(isset($_POST["id"])){
                    $id = $_POST["id"];
                    $product_temp = $this->commonmodel->GetProductById($id);
                    $mabosuutap = $product_temp[0]["mabosuutap"];
                    $bosuutap = $this->commonmodel->getBosuutap($mabosuutap);
                    $makichthuoc = $bosuutap[0]['makichthuoc'];
                    $kichthuoc = $this->commonmodel->getKichthuoc($makichthuoc);
                    $product = [
                        "id"=>$product_temp[0]["masp"],
                        "name"=>str_replace('_', ' ', $product_temp[0]["tensp"]),
                        "gioitinh"=>$bosuutap[0]['gioitinh'],
                        "price_new"=>$product_temp[0]["gia"] * (1-$product_temp[0]["giamgia"]/100),
                        "price_old"=>$product_temp[0]["gia"],
                        "img"=>$product_temp[0]["img"],
                        "color" => $product_temp[0]["mausac"],
                        "size" => $kichthuoc[0]["kichthuoc"],
                        "quantity"=>1,
                        "sale"=>$product_temp[0]["giamgia"],
                        "total" => 0
                    ];
                    if($product_temp[0]["soluong"] > 0){
                        if(!isset($_SESSION["cart"][$id])){ //Nếu chưa có sản phẩm $id
                            $_SESSION["cart"][$id] = $product;
                            $_SESSION["cart"][$id]["total"] = $_SESSION["cart"][$id]["price_new"];
                            echo '<script> location.reload() </script>';
                        }
                        else{
                            if ($_SESSION['cart'][$id]['quantity'] < $product_temp[0]["soluong"]){
                                $_SESSION["cart"][$id]["quantity"]+=1;
                                $_SESSION["cart"][$id]["total"] = $_SESSION["cart"][$id]["quantity"] * $_SESSION["cart"][$id]["price_new"];
                                echo '<script> location.reload() </script>';
                            } else {
                                NotifiErrorQuantity('Số lượng sản phẩm không đủ!!');
                            }
                        }
                        
                    }else{
                        NotifiErrorQuantity("Sản phẩm đã được bán hết quay lại sau nhé!");
                    }
                }
            }else{
                $_SESSION["error_login"] = "Vui Lòng đăng nhập";
                $error_login = '<script>location.href="'.base.'login/"</script>';
                echo $error_login;
            }
        }


        // cập nhật lại tổng sổ tiền và số lượng sau khi bấm nút -
        function downquantity(){
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $_SESSION['cart'][$id]["quantity"]-=1;
                $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price_new"];
                if($_SESSION['cart'][$id]["quantity"] == 0){
                    $_SESSION['cart'][$id]["quantity"]=1;
                    $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price_new"];
                }
                header("location:".base."cart/showcart");
            }
        }

        // cập nhật lại tổng sổ tiền và số lượng sau khi bấm nút +
        function upquantity(){
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $_SESSION['cart'][$id]["quantity"]+=1;
                // $quantity_product = $this->checkoutmodel->GetQuantityById($id);
                $quantity_product = $this->checkoutmodel->GetQuantityById($id);
                
                if($_SESSION['cart'][$id]["quantity"] <= $quantity_product[0]["soluong"]){
                    $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price_new"];
                    
                    header("location:".base.'cart/showcart');
                // header("location:".base);
                }else{
                    $_SESSION['cart'][$id]["quantity"]-=1;
                    NotifiError("Xin lỗi số lượng trong kho không đủ","cart/showcart");
                }
            }
        }
        function updatequantity() {
            //cập nhật lại số lượng khi người dùng thêm số lượng
            if(isset($_POST["updatequantity"])){
                $id = $_POST["idproduct"];
                $quantity = $_POST["quantity"];
                $quantity_product = $this->checkoutmodel->GetQuantityById($id);
                if($quantity <= $quantity_product[0]["quantity"]){
                    $_SESSION['cart'][$id]["quantity"]=$quantity;
                    if($_SESSION['cart'][$id]["quantity"] <= 0){
                        $_SESSION['cart'][$id]["quantity"]=1;
                        $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price_new"];
                    }else{
                        $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price_new"];
                    }
                }else{
                    NotifiErrorQuantity("Xin lỗi số lượng trong kho chỉ còn lại ".$quantity_product[0]["soluong"]." sản phẩm");
                }
            }
        }
        //xóa sản phẩm khỏi giỏ hàng
        function deleteproductcart(){
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                unset($_SESSION['cart'][$id]);
                header("location:".base.'cart/showcart');
                
                // echo '<script> location.reload() </script>';
                
            }
        }

        //Tìm kiếm sản phẩm
        function search(){
            if(isset($_POST["content"])){
                $current_page = $_POST["page"];
                $limit = 6;
                $offset = ($current_page-1)*6;
                $content = $_POST["content"];
                $product = $this->homeclientmodel->SearchProduct($content,$limit,$offset);
                echo '<h4 style="margin-left: 15px;">Kết quả tìm kiếm: '.$content.'</h4>';
                foreach($product as $key=>$values){ 
                    echo '
                        <div class="col-sm-4">
                        <div class="product-image-wrapper"style="max-height: 350px;">
                            <div class="single-products"style="max-height: 350px;">
                                <div class="productinfo text-center" style="max-height: 400px;">
                                    <img style="max-height: 200px;min-height: 200px;object-fit: cover;" src="public/images/img_product/'.$values["img_product"].'" alt="" />
                                    <h4 style="text-decoration: line-through;">'.number_format ($values["price"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ).'đ</h4>
                                    <h2 style="margin:unset">'.number_format ($values["price"] * (1-$values["sale_product"]/100), $decimals = 0 , $dec_point = "," , $thousands_sep = "." ).'đ</h2>
                                    <p>'.$values["name"].'</p>
                                    <a href="javascript:void(0)" class="btn btn-default add-to-cart" idproduct ="'.$values["id"].'"><i class="fa fa-shopping-cart"></i>Mua Hàng</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="javascript:void(0)" class="btn btn-default add-to-cart" idproduct ="'.$values["id"].'"><i class="fa fa-shopping-cart"></i>Mua Hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                    }
            }
        }

        //phân trang cho các sản phẩm tìm kiếm
        function pagingsearch(){
            $content = $_POST["content"];
            if(isset($_POST["page"])){
                $current_page = $_POST["page"];
            }else $current_page = 1;
            $numberproduct = $this->homeclientmodel->GetNumberProductSearch($content);
            $totalpage =ceil($numberproduct/6);
                for($i = 1; $i <= $totalpage;$i++){
                    if($current_page != $i){
                        if($current_page -5 < $i && $i < $current_page +5 ){
                            echo '
                            <a href="javascript:void(0)" class="paging nextpagesearch" numPage ="'.$i.'">'.$i.'</a>
                            ';
                        }
                    }else {
                        echo '
                        <span class="paging paging-current">'.$i.'</span>
                        ';
                    }
                }
        }

        // chi tiết đơn hàng mà khách hàng đã mua

        function orderdetails(){
            $id_order = $_POST["id_order"];
            //lấy tất cả sản phẩm theo id_order
            $order = $this->checkoutmodel->GetHistotyOrderByidorder($id_order);
            $infor = $this->informodel->GetInfoUser($order[0]['makh']);
            $order_details = $this->ordermodel->GetOrderDetails($id_order);
            echo '
                <h2 class="infor-content--header">Chi tiết đơn hàng: #'.$id_order.'</h2>
                <a href="'.base.'inforuser/history" class="" style="text-decoration: none; color: black; font-size: 14px;position: relative;
                top: -8px">
                    <i class="infororder__footer-icon fa-solid fa-arrow-left-long"></i>
                    Trở lại 
                </a>
                <table>
                    <tr>
                        <th align="left">Tên khách hàng: </th>
                        <td style="padding: 10px;">'.$infor[0]['tenkh'].'</td>
                    </tr>
                    <tr>
                        <th align="left">Số điện thoại: </th>
                        <td style="padding: 10px;">'.$order[0]['sodt'].'</td>
                    </tr> 
                    <tr>
                        <th align="left">Địa chỉ: </th>
                        <td style="padding: 10px;">'.$order[0]['diachi'].'</td>
                    </tr> 
                </table>
                    <table class="infor-content-infor detail">
                    
                        <tr class="row-infor">
                            <th class="">
                                <strong>Hình ảnh</strong>
                            </th>
                            <th class="">
                                <strong>Tên sản phẩm</strong>
                            </th>
                            
                            <th class="">
                                <strong>Giá</strong>
                            </th>
                        
                            <th class=" ">
                                <strong>Số lượng</strong> 
                            </th>
                        
                            <th class="">
                                <strong>Tổng tiền</strong>
                            </th>
                        </tr> ';
            foreach ($order_details as $row):
                //dùng id sản phẩm đó để lấy thông tin sản phẩm
                $product = $this->commonmodel->GetProductById($row["masp"]);
                //dùng for để hiện sản phẩm
                foreach ($product as $row_product): 
                    //Lấy kích thước sản phẩm
                    $mabosuutap = $row_product["mabosuutap"];
                    $bosuutap = $this->commonmodel->getBosuutap($mabosuutap);
                    $makichthuoc = $bosuutap[0]['makichthuoc'];
                    $kichthuoc = $this->commonmodel->getKichthuoc($makichthuoc);
                    echo '
                        <tr class="row-infor">
                            <td class="col-infor col-item-center">
                                <img style="width: 120px; height: 120px;" class="img-cart"src="'.base.'public/client/assets/img/'.$row_product["img"].'">
                            </td>
                            <td class="col-infor col-item-center">
                                <h4 style="margin-bottom: 10px;">'.$row_product["tensp"].'</h4>
                                <p style="margin-top: 10px;">'.$row_product['mausac'].' / '.$kichthuoc[0]['kichthuoc'].'MM</p>
                            </td>
                            <td class="cart_price col-item-center" >
                                <p style="margin-top: 10px;">'.number_format ($row_product["gia"] * (1-$row_product["giamgia"]/100) , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ).' ₫</p>
                            </td>
                            <td class="cart_quantity col-item-center">'.$row["soluong"].'</td>
                            <td class="cart_total col-item-center" id = "" align="right">
                                <p class="cart_total_price"><strong>'.number_format ($row["tongtien"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ).' ₫<strong></p>
                            </td>
                        </tr>
                    ';
                endforeach;
            endforeach;
            
            echo '<tr>
                    <td colspan="4" align="right"><strong>Tạm tính: </strong></td>
                    <td  align="right"><strong>'.number_format (intval($order[0]['tonggiatri']) - $order[0]['phiship'] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ).' ₫</strong></td>
                </tr>
                <tr>
                    <td colspan="4" align="right"><strong>Phí ship: </strong></td>
                    <td  align="right"><strong>'.number_format($order[0]['phiship'],0,',','.') . ' ₫</strong></td>
                </tr>
                <tr>
                    <td colspan="4" align="right"><strong>Tổng cộng: </strong></td>
                    <td  align="right"><strong style="color: red;">'.number_format($order[0]['tonggiatri'], 0,',','.') .' ₫</strong></td>
                </tr>'
                ;
            echo '</table>';
                    
        }
        //Bình luận sản phẩm
        function commentproduct(){
            //kiểm tra người dùng đã đăng nhập chưa nếu chưa thì không cho bình luận và yêu cầu đăng nhập
            if(isset($_SESSION["info"]["id"])){
                //kiểm tra xem người dùng có chọn sản phẩm ko
                if(isset($_POST["id_product"])){
                    $idUser = $_SESSION["info"]["id"];
                    $idProduct = $_POST["id_product"];
                    $nameUser = $_SESSION["info"]["name"];
                    $content = $_POST["content"];
                    //kiểm tra xem nội dung có rỗng hay ko
                    if($content != ""){
                        $this->homeclientmodel->CommentProduct($idProduct,$idUser,$nameUser,$content);
                        echo '
                        <div class="col-md-12 scroll">
                                <div class="d-flex flex-column comment-section">
                                    <div class="bg-white p-2">
                                        <div class="d-flex flex-row user-info" style="display: flex;">
                                            <img  class="rounded-circle" src="data:image/png;base64,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" width="40">
                                            <div class="d-flex flex-column justify-content-start ml-2" style="display: flex;align-items: center;">
                                                <span class="d-block font-weight-bold name" style="font-weight: bold; margin-left:5px;">'.$nameUser.'</span>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <p class="comment-text" style="margin-left: 45px;">'.$content.'</p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        ';
                    }
                }
            }else{
                $_SESSION["error_login"] = "Vui Lòng đăng nhập";
                echo '<script>location.href="'.base.'login/login"</script>';
            }
        }
    }
?> 
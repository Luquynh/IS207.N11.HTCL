<?php
    class checkout extends Controller{
        var $commonmodel;
        var $checkoutmodel;
        var $header;
        var $informodel;
        var $full_address;
        var $ordermodel;
        function __construct()
        {
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->checkoutmodel = $this->ModelClient("checkoutmodel");
            $this->header = $this->ModelClient("get_pictures_to_home");
            $this->informodel = $this->ModelClient("informodel");
            $this->full_address = $this->ModelClient("addressmodel");
            $this->ordermodel = $this->ModelAdmin('ordermodel');
        }
        
        //Trang lỗi đường dẫn 404
        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }

        //Hiển thị sản phẩm trong giỏ hàng
        function show(){
            if(count($_SESSION['cart'])==0){
                unset($_SESSION["cart"]);
            }
            //tính tổng tiền
            $total = 0;
            if(isset($_SESSION["cart"])){
                foreach($_SESSION["cart"] as $key=>$values){
                    $total+=$values["total"];
                }
            }
            //Tính phí ship
            if (intval($total) > 700000){
                $phiship = 0;
            } else $phiship = 30000;
            $flag = 0;
            // xử lý khi người dùng bấm nút thanh toán
            if(isset($_POST['submit'])){
                //Kiểm tra xem giỏ hàng có trống hay không mới cho thanh toán
                if(isset($_SESSION["cart"])){
                    //Lấy thông tin khách hàng 
                    $order = $_POST['data'];
                    //lấy id khách hàng
                    $id = $_SESSION["info"]["id"];
                    //Cập nhật lại thông tin khách hàng nếu có thay đổi
                    $address = $order["address"];
                    //lấy thông tin người dùng nhờ có session id
                    $id_user = $_SESSION["info"]["id"];
                    $info_user = $this->informodel->GetInfoUser($id_user);

                    $matp = $order['city'];
                    $maqh = $order['district'];
                    $xaid = $order['ward'];

                    //tao dia chi day du 
                    $nameCity = $this->informodel->getNameCity($matp);
                    $nameDistrict = $this->informodel->getNameDistrict($maqh);
                    $nameWard = $this->informodel->getNameWard($xaid);

                    $diachi_dd = $order["address"].", ".$nameWard[0]["name"].", ".$nameDistrict[0]["name"].", ".$nameCity[0]["name"]."";
                    $_SESSION['info']['name'] = $order['name'];
                    $this->informodel->ChangerInfoorder($id, $order["name"], $order["email"], $address, $order["ward"], $order["district"], $order["city"], $order["phonenumber"],$diachi_dd);
                    
                    

                    //Thêm đơn hàng vào bảng order_product
                    $id_order = $this->checkoutmodel->AddDonhang($id,$order["phonenumber"], $diachi_dd,$phiship,intval($total) + intval($phiship));
                    //dùng for để duyệt giỏ hàng lấy ra từng sản phẩm
                    foreach($_SESSION["cart"] as $key=>$values){
                        //thêm từng sản phẩm vào bảng order_detail
                        $this->checkoutmodel->AddChitietdonhang($id_order,$values["id"],$values["quantity"],$values["total"]);
                        $quantity_product = $this->checkoutmodel->GetQuantityById($values["id"]);
                        //Khi bấm thanh toán thì lấy số lượng còn trong kho trừ đi số lượng mà người dùng mua rồi cập nhật lại số lượng
                        $quantity_update = $quantity_product[0]["soluong"] - $values["quantity"];
                        $this->checkoutmodel->UpdateQuantityById($values["id"],$quantity_update);
                        //lấy số lượng mà người dùng đã mua ghi vào mục pay (số lượng đã bán)
                        // $quantity_pay = $this->checkoutmodel->GetProductPay($values["id"]) + $values["quantity"];
                        // $this->checkoutmodel->PayProduct($values["id"],$quantity_pay);
                    };
                    // notification("success","Đặt Hàng Thành Công","Đơn hàng của bạn đang chờ xử lý","OK","true","3085d6");
                    // header("location:".base);
                    $order_details = $this->ordermodel->GetOrderDetails($id_order);

                    //Tạo body mail
                    $subject = 'Thông tin đơn hàng #'.$id_order;
                    $body = '<h3>MÃ ĐƠN HÀNG #'.$id_order.'</h3>
                    <p>
                    Cám ơn bạn đã mua hàng! <br>
                    Chúng tôi đã nhận được đặt hàng của bạn và đã sẵn sàng để vận chuyển.<br>
                    <br>
                    Vì lý do vận chuyển gặp nhiều hạn chế nên dự kiến thời gian giao hàng sẽ tầm 3 - 5 ngày bạn nhé.<br>
                    <br>
                    Bạn hãy luôn giữ gìn sức khỏe và mạnh khỏe chờ shipper trai xinh gái đẹp giao hàng nhé ^^<br>
                    </p>
                    <table>
                        <tr>
                            <td colspan = "3"><h3 >Thông tin đơn hàng</h3></td>
                        </tr>';
                $img_array = [];
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
        
                        array_push($img_array, $row_product['img']);
                        $body .='<tr>
                                    <td style="display: flex; align-items: center;">
                                    
                                        <img src="cid:'.$row_product['img'].'"  alt="" style="height: 100px; width: 100px;">
                                    
                                    </td>
                                    <td style="width: 400px;">
                                        <strong><p>'.$row_product['tensp'].' × <span>'.$row['soluong'].'</span></p></strong>
                                            <p>'.$row_product['mausac'].' / '.$kichthuoc[0]['kichthuoc'].'MM</p>
                                    </td>
                                    <td align="right">
                                        <strong>'.number_format($row['tongtien'], 0,",",".").'₫</strong>
                                    </td>
                                </tr>';
                    endforeach;
                endforeach;
                $order = $this->checkoutmodel->GetHistotyOrderByidorder($id_order);
                $infor = $this->informodel->GetInfoUser($order[0]['makh']);
                        $body .=        '<tr style="border-top: 1px solid #ccc;" >
                                    <td align="right" colspan="2">
                                        Tổng giá trị sản phẩm:
                                    </td>
                                    <td align="right">
                                    
                                        <strong>'.number_format($order[0]['tonggiatri'], 0,",",".").'₫</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" colspan="2">
                                        Phí ship:
                                    </td>
                                    <td align="right">
                                        <strong>'.number_format($order[0]['phiship'], 0,",",".").'₫</strong>
                                    </td>
                                </tr>
                                <tr >
                                    <td align="right" colspan="2">
                                        Tổng cộng:
                                    </td>
                                    <td align="right">
                                        <strong>'.number_format((int)$order[0]['tonggiatri'] + 30000, 0,",",".").'₫</strong>
                                    </td>
                                </tr>
                            </table>
        
                            
                            <table>
                                <tr>
                                    <td colspan = "3"><h3 >Thông tin khách hàng</h3></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Địa chỉ giao hàng</strong>
                                    </td>
                                    <td>
                                        <strong>Địa chỉ thanh toán</strong>
                                    </td>
                                    
                                </tr>
                                
        
                                <tr>
                                    
                                    <td style="width: 400px;">'
                                        .$infor[0]['tenkh'].'
                                        <br>'
                                        .$infor[0]['sodt'].'<br>'             
                                        .$infor[0]['diachi_dd'].'
                                    </td>
                                    
                                    
                                    <td style="width: 400px;">'
                                        .$infor[0]['tenkh'].'
                                        <br>'   
                                        .$infor[0]['sodt'].'<br>'           
                                        .$infor[0]['diachi_dd'].'
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Pương thức vận chuyển</strong>
                                    </td>
                                    <td>
                                        <strong>Pương thức thanh toán</strong>
                                    </td>
                                    
                                </tr>
                                
        
                                <tr>
                                    
                                    <td>
                                    Giao hàng tận nơi
                                    </td>
                                    
                                    
                                    <td>
                                    Thanh toán khi giao hàng (COD)
                                    </td>
                                    
                                </tr>
                            </table>
                            <style>
                                td {
                                    padding: 0 16px 16px 16px;
                                }
                            </style>';

                    // sendinfororder($infor[0]["email"], $subject, $body, $img_array);
                    NotifiOrder("Đặt Hàng Thành Công","inforuser/history");
                    unset($_SESSION["cart"]);
                    // $flag = 1;
                }else 
                    notification("error","Không Thành Công","Vui lòng thêm sản phẩm vào giỏ hàng","OK","true","3085d6");
            }
        
            //cập nhật lại số lượng khi người dùng thêm số lượng
            // if(isset($_POST["updatequantity"])){
            //     $id = $_POST["idproduct"];
            //     $quantity = $_POST["quantity"];
            //     $quantity_product = $this->checkoutmodel->GetQuantityById($id);
            //     if($quantity <= $quantity_product[0]["quantity"]){
            //         $_SESSION['cart'][$id]["quantity"]=$quantity;
            //         if($_SESSION['cart'][$id]["quantity"] <= 0){
            //             $_SESSION['cart'][$id]["quantity"]=1;
            //             $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price"];
            //         }else{
            //             $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price"];
            //         }
            //     }else{
            //         NotifiErrorQuantity("Xin lỗi số lượng trong kho chỉ còn lại ".$quantity_product[0]["quantity"]." sản phẩm");
            //     }
            // }
            
            //Lấy thông tin khách hàng
            $id_user = $_SESSION["info"]["id"];
            $info_user = $this->informodel->GetInfoUser($id_user);

            //Lấy name của quận, huyện. phường, xã
            $matp = $info_user[0]['matp'];
            $maqh = $info_user[0]['maqh'];
            $xaid = $info_user[0]['xaid'];

            $nameCity = $this->informodel->getNameCity($matp);
            $nameDistrict = $this->informodel->getNameDistrict($maqh);
            $nameWard = $this->informodel->getNameWard($xaid);
            $data = [
                "info" => $info_user,
                "city" => $nameCity,
                "district" => $nameDistrict,
                "ward" => $nameWard,
                "total"=>$total,
                "phiship" => $phiship,
                "mess" => '',
                "avatar_men" => $this->header->get_avatar("men"),
                "avatar_women" => $this->header->get_avatar("women")
            ];
            $this->ViewClient("checkout",$data);
        }
        // function checkout(){
        //     if(count($_SESSION['cart'])==0){
        //         unset($_SESSION["cart"]);
        //     }
        //     //tính tổng tiền
        //     $total = 0;
        //     if(isset($_SESSION["cart"])){
        //         foreach($_SESSION["cart"] as $key=>$values){
        //             $total+=$values["total"];
        //         }
        //     }
        //     // xử lý khi người dùng bấm nút thanh toán
        //     if(isset($_POST['submit'])){
        //         //Kiểm tra xem giỏ hàng có trống hay không mới cho thanh toán
        //         if(isset($_SESSION["cart"])){
        //             //Lấy thông tin khách hàng 
        //             $order = $_POST['data'];
        //             //lấy id khách hàng
        //             $id = $_SESSION["info"]["id"];
        //             //Cập nhật lại thông tin khách hàng nếu có thay đổi
        //             $address = $order["address"];
        //             $this->informodel->ChangerInfoorder($id, $order["name"], $order["email"], $address, $order["ward"], $order["district"], $order["city"], $order["phonenumber"]);
        //             //Thêm đơn hàng vào bảng order_product
        //             $this->checkoutmodel->AddDonhang($id,$order["phonenumber"], $address,35000,$total);
        //             //dùng for để duyệt giỏ hàng lấy ra từng sản phẩm
        //             foreach($_SESSION["cart"] as $key=>$values){
        //                 //thêm từng sản phẩm vào bảng order_detail
        //                 $this->checkoutmodel->AddChitietdonhang(3,$values["id"],$values["quantity"],$values["total"]);
        //                 $quantity_product = $this->checkoutmodel->GetQuantityById($values["id"]);
        //                 //Khi bấm thanh toán thì lấy số lượng còn trong kho trừ đi số lượng mà người dùng mua rồi cập nhật lại số lượng
        //                 $quantity_update = $quantity_product[0]["quantity"] - $values["quantity"];
        //                 $this->checkoutmodel->UpdateQuantityById($values["id"],$quantity_update);
        //                 //lấy số lượng mà người dùng đã mua ghi vào mục pay (số lượng đã bán)
        //                 // $quantity_pay = $this->checkoutmodel->GetProductPay($values["id"]) + $values["quantity"];
        //                 // $this->checkoutmodel->PayProduct($values["id"],$quantity_pay);
        //             };
        //             unset($_SESSION["cart"]);
        //             notification("success","Đặt Hàng Thành Công","Đơn hàng của bạn đang chờ xử lý","OK","true","3085d6");
        //             NotifiOrder("Đặt Hàng Thành Công","home/history");
        //         }else 
        //             notification("error","Không Thành Công","Vui lòng thêm sản phẩm vào giỏ hàng","OK","true","3085d6");
        //     }
        
        //     // //cập nhật lại số lượng khi người dùng thêm số lượng
        //     // if(isset($_POST["updatequantity"])){
        //     //     $id = $_POST["idproduct"];
        //     //     $quantity = $_POST["quantity"];
        //     //     $quantity_product = $this->checkoutmodel->GetQuantityById($id);
        //     //     if($quantity <= $quantity_product[0]["quantity"]){
        //     //         $_SESSION['cart'][$id]["quantity"]=$quantity;
        //     //         if($_SESSION['cart'][$id]["quantity"] <= 0){
        //     //             $_SESSION['cart'][$id]["quantity"]=1;
        //     //             $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price"];
        //     //         }else{
        //     //             $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price"];
        //     //         }
        //     //     }else{
        //     //         NotifiErrorQuantity("Xin lỗi số lượng trong kho chỉ còn lại ".$quantity_product[0]["quantity"]." sản phẩm");
        //     //     }
        //     // }
            
        //     //Lấy thông tin khách hàng
        //     $id_user = $_SESSION["info"]["id"];
        //     $info_user = $this->informodel->GetInfoUser($id_user);

        //     //Lấy name của quận, huyện. phường, xã
        //     $matp = $info_user[0]['matp'];
        //     $maqh = $info_user[0]['maqh'];
        //     $xaid = $info_user[0]['xaid'];

        //     $nameCity = $this->informodel->getNameCity($matp);
        //     $nameDistrict = $this->informodel->getNameDistrict($maqh);
        //     $nameWard = $this->informodel->getNameWard($xaid);
        //     $data = [
        //         "info" => $info_user,
        //         "city" => $nameCity,
        //         "district" => $nameDistrict,
        //         "ward" => $nameWard,
        //         "total"=>$total,
        //         "avatar_men" => $this->header->get_avatar("men"),
        //         "avatar_women" => $this->header->get_avatar("women")
        //     ];
        //     $this->ViewClient("checkout",$data);
        // }
        function resetcart(){
            unset($_SESSION["cart"]);
            header("location:".base."cart/showcart");
        }
        //Thanh toán đơn hàng
        function order(){
            
        }
    }
?>
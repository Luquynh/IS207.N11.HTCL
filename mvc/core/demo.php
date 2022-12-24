<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/Exception.php";
require_once "PHPMailer/src/SMTP.php";

// require_once "public/library/PHPMailer/src/PHPMailer.php";
// require_once "public/library/PHPMailer/src/Exception.php";
// require_once "public/library/PHPMailer/src//SMTP.php";
// C:/xampp/htdocs/curnon/mvc/models/client/checkoutmodel.php
require_once 'C:/xampp/htdocs/curnon/mvc/core/DB.php';
require_once 'C:/xampp/htdocs/curnon/mvc/models/client/checkoutmodel.php';
require_once 'C:/xampp/htdocs/curnon/mvc/models/client/informodel.php';
require_once 'C:/xampp/htdocs/curnon/mvc/models/admin/ordermodel.php';
require_once 'C:/xampp/htdocs/curnon/mvc/models/common/commonmodel.php';



function sendinfororder($email, $subject, $id_order){
    $mail = new PHPMailer(true);  
    
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'buivanthuan1608@gmail.com';                 // SMTP username
    $mail->Password = 'sgvqqpeglxuiyoff';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;  
    
    $mail->setFrom('buivanthuan1608@gmail.com', 'Admin Curnon');
    $mail->addAddress($email);

    $mail->isHTML(true);      
    $subject= "=?utf-8?b?".base64_encode($subject)."?=";                            // Set email format to HTML
                            
    $mail->Subject = $subject;
    
    $checkoutmodel = new checkoutmodel();
    $ordermodel = new ordermodel();
    $commonmodel = new commonmodel();
    $informodel = new informodel();

    $order_details = $ordermodel->GetOrderDetails($id_order);

    // $mail->AddEmbeddedImage('public/client/assets/img/men/FUTURA.png', 'imgproduct'); // attach file logo.jpg, and later link to it using identfier logoimg
    $body = '<h3>ĐƠN HÀNG #'.$id_order.'</h3>
            <p>
            Cám ơn bạn đã mua hàng! <br>
            Chúng tôi đã nhận được đặt hàng của bạn và đã sẵn sàng để vận chuyển.<br>
            <br>
            Vì lý do vận chuyển gặp nhiều hạn chế nên dự kiến thời gian giao hàng sẽ tầm 3 - 5 ngày bạn nhé.<br>
            <br>
            Bạn hãy luôn giữ gìn sức khỏe và mạnh khỏe chờ shipper trai xinh gái đẹp giao hàng nhé ^^<br>
            </p>
            <table>
                <h3>Thông tin đơn hàng</h3>';
        foreach ($order_details as $row):
            //dùng id sản phẩm đó để lấy thông tin sản phẩm
            $product = $commonmodel->GetProductById($row["masp"]);
            //dùng for để hiện sản phẩm
            foreach ($product as $row_product): 
                //Lấy kích thước sản phẩm
                $mabosuutap = $row_product["mabosuutap"];
                $bosuutap = $commonmodel->getBosuutap($mabosuutap);
                $makichthuoc = $bosuutap[0]['makichthuoc'];
                $kichthuoc = $commonmodel->getKichthuoc($makichthuoc);

                $mail->AddEmbeddedImage('public/client/assets/img/'.$row_product['img'], 'imgproduct'); 

                $body .='<tr>
                            <td style="display: flex; align-items: center;">
                            
                                <img src="cid:imgproduct"  alt="" style="height: 100px; width: 100px;">
                            
                            </td>
                            <td style="width: 400px;">
                                <strong><p>'.$row_product['tensp'].'× <span>'.$row['soluong'].'</span></p></strong>
                                    <p>'.$row_product['mausac'].' / '.$kichthuoc.'MM</p>
                            </td>
                            <td align="right">
                                <strong>'.number_format($row['tongtien'], 0,",",".").' ₫</strong>
                            </td>
                        </tr>';
            endforeach;
        endforeach;
        $order = $checkoutmodel->GetHistotyOrderByidorder($id_order);
        $infor = $informodel->GetInfoUser($order[0]['makh']);
                $body .=        '<tr style="border-top: 1px solid #ccc;" >
                            <td align="right" colspan="2">
                                Tổng giá trị sản phẩm:
                            </td>
                            <td align="right">
                            
                                <strong>'.number_format($order[0]['tongiatri'], 0,",",".").' ₫</strong>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" colspan="2">
                                Phí ship:
                            </td>
                            <td align="right">
                                <strong>30.000 ₫</strong>
                            </td>
                        </tr>
                        <tr >
                            <td align="right" colspan="2">
                                Tổng cộng:
                            </td>
                            <td align="right">
                                <strong>'.number_format($order[0]['tongiatri'] + 30000, 0,",",".").' ₫</strong>
                            </td>
                        </tr>
                    </table>

                    
                    <table>
                        <h3>Thông tin khách hàng</h3>
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
                                .$infor[0]['diachi_dd'].'
                            </td>
                            
                            
                            <td style="width: 400px;">'
                                .$infor[0]['tenkh'].'
                                <br>'             
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
    $mail->Body = $body;
    $mail->send();
    
    echo
    "
    <script>
    alert('Send success!');
    document.location.href = 'index.php'
    </script>
    ";
}

sendinfororder('buivanthuan1608@gmail.com', 'Đơn hàng', 15);

?>
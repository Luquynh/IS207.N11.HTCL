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
    $body = '<h3>????N H??NG #'.$id_order.'</h3>
            <p>
            C??m ??n b???n ???? mua h??ng! <br>
            Ch??ng t??i ???? nh???n ???????c ?????t h??ng c???a b???n v?? ???? s???n s??ng ????? v???n chuy???n.<br>
            <br>
            V?? l?? do v???n chuy???n g???p nhi???u h???n ch??? n??n d??? ki???n th???i gian giao h??ng s??? t???m 3 - 5 ng??y b???n nh??.<br>
            <br>
            B???n h??y lu??n gi??? g??n s???c kh???e v?? m???nh kh???e ch??? shipper trai xinh g??i ?????p giao h??ng nh?? ^^<br>
            </p>
            <table>
                <h3>Th??ng tin ????n h??ng</h3>';
        foreach ($order_details as $row):
            //d??ng id s???n ph???m ???? ????? l???y th??ng tin s???n ph???m
            $product = $commonmodel->GetProductById($row["masp"]);
            //d??ng for ????? hi???n s???n ph???m
            foreach ($product as $row_product): 
                //L???y k??ch th?????c s???n ph???m
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
                                <strong><p>'.$row_product['tensp'].'?? <span>'.$row['soluong'].'</span></p></strong>
                                    <p>'.$row_product['mausac'].' / '.$kichthuoc.'MM</p>
                            </td>
                            <td align="right">
                                <strong>'.number_format($row['tongtien'], 0,",",".").' ???</strong>
                            </td>
                        </tr>';
            endforeach;
        endforeach;
        $order = $checkoutmodel->GetHistotyOrderByidorder($id_order);
        $infor = $informodel->GetInfoUser($order[0]['makh']);
                $body .=        '<tr style="border-top: 1px solid #ccc;" >
                            <td align="right" colspan="2">
                                T???ng gi?? tr??? s???n ph???m:
                            </td>
                            <td align="right">
                            
                                <strong>'.number_format($order[0]['tongiatri'], 0,",",".").' ???</strong>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" colspan="2">
                                Ph?? ship:
                            </td>
                            <td align="right">
                                <strong>30.000 ???</strong>
                            </td>
                        </tr>
                        <tr >
                            <td align="right" colspan="2">
                                T???ng c???ng:
                            </td>
                            <td align="right">
                                <strong>'.number_format($order[0]['tongiatri'] + 30000, 0,",",".").' ???</strong>
                            </td>
                        </tr>
                    </table>

                    
                    <table>
                        <h3>Th??ng tin kh??ch h??ng</h3>
                        <tr>
                            <td>
                                <strong>?????a ch??? giao h??ng</strong>
                            </td>
                            <td>
                                <strong>?????a ch??? thanh to??n</strong>
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
                                <strong>P????ng th???c v???n chuy???n</strong>
                            </td>
                            <td>
                                <strong>P????ng th???c thanh to??n</strong>
                            </td>
                            
                        </tr>
                        

                        <tr>
                            
                            <td>
                            Giao h??ng t???n n??i
                            </td>
                            
                            
                            <td>
                            Thanh to??n khi giao h??ng (COD)
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

sendinfororder('buivanthuan1608@gmail.com', '????n h??ng', 15);

?>
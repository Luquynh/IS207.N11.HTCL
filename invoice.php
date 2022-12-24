<?php
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">

        <div class="invoice-container">
            <div class="invoice-header">
                <div class="invoice-header-left">
                    <h4>Đồng hồ CURNON</h4>
                    <p>CN1: 33 Hàm Long, Hoàn Kiếm.<br>
                        CN2: 9 B7 Phạm Ngọc Thạch, Đống Đa.<br>
                        CN3: 173C Kim Mã, Ba Đình.<br>
                        <br>
                        buivanthuan1608@gmail.com<br>
                        0327437343
                    </P>
                </div>
                <div class="invoice-header__right">
                    <h3>HÓA ĐƠN BÁN HÀNG</h3>
                    <p>Mã đơn hàng: #15</p>
                    <p>Ngày tạo: 24/12/2022</p>
                    <p>Ngày in: 24/12/2022</p>
                </div>
            </div>
            <div class="invoice-content">
                <table class="border-top table1">
                    <tr><td colspan="2"><h4 style="font-size: 16px;">Thông tin khách hàng #15</h4></td></tr>
                    <tr>
                        <th align="left">Tên khách hàng: </th>
                        <td>Bùi Văn Thuận</td>
                    </tr>
                    <tr>
                        <th  align="left">Số điện thoại: </th>
                        <td>0327437343</td>
                    </tr>
                    <tr>
                        <th  align="left">Email: </th>
                        <td>buivanthuan1608@gmail.com</td>
                    </tr>
                    <tr>
                        <th  align="left">Địa chỉ giao hàng: </th>
                        <td>Ấp Bình Huề 1, Xã Mỹ Thái, Huyện Lạng Giang, Tỉnh Bắc Giang</td>
                    </tr>
                    <tr>
                        <th  align="left">Hình thức thanh toán: </th>
                        <td>Thanh toán khi nhận hàng (COD)</td>
                    </tr>
                </table>
    
                <table class="table2 border-top" border="1" cellpadding="10" cellspacing="0">
                    <tr align="left"><td colspan="6" ><h4>Thông tin đơn hàng #15</h4></td></tr>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Thông tin</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>thành tiền</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Curnon</td>
                        <td>silver / 44MM</td>
                        <td>1999000 ₫</td>
                        <td>3</td>
                        <td>5999999 ₫</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Curnon</td>
                        <td>silver / 44MM</td>
                        <td>1999000 ₫</td>
                        <td>3</td>
                        <td>5999999 ₫</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Curnon</td>
                        <td>silver / 44MM</td>
                        <td>1999000 ₫</td>
                        <td>3</td>
                        <td>5999999 ₫</td>
                    </tr>
    
                    <!-- Tổng cộng -->
                    <tr>
                        <th colspan="5" align="right" >Tạm tính:</th>
                        <td>5999999 ₫</td>
                    </tr>
                    <tr>
                        <th colspan="5" align="right">Phí ship:</th>
                        <td>30000 ₫</td>
                    </tr>
                    <tr>
                        <th colspan="5" align="right">Tổng cộng:</th>
                        <td>5999999 ₫</td>
                    </tr>
                    <tr align="left"><td colspan="6"><i>(*) Giá trên đã bao gồm thuế VAT</i></td></tr>
                </table>
            </div>
            <div class="invoice-footer">
                <div class="invice-footer__thanks">Cảm ơn bạn đã đặt hàng!</div>
                <div class="chuky">
                    <p class="chuky-kháchhang">
                        KHÁCH HÀNG<br>
                        (Ký, ghi rõ họ tên)
                    </p>
                    <p class="chuky-nhanvien">
                        NGƯỜI BÁN <br>
                        (Ký, ghi rõ họ tên)
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<style>
*{ font-family: DejaVu Sans !important;}
    .main {
        width: 100%;
    }
    .invoice-container {
        width: 50%;
        display: flex;
        flex-direction: column;
        margin: auto;
        justify-content: center;
        padding: 60px 100px;
        border: 1px #000 solid;
    }
    .invoice-header {
        display: flex;
        justify-content: space-between;
    }
    .invoice-content {
        width: 100%;
        padding: 16px 0;
    }
    .table1 {
        width: 100%;
        /* text-align: center; */
        border: none;
    }
    .table2 {
        width: 100%;
        text-align: center;
    }
    table, td, th {
        border: 1px #000 solid
        border-collapse: collapse;
        /* padding: 0 10px 10px 10px; */
    }
    /* table, td, th {
        border: 1px solid #000;
        border-collapse: collapse;
    } */
    .border-top {
        border-top: 1px #ccc solid;
    }
    .invoice-footer {
        width: 100%;
        padding:  0 10px;
    }
    .chuky {
        /* width: 60%; */
        display: flex;
        justify-content: space-between;
        margin: auto;
    }
    .alighn-right {
        text-align: right;
    }
</style>';

// reference the Dompdf namespace
require_once 'dompdf/autoload.inc.php';


use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('hoadon.pdf', Array("Attachment" => 0));
?>
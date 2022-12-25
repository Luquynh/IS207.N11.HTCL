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
                <table width="100%">
                    <tr> 
                        <td>
                        <span><strong>CỬA HÀNG ĐỒNG HỒ CURNON</srong></span><br>
                        <span>CN1: 33 Hàm Long, Hoàn Kiếm.<br>
                            CN2: 9 B7 Phạm Ngọc Thạch, Đống Đa.<br>
                            CN3: 173C Kim Mã, Ba Đình.<br>
                            
                            Email: buivanthuan1608@gmail.com<br>
                            SĐT: 0327437343
                        </span>
                        </td>
                        <td align="right">
                            <h3>HÓA ĐƠN BÁN HÀNG</h3>
                            <span>Mã đơn hàng: #15</span><br>
                            <span>Ngày tạo: 24/12/2022</span><br>
                            <span>Ngày in: 24/12/2022</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="invoice-content">
                <table class="border-top table1" width="100%">
                    <tr><td colspan="2"><strong>THÔNG TIN KHÁCH HÀNG #15</strong></td></tr>
                    <tr>
                        <td align="left" width="35%">Tên khách hàng: </td>
                        <td>Bùi Văn Thuận</td>
                    </tr>
                    <tr>
                        <td  align="left">Số điện thoại: </td>
                        <td>0327437343</td>
                    </tr>
                    <tr>
                        <td  align="left">Email: </td>
                        <td>buivanthuan1608@gmail.com</td>
                    </tr>
                    <tr>
                        <td  align="left">Địa chỉ giao hàng: </td>
                        <td>Ấp Bình Huề 1, Xã Mỹ Thái, Huyện Lạng Giang, Tỉnh Bắc Giang</td>
                    </tr>
                    <tr>
                        <td  align="left">Hình thức thanh toán: </td>
                        <td>Thanh toán khi nhận hàng (COD)</td>
                    </tr>
                </table>
    
                <table class="table2 border-top" border="1" cellpadding="10" cellspacing="0">
                    <tr align="left"><td colspan="6" ><strong>THÔNG TIN ĐƠN HÀNG #15</strong></td></tr>
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
                        <td>silver/44MM</td>
                        <td>1999000₫</td>
                        <td>3</td>
                        <td align="right">5999999₫</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Curnon</td>
                        <td>silver/44MM</td>
                        <td>1999000₫</td>
                        <td>3</td>
                        <td align="right">5999999₫</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Curnon</td>
                        <td>silver/44MM</td>
                        <td>1999000₫</td>
                        <td>3</td>
                        <td align="right">5999999₫</td>
                    </tr>
    
                    <!-- Tổng cộng -->
                    <tr>
                        <th colspan="5" align="right" >Tạm tính:</th>
                        <td align="right">5999999₫</td>
                    </tr>
                    <tr>
                        <th colspan="5" align="right">Phí ship:</th>
                        <td align="right">30000₫</td>
                    </tr>
                    <tr>
                        <th colspan="5" align="right">Tổng cộng:</th>
                        <td align="right">5999999₫</td>
                    </tr>
                    <tr align="left"><td colspan="6"><i>(*) Giá trên đã bao gồm thuế VAT</i></td></tr>
                </table>
            </div>
            <div class="invoice-footer" style="font-size: 16px;">
                <strong>Cảm ơn bạn đã đặt hàng!!</strong>
                <table width="100%">
                    <tr>
                        <td width="50%" align="center">Khách hàng <br>(Kí, ghi rõ họ tên)</td>
                        <td width="50%" align="center">Người bán <br>(Kí, ghi rõ họ tên)</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<style>
    *{ font-family: DejaVu Sans !important;}
    body {
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }
    .main {
        width: 100%;
    }
    .invoice-container {
        width: 100%;
        padding: 16px;

    }
    .invoice-header {
        display: flex;
        justify-content: space-between;
    }
    .invoice-content {
        width: 100%;
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
        // border: 1px #000 solid
        border-collapse: collapse;
    }
    table {
        padding-top: 4px;
        margin-bottom: 16px;
    }
    .border-top {
        border-top: 1px #ccc solid;
    }
    .invoice-footer {
        width: 100%;
        padding:  0 10px;
    }
</style>';

// reference the Dompdf namespace
require_once 'dompdf/autoload.inc.php';


use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
//portrait Landscape
$dompdf->setPaper('A4', 'portrait ');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('hoadon.pdf', Array("Attachment" => 0));
?>
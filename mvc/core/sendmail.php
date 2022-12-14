<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/Exception.php";
require_once "PHPMailer/src/SMTP.php";



function sendinfororder($email, $subject, $body, $img_array){
    $mail = new PHPMailer(true);  
    
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'buivanthuan1608@gmail.com';                 // SMTP username
    $mail->Password = 'ockqprqutqxudcyd';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;  
    
    $mail->setFrom('buivanthuan1608@gmail.com', 'Admin Curnon');
    $mail->addAddress($email);

    $mail->isHTML(true);      
    $subject= "=?utf-8?b?".base64_encode($subject)."?=";                            // Set email format to HTML
                            
    $mail->Subject = $subject;
    for($i = 0; $i < count($img_array); $i++){
        $mail->AddEmbeddedImage('public/client/assets/img/'.$img_array[$i], $img_array[$i]); 
    }

    $mail->Body = $body;
    $mail->send();
}

function sendcontactus($name, $phone, $email, $message){
    $mail = new PHPMailer(true);  
    
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'buivanthuan1608@gmail.com';                 // SMTP username
    $mail->Password = 'ockqprqutqxudcyd';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;  
    
    $mail->setFrom('buivanthuan1608@gmail.com', 'Admin Curnon');
    $mail->addAddress('buivanthuan1608@gmail.com');

    $mail->isHTML(true);      
    $subject= "=?utf-8?b?".base64_encode('From Contact Us')."?=";                            // Set email format to HTML
                            
    $mail->Subject = $subject;

    $html = '
    <table>
        <tr>
            <th><td><strong>T??n kh??ch h??ng: </strong></td></th>
            <td>'.$name.'</td>
        </tr>
        <tr>
            <th><td><strong>S??? ??i???n tho???i: </strong></td></th>
            <td>'.$phone.'</td>
        </tr>
        <tr>
            <th><td><strong>Email: </strong></td></th>
            <td>'.$email.'</td>
        </tr>
        <tr>
            <th><td><strong>Message: </strong></td></th>
            <td>'.$message.'</td>
        </tr>
    
    </table>';

    $mail->Body = $html;
    $mail->send();
}

function sendpass($email,$name, $pass){
    $mail = new PHPMailer(true);  
    
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'buivanthuan1608@gmail.com';                 // SMTP username
    $mail->Password = 'ockqprqutqxudcyd';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;  
    
    $mail->setFrom('buivanthuan1608@gmail.com', 'Admin Curnon');
    $mail->addAddress($email);

    $mail->isHTML(true);      
    $subject= "=?utf-8?b?".base64_encode('Kh??i ph???c m???t kh???u')."?=";                            // Set email format to HTML
                            
    $mail->Subject = $subject;

    $body = '<h3>Xin ch??o '.$name.',<br>M???t kh???u t??i kho???n c???a b???n ???? ???????c thay ?????i!!</h3>
            <p style="font-size: 14px;">M???t kh???u hi???n t???i l?? <span style="color: red; font-size: 20px; padding: 10px; font-weight: 600;">'.$pass.'</span></p>
            <p style="font-size: 12px;"><i>(*) Vui l??ng ?????i m???t kh???u n??y trong v??ng 30 ng??y ????? ?????m b???o t??nh b???o m???t!';       
    $mail->Body = $body;
    $mail->send();
}

//G???i mail spam qu??ng c??o
function sendmailspam($email,$tieude, $content, $img){
    $mail = new PHPMailer(true);  
    
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'buivanthuan1608@gmail.com';                 // SMTP username
    $mail->Password = 'ockqprqutqxudcyd';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;  
    
    $mail->setFrom('buivanthuan1608@gmail.com', 'Admin Curnon');
    $mail->addAddress($email);
    

    $mail->isHTML(true);      
    $subject= "=?utf-8?b?".base64_encode($tieude)."?=";                            // Set email format to HTML
                            
    $mail->Subject = $subject;
    $mail->AddEmbeddedImage('public/client/assets/img/'.$img, $img);
    $body = $content;       
    $mail->Body = $body;
    $mail->send();
}
function sendmailstatus($email, $status, $id_order){
    $mail = new PHPMailer(true);  
    
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'buivanthuan1608@gmail.com';                 // SMTP username
    $mail->Password = 'ockqprqutqxudcyd';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;  
    
    $mail->setFrom('buivanthuan1608@gmail.com', 'Admin Curnon');
    $mail->addAddress($email);

    $mail->isHTML(true);      
    
    if ($status == 0){
        $subject = 'Th??ng b??o h???y ????n h??ng #'.$id_order;
        $subject= "=?utf-8?b?".base64_encode($subject)."?=";                            // Set email format to HTML
                                
        $mail->Subject = $subject;
        $html= '<h3>M?? ????N H??NG #'.$id_order.'</h3>
                        <p>????n h??ng #'.$id_order.' c???a b???n ???? b??? h???y. <br><br>
                        N???u mu???n ?????t l???i ????n h??ng n??y vui l??ng truy c???p trang web ho???c li??n h??? qua email v?? s??? ??i???n tho???i c???a ch??ng t??i.<br>
                        ' ;
        $mail->Body = $html;
        $mail->send();
    } else if ($status == 5){
        $subject = 'X??c nh???n giao h??ng cho ????n h??ng #'.$id_order;
        $subject= "=?utf-8?b?".base64_encode($subject)."?=";                            // Set email format to HTML
                                
        $mail->Subject = $subject;
        $html= '<h3>M?? ????N H??NG #'.$id_order.'</h3>
                        <p>????n h??ng #'.$id_order.' c???a b???n ???? ???????c x??? l?? v?? s???n s??ng ????? v???n chuy???n. <br><br>
                        C??c s???n ph???m trong ????n h??ng c???a b???n ???? s???n s??ng ????? ???????c v???n chuy???n, t??nh h??nh hi???n t???i c?? th??? m???t nhi???u h??n th???i gian v???n chuy???n giao h??ng, b???n h??y ki??n nh???n v?? gi??? g??n s???c kh???e nh?? ^^.<br><br>
                        Tr???ng th??i ????n h??ng: <strong>?????t h??ng th??nh c??ng.</strong>
                        </p>' ;
        $mail->Body = $html;
        $mail->send();
    } else if ($status == 2){
        $subject = 'C???p nh???t tr???ng th??i cho ????n h??ng #'.$id_order;
        $subject= "=?utf-8?b?".base64_encode($subject)."?=";                            // Set email format to HTML
                                
        $mail->Subject = $subject;
        $html= '<h3>M?? ????N H??NG #'.$id_order.'</h3>
                        <p>????n h??ng #'.$id_order.' c???a b???n ???? ???????c c???p nh???t tr???ng th??i. <br><br>
                        Tr???ng th??i ????n h??ng: <strong>???? ????ng g??i.</strong>
                        </p>';
        $mail->Body = $html;
        $mail->send();
    } else if ($status == 3){
        $subject = 'C???p nh???t tr???ng th??i cho ????n h??ng #'.$id_order;
        $subject= "=?utf-8?b?".base64_encode($subject)."?=";                            // Set email format to HTML
                                
        $mail->Subject = $subject;
        $html= '<h3>M?? ????N H??NG #'.$id_order.'</h3>
                <p>????n h??ng #'.$id_order.' c???a b???n ???? ???????c c???p nh???t tr???ng th??i. <br><br>
                Tr???ng th??i ????n h??ng: <strong>??ang v???n chuy???n.</strong>
                </p>';
        $mail->Body = $html;
        $mail->send();
    } else if ($status == 4){
        $subject = 'C???p nh???t tr???ng th??i cho ????n h??ng #'.$id_order;
        $subject= "=?utf-8?b?".base64_encode($subject)."?=";                            // Set email format to HTML
                                
        $mail->Subject = $subject;
        $html= '<h3>M?? ????N H??NG #'.$id_order.'</h3>
                <p>????n h??ng #'.$id_order.' c???a b???n ???? ???????c c???p nh???t tr???ng th??i. <br><br>
                Tr???ng th??i ????n h??ng: <strong>???? thanh to??n.</strong>
                </p>';
        $mail->Body = $html;
        $mail->send();
    } 
    
}
?>
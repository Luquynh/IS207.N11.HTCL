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
            <th><td><strong>Tên khách hàng: </strong></td></th>
            <td>'.$name.'</td>
        </tr>
        <tr>
            <th><td><strong>Số điện thoại: </strong></td></th>
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
    $subject= "=?utf-8?b?".base64_encode('Khôi phục mật khẩu')."?=";                            // Set email format to HTML
                            
    $mail->Subject = $subject;

    $body = '<h3>Xin chào '.$name.',<br>Mật khẩu tài khoản của bạn đã được thay đổi!!</h3>
            <p style="font-size: 14px;">Mật khẩu hiện tại là <span style="color: red; font-size: 20px; padding: 10px; font-weight: 600;">'.$pass.'</span></p>
            <p style="font-size: 12px;"><i>(*) Vui lòng đổi mật khẩu này trong vòng 30 ngày để đảm bảo tính bảo mật!';       
    $mail->Body = $body;
    $mail->send();
}

//Gửi mail spam quãng cáo
function sendmailspam($email_arr,$tieude, $content, $img){
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
    for($i = 0; $i < count($email_arr); $i ++){
        $mail->addAddress($email_arr[$i]);
    }

    $mail->isHTML(true);      
    $subject= "=?utf-8?b?".base64_encode($tieude)."?=";                            // Set email format to HTML
                            
    $mail->Subject = $subject;
    $mail->AddEmbeddedImage('public/client/assets/img/'.$img, $img);
    $body = $content;       
    $mail->Body = $body;
    $mail->send();
}
?>
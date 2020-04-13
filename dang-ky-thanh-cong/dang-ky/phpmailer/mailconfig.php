<?php
include('phpmailer.php');
define('GUSER', 'relayAA@aprotrain.com'); // tài khoản đăng nhập Gmail
define('GPWD', 'zxcde321qa'); // mật khẩu cho cái mail này


function smtpmailer($to, $from, $from_name, $subject, $body) {
    $mail = new PHPMailer(true);  // tạo một đối tượng mới từ class PHPMailer
    $mail->IsSMTP(); // bật chức năng SMTP
    $mail->SMTPDebug = false;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
    $mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
    //$mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
    $mail->CharSet = 'utf-8';
    //$mail->IsSendmail();
    $mail->Host = 'mail.aprotrain.com';
    $mail->Port = 25;
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->From = $from;
    $mail->FromName = $from_name;
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $mail->AddAddress($to);
    $mail->IsHTML(true);
    if(!$mail->Send()) {
        return false;
    } else {
    		$mail->SmtpClose();
        return true;
    }
}
?>
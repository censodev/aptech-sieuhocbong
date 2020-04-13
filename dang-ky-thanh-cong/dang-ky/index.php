<?php

header('Content-Type: application/json');

$name = "";
$phone = "";
$subject = "Đăng Ký Tuyển sinh thêm cho bạn!";
$response = array(
    'status' => false,
    'message' => 'An error occured...'
);

if (isset($_POST['txtName'])) {
    $name = $_POST['txtName'];
}

if (isset($_POST['txtPhone'])) {
    $phone = $_POST['txtPhone'];
}

if (isset($_POST['subjectmail'])) {
    $subject = $_POST['subjectmail'];
}

if ($name!='' && $phone!='')
{
    $response = array(
        'status' => true,
        'message' => 'OK'
    );

    $date=date('Y-m-d',time());

    $content ='<ul>'.
                '	<li>Họ và tên: <b>'.$name.'</b></li>'.
                '	<li>Điện thoại: <b>'.$phone.'</b></li>'.
                '   <li>Ngày đăng ký: <b>'.date("d-m-Y h:i:s", time()).'</b></li>'.
                '</ul>'.
    //echo $content;
    $from = 'relayAA@aprotrain.com';

    $from_name  = $name;
    $center     = 'aptech2@aprotrain.com';
    include 'phpmailer/mailconfig.php';

    smtpmailer($center, $from, $from_name, $subject, $content);
    smtpmailer("tam.nt@aprotrain.com", $from, $from_name, $subject, $content);
    


    $myfile = fopen("data.csv", "a");
    if ($myfile){
        fputcsv($myfile, array($name, $phone, $center, date("d-m-Y h:i:s", time())));
        fclose($myfile);
    }
}

echo json_encode($response);
?>
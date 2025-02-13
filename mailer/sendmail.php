<?php
$ht = $_GET['your-name'];
$email = $_GET['your-email'];
$id = $_GET['sid'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php'; //
require 'PHPMailer-master/src/PHPMailer.php'; //kết nối với PHPMailer-master - thư viện PHP để sử dụng email
require 'PHPMailer-master/src/SMTP.php';      //

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Quy định gửi mail bằng SMTP
    $mail->Host       = 'smtp.gmail.com';                     //cấu hình mail
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ducdz1282003@gmail.com';                     //tk google
    $mail->Password   = 'nqxa mucp vhqy llza';                        //SMTP password // lưu ý là: mật khẩu ứng dụng trong -> bảo mật 2 lớp -> trong quản lí tk google
    $mail->SMTPSecure = 'tls';                 //giao thức bảo mật SSL/TLS cho kết nối SMTP
    $mail->Port       = 587;                                    //cổng

    //Recipients
    $mail->setFrom('ducdz1282003@gmail.com', 'Hatoyama');           //Người gửi
    $mail->addAddress($email, $ht);                 //Người nhận

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'HATOYAMA - Xác nhận đặt bàn từ quý khách ' . $ht;
    $mail->Body    = '
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="UTF-8">
        <title>Đặt bàn tại nhà hàng Hatoyama</title>
      </head>
      <body style="background-color: #000000; background-image: url(&quot;https://hatoyama.vn/wp-content/themes/apps/images/background.png&quot;); font-family: Arial; text-align: center;">
        <div style="background-color: transparent; width: 400px; margin: auto; padding: 20px; border-radius: 6px; box-shadow: 0px 0px 10px #cccccc;">
          <h1 style="color: red;">Sushi restaurant - Hatoyama</h1>
          <p style="margin-bottom: 30px;color: white">Chào quý khách!<br>
          Quý khách xin vui lòng bấm vào nút xác nhận để hoàn tất việc đặt bàn.</p> 
          <a href="http://localhost:8080/WEB/mailer/xacnhan.php?sid='. $id .'" style="background-color: red; color: white; padding: 12px 24px; border-radius: 6px; text-decoration: none;">Đặt bàn ngay !</a>
        </div>
      </body>
    </html>
    ';
    $mail->AltBody = 'Xin vui lòng xác nhận lần nữa';

    $mail->send();
    echo 'Đã gửi mail';

    header("Location: ../Trangchu/datBan.html");

} catch (Exception $e) {
    echo "Không thể gửi mail. Mailer Error: {$mail->ErrorInfo}";
}
?>
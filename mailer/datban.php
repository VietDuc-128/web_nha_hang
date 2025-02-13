<?php
    session_start();
    $ht = $_POST['your-name'];
    $email = $_POST['your-email'];
    $sdt = $_POST['text-246-sdt'];
    $songuoi = $_POST['text-924-so-nguoi'];
    $date = $_POST['date-260-ngay-dat-ban'];
    $time = $_POST['menu-875'];
    $info = $_POST['menu-choncs'];
    $orther = $_POST['your-message'];

    if(!isset($_SESSION['user'])) {
        // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
        $_SESSION['error'] = "Bạn cần phải đăng nhập để thực hiện chức năng này";
        header("Location: ../TrangChu/datBan.html");
        exit();
    }
    require_once 'ketnoidb.php';

    $datban_sql = "INSERT INTO quanli_datban(hoten, email, sdt, songuoi, ngay, gio, diachi, orther) 
                        VALUE('$ht','$email','$sdt','$songuoi','$date','$time','$info','$orther')";

    if(mysqli_query($conn, $datban_sql)){

    $id = mysqli_insert_id($conn); // lấy dữ liệu mới nhất được cập nhật trong csdl

    header("Location: sendmail.php?your-name=$ht&your-email=$email&sid=$id");
    };                

?>
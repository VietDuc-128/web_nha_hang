<?php
if(isset($_GET['sid'])){ //kiểu tra dữ liệu đc truyền vào chưa
$sid = $_GET['sid']; 

require_once 'ketnoidb.php';

$xacnhan_sql = "UPDATE quanli_datban SET xacnhan = 'Đã xác nhận' WHERE id = $sid";

if(mysqli_query($conn, $xacnhan_sql)){
    
    echo "
    <div style='background-color: black; background-image: url(&quot;https://hatoyama.vn/wp-content/themes/apps/images/background.png&quot;); color: #fff; text-align: center; padding: 20px;'>
    <h1>Chúc Ngon Miệng!</h1>
    <p style='color: #000;'>Chúc quý khách ngon miệng.</p>
    <a href='../Trangchu/index.html' style='color: red; text-decoration: none;'>Quay về Trang chủ</a>
    </div>
    ";
    
}
else{
    echo "dữ liệu lỗi";
}
}
else{
    echo "dữ liệu không được truyền vào";
}
?>

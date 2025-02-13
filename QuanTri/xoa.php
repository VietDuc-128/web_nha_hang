<?php
require_once "ketnoidb.php";
// Tạo biến để lấy id
$id = $_GET["sid"];
// Truy vấn
$delete = "DELETE FROM quanli_datban WHERE id = '$id' ";
// THực thi
$del_sql = mysqli_query($conn, $delete);
if($del_sql == true) {
    header("location: thongtinKH.php");
}

?>
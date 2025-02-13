<?php
require_once 'ketnoidb.php';
session_start();
if(!isset($_SESSION['admin'])) {
    // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
    $_SESSION['error'] = "Bạn cần phải đăng nhập để thực hiện chức năng này";
    header("Location: index.php");
    exit();
}
// Kiểm tra xem biểu mẫu đã được gửi đi hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $title = isset($_POST['inputnews']) ? $_POST['inputnews'] : '';
    $content = isset($_POST['inputinfo']) ? $_POST['inputinfo'] : '';
    $start_date = isset($_POST['date-start']) ? $_POST['date-start'] : '';

    // Kiểm tra xem có tệp hình ảnh được tải lên hay không
    if (isset($_FILES["image"]) && isset($_FILES["image"]["error"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["image"]["tmp_name"];
        $name = $_FILES["image"]["name"];
        $path = "../img/" . $name;
        move_uploaded_file($tmp_name, $path);
    } else {
        // Xử lý khi không có tệp hình ảnh được tải lên
        echo 'Không có hình ảnh';
        // Thực hiện xử lý phù hợp hoặc dừng quá trình thêm dữ liệu
        exit;
    }

    // Tạo truy vấn INSERT để chèn dữ liệu vào bảng
    $sql = "INSERT INTO news (title, content, start_date, image_path)
            VALUES ('$title', '$content', '$start_date', '$path')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Thêm tin tức thành công " ;
        header("Location: tintuc.php"); 
    } else {
        $_SESSION['error'] = "Lỗi " ;
        header("Location: tintuc.php"); 
    }

    // Đóng kết nối tới cơ sở dữ liệu
    $conn->close();
}

<?php
// Start or resume the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();
session_start();

$_SESSION['message'] = "Đăng xuất thành công";
// Redirect to the homepage
header("Location: ../TrangChu/index.html");
exit();
?>

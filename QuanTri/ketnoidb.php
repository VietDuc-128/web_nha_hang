<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";
 
// Tạo kết nối
$conn = new mysqli("localhost", "root", "", "test");


// $sql1 = "CREATE TABLE User (
//      id INT(6) AUTO_INCREMENT PRIMARY KEY,
//      userName varchar(30) not null,
//      password varchar(255) not null,
//      role varchar(20) not null,
//      email varchar(50) not null,
//      hoTen varchar(30) not null)";

//   $sql2 = "CREATE TABLE news (
//       id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
//       title varchar(255) NOT NULL,
//       content text NOT NULL,
//       start_date date NOT NULL,
//       image_path varchar(255) NOT NULL)";

//  $sql3 = "CREATE TABLE quanli_datban (
//      id int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
//      hoten varchar(50) NOT NULL,
//      email varchar(50) NOT NULL,
//      sdt int(12) NOT NULL,
//      songuoi int(12) NOT NULL,
//      ngay date NOT NULL,
//      gio varchar(10) NOT NULL,
//      diachi varchar(50) NOT NULL,
//      orther varchar(100) NOT NULL,
//      xacnhan varchar(20) NOT NULL)";

//    $sql4 = "CREATE TABLE news2 (
//        id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
//        title varchar(255) NOT NULL,
//        content text NOT NULL,
//        start_date date NOT NULL,
//        image_path varchar(255) NOT NULL)";

//   mysqli_query($conn, $sql1);
//   mysqli_query($conn, $sql2);
//   mysqli_query($conn, $sql3);
//   mysqli_query($conn, $sql4);
?>
<?php 
session_start();
include('../QuanTri/message.php');
include('../QuanTri/error.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HATOYAMA</title>
    <!-- Web app manifest -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"  href="../css/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </head>
  <body id="top">
    <header>
      <div class="bg-black">
        <div class="container px-0">
          <a class="navbar-logo  pulse" href="#">
            <img src="../assets//header-footer/logo-bg.png" >
          </a>
          <nav class="navbar navbar-light bg-black px-0" style="height: 95px;">
            
            <a class="nav-link" href="index.html" style="padding-left: 250px;">TRANG CHỦ </a>
            <a  href="gioiThieu.html" >
              GIỚI THIỆU
            </a>
            <div class="dropdown">
              <a>
                MENU
              </a>
              <ul class="dropdown-menu bg-black" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="heThongTaiHaNoi.html">MENU TẠI HÀ NỘI</a></li>
                <li><a class="dropdown-item" href="heThongTaiDienBienPhu.html">MENU HATOYAMA ĐIỆN BIÊN PHỦ</a></li>
                <li><a class="dropdown-item" href="heThongTaiHaLong.html">MENU HATOYAMA HẠ LONG</a></li>
              </ul>
            </div>
            <a class="nav-link" href="monDacSac.html">MÓN ĂN ĐẶC SẮC</a>
            <a class="nav-link" href="doiNgu.html">ĐỘI NGŨ</a>
            <a class="nav-link" href="tinTuc.php">TIN TỨC</a>
            <a class="nav-link" href="uuDai.php">ƯU ĐÃI</a>
            <a class="nav-link" href="datBan.html">ĐẶT BÀN</a>
            <?php
              // Check if the user is logged in (you need to adapt this condition based on your authentication logic)
             
              $isLoggedIn = isset($_SESSION['user']);
              if ($isLoggedIn) {
                  // User is logged in, display logout button
                  echo '<a href="../QuanTri/logout.php">Logout</a>';
              } else {
                  // User is not logged in, display the user icon
                  echo '<a href="../QuanTri/index.php">
                          <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512" style="display: block; color: red; fill: #ccc !important;">
                              <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                          </svg>
                        </a>';
              }
              ?>
          </nav>
        </div>
      </div>
      <div class="bg-banner" >
        <div class="container" >
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block"  src="../assets/header-footer/slideshow/sl1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block " src="../assets/header-footer/slideshow/sl2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block " src="../assets//header-footer/slideshow/sl3-ok.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="display: none;">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="display: none;">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </header>
  </body>
</html>

<style>
  a{
    color: #fff !important;
  }

  
</style>
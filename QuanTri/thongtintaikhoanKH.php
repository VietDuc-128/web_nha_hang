<?php  
session_start();
if(!isset($_SESSION['admin'])) {
    // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
    $_SESSION['error'] = "Bạn cần phải đăng nhập để thực hiện chức năng này";
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/css.css">
    <title>SuShi Restaurant - News</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <?php
        require_once "ketnoidb.php";
    ?>
    
</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="main.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-bowl-food"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SuShi Restaurant</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="main.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang chủ</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Cài đặt
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Chỉnh Sửa</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cài đặt Trang Web:</h6>
                        <a class="collapse-item" href="tintuc.php">Tin tức</a>
                        <a class="collapse-item" href="uudai.php">Ưu đãi</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-user"></i>
                    <span>Thông tin</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Theo dõi:</h6>
                        <a class="collapse-item" href="thongtinKH.php">Thông tin khách hàng</a>
                        <a class="collapse-item" href="thongtintaikhoanKH.php">Thông tin tài khoản KH</a>
                        
                    </div>
                </div>
            </li>

            

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                          <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng Xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    <h1 class="h3 mb-2 text-gray-800">THÔNG TIN TÀI KHOẢN KHÁCH HÀNG</h1>
                    

                    <div class="card shadow mb-4">
                      <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>
                                                <form action="thongtintaikhoanKH.php" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                    <div style="margin-bottom: 10px" class="input-group">
                                                        <input name="search" type="text" class="form-control bg-light border-0 small" placeholder="Tìm Kiếm"
                                                            aria-label="Search" aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div>
                                                <?php
                                                  if(isset($_POST['search'])) {
                                                    $search = $_POST["search"];
                                                    
                                                    if(empty($search)) {
                                                        echo "Vui lòng nhập từ khóa tìm kiếm.";
                                                    } else {
                                                        $sql = "SELECT * FROM quanli_datban WHERE hoten LIKE '%$search%'"; 
                                                        $result = mysqli_query($conn, $sql); 
                                                        $count = mysqli_num_rows($result);
                                                
                                                        if ($count == 0) {
                                                            echo "Không có giá trị nào được tìm thấy.";
                                                        } else {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo $row["id"]." - ".$row["hoten"]." - ".$row["email"]." - ".$row["sdt"]."<br>";
                                                            }
                                                            mysqli_free_result($result);
                                                        }
                                                    }
                                                }
                                                  ?>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>

                                   
                                </table>
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th class="d-none">STT</th>
                                            <th>Tài Khoản</th>
                                            <th>Mật Khẩu (đã mã hóa)</th>
                                            <th>Thao Tác</th>
                                         </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                                    $result = mysqli_query($conn, 'select count(id) as hoten from user');
                                    $row = mysqli_fetch_assoc($result);
                                    $total_records = $row['hoten'];
                                    
                                    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $limit = 3;
                                    
                                    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                                    // tổng số trang
                                    $total_page = ceil($total_records / $limit);
                                    
                                    // Giới hạn current_page trong khoảng 1 đến total_page
                                    if ($current_page > $total_page){
                                        $current_page = $total_page;
                                    }
                                    else if ($current_page < 1){
                                        $current_page = 1;
                                    }
                                        
                                        $start = ($current_page - 1) * $limit;
                                        
                                        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
                                        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                                        $result = mysqli_query($conn, "SELECT * FROM user LIMIT $start, $limit");

                                        // PHẦN HIỂN THỊ TIN TỨC
                                        // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
                                        while($row = mysqli_fetch_assoc($result)){
                                        echo "<tr>
                                            <td>" . $row['userName'] . "</td>
                                            <td>" . $row['password'] . "</td>
                                            <td><a href='xoa.php?sid=". $row['id'] ."' class='btn btn-danger'>Xóa</a></td>
                                            </tr>";
                                        }
                                        ?>
                                        

                                    </tbody>
                                </table>
                                <div class="pagination">
                                <?php

                                        if ($current_page > 1 && $total_page > 1){
                                            echo '<a class="btn btn-outline-secondary" href="thongtinKH.php?page='.($current_page-1).'">Prev</a> ';
                                        }
                                        
                                        // Lặp khoảng giữa
                                        for ($i = 1; $i <= $total_page; $i++){
                                            // Nếu là trang hiện tại thì hiển thị thẻ span
                                            // ngược lại hiển thị thẻ a
                                            if ($i == $current_page){
                                                echo '<span class="btn btn-outline-secondary ">'.$i.'</span> ';
                                            }
                                            else{
                                                echo '<a class="btn btn-outline-secondary " href="thongtinKH.php?page='.$i.'">'.$i.'</a> ';
                                            }
                                        }
                                        
                                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                        if ($current_page < $total_page && $total_page > 1){
                                            echo '<a class="btn btn-outline-secondary " href="thongtinKH.php?page='.($current_page+1).'">Next</a> ';
                                        }
                                                ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SuShi Restaurant Website 2023 - By Duc</span>
                    </div> 
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chắc chắn thoát ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn Đăng xuất để đăng xuất.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="index.php">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/chart.js/Chart.min.js"></script>

    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
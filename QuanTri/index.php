<?php  
session_start();
require 'ketnoidb.php';

// if (isset($_SESSION['user'])) {
//     header("Location: ../TrangChu/index.html");
//     exit();
// }

if (isset($_POST['login'])) {
    if ($_POST['password'] && $_POST['username']) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM User WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashedPasswordFromDB = $row['password'];

            if (password_verify($password, $hashedPasswordFromDB)) {
                $_SESSION['message'] = "Đăng nhập tài khoản thành công";
                if ($row['role'] == 'admin') {
                    $_SESSION['admin'] = $row; 
                    header("Location: main.php"); 
                } else {
                    $_SESSION['user'] = $row; 
                    header("Location: ../TrangChu/index.html"); 
                }
                exit();
            } else {
                $_SESSION['error'] = $hashedPasswordFromDB;
            }
        } else {
            $_SESSION['error'] = "Sai tên đăng nhập";
        }
    }
}
?>



<?php include('message.php') ?>
<?php include('error.php') ?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SuShi Restaurant</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

       
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Chào mừng trở lại!</h1>
                                    </div>
                                    <form class="user" action="index.php" method="post">
                                        <div class="form-group">
                                            <input  class="form-control form-control-user"
                                                name="username"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" minlength="6"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small" style>
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ghi nhớ cho lần đăng nhập tiếp theo</label>
                                               
                                            </div>
                                        </div>
                                            <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                                Đăng Nhập
                                            </button>
                                            <a href="signUp.php" class="btn btn-primary btn-user btn-block">
                                                Đăng Ký
                                            </a>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    
    <script src="js/sb-admin-2.min.js"></script>

</body>


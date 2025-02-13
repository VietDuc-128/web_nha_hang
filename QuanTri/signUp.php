<?php
session_start();

require 'ketnoidb.php';

if (isset($_POST['register'])) {
    if ($_POST['password'] == $_POST['checkPassword'] && strlen($_POST['password']) >= 6) {
        $username = $_POST['username'];
        if(str_contains($username,' '))
        {
            $_SESSION['error'] = "Tên đăng nhập không được có ký tự đặc biệt";
            header("Location: signUp.php"); 
            exit();
        }

        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "SELECT * FROM User WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows==1){
            $_SESSION['error'] = "Trùng tên đăng nhập";
            header("Location: signUp.php"); 
            exit();
        }
        $query = "INSERT INTO User (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $hashedPassword);
        
        if ($stmt->execute()) {
            $_SESSION['message'] = "Đăng ký tài khoản thành công";
            header("Location: signUp.php"); 
            exit();
        } else {
            $_SESSION['error'] = "Đăng ký tài khoản thất bại";
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Mật khẩu xác nhận không khớp";
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản</h1>
                                    </div>
                                    <form class="user" action="signUp.php" method="post">
                                        <div class="form-group">
                                            <input class="form-control form-control-user" 
                                                name="username"
                                                placeholder="Nhập tên đăng nhập">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" minlength="6"
                                                id="exampleInputPassword" placeholder="Nhập mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="checkPassword" minlength="6" 
                                                id="exampleInputPassword" placeholder="Nhập mật khẩu xác nhận">
                                        </div>
                                            <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                                                Đăng Ký
                                            </button>
                                            <a href="index.php" class="btn btn-primary btn-user btn-block">
                                                Đăng Nhập
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

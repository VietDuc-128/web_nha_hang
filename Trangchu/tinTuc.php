<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức | Nhà hàng nhật bản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/path/to/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="icon" href="https://hatoyama.vn/wp-content/uploads/2018/12/favicon-hato.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet"  href="./css/navbar.css">
    <link rel="stylesheet" href="../css/content.css">
        <style>
        body { 
            background-repeat: repeat; 
            background-position: top left; 
            background-attachment: scroll; 
        }
        h4{
            width: 100%;
            height: 40px;
            background-color: #d00101;
            font-family:Arial, Helvetica, sans-serif;
            padding-top: 5px;
        }
        .tintuc{
            width: 100%;
            height: 350px;
            background-color: white;
            margin-bottom: 20px;
        }
        .anh{
            width: 30%;
            position: relative;
        }
        .noi_dung{
            width: 60%;
        }
        .dcm-duc-code-css-nhu-shit img{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        p{
            font-size: 14;
            font-family: 'Times New Roman', Times, serif;
        }
       
        a{
            font-size: 14;
            font-family: 'Times New Roman', Times, serif;
        }
        .right-up-content{
            width: 200px;
            height: 110px;
            background-color: black;
            
        }
        #aside-up-background{
            padding: 7px 0px 0px 15px;
            height: 70px;
            width: 280px;
            background-repeat: no-repeat;
            background-image: url(../assets/trang-chu/img-gioithieu/ribbon.png);
            background-size: 245px;
            font-size: 1rem;
            color: whitesmoke;
        }
        .form-control{
            width: 150px;
            margin: -45px 0px 0px 20px;
            padding: 5px 5px;
            font-size: 13px;
        }
        .right-down-content{
            width: 200px;
            height: 400px;
            background-color: black ;
        }
        #aside-down-background{
            padding: 7px 0px 0px 15px;
            margin: 0px;
            width: 280px;
            height: 70px;
            font-size: 1rem;
            background-size: 245px;
            background-image: url(../assets/trang-chu/img-gioithieu/ribbon.png);
            background-repeat: no-repeat;
            color: whitesmoke;
        }
        .right-down-content ul a{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-decoration: underline;
            color: white;
            font-size: 12px;
            
        }
        .right-down-content ul{
            margin: -5px 5px 0px -10px;
           
        }
        .right-down-content li{
            padding: 0px 0px 10px 0px
        }
    </style>
</head>
<body>  
    <header id="header" ></header>
    <div class="bg-content">
        <div class="container dcm-duc-code-css-nhu-shit" style="display: flex;">
            <div style="display: block; width: 70%;">
                <?php
                require_once 'ketnoidb.php';
                $query = "SELECT * FROM news ORDER BY id DESC ";
                $result = $conn->query($query);
                

                 if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $imagePath = $row["image_path"];
                      echo " <div class='tintuc' style='display: flex;'>
                        <div style='background-color: #fbfde0; border-right: 1px solid #c4c4c4;' class='anh'>
                        <tr> <img width='80%' height='90%' class = 'img' src='" . $imagePath . "' > </tr> <br>
                        </div>
                        <div class= 'noi_dung' style='margin-left: 20px; margin-right: 20px;'>
                            <br>
                                    <h3 style='color: #d00101;'> <td>" . $row['title'] . "</td>  </h3> <br>
                                    <p>" . $row['content'] . " </p> <br>
                                
                            <br>
                        </div>
                    </div>";
                    }}
                            
                ?>
                
                
            </div>
            <div>
                <aside class="right-up-content">
                    <h1 id="aside-up-background">
                        Tìm kiếm
                    </h1>
                    <label for="exampleDataList" class="form-label"></label>
                        <input style="width: 150px;" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Search ...">
                        <datalist id="datalistOptions">
                            <option value="Sushi Nhật Nguyên Chất">
                            <option value="Tôm hùm Nhật">
                            <option value="Cá nóc Hầm">
                            <option value="Đặc Sản Nhật">
                            <option value="Sứa tươi">
                        </datalist>
                </aside>

                <aside class="right-down-content">
                    <h1 id="aside-down-background">
                        Tin mới cập nhật
                    </h1>

                    <ul>
                        <?php 
                        $query = "SELECT * FROM news ORDER BY id DESC ";
                        $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                  echo "<li style='color: white'> <a type='button'>" . $row['title'] ." </a> </li>";
                                }}
                        ?>
                    </ul>
                </aside>


            </div>

        </div>
    </div>

    <footer id="footer"></footer>
    <script src="../main.js"></script>
</body>
</html>
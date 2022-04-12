<?php session_start();
  if(!isset($_SESSION["QuanTri"]) && (!isset($_SESSION["GiaoVien"]) && (!isset($_SESSION["KiemDuyet"]))))
  {
    echo"<script language=javascript>
    window.location='admin/code/login/';
    </script>";
  }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin tức THSP</title>
    <link rel="icon" type="image/x-icon" href="https://thsp.tvu.edu.vn/uploads/logo-tvls-2-1.jpg">
    <!--link boostrap---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--link boxicon--->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!--link google font--->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!---link css--->
    <link rel="stylesheet" href="../templates/CSS/style.css">
    <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>
<body>
<input type="checkbox" name="" id="menu-toggle">
<div class="sidebar">
    <div class="sidebar-container">
        <div class="brand">
            <h2>ADMIN</h2>
        </div>
        <div class="sidebar-avartar">
            <img src="https://thsp.tvu.edu.vn/uploads/logo-tvls-2-1.jpg">
        </div>
        <div class="sidebar-avartar1">
            <div class="img_avr">
                <img src="https://icons.veryicon.com/png/o/miscellaneous/two-color-icon-library/user-286.png" alt="">
            </div>
            <div class="avartar-info">
                <div class="avartar-text">
                    <div class="avt-1">
                    <?php if (isset($_SESSION["QuanTri"])) { ?>
                        
                        <p>Xin chào:</p><h2><?= $_SESSION["QuanTri"]; ?></h2>
                    <?php } elseif(isset($_SESSION["GiaoVien"])) { ?>
                        <p>Xin chào:</p><h2><?= $_SESSION["GiaoVien"]; ?></h2>
                    <?php } else { ?>
                        <p>Xin chào:</p><h2><?= $_SESSION["KiemDuyet"]; ?></h2>
                    <?php } ?>
                    </div>      
                    <a href="../login/logout.php" class="link link--elara">
                        <span>Đăng xuất</span></a>
                  
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="../../../index.php" class="active">
                        <i class="fa-solid fa-house"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>
                <?php if (isset($_SESSION["QuanTri"])) { ?>
                <li>
                    <a href="../../code/QLNews/">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>Quản lý tin tức</span>
                    </a>
                </li>
                <li>
                    <a href="admin/code/account/">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Quản lý tài khoản</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="../../code/permission/">
                        <i class="fa-solid fa-user-lock"></i>
                        <span>Quản lý quyền</span>
                    </a>
                </li> -->
                <li>
                    <a href="#">
                        <i class="fa-solid fa-chart-column"></i>
                        <span>Thống kê</span>
                    </a>
                </li>
                <?php } ?>
                <?php if (isset($_SESSION["GiaoVien"])) { ?>
                <li>
                    <a href="../News/">
                        <i class="fa-solid fa-file-circle-plus"></i>
                        <span>Thêm tin tức</span>
                    </a>
                </li>
                <li>
                    <a href="../account/detail.php">
                        <i class="fa-solid fa-user"></i>
                        <span>Thông tin cá nhân</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isset($_SESSION["KiemDuyet"])){?>
                <li>
                    <a href="../BaiDang/">
                        <i class='bx bxs-news'></i>
                        <span>Quản lý bài đăng</span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="main-content" style="padding-right: 8px;">
    


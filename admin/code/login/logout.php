<?php
    session_start();
    session_destroy();
    $_SESSION['status'] = "Đăng xuất tài khoản thành công!";
    header("Location: ../../code/login/");
    exit(0);
?>
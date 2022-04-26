<?php
    require("../../include/ketnoi.php");
    $id = $_GET["id"];
    $tt ="2";
    $sql ="UPDATE tbl_news SET ID_TT ='$tt' WHERE MaTinTuc='$id'";
    $result = mysqli_query($kn,$sql);
    if($result){
        echo ("<script LANGUAGE='JavaScript'>
                window.location.href='index.php';
                  </script>");
    }
?>
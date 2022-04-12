<?php
    require("../../include/ketnoi.php");
    $id = $_GET['ID'];

    $query = mysqli_query($kn, "DELETE FROM tbl_permission WHERE MaQuyen ='$id'");

    header('location: index.php?m=1');
?>
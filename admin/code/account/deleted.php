<?php
    require("../../include/ketnoi.php");
    $id = $_GET['ID'];

    $query = mysqli_query($kn, "DELETE FROM tbl_account WHERE ID_TK ='$id'");

    header('location: index.php?m=1');
?>
<?php
    require("../../include/ketnoi.php");
    if(isset($_POST["bnt_add"])){
        $t1 = $_POST["txt_month"];
        $t2 = $_POST["txt_month1"];
        $sql = "INSERT INTO tbl_excel(Thang1, Thang2) VALUES ('$t1','$t2')";
        $result = mysqli_query($kn,$sql);
    }

?>
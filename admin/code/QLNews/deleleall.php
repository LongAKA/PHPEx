<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "500000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"

</script>
<?php
    session_start();
    require("../../include/ketnoi.php");
    if(isset($_POST["checkbox"][0])){
        foreach($_POST["checkbox"] as $list){
            $id=mysqli_real_escape_string($kn,$list);
            $sql_query = mysqli_query($kn, "DELETE FROM tbl_news WHERE MaTinTuc='$id'");
            if($sql_query){
                echo "<script type='text/javascript'>toastr.success('Xóa thành công', { timeOut: 100000 })</script>";
            }
            else{
                $_SESSION['status1'] = "Xóa dữ liệu không thành công";
                header('location: QLMH.php');
            }
        }
    }
?>
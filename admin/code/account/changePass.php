<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<?php require("../templates/header.php");
require("../../include/ketnoi.php");
$id = $_SESSION["GiaoVien"];
if(count($_POST)>0) {
$result = mysqli_query($kn,"SELECT *from tbl_account WHERE Username='" . $id . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["Password"] && $_POST["newPassword"] == $_POST["confirmPassword"] ) {
mysqli_query($kn,"UPDATE tbl_account set Password='" . $_POST["newPassword"] . "' WHERE Username='" . $id . "'");
    echo "<script>
                    $(document).ready(function(){
                        Swal.fire({
                            title: 'Thông báo',
                            text: 'Thay đổi mật khẩu của bạn thành công!',
                            icon: 'success',
                            timer: 5000,
                            showComfirmButton: false
                        });				
                    });
                    // window.location: 'detail.php';
                </script>";
} else{
    echo "<script>
				$(document).ready(function(){
					Swal.fire({
						title: 'Thông báo',
						text: 'Mật khẩu không đúng!',
						icon: 'error',
						timer: 5000,
						showComfirmButton: false
					});		
				});
			</script>";
}
}
?>
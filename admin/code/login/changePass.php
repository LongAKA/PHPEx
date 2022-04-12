<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<style>
    .btn-primary {
        width: 150px;
        border-radius: 5px;
        margin-top: 1rem;
        margin-bottom: 2rem;
    }
    .form_change {
        width: 90%;
        margin: auto;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        border-radius: 8px;
    }
    .mb-3{
        width: 80%;
        margin: auto;
    }
    .heading_top {
        width: 90%;
        margin-left: 4rem;
        border-left: 5px solid #0066ff;
    }
    .heading_top h2{
        padding-left: 15px;
    }
</style>
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
<div class="heading_top">
    <h2>Thay đổi mật khẩu</h2>
</div>
<div class="form_change">
    <form method="post">
    <div><?php if(isset($message)) { echo $message; } ?></div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mật khẩu cũ</label>
        <input type="password" class="form-control" name="currentPassword" id="exampleInputEmail1" aria-describedby="emailHelp">

        <span id="currentPassword" class="required"></span>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mật khẩu mới</label>
        <input type="password" class="form-control" name="newPassword" id="exampleInputEmail1" aria-describedby="emailHelp">
        <span id="newPassword" class="required"></span>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu</label>
        <input type="password" class="form-control" name="confirmPassword" id="exampleInputPassword1">
        <span id="confirmPassword" class="required"></span>
    </div>
    <center>
        <button type="submit" class="btn btn-primary">Thay đổi</button>
    </center>
    
    </form>
</div>
<?php require("../templates/footer.php"); ?>
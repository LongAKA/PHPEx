<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<?php
    require("../../include/ketnoi.php");
    if(isset($_POST["btn_add_acount"])){
		
        $name = $_POST["txt_name"];
		$ht = $_POST["txt_ht"];
		$mail = $_POST["txt_mail"];
        $pri = $_POST["sl_quyen"];
		$pool = array("5","7","a","A","X","L","U","J","s","d","m","1","8","9");
        $count = 1;
        $randompassword ="";
        $rn;
        $randomchar="";
        while($count < 7){
            $rn = rand(0,count($pool) - 1);
            $randomchar=$pool[$rn];
            $randompassword=$randompassword.$randomchar;

            ++$count;
        }
        $sql_kt = "SELECT * FROM tbl_account WHERE Username ='".$name."'";
        $result = mysqli_query($kn, $sql_kt);
        if(mysqli_fetch_array($result)){
            echo "<script>
				$(document).ready(function(){
					Swal.fire({
						title: 'Thông báo',
						text: 'Tên đăng nhập đã tồn tại!',
						icon: 'warning',
						timer: 5000,
						showComfirmButton: false
					});				
				});
			</script>";
			header("refresh:2; url= index.php");
        }
        else if($result){
            $sql = "INSERT INTO tbl_account (Username, Password, HoTen, Email, MaQuyen) VALUES ('$name','$randompassword','$ht','$mail','$pri')";
            $query = mysqli_query($kn, $sql);
            echo "<script>
				$(document).ready(function(){
					Swal.fire({
						title: 'Thông báo',
						text: 'Thêm dữ liệu thành công!',
						icon: 'success',
						timer: 5000,
						showComfirmButton: false
					});				
				});
			</script>";
			header("refresh:2; url= index.php");
        }
        else {
            echo "<script>
				$(document).ready(function(){
					Swal.fire({
						title: 'Thông báo',
						text: 'Thêm thất bại!',
						icon: 'warning',
						timer: 5000,
						showComfirmButton: false
					});				
				});
			</script>";
			header("refresh:2; url= index.php");
        }
    }
   
?>
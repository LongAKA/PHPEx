<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<?php
	session_start();
	include ("../../include/ketnoi.php");
	if(isset($_POST["login"])){
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		$Q1 = mysqli_query($kn, "select * from tbl_account where Username='".$user."' and Password ='".$pass."' and MaQuyen = '1'");
		$Q2 = mysqli_query($kn, "select * from tbl_account where Username='".$user."' and Password ='".$pass."' and MaQuyen = '2'");
		$Q3 = mysqli_query($kn, "select * from tbl_account where Username='".$user."' and Password ='".$pass."' and MaQuyen = '8'");
		if(mysqli_num_rows($Q1) == 1)
		{
		
			$_SESSION["QuanTri"] = $user;
			
			// echo "<script language=javascript>
			// 	alert('Đăng nhập quản trị thành công!');
			// 	window.location='../../../index.php'
			// 	</script>";
			echo "<script>
				$(document).ready(function(){
					Swal.fire({
						title: 'Thông báo',
						text: 'Đăng nhập quản trị thành công!',
						icon: 'success',
						timer: 5000,
						showComfirmButton: false
					});				
				});
			</script>";
			header("refresh:2; url=../../../index.php");
		}
		else if(mysqli_num_rows($Q2) == 1)
		{	
			$row = mysqli_fetch_assoc($Q2);
			$_SESSION["GiaoVien"] = $user;
			$_SESSION["ID_TK"] = $row["ID_TK"];
			echo "<script>
				$(document).ready(function(){
					Swal.fire({
						title: 'Thông báo',
						text: 'Đăng nhập thành công',
						icon: 'success',
						timer: 5000,
						showComfirmButton: false
					});		
				});
			</script>";
			header("refresh:2; url=../../../index.php");
		}
		else if(mysqli_num_rows($Q3) == 1)
		{	
			$_SESSION["KiemDuyet"] = $user;
			
			echo "<script>
				$(document).ready(function(){
					Swal.fire({
						title: 'Thông báo',
						text: 'Đăng nhập thành công',
						icon: 'success',
						timer: 5000,
						showComfirmButton: false
					});		
				});
			</script>";
			header("refresh:2; url=../../../index.php");
		}
		else
		{
			// echo "<script language=javascript>
			// 	alert('Sai tên đăng nhập hoặc mật khẩu');
				
			// 	</script>";
			echo "<script>
				$(document).ready(function(){
					Swal.fire({
						title: 'Thông báo',
						text: 'Tên đăng nhập và mật khẩu sai!',
						icon: 'error',
						timer: 5000,
						showComfirmButton: false
					});		
				});
			</script>";
			header("refresh:2; url=index.php");
		}
	}
	
?>

<?php
    require("../../include/ketnoi.php");
    require("../templates/header.php");
   
    // printf($sql);
            $id = $_SESSION["GiaoVien"];
            $query3 = mysqli_query($kn, "select * from tbl_news where Username = '$id' and MaTinTuc");
            $query2 = mysqli_query($kn, "select * from tbl_news where Username = '$id' and ID_TT ='2'");
            // $query4 = mysqli_query($kn, "select * from dangkyhotro");
            // $query3 = mysqli_query($kn, "select * from dangkyhotro where HinhThuc = 'Hỗ trợ phòng hợp trực tuyến'");
?>  
<style>
    .avatar_icon {
        width: 80%;
        margin: auto;
        height: 200px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        border-radius: 8px;
    }
    .avatar_icon img{
        width: 170px;
        height: 170px;
        float: left;
        margin-top: 15px;
        margin-left: 10px;
        margin-right: 15px;
    }
    .avatar_icon h2 {
        margin-left: 15px;
        padding-top: 70px;
        font-size: 23px;
    }
    .avatar_icon p{
        font-size: 25px;
        color: #0066ff;
    }
    .column {
        float: left;
        width: 33.33%;
        padding: 15px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        margin: 0 15px;
        border-radius: 8px;
    }
    .column1 {
        float: right;
        width: 62.62%;
        padding: 15px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        border-radius: 8px;
    }
    .row {
        width: 82%;
        margin: auto;
        margin-top: 15px;
    }
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    @media screen and (max-width:600px) {
    .column {
        width: 100%;
    }
    }
    .column h2{
        font-size: 20px;
        font-weight: 600;
        padding: 0px 0px 2px;
    }
    .column1 h2{
        font-size: 25px;
        font-weight: 600;
        padding: 0px 0px 2px;
        text-align: center;
    }
    .ct_icon {
        display: flex;
    }
    .ct_icon p {
        padding-left: 8px;
    }
    .ct_icon i{
        padding-top: 4px;
        color: #ccc;
    }
    .ct_icon input {
        border: none;
        margin-left: 8px;
    }
    .btn-primary {
        width: 150px;
        font-weight: 600;
        height: 42px;
    }
    .thongke {
        display: flex;
    }
    .thongke i{
        margin-top: 5px;
        margin-right: 10px;
        color: #ccc;
    }
    .thongke span{
        color: #0066ff;
        font-weight: 600;
        font-size: 18px;
    }
    .form-control:focus {
        border: 2px solid #0066ff;
        box-shadow: none;
    }
</style>
<?php
        
        $id = $_SESSION["GiaoVien"];
         $sql = "SELECT * FROM tbl_account WHERE Username = '$id'";
         $query = mysqli_query($kn,$sql);
         if(mysqli_num_rows($query) > 0){
             while($row = mysqli_fetch_array($query)){
            
             ?>
        <div class="avatar_icon">
            <img src="https://cdn-icons-png.flaticon.com/512/147/147142.png">
            <h2>Xin chào:</h2> <p><?php echo $row['HoTen']; ?></p>
        </div>

        <div class="row">
            <div class="column">
                <h2>Thông tin chi tiết</h2>
                <div class="ct_icon">
                    <i class="fa-solid fa-user"></i>
                    <p><?php echo $row["Username"] ?></p>
                </div>
                <div class="ct_icon">
                    <i class="fa-solid fa-envelope"></i>
                    <p><?php echo $row["Email"] ?></p>
                </div>
                <div class="ct_icon">
                    <i class="fa-solid fa-key" style="padding-top: 10px;"></i>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" id="ipnPassword" value="<?php echo $row["Password"] ?>" />
                    <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="btnPassword">
                        <span class="fas fa-eye"></span>
                    </button>
                    </div>
                </div>
                
                </div>
                <h2>Thống kê của bạn</h2>
                <div class="thongke">
                    <i class="fa-solid fa-chart-line"></i>
                    <p>Tổng bài viết: &nbsp;<span><?php echo mysqli_num_rows($query3)?></span></p>
                </div>
                <div class="thongke">
                    <i class="fa-solid fa-check" style="color: green;"></i>
                    <p>Bài viết được duyệt: &nbsp;<span><?php echo mysqli_num_rows($query2)?></span></p>
                </div>
            </div>
            
            <div class="column1">
                <h2>Đổi mật khẩu</h2>
                <form action="" method="POST">
                <div class="form-group">
                <label for="ipnPassword">Mật khẩu cũ</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="currentPassword" id="ipnPassword_a1"  pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Mật khẩu chứa ít nhất 6 ký tự bao gồm chữ và số" required />
                    <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="btnPassword_a1">
                        <span class="fas fa-eye"></span>
                    </button>
                    </div>
                </div>
                </div>
                <div class="form-group">
                <label for="ipnPassword">Mật khẩu mới</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="newPassword" id="ipnPassword_a2" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Mật khẩu chứa ít nhất 6 ký tự bao gồm chữ và số" required />
                    <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="btnPassword_a2">
                        <span class="fas fa-eye"></span>
                    </button>
                    </div>
                </div>
                </div>
                <div class="form-group">
                <label for="ipnPassword">Nhập lại mật khẩu</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="confirmPassword" id="ipnPassword_a3" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Mật khẩu chứa ít nhất 6 ký tự bao gồm chữ và số" required />
                    <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="btnPassword_a3">
                        <span class="fas fa-eye"></span>
                    </button>
                    </div>
                </div>
                </div>
                <center>
                <button class="btn btn-primary">Cập nhật</button></center>
                </form>
            </div>
        </div>

    <?php } } ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        // step 1
        const ipnElement = document.querySelector('#ipnPassword')
        const btnElement = document.querySelector('#btnPassword')

        // step 2
        btnElement.addEventListener('click', function() {
        // step 3
        const currentType = ipnElement.getAttribute('type')
        // step 4
        ipnElement.setAttribute(
            'type',
            currentType === 'password' ? 'text' : 'password'
        )
        })
    </script>
     <!---pass2--->
     <script>
         // step 1
        const ipnElement1 = document.querySelector('#ipnPassword_a1')
        const btnElement1 = document.querySelector('#btnPassword_a1')

        // step 2
        btnElement1.addEventListener('click', function() {
        // step 3
        const currentType = ipnElement1.getAttribute('type')
        // step 4
        ipnElement1.setAttribute(
            'type',
            currentType === 'password' ? 'text' : 'password'
        )
        })

     </script>   
      <!---pass3--->
      <script>
         // step 1
        const ipnElement2 = document.querySelector('#ipnPassword_a2')
        const btnElement2 = document.querySelector('#btnPassword_a2')

        // step 2
        btnElement2.addEventListener('click', function() {
        // step 3
        const currentType = ipnElement2.getAttribute('type')
        // step 4
        ipnElement2.setAttribute(
            'type',
            currentType === 'password' ? 'text' : 'password'
        )
        })

     </script>  
      <!---pass4--->
      <script>
         // step 1
        const ipnElement3 = document.querySelector('#ipnPassword_a3')
        const btnElement3 = document.querySelector('#btnPassword_a3')

        // step 2
        btnElement3.addEventListener('click', function() {
        // step 3
        const currentType = ipnElement3.getAttribute('type')
        // step 4
        ipnElement3.setAttribute(
            'type',
            currentType === 'password' ? 'text' : 'password'
        )
        })

     </script>  
 

<?php
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
<?php
    require("../templates/footer.php");
?>
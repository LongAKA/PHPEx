    <?php 
    require("../templates/header.php");
    require("../../include/ketnoi.php");
    $sql = "select * from tbl_account a, tbl_permission b where a.MaQuyen = b.MaQuyen";
    $result = mysqli_query($kn,$sql);
    // if(!isset($_SESSION["QuanTri"]))
    // {
    //     echo"<script language=javascript>
    //     alert('Bạn không có quyền trên trang này!');
    //     window.location='code/Login/';
    //     </script>";
    // }
    $sql1 = "select * from tbl_permission";
    $result1 = mysqli_query($kn,$sql1);
?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
    
<style>
    .table th {
        background-color: #0066ff;
        color: #fff;
    }
    .card_table{
        width: 95%;
        margin: auto;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        border-radius: 10px;
    }
    .table {
        width: 100%;
        border: 1px solid #f2f2f2;
        margin: auto;
        background-color: #ffffff;
        border-radius: 8px;
    }
    /* .td_sua{
        display: flex;
        height: 84.5px;
    } */
    .a_sua{
        width: 45px;
        height: 30px;
        background-color: #0066ff;
        text-align: center;
        border-radius: 2px;
        display: block;
        margin-right: 8px;
    }
    .a_sua1{
        width: 43px;
        height: 38px;
        background-color: red;
        text-align: center;
        border-radius: 2px;
        display: block;
        border-radius: 5px;
    }
    .a_sua, .a_sua1 i{
        color: #fff;
        padding-top: 10px;
        font-size: 16px;
    }
    .header_top {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    .form-control:focus{
        border-color:dodgerBlue;
        box-shadow:0 0 6px 0 dodgerBlue;
    }
    .layout_button {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .btn_them {
        width: 100px;
        margin: 0 15px;
    }
    #visiblity-toggle{
        color: #000;
        cursor: pointer;
        margin: 0 2px;
    }
    .swal2-title {
        color: green !important;
    }
    .material-icons-outlined {
        float: right;
        background: #f2f2f2;
        text-align: center;
        margin-top: -33px !important;
        width: 80px;
        height: 90%;
        border-radius: 8px;
        color: #000;
        font-weight: 600;
    }
    .hienthi label{
        font-weight: 600;
    }
    .fr-01{
        text-transform:capitalize;
    }
    .dataTables_length {
        margin-top: 15px;
        margin-left: 5px;
    }
    .dataTables_filter {
        margin-top: 15px;
        margin-right: 10px;
    }
    .dataTables_filter .form-control-sm {
        width: 300px !important;
    }
    .form_exe {
        width: 95%;
        margin: auto;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        border-radius: 5px;
        margin-bottom: 15px;
        
    }
    .form_exe label{
        padding-bottom: 5px;
        margin-left: 10px;
        font-weight: 600;
    }
    .form_excel {
        display: flex;
    }
    .form_excel .a_a0 {
        width: 60%;
    }
    .btn_sm {
        width: 120px;
        margin-left: 10px;
        background-color: #209E62;
        border: none;
    }
    .alert {
        width: 95%;
        margin: auto;
        margin-bottom: 10px;
    }
    .form_ex_a00 {
        float: right;
    }
    .excel_im_ex {
        width: 45%;
    }
    .form_ground{
        width: 100%;
        display: flex;
        justify-content: space-between;
    }
    .excel_im_ex .frm_a00 {
        margin-left: 10px;
    }
    .excel_im_ex .frm_a01 {
        float: right;
        margin-bottom: 10px;
        margin-right: 10px;
    }
    .btn_ex{
        background-color: #209E62;
        border: none;
        width: 150px;
    }
</style>
<div class="header_top">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 2rem;">
    <i class="fa-solid fa-user-plus"></i>&nbsp;Thêm tài khoản
    </button>
</div>
<div class="form_exe">
    <label>Thêm file excel</label>
    <div class="form_ground">
    <div class="excel_im_ex">
    <form method="post" action="importexcel.php" enctype="multipart/form-data" class="frm_a00">
            <div class="form_excel">
            <input type="file" name="uploadfile" class="form-control a_a0" required/>
            <input type="submit" name="submit" class="btn btn-primary btn_sm">
            </div>
    </form>
    </div>
    <div class="excel_im_ex">
    <form action="code.php" method="POST" class="frm_a01">
        <select name="export_file_type" class="form-control" hidden>
            <option value="xlsx">XLSX</option>
        </select>
        <button type="submit" name="export_excel_btn" class="btn btn-primary btn_ex"><i class="fa-solid fa-file-export"></i> Export Excel</button>
    </form>
    </div>
    </div>
</div>
<?php
if(isset($_SESSION['status']))
    {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thông báo!</strong> <?= $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
        unset($_SESSION['status']);
    }
    if(isset($_SESSION['status1']))
    {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thông báo!</strong> <?= $_SESSION['status1']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
        unset($_SESSION['status1']);
    }
?>

<div class="card_table"><br>
    <table id="data" class="table datatable table-hover" >
    <thead>
        <tr>
        <!-- <th scope="col">ID</th> -->
        <th scope="col">Tên đăng nhập</th>
        <th scope="col">Quyền</th>
        <th scope="col">Chi tiết</th>
        <th scope="col">Cập nhật</th>
        <th scope="col">Xóa</th>
        <!-- <th scope="col">Ngày</th>
        <th scope="col">Buổi học</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Ghi chú</th>
        <th scope="col">Tác vụ</th> -->   
        </tr>
    </thead>
    <?php while ($row = mysqli_fetch_array($result)) {
				# code...
			 ?>
					<tr>
						<!-- <td><?php echo $row['ID_TK']; ?> </td> -->
                        <td><?php echo $row['Username']; ?> </td>
						<td><?php echo $row['TenQuyen']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btnedit" data-bs-toggle="modal" data-bs-target="#eye<?php echo $row["ID_TK"]; ?>">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </td>
						<td>
                            <button type="button" class="btn btn-primary btnedit" data-bs-toggle="modal" data-bs-target="#modal1<?php echo $row["ID_TK"]; ?>">
                            <i class='bx bxs-edit'></i>
                            </button>
                        </td>
                        <td>
                            <a href="deleted.php?ID=<?= $row["ID_TK"]; ?>" class="a_sua1"><i class='bx bx-trash'></i></a>	
						</td>
					</tr>

            <!---=========sua--->
<div class="modal fade" id="modal1<?php echo $row["ID_TK"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form cập nhật tài khoản</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-body">
      <form action="" method="POST">
        <div class="mb-3">
            <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_tk" value="<?php echo $row["ID_TK"] ?>" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" name="txt_tdn" value="<?php echo $row["Username"] ?>" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
            <input type="password" value=<?php echo $row["Password"]; ?> class="form-control" name="txt_pw">
        </div>
        <div class="mb-3">
            <label class="form-label">Họ tên</label>
            <input type="text" class="form-control" name="txt_ht" value="<?php echo $row["HoTen"] ?>" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="text" class="form-control" name="txt_ml" value="<?php echo $row["Email"] ?>" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="Select" class="form-label">Quyền</label>
            <select id="Select" class="form-select" name="sl_quyen">
                <option selected value="<?php echo $row["MaQuyen"]; ?>"><?php echo $row["TenQuyen"]; ?></option>
                <option value="1">Quyền quản trị</option>
                <option value="2">Quyền giáo viên</option>
                <option value="8">Quyền đăng bài</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="sbn_edit">Save changes</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
              
<!---the end--->  
            <!---===========================end--->
                <!---modal chi tiết--->
                <div class="modal fade" id="eye<?php echo $row["ID_TK"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="hienthi">
                                <label>Tên đăng nhập:</label>
                                <p><?php echo $row["Username"]; ?></p>
                            </div>
                            <div class="hienthi">
                                <label>Họ tên:</label>
                                <p style="text-transform: capitalize"><?php echo $row["HoTen"]; ?></p>
                            </div>
                            <div class="hienthi">
                                <label>Email:</label>
                                <p><?php echo $row["Email"]; ?></p>
                            </div>
                            <div class="hienthi">
                                <label>Quyền truy cập:</label>
                                <p><?php echo $row["TenQuyen"]; ?></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>                     

                <!--===the end====--->
       
			 <?php } ?>  
    </table><br>
   
</div>

<?php
                if(isset($_POST["sbn_edit"])){
                    $id = $_POST["id_tk"];
                    $name = $_POST["txt_tdn"];
                    $pass = $_POST["txt_pw"];
                    $hoten = $_POST["txt_ht"];
                    $mail = $_POST["txt_ml"];
                    $quyen = $_POST["sl_quyen"];
                    $sql = "UPDATE tbl_account SET Username='$name', Password='$pass',HoTen='$hoten', Email='$mail', MaQuyen='$quyen' WHERE ID_TK='$id'";
                    $result = mysqli_query($kn, $sql);
                    if($result){
                        echo "<script>
                        $(document).ready(function(){
                            Swal.fire({
                                title: 'Thông báo',
                                text: 'Cập nhật dữ liệu thành công!',
                                icon: 'success',
                                timer: 5000,
                                showComfirmButton: false
                            });				
                        });
                        // window.history.back();
                        </script>";
                        
                    }
                    else{
                        echo "<script>
                        $(document).ready(function(){
                            Swal.fire({
                                title: 'Thông báo',
                                text: 'Cập nhật dữ liệu thất bại!',
                                icon: 'erorr',
                                timer: 5000,
                                showComfirmButton: false
                            });				
                        });
                        // window.history.back();
                        </script>";
                    }
                }
            ?>
           
<?php if(isset($_GET["m"])) : ?>
    <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
<?php endif; ?>
<!---modal--->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm tài khoản</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="../account/add.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control fr-01" id="exampleInputEmail1" aria-describedby="emailHelp" name="txt_name" required>
            </div>
           
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txt_ht" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txt_mail" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Quyền</label>
                <select class="form-select" aria-label="Default select example" name="sl_quyen" >
                        <?php foreach ($result1 as $value){ ?>
                            <option value="<?=$value["MaQuyen"]?>"><?=$value['TenQuyen']?></option> 
                        <?php } ?>
                      
                </select>
            </div>
            <div class="layout_button">
                <button type="submit" class="btn btn-primary btn_them" name="btn_add_acount">Cập nhật</button>
                <button type="reset" class="btn btn-light">Làm mới</button>
            </div>        
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!------===============--sửa tài khoản----==============================-->

<!---modal edit data---->
<!---end---->
<!---the end--->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready( function () {
        $('#data').DataTable({
            searching: true,
            paging: true,
            ordering: true,
            info: false,
            "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "Tất cả"]],
            language: {
                lengthMenu: "Hiển thị _MENU_ bản ghi",
                search: "Tìm kiếm ",
                zeroRecords: "Không tìm thấy",
                infoEmpty: "Không có bản ghi nào",
                info: "Hiển thị _START_ đến _END_ bản ghi trong tổng _TOTAL_ bản ghi",
                paginate: {
                    first: "Premier",
                    previous: "Trước",
                    next: "Sau",
                    last: "Dernier"
                },
        }
    });
    });
</script>
<!---show/hide password--->
<script type="text/javascript">
    $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
    });
</script>
<!---the end--->

<script>
    $(document).ready(function() {
    var datatablephp = $('#example').DataTable();
    });
</script>
<script>
    $(".a_sua1").on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr("href")
    Swal.fire({
        title: 'Thông báo',
        text: "Bạn có chắc chắn muốn xóa!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
    }).then((result) => {
        if(result.value){
            document.location.href = href;
        }
    });
 });

 const flashdata = $('.flash-data').data('flashdata')
 if(flashdata){
     Swal.fire({
         icon: 'success',
         type: 'success',
         title: 'Thông báo',
         text: 'Dữ liệu đã được xóa!'

     })
     header('location: index.php');
 }
</script>
<script>
        const pass = document.querySelector('#exampleInputPassword1')
        const btn = document.querySelector('#visiblity-toggle')

        btn.addEventListener('click', () => {
            if (pass.type === "text") {
                pass.type = "password";
                btn.innerHTML = "Hiện";
            } else {
                pass.type = "text";
                btn.innerHTML = "Ẩn";

            }
        })
</script>



        
<!---end---->
<?php
    include "../templates/footer.php";
?>
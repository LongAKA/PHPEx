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
        width: 100%;
        margin: auto;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        border-radius: 10px;
    }
    .table {
        width: 90%;
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
</style>
<div class="header_top">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-user-plus"></i>&nbsp;Thêm tài khoản
    </button>
</div>
<div class="card_table"><br>
    <table id="example" class="table datatable table-hover" >
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
                                <p><?php echo $row["HoTen"]; ?></p>
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
            <!---=========sua--->
            <form method="post" action="">
                <div class="modal fade" id="modal1<?php echo $row["ID_TK"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cập nhật tài khoản</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">    
                                        <input type="hidden" id="id_q" name="id_tk" value="<?php echo $row["ID_TK"]?>">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tên đăng nhập</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txt_name" required value="<?php echo $row["Username"]?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="txt_pass" value="<?php echo $row["Password"]?>" name="txt_pass" required>
                                            <!-- <span id="visiblity-toggle" 
                                                class="material-icons-outlined">Hiện
                                            </span> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Họ tên</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $row["HoTen"]?>" name="txt_ht" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="txt_mail" value="<?php echo $row["Email"]?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Quyền</label>
                                            <select class="form-select" aria-label="Default select example">
                                                    <?php foreach ($result1 as $value){ ?>
                                                        <option value="<?=$value["MaQuyen"]?>"><?=$value['TenQuyen']?></option> 
                                                    <?php } ?>
                                                  
                                            </select>
                                        </div>
                                        <div class="layout_button">
                                            <button type="submit" class="btn btn-primary btn_them" name="btn_edit_per">Cập nhật</button>
                                            <button type="reset" class="btn btn-light">Làm mới</button>
                                        </div>           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
                                            
            
			 <?php } ?>  
    </table><br>
</div>

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
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txt_name" pattern="^[a-z A-Z]{1,50}$" title="Tên đăng nhập không được chứa dấu" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="txt_pass" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Mật khẩu chứa ít nhất 8 ký tự bao gồm chữ và số" required>
                <span id="visiblity-toggle" 
                    class="material-icons-outlined">Hiện
                </span>
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
                <select class="form-select" aria-label="Default select example">
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


<!---modal edit data---->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa tài khoản</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txt_name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="txt_pass" required>
                <span id="visiblity-toggle" 
                    class="material-icons-outlined">Hiện
                </span>
            </div>
            <div class="mb-3">
                <label class="form-label">Quyền</label>
                
                    <select class="form-select" aria-label="Default select example">
                        <?php foreach ($result1 as $value){ ?>
                            <option value="<?=$value["MaQuyen"]?>"><?=$value['TenQuyen']?></option> 
                        <?php } ?>
                      
                    </select>
             
            </div>
            <div class="layout_button">
                <button type="submit" class="btn btn-primary btn_them" name="btn_add_acount">Thêm</button>
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
<!---end---->

</div>
<!---the end--->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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

        <!--sửa tài khoản---->
        <?php
                if(isset($_POST["btn_edit_per"])){
                    $id = $_POST["id_tk"];
                    $name = $_POST["txt_name"];
                    $pass = $_POST["txt_pass"];
                    $hoten = $_POST["txt_ht"];
                    $mail = $_POST["txt_mail"];
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
<!---end---->
<?php
    include "../templates/footer.php";
?>
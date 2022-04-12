
<?php 
    require("../templates/header.php");
    require("../../include/ketnoi.php");
    $sql = "select * from tbl_permission";
    $result = mysqli_query($kn,$sql);
    // if(!isset($_SESSION["QuanTri"]))
    // {
    //     echo"<script language=javascript>
    //     alert('Bạn không có quyền trên trang này!');
    //     window.location='code/Login/';
    //     </script>";
    // }
    
?>
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
        width: 45px;
        height: 38px;
        background-color: red;
        text-align: center;
        border-radius: 2px;
        display: block;
        border-radius: 5px;
    }
     .a_sua1 i{
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
</style>
    <div class="header_top">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-plus"></i>&nbsp;Thêm quyền
    </button>
</div>
<div class="card_table"><br>
    <table class="table datatable table-hover">
    <thead>
        <tr>
        <th scope="col">Mã quyền</th>
        <th scope="col">Tên quyền</th>
        <th scope="col">Cập nhật</th>
        <th scope="col">Xóa</th>
        </tr>
    </thead>
    <?php while ($row = mysqli_fetch_array($result)) {
				# code...
			 ?>
					<tr>
						<td><?php echo $row['MaQuyen']; ?> </td>
                        <td><?php echo $row['TenQuyen']; ?> </td>
						<td>
                        <button type="button" class="btn btn-primary btnedit" data-bs-toggle="modal" data-bs-target="#modaledit1<?php echo $row["MaQuyen"]; ?>">
                            <i class='bx bxs-edit'></i>
                        </button>
                            <!-- <a class="a_sua" href="suabcn.php?ID=<?php echo $row['MaQuyen']; ?>"><i class='bx bxs-edit'></i></a> -->
                        </td>
                        <td>
                            <!-- <input type="hidden" class="delete_id_value" value="<?php echo $row['ID_TK']; ?>">
                            <a class="a_sua1" href="javascript:void(0)"><i class='bx bx-trash' style="font-size: 18px; padding-top: 6px;"></i></a> -->
							<!-- <a class="a_sua1" onclick="return window.confirm('Bạn muốn xóa không!');" href="deleted.php?ID=<?php echo $row['MaQuyen']; ?>"><i class='bx bx-trash'></i></a> -->
                           <a href="delete.php?ID=<?= $row["MaQuyen"]; ?>" class="a_sua1"><i class='bx bx-trash'></i></a>
						</td>
          
					</tr>
                
           
            
                    <form method="post" action="">
                <div class="modal fade" id="modaledit1<?php echo $row["MaQuyen"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm quyền</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">    
                                        <input type="hidden" id="id_q" name="id" value="<?php echo $row["MaQuyen"]?>">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tên quyền</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txt_name" required value="<?php echo $row["TenQuyen"]?>">
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

<!---modal edit--->

<!---the end--->
<?php if(isset($_GET["m"])) : ?>
    <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
<?php endif; ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm quyền</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="../permission/add.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên quyền</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txt_name" required>
            </div>
            <div class="layout_button">
                <button type="submit" class="btn btn-primary btn_them" name="btn_add_per">Thêm</button>
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

<!---modal sửa---->


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
 $(".a_sua1").on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr("href")
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
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
 }
</script>
<!---end---->
<?php
                if(isset($_POST["btn_edit_per"])){
                    $id = $_POST["id"];
                    $name = $_POST["txt_name"];
                    $sql = "UPDATE tbl_permission SET TenQuyen='$name' WHERE MaQuyen='$id'";
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
                        window.history.back();
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
                        window.history.back();
                        </script>";
                    }
                }
            ?>
<?php 
    require("../templates/footer.php");
?>

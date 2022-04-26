<?php
    require("../templates/header.php");
    require("../../include/ketnoi.php");
    $sql = "SELECT * FROM tbl_news a, tbl_account b, tbl_status c WHERE a.ID_TK = b.ID_TK AND a.ID_TT = c.ID_TT";
    $sql_1 = mysqli_query($kn, $sql);

    if(isset($_POST['chk_id']))
    {
        $arr = $_POST['chk_id'];
        foreach ($arr as $id) {
            @mysqli_query($kn,"DELETE FROM tbl_news WHERE MaTinTuc = " . $id);
        }
        
    }
   
?>

    
    <style>
        .td_nd {
            max-width: 100px;
            white-space: nowrap; 
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .form_ct_1 label{
            font-weight: 700;
        }
        .form_ct_1 p{
            color: #0066ff;
        }
        .form_a00 {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .form_a00 p{
            max-width: 300px;
            white-space: nowrap; 
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .form_a00 a{
            background-color: green;
            font-size: 18px;
            width: 30px;
            height: 30px;
            color: #fff;
            text-align: center;
            border-radius: 4px;
        }
        .table tr th{
            background-color: #0066ff;
            color: #fff;
            font-size: 16px;
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
        .card_table{
            width: 99%;
            margin: auto;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 5px;
        }
        .table.dataTable {
            width: 100%;
            border: 1px solid #f2f2f2;  
            background-color: #ffffff;
           
        }
        .table th{
            font-size: 12px;
            background-color: #000;
            color: #fff;
            margin-top: 1rem;
        }
        .table tr{
            border-bottom: 1px solid #f2f2f2;
        }
        .td_sua{
            display: flex;
            height: 84.5px;
        }
        .td_sua .a_sua{
            width: 50px;
            height: 40px;
            background-color: #0066ff;
            text-align: center;
            border-radius: 4px;
            margin-right: 5px;
            color: #fff;
        }
         .a_sua1{
            width: 50px;
            height: 40px;
            background-color: #FF3547;
            text-align: center;
            border-radius: 4px;
            margin-right: 8px;
        }
         .a_sua i{
            color: #fff;
            padding-top: 5px;
            font-size: 16px;
        }
        .a_sua1 i{
            padding-top: 12px;
            font-size: 18px;
        }
        .table-dark tr th{
            font-size: 16px;
        }
        .btn_cn {
            width: 120px;
            height: 40px;
            background-color: #0066ff;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
        .a_xoa {
            width: 100px;
            height: 40px;
            background-color: #FF3547;
            display: block;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: #fff;
            margin-bottom: 15px;
            margin-left: 5px;
            border-radius: 5px;
        }
        .search_delete {
            display: flex;
            justify-content: space-between;
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
        
    </style>
    <br>
    <br>
    <div class="search_delete">
        <a href="javascript:void(0)" onclick="delete_all()" class="a_xoa"><i class="fa-solid fa-trash"></i>&nbsp; Xóa tất cả</a>
        <!-- <form>
            <input type="text" name="search_text" id="search_text">
        </form> -->
    </div>
    
<div class="card_table">
 <form action="" method="post" id="frm">
 <table id="data" class="table table-hover">
    <thead>
        <tr>
        <th scope="col"><input type="checkbox" id="delete" class="checkbox" onclick="select_all()" name="del[]"></th>
        <th scope="col">Tên bài viết</th>
        <th scope="col">Tác giả</th>
        <th scope="col">Ngày đăng</th>
        <th scope="col">Nội dung</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Tác vụ</th>
        </tr>
    </thead>
  <?php if( $sql_1) {
                foreach( $sql_1 as $row) {
			 ?>
                    
                     <tr>
                        <td><input type="checkbox" class="checkbox" name="checkbox[]" id="<?php echo $row['MaTinTuc'] ?>" value="<?php echo $row['MaTinTuc'] ?>"></td>
                        <td style="width: 300px"><?php echo $row["TenBaiViet"]?></td>
                        <td><?php echo $row["HoTen"]?></td>
                        <td><?php echo $row["ThoiGian"]?></td>
                        <td><p class="td_nd"><?php echo $row["NoiDung"]?></p></td>
                        <td><?php
                                if($row["ID_TT"] == "1"){
                                    echo "<span style='color: #0066ff'>Chờ duyệt</span>";
                                }
                                if($row["ID_TT"] == "2"){
                                    echo "<span style='color: green'>Duyệt</span>";
                                }
                                if($row["ID_TT"] == "3"){
                                    echo "<span style='color: red'>Không được duyệt</span>";
                                }
                                
                            ?>
                                <br>
                                <!-- <button type="button" class="btn btn-primary a_sua" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Cập nhật
                                </button> -->
                        </td>
                        
                        <td class="td_sua">
                                <a href="check.php?id=<?php echo $row["MaTinTuc"]; ?>" class="btn btn-primary a_sua" style="background-color: #209E62; border: none;"><i class="fa-solid fa-check"></i></a>&nbsp;
                                <button type="button" class="btn btn-primary a_sua" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['MaTinTuc'] ?>" >
                                    <i class="fa-solid fa-eye"></i>
                                </button>&nbsp;
                                <a href="delete.php?ID=<?= $row["MaTinTuc"]; ?>" class="a_sua1"><i class='bx bx-trash'></i></a>
                                <?php 
                                    if($row["ID_TT"] == "1"){    
                                ?>
                                    <button type="button" class="btn btn-primary a_sua" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row["MaTinTuc"] ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                <?php } ?>
                        </td>
    </tr>
    <?php if(isset($_GET["m"])) : ?>
        <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
    <?php endif; ?>
    <!---modal chi tiết--->
    <div class="modal fade" id="exampleModal<?php echo $row['MaTinTuc'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết tin tức</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form_ct_1">
                    <label>Mã bài viết:</label>
                    <p><?php echo $row['MaTinTuc'] ?></p>
                </div>
                <div class="form_ct_1">
                    <label>Tên bài viết:</label>
                    <p><?php echo $row['TenBaiViet'] ?></p>
                </div>
                <div class="form_ct_1">
                    <label>Tác giả:</label>
                    <p><?php echo $row['HoTen'] ?></p>
                </div>
                <div class="form_ct_1">
                    <label>Thời gian gửi bài:</label>
                    <p><?php echo $row['ThoiGian'] ?></p>
                </div>
                <div class="form_ct_1">
                    <label>Nội dung bài viết:</label>
                    <div class="form_a00">
                    <p><?php echo $row['NoiDung'] ?></p>
                        <a href="download.php?file=<?php echo $row['NoiDung'] ?>"><i class="fa-solid fa-download"></i></a>
                    </div>
                </div>
                <div class="form_ct_1">
                    <label>Nội dung (Đã chỉnh sửa):</label>
                    <div class="form_a00">
                    <p><?php echo $row['EditNoiDung'] ?></p>
                        <a href="download.php?file=<?php echo $row['EditNoiDung'] ?>"><i class="fa-solid fa-download"></i></a>
                    </div>
                </div>
                <div class="form_ct_1">
                    <label>File âm thanh:</label><br>
                    <audio controls>
                        <source src="../upload/<?php echo $row['AmThanh']; ?>">
                    </audio>
                </div>
                <div class="form_ct_1">
                    <label>Trạng thái:</label>
                    <p><?php echo $row['TenTrangThai'] ?></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!--===modal sửa====-->
    <div class="modal fade" id="staticBackdrop<?php echo $row["MaTinTuc"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form cập nhật bài viết</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Mã tin tức</label>
                    <input type="text" readonly id="TextInput" class="form-control" placeholder="" name="id" value="<?php echo $row['MaTinTuc']?>">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Nội dung đã chỉnh sửa(Nếu có)</label>
                    <input type="file" id="TextInput" class="form-control" placeholder="" name="file_word">
                </div>
                <center>
                    <button type="submit" name="btn_cn" class="btn_cn">Cập nhật</button>
                </center>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!--===the end====--->
   
    <?php
                }
            }
            else{
                echo "<td style='text-align: center;'>Không có dữ liệu</td>";
            }
        ?>
 </form>
</table>
<!---phân trang--->
    
<!---end--->
</div>

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
                zeroRecords: "Không có dữ liệu",
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
<script>
        function select_all(){
            if(jQuery('#delete').prop("checked")){
                jQuery('input[type=checkbox]').each(function(){
                    jQuery('#'+this.id).prop('checked', true);
                });
            }else{
                jQuery('input[type=checkbox]').each(function(){
                    jQuery('#'+this.id).prop('checked', false);
                })
            }
        }
        function delete_all(){
            var check=confirm("Bạn có chắc muốn xóa?");
            location="index.php";
            if(check==true){
            jQuery.ajax({
                url: 'deleleall.php',
                
                type:'post',
                data:jQuery('#frm').serialize(),
                success:function(result){
                        jQuery('input[type=checkbox]').each(function(){
                        if(jQuery('#'+this.id).prop(":checked")){
                            jQuery('#box'+this.id).remove();
                        }
                    });
                }
            });
        }
        }
</script>
    <script>
    $(".a_sua1").on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr("href")
        Swal.fire({
            text: "Bạn có chắc muốn xóa!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa!'
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
<script>
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
</script>
<!---xử lý sửa--->
<?php 
    if(isset($_POST["btn_cn"])){
        $id = $_POST["id"];
        $doc = $_FILES["file_word"]["name"];
        $doc_type = $_FILES["file_word"]["type"];
        $doc_size = $_FILES["file_word"]["size"];
        $doc_tem_loc = $_FILES[ "file_word"]["tmp_name"];
        $doc_store ="../upload/".$doc;   
        $tt = "2";
        mysqli_query($kn,"UPDATE tbl_news SET EditNoiDung='$doc', ID_TT='$tt' WHERE MaTinTuc='$id'");
        // $query = "INSERT INTO tbl_news (EditNoiDung) VALUES ('$filename')";
        // $query_run = mysqli_query($kn, $query);
        // $query1 = "UPDATE tbl_news SET EditNoiDung='$filename', ID_TT='$tt' WHERE MaTinTuc='$id'";
        // $query_run = mysqli_query($kn, $query1);
        move_uploaded_file($doc_tem_loc, $doc_store);
        // if($query_run){
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
                // location.history.back();
            </script>";
            
        // }
        // else{
        //         echo "<script>
        //         $(document).ready(function(){
        //             Swal.fire({
        //                 title: 'Thông báo',
        //                 text: 'Cập nhật dữ liệu thất bại!',
        //                 icon: 'erorr',
        //                 timer: 5000,
        //                 showComfirmButton: false
        //             });				
        //         });
               
        //     </script>";
        //     }
        // }

    }
        // $query = "UPDATE tbl_news SET EditNoiDung='$filename', ID_TT='$tt' WHERE MaTinTuc='$id'";
        // $query_run = mysqli_query($kn, $query);
        // move_uploaded_file($doc_tem_loc, $doc_store);
        // if($query_run){

        //     echo "<script>
        //     $(document).ready(function(){
        //         Swal.fire({
        //             title: 'Thông báo',
        //             text: 'Cập nhật dữ liệu thành công!',
        //             icon: 'success',
        //             timer: 5000,
        //             showComfirmButton: false
        //         });				
        //     });
        //     // location.history.back();
        // </script>";
        
        // }
        // if($query_run){
        //     echo "<script>
        //     $(document).ready(function(){
        //         Swal.fire({
        //             title: 'Thông báo',
        //             text: 'Cập nhật dữ liệu thành công!',
        //             icon: 'success',
        //             timer: 5000,
        //             showComfirmButton: false
        //         });				
        //     });
        //     // location.history.back();
        // </script>";
        
        // }
        // else{
        //     echo "<script>
        //     $(document).ready(function(){
        //         Swal.fire({
        //             title: 'Thông báo',
        //             text: 'Cập nhật dữ liệu thất bại!',
        //             icon: 'erorr',
        //             timer: 5000,
        //             showComfirmButton: false
        //         });				
        //     });
           
        // </script>";
        
        // }
        // if(!in_array($extension,['pdf','doc','docx'])){
        //     echo "<script>
		// 		$(document).ready(function(){
		// 			Swal.fire({
		// 				title: 'Thông báo',
		// 				text: 'File thông đúng định dạng(Định dạng cho phép: doc, docx)',
		// 				icon: 'warning',
		// 				timer: 5000,
		// 				showComfirmButton: false
		// 			});		
		// 		});
        //         window.history.back();
		// 	</script>";
        // }
        // else{
        //         $sql = "INSERT INTO tbl_news (EditNoiDung, ID_TT) VALUES('$filename','$tt')";
        //         $query_run = mysqli_query($kn, $sql);
        //         if($query_run){   
        //             move_uploaded_file($filename, $filepath);
        //             echo "<script>
        //                 $(document).ready(function(){
        //                     Swal.fire({
        //                         title: 'Thông báo',
        //                         text: 'Cập nhật dữ liệu thành công!',
        //                         icon: 'success',
        //                         timer: 5000,
        //                         showComfirmButton: false
        //                     });				
        //                 });
        //                 // window.history.back();
        //                 </script>";
        //         }
        //         else{
        //             echo "<script>
        //             $(document).ready(function(){
        //                 Swal.fire({
        //                     title: 'Thông báo',
        //                     text: 'Cập nhật dữ liệu không thành công',
        //                     icon: 'warning',
        //                     timer: 5000,
        //                     showComfirmButton: false
        //                 });		
        //             });
        //             // window.history.back();
        //         </script>";
        //         }
        //     }
        

?>
<!--the end--->
<?php
    require("../templates/footer.php");
?>
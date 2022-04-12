<?php
    require("../templates/header.php");
    require("../../include/ketnoi.php");
    $id = $_SESSION["GiaoVien"];
    $sql = "SELECT * FROM tbl_news a, tbl_account b, tbl_status c WHERE a.Username = b.Username AND a.ID_TT = c.ID_TT AND a.Username = '$id'";
    $sql_1 = mysqli_query($kn, $sql);
   
    
?>
    <style>
        .heading-top {
            width: 100%;
            height: 60px;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            border-radius: 8px;
        }
        .heading-top a{
            width: 130px;
            height: 40px;
            background-color: #0066ff;
            display: block;
            text-align: center;
            color: #fff;
            text-decoration: none;
            padding-top: 8px;
            border-radius: 4px;
            margin-left: 15px;
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
        .heading_top {
            width: 90%;
            height: 40px;
            border-left: 5px solid #0066ff;
            margin-left: 7px;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .heading_top h2{
            padding-left: 8px;
        }
        .btn_capnhat {
            width: 150px;
            height: 40px;
            border: none;
            border-radius: 5px;
            background-color: #0066ff;
            color: #fff;
        }
        .td_nd {
            max-width: 150px;
            white-space: nowrap; 
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <div class="heading-top">
        <a href="../../code/News/add.php">Thêm bài viết</a>
    </div>
    <div class="heading_top">
        <h2>Bài viết của bạn</h2>
    </div> 
    
    <!-- <a href="../News/word.php">Xuất excel</a> -->
<div class="card_table">
<table class="table datatable" id="myTable">
    <thead>
        <tr>
        <th scope="col">Tên bài viêt</th>
        <th scope="col">Tác giả</th>
        <th scope="col">Nội dung</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Chi tiết</th>
        <th scope="col">Cập nhật</th>
        </tr>
    </thead>
    <?php 
        if(mysqli_num_rows($sql_1) > 0)
        {
            foreach($sql_1 as $row)
            {
                ?>
                  
                   
					<tr>
                        <!-- <td><?php echo $row['MaTinTuc']; ?></td> -->
						<td><?php echo $row['TenBaiViet']; ?> </td>
                        <td><?php echo $row['HoTen']; ?> </td>
						<td class="td_nd"><?php echo $row['NoiDung']; ?></td>
                        <td><?php
                                if($row["ID_TT"] == "1"){
                                    echo "<span style='color: #0066ff'>Đang chờ duyệt</span>";
                                }
                                if($row["ID_TT"] == "2"){
                                    echo "<span style='color: green'>Duyệt thành công</span>";
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
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php $row['MaTinTuc'] ?>">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1<?php $row['MaTinTuc'] ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </td>
					</tr> 
                    <!-- $date = date_create_from_format('d M, Y', '<?php $row['ThoiGian'] ?>'); -->
                   
<div class="modal fade" id="exampleModal<?php $row['MaTinTuc']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mã bài viết</label>
                <input type="text" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['MaTinTuc'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tên bài viết</label>
                <input type="text" class="form-control" readonly id="exampleInputPassword1" value="<?php echo $row['TenBaiViet'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tác giả</label>
                <input type="text" class="form-control" readonly id="exampleInputPassword1" value="<?php echo $row['HoTen'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ngày gửi bài</label>
                <input type="text" class="form-control" readonly id="exampleInputPassword1" value="<?php echo $newFormat = date_format($date,"Y/m/d H:i:s"); ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nội dung</label>
                <input type="text" class="form-control" readonly id="exampleInputPassword1" value="<?php echo $row['NoiDung'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Âm thanh</label><br>
                <audio controls>
                    <source src="../upload/<?php echo $row['AmThanh']; ?>"></source>
                </audio>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Trạng thái</label>
                <input type="text" class="form-control" readonly id="exampleInputPassword1" value="<?php echo $row['TenTrangThai']; ?>">
            </div>
        </form>                     
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<!---form cập nhật---->
<div class="modal fade" id="exampleModal1<?php $row['MaTinTuc']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row["MaTinTuc"] ?>">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">File Âm thanh mới</label>
                    <input type="file" class="form-control" id="upload" name="txt_file"/>         
                </div>
                <audio id="audio" controls>
                    <source src="" id="src" />
                </audio>
                <div class="mb-3">
                     <label for="exampleInputPassword1" class="form-label">File âm thanh cũ</label><br>
                     <audio id="audio" controls >
                         <source src="../upload/<?php echo $row['AmThanh'] ?>" id="src" name="txt_audio_cu" class="form-control" />
                    </audio>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nội dung</label>
                    <input type="file" class="form-control" name="txt_doc"/>           
                </div>
                <label style="font-weight: 500">Nội dung cũ</label>
                <input type="text" class="form-control" name="file_doc_cu" value="<?php echo $row['NoiDung'] ?>"></input>
                <br>
                <center>
                    <button type="submit" name="btn_capnhat" class="btn_capnhat">Cập nhật</button>
                </center>
            </form>
        </div>
    </div>
</div>
<!---end---->
                    <?php
                            }
                        }
                        else
                        {
                            ?>
                                <tr>
                                    <td colspan="4">Không có dữ liệu</td>
                                </tr>
                            <?php
                        }
                        
                    ?>
                 <!-- Modal -->
    
    </table>
    <!---script--->
    <script>
        function handleFiles(event) {
            var files = event.target.files;
            $("#src").attr("src", URL.createObjectURL(files[0]));
            document.getElementById("audio").load();
        }
        document.getElementById("upload").addEventListener("change", handleFiles, false);
    </script>   
<?php
    require("../templates/footer.php");
?>
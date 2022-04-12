<?php
    require("../templates/header.php");
    require("../../include/ketnoi.php");
    $sql = "SELECT * FROM tbl_news a, tbl_account b, tbl_status c WHERE a.Username = b.Username AND a.ID_TT = c.ID_TT AND a.ID_TT ='2'";
    $sql_1 = mysqli_query($kn, $sql);
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
    </style>
<div class="card_table">
<table class="table datatable" id="myTable">
<thead>
    <tr>
      <th scope="col">Tên bài viết</th>
      <th scope="col">Tác giả</th>
      <th scope="col">Ngày gửi bài</th>
      <th scope="col">Nội dung</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Tác vụ</th>
    </tr>
</thead>
  <?php while ($row = mysqli_fetch_array($sql_1)) {
				# code...
			 ?>
    
    <tr>
      <td style="width: 100px"><?php echo $row["TenBaiViet"]?></td>
      <td><?php echo $row["HoTen"]?></td>
      <td><?php echo $row["ThoiGian"]?></td>
      <td><p class="td_nd"><?php echo $row["NoiDung"]?></p></td>
      <td><?php
                                if($row["ID_TT"] == "2"){
                                    echo "<span style='color: green'>Duyệt thành công</span>";
                                }
                            ?>
                                <br>
                                <!-- <button type="button" class="btn btn-primary a_sua" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Cập nhật
                                </button> -->
                        </td>
      <td class="td_sua">
            <button type="button" class="btn btn-primary a_sua" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['MaTinTuc'] ?>" >
                <i class="fa-solid fa-eye"></i>
            </button>&nbsp;
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
                <h5 class="modal-title" id="staticBackdropLabel">Form cập nhật</h5>
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
                    <input type="file" id="TextInput" class="form-control" placeholder="" name="file_doc">
                </div>
                <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Trạng thái</label>
                <?php
                    include("../../include/ketnoi.php");
                    $sqli = "SELECT * FROM tbl_status";
                    $result = mysqli_query($kn,$sqli);
                    echo "<select name='txt_tt' class='form-select' required aria-label='select example'>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['ID_TT'] ."'>" . $row['TenTrangThai'] ."</option>";
                    }
                    echo "</select>";
                    ?>
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
    <?php } ?>
</table>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
<!--the end--->
<?php
    require("../templates/footer.php");
?>
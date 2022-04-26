  
<?php
    require("../templates/header.php");
?>
    <style>
        .form_card {
            width: 90%;
            margin: auto;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            margin-bottom: 1rem;
        }
        .form_card form {
            width: 90%;
            margin: auto;
            margin-top: 1rem;
        }
        .layout-btn {
            display: flex;
            justify-content: center;
        }
        .btn-primary {
            margin: 0 15px;
            width: 100px;
            font-size: 16px;
            font-weight: 600;
        }
        .btn-danger {
            width: 100px;
        }
        .form_heading {
            width: 90%;
            margin: auto;

            border-left: 5px solid #0066ff;
        }
        .form_heading h2{
            padding-left: 15px;
        }
        .docErr {
            display: none;
        }
    </style>
    <!---form--->
    <div class="form_heading">
        <h2>Thêm bài viết</h2>
    </div>
    <div class="form_card">
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên bài viết</label>
            <input type="text" class="form-control" name="txt_td" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
       
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Thể loại</label>
            <select class="form-select" name="txt_tl">
                <option>Tin tức</option>
                <option>Thông báo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Số file A4</label>
            <input type="text" class="form-control" name="txt_size"/>         
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Số lượng ảnh</label>
            <input type="number" class="form-control" name="txt_number"/>         
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">File Âm thanh</label>
            <input type="file" class="form-control" id="upload" name="txt_file"/>         
        </div>
        <audio id="audio" controls>
            <source src="" id="src" />
        </audio>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nội dung</label>
            <input type="file" name="txt_noidung" class="form-control" id="file1" required>
        </div>
        <div class="layout-btn">
            <button type="submit" class="btn btn-danger" onclick="history.back()">Thoát</button>
            <button type="submit" class="btn btn-primary" name="btn_add_news">Thêm</button>
            <button type="submit" class="btn btn-light">Làm mới</button>
            
        </div>
        <br>
    </form>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    function handleFiles(event) {
        var files = event.target.files;
        $("#src").attr("src", URL.createObjectURL(files[0]));
        document.getElementById("audio").load();
    }
    document.getElementById("upload").addEventListener("change", handleFiles, false);
</script>
<script>
    $(document).ready(function(){
    $("#test_button").click(function() {
    var test_value = $("#test_input").val();
    var extension = test_value.split('.').pop().toLowerCase();
    if ($.inArray(extension, ['png', 'gif', 'jpeg', 'jpg']) == -1) {
    alert("File ảnh không hợp lệ!");
    return false;
    } else {
    alert("File ảnh hợp lệ!");
    return false;
    }
    });
    });
</script>
<script>
    function validata(){
        var fileinput = document.getElementById("file1");
        var filepath = fileinput.value;
        var allower = /(\.doc|\.docx|\.pdf)$/i;
        if(!allower.exec(filepath)){
            alert("Không đúng định dạng file");
            fileinput.value ='';
            return false;
        }else{
            return true;
        }
    }
</script>
    <!--- the end--->
    <?php
        require("../../include/ketnoi.php");
        $id = $_SESSION["ID_TK"];
        $sql = "SELECT * FROM tbl_account a, tbl_status b WHERE a.ID_TT = b.ID_TT AND ID_TK ='$id'";
        $sql_1 = mysqli_query($kn, $sql);
        $status ="1";
        // printf($sql_1);
        if(isset($_POST["btn_add_news"])){
            $name = $_POST["txt_td"];
            $tl = $_POST["txt_tl"];
            $sizedoc = $_POST["txt_size"];
            $number = $_POST["txt_number"];
            $audio = $_FILES["txt_file"]["name"];
            $audio_tmp_name = $_FILES["txt_file"]["tmp_name"];
            $audio_size =$_FILES["txt_file"]["size"];
            $doc = $_FILES["txt_noidung"]["name"];
            $doc_type = $_FILES["txt_noidung"]["type"];
            $doc_size = $_FILES["txt_noidung"]["size"];
            $doc_tem_loc = $_FILES[ "txt_noidung"]["tmp_name"];
            $doc_store ="../upload/".$doc;
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $today = date('Y-m-d H:i'.date_default_timezone_get());
            
            // $id = $_SESSION['user'];
            $query = "INSERT INTO tbl_news (TenBaiViet,ThoiGian,TheLoai,NoiDung,DungLuong,DungLuongAnh,AmThanh,ID_TK,ID_TT) VALUES ('$name','$today','$tl','$doc','$sizedoc','$number','$audio','$id','$status')";
            $query_run = mysqli_query($kn, $query);
            move_uploaded_file($audio_tmp_name, '../upload/'.$audio);
            move_uploaded_file($doc_tem_loc, $doc_store);
            if($query_run){
                echo "<script>
				$(document).ready(function(){
					Swal.fire({
						title: 'Thông báo',
						text: 'Thêm tin tức thành công!',
						icon: 'success',
						timer: 5000,
						showComfirmButton: false
					});				
				});
			</script>";
			
            }
            else{
                echo "<script>
				$(document).ready(function(){
					Swal.fire({
						title: 'Thông báo',
						text: 'Thêm dữ liệu thất bại!',
						icon: 'erorr',
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<?php 
    require("../../include/ketnoi.php");
    if(isset($_POST["btn_capnhat"])){
       $id =$_POST["id"];
       $audio = $_FILES["txt_file"]["name"];
  
       $audio_tmp_name = $_FILES["txt_file"]["tmp_name"];
       $audio_size =$_FILES["txt_file"]["size"];
       $doc = $_FILES["txt_doc"]["name"];
       $doc_type = $_FILES["txt_doc"]["type"];
       $doc_size = $_FILES["txt_doc"]["size"];
       $doc_tem_loc = $_FILES[ "txt_doc"]["tmp_name"];
       $doc_store ="../upload/".$doc;
       
        
        if($audio != NULL && $doc != NULL){
            move_uploaded_file($audio_tmp_name, '../upload/'.$audio);
            move_uploaded_file($doc_tem_loc, $doc_store);
            $query = "UPDATE tbl_news SET AmThanh='$audio', NoiDung='$doc' WHERE MaTinTuc='$id'";
            $query_run = mysqli_query($kn, $query);
            if($query_run){
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
                location.history.back();
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
               
            </script>";
            }
        }
       elseif($audio != NULL && $doc == NULL){
            move_uploaded_file($audio_tmp_name, '../upload/'.$audio);
            $query = "UPDATE tbl_news SET AmThanh='$audio' WHERE MaTinTuc='$id'";
            $query_run = mysqli_query($kn, $query);
            if($query_run){
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
                location.history.back();
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
               
            </script>";
            }
       }
       elseif($audio == NULL && $doc !=NULL){
            move_uploaded_file($doc_tem_loc, $doc_store);
            $query = "UPDATE tbl_news SET NoiDung='$doc' WHERE MaTinTuc='$id'";
            $query_run = mysqli_query($kn, $query);
            if($query_run){
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
                location.history.back();
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
               
            </script>";
            }
       }
       
        
    }
?>
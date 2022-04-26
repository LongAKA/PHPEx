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

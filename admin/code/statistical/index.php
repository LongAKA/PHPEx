<?php
    require("../../include/ketnoi.php");
    require("../templates/header.php");
    $sql = "SELECT * FROM tbl_news a, tbl_account b WHERE a.ID_TK = b.ID_TK AND a.ID_TT ='2'";
    $result = mysqli_query($kn,$sql);
    $sql = "select MaTinTuc from tbl_news register order by MaTinTuc";
    $sql_run = mysqli_query($kn, $sql);
    $row_hs = mysqli_num_rows($sql_run);
    //count 2
    $sql1 = "select ID_TK from tbl_account register order by ID_TK";
    $sql_run1 = mysqli_query($kn, $sql1);
    $row_hs1 = mysqli_num_rows($sql_run1);

    //count 2
    $sql2 = "select ID_TT from tbl_news where ID_TT = '2'";
    $sql_run2 = mysqli_query($kn, $sql2);
    $row_hs2 = mysqli_num_rows($sql_run2);
?>
    <style>
        .table {
            width: 95%;
            margin: auto;
            text-align: center;
            counter-reset: rowNumber;
        }
        .table .tr1{
            border: 1px solid #ccc;
            counter-increment: rowNumber;
        }
        .table .tr1 .td_a0:first-child::before {
            content: counter(rowNumber);
            min-width: 1em;
            margin-right: 0.5em;
            }
        .table .tr_a{
            background-color: #0066ff;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
        }
        .table tr td{
            border: 1px solid #ccc;
        }
       .bieumau_ex {
           display: flex;
           justify-content: center;
       }
       .bm_e{
           margin: 0 30px;
       }
       .bieumau_ex h3{
           font-size: 20px;
       }
       .h2_aa{
           text-align: center;
           font-size: 22px;
           margin-top: 30px;
           margin-bottom: 15px;
       }
       .txt_a1 {
           width: 35px;
           border: 1px solid #ccc;
           border-radius: 5px;
       }
       .txt_a3 {
           width: 100px;
           border: 1px solid #ccc;
           border-radius: 5px;
       }
        .btn_ex{
           width: 150px;
           background-color: #209E62;
           border: none;
       }
       .btn_ex i{
           margin: 0 12px;
       }
       .form-excel {
           width: 95%;
           margin: auto;
       }
       .card-excel {
           width: 95%;
           margin: auto;
           box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
           margin-bottom: 1rem;
           border-radius: 5px;
       }
       .box-hover {
             display: flex;
             margin-bottom: 2rem;
             justify-content: center;
        }
        .counter {
             width: 250px;
             height: 100px;
             display: flex;
             flex-direction: column;
             border-left: 5px solid #0066ff;
             border-radius: 8px;
             box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
             margin: 0 15px;
             
         }
         .counter-title {
             font-size: 25px;
             color: #0066ff;
             font-weight: 600;
             display: flex;
             padding-left: 5px;
         }
         .counter-title i{
             margin-left: 40px;
             margin-top: 15px;
             font-size: 35px;
         }
         .fa-user {
             font-size: 25px;
             padding-left: 10px;
         }  
         .bm_a0 {
             width: 95%;
             height: 35px;
             margin: auto;
             margin-bottom: 1rem;
             border-left: 5px solid #0066ff;
         }   
         .bm_a0 h2{
             padding-left: 10px;
             font-size: 25px;
         } 
         .a2 {
             width: 80px;
         }
         .p_a{
             text-transform: capitalize !important;
         }
    </style>
    <div class="box box-hover">
        <div class="counter">
            <div class="counter-title">
                 Tổng bài viết
                <i class="fa-solid fa-newspaper"></i>
            </div>
            
            <div class="counter-info">
                <div class="counter-count">
                <?php
                        echo '<h2> &nbsp;' .$row_hs. '</h2>';
                    ?>
                </div>
                
            </div>    
        </div>
        <div class="counter">
            <div class="counter-title">
                 Tài khoản
                 <i class="fa-solid fa-user-gear"></i>
            </div>
            
            <div class="counter-info">
                <div class="counter-count">
                <?php
                        echo '<h2> &nbsp;' .$row_hs1. '</h2>';
                    ?>
                </div>
                
            </div>    
        </div>

        <div class="counter">
            <div class="counter-title">
                 Đã duyệt
                 <i class="fa-solid fa-check" style="color: green;"></i>
            </div>
            
            <div class="counter-info">
                <div class="counter-count">
                <?php
                        echo '<h2> &nbsp;' .$row_hs2. '</h2>';
                    ?>
                </div>
                
            </div>    
        </div>
    </div>
    <div class="bm_a0">
        <h2>Biểu mẫu thống kê</h2>
    </div>
    <div id="exportContent">
    <div class="card-excel">
    <div class="bieumau_excel">
        <form action="excel.php" method="post">       
            <div class="bieumau_ex">
                <div class="bm_e">
                    <p style="text-align:center">TRƯỜNG THỰC HÀNH SƯ PHẠM</p>
                    <h3>BAN WEBSITE & TRUYỀN THÔNG</h3>
                </div>
                <div class="bm_e">
                    <h3>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h3>
                    <p style="text-align: center; font-weight: 600;" class="p_a">Độc Lập - Tự Do - Hạnh Phúc</p>
                    <span style="text-transform: inherit; padding-left: 70px">Trà Vinh, ngày 12 tháng 5 năm 2022</span>
                </div>
            </div>
            <h2 class="h2_aa">BẢNG KÊ BÀI VIẾT TRÊN TRANG WEB<br>TRƯỜNG THỰC HÀNH SƯ PHẠM TỪ THÁNG <input type="text" class="txt_a1" name="txt_month" required> ĐẾN THÁNG <input type="text" class="txt_a1" name="txt_month1" required> NĂM <input type="text" class="txt_a1 a2" name="txt_year" required> </h2>

            <div class="form-excel">
                <p>Căn cứ quyết định số <input type="text" class="txt_a3" name="qd" required> ngày <input type="date" class="txt_a1 a2" name="date" required style="width: 120px"> của Hiệu trưởng Trường Thực hành Sư phạm về việc thành lập Ban Website và truyền thông Trường Thực hành Sư phạm</p>
                <p>Căn cứ qui chế chi tiêu nội bộ của Trường Thực hành Sư phạm</p>
                <p>Căn cứ vào số lượng bài viết đăng trên website Trường Thực hành Sư phạm.</p>
                <p>Ban Website và Truyền thông lập danh sách bài viết đăng trên website của trường từ tháng 4 đến tháng 10 năm 2021 như sau:</p>
            </div>
        
    </div>
    <table border="1" class="table">
        <tr class="tr_a">
            <td rowspan="2">STT</td>
            <td rowspan="2">Tên bài viết</td>
            <td rowspan="2">Tác giả</td>
            <td rowspan="2">Loại</td>
            <td colspan="2">Dung lượng</td>
            <td rowspan="2">Thời gian</td>
            <td rowspan="2">Ghi chú</td>
        </tr>
        <tr class="tr_a">
            <td>Nội dung</td>
            <td>Ảnh</td>
        </tr>
        <?php
        if(mysqli_num_rows($result) > 0)
        {
            foreach($result as $row)
            {
                $date_time_Obj1 = date_create($row["ThoiGian"]);
                    //formatting the date/time object
                    $format1 = date_format($date_time_Obj1, "d/m/Y H:i");
                $sn=1;
                ?>
                
        <tr class="tr1">
            <td class="td_a0"></td>
            <td><?php echo $row["TenBaiViet"]; ?></td>
            <td><?php echo $row["HoTen"]; ?></td>
            <td><?php echo $row["TheLoai"]; ?></td>
            <td><?php echo $row["DungLuong"]; ?></td>
            <td><?php echo $row["DungLuongAnh"]; ?></td>
            <td><?php echo $format1; ?></td>
            <td></td>
        </tr>
        <?php
            $sn++;
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
            
    </table>
        <!-- <button type="submit" name="bnt_add">Thêm</button> -->
    <center><br><br>
        <button type="submit" class="btn btn-primary btn_ex" name="btn_excel"><i class="fa-solid fa-file-export"></i>Export</button><br>
        
    </center><br>
    </form>
    <!-- <form action="pdf.php">
        <button type="submit" class="btn btn-primary btn_ex"><i class="fa-solid fa-file-export"></i>Export</button><br>
    </form> -->
    </div>
    <!-- <button onclick="Export2Word('exportContent');">Export as .doc</button> -->
    </div>
<script>
   function Export2Word(element, filename = ''){
    var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
    var postHtml = "</body></html>";
    var html = preHtml+document.getElementById(element).innerHTML+postHtml;

    var blob = new Blob(['\ufeff', html], {
        type: 'application/msword'
    });
    
    // Specify link url
    var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
    
    // Specify file name
    filename = filename?filename+'.doc':'document.doc';
    
    // Create download link element
    var downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob ){
        navigator.msSaveOrOpenBlob(blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = url;
        
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
    
    document.body.removeChild(downloadLink);
}
</script>
<?php
    require("../templates/footer.php");
?>
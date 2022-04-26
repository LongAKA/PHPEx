<?php
    require("../../include/ketnoi.php");

    // header('Content-type: application/vnd-ms-excel');
    // $filename="excel.xls";
    // header("Content-Disposition:attachment;filename=\"$filename\"");
    $output ="";
        if(isset($_POST["btn_excel"])){
            $t1 = $_POST["txt_month"];
            $t2 = $_POST["txt_month1"];
            $t3 = $_POST["txt_year"];
            $t4 = $_POST["qd"];
            $t5 = $_POST["date"];
            $sql = "INSERT INTO tbl_excel(Thang1, Thang2, Nam, QuyetDinh, Time) VALUES ('$t1','$t2','$t3','$t4','$t5')";
            $result = mysqli_query($kn,$sql);
            $sql = "SELECT * FROM tbl_news a, tbl_account b WHERE a.ID_TK = b.ID_TK AND a.ID_TT ='2'";
            $result = mysqli_query($kn,$sql);
            $sql1 = "SELECT * FROM tbl_excel WHERE Thang1='$t1' AND Thang2='$t2'";
            $result1 = mysqli_query($kn,$sql1);
            $sql2 = "SELECT * FROM tbl_excel WHERE Thang1='$t1' AND Thang2='$t2'";
            $result2 = mysqli_query($kn,$sql2);
            $date = getdate();
            $date_time_Obj = date_create($t5);
            //formatting the date/time object
            $format = date_format($date_time_Obj, "d/m/Y");
            if(mysqli_num_rows($result) > 0){
            $output .="       
            <table>           
            <tr>
               
                <td colspan='3'><center>TRƯỜNG THỰC HÀNH SƯ PHẠM<br><b>BAN WEBSITE & TRUYỀN THÔNG<b></center></td>
                <td colspan='3'><center><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM <br><center>Độc lập - Tự do - Hạnh phúc<b></center><br>
                <span style='font-weight: 100; font-style: italic;'>Trà vinh, ngày $date[mday] tháng $date[mon] năm $date[year]</span></center>
                </td>
          
            </tr>   
            </table>
            ";
            while($row = mysqli_fetch_array($result1)){
            $output .="
                
                <center>
                <h2>BẢNG KÊ BÀI VIẾT TRÊN TRANG WEB<br>TRƯỜNG THỰC HÀNH SƯ PHẠM TỪ THÁNG ".$row['Thang1']." ĐẾN THÁNG ".$row['Thang2']." NĂM ".$row['Nam']."</h2></center>
             
            "; }
            while($row = mysqli_fetch_array($result2)){
            $sn = "1";
            $output .="
                <p>&nbsp;&nbsp;Căn cứ quyết định số ".$row["QuyetDinh"]." ngày ".$format." của Hiệu trưởng Trường Thực hành Sư phạm về việc thành lập Ban Website và truyền thông Trường Thực hành Sư phạm</p>
                <p>&nbsp;&nbsp;Căn cứ qui chế chi tiêu nội bộ của Trường Thực hành Sư phạm</p>
                <p>&nbsp;&nbsp;Căn cứ vào số lượng bài viết đăng trên website Trường Thực hành Sư phạm.</p>
                <p>&nbsp;&nbsp;Ban Website và Truyền thông lập danh sách bài viết đăng trên website của trường từ tháng ".$row['Thang1']." đến tháng ".$row['Thang2']." năm ".$row['Nam']." như sau:</p>
            "; }
            $output .="
                <table class='table' border='1'>
                    <tr>
                        <td rowspan='2'><center><b>STT</b></center></td>
                        <td rowspan='2'><center><b>Tên bài viết</b></center></td>
                        <td rowspan='2'><center><b>Tác giả</b></center></td>
                        <td rowspan='2'><center><b>Loại</b></center></td>
                        <td colspan='2'><center><b>Dung lượng</b></center></td>
                        <td rowspan='2'><center><b>Thời gian</b></center></td>
                        <td rowspan='2'><center><b>Ghi chú</b></center></td>
                    </tr>
                    <tr>
                        <td><center><b>Nội dung</center></b></td>
                        <td><center><b>Ảnh</center></b></td>
                    </tr>
                  
            ";
            while($row = mysqli_fetch_array($result)){
                    $date_time_Obj1 = date_create($row["ThoiGian"]);
                    //formatting the date/time object
                    $format1 = date_format($date_time_Obj1, "d/m/Y H:i");
                $output .="
                    <tr>
                        <td>".$sn."</td>
                        <td>".$row['TenBaiViet']."</td>
                        <td>".$row['HoTen']."</td>
                        <td>".$row['TheLoai']."</td>
                        <td>".$row['DungLuong']."</td>
                        <td>".$row['DungLuongAnh']."</td>
                        <td>".$format1."</td>
                    </tr>
                ";
                $sn++;
            }
            $output .="</table>";
            $output .="<table>
                <tr>
                    <td colspan='3'><center>Người Ký </center><br><center><b>Nguyễn Văn A</b></center></td>
                    <td colspan='3'><center>Người Lập Bản</center> <br><center><b>Nguyễn Văn A</b></center></td>
                </tr>
                </table>
            ";
            header('Content-type: application/xls');
            $filename= 'Baocao'.date('d_m_Y').'.xls';
            header("Content-Disposition:attachment;filename=\"$filename\"");
            echo $output;
        }
    }
?>
<!-- $output .="<table>
                <tr>
                    <td colspan='2'>Người Ký <br><b>Nguyễn Văn A</b></td>
                    <td colspan='2'>Người Lập Bản <br><b>Nguyễn Văn A</b></td>
                </tr>
            
            "; -->
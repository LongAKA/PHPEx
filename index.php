<?php
    require("admin/templates/header.php");
    require("admin/include/ketnoi.php");
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
    .img_gd {
        width: 90%;
        height: 450px;
        border-radius: 8px;
    }
    table.empty {
            width:350px;
            border-collapse:separate;
            empty-cells:hide;
         }
         td.empty {
            padding:5px;
            border-style:solid;
            border-width:1px;
            border-color:#999999;
         }
         .box-hover {
             display: flex;
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
</style>
<?php if (isset($_SESSION["QuanTri"])) { ?>
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
                 Được duyệt
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
   <?php } ?>
<?php
    require("admin/templates/footer.php");
?>
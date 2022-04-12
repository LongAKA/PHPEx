<?php
    require("../../include/ketnoi.php");
    require("../templates/header.php");
   
    // printf($sql);
?>
    <div class="avatar_icon">
        <img src="https://cdn-icons-png.flaticon.com/512/147/147142.png">
    </div>
    <?php
         $id = $_SESSION["GiaoVien"];
         $sql = "SELECT * FROM tbl_account WHERE Username = '$id'";
         $query = mysqli_query($kn,$sql);
         if(mysqli_num_rows($query) > 0){
             while($row = mysqli_fetch_array($query)){
             }
             ?>
                <!-- <h2 style="color: red; text-align: center;"><?php echo $row['Email']; ?></h2>
                <div class="detail_account">

                </div> -->
                <input type="text" value="<?php echo $row['Username']; ?>"
    <?php } ?>
           
<?php
    require("../templates/footer.php");
?>
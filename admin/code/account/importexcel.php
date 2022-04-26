<?php
 session_start();
$uploadfile=$_FILES['uploadfile']['tmp_name'];
require("../../include/ketnoi.php");
require '../PHPExcel/Classes/PHPExcel.php';
require_once '../PHPExcel/Classes/PHPExcel/IOFactory.php';

$objExcel=PHPExcel_IOFactory::load($uploadfile);
foreach($objExcel->getWorksheetIterator() as $worksheet)
{
	$highestrow=$worksheet->getHighestRow();

	for($row=0;$row<=$highestrow;$row++)
	{
		$name=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
        $hoten=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
        $mail=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
        $quyen= "2";
        $pool = array("5","7","a","A","X","L","U","J","s","d","m","1","8","9");
        $count = 1;
        $randompassword ="";
        $rn;
        $randomchar="";
        while($count < 7){
            $rn = rand(0,count($pool) - 1);
            $randomchar=$pool[$rn];
            $randompassword=$randompassword.$randomchar;

            ++$count;
        }
		if($name!='')
		{
			$insertqry="INSERT INTO tbl_account(ID_TK,Username, Password, HoTen, Email, MaQuyen) VALUES ('','$name','$randompassword','$hoten','$mail','$quyen')";
			$insertres=mysqli_query($kn,$insertqry);
            if($insertqry){
                $_SESSION["status"] ='Thêm file excel thành công';
                header('Location: index.php');
            }
            else{
                $_SESSION["status1"] ='Thêm file excel thất bại';
                header('Location: index.php');
            }
		}
	}
}
?>
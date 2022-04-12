<?php  
require("../../include/ketnoi.php");
$sql = "SELECT * FROM tbl_news";  
$setRec = mysqli_query($kn, $sql);  
$columnHeader = 'Ai đi da';  
$columnHeader = "Tên bài viết" . "\t" . "Tác giả" . "\t" . "Ngày giờ" . "\t";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 
 
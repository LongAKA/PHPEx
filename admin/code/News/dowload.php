<?php
	if(!empty($_GET['file'])) {
		$filename = basename($_GET['file']);
		$filePath = "../upload/".$filename;

		if(!empty($filename) && file_exists($filePath)){
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$filename");
			header("Content-Type: application/zip");
			header("Content-Transfer-Encoding: binary");

			readfile($filePath);
			exit();
		}
		else {
			echo "Lỗi!";
		}
	}
?>
<?php 	
	$kn=mysqli_connect("localhost", "root", "", "THSPNews");
	mysqli_query($kn, "SET NAMES 'utf8'");
	if(mysqli_connect_error())
	{
		echo "Disconnect! Error" .mysqli_connect_error();
		exit();
	}
 ?>

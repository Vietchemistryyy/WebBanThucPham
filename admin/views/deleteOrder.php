<?php 
	include("../../conection.php");
	if (isset($_GET['id'])) {
	$ID_HoaDon=$_GET['id'];
	$XuLy=2;
	$sql_Order="UPDATE hoadon SET XuLy='".$XuLy."' where  
        ID_HoaDon=$ID_HoaDon";
        mysqli_query($mysqli,$sql_Order);
  	header('location:../index.php?view=dashboard');
	}
?>
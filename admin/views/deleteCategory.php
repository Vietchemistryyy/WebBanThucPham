<?php 
	include("../../conection.php");
	session_start();
	if (isset($_GET['id'])) {
	$sql_xoa="DELETE FROM danhmuc where danhmuc.ID_DanhMuc='".$_GET['id']."'";
    mysqli_query($mysqli,$sql_xoa);
  	header('location:../index.php?view=cat-product');
	}
?>

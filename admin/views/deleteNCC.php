<?php 
	include("../../conection.php");
	if (isset($_GET['id_NCC'])) {
	$sql_xoa="DELETE FROM nhacungcap where nhacungcap.ID_NCC='".$_GET['id_NCC']."'";
    mysqli_query($mysqli,$sql_xoa);
  	header('location:../index.php?view=list-post');
	}
?>

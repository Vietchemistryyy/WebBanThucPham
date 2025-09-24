<?php
include('../conection.php');
session_start();
$ID_ThanhVien=isset($_SESSION['ID_ThanhVien']) ? $_SESSION['ID_ThanhVien']: '';
$ID_SanPham = isset($_GET['id_product']) ? $_GET['id_product']: '';
$NoiDung = $_POST['NoiDung'];
$ThoiGianBinhLuan = date("Y-m-d H:i:s");
if (isset($_POST['comment'])) {
	$sql_add = "INSERT INTO binhluan(ID_ThanhVien,ID_SanPham,NoiDung,ThoiGianBinhLuan) VALUES('".$ID_ThanhVien."','".$ID_SanPham."','".$NoiDung."','".$ThoiGianBinhLuan."')";
	mysqli_query($mysqli,$sql_add);
	header("location: infoProduct.php?id_product={$_GET['id_product']}");
}
else{
	header('location:../index.php');
}
?>

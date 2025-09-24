<?php
include("../conection.php");
session_start();
$id= isset($_GET['id']) ? $_GET['id']: '';
$soluong= isset($_POST['soluong']) ? $_POST['soluong']: '';
$product="SELECT * FROM sanpham WHERE ID_SanPham='".$id."' LIMIT 1";
$query=mysqli_query($mysqli,$product);
$row=mysqli_fetch_assoc($query);
if($row){
	if (isset($_SESSION['cart'])) {
		if (isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]['qty']+=$soluong;
		}else{
			$_SESSION['cart'][$id]['qty']=$soluong;
		}
		$_SESSION['cart'][$id]['ID_SanPham']=$row['ID_SanPham'];
		$_SESSION['cart'][$id]['TenSanPham']=$row['TenSanPham'];
		$_SESSION['cart'][$id]['Img']=$row['Img'];
		$_SESSION['cart'][$id]['GiaBan']=$row['GiaBan'];
		header('location:index.php');exit();

	}else{
		$_SESSION['cart'][$id]['ID_SanPham']=$row['ID_SanPham'];	
		$_SESSION['cart'][$id]['qty']=$soluong;
		$_SESSION['cart'][$id]['TenSanPham']=$row['TenSanPham'];
		$_SESSION['cart'][$id]['Img']=$row['Img'];
		$_SESSION['cart'][$id]['GiaBan']=$row['GiaBan'];
		header('location:index.php');exit();
	}
}else{
	header('location:../index.php');exit();	
}
?>
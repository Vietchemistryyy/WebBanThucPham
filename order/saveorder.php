<?php
	include("../conection.php");
	session_start();
	if (isset($_POST['submit'])) {
		// code...
	$ID_ThanhVien=isset($_GET['id']) ? $_GET['id']: '';
	$sql_ThanhVien = "SELECT * FROM thanhvien WHERE ID_ThanhVien=$ID_ThanhVien LIMIT 1";
  	$query_ThanhVien = mysqli_query($mysqli,$sql_ThanhVien);
  	$row= mysqli_fetch_array($query_ThanhVien);
	$ThoiGianLap=date("Y-m-d H:i:s");
	$DiaChi=$row['DiaChi'];
	 if (isset($_SESSION['cart'])) {
	 		 $allMoney=0;
            $allAmount=0;
          foreach ($_SESSION['cart'] as $value) {
            $Money =$value['qty']*$value['GiaBan'];
            $amount=$value['qty'];
            $allMoney +=$Money;
            $allAmount+=$amount;
          }
	$SoDienThoai=$row['SoDienThoai'];
	$GiaTien=$allMoney;
}
	$sql_saveOrder="INSERT INTO hoadon(ID_ThanhVien,ThoiGianLap,DiaChi,GiaTien,SoDienThoai) VALUES('".$ID_ThanhVien."','".$ThoiGianLap."','".$DiaChi."','".$GiaTien."','".$SoDienThoai."')";
		mysqli_query($mysqli,$sql_saveOrder);
		
	header("location:phuongthucthanhtoan.php?id={$ID_ThanhVien}");
	}
?>
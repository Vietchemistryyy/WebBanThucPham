<?php
include('../conection.php');
session_start();
$ID_ThanhVien = isset($_SESSION['ID_ThanhVien']) ? $_SESSION['ID_ThanhVien'] : '';
?>

<?php
if (isset($_GET['id'])) {
  $ID_Order = $_GET['id'];
} else {
  echo "Empty query!";
  exit;
}
if (!isset($ID_Order)) {
  echo "Empty isbn! check again!";
  exit;
}
if (isset($_POST['sua'])) {
  $DiaChi = $_POST['DiaChi'];
  $GhiChu = $_POST['GhiChu'];
  $SoDienThoai = $_POST['SoDienThoai'];
  if ($DiaChi == "") {
    echo "vui long nhap DiaChi!<br />";
  }
  if ($SoDienThoai == "") {
    echo "vui long nhap SoDienThoai<br />";
  }
  if ($DiaChi != "" && $SoDienThoai != "") {
    $sql_fix = "UPDATE  hoadon  SET DiaChi = '" . $DiaChi . "', GhiChu = '" . $GhiChu . "', SoDienThoai = '" . $SoDienThoai . "' WHERE ID_HoaDon= '$_GET[id]'";
    mysqli_query($mysqli, $sql_fix);
    header("location:phuongthucthanhtoan.php?id={$ID_ThanhVien}");
  }
}
?>

<?php

$sql_getOrder = "SELECT * FROM hoadon where ID_HoaDon='$ID_Order' LIMIT 1";
$query_getOrder = mysqli_query($mysqli, $sql_getOrder);
$row = mysqli_fetch_array($query_getOrder);
$sql_getCus = "SELECT * FROM thanhvien where ID_ThanhVien='$ID_ThanhVien' ORDER BY ID_ThanhVien DESC";
$query_getCus = mysqli_query($mysqli, $sql_getCus);
$row_getCus = mysqli_fetch_array($query_getCus);
?>
<!DOCTYPE html>
<html style="scroll-behavior: smooth">

<head>
  <meta charset=utf-8>
  <title>Sản phẩm</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/js/bootstrap.bundle.js">
  <link rel="stylesheet" href="../bootstrap/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../themify-icons/themify-icons.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">

</head>

<body>
  <div class="sticky-top">
    <div class="menu sticky-top">
      <nav class="navbar navbar-expand-lg header-custom" style="background-color: #248A32;">
        <div class="container-fluid font-header-custom">
          <a class="navbar-branch" href="../index.php">
            <img src="../image/logo/logochinh.png" height="80">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="index.php" style="color:white;">TẤT CẢ SẢN PHẨM</a>
              </li>

              <!-- Search -->


              <li class="nav-item">
                <a class="nav-link" href="../cart" style="color:white;">GIỎ HÀNG</a>
              </li>
              <?php if (isset($_SESSION['TenDangNhap'])) { ?>

                <li class="nav-item">
                  <a class="nav-link active" href="../historyOrder.php" style="color:white;">LỊCH SỬ ĐẶT HÀNG</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../ThanhVien/logout.php" style="color:white;">ĐĂNG XUẤT</a>
                </li>
                <li class="nav-item">
                  <a type="button" class="btn btn-secondary"
                    href="../ThanhVien/profile.php?id=<?php echo $_SESSION['ID_ThanhVien'] ?>" id="btn"
                    style="color:white;"></span>
                    <?php echo $_SESSION['HoVaTen'] ?>
                  </a>
                </li>
              <?php } else { ?>
                <li><a type="button" class="btn btn-secondary" href="../ThanhVien/login.php">&nbsp;ĐĂNG NHẬP </a></li>
              <?php } ?>
            </ul>
            <?php
            if (isset($_SESSION['cart'])) {
              ?>
              <h5></h5>
              <?php
            }
            ?>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="container">
    <div class="get-order" style="float: left; ">
      <h2>Sửa Thông tin người dùng</h2>
      <div class="alert alert-success" role="alert">
        <form method="POST" action="">
          <tr>
            <label>Tên Khách hàng:&nbsp;
              <?php echo $row_getCus['HoVaTen'] ?> &nbsp; &nbsp;
            </label>
            </br>
            <label>Mã hóa đơn:&nbsp;
              <?php echo $row['ID_HoaDon'] ?> &nbsp; &nbsp;
            </label>

            <label>Thời gian tạo:&nbsp; &nbsp;
              <?php echo $row['ThoiGianLap'] ?> &nbsp; &nbsp;
            </label>
            </br>
            <label>Tổng Tiền: &nbsp; &nbsp;
              <?php echo $row['GiaTien'] ?> đ
            </label>
            </br>
            <td>Dia Chi</td>
            <td><input class="form-control" type="text" name="DiaChi" value="<?php echo $row['DiaChi']; ?>"></td>
            <td>
              <p>SDT</p>
            </td>
            <td> <input class="form-control" type="text" name="SoDienThoai" value="<?php echo $row['SoDienThoai']; ?>">
            </td>
            <td>
              <p>Ghi CHu</p>
            </td>
            <td> <input class="form-control" type="text" name="GhiChu" value="<?php echo $row['GhiChu']; ?>"></td>
            <td></br></td>
            <td><input type="submit" name="sua" value="FIX"></td>
          </tr>
        </form>
      </div>
    </div>
  </div>
  <hr class="hr--large">
  <div class="space" style="text-align: center; background-color: #white ">
    <img style="" src="../image/thanhspace.PNG">


    <p class="site-footer__copyright-content">
      © 2025,
      <a href="http://localhost/BanThucPham/index.php" \title="" style=" color: red"> Nhóm 15</a>
  </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>
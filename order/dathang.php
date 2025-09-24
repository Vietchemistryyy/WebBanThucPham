<?php
include("../conection.php");
session_start();

if (isset($_POST['back'])) {
  unset($_SESSION['cart']);
  header('location:../index.php');
}
$sql_getOrder = "SELECT * FROM hoadon ORDER BY ID_HoaDon DESC LIMIT 1";
$query_getOrder = mysqli_query($mysqli, $sql_getOrder);
$row_getOrder = mysqli_fetch_array($query_getOrder);
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
                <a class="nav-link active" href="../sanpham/index.php" style="color:white;">TẤT CẢ SẢN PHẨM</a>
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



          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="container">
    <form method="POST" action="">
      <?php
      $count1 = 1;
      $count2 = 2;
      if ($row_getOrder['XuLy'] == $count1) {
        ?>
        <h4>Bạn đã đặt hàng thành công!</h4>
        <?php
      } else if ($row_getOrder['XuLy'] == $count2) {
        ?>
          <h4>Bạn đã đặt hàng thất bại!</h4>
        <?php
      } else {
        ?>
          <h4> Hãy chờ người xét duyệt đơn đặt hàng của bạn </h4>
          <h5>Mã Hóa đơn chủ bạn là:
          <?php echo $row_getOrder['ID_HoaDon'] ?>
          </h5>
        <?php
      }
      ?>

      <td><input type="submit" name="back" value="Trở về trang chủ ?? Hãy nhấn vào đây"></td>
    </form>
  </div>

  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
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
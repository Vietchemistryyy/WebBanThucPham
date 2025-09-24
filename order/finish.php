<?php
include("../conection.php");
session_start();
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



          </div>
        </div>
        <form action="../sanpham/actionSanPham.php?TimKiem" class="navbar-form navbar-right" method="POST">
          <div class="input-group">
            <input type="Search" placeholder="Tìm Kiếm..." class="form-control" name="tukhoa">
            <div class="input-group-btn">
              <input type="submit" class="btn btn-secondary" name='tim' value="Tìm">
            </div>
          </div>
        </form>
      </nav>
    </div>
  </div>
  <div class="container">
    <div class="container p-0">
      <div class="card px-4">
        <h4>Thanh Toán Trực Tuyến</h2>
          <div class="row gx-3">
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Họ và tên</p> <input class="form-control mb-3" type="text" placeholder="Name"
                  value="<?php echo $_SESSION['HoVaTen'] ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Tên Ngân Hàng</p> <input class="form-control mb-3" type="text"
                  placeholder="Agribank">
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Số tài khoản ngân hàng</p> <input class="form-control mb-3" type="text"
                  placeholder="1234 5678 435678">
              </div>
            </div>
            <div class="col-6">
              <div class="d-flex flex-column">
                <p class="text mb-1">Ngày đăng kí</p> <input class="form-control mb-3" type="text"
                  placeholder="MM/YYYY">
              </div>
            </div>
            <div class="col-6">
              <div class="d-flex flex-column">
                <p class="text mb-1">Mật Khẩu</p> <input class="form-control mb-3 pt-2 " type="password"
                  placeholder="***">
              </div>
            </div>
            <a type="button" class="btn btn-secondary" href="dathang.php"
              style="background-color: green; color:white;"></span> Thanh Toán</a>
          </div>
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
<?php
include("../conection.php");
session_start();
$sql_ThanhVien = "SELECT * FROM thanhvien ORDER BY ID_ThanhVien DESC";
$query_ThanhVien = mysqli_query($mysqli, $sql_ThanhVien);
$row = mysqli_fetch_array($query_ThanhVien);
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
            <?php
            if (isset($_SESSION['cart'])) {
              ?>
              <h5></h5>
              <?php
            }
            ?>
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
    <div class="container">
      <h2>Giỏ hàng</h2>
      </br>
      <div class="tableInfo">
        <?php
        if (isset($_SESSION['ID_ThanhVien'])) {

          ?>
          <form method="POST" action="../order/saveorder.php?id=<?php echo $_SESSION['ID_ThanhVien'] ?>">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">ID</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Giá tiền</th>
                  <th scope="col">Tùy chọn</th>
                </tr>
              </thead>
              <?php
              if (isset($_SESSION['cart'])) {
                $i = 0;
                $allMoney = 0;
                $allAmount = 0;

                ?>
                <tbody>
                  <?php foreach ($_SESSION['cart'] as $key => $value) {
                    $i++;
                    ?>
                    <td>
                      <?= $i ?>
                    </td>
                    <td>
                      <?= $key ?>
                    </td>
                    <td>
                      <?= $value['TenSanPham'] ?>
                    </td>
                    <td><img src="../image/product/<?= $value['Img'] ?>"></td>
                    <td>
                      <?= $value['qty'] ?>
                    </td>
                    <td>
                      <?= $value['GiaBan'] ?> Đồng/Kg
                    </td>
                    <td><a href="actionCart.php?id_product=<?= $key ?>">Xóa</a></td>
                  </tbody>
                  <?php
                  }
              } else {
                ?>
                <h4>Không có gì trong giỏ hàng</h4>
                <?php
              }
              ?>

            </table>
            <?php if (isset($_SESSION['cart'])) {
              foreach ($_SESSION['cart'] as $value) {
                $Money = $value['qty'] * $value['GiaBan'];
                $amount = $value['qty'];
                $allMoney += $Money;
                $allAmount += $amount;
              }

              ?>
              <h4 style="float: right;">Tổng tiền :
                <?= $allMoney ?> Đồng
              </h4>
              <h5 style="float: right; width: 3%;">
                <?= $allAmount ?>
              </h5>
              </br>

              <?php
              $_SESSION['$allMoney'] = $allMoney;
              $_SESSION['$allAmount'] = $allAmount;
            }
            ?>
            </br>
            </br>
        </div>
        <input type="submit" class="btn btn-info" name='submit' value="Thanh toán" style="float:right; width: 20%">
        </form>
        <?php
        } else {
          ?>
        <h4>Vui lòng đăng nhập để mua hàng0</h4>
        <?php
        }
        ?>


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
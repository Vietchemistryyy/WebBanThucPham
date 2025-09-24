<?php
include("../conection.php");
session_start();
$ID_ThanhVien = isset($_GET['id']) ? $_GET['id'] : '';
$sql_getOrder = "SELECT * FROM hoadon where ID_ThanhVien='$ID_ThanhVien' ORDER BY ID_HoaDon DESC";
$query_getOrder = mysqli_query($mysqli, $sql_getOrder);
$row_getOrder = mysqli_fetch_array($query_getOrder);
$sql_getCus = "SELECT * FROM thanhvien where ID_ThanhVien='$ID_ThanhVien' ORDER BY ID_ThanhVien DESC";
$query_getCus = mysqli_query($mysqli, $sql_getCus);
$row_getCus = mysqli_fetch_array($query_getCus);
if (isset($_POST['dathang'])) {

    $option = isset($_POST['selectPay']) ? $_POST['selectPay'] : false;
    if ($option) {
        if ($_POST['selectPay'] == "shipcod") {
            header('location:dathang.php');
        } else if ($_POST['selectPay'] == "shipchuyenkhoan") {
            header('location:finish.php');
        }
    } else {
        echo "task option is required";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="vi" class="h-100">

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
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="../sanpham/index.php" style="color:white;">TẤT CẢ SẢN
                                    PHẨM</a>
                            </li>

                            <!-- Search -->


                            <li class="nav-item">
                                <a class="nav-link" href="../cart" style="color:white;">GIỎ HÀNG</a>
                            </li>
                            <?php if (isset($_SESSION['TenDangNhap'])) { ?>

                                <li class="nav-item">
                                    <a class="nav-link active" href="../historyOrder.php" style="color:white;">LỊCH SỬ ĐẶT
                                        HÀNG</a>
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
                                <li><a type="button" class="btn btn-secondary" href="../ThanhVien/login.php">&nbsp;ĐĂNG NHẬP
                                    </a></li>
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

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post" action="#">
                <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                    <h2>Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill">2</span>
                        </h4>
                        <div class="tableInfo">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Giá tiền</th>
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
                                                <?= $value['TenSanPham'] ?>
                                            </td>
                                            <td>
                                                <?= $value['qty'] ?>
                                            </td>
                                            <td>
                                                <?= $value['GiaBan'] ?> Đồng
                                            </td>
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
                                <h5 style="float: right;">Tổng tiền :
                                    <?= $allMoney ?> Đồng
                                </h5>

                                </br>

                                <?php
                                $_SESSION['$allMoney'] = $allMoney;
                                $_SESSION['$allAmount'] = $allAmount;
                            }
                            ?>
                        </div>

                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Thông tin khách hàng</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="kh_ten">Họ tên</label>
                                <input type="text" class="form-control" name="kh_ten" id="kh_ten"
                                    value="<?php echo $row_getCus['HoVaTen'] ?>" readonly="">
                            </div>


                            <div class="col-md-12">
                                <label for="kh_diachi">Địa chỉ</label>
                                <input type="text" class="form-control" name="kh_diachi" id="kh_diachi"
                                    value="<?php echo $row_getOrder['DiaChi'] ?>" readonly="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_dienthoai">Điện thoại</label>
                                <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai"
                                    value="<?php echo $row_getCus['SoDienThoai'] ?>" readonly="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_email">Email</label>
                                <input type="text" class="form-control" name="kh_email" id="kh_email"
                                    value="<?php echo $row_getCus['Email'] ?>" readonly="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_ghiChu">Ghi Chú</label>
                                <input type="text" class="form-control" name="kh_ngaysinh" id="kh_ngaysinh"
                                    value="<?php echo $row_getOrder['GhiChu'] ?>" readonly="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_cmnd">Tổng tiền</label>
                                <input type="text" class="form-control" name="kh_cmnd" id="kh_cmnd"
                                    value="<?php echo $row_getOrder['GiaTien'] ?>" readonly="">
                            </div>
                        </div>
                        <form action="" method="POST">
                            <label for="kh_hinhThucThanhToan">Phương Thức Thanh toán</label>
                            </br>
                            <select class="form-select" aria-label=".form-select-lg example" style="" name="selectPay">
                                <option value="shipchuyenkhoan" selected>Thanh toán bằng thẻ</option>
                                <option value="shipcod">Thanh toán khi nhận hàng</option>
                            </select>
                            </br>
                            </br>

                            &nbsp;&nbsp;&nbsp;
                            <input type="submit" class="btn btn-info" name='dathang' value="Đặt hàng">
                            <a class="btn btn-primary" href="suaOrder.php?id=<?php echo $row_getOrder['ID_HoaDon']; ?>">
                                &nbsp;Sửa lại thông tin giao hàng</a>
                        </form>
                    </div>
                </div>
            </form>

        </div>
        <!-- End block content -->
    </main>

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
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/popperjs/popper.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Custom script - Các file js do mình tự viết -->
<script src="../assets/js/app.js"></script>

</html>
<?php
include("../conection.php");
session_start();
if (isset($_SESSION['ID_ThanhVien'])) {
    $id_cus = $_SESSION['ID_ThanhVien'];
}
?>
<?php
$sql_product = "SELECT * FROM sanpham  where ID_SanPham='$_GET[id_product]' ORDER BY ID_SanPham DESC";
$query_product = mysqli_query($mysqli, $sql_product);
$row_product = mysqli_fetch_array($query_product);
$sql_comment = "SELECT * FROM binhluan,thanhvien 
where binhluan.ID_SanPham='$_GET[id_product]' and binhluan.ID_ThanhVien=thanhvien.ID_ThanhVien";
$query_comment = mysqli_query($mysqli, $sql_comment);
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
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                        <?php
                        if (isset($_SESSION['cart'])) {
                            ?>
                            <h5></h5>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <form action="actionSanPham.php?TimKiem" class="navbar-form navbar-right" method="POST">
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
            <div class="card">
                <div class="container-fliud">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                        action="../cart/add.php?id=<?php echo $row_product['ID_SanPham']; ?>">
                        <input type="hidden" name="sp_ten" id="sp_ten" value="<?php echo $row_product['TenSanPham']; ?>">
                        <input type="hidden" name="sp_gia" id="sp_gia" value="<?php echo $row_product['GiaBan']; ?>">
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien"
                            value="<?php echo $row_product['Img']; ?>">
                        <div class="card">
                            <div class="container-fluid">
                                <h3>Thông tin chi tiết về Sản phẩm</h3>
                                <div class="row">

                                </div>
                            </div>
                        </div>
                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-3">
                                        <img src="../image/product/<?php echo $row_product['Img']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title">
                                    <?php echo $row_product['TenSanPham']; ?>
                                </h3>

                                <p class="product-description">
                                    <?php echo $row_product['MoTa']; ?>
                                </p>

                                <h4 class="price">Giá hiện tại: <span>
                                        <?php echo $row_product['GiaBan']; ?> Đồng/Kg
                                    </span></h4>
                                <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                    <strong>Uy
                                        tín</strong>!
                                </p>
                                <?php if (isset($_SESSION['TenDangNhap'])) {
                                    ?>
                                    <div class="form-group">
                                        <label for="soluong">Số lượng đặt mua:</label>
                                        <input type="number" class="form-control" id="soluong" name="soluong" value="1">
                                    </div>
                                    <div class="action">
                                        <input type="submit" class="btn btn-primary" name='submit' value="Mua hàng"
                                            style="background-color: #248A32;">
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="container-fluid">
                    <h3>Bình luận về sản phẩm</h3>
                    <?php
                    $i = 0;
                    while ($row_comment = mysqli_fetch_array($query_comment)) {
                        $i++;
                        ?>
                        <div class="alert alert-success" role="alert">
                            <form class="form-floating"
                                action="actionComment.php?id_product=<?php echo $row_product['ID_SanPham']; ?>"
                                method="POST">
                                <small><label for="floatingInputValue" style="font-weight: bold;">
                                        <?php echo $row_comment['HoVaTen']; ?>
                                    </label>
                                    <label for="floatingInputValue">
                                        <?php echo $row_comment['ThoiGianBinhLuan']; ?>
                                    </label>

                                </small>
                                </br>
                                <label for="floatingInputValue" style="font-size: 20px">
                                    <?php echo $row_comment['NoiDung']; ?>
                                </label>
                        </div>
                        <?php
                    }
                    ?>
                    <?php if (isset($_SESSION['TenDangNhap'])) {
                        ?>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Hãy bình luận sản phẩm tại đây"
                                id="floatingTextarea2" name="NoiDung" style="height: 100px"></textarea>
                            </br>
                        </div>
                        <div class="action">
                            <input type="submit" class="btn btn-primary" name='comment' value="Bình luận"
                                style="float:right; background-color: #248A32">
                        </div>
                    <?php
                    }
                    ?>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
    <hr class="hr--large">
    <div class="space" style="text-align: center; background-color: #white ">
        <img style="" src="../image/thanhspace.PNG">

       
        <p class="site-footer__copyright-content">
            © 2025,
            <a href="http://localhost/BanThucPham/index.php" \title="" style=" color: red"> Nhóm 15</a>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>
<?php
include("../../conection.php");
session_start();
if (isset($_GET['id'])) {
    $ID_ThanhVien = $_GET['id'];
    $sql_getUser = "SELECT * FROM thanhvien where ID_ThanhVien=$ID_ThanhVien";
    $query_getUser = mysqli_query($mysqli, $sql_getUser);
    $row = mysqli_fetch_array($query_getUser);
}
if (isset($_POST['submit'])) {
    $HoVaTen = $_POST['HoVaTen'];
    $DiaChi = $_POST['DiaChi'];
    $SoDienThoai = $_POST['SoDienThoai'];
    if ($HoVaTen == "") {
        echo "Vui lòng nhập đủ tên!<br />";
    }
    if ($DiaChi == "") {
        echo "Vui lòng nhập đủ địa chỉ !<br />";
    }
    if ($SoDienThoai == "") {
        echo "Vui lòng nhập đủ số điện thoại!<br />";
    }
    if ($HoVaTen != "" && $DiaChi != "" && $SoDienThoai != "") {
        $sql_fix = "UPDATE thanhvien SET HoVaTen = '" . $HoVaTen . "', DiaChi = '" . $DiaChi . "',SoDienThoai = '" . $SoDienThoai . "' WHERE ID_ThanhVien = '$_GET[id]' ";
        mysqli_query($mysqli, $sql_fix);
        header('location: ../index.php?view=list-user');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admintrator</title>
</head>

<body>
    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-white d-flex">
            <div class="navbar-brand"><a href="?">Quản Lý</a></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../index.php?view=add-post">Thêm sản phẩm</a>
                        <a class="dropdown-item" href="../index.php?view=add-product">Thêm thêm danh mục</a>
                        <a class="dropdown-item" href="../index.php?view=list-order">Thêm nhà cung cấp</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Chúc Thu
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Tài khoản</a>
                        <a class="dropdown-item" href="#">Thoát</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end nav  -->
        <div id="page-body" class="d-flex">
            <div id="sidebar" class="bg-white">
                <ul id="sidebar-menu">
                    <li class="nav-link">
                        <a href="../index.php?view=dashboard">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Bảng thống kê
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                    </li>
                    <li class="nav-link">
                        <a href="../index.php?view=list-post">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Nhà cung cấp
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="../index.php?view=add-post">Thêm mới</a></li>
                            <li><a href="../index.php?view=list-post">Danh sách</a></li>
                        </ul>
                    </li>

                    <li class="nav-link">
                        <a href="../index.php?view=list-product">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Sản phẩm
                        </a>
                        <i class="arrow fas fa-angle-down"></i>
                        <ul class="sub-menu">
                            <li><a href="../index.php?view=add-product">Thêm mới</a></li>
                            <li><a href="../index.php?view=list-product">Danh sách</a></li>
                            <li><a href="../index.php?view=cat-product">Danh mục</a></li>
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="../index.php?view=list-order">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Bán hàng
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="../index.php?view=list-order">Đơn hàng</a></li>
                        </ul>
                    </li>
                    <li class="nav-link active">
                        <a href="../index.php?view=list-user">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Users
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="../index.php?view=add-user">Thêm mới</a></li>
                            <li><a href="../index.php?view=list-user">Danh sách</a></li>
                        </ul>
                    </li>

                    <!-- <li class="nav-link"><a>Bài viết</a>
                        <ul class="sub-menu">
                            <li><a>Thêm mới</a></li>
                            <li><a>Danh sách</a></li>
                            <li><a>Thêm danh mục</a></li>
                            <li><a>Danh sách danh mục</a></li>
                        </ul>
                    </li>
                    <li class="nav-link"><a>Sản phẩm</a></li>
                    <li class="nav-link"><a>Đơn hàng</a></li>
                    <li class="nav-link"><a>Hệ thống</a></li> -->

                </ul>
            </div>
            <div id="wp-content">
                <div id="content" class="container-fluid">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            Chỉnh sửa thông tin người dùng
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="name">Họ và tên</label>
                                    <input class="form-control" type="text" name="HoVaTen" id="name"
                                        value="<?php echo $row['HoVaTen'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Địa chỉ</label>
                                    <input class="form-control" type="text" name="DiaChi" id="name"
                                        value="<?php echo $row['DiaChi'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Số điện thoại</label>
                                    <input class="form-control" type="text" name="SoDienThoai" id="name"
                                        value="<?php echo $row['SoDienThoai'] ?>">
                                </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="Sửa">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/app.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
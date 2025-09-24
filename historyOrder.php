<?php
include("conection.php"); 
session_start();
if (isset($_SESSION['ID_ThanhVien'])) {
  $ID_ThanhVien=$_SESSION['ID_ThanhVien'];
  $sql_getOrder="SELECT * FROM hoadon where hoadon.ID_ThanhVien=$ID_ThanhVien and hoadon.XuLy='1' ";
$query_getOrder=mysqli_query($mysqli,$sql_getOrder);
$sql_NoOrder="SELECT * FROM hoadon where hoadon.ID_ThanhVien=$ID_ThanhVien and hoadon.XuLy!='1' ";
$query_NoOrder=mysqli_query($mysqli,$sql_NoOrder);
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8>
  <title>Trang chủ</title>
  <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet"  href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet"  href="bootstrap/js/bootstrap.bundle.js">
  <link rel="stylesheet"  href="bootstrap/js/bootstrap.bundle.min.js">
  <link rel="stylesheet"  href="style.css">
  <link rel="stylesheet"  href="themify-icons/themify-icons.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">
</head>
<body> 
  <div class="menu sticky-top ">
    <nav class="navbar navbar-expand-lg header-custom" style="background-color: #248A32;">
      <div class="container-fluid font-header-custom" >
        <a class="navbar-branch" href="index.php">
          <img src="image/logo/logochinh.png" height="80">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
           <?php if(isset($_SESSION['TenDangNhap'])) { ?>
            <li class="nav-item" >
              <a class="nav-link active"  href="sanpham/index.php" style="color:white;">TẤT CẢ SẢN PHẨM</a>
            </li>

            <!-- Search -->

            <li class="nav-item">
              <a class="nav-link active"  href="cart/index.php" style="color:white;">GIỎ HÀNG</a>
            </li>
            <?php
          }else{
            ?>
            <a class="nav-link active"  href="sanpham/index.php" style="color:white;">TẤT CẢ SẢN PHẨM</a>
            <?php
          }
          ?>


          <?php if(isset($_SESSION['TenDangNhap'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="contact.php?id=<?php echo $_SESSION['ID_ThanhVien']?>" style="color:white;">LIÊN HỆ</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link active"  href="#" style="color:white;">LỊCH SỬ ĐẶT HÀNG</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ThanhVien/logout.php" style="color:white;">ĐĂNG XUẤT</a>
            </li>

            <li class="nav-item" style="float: right;">
              <a type="button" class="btn btn-secondary" style="color:white;" href="ThanhVien/profile.php?id=<?php echo $_SESSION['ID_ThanhVien']?>"></span> <?php echo $_SESSION['HoVaTen']?></a>
            </li>
          <?php } else {?>
            <li><a type="button" class="btn btn-secondary" href="ThanhVien/login.php" style="color:white;">&nbsp;ĐĂNG NHẬP  </a></li>
            <h8 > Bạn chưa đăng nhập? hãy đăng nhập để mua hàng</h8>
          <?php }?>
        </ul>
      </div>
    </div>
    <form action="sanpham/actionSanPham.php?TimKiem" class="navbar-form navbar-right" method="POST">
     <div class="input-group">
       <input type="Search" placeholder="Tìm Kiếm..." class="form-control" name="tukhoa">
       <div class="input-group-btn">
        <input type="submit" class="btn btn-secondary" name='tim' value="Tìm" >
      </div>
    </div>
  </form>
</nav>
</div>
<div class="container">
  <div class="duyet" style="width:500px; float:left;" >
    <h3>Đơn Đã được duyệt</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Mã Đơn Hàng</th>
        <th scope="col">Thời gian đặt</th>
        <th scope="col">Địa Chỉ</th>
        <th scope="col">Ghi chú</th> 
        <th scope="col">Giá tiền</th> 
        <th scope="col">Số điện thoại</th>
      </tr>
    </thead>
      <tbody >

      <?php
      if (isset($_SESSION['ID_ThanhVien'])) {
        $i=0;
    while($row_getOrder = mysqli_fetch_array($query_getOrder)){
        $i++;
    ?>

          <td><?php echo $i ?></td>
          <td><?php echo $row_getOrder['ID_HoaDon']; ?></td>  
          <td><?php echo $row_getOrder['ThoiGianLap']; ?></td> 
          <td><?php echo $row_getOrder['DiaChi']; ?></td>
          <td><?php echo $row_getOrder['GhiChu']; ?></td>  
          <td><?php echo $row_getOrder['GiaTien']; ?></td>
          <td><?php echo $row_getOrder['SoDienThoai']; ?></td>
         
    </tbody>

 <?php
        }
      }else{
        ?>
        <h4>Không có lịch sử đặt hàng</h4>
        <?php
      }
      ?>
  </table>
  </div>
  <div class="duyet" style="width:500px; float:right">
    <h3>Đơn chưa được duyệt</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Mã Đơn Hàng</th>
        <th scope="col">Thời gian đặt</th>
        <th scope="col">Địa Chỉ</th>
        <th scope="col">Ghi chú</th> 
        <th scope="col">Giá tiền</th> 
        <th scope="col">Số điện thoại</th>
      </tr>
    </thead>
      <tbody >

      <?php
      if (isset($_SESSION['ID_ThanhVien'])) {
        $i=0;
    while($row_NoOrder = mysqli_fetch_array($query_NoOrder)){
        $i++;
    ?>

          <td style="color: red;"><?php echo $i ?></td> 
          <td style="color: red;"><?php echo $row_NoOrder['ID_HoaDon']; ?></td> 
          <td style="color: red;"><?php echo $row_NoOrder['ThoiGianLap']; ?></td> 
          <td style="color: red;"><?php echo $row_NoOrder['DiaChi']; ?></td>
          <td style="color: red;"><?php echo $row_NoOrder['GhiChu']; ?></td>  
          <td style="color: red;"><?php echo $row_NoOrder['GiaTien']; ?></td>
          <td style="color: red;"><?php echo $row_NoOrder['SoDienThoai']; ?></td>
         
    </tbody>

 <?php
        }
      }else{
        ?>
        <h4>Không có lịch sử đặt hàng</h4>
        <?php
      }
      ?>
  </table>
  </div>
</div>
</body>
</html>


<?php
include("conection.php"); 
session_start();
?>
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
         
          <li class="nav-item" >
            <a class="nav-link active"  href="historyOrder.php" style="color:white;">LỊCH SỬ ĐẶT HÀNG</a>
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




<?php
include("../conection.php");
$sql_product = "SELECT * FROM sanpham ORDER BY ID_SanPham LIMIT 8";
$query_product = mysqli_query($mysqli,$sql_product);

?>
<?php
$sql_vege = "SELECT * FROM sanpham where ID_DanhMuc='1' LIMIT 4";
$query_vege = mysqli_query($mysqli,$sql_vege);
?>
<?php
$sql_fru = "SELECT * FROM sanpham where ID_DanhMuc='2' LIMIT 4";
$query_fru = mysqli_query($mysqli,$sql_fru);
?>
<?php
$sql_meat = "SELECT * FROM sanpham where ID_DanhMuc='3' LIMIT 4";
$query_meat = mysqli_query($mysqli,$sql_meat);
?>

<?php
$sql_getList = "SELECT * FROM danhmuc ORDER BY ID_DanhMuc DESC";
$query_getList= mysqli_query($mysqli, $sql_getList);
?>
<?php
session_start();
?>


<!DOCTYPE html >
<html style="scroll-behavior: smooth">
<head>
  <meta charset=utf-8>
  <title>Sản phẩm</title>
  <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet"  href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet"  href="../bootstrap/js/bootstrap.bundle.js">
  <link rel="stylesheet"  href="../bootstrap/js/bootstrap.bundle.min.js">
  <link rel="stylesheet"  href="../style.css">
  <link rel="stylesheet"  href="../themify-icons/themify-icons.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">

</head>
<body>
  <div class="sticky-top">
    <div class="menu sticky-top">
      <nav class="navbar navbar-expand-lg header-custom"  style="background-color: #248A32;">
        <div class="container-fluid font-header-custom">
          <a class="navbar-branch" href="../index.php">
            <img src="../image/logo/logochinh.png" height="80">
          </a>
          <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active"  href="index.php" style="color:white;">TẤT CẢ SẢN PHẨM</a>
              </li>

              <!-- Search -->
              

              
              <?php if(isset($_SESSION['TenDangNhap'])) { ?>
                <li class="nav-item">
                <a class="nav-link" href="../cart" style="color:white;">GIỎ HÀNG</a>
              </li>
                
                <li class="nav-item" >
            <a class="nav-link active"  href="../historyOrder.php" style="color:white;">LỊCH SỬ ĐẶT HÀNG</a>
          </li>
                <li class="nav-item">
                  <a class="nav-link" href="../ThanhVien/logout.php" style="color:white;">ĐĂNG XUẤT</a>
                </li>
                <li class="nav-item">
                  <a type="button" class="btn btn-secondary" href="../ThanhVien/profile.php?id=<?php echo $_SESSION['ID_ThanhVien']?>" id="btn" style="color:white;"></span> <?php echo $_SESSION['HoVaTen']?></a>
                </li>
              <?php } else {?>
                <li><a type="button" class="btn btn-secondary" href="../ThanhVien/login.php">&nbsp;ĐĂNG NHẬP  </a></li>
              <?php }?>
            </ul>
           
          </div>
        </div>
        <form action="actionSanPham.php?TimKiem" class="navbar-form navbar-right" method="POST">
   <div class="input-group">
       <input type="Search" placeholder="Tìm Kiếm..." class="form-control" name="tukhoa">
       <div class="input-group-btn">
            <input type="submit" class="btn btn-secondary" name='tim' value="Tìm" >
       </div>
   </div>
</form>
      </nav>
    </div>

    <div class="position-fixed" style="align-items:center;top:225px; left:15px;">
      <ul class="nav flex-column">
        <h4>Liệt kê theo</h4>
      </br>
      <?php
      while ($row_getList= mysqli_fetch_array($query_getList)) {
        ?>
        <a class="btn btn-primary" href="actionSanpham.php?danhmucsanpham&id=<?php echo $row_getList['ID_DanhMuc']?>"  style="background-color: #248A32;border-color:#248A32 ;"><?php echo $row_getList['TenDanhMuc']?></a>
      </br>
    </br>
    <?php
  }
  ?>
</ul>
</div>


<!-- <div class="position-fixed" style="align-items:center;top:225px; left:35px;">
      <a href="https://vzone.vn/wp-content/uploads/2020/10/Nen-mua-sua-vinamilk-khuyen-mai-hay-la-khong.jpg?v=1604044976">
      <img style="" src="../image/thanh3.jpg" width="120">
      </a>
    </div> -->
   <!-- <div class="position-fixed" style="align-items:center;top:225px; left:35px;">
      <a href="https://vzone.vn/wp-content/uploads/2020/10/Nen-mua-sua-vinamilk-khuyen-mai-hay-la-khong.jpg?v=1604044976">
      <img style="" src="../image/thanh3.jpg" width="120">
      </a>
    </div> -->

    <div class="container">
      <div class= "container-fluid">
        <div class= "row d-inline-flex">
        </br>
        <div id="allproduct">
          <div style="text-align: center;">
           <h1>Tất cả sản phẩm</h1>
         </div>
         <?php
         while($row_product = mysqli_fetch_array($query_product)){
          ?>
          
          <form class="card" style="width: 25%; float:left" action="infoProduct.php?id_product=<?php echo $row_product['ID_SanPham'];?>" method="POST">
           <div class="d-flex flex-column text-center border">
             <img src="../image/product/<?php echo $row_product['Img'];?>" />
             <h2><?php echo $row_product['TenSanPham'];?></h2>
             <h6>Giá: <?php echo $row_product['GiaBan'];?> VND</h6>
             <?php if(isset($_SESSION['TenDangNhap'])) { 
        ?>
        <input type="submit" class="btn btn-info" name='submit' value="Mua">  
      <?php }else{ ?>
        <input type="submit" class="btn btn-info" name='submit' value="Xem Thông Tin">
      <?php 
      } 
      ?>
             
           </div>
         </form>
         <?php
       }
       ?>
     </div>
   </br>
 </br>
 <div id="vege">
   <div style="text-align: center;">
     <h1>Rau sạch</h1>
   </div>
   <?php
   while($row_vege = mysqli_fetch_array($query_vege)){
    ?>
    
    <form class="card" style="width: 25%; float:left" action="infoProduct.php?id_product=<?php echo $row_vege['ID_SanPham'];?>" method="POST">
     <div class="d-flex flex-column text-center border">
       <img src="../image/product/<?php echo $row_vege['Img'];?>" />
       <h2><?php echo $row_vege['TenSanPham'];?></h2>
       <h6>Giá: <?php echo $row_vege['GiaBan'];?> VND</h6>
       <?php if(isset($_SESSION['TenDangNhap'])) { 
        ?>
        <input type="submit" class="btn btn-info" name='submit' value="Mua">  
      <?php }else{ ?>
        <input type="submit" class="btn btn-info" name='submit' value="Xem Thông Tin">
      <?php 
      } 
      ?>
    </div>
  </form>
  <?php
}
?>

</div>

<div id="fru">
</br>
</br>
<div style="text-align: center;">
 <h1>Củ và Quả</h1>
</div>
<?php
while($row_fru = mysqli_fetch_array($query_fru)){
  ?>

  <form class="card" style="width: 25%; float:left" action="infoProduct.php?id_product=<?php echo $row_fru['ID_SanPham'];?>" method="POST">
   <div class="d-flex flex-column text-center border">
     <img src="../image/product/<?php echo $row_fru['Img'];?>" />
     <h2><?php echo $row_fru['TenSanPham'];?></h2>
     <h6>Giá: <?php echo $row_fru['GiaBan'];?> VND</h6>
     <?php if(isset($_SESSION['TenDangNhap'])) { 
        ?>
        <input type="submit" class="btn btn-info" name='submit' value="Mua">  
      <?php }else{ ?>
        <input type="submit" class="btn btn-info" name='submit' value="Xem Thông Tin">
      <?php 
      } 
      ?>
   </div>
 </form>
 <?php
}
?>

</div>

<div id="meat">

  <div style="text-align: center;">
   <h1>Thịt tươi</h1>
 </div>
 <?php
 while($row_meat = mysqli_fetch_array($query_meat)){
  ?>

  <form class="card" style="width: 25%; float:left" action="infoProduct.php?id=<?php echo $row_meat['ID_SanPham'];?>" method="POST">
   <div class="d-flex flex-column text-center border">
     <img src="../image/product/<?php echo $row_meat['Img'];?>" />
     <h2><?php echo $row_meat['TenSanPham'];?></h2>
     <h6>Giá: <?php echo $row_meat['GiaBan'];?> VND</h6>
    <?php if(isset($_SESSION['TenDangNhap'])) { 
        ?>
        <input type="submit" class="btn btn-info" name='submit' value="Mua">  
      <?php }else{ ?>
        <input type="submit" class="btn btn-info" name='submit' value="Xem Thông Tin">
      <?php 
      } 
      ?>
     
   </div>
 </form>
 <?php
}
?>
</div>
<!-- keyboard -->

</div>
</div>

  <!-- <div class="position-fixed" style="align-items:center;top:225px; left:35px;">
      <a href="https://vzone.vn/wp-content/uploads/2020/10/Nen-mua-sua-vinamilk-khuyen-mai-hay-la-khong.jpg?v=1604044976">
      <img style="" src="../image/thanh3.jpg" width="120">
      </a>
    </div> -->
    <div class="position-fixed" style="align-items:center;top:225px; right:15px;">
      <a href="https://vzone.vn/wp-content/uploads/2020/10/Nen-mua-sua-vinamilk-khuyen-mai-hay-la-khong.jpg?v=1604044976">
        <img style="float: right;" src="../image/quangcaoo/thanh2.png" width="50%">
      </a>
    </div>

   
  </div>   

  <hr class="hr--large">
  <div class = "space" style="text-align: center; background-color: #white ">
    <img style= "" src="../image/thanhspace.PNG">
    
      
    <p class="site-footer__copyright-content">
      © 2021, 
      <a href="http://localhost/BanThucPham/index.php" \title=""style=" color: red" >  Nhóm 15</a>
    </div>  
  </div>      
</body>
</html>
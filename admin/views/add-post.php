<?php 
if (isset($_POST['submit'])) {
$TenNCC = $_POST['TenNCC'];
$Email = $_POST['Email'];
$SoDienThoai = $_POST['SoDienThoai'];
$DiaChi = $_POST['DiaChi'];
$Img = $_POST['Img'];
  $sql_add = "INSERT INTO nhacungcap(TenNCC,Email,SoDienThoai,DiaChi,Img) VALUE('".$TenNCC."','".$Email."','".$SoDienThoai."','".$DiaChi."','".$Img."')";
  mysqli_query($mysqli,$sql_add);
  header('location:index.php?view=list-post');
}
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
         Thêm nhà cung cấp
     </div>
     <div class="card-body">
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Tên nhà cung cấp</label>
                <input class="form-control" type="text" name="TenNCC" id="name">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input class="form-control" type="text" name="Email" id="name">
            </div>
            <div class="form-group">
                <label for="name">Số điện thoại</label>
                <input class="form-control" type="text" name="SoDienThoai" id="name">
            </div>
            <div class="form-group">
                <label for="name">Địa chỉ</label>
                <input class="form-control" type="text" name="DiaChi" id="name">
            </div>
            <div class="form-group">
               <label>Hình ảnh</label>
               <input class="form-control" type="file" name="Img" value="<?php echo $row['Img'];?>">
           </div>
           <input type="submit" class="btn btn-primary" value="Thêm mới" name="submit">
       </form>
   </div>
</div>
</div>
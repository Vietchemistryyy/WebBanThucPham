<?php 
include("../conection.php");
$sql_product="SELECT * FROM sanpham ORDER BY ID_SanPham DESC";
$query_product=mysqli_query($mysqli,$sql_product);
if (isset($_POST['tukhoa'])) {
  $tukhoa= $_POST['tukhoa'];
  $sql_search="SELECT * FROM sanpham where sanpham.TenSanPham LIKE 
  '%".$tukhoa."%'";
  $query_search=mysqli_query($mysqli,$sql_search);
}
?>

<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="" method="POST">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm" name="tukhoa">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary" name="tim">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="tableInfo">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">STT</th>
                      <th scope="col">ID sản phẩm</th>
                      <th scope="col">Tên sản phẩm</th> 
                      <th scope="col">Mô tả</th> 
                      <th scope="col">Số lượng</th>
                      <th scope="col">Hình ảnh</th>
                      <th scope="col">Giá</th>
                      <th scope="col">Quản lý</th>
                  </tr>
              </thead>
              <?php 
              if (isset($_POST['tukhoa'])) {
                $i=0;
                while ($row_search= mysqli_fetch_array($query_search)){
                    $i++; 
                    ?>
                    <tbody>
                      <td><?php echo $i ?></td> 
                      <td><?php echo $row_search['ID_SanPham'];?></td>  
                      <td><?php echo $row_search['TenSanPham'];?></td>
                      <td><?php echo $row_search['MoTa'];?></td>
                      <td><?php echo $row_search['SoLuong'];?></td>        
                      <td> <img style="width: 276px;height: 247px;" src="../image/product/<?php echo $row_search['Img'];?>"/></td>    
                      <td><?php echo $row_search['GiaBan'];?></td>
                      <td>
                        <a class="btn btn-primary" href="views/deleteProduct.php?id_pro=<?php echo $row_search['ID_SanPham'];?>">Xóa</a> 
                    </br>
                </br>
                <a class="btn btn-primary" href="views/suaSanPham.php?id=<?php echo $row_search['ID_SanPham'];?>">Sửa</a>
            </td>   
        </tbody> 
        <?php     
    }
}else{
    ?>     
    <?php
    $i=0;
    while ($row= mysqli_fetch_array($query_product)){
        $i++; 
        ?>
        <tbody>
          <td><?php echo $i ?></td> 
          <td><?php echo $row['ID_SanPham'];?></td>  
          <td><?php echo $row['TenSanPham'];?></td>
          <td><?php echo $row['MoTa'];?></td>
          <td><?php echo $row['SoLuong'];?></td>        
          <td> <img style="width: 276px;height: 247px;" src="../image/product/<?php echo $row['Img'];?>"/></td>    
          <td><?php echo $row['GiaBan'];?></td>
          <td>
            <a class="btn btn-primary" href="views/deleteProduct.php?id_pro=<?php echo $row['ID_SanPham'];?>">Xóa</a> 
        </br>
    </br>
    <a class="btn btn-primary" href="views/suaSanPham.php?id=<?php echo $row['ID_SanPham'];?>">Sửa</a>
</td>   
</tbody> 
<?php
}
}
?>
</table>
</div>
<nav aria-label="Page navigation example" >
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">Trước</span>
                <span class="sr-only">Sau</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
</div>
</div>
</div>
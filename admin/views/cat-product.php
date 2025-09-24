<?php 
$sql_category_product="SELECT * FROM danhmuc ORDER BY ID_DanhMuc DESC";
$query_category_product=mysqli_query($mysqli,$sql_category_product);

if (isset($_POST['add'])) {
    $TenDanhMuc=$_POST['name'];
    $Mota=$_POST['Mota'];
    $sql_add = "INSERT INTO danhmuc(TenDanhMuc,Mota) VALUES('".$TenDanhMuc."','".$Mota."')";
      mysqli_query($mysqli,$sql_add);
  }
  ?>

  <div id="content" class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh mục sản phẩm
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Mô Tả</label>
                            <textarea  class="form-control" type="text" name="Mota" id="name"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" name="add" value="Thêm mới">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh sách
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">ID Danh Mục</th>
                                <th scope="col">Tên Danh Mục</th>
                                <th scope="col">Mô Tả</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;
                            while ($row_category_product=mysqli_fetch_array($query_category_product)) {
                                $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i?></th>
                                    <td><?php echo $row_category_product['ID_DanhMuc']?></td>
                                    <td><?php echo $row_category_product['TenDanhMuc']?></td>
                                    <td><?php echo $row_category_product['Mota']?></td>
                                    <td><a href="views/fixCategory.php?id=<?php echo $row_category_product['ID_DanhMuc']?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="views/deleteCategory.php?id=<?php echo $row_category_product['ID_DanhMuc']?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                            <?php }?>     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
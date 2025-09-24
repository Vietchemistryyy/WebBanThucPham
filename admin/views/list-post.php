<?php 
    include("../conection.php");
    $sql_NCC="SELECT * FROM nhacungcap ORDER BY ID_NCC";
    $query_NCC=mysqli_query($mysqli,$sql_NCC);
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách nhà cung cấp</h5>
            <div class="form-search form-inline">
            </div>
        </div>
        <div class="card-body">
           
            
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                      
                        <th scope="col">STT</th>
                        <th scope="col">Tên Nhà Cung Cấp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số Điện Thoại</th>
                        <th scope="col">Địa Chỉ</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
<?php 
$i=0;
while ($row=mysqli_fetch_array($query_NCC)) {
$i++;
?>
                    <tr>
                        <td scope="row"><?php echo $i; ?></td>
                        <td><?php echo $row['TenNCC']?></td>
                        <td><?php echo $row['Email']?></td>
                        <td><?php echo $row['SoDienThoai']?></td>
                        <td><?php echo $row['DiaChi']?></td>
                        <td><a href="views/SuaNCC.php?id_NCC=<?php echo $row['ID_NCC']?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="views/deleteNCC.php?id_NCC=<?php echo $row['ID_NCC']?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>

                    </tr>
                <?php }?>

                </tbody>
            </table>
            <nav aria-label="Page navigation example">
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
<?php 
    $sql_Customer="SELECT * FROM thanhvien ORDER BY ID_ThanhVien DESC";
    $query_Customer=mysqli_query($mysqli,$sql_Customer);

?>

<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách Khách hàng</h5>
            
        </div>
        <div class="card-body">
        
            <table class="table table-striped table-checkall">
                <thead>
                  
                    <tr>
                        
                        <th scope="col">STT</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số Điện thoại</th>
                        <th scope="col">Ngày đăng kí</th>
                        <th scope="col" >Tên tài khoản</th>
                         <th scope="col">Mật khẩu</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                      <?php 
                    $i =0;
                    while($row_Customer=mysqli_fetch_array($query_Customer)){
                    $i++;
                    ?>
                    <tr>
                        
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $row_Customer['HoVaTen'] ?></td>
                        <td><?php echo $row_Customer['DiaChi'] ?></td>
                        <td><?php echo $row_Customer['SoDienThoai'] ?></td>
                        <td><?php echo $row_Customer['NgayDangKi'] ?></td>
                        <td><?php echo $row_Customer['TenDangNhap'] ?></td>
                        <td type="password"><?php echo md5($row_Customer['MatKhau']) ?></td>
                        <td>
                            <a href="views/fixUser.php?id=<?php echo $row_Customer['ID_ThanhVien']?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="views/deleteUser.php?id=<?php echo $row_Customer['ID_ThanhVien']?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
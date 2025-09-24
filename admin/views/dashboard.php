<?php
    include("../conection.php"); 

   $sql_CountOrder1=mysqli_query($mysqli,"SELECT * FROM hoadon WHERE XuLy= '1'");
    $CountOrder1= mysqli_num_rows($sql_CountOrder1);
    $sql_AllMoney=mysqli_query($mysqli,"SELECT GiaTien FROM hoadon where XuLy='1'");
    $i=0;
    while( $allMoney=mysqli_fetch_array($sql_AllMoney)){
        $i+=$allMoney['GiaTien'];
    }
    $AllMoney=0;
    $AllMoney=$i;
    $sql_CountOrder2=mysqli_query($mysqli,"SELECT * FROM hoadon WHERE XuLy= '0' ");
    $CountOrder2= mysqli_num_rows($sql_CountOrder2);
    $sql_CountOrder3=mysqli_query($mysqli,"SELECT ID_HoaDon FROM hoadon WHERE XuLy= '2'");
    $CountOrder3= mysqli_num_rows($sql_CountOrder3);
?>

<div class="container-fluid py-5">

    <div class="row">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                <div class="card-body">
                    <h5 class="card-title"><?php  echo $CountOrder1 ?></h5>
                    <p class="card-text">Đơn hàng giao dịch thành công</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐANG XỬ LÝ</div>
                <div class="card-body">
                    <h5 class="card-title"><?php  echo $CountOrder2 ?></h5>
                    <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">DOANH SỐ</div>
                <div class="card-body">
                    <h5 class="card-title"><?php  echo $AllMoney ?> đ</h5>
                    <p class="card-text">Doanh số hệ thống</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN HÀNG HỦY</div>
                <div class="card-body">
                    <h5 class="card-title"><?php  echo $CountOrder3 ?></h5>
                    <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end analytic  -->
    <div class="card">

        <div class="card-header font-weight-bold">
            ĐƠN HÀNG MỚI
        </div>
        
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mã Đơn</th>
                        <th scope="col">Mã Khách hàng</th>
                        <th scope="col">Số Điện Thoại</th>
                        <th scope="col">Giá Tiền</th>
                        <th scope="col">Địa Chỉ</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=0;
                    while($row=mysqli_fetch_array($sql_CountOrder2)){
                        $i++;?>
                    <tr>
                        <th scope="row"><?php echo $i?></th>
                        <td><?php echo $row['ID_HoaDon']?></td>
                        <td>
                            <?php echo $row['ID_ThanhVien']?>
                        </td>
                        <td><a href="#"><?php echo $row['SoDienThoai']?></a></td>
                        <td><?php echo $row['GiaTien']?> đ</td>
                        <td><?php echo $row['DiaChi']?></td>
                        <td><span class="badge badge-warning">Đang Chờ duyệt</span></td>
                        <td><?php echo $row['ThoiGianLap']?></td>
                        <td>
                            <a href="views/actionOrder.php?id=<?php echo $row['ID_HoaDon']?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="views/deleteOrder.php?id=<?php echo $row['ID_HoaDon']?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
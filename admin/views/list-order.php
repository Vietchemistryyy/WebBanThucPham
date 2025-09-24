<?php
    $sql_Order=mysqli_query($mysqli,"SELECT * FROM hoadon where XuLy='1'");
?>

<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Doanh Thu của cửa hàng</h5>
        </div>
     
          
           <table class="table table-striped table-checkall">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID Hóa đơn</th>
                <th scope="col">ID thành viên</th>
                <th scope="col">Thời gian thanh toán</th>
                <th scope="col">Địa chỉ khách hàng</th>
                <th scope="col">Giá tiền</th>

            </tr>

        </thead>
        <tbody>
           <?php 
           $i=0;
           $num=0;
           while( $row_Order=mysqli_fetch_array($sql_Order)){
            $i+=$row_Order['GiaTien']; 
            $num++;
            ?>
            <tr>
                <td><?php echo $num ?></td>
                <td><?php echo $row_Order['ID_HoaDon']?></td>
                <td><?php echo $row_Order['ID_ThanhVien']?></td>
                 <td><?php echo $row_Order['ThoiGianLap']?></td>
                <td><?php echo $row_Order['DiaChi']?></td>
                <td><?php echo $row_Order['GiaTien']?></td>
         </tr>

<?php
        }
         $AllMoney=0;
         $AllMoney=$i;  
         ?>
     </tbody>
 </table>
 
            <nav aria-label="Page navigation example">
                  <h4 style="float: right;">Tổng tiền :<?= $AllMoney ?> Đồng</h4>
               
            </nav>
        </div>
    </div>
</div>
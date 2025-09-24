<?php 
    include("../conection.php");
    // nhận dữ liệu từ người dùng
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $NgayDangKi=date("Y-m-d H:i:s");
    $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if(isset($_POST['submit']) &&  $_POST['username'] != "" && $_POST['password'] != ""  && $_POST['password-repeat'] != "" && $_POST['email'] != "" && $_POST['fullname'] != "" && $_POST['address'] != "" && $_POST['phonenumber'] !=""){
        if($password !=$password_repeat){
            echo("Nhập lại mật khẩu sai");
            } 
        else if(!preg_match($partten ,$email, $matchs))
            echo  "Mail bạn vừa nhập không đúng định dạng ";
        else if (!preg_match ("/^[0-9]*$/", $phonenumber) )
         echo "Số điện thoại không hợp lệ.";
        else {
            $sql_add = "INSERT INTO thanhvien(TenDangNhap,MatKhau,Email,HoVaTen,DiaChi,SoDienThoai,NgayDangKi) VALUES('".$username."','".$password."','".$email."','".$fullname."','".$address."','".$phonenumber."','".$NgayDangKi."')";
            mysqli_query($mysqli,$sql_add);
            ?>
            <a href="login.php" style="color: red" >Trở về trang đăng nhập</a>
            <?php
        }
        
    } 

?>


<?php
include("../conection.php");
session_start();
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql_getName = "SELECT * FROM thanhvien WHERE TenDangNhap = '$username' LIMIT 1";
  $query_getName = mysqli_query($mysqli, $sql_getName);
  $row_getName = mysqli_fetch_array($query_getName);
  if ($username == '' || $password == '') {
    $checkLogin = 'Xin nhập đủ!!';
  } else {
    $sql_login = mysqli_query($mysqli, "SELECT * FROM thanhvien WHERE 
			TenDangNhap = '$username' AND MatKhau = '$password' LIMIT 1");
    $count = mysqli_num_rows($sql_login);
    $sql_name = mysqli_query($mysqli, "SELECT HoVaTen FROM thanhvien WHERE TenDangNhap= '$username'LIMIT 1");
    $countname = mysqli_num_rows($sql_name);
    if ($count > 0) {
      $_SESSION['TenDangNhap'] = $username;
      $_SESSION['HoVaTen'] = $row_getName['HoVaTen'];
      $_SESSION['ID_ThanhVien'] = $row_getName['ID_ThanhVien'];
      $_SESSION['Email'] = $row_getName['Email'];
      header("location:../index.php");
    } else {
      $checkLogin = 'Tài khoản hoặc mật khẩu sai';
      ?>
      <a href="login.php">Quay lại trang đăng nhập</a>
      <?php
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset=utf-8>
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/js/bootstrap.bundle.js">
  <link rel="stylesheet" href="../bootstrap/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <div class="menu">
    <!-- <nav style="display: inline-block" class="navbar navbar-expand-lg navbar-light bg-light">
      <a style=" float: left" class="navbar-brand" href="#">CỬA HÀNG LATOP</a>
      </nav> -->

  </div>
  <div id="login" class="container">

    </br>
    <!-- <div style="width: 50%;"> -->
    <div id="login-row" class="row justify-content-center align-items-center">
      <div style="background:#CCFFFF	" id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
          <h2 class="text-center text-info">Đăng Nhập Tài Khoản Của Bạn</h2> </br>
          <h4 style="text-align:center;color:red">
            <?php if (isset($checkLogin)) {
              echo $checkLogin;
            } else {
              echo " ";
            }
            ?>
          </h4>

          <form method="POST" action="">
            <tr>
              <div class="form-group">
                <td class="text-info">Tên đăng nhập:</td><br>
                <td><input class="form-control" type="text" name="username"></td>
              </div>
              <div class="form-group">
                <td class="text-info">Mật khẩu:</td><br>
                <td> <input class="form-control" type="password" name="password"></td>
              </div>
              </br>
              <td> <input style="margin-top: -10px" type="submit" class="btn btn-info btn-md" name="login"
                  value="ĐĂNG NHẬP"></td>
            </tr>
          </form>
          </br>
          <h6 style="margin-top: -15px"> Bạn chưa có tài khoản? Hãy đăng kí</h6>
          <a style=" float: right" class="text-info" href="../admin/login.php">Bạn là admin?</a>
          <form method="POST" action="register.php">
            <td><input style="margin-bottom: 10px" type="submit" class="btn btn-info btn-md" name="register"
                value="ĐĂNG KÍ"></td>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>
<?php
include("../conection.php");
session_start();

if ( !isset($_SESSION['TenDangNhap']) ) {
    $response["message"] = "Bạn phải đăng nhập để đặt hàng";
    echo json_encode($response);
    exit;
}

$id = isset($_POST['id']) ? $_POST['id'] : '';
$soluong = isset($_POST['soluong']) ? (int)$_POST['soluong'] : 1;

$response = ["success" => false, "message" => ""];

// Kiểm tra id hợp lệ
if ($id == '') {
    $response["message"] = "Không có sản phẩm hợp lệ";
    echo json_encode($response);
    exit;
}

$product = "SELECT * FROM sanpham WHERE ID_SanPham='" . mysqli_real_escape_string($mysqli, $id) . "' LIMIT 1";
$query = mysqli_query($mysqli, $product);
$row = mysqli_fetch_assoc($query);

if ($row) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += $soluong;
    } else {
        $_SESSION['cart'][$id] = [
            'ID_SanPham' => $row['ID_SanPham'],
            'TenSanPham' => $row['TenSanPham'],
            'Img'        => $row['Img'],
            'GiaBan'     => $row['GiaBan'],
            'qty'        => $soluong
        ];
    }

    $response["success"] = true;
    $response["message"] = "Đã thêm vào giỏ hàng";
    $response["cart_count"] = array_sum(array_column($_SESSION['cart'], 'qty'));
} else {
    $response["message"] = "Sản phẩm không tồn tại";
}

echo json_encode($response);
exit;

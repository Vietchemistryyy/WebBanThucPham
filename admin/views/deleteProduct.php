<?php 
    include("../../conection.php");
   if (isset($_GET['id_pro'])) {
    $ID_SanPham=$_GET['id_pro'];
    $sql="DELETE FROM  sanpham WHERE ID_SanPham='".$ID_SanPham."'";
        mysqli_query($mysqli,$sql);

    header('location:../index.php?view=list-product');
    }
?>
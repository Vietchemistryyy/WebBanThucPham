<?php
  include("../conection.php"); 
  session_start();
  if(isset($_GET['id_product'])){
    unset($_SESSION['cart'][$_GET['id_product']]);
    header('location:index.php');
  }
?>

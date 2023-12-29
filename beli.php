<?php
session_start();
include('koneksi.php');
$id = $_GET['id'];
if (isset($_SESSION['keranjang'][$id])) {
    $_SESSION['keranjang'][$id] += 1;
} else {
    $_SESSION['keranjang'][$id] = 1;
}
echo "<script>alert('produk telah masuk ke keranjang belanja')</script>";
echo "<script>location='cart.php'</script>";
echo "<script></script>";

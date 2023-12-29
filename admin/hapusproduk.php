<?php
include '../koneksi.php';


if (isset($_GET['halaman']) && $_GET['halaman'] == 'hapusprodukpria') {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_produk_pria WHERE id='$id'";
    $sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($sql);
    unlink("../img/" . $data['gambar']);

    $query = "DELETE FROM tb_produk_pria WHERE id='$id'";
    $sql = mysqli_query($koneksi, $query);
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_produk_wanita WHERE id='$id'";
    $sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($sql);
    unlink("../img/" . $data['gambar']);

    $query = "DELETE FROM tb_produk_wanita WHERE id='$id'";
    $sql = mysqli_query($koneksi, $query);
}

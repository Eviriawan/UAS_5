<?php

if (isset($_POST['simpan'])) {
    $namaproduk = $_POST['nama_produk'];
    $detailsingkat = $_POST['detail_singkat'];
    $detaillengkap = $_POST['detail_lengkap'];
    $harga = $_POST['harga'];

    $gambar = $_FILES['gambar']['name'];
    $dir = "../img/";
    $dirfile = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($dirfile, $dir . $gambar);


    // Specify column names in your SQL query
    $query = "INSERT INTO `tb_produk_pria` (`id`, `nama_produk`, `detail_singkat`, `detail_lengkap`, `harga`, `gambar`) 
    VALUES ('', '$namaproduk', '$detailsingkat', '$detaillengkap', '$harga', '$gambar')";

    $sql = mysqli_query($koneksi, $query);
    //if (!$sql) {
    //echo "Error: " . mysqli_error($koneksi);
    // } else {
    //  echo "Data berhasil disimpan";
    //}
}

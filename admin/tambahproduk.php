<?php
include '../koneksi.php';
if ($_GET['halaman'] == 'tambahprodukpria') {
?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" placeholder="Masukkan nama Produk" name="nama_produk">
        </div>
        <div class="mb-3">
            <label for="detail_singkat" class="form-label">Detail Singkat</label>
            <input type="text" class="form-control" id="detail_singkat" placeholder="Masukkan Detail Singkat" name="detail_singkat">
        </div>
        <div class="mb-3">
            <label for="detail_lengkap" class="form-label">Detail lengkap</label>
            <input type="text" class="form-control" id="detail_lengkap" placeholder="Masukkan Detail lengkap" name="detail_lengkap">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" placeholder="Masukkan harga" name="harga">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" name="simpan">Tambah Data</button>
        </div>
    </form>
<?php
}
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
    if ($sql) {
    }
    //if (!$sql) {
    //echo "Error: " . mysqli_error($koneksi);
    // } else {
    //  echo "Data berhasil disimpan";
    //}
} else if ($_GET['halaman'] == 'tambahprodukwanita') {
?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" placeholder="Masukkan nama Produk" name="nama_produk">
        </div>
        <div class="mb-3">
            <label for="detail_singkat" class="form-label">Detail Singkat</label>
            <input type="text" class="form-control" id="detail_singkat" placeholder="Masukkan Detail Singkat" name="detail_singkat">
        </div>
        <div class="mb-3">
            <label for="detail_lengkap" class="form-label">Detail lengkap</label>
            <input type="text" class="form-control" id="detail_lengkap" placeholder="Masukkan Detail lengkap" name="detail_lengkap">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" placeholder="Masukkan harga" name="harga">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" name="simpan">Tambah Data</button>
        </div>
    </form>
<?php
}
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
    $query = "INSERT INTO `tb_produk_wanita` (`id`, `nama_produk`, `detail_singkat`, `detail_lengkap`, `harga`, `gambar`) 
        VALUES ('', '$namaproduk', '$detailsingkat', '$detaillengkap', '$harga', '$gambar')";

    $sql = mysqli_query($koneksi, $query);
    //if (!$sql) {
    //echo "Error: " . mysqli_error($koneksi);
    // } else {
    //  echo "Data berhasil disimpan";
    //}
} else {
?>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="fullname" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-Mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="pw" class="form-label">Password</label>
            <input type="password" class="form-control" id="pw" name="pw" required>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary" name="tambah">Tambah Data</button>
        </div>
    </form>

    <?php
    if (isset($_POST['tambah'])) {
        // Ambil data dari form
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['pw'];

        // Enkripsi password sebelum menyimpannya ke database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert data baru ke dalam tabel tb_user
        $query = "INSERT INTO tb_user (fullname, email, password) VALUES ('$fullname', '$email', '$hashedPassword')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Jika insert berhasil, bisa tambahkan logika lain sesuai kebutuhan
            echo "<div class='alert alert-success'>Data berhasil ditambahkan.</div>";
            header("location:index.php?halaman=user");
        } else {
            // Jika insert gagal
            echo "<div class='alert alert-danger'>Gagal menambahkan data.</div>";
        }
    }
    ?>

<?php
}
?>
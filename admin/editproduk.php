<?php
include '../koneksi.php';

if (isset($_GET['halaman']) && $_GET['halaman'] == 'editprodukpria') {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_produk_pria WHERE id='$id'";
    $sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($sql);
    $namaproduk = $data['nama_produk'];
    $detailsingkat = $data['detail_singkat'];
    $detaillengkap = $data['detail_lengkap'];
    $harga = $data['harga'];

?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" value="<?php echo $namaproduk ?>" name="nama_produk">
        </div>
        <div class="mb-3">
            <label for="detail_singkat" class="form-label">Detail Singkat</label>
            <input type="text" class="form-control" id="detail_singkat" value="<?php echo  $detailsingkat ?>" name="detail_singkat">
        </div>
        <div class="mb-3">
            <label for="detail_lengkap" class="form-label">Detail lengkap</label>
            <input type="text" class="form-control" id="detail_lengkap" value="<?php echo $detaillengkap ?>" name="detail_lengkap">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" value="<?php echo $harga; ?>" name="harga">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" name="edit">Simpan Perubahan</button>
        </div>
    </form>
    <?php


    if (isset($_POST['edit'])) {
        $namaproduk = $_POST['nama_produk'];
        $detailsingkat = $_POST['detail_singkat'];
        $detaillengkap = $_POST['detail_lengkap'];
        $harga = $_POST['harga'];
        if ($_FILES["gambar"]["name"] != "") {
            $queryhapus = "SELECT * FROM tb_produk_pria WHERE id='$id'";
            $sql = mysqli_query($koneksi, $queryhapus);
            $data = mysqli_fetch_array($sql);
            unlink("../img/" . $data['gambar']);

            $gambar = $_FILES['gambar']['name'];
            $dir = "../img/";
            $dirfile = $_FILES['gambar']['tmp_name'];
            move_uploaded_file($dirfile, $dir . $gambar);

            $query = "UPDATE tb_produk_pria SET nama_produk='$namaproduk',detail_singkat='$detailsingkat',detail_lengkap='$detaillengkap',harga='$harga',gambar='$gambar' WHERE id='$id'";
            $sql = mysqli_query($koneksi, $query);
        }
    }
} else if (isset($_GET['halaman']) && $_GET['halaman'] == 'editprodukwanita') {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_produk_wanita WHERE id='$id'";
    $sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($sql);
    $namaproduk = $data['nama_produk'];
    $detailsingkat = $data['detail_singkat'];
    $detaillengkap = $data['detail_lengkap'];
    $harga = $data['harga'];

    ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" value="<?php echo $namaproduk ?>" name="nama_produk">
        </div>
        <div class="mb-3">
            <label for="detail_singkat" class="form-label">Detail Singkat</label>
            <input type="text" class="form-control" id="detail_singkat" value="<?php echo  $detailsingkat ?>" name="detail_singkat">
        </div>
        <div class="mb-3">
            <label for="detail_lengkap" class="form-label">Detail lengkap</label>
            <input type="text" class="form-control" id="detail_lengkap" value="<?php echo $detaillengkap ?>" name="detail_lengkap">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" value="<?php echo $harga; ?>" name="harga">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" name="edit">Simpan Perubahan</button>
        </div>
    </form>
    <?php
    if (isset($_POST['edit'])) {
        $namaproduk = $_POST['nama_produk'];
        $detailsingkat = $_POST['detail_singkat'];
        $detaillengkap = $_POST['detail_lengkap'];
        $harga = $_POST['harga'];
        if ($_FILES["gambar"]["name"] != "") {
            $queryhapus = "SELECT * FROM tb_produk_wanita WHERE id='$id'";
            $sql = mysqli_query($koneksi, $queryhapus);
            $data = mysqli_fetch_array($sql);
            unlink("../img/" . $data['gambar']);

            $gambar = $_FILES['gambar']['name'];
            $dir = "../img/";
            $dirfile = $_FILES['gambar']['tmp_name'];
            move_uploaded_file($dirfile, $dir . $gambar);

            $query = "UPDATE tb_produk_wanita SET nama_produk='$namaproduk',detail_singkat='$detailsingkat',detail_lengkap='$detaillengkap',harga='$harga',gambar='$gambar' WHERE id='$id'";
            $sql = mysqli_query($koneksi, $query);
        }
    }
} else {
    ?>
    <form method="get" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div class="mb-3">
            <label for="fullname" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="fullname" value="<?php echo $fullname ?>" name="fullname">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-Mail</label>
            <input type="email" class="form-control" id="email" value="<?php echo  $email ?>" name="email">
        </div>
        <div class="mb-3">
            <label for="pw" class="form-label">password</label>
            <input type="password" class="form-control" id="pw" value="<?php echo  $pw ?>" name="pw">
        </div>
        <div class="mb-3">
            <label for="rpw" class="form-label">E-Mail</label>
            <input type="rpw" class="form-control" id="rpw" value="<?php echo  $email ?>" name="rpw">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" name="edit">Simpan Perubahan</button>
        </div>
    </form>
<?php
    if (isset($_POST['edit'])) {
        include '../koneksi.php';

        if (isset($_GET['tambah'])) {
            // Ambil data dari form
            $id = $_GET['id'];
            $fullname = $_GET['fullname'];
            $email = $_GET['email'];
            $password = $_GET['pw'];

            // Enkripsi password sebelum menyimpannya ke database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Update data ke tabel tb_user
            $query = "UPDATE tb_user SET fullname='$fullname', email='$email', password='$hashedPassword' WHERE id='$id'";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                // Jika update berhasil, bisa tambahkan logika lain sesuai kebutuhan
                echo "<div class='alert alert-success'>Data berhasil diperbarui.</div>";
            } else {
                // Jika update gagal
                echo "<div class='alert alert-danger'>Gagal memperbarui data.</div>";
            }
        }
    }
} ?>
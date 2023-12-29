<?php
include '../koneksi.php';
if ($_GET['halaman'] == 'produkpria') {
?>
    <h2>Data Produk</h2>
    <a href="index.php?halaman=tambahprodukpria" class="btn btn-outline-primary">Tambah Data</a><br>
    <table class="table table-bordered table-hover mt-3">
        <tr>
            <td>no</td>
            <td>Nama Produk</td>
            <td>Harga</td>
            <td>Gambar</td>
            <td>Aksi</td>
        </tr>
        <?php
        $no = 1;
        $query = "SELECT*FROM tb_produk_pria";
        $sql = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['nama_produk'] ?></td>
                <td><?php echo $data['harga'] ?></td>
                <td><img src="../img/<?php echo $data['gambar'] ?>" style="height:100px" alt=""></td>
                <td>
                    <a href="index.php?halaman=editprodukpria&id=<?php echo $data['id'] ?>" class="btn btn-outline-success">Edit</a>
                    <a href="index.php?halaman=hapusprodukpria&id=<?php echo $data['id'] ?>" class="btn btn-outline-danger">Hapus</a>

                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    <?php
} else {
    ?>
    </table>

    <h2>Data Produk</h2>
    <a href="index.php?halaman=tambahprodukwanita" class="btn btn-outline-primary">Tambah Data</a><br>
    <table class="table table-bordered table-hover mt-3">
        <tr>
            <td>no</td>
            <td>Nama Produk</td>
            <td>Harga</td>
            <td>Gambar</td>
            <td>Aksi</td>
        </tr>
        <?php
        $no = 1;
        $query = "SELECT*FROM tb_produk_wanita";
        $sql = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>

                <td><?php echo $no ?></td>
                <td><?php echo $data['nama_produk'] ?></td>
                <td><?php echo $data['harga'] ?></td>
                <td><img src="../img/<?php echo $data['gambar'] ?>" style="height:100px" alt=""></td>
                <td>
                    <a href="index.php?halaman=editprodukwanita&id=<?php echo $data['id'] ?>" class="btn btn-outline-success">Edit</a>
                    <a href="index.php?halaman=hapusprodukwanita&id=<?php echo $data['id'] ?>" class="btn btn-outline-danger">Hapus</a>

                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    <?php
}
    ?>
    </table>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
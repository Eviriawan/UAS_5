

<?php
include('koneksi.php');
$query = "SELECT*FROM tb_user";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);
$nama = $data['fullname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    //koneksi ke database
    include 'koneksi.php';
    ?>
    
    <?php
    session_start();
    include('koneksi.php');
    
// Class untuk mengelola informasi pengguna
class User {
    private $koneksi;

    public function __construct($db) {
        $this->koneksi = $db;
    }

    public function getFullName($userId) {
        $query = "SELECT fullname FROM tb_user WHERE id = $userId";
        $result = mysqli_query($this->koneksi, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['fullname'];
    }
}

// Class untuk halaman checkout
class CheckoutPage {
    private $user;
    private $userId;

    // Konstruktor untuk menginisialisasi objek dengan informasi pengguna
    public function __construct($userObj, $userId) {
        $this->user = $userObj;
        $this->userId = $userId;
    }
    // Metode untuk membuat halaman checkout
    public function renderPage() {
        $nama = $this->user->getFullName($this->userId);
        ?>
        
        <?php
    }
}

// Koneksi ke database
include('koneksi.php');

// Membuat objek User
$userObj = new User($koneksi);
$userId = 1; // Ganti dengan id pengguna yang sesuai

// Membuat objek CheckoutPage dan menampilkan halaman checkout
$checkoutPage = new CheckoutPage($userObj, $userId);
$checkoutPage->renderPage();
?>

    

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                            <?php echo $nama; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="login.php"><button class="dropdown-item" type="button">Sign in</button></a>
                            <a href="register.php"><button class="dropdown-item" type="button">Sign up</button></a>
                            <a href="login.php"><button class="dropdown-item" type="button">log out</button></a>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle"
                            style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle"
                            style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">E-</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Commerce</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Produk">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse"
                    href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categori</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
                    id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dresses <i
                                    class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Product</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Page <i
                                        class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Cart</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle"
                                    style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Bill Details</span></h5>
                <form action="" method="get"></form>

                <div class="bg-light p-30 mb-5">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="Masukkan Nama">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="alamat" placeholder="Masukan Alamat Lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="hp" class="form-label">Number Phone</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="hp" placeholder="Masukan Nomor Telepon">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Masukan Email">
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Total Order</span></h5>
                <div class="bg-light p-30 mb-5">
                    <?php
                    $no = 1; // Pindahkan inisialisasi $no di luar loop
                    $grandTotal = 0; // Tambahkan variabel untuk menghitung grand total
                    $ongkir = 10000; // Biaya ongkir

                    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :
                        $query = "SELECT * FROM tb_produk_pria WHERE id='$id_produk'";
                        $sql = mysqli_query($koneksi, $query);

                        while ($data = mysqli_fetch_array($sql)) {
                            $total = $data['harga'] * $jumlah;
                            $grandTotal += $total; // Tambahkan total ke grand total
                    ?>
                            <div class="border-bottom">
                                <div class="d-flex justify-content-between mb-3">
                                    <h6><?php echo $data['nama_produk']; ?></h6>
                                    <h6>Rp.<?php echo $total; ?></h6>
                                </div>
                            </div>
                    <?php
                        }
                    endforeach;
                    ?>

                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rp.<?php echo $grandTotal; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rp.<?php echo $ongkir; ?></h6>
                            <?php $totalBelanja = $grandTotal + $ongkir; ?>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total </h5>
                            <h5>Rp.<?php echo $totalBelanja; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment Method</span></h5>
        <div class="bg-light p-30">

            <!-- Digital Wallets -->
            <div class="bg-light p-20 mb-5">
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="gopayPayment">
                    <label class="form-check-label" for="gopayPayment">
                        <img src="img/gopay1.png" alt="gopay" class="mr-2" width="30">
                        Gopay
                    </label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="gopayPayment">
                    <label class="form-check-label" for="gopayPayment">
                        <img src="img/ovo.jpeg" alt="ovo" class="mr-2" width="30">
                        Ovo
                    </label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="gopayPayment">
                    <label class="form-check-label" for="gopayPayment">
                        <img src="img/cod.png" alt="cod" class="mr-2" width="30">
                        COD
                    </label>
                </div>
            </div>

            <!-- Bank Transfer -->
            <div class="mb-7">
                <h6 class="mb-3 mt-3">Select Bank</h6>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="bankBCA">
                    <label class="form-check-label" for="bankBCA">
                        <img src="img/bca.jpeg" alt="BCA" class="mr-2" width="30">
                        Bank BCA
                    </label>
                </div>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="bankBNI">
                    <label class="form-check-label" for="bankBNI">
                        <img src="img/bni.png" alt="BNI" class="mr-2" width="30">
                        Bank BNI
                    </label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="bankBRI">
                    <label class="form-check-label" for="bankBRI">
                        <img src="img/bri.png" alt="BRI" class="mr-2" width="30">
                        Bank BRI
                    </label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="bankBSI">
                    <label class="form-check-label" for="bankBSI">
                        <img src="img/bsi.png" alt="BSI" class="mr-2" width="30">
                        Bank BSI
                    </label>
                </div>
                <!-- Add more banks as needed with images -->
            </div>

            <a href="masuk.php"><button type="submit" name="masukkan" value="upload" class="btn btn-block btn-primary font-weight-bold py-3">MAKE AN ORDER</button></button></a>
        </div>
    </div>

    </div>
    </div>
    </div>
    <!-- Checkout End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5 ">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Contact Us</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>H.E.A.Mokodompit, Kendari,
                        Southeast Sulawesi </p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>E-commerce@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 6789</p>
            </div>
            <div class="col-lg-8 col-md-12 mb-5">
                <div class="row justify-content-end">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Product
                                </a>
                            <a class="text-secondary mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Cart</a>
                            <a class="text-secondary mb-2" href="checkout.php"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact
                                Us</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

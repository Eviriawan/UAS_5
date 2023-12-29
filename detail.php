<?php
// Include header.php file
include('header.php');
// Buatlah sebuah instance dari kelas header dan render
$header = new header();
$header ->render();
?>



    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="shop.php">Product</a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <?php
    // Periksa apakah 'idp' diatur dalam string kueri
    if (isset($_GET['idp'])) {
    ?>

        <?php
        // Mendefinisikan kelas Product pria
        class Productpria
        {
            // Properties
            private $id;
            private $name;
            private $price;
            private $image;
            private $shortDescription;
            private $longDescription;
            
            // Konstruktor untuk menginisialisasi properti
            public function __construct($id, $name, $price, $image, $shortDescription, $longDescription)
            {
                $this->id = $id;
                $this->name = $name;
                $this->price = $price;
                $this->image = $image;
                $this->shortDescription = $shortDescription;
                $this->longDescription = $longDescription;
            }

            // Metode pengambil
            public function getId()
            {
                return $this->id;
            }

            public function getName()
            {
                return $this->name;
            }

            public function getPrice()
            {
                return $this->price;
            }

            public function getImage()
            {
                return $this->image;
            }

            public function getShortDescription()
            {
                return $this->shortDescription;
            }

            public function getLongDescription()
            {
                return $this->longDescription;
            }
        }

        // Mendefinisikan kelas ProductpriaRepository
        class ProductpriaRepository
        {
            // Properties
            private $connection;

            // Konstruktor untuk menginisialisasi koneksi
            public function __construct($connection)
            {
                $this->connection = $connection;
            }

            // Metode untuk mendapatkan produk berdasarkan ID dari database
            public function getProductById($id)
            {
                // Implement logic to fetch product from the database by ID (Menerapkan logika untuk mengambil produk dari database berdasarkan ID)
                $id = $_GET['idp'];
                $query = "SELECT * FROM tb_produk_pria WHERE id = $id";
                $result = mysqli_query($this->connection, $query);

                if ($result) {
                    $productData = mysqli_fetch_assoc($result);

                    return new Productpria(
                        $productData['id'],
                        $productData['nama_produk'],
                        $productData['harga'],
                        $productData['gambar'],
                        $productData['detail_singkat'],
                        $productData['detail_lengkap']
                    );
                } else {
                    // Handle database query error( Menangani kesalahan permintaan basis data)
                    return null;
                }
            }
        }

        ?>

        <!-- Shop Detail Start -->
        <div class="container-fluid pb-5">
            <?php
            // Menginstansiasi koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "ecommerce");
            // Membuat sebuah instance dari ProductpriaRepository
            $productRepository = new ProductpriaRepository($koneksi);
            // Dapatkan ID produk dari string kueri
            $i = $_GET['idp'];

            // Dapatkan produk berdasarkan ID
            $product = $productRepository->getProductById($i);
            ?>
            <div class="row px-xl-5">
                <div class="col-lg-5 mb-30">
                    <div class="text-center">
                        <img class="w-50 h-50" src="img/<?= $product->getImage() ?>" alt="Image">
                    </div>
                </div>

                <div class="col-lg-7 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <h3>
                            <?= $product->getName() ?>
                        </h3>
                        <h3 class="font-weight-semi-bold mb-4">Rp.
                            <?= number_format($product->getPrice(), 0, ',', '.') ?>
                        </h3>
                        <p class="mb-4">
                            <?= $product->getShortDescription() ?>
                        </p>
                        <div class="d-flex mb-3">
                            <strong class="text-dark mr-3">Sizes:</strong>
                            <form>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-1" name="size">
                                    <label class="custom-control-label" for="size-1">XS</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-2" name="size">
                                    <label class="custom-control-label" for="size-2">S</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-3" name="size">
                                    <label class="custom-control-label" for="size-3">M</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-4" name="size">
                                    <label class="custom-control-label" for="size-4">L</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-5" name="size">
                                    <label class="custom-control-label" for="size-5">XL</label>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="beli.php?id=<?php echo $i ?>"><button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="bg-light p-30">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <h4 class="mb-3">Product Description</h4>
                                <p>
                                    <?= $product->getLongDescription() ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Detail End -->


  <?php
      }
?>



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5 ">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Contact Us</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>H.E.A.Mokodompit, Kendari,
                        Southeast Sulawesi</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>E-commerce@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 6789</p>
            </div>
            <div class="col-lg-8 col-md-12 mb-5">
                <div class="row justify-content-end">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php"><i
                                    class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Product</a>
                            <a class="text-secondary mb-2" href="cart.php"><i
                                    class="fa fa-angle-right mr-2"></i>Cart</a>
                            <a class="text-secondary mb-2" href="checkout.php"><i
                                    class="fa fa-angle-right mr-2"></i>Checkout</a>
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


main
<?php
// Include footer.php file
include('footer.php');
// Buat sebuah instance dari kelas footer dan render
$footer = new footer();
$footer->render();
?> 
</html>

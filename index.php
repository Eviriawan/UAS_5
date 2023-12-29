<?php
include 'header.php';

$header = new header();
$header->render();
?>


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Men
                                        Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Provides a variety of fashion choices for men</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="shop.php">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="#produkpria">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/cat-5.jpeg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Man</h6>
                            <small class="text-body">10 Product</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Categories End -->

    <!-- Products Start -->

    <?php
    //Di dalam kode index.php yang ada hanya class object untuk memvisibilitas data produk yang ada di database


    class Productpria
    {
        private $id;
        private $name;
        private $price;
        private $image;

        public function __construct($id, $name, $price, $image)
        {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->image = $image;
        }

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
    }

    class ProductpriaRepository extends Productpria //Kita menambahkan inheritance dengan mengextends product pria
    {
        private $koneksi;

        public function __construct($koneksi)
        {
            $this->koneksi = $koneksi;
        }

        public function getProductById($productId)
        {
            $query = "SELECT * FROM tb_produk_pria WHERE id = $productId";
            $hasil = mysqli_query($this->koneksi, $query);
            $data = mysqli_fetch_array($hasil);

            parent::__construct ($data['id'], $data['nama_produk'], $data['harga'], $data['gambar']); //disini penerapan parentnya
            return $this;
        }
        public function getdesc()
        {
            $query = "SELECT * FROM tb_produk_pria WHERE id = ".$this->getId();
            $hasil = mysqli_query($this->koneksi, $query);
            $data = mysqli_fetch_array($hasil);
            
            return $data['detail_singkat'];
        }
        
    }


    // Penggunaan
    ?>
    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "ecommerce");
    $productRepository = new ProductpriaRepository($koneksi);
    ?>

    <div class='container-fluid pt-5 pb-3' id="produkpria">
        <h2 class='section-title position-relative text-uppercase mx-xl-5 mb-4'><span class='bg-secondary pr-3'>Produk
                Pria</span></h2>

        <div class='row'>
            <?php for ($i = 1; $i <= 4; $i++) : ?>
                <?php $product = $productRepository->getProductById($i); ?>
                <div class='col-lg-3 col-md-4 col-sm-6 pb-1'>
                    <div class='product-item bg-light mb-4'>
                        <div class='product-img position-relative overflow-hidden'>
                            <img class='img-fluid w-100' src='img/<?= $product->getImage() ?>' alt='' style='height: 650px; object-fit: cover;'>
                            <div class='product-action'>
                                <a class='btn btn-outline-dark btn-square' href='beli.php?id=<?php echo $i ?>'><i class='fa fa-shopping-cart'></i></a>
                                <a class='btn btn-outline-dark btn-square' href='detail.php?idp=<?php echo $i ?>'><i class='fa fa-search'></i></a>
                            </div>
                        </div>
                        <div class='text-center py-4'>
                            <a class='h6 text-decoration-none text-truncate' href=''>
                                <?= $product->getName() ?>
                            </a>
                            <a class='h6 text-decoration-none text-truncate' href=''>
                                <?= $product->getdesc() ?><!-- Penerapan Polymorphism -->
                            </a>
                            <div class='d-flex align-items-center justify-content-center mt-2'>
                                <h5>Rp.
                                    <?= number_format($product->getPrice(), 0, ',', '.') ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <div class="container text-center">
        <p class="mt-4"><a href='shop.php' class="btn btn-primary">Produk Lainnya</a></p>
    </div>


    </div>
    </div>



    <!-- Products End -->




<?php
include ('footer.php');

$footer = new footer();
$footer->render();
?>
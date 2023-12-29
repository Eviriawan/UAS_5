<?php
class footer
{
    public function render()
    {
        ?>
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
                                <a class="text-secondary mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Product
                                    </a>
                                <a class="text-secondary mb-2" href="cart.php"><i
                                        class="fa fa-angle-right mr-2"></i>Cart</a>
                                <a class="text-secondary mb-2" href="checkout.php"><i
                                        class="fa fa-angle-right mr-2"></i>Checkout</a>
                                <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact
                                    </a>
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
        <?php
    }
}
?>

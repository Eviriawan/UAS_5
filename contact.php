<?php
include 'header.php';

$header = new header();
$header->render();#ndjdhdjd
?>



    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Contact</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact
                Us</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form method="post" name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" name='name' placeholder="Your Name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="name" name='email' placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" name='subject' placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="8" id="name" name='message' placeholder="Message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button name="tombol" class="btn btn-primary py-2 px-4" type="submit"
                                id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            include 'koneksi.php';

            class Pesan
            {
                private $koneksi;

                public function __construct($koneksi)
                {
                    $this->koneksi = $koneksi;
                }

                public function contact($name, $email, $subject, $message)
                {
                    // Use prepared statement to prevent SQL injection
                    $query = "INSERT INTO tb_pesan (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
                    $sql = mysqli_query($this->koneksi, $query);
                    return $sql;
                }
            }

            $pesan = new Pesan($koneksi);

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tombol'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                // Call the contact method
                $result = $pesan->contact($name, $email, $subject, $message);

                if ($result) {
                    header("location: index.php");
                    exit();
                }
            }
            ?>


        </div>
    </div>
    <!-- Contact End -->

<?php
include ('footer.php');

$footer = new footer();
$footer->render();
?>

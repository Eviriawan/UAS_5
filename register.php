<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">


        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat sebuah Akun!</h1>
                            </div>
                            <form class="user" method="get">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Lengkap" name="fullname">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                </div>

                                <input type="submit" name="input" value="Register Account" class="btn btn-primary btn-user btn-block">

                                <hr>
                            </form>
                            <?php
                            include 'koneksi.php';

                            class User
                            {   
                                private $koneksi;

                                public function __construct($koneksi)
                                {
                                    $this->koneksi = $koneksi;
                                }

                                public function daftarAkun($fullname, $email, $password)
                                {
                                    // Hash password menggunakan password_hash()
                                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                                    $query = "INSERT INTO tb_user(fullname, email, password) VALUES ('$fullname', '$email', '$hashedPassword')";
                                    $sql = mysqli_query($this->koneksi, $query);

                                    if($sql){
                                        header("location: login.php?success=1");
                                        exit();
                                    }else{
                                        echo "Error: ".$query."<br>".mysqli_error($this->koneksi);
                                    }
                                }
                            }

                            // Usage
                            if (isset($_GET['input']) && $_GET['input'] == 'Register Account') {
                                $user = new User($koneksi);

                                $username = $_GET['fullname'];
                                $email = $_GET['email'];
                                $password = $_GET['password'];
                                
                                $user->daftarAkun($username, $email, $password);
                            }
                            ?>

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>
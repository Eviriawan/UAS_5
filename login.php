<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Masukkan akun</h1>
                                    </div>
                                    <?php

                                    if (isset($_GET['success']) && $_GET['success'] == 1) {
                                        echo '<div class="alert alert-success" role="alert">Registration successful! Please log in.</div>';
                                    }
                                    ?>
                                    <form class="user" method="get">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="username" aria-describedby="email" placeholder="Masukkan Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" name="input" value="login" class="btn btn-primary btn-user btn-block">
                                        <hr>
                                    </form>
                                    <?php
                                    class Authentication
                                    {
                                        private $koneksi;
                                    
                                        public function __construct($koneksi)
                                        {
                                            $this->koneksi = $koneksi;
                                        }
                                    
                                        public function login($email, $password)
                                        {
                                            $query = "SELECT * FROM tb_user WHERE email='$email' AND password='$password'";
                                            $result = mysqli_query($this->koneksi, $query);
                                    
                                            return $result;
                                        }
                                    }
                                    
                                    include 'koneksi.php';
                                    
                                    $authentication = new Authentication($koneksi);
                                    
                                    if (isset($_GET['input']) && $_GET['input'] == 'login') {
                                        $email = $_GET['email'];
                                        $password = $_GET['password'];
                                    
                                        $result = $authentication->login($email, $password);
                                    
                                        if ($result) {
                                            header("location: index.php");
                                            exit();
                                        }
                                    }
                                    ?>
                                    
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
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
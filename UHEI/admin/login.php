<?php
session_start();
include("db_connection.php");

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1){
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit;
  }else{
    echo "<script>alert('Invalid username or password')</script>";

    
  }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" method="POST" action="">
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="username" aria-describedby="emailHelp" placeholder="Enter Your ID..." name="username"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password"></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                
                                            </div>
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit" name="login">Login</button>
                                        
                                        <hr>
                                        <!--
                                        <a class="" href="register.php"><span>Register</span></a>
                                        <a class="" href="../index.html"><span>Home</span></a>
                                        -->
                                    </form>
                                    <?php if(isset($login_error)){ ?>
                                        <div class="error"><?php echo $login_error; ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col m-auto"><img class="shadow-sm" src="assets/img/Gambar/img1.jpg" style="width: 98%;padding-top: 30px;padding-bottom: 30px;padding-right: 5px;padding-left: 5px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
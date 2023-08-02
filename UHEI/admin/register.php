<?php
require_once('db_connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
  
    // Check if username already exists
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
  
    if(mysqli_num_rows($result) > 0){
      $error = "Username already exists.";
    }
    elseif($password != $repeat_password){
      $error = "Passwords do not match.";
    }
    else{
      // Insert user into database
      $query = "INSERT INTO users (username, password, email, first_name, last_name) VALUES ('$username', '$password', '$email', '$first_name', '$last_name')";
      mysqli_query($conn, $query);
  
      // Show prompt indicating successful registration
      echo "<script>alert('Account registered successfully!')</script>";
  
      // Redirect to login page
      header('Location: login.php');
      exit;
    }
  }
  
  mysqli_close($conn);
  ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col m-auto" style="padding: 0px;"><img class="rounded border shadow" src="assets/img/Gambar/img2.jpg" style="width: 100%;"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" method="POST" action="">
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="first_name" placeholder="First Name" name="first_name"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="last_name" placeholder="Last Name" name="last_name"></div> 
                                </div>

                                <div class="mb-3"><input class="form-control form-control-user" type="text" id="username" aria-describedby="emailHelp" placeholder="Username / ID" name="username"></div>
                                <!--
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="username" placeholder="Username / ID" name="username"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Last Name" name="last_name"></div>
                                </div>
                                -->
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="repeat_password" placeholder="Repeat Password" name="repeat_password"></div>
                                </div>
                                <div class="mb-3"><input class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="Email Address" name="email"></div>
                                
                                <button class="btn btn-primary d-block btn-user w-100" type="submit" name="register">Register Account</button>
                                <hr>
                            </form>
                            <?php if(isset($register_error)){ ?>
                                <div class="error"><?php echo $register_error; ?></div>
                            <?php } ?>
                            
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
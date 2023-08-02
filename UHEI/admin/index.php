<?php
session_start();

if(!isset($_SESSION['username'])){
  header('Location: login.php');
  exit;
}

require_once('db_connection.php');

// Get first name of logged-in user
$username = $_SESSION['username'];
$query = "SELECT first_name FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$first_name = $row['first_name'];

// Retrieve form data
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $year = $_POST['year'];
    $month = $_POST['month'];
    $name = implode(", ", $_POST['name']);
    

    // Fetch data from the database
    $sql = "SELECT * FROM form WHERE year = '$year' AND month = '$month'  AND name = '$name' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $name = $row["name"];
            $year = $row["year"];
            $month = $row["month"];
            $pb1 = $row["pb1"];
            $pb2 = $row["pb2"];
            $pb3 = $row["pb3"];
            $pb4 = $row["pb4"];
            $pb5 = $row["pb5"];
            $pb6 = $row["pb6"];
            $pb7 = $row["pb7"];
            $sb1 = $row["sb1"];
            $sb2 = $row["sb2"];
            $sb3 = $row["sb3"];
            $sb4 = $row["sb4"];
            $sb5 = $row["sb5"];
            $sb6 = $row["sb6"];
            $sb7 = $row["sb7"];
            $k1 = $row["k1"];
            $k2 = $row["k2"];
            $k3 = $row["k3"];

             // Calculate the totals
            $pb_total = $pb1 + $pb2 + $pb3 + $pb4 + $pb5 + $pb6 + $pb7;
            $sb_total = $sb1 + $sb2 + $sb3 + $sb4 + $sb5 + $sb6 + $sb7;
            $k_total = $k1 + $k2 + $k3;

            // Set session variables
            $_SESSION['year'] = $year;
            $_SESSION['month'] = $month;
            $_SESSION['name'] = $name;
            $_SESSION['pb1'] = $pb1;
            $_SESSION['pb2'] = $pb2;
            $_SESSION['pb3'] = $pb3;
            $_SESSION['pb4'] = $pb4;
            $_SESSION['pb5'] = $pb5;
            $_SESSION['pb6'] = $pb6;
            $_SESSION['pb7'] = $pb7;
            $_SESSION['sb1'] = $sb1;
            $_SESSION['sb2'] = $sb2;
            $_SESSION['sb3'] = $sb3;
            $_SESSION['sb4'] = $sb4;
            $_SESSION['sb5'] = $sb5;
            $_SESSION['sb6'] = $sb6;
            $_SESSION['sb7'] = $sb7;
            $_SESSION['k1'] = $k1;
            $_SESSION['k2'] = $k2;
            $_SESSION['k3'] = $k3;
            $_SESSION['pb_total'] = $pb_total;
            $_SESSION['sb_total'] = $sb_total;
            $_SESSION['k_total'] = $k_total;

            if (mysqli_query($conn, $sql)) {
                
                // Redirect the user to a different page
                header('Location: report.php');
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
        }
    }
}




mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-mosque" style="transform: rotate(14deg);"></i></div>
                    <div class="sidebar-brand-text mx-3"><span style="font-size: 30px;font-weight: bold;">UHEI</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><span>Table</span></a><a class="nav-link" href="form.php"><span>Form</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php"><span>Register</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $first_name; ?></span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Coming soon</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Coming soon</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Coming soon</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    
                            <form style="padding-right: 5px;padding-left: 15px;" method="POST" action="">
                                <div class="row" style="padding-bottom: 15px;">
                                    <div class="col">
                                        <h1 class="fw-bolder" style="text-align: center;">REPORT&nbsp;</h1>
                                    </div>
                                </div>
                                <div class="row" style="padding-bottom: 15px;padding-top: 15px;border-bottom-color: rgba(45,45,45,0.4);">
                                    <div class="col"><label class="form-label">TAHUN :</label>
                                        <select name="year" class="form-select">
                                            <option value="undefined" selected="">Sila Pilih Tahun...</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                            <option value="2034">2034</option>
                                            <option value="2035">2035</option>
                                            <option value="2036">2036</option>
                                            <option value="2037">2037</option>
                                            <option value="2038">2038</option>
                                            <option value="2039">2039</option>
                                            <option value="2040">2040</option>
                                        </select>
                                        <label class="form-label" style="padding-top: 5px;">BULAN :<br></label>
                                        <select name="month" class="form-select">
                                            <option value="undefined" selected="">Sila Pilih Bulan...</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Mac</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Jun</option>
                                            <option value="07">Julai</option>
                                            <option value="08">Ogos</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Disember</option>
                                        </select></div>
                                    <div class="col">
                                        <fieldset><label class="form-label">NAMA:<br></label>
                                            <div class="form-check"><input name="name[]" value="MASLIYANA BINTI ISMAIL" class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">MASLIYANA BINTI ISMAIL</label></div>
                                            <div class="form-check"><input name="name[]" value="MOHD ADENAN BIN MOHD YUSOFF" class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">MOHD ADENAN BIN MOHD YUSOFF</label></div>
                                            <div class="form-check"><input name="name[]" value="MOHD KHAIRUDDIN BIN MD SUL HAIMI" class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">MOHD KHAIRUDDIN BIN MD SUL HAIMI</label></div>
                                            <div class="form-check"><input name="name[]" value="MOHD IZLAN BIN ABDUL HALIK" class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">MOHD IZLAN BIN ABDUL HALIK</label></div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center" style="padding-bottom: 25px;"><button class="btn btn-primary btn-lg text-center" type="submit" name="submit" >SUBMIT</button></div>
                                </div>
                            </form>


                    
                </div>
            </div>


            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © UHEI 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
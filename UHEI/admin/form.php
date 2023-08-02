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
    $pb1 = $_POST['pb1'];
    $pb2 = $_POST['pb2'];
    $pb3 = $_POST['pb3'];
    $pb4 = $_POST['pb4'];
    $pb5 = $_POST['pb5'];
    $pb6 = $_POST['pb6'];
    $pb7 = $_POST['pb7'];
    $sb1 = $_POST['sb1'];
    $sb2 = $_POST['sb2'];
    $sb3 = $_POST['sb3'];
    $sb4 = $_POST['sb4'];
    $sb5 = $_POST['sb5'];
    $sb6 = $_POST['sb6'];
    $sb7 = $_POST['sb7'];
    $k1 = $_POST['k1'];
    $k2 = $_POST['k2'];
    $k3 = $_POST['k3'];

    // check if any of the values are empty or null and set them to 0
    foreach (array('pb1', 'pb2', 'pb3', 'pb4', 'pb5', 'pb6', 'pb7', 'sb1', 'sb2', 'sb3', 'sb4', 'sb5', 'sb6', 'sb7', 'k1', 'k2', 'k3') as $col) {
        if (empty($$col) || is_null($$col)) {
            $$col = 0;
        }
    }

    // replace the variables with their updated values in the SQL statement
    $sql = str_replace(array('$pb1', '$pb2', '$pb3', '$pb4', '$pb5', '$pb6', '$pb7', '$sb1', '$sb2', '$sb3', '$sb4', '$sb5', '$sb6', '$sb7', '$k1', '$k2', '$k3'), 
                    array($pb1, $pb2, $pb3, $pb4, $pb5, $pb6, $pb7, $sb1, $sb2, $sb3, $sb4, $sb5, $sb6, $sb7, $k1, $k2, $k3), $sql);
    // Insert data into MySQL database
    $sql = "INSERT INTO form 
        (year, month, name, pb1, pb2, pb3, pb4, pb5, pb6, pb7, sb1, sb2, sb3, sb4, sb5, sb6, sb7, k1, k2, k3) 
        VALUES 
        ('$year', '$month', '$name', '$pb1', '$pb2', '$pb3', '$pb4', '$pb5', '$pb6', '$pb7', 
        '$sb1', '$sb2', '$sb3', '$sb4', '$sb5', '$sb6', '$sb7', '$k1', '$k2' , '$k3')";


    if (mysqli_query($conn, $sql)) {
        // Display a success message
        echo "<script>alert('Data submitted successfully!')</script>";
        // Redirect the user to a different page
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
 
} 
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Form</title>
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
                    <li class="nav-item"><a class="nav-link" href="index.php"><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><span>Table</span></a><a class="nav-link active" href="form.php"><span>Form</span></a></li>
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
                    <h3 class="text-dark mb-4">Borang</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Program Bimbingan</p>
                        </div>
                        <div class="card-body">

                        <section>
                        <div>
                            <form style="padding-right: 5px;padding-left: 15px;" method="POST" action="">
                                <div class="row" style="padding-bottom: 15px;">
                                    <div class="col">
                                        <h1 class="fw-bolder" style="text-align: center;">BIMBINGAN INDIVIDU DAN KELOMPOK&nbsp;</h1>
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
                                <div class="row" style="padding-bottom: 15px;padding-top: 15px;">
                                    <div class="col"><label class="form-label">INDIVIDU (PELAJAR)<br></label>
                                    <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B1. AKADEMIK<input class="form-control" type="text" name="pb1"></label>
                                    <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B2. KEWANGAN<input class="form-control" type="text" name="pb2"></label>
                                    <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B3. AKIDAH<input class="form-control" type="text" name="pb3"></label>
                                    <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B4. AKHLAK<input class="form-control" type="text" name="pb4"></label>
                                    <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B5. AL-QURAN<input class="form-control" type="text" name="pb5"></label>
                                    <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B6. SYARIAH<input class="form-control" type="text" name="pb6"></label>
                                    <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B7. AKTIVITI<input class="form-control" type="text" name="pb7"></label>
                                </div>
                                    <div class="col"><label class="form-label">INDIVIDU (STAF)<br></label>
                                        <div></div><label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B1. AKADEMIK<input class="form-control" type="text" name="sb1"></label>
                                        <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B2. KEWANGAN<input class="form-control" type="text" name="sb2"></label>
                                        <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B3. AKIDAH<input class="form-control" type="text" name="sb3"></label>
                                        <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B4. AKHLAK<input class="form-control" type="text" name="sb4"></label>
                                        <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B5. AL-QURAN<input class="form-control" type="text" name="sb5"></label>
                                        <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B6. SYARIAH<input class="form-control" type="text" name="sb6"></label>
                                        <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">B7. AKTIVITI<input class="form-control" type="text" name="sb7"></label>
                                    </div>
                                    <div class="col"><label class="form-label">KELOMPOK<br></label>
                                        <div></div><label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">KOMUNITI<input class="form-control" type="text" name="k1"></label>
                                        <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">STAF<input class="form-control" type="text" name="k2"></label>
                                        <label class="form-label" style="padding-top: 5px;padding-bottom: 5px;">PELAJAR<br><input class="form-control" type="text" name="k3"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center" style="padding-bottom: 25px;"><button class="btn btn-primary btn-lg text-center" type="submit" name="submit" >SUBMIT</button></div>
                                    <div class="col text-center" style="padding-bottom: 25px;"><a class="btn btn-secondary btn-lg text-center" role="button" href="index.php">REPORT</a></div>
                                </div>
                            </form>
                        </div>
                    </section>


                        </div>
                    </div>
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
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
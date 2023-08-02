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

// Get session variables
$year = $_SESSION['year'];
$month = $_SESSION['month'];
$name = $_SESSION['name'];
$pb1 = $_SESSION['pb1'];
$pb2 = $_SESSION['pb2'];
$pb3 = $_SESSION['pb3'];
$pb4 = $_SESSION['pb4'];
$pb5 = $_SESSION['pb5'];
$pb6 = $_SESSION['pb6'];
$pb7 = $_SESSION['pb7'];
$sb1 = $_SESSION['sb1'];
$sb2 = $_SESSION['sb2'];
$sb3 = $_SESSION['sb3'];
$sb4 = $_SESSION['sb4'];
$sb5 = $_SESSION['sb5'];
$sb6 = $_SESSION['sb6'];
$sb7 = $_SESSION['sb7'];
$k1 = $_SESSION['k1'];
$k2 = $_SESSION['k2'];
$k3 = $_SESSION['k3'];
$pb_total = $_SESSION['pb_total'];
$sb_total = $_SESSION['sb_total'];
$k_total = $_SESSION['k_total'];

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
                        
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#" onclick="window.open('Print.php', 'popUpWindow', 'width=600, height=700'); return false;"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>

                    </div>

                    <div class="row">


                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="text-primary fw-bold m-0">INDIVIDU (PELAJAR)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;

                                            :{&quot;labels&quot;:[&quot;AKADEMIK&quot;,&quot;KEWANGAN&quot;,&quot;AKIDAH&quot;,&quot;AKHLAK&quot;,&quot;AL-QURAN&quot;,&quot;SYARIAH&quot;,&quot;AKTIVITI&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#390099&quot;,&quot;#9e0059&quot;,&quot;#ff0054&quot;,&quot;#ff5400&quot;,&quot;#ffbd00&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;
                                        
                                            :[&quot;<?php echo $pb1; ?>&quot;
                                            ,&quot;<?php echo $pb2; ?>&quot;
                                            ,&quot;<?php echo $pb3; ?>&quot;
                                            ,&quot;<?php echo $pb4; ?>&quot;
                                            ,&quot;<?php echo $pb5; ?>&quot;
                                            ,&quot;<?php echo $pb6; ?>&quot;

                                            ,&quot;<?php echo $pb7; ?>&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}">
                                        
                                        </canvas></div>

                                    <div class="small mt-4">
                                        <div class="row">
                                            <div class="col"><span class="me-2"><i class="fas fa-circle text-primary">
                                            </i>&nbsp;AKADEMIK</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #1cc88a;--bs-primary-rgb: 28,200,138;">
                                            </i>KEWANGAN</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #390099;--bs-primary-rgb: 57,0,153;">
                                            </i>AKIDAH</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col"><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #9e0059;--bs-primary-rgb: 158,0,89;">
                                            </i>AKHLAK</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ff0054;--bs-primary-rgb: 255,0,84;">
                                            </i>AL-QURAN</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ff5400;--bs-primary-rgb: 255,84,0;">
                                            </i>&nbsp;SYARIAH</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col"><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ffbd00;--bs-primary-rgb: 255,189,0;">
                                            </i>&nbsp;AKTIVITI</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="text-primary fw-bold m-0">INDIVIDU (STAF)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;
                                            
                                            :{&quot;labels&quot;:[&quot;AKADEMIK&quot;,&quot;KEWANGAN&quot;,&quot;AKIDAH&quot;,&quot;AKHLAK&quot;,&quot;AL-QURAN&quot;,&quot;SYARIAH&quot;,&quot;AKTIVITI&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#390099&quot;,&quot;#9e0059&quot;,&quot;#ff0054&quot;,&quot;#ff5400&quot;,&quot;#ffbd00&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;
                                            
                                            :[&quot;<?php echo $sb1; ?>&quot;
                                            ,&quot;<?php echo $sb2; ?>&quot;
                                            ,&quot;<?php echo $sb3; ?>&quot;
                                            ,&quot;<?php echo $sb4; ?>&quot;
                                            ,&quot;<?php echo $sb5; ?>&quot;
                                            ,&quot;<?php echo $sb6; ?>&quot;
                                            ,&quot;<?php echo $sb7; ?>&quot;]}]},

                                            &quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}">
                                        
                                        </canvas></div>

                                    <div class="small mt-4">
                                        <div class="row">
                                            <div class="col"><span class="me-2"><i class="fas fa-circle text-primary">
                                            </i>&nbsp;AKADEMIK</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #1cc88a;--bs-primary-rgb: 28,200,138;">
                                            </i>KEWANGAN</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #390099;--bs-primary-rgb: 57,0,153;">
                                            </i>AKIDAH</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col"><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #9e0059;--bs-primary-rgb: 158,0,89;">
                                            </i>AKHLAK</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ff0054;--bs-primary-rgb: 255,0,84;">
                                            </i>AL-QURAN</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ff5400;--bs-primary-rgb: 255,84,0;">
                                            </i>&nbsp;SYARIAH</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col"><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ffbd00;--bs-primary-rgb: 255,189,0;">
                                        </i>&nbsp;AKTIVITI</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="text-primary fw-bold m-0">KELOMPOK</h5>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;
                                            
                                            :{&quot;labels&quot;:[&quot;Direct&quot;,&quot;Social&quot;,&quot;Referral&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;
                                            
                                            :[&quot;<?php echo $k1; ?>&quot;
                                            ,&quot;<?php echo $k2; ?>&quot;
                                            ,&quot;<?php echo $k3; ?>&quot;]}]},

                                            &quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}">
                                        
                                        </canvas></div>
                                        
                                    <div class="text-center small mt-4" style="padding-bottom: 40px;"><span class="me-2"><i class="fas fa-circle text-primary"></i>KOMUNITI</span><span class="me-2"><i class="fas fa-circle text-success"></i>STAF</span><span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;PELAJAR</span></div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col" style="padding-left: 15px;">
                            <h4 class="text-dark mb-0" style="text-align: left;font-weight: bold;">Tahun: <?php echo $year; ?></h4>
                            <h4 class="text-dark mb-0" style="text-align: left;font-weight: bold;">Bulan: <?php echo $month; ?></h4>
                            <h4 class="text-dark mb-0" style="text-align: left;font-weight: bold;">Nama: <?php echo $name; ?></h4>
                        </div>
                        <div class="col" style="padding-left: 15px;">
                            <h4 class="text-dark mb-0" style="text-align: left;font-weight: bold;">Jumlah Pelajar: <?php echo $pb_total; ?></h4>
                            <h4 class="text-dark mb-0" style="text-align: left;font-weight: bold;">Jumlah Staf: <?php echo $sb_total; ?></h4>
                            <h4 class="text-dark mb-0" style="text-align: left;font-weight: bold;">Jumlah Kelompok: <?php echo $k_total; ?></h4>
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
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
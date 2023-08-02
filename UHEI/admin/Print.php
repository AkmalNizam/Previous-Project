<?php
session_start();

if(!isset($_SESSION['username'])){
  header('Location: login.php');
  exit;
}

require_once('db_connection.php');


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
    <title>Report</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">


</head>

<body id="page-top">
    <div id="wrapper">

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">


                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Report</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" onclick="window.print()"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Print</a>
                    </div>
                    <div class="row">


                        <div class="col-lg-5 col-xl-4">
                            <div class="card  mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="text-primary fw-bold m-0">INDIVIDU (PELAJAR)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area" style="width: 30mm; height: 30mm; margin:0 auto;">
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
                                            <div class="col" style="text-align:center;"><span class="me-2"><i class="fas fa-circle text-primary">
                                            </i>&nbsp;AKADEMIK</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #1cc88a;--bs-primary-rgb: 28,200,138;">
                                            </i>KEWANGAN</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #390099;--bs-primary-rgb: 57,0,153;">
                                            </i>AKIDAH</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col" style="text-align:center;"><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #9e0059;--bs-primary-rgb: 158,0,89;">
                                            </i>AKHLAK</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ff0054;--bs-primary-rgb: 255,0,84;">
                                            </i>AL-QURAN</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ff5400;--bs-primary-rgb: 255,84,0;">
                                            </i>&nbsp;SYARIAH</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col" style="text-align:center;"><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ffbd00;--bs-primary-rgb: 255,189,0;">
                                            </i>&nbsp;AKTIVITI</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-5 col-xl-4">
                            <div class="card  mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="text-primary fw-bold m-0">INDIVIDU (STAF)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area" style="width: 30mm; height: 30mm; margin:0 auto;">
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
                                        <div class="row" >
                                            <div class="col"style="text-align:center;"><span class="me-2"><i class="fas fa-circle text-primary">
                                            </i>&nbsp;AKADEMIK</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #1cc88a;--bs-primary-rgb: 28,200,138;">
                                            </i>KEWANGAN</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #390099;--bs-primary-rgb: 57,0,153;">
                                            </i>AKIDAH</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col" style="text-align:center;"><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #9e0059;--bs-primary-rgb: 158,0,89;">
                                            </i>AKHLAK</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ff0054;--bs-primary-rgb: 255,0,84;">
                                            </i>AL-QURAN</span><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ff5400;--bs-primary-rgb: 255,84,0;">
                                            </i>&nbsp;SYARIAH</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col" style="text-align:center;"><span class="me-2"><i class="fas fa-circle text-primary" style="--bs-primary: #ffbd00;--bs-primary-rgb: 255,189,0;">
                                        </i>&nbsp;AKTIVITI</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-5 col-xl-4">
                            <div class="card  mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="text-primary fw-bold m-0">KELOMPOK</h5>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area" style="width: 30mm; height: 30mm; margin:0 auto;">
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
                            <h6 class="text-dark mb-0" style="text-align: left;">Tahun: <?php echo $year; ?></h6>
                            <h6 class="text-dark mb-0" style="text-align: left;">Bulan: <?php echo $month; ?></h6>
                            <h6 class="text-dark mb-0" style="text-align: left;">Nama: <?php echo $name; ?></h6>
                        </div>
                        <div class="col" style="padding-left: 15px;">
                            <h6 class="text-dark mb-0" style="text-align: left;">Jumlah Pelajar: <?php echo $pb_total; ?></h6>
                            <h6 class="text-dark mb-0" style="text-align: left;">Jumlah Staf: <?php echo $sb_total; ?></h6>
                            <h6 class="text-dark mb-0" style="text-align: left;">Jumlah Kelompok: <?php echo $k_total; ?></h6>
                        </div>
                    </div>

                </div>
            </div>



        
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
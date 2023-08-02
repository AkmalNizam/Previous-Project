<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require_once('db_connection.php');

// Check if the row ID is provided
if (!isset($_GET['id'])) {
    header('Location: table.php');
    exit;
}

$rowId = $_GET['id'];

// Fetch the row data from the database
$query = "SELECT * FROM timetable WHERE id='$rowId'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Process update form submission
if (isset($_POST['submit'])) {
    $program = $_POST['program'];
    $month = $_POST['month'];

    // Update the row in the database
    $updateQuery = "UPDATE timetable SET program='$program', month='$month' WHERE id='$rowId'";
    mysqli_query($conn, $updateQuery);

    // Redirect to the table page after updating
    header('Location: table.php');
    exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Table</title>
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
                    <li class="nav-item"><a class="nav-link active" href="table.php"><span>Table</span></a><a class="nav-link" href="form.php"><span>Form</span></a></li>
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
                    <h3 class="text-dark mb-4">Edit Row</h3>
                    <div class="card shadow">
                        <div class="card-body">
                            <!-- Edit row form -->
                            <form method="POST" action="edit_table.php?id=<?php echo $rowId; ?>">
                                <div class="mb-3">
                                    <label for="program" class="form-label">Program</label>
                                    <input type="text" class="form-control" id="program" name="program" value="<?php echo $row['program']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="month" class="form-label">Bulan</label>
                                    <input type="text" class="form-control" id="month" name="month" value="<?php echo $row['month']; ?>" required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </form>
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
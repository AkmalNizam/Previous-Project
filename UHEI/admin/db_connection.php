 <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uhei";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

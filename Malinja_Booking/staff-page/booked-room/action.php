<?php
session_start();
$User_Id = "";
$Name = "";
$Email = "";
$Phone = "";
$Room_Name = "";
$Purpose = "";
$Date = "";
$Hour_Start = "";
$Min_Start = "";
$AmPm_Start = "";
$Hour_End = "";
$Min_End = "";
$AmPm_End = "";
$id = 0;
$edit_state = false;

$db = mysqli_connect('localhost','root','','login-pagedb');
if(!$db){
	die ("Connection failed :".mysqli_connect_error());
	}

if(isset($_POST['save'])){
	$User_Id = $_POST['User_Id'];
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Phone = $_POST['Phone'];
	$Room_Name = $_POST['Room_Name'];
	$Purpose = $_POST['Purpose'];
	$Date = $_POST['Date'];
	$Hour_Start = $_POST['Hour_Start'];
	$Min_Start = $_POST['Min_Start'];
	$AmPm_Start = $_POST['AmPm_Start'];
	$Hour_End = $_POST['Hour_End'];
	$Min_End = $_POST['Min_End'];
	$AmPm_End = $_POST['AmPm_End'];
	$query ="INSERT INTO booking (User_Id, Name, Email, Room_Name, Purpose, Date, Hour_Start, Min_Start, AmPm_Start, Hour_End, Min_End, AmPm_End ) 
			VALUES 
			('$User_Id', '$Name', '$Email', '$Room_Name', '$Purpose', '$Date', '$Hour_Start', '$Min_Start', '$AmPm_Start', '$Hour_End','$Min_End','$AmPm_End')";
	mysqli_query($db, $query); 
	$_SESSION['msg'] = "Account Added";
	header('location: index.php');
}
///display
$results = mysqli_query($db, "SELECT * FROM  booking");
///update
if(isset($_POST['update'])){
	$User_Id = $_POST['User_Id'];
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Phone = $_POST['Phone'];
	$Room_Name = $_POST['Room_Name'];
	$Purpose = $_POST['Purpose'];
	$Date = $_POST['Date'];
	$Hour_Start = $_POST['Hour_Start'];
	$Min_Start = $_POST['Min_Start'];
	$AmPm_Start = $_POST['AmPm_Start'];
	$Hour_End = $_POST['Hour_End'];
	$Min_End = $_POST['Min_End'];
	$AmPm_End = $_POST['AmPm_End'];
	$id = $_POST['id'];
	$update = "UPDATE booking SET User_Id='$User_Id', Name='$Name', Email='$Email', Room_Name='$Room_Name', Purpose='$Purpose', 
				Date='$Date', Hour_Start='$Hour_Start', Min_Start='$Min_Start', AmPm_Start='$AmPm_Start', Hour_End='$Hour_End', Min_End='$Min_End', AmPm_End='$AmPm_End' 
				WHERE id=$id";
	mysqli_query($db, $update);
	$_SESSION['msg'] = "Account updated";
	header('location: index.php');
}
if(isset($_GET['del'])){
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM booking WHERE id=$id");
	$_SESSION['msg'] = "Account deleted";
	header('location: index.php');
}

?>
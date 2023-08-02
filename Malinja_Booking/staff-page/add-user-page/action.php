<?php
session_start();
$stud_name = "";
$stud_id = "";
$stud_ic = "";
$id = 0;
$edit_state = false;

$db = mysqli_connect('localhost','root','','login-pagedb');
if(!$db){
	die ("Connection failed :".mysqli_connect_error());
	}

if(isset($_POST['save'])){
	$stud_name = $_POST['stud_name'];
	$stud_id = $_POST['stud_id'];
	$stud_ic = $_POST['stud_ic'];
	
	$query ="INSERT INTO user (stud_id, stud_ic, stud_name) VALUES ('$stud_id', '$stud_ic', '$stud_name')";
	mysqli_query($db, $query); 
	$_SESSION['msg'] = "Account Added";
	header('location: index.php');
}
///display
$results = mysqli_query($db, "SELECT * FROM  user");
///update
if(isset($_POST['update'])){
	$stud_name = $_POST['stud_name'];
	$stud_id = $_POST['stud_id'];
	$stud_ic = $_POST['stud_ic'];
	$id = $_POST['id'];
	$update = "UPDATE user SET stud_name='$stud_name', stud_id='$stud_id', stud_ic='$stud_ic' WHERE id=$id";
	mysqli_query($db, $update);
	$_SESSION['msg'] = "Account updated";
	header('location: index.php');
}
if(isset($_GET['del'])){
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM user WHERE id=$id");
	$_SESSION['msg'] = "Account deleted";
	header('location: index.php');
}

?>
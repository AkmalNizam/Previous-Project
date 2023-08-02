<?php
$msg="";
$css_class="";

include 'dbconfig/config.php';
if(isset($_POST['booking'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$room_name=$_POST['room_name'];
	$purpose=$_POST['purpose'];
	$date=$_POST['date'];
	$class_start=$_POST['class_start'];
	$min_start=$_POST['min_start'];
	$ampm_start=$_POST['ampm_start'];
	$class_end=$_POST['class_end'];
	$min_end=$_POST['min_end'];
	$ampm_end=$_POST['ampm_end'];

$sql="insert into booking(User_Id, Name, Email, Phone, Room_Name, Purpose, Date, Hour_Start, Min_Start, AmPm_Start, Hour_End, Min_End, AmPm_End)
		values 
		('$id', '$name','$email','$phone','$room_name','$purpose','$date','$class_start','$min_start','$ampm_start','$class_end','$min_end','$ampm_end')";
	
	if(mysqli_query($con, $sql)){
		$msg = "Data Submmitted";
		$css_class = "alert-success";
		header("Location: ../index.html");
	}
	else{
		$msg = "Failed to submit data!!";
		$css_class = "alert-danger";
		header("Location: index.html");
	}

}
?>
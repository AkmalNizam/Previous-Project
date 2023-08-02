<?php
	$idNo = filter_input(INPUT_POST, 'idNo');
	$icNo = filter_input(INPUT_POST, 'icNo');
	
	require 'dbconfig/config.php';
	$query="select * from user WHERE stud_id='$idNo' AND stud_ic='$icNo' limit 1";
						
	$result = mysqli_query($con,$query);
	if(!$result || mysqli_num_rows($result)==1)
	{
		//valid
		switch($_REQUEST['action']) {

		case 'staff':
					header('location:staff-page/index.html');
					break;

		case 'student': 
					header('location:user-page/index.html');
					break;

		}
	}
	else
	{
		//invalid
		echo "You Entered Incorrect ID or IC No";
		exit();
	}
	
?>
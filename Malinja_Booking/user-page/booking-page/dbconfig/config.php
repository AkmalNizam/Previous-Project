<?php
$con = mysqli_connect('localhost','root','','login-pagedb');

if(!$con){
	die ("Connection failed :".mysqli_connect_error());
	}
?>
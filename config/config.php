<?php
//turn on out put buffering
ob_start();
$timezone = date_default_timezone_set("Asia/Kolkata");
$con = mysqli_connect("localhost","root","","SMW");
if(mysqli_connect_errno())
{
	echo "Fail to connect: " . mysqli_connect_errno();
}
session_start();
?>
<?php
session_start();
include_once("includes/config.php");
extract($_POST);
$description = mysqli_real_escape_string($con, $description);


$qry = "insert into contact (name,email,subject,description) values('" . $name . "','" . $email . "','".$subject."','" . $description . "')";
mysqli_query($con, $qry) or exit("fail" . mysqli_error($con));
$_SESSION['error'] = "successfuly";
header("location:contact.php");
?>  

<?php
session_start();
include_once("includes/config.php");
extract($_POST);



$qry = "insert into signup (user,email,pass) values('" . $user . "','" . $email . "','" . $pass . "')";
mysqli_query($con, $qry) or exit("fail" . mysqli_error($con));
$_SESSION['error'] = "successfuly";
header("location:sign-in.php");


?>
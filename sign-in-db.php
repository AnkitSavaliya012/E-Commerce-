<?php
session_start();
include_once('includes/config.php');
extract($_POST);
$qry = "select * from signup where user='".$user."' && pass='" . $pass . "'";
$result = mysqli_query($con, $qry) or exit("select user fail" . mysqli_error($con));
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

if ($count > 0) {
    $_SESSION["unm"] = $user;
    $_SESSION['userid'] = $row['id'];
    header('location:index.php');
} else {
    $_SESSION["error"] = "Username or password is incorect";
    header("location:sign-in.php");
}
?>
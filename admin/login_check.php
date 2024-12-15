<?php
session_start();
include_once('include/config.php');

extract($_POST);
$qry = "select * from users where username='$username' && password='".md5($password)."'";
$result=mysqli_query($con,$qry) or exit ("select user fail".mysqli_error($con));
$count=mysqli_num_rows($result);

if($count > 0){
    $_SESSION["unm"]=$username;
    header("location:homepage.php");
}else{
    $_SESSION["error"]="username or passeord is incorrect";
    header("location:index.php");
}
?> 
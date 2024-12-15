<?php
session_start();
if(isset($_SESSION['unm'])){
    include_once('include/config.php');
   $id = $_REQUEST["id"];
   $qry = "delete from categories where id =$id";
   mysqli_query($con,$qry)or exit ("delete failed".mysqli_error($con));

   $_SESSION["error"] = "Category deleted successfully";
   header('location:category.php');

}
else
{
  $_SESSION["error"] = "you are not autorize to access this page without login";
  header('location:index.php');
}

?>
<?php
session_start();
if(isset($_SESSION['unm'])){
    include_once('include/config.php');
   $id = $_REQUEST["id"];
   $qry = "delete from products where id =$id";
   mysqli_query($con,$qry)or exit ("delete failed".mysqli_error($con));

   $_SESSION["error"] = "products deleted successfully";
   header('location:products.php');

}
else
{
  $_SESSION["error"] = "you are not autorize to access this page without login";
  header('location:index.php');
}

?>
<?php
session_start();
if(isset($_SESSION['unm'])){
    include_once('include/config.php');
    extract($_POST);
    $filename=time()."_".$_FILES['image']['name'];
    $path="../images/products/".$filename;
    $productdescription=mysqli_real_escape_string($con,$productdescription);

    if(move_uploaded_file($_FILES['image'] ['tmp_name'],$path)){
      $qry="insert into products (catid,subcatid,productname,productdescription,productprice,image) values('".$catid."','".$subcatid."','".$productname."','".$productdescription."','".$productprice."','".$filename."')"; 
      mysqli_query($con,$qry) or exit("products insert fail".mysqli_error($con));
      $_SESSION['error']='products Added successfully';
      header('location:product_add.php');
    

    }else{
        $_SESSION['error']='File upload fail';
        header('location:product_add.php');

    }
}else{
    $_SESSION['error']='your are not access this page without login';
    header('location:index.php');
}
?>
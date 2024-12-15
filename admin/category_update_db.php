<?php
session_start();
if(isset($_SESSION['unm'])){
    include_once('include/config.php');
    extract($_POST);
    $catdescription=mysqli_real_escape_string($con,$catdescription);
    if($_FILES['image']['error']==0){

    $filename=time()."_".$_FILES['image']['name'];
    $path="../images/categories/".$filename;


    if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
      $qry="update categories set catname='".$catname."',catdescription='".$catdescription."',image='".$filename."'where id=$id";
      mysqli_query($con,$qry) or exit("category update fail".mysqli_error());

      $_SESSION["error"] = "category update successfully";
      header('location:category.php');

    }else{
      $_SESSION["error"] = "file upload fail";
      header('location:category.php');
    }

    }else{

        $qry="update categories set catname='".$catname."',catdescription='".$catdescription."'where id=$id";
        mysqli_query($con,$qry) or exit("category update fail".mysqli_error());
  
        $_SESSION["error"] = "category update successfully";
        header('location:category.php');
    }

    
}
else
{
  $_SESSION["error"] = "you are not autorize to access this page without login";
  header('location:index.php');
}

?>
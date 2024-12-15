<?php
session_start();
if(isset($_SESSION['unm'])){
    include_once('include/config.php');

    $selectsetting="select * from sitesettings";
    $settingResult= mysqli_query($con,$selectsetting) or exit("Setting Select fail".mysqli_error($con));
    $settingCount= mysqli_num_rows($settingResult);

    extract($_POST);
    $address=mysqli_real_escape_string($con,$address);

    if($_FILES['image']['error']==0){

    $filename=time()."_".$_FILES['image']['name'];
    $path="../images/logo/".$filename;

    if(move_uploaded_file($_FILES['image'] ['tmp_name'],$path)){
        if($settingCount>0){

          $qry="update sitesettings set sitename='".$sitename."',address='".$address."',phoneno='".$phoneno."',email='".$email."',image='".$filename."'where id=1";


        }else{
      $qry="insert into sitesettings (sitename,address,phoneno,email,image) values('".$sitename."','".$address."','".$phoneno."','".$email."','".$filename."')"; 

        }

      mysqli_query($con,$qry) or exit("category insert fail".mysqli_error($con));
      $_SESSION['error']='Category Added successfully';
      header('location:settings.php'); 
    

    }else{
        $_SESSION['error']='File upload fail';
        header('location:settings.php');

    }
}else{
    if($settingCount>0){

        $qry="update sitesettings set sitename='".$sitename."',address='".$address."',phoneno='".$phoneno."',email='".$email."'where id=1";


      }else{
    $qry="insert into categories (sitename,address,phoneno,email,image) values('".$sitename."','".$address."','".$phoneno."')"; 

      }
      mysqli_query($con,$qry) or exit("category insert fail".mysqli_error($con));
      $_SESSION['error']=' Added successfully';
      header('location:settings.php'); 
}
}else{
    $_SESSION['error']='your are not access this page without login';
    header('location:index.php');
}
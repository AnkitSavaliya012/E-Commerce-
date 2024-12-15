<?php
session_start();
if(isset($_SESSION['unm'])){
    include_once('include/config.php');
    $id=$_REQUEST['id'];
    $qry="select* from  subcategorie where catid='".$id."'"; 
    $result=mysqli_query($con,$qry) or exit("sub category select fail".mysqli_error($con));
   // $output-"";
    while($row=mysqli_fetch_array($result)){    
        $output.="<option value='".$row['id']."'>".$row['subcatname']."</option>";  
    }
    echo $output;
}
?>
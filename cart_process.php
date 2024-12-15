<?php
session_start();
if (isset($_SESSION["unm"])) {
    include_once("includes/config.php");
    $userid = $_SESSION['userid'];
    $productid = $_REQUEST['productid'];

        $qry = "insert into cart (userid, productid) values ('$userid', '$productid')";
        mysqli_query($con, $qry) or exit("Cart data insert failed: " . mysqli_error($con));
        $_SESSION['error'] = "Product added to cart successfully.";
        header("location:cart.php");

} else {
    $_SESSION['error'] = "Please login first.";
    header("location:register.php");
}
?>

<?php
session_start();
if (isset($_SESSION['userid'])) {
    include_once("includes/config.php");

    $userid = $_SESSION['userid']; // Get logged in user's ID

    if (isset($_POST['productid'])) {
        $productid = $_POST['productid'];

        // Delete the product from the cart
        $qry = "DELETE FROM cart WHERE userid='$userid' AND productid='$productid'";
        if (mysqli_query($con, $qry)) {
            $_SESSION['success'] = "Product removed from cart successfully";
        } else {
            $_SESSION['error'] = "Error deleting product: " . mysqli_error($con);
        }
    } else {
        $_SESSION['error'] = "No product ID provided";
    }

    header("Location: cart.php");
    exit();
} else {
    $_SESSION['error'] = "Please log in first";
    header("Location: register.php");
    exit();
}
?>

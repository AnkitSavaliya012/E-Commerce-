<?php
session_start();
if (isset($_SESSION["userid"])) {
    include_once("includes/config.php");
    $userid = $_SESSION['userid'];

    $cartqry = "select * from cart where userid='$userid'";
    $cartresult = mysqli_query($con, $cartqry) or exit("Cart fetch fail: " . mysqli_error($con));
    while ($cartrow = mysqli_fetch_array($cartresult)) {
        $productid = $cartrow['productid'];
        extract($_POST);
        $orderqry = "insert into orders (userid, productid,address,phone) values ('$userid', '$productid','$address','$phone')";
        mysqli_query($con, $orderqry) or exit("Order data insert fail: " . mysqli_error($con));
    }

    $deleteQry = "delete from cart where userid='$userid'";
    mysqli_query($con, $deleteQry) or exit("Cart data delete fail: " . mysqli_error($con));

    $_SESSION['success'] = "Product removed from cart and recorded in orders successfully.";
    header("location:thankyou.php");
} else {
    $_SESSION['error'] = "Please login first";
    header("location:register.php");
}
?>
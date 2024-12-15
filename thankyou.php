<?php
session_start();
if (isset($_SESSION["unm"])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Take Zone</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/fevicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- style here -->
     <link rel="stylesheet" href="thankyou.css">
    <?php
    include_once("includes/style.php");
    ?>
</head>

<body>
<?php
    include_once('includes/config.php');
    $settingqry = "select * from sitesettings";
    $settingresult = mysqli_query($con, $settingqry) or exit("setting select fail");
    $settingrow = mysqli_fetch_array($settingresult);
?>

  


    <!-- Team Start -->
    <div class="d-flex align-items-center justify-content-center " style="margin-top: 80px;">
        <div class="card shadow-lg p-5 text-center" style="max-width: 600px;">
            <h2 class="text-success mb-4">Thank You for Your Purchase!</h2>
            <p class="lead mb-4">
            We sincerely appreciate your order from Take Zone. Your chosen electronic product will be processed and shipped shortly. You will receive an email with all the necessary details, including the shipping information and tracking link.            </p>
            <p class="mb-4">
            If you have any questions or need assistance, feel free to contact us. Thank you for choosing Take Zone, and we hope you enjoy your new product!
            </p>
            <a href="index.php" class="btn btn-primary btn-lg mt-4">Return to Home</a>
        </div>
    </div>
    <!-- Team End -->

   

</body>

</html>
<?php
} else {
  $_SESSION['error'] = "Please Login First";
  header("location:index.php");
}
?>

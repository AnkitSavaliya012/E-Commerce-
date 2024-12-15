<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terms and Conditions</title>
  <link rel="stylesheet" href="./css/condition.css">
  <?php
        include_once('includes/style.php');
    ?>
</head>
<body>
<?php
    include_once('includes/config.php');
    $settingqry="select * from sitesettings";
    $settingresult = mysqli_query($con,$settingqry) or exit("setting select fail".mysqli_error());
    $settingrow=mysqli_fetch_array($settingresult);
?>
<?php
    include_once('includes/header.php');
?>

  <section class="terms-section">
    <div class="container">
      <h1>Terms and Conditions</h1>
      <p>Welcome to ShopNest! Please read these Terms and Conditions carefully before using our website.</p>

      <div class="terms-content">
        <div class="terms-box">
          <h2>1. Introduction</h2>
          <p>By accessing this website, you agree to be bound by these Terms and Conditions. If you disagree with any part of the terms, you may not use our service.</p>
        </div>

        <div class="terms-box">
          <h2>2. Intellectual Property Rights</h2>
          <p>All content on this site, including logos, designs, text, images, and other materials, are owned by ShopNest or our licensors and are protected by intellectual property laws.</p>
        </div>

        <div class="terms-box">
          <h2>3. User Account</h2>
          <p>If you create an account, you are responsible for maintaining the confidentiality of your account details, including your password, and for all activities that occur under your account.</p>
        </div>

        <div class="terms-box">
          <h2>4. Payment and Pricing</h2>
          <p>We reserve the right to change prices and offer promotions at any time. All payments must be completed through the provided payment gateways. Failure to process payments may result in service disruptions.</p>
        </div>

        <div class="terms-box">
          <h2>5. Limitation of Liability</h2>
          <p>ShopNest is not liable for any indirect, incidental, or consequential damages that may occur due to the use of our site or services.</p>
        </div>

        <div class="terms-box">
          <h2>6. Termination</h2>
          <p>We may suspend or terminate access to our service without notice if you breach these Terms and Conditions or engage in unlawful conduct.</p>
        </div>

        <div class="terms-box">
          <h2>7. Changes to Terms</h2>
          <p>We reserve the right to update these Terms and Conditions at any time. It is your responsibility to review these terms regularly for any changes.</p>
        </div>

        <div class="terms-box">
          <h2>8. Contact Information</h2>
          <p>If you have any questions or concerns regarding these Terms and Conditions, please contact us at support@shopnest.com.</p>
        </div>
      </div>

    </div>
  </section>
  <?php
    include_once('includes/footer.php');
  ?>
</body>
</html>

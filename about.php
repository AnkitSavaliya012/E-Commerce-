<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="./css/about.css">
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
  <section class="about-us">
    <div class="container">
      <h1>About Us</h1>
      <p class="intro">
        We are a group of passionate innovators committed to delivering creative solutions to modern challenges. Our team thrives on collaboration and embraces the complexity of every project we take on.
      </p>
      
      <!-- Team Values Section -->
      <div class="values-section">
        <h2>Our Core Values</h2>
        <div class="grid">
          <div class="value-card">
            <div class="icon">🌟</div>
            <h3>Innovation</h3>
            <p>We continually push the boundaries of technology to deliver unique and creative solutions.</p>
          </div>
          <div class="value-card">
            <div class="icon">🤝</div>
            <h3>Collaboration</h3>
            <p>We believe in the power of teamwork, working closely with clients and each other to achieve great results.</p>
          </div>
          <div class="value-card">
            <div class="icon">📈</div>
            <h3>Growth</h3>
            <p>We are committed to personal and professional growth, ensuring our clients stay ahead in their industries.</p>
          </div>
          <div class="value-card">
            <div class="icon">💡</div>
            <h3>Creativity</h3>
            <p>Our team is driven by creativity, turning ideas into reality with every project we undertake.</p>
          </div>
        </div>
      </div>

      

      <!-- Call to Action Button -->
      <a href="contact.php" class="btn">Contact Us</a>
    </div>
  </section>
  <?php
    include_once('includes/footer.php');
  ?>

</body>
</html>

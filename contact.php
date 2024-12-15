<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="./css/contact.css">
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

  <section class="contact-us">
    <div class="container">
      <h1>Contact Us</h1>
      <p class="intro">
        We’d love to hear from you. Whether you have a question, a project proposal, or just want to say hello, feel free to reach out using the form below. 
      </p>
      
      
      <div class="form-container">
        <div class="contact-info">
          <h2>Get In Touch</h2>
          <p>
            Our team is available to help you with any inquiries. Reach us through any of the following methods or fill out the form to send a direct message.
          </p>
          <ul>
            <li><strong>📧 Email:</strong><?php echo $settingrow['email'];?></li>
            <li><strong>📞 Phone:</strong><?php echo $settingrow['phoneno'];?></li>
            <li><strong>🏢 Address:</strong><?php echo $settingrow['address'];?></li>
          </ul>
        </div>

        <!-- <div class="contact-form">
          <form action="contact-db.php" method="post">
            <div class="input-group">
              <input type="text" id="name" name="name" required>
              <label for="name">Full Name</label>
            </div>
            <div class="input-group">
              <input type="email" id="email" name="email" required>
              <label for="email">Email</label>
            </div>
            <div class="input-group">
              <textarea id="description" name="description" rows="5" required></textarea>
              <label for="message">Message</label>
            </div>
            <input type="submit" value="submit"  >
            <button type="submit" class="btn" >Send Message</button>
          </form> -->
         
          <form action="contact-db.php" method="POST">
              <fieldset>
                  <input type="text" placeholder="Enter your full name" name="name" id="name" required />
                  <input type="email" placeholder="Enter your email address" name="email" id="email"
                      required />
                  <input type="text" placeholder="Enter subject" name="subject" id="subject" required />
                  <textarea placeholder="Enter your message" name="description" id="description"
                      required></textarea>
                  <input type="submit" value="Submit">
              </fieldset>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php
    include_once('includes/footer.php');
  ?>
</body>
</html>

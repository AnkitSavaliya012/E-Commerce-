<?php
  session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Help & Support | ShopNest</title>
        <link rel="stylesheet" href="./css/help.css">
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

        <header class="help-header">
            <div class="container">
                <h1>Help & Support</h1>
                <p>Find answers to your questions, or get in touch with our support team for further assistance.</p>
            </div>
        </header>

        <section class="faq-section">
            <div class="container">
                <h2>Frequently Asked Questions</h2>

                <!-- FAQ Item -->
                <div class="faq-item">
                    <h3 class="faq-question">How do I track my order?</h3>
                    <p class="faq-answer">You can track your order by visiting the 'My Orders' section on your account dashboard. Simply log in, find your order, and click 'Track Order' to view real-time status.</p>
                </div>

                <div class="faq-item">
                    <h3 class="faq-question">What is the return policy?</h3>
                    <p class="faq-answer">We offer a 30-day return policy for most products. Ensure that the item is unused and in its original packaging. You can initiate a return request from your account.</p>
                </div>

                <div class="faq-item">
                    <h3 class="faq-question">How do I cancel an order?</h3>
                    <p class="faq-answer">To cancel an order, log in to your account and go to 'My Orders.' If the order hasn't been processed, you will see a 'Cancel' option next to your order.</p>
                </div>

                <div class="faq-item">
                    <h3 class="faq-question">What payment methods do you accept?</h3>
                    <p class="faq-answer">We accept a variety of payment methods including Visa, MasterCard, PayPal, and Apple Pay. You can choose your preferred method at checkout.</p>
                </div>

                <div class="faq-item">
                    <h3 class="faq-question">How do I contact customer support?</h3>
                    <p class="faq-answer">You can reach us via the 'Contact Us' page or by emailing support@shopnest.com. Our support team is available 24/7 to assist you.</p>
                </div>
            </div>
        </section>

        <section class="contact-support">
            <div class="container">
                <h2>Still need help?</h2>
                <p>If you couldn’t find what you’re looking for, feel free to get in touch with our customer support team.</p>
                <a href="contact.php" class="btn">Contact Us</a>
            </div>
        </section>
        <?php
    include_once('includes/footer.php');
  ?>
    </body>
    </html>

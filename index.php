<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Electronic Products</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <?php
    include_once('includes/style.php');
    ?>
</head>

<body>
    <?php
    include_once('includes/config.php');
    $settingqry = "select * from sitesettings";
    $settingresult = mysqli_query($con, $settingqry) or exit("setting select fail");
    $settingrow = mysqli_fetch_array($settingresult);
    ?>
    <?php
    include_once('includes/header.php');
    ?>

    <section id="hero" style="background-image: url('image/girl50.jpg');">
        <h4>Say Goodbye to the Old - Trade-in Today!</h4>
        <h2>Spread Joy and Savings</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 50% off! </p>
        <button><B><a href="product.php">Shop Now</a></B></button>
    </section>

    <section id="feature" class="section-f1">
        <div class="f-box">
            <img src="image/f5.jpeg" alt="">
            <h6>Free Shipping</h6>
        </div>

        <div class="f-box">
            <img src="image/o1.jpeg" alt="">
            <h6>Online Order</h6>
        </div>

        <div class="f-box">
            <img src="image/p1.jpeg" alt="">
            <h6>Promotions</h6>
        </div>

        <div class="f-box">
            <img src="image/m1.jpeg" alt="">
            <h6>Money</h6>
        </div>

        <div class="f-box">
            <img src="image/s1.jpeg" alt="">
            <h6>Support</h6>
        </div>
    </section>

    <section id="pro1" class="section-f1">

        <h2>Our Products</h2>
        <p>Flash Sale Alert! Grab Your Favorites Before They're Gone</p>


        <div class="pro-container">
            <?php
            include_once('includes/config.php');
            $homecatqry = "select * from categories order by id desc limit 8";
            $homecatresult = mysqli_query($con, $homecatqry) or exit("category select fail" . mysqli_error($con));
            while ($homecatrow = mysqli_fetch_array($homecatresult)) {

            ?>
                <a href="product.php?id=<?php echo $homecatrow['id']; ?>" style="text-decoration: none;">
                    <div class="pro" >
                        <img src="images/categories/<?php echo $homecatrow['image']; ?>" alt="" class="imagepr">
                        <div class="des">
                            <span ><?php echo $homecatrow['catname']; ?></span>
                            <h5 ><?php echo $homecatrow['catdescription']; ?></h5>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>

        </div>

    </section>

    <section id="banner" class="section-f2 ">

        <h4>Repair Services</h4>
        <h2>Up to <span>50% off</span> - All Electronic Products</h2>
        <a href="product.php"><img src="image/b1.jpeg" class="banner-img"></a>
    </section>



    <?php
    include_once('includes/footer.php');
    ?>


    <script src='./js/contact.js'></script>
    <script src="./js/product.js"></script>
    <script src="./js/signin.js"></script>
</body>

</html>
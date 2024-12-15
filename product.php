<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <title>Document</title>

    <?php
    include_once("includes/style.php");
    ?>
    <!-- <link rel="stylesheet" href="./css/pro"> -->
</head>

<body>

    <?php
    include_once('includes/config.php');
    $settingqry = "SELECT * FROM sitesettings";
    $settingresult = mysqli_query($con, $settingqry) or exit("Setting select fail: " . mysqli_error($con));
    $settingrow = mysqli_fetch_array($settingresult);
    ?>

    <?php
    include_once('includes/header.php');
    ?>
     
    <section id="pro1" class="section-f1">
   
        <h1>Our Products</h1>
        <?php
        if (isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
        ?>
            <div class="pro-container">
                <?php
                include_once('includes/config.php');
                $qry = "SELECT * FROM products where catid=$id";
                $result = mysqli_query($con, $qry) or exit("Product select fail: " . mysqli_error($con));
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="pro ">
                        <div class="product-card">
                            <a href=""><img src="images/products/<?php echo $row['image']; ?>" alt="<?php echo $row['productname']; ?>" class="product-img"></a>
                        </div>
                        <div class="des">
                            <span><?php echo $row['productname']; ?></span>
                            <h5><?php echo $row['productdescription']; ?></h5>
                        </div>
                        <div style="display: flex; justify-content: space-between; ">
                            <h4>₹<?php echo $row['productprice']; ?></h4>
                            <a href="cart_process.php?productid=<?php echo $row['id'] ?>"><img src="image/c2.png" class="cart" alt="Add to Cart"></a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        } else {
        ?>
        
    
            <div class="pro-container">
                <?php
                include_once('includes/config.php');
                $qry = "SELECT * FROM products ORDER BY id DESC";
                $result = mysqli_query($con, $qry) or exit("Product select fail: " . mysqli_error($con));
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="pro ">
                        <div class="product-card">
                            <a href=""><img src="images/products/<?php echo $row['image']; ?>" alt="<?php echo $row['productname']; ?>" class="product-img"></a>
                        </div>
                        <div class="des">
                            <span><?php echo $row['productname']; ?></span>
                            <h5><?php echo $row['productdescription']; ?></h5>
                        </div>
                        <div style="display: flex; justify-content: space-between; ">
                            <h4>₹<?php echo $row['productprice']; ?></h4>
                            <a href="cart_process.php?productid=<?php echo $row['id'] ?>"><img src="image/c2.png" class="cart" alt="Add to Cart"></a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
        
    </section>
    

    <?php
    include_once('includes/footer.php');
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropbtn = document.querySelector('.dropbtn');
            const dropdownContent = document.querySelector('.dropdown-content');

            if (dropbtn && dropdownContent) {
                dropbtn.addEventListener('click', function(event) {
                    event.preventDefault();
                    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
                });

                window.addEventListener('click', function(event) {
                    if (!event.target.closest('.dropdown')) {
                        dropdownContent.style.display = 'none';
                    }
                });
            }
        });
    </script>


</body>

</html>
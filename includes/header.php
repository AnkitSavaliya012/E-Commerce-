
<style>
      /* Basic styles for nav */
nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    background-color: #333;
}

nav ul li {
    display: inline-block;
    position: relative;
}

nav ul li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

nav ul li a:hover {
    background-color: #111;
}

.logout-btn{
    background: #f0f0f0;
    color: #333;
    padding: 12px 24px;
    border: none;
    border-radius: 30px; 
    cursor: pointer;
    font-size: 16px;
    font-weight: bold; 
    transition: all 0.3s ease; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
}

.logout-btn:hover{
    background: #f0f0f0; 
    color:#333; 
    transform: scale(1.05); 
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); 
}







</style>
<section id="header">
<a href="index.php">
<?php
                if(isset($settingrow['image']) && $settingrow['image'] != null){
                    ?>
                        <img src="images/logo/<?php echo $settingrow['image'];?>" class="logo" alt="">
                    <?php
                }else{
                    ?>
                    <h1><?php echo $settingrow['sitename'];?></h1>
                    <?php
                }
            ?>
        </a>
         
        <div>

            <ul id="navbar">
                <li><a class="" href="index.php">Home</a></li>
                    <li><a href="product.php">Products</a></li>                    
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact </a></li>
                    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <?php
                        
                        if(isset($_SESSION['userid']))
                        {
                            ?><a href="out.php"><button class="logout-btn" >Logout</button></a><?php
                        }else{
                            ?><a href="sign-in.php"><button class="logout-btn">Login</button></a><?php
                        }

                    ?>
            </ul>
        </div>
    </section>

    <script>

document.addEventListener('DOMContentLoaded', function() {
    const dropbtn = document.querySelector('.dropbtn');
    const dropdownContent = document.querySelector('.dropdown-content');
    
    dropbtn.addEventListener('click', function(event) {
        event.preventDefault();
        dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
    });

    // Close dropdown when clicking outside
    window.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown')) {
            dropdownContent.style.display = 'none';
        }
    });
});


    </script>

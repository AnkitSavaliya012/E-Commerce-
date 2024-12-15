<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <title>Shopping Cart</title>

    <?php
    include_once("includes/style.php");
    ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .cart-container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
        }

        #cart-items {
            margin-bottom: 30px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .item-details {
            flex-grow: 1;
            padding-left: 20px;
        }

        .item-name {
            font-size: 18px;
            font-weight: bold;
        }

        .item-price {
            color: green;
            margin-top: 5px;
        }

        .delete-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: darkred;
        }

        .total-summary {
            text-align: right;
            font-size: 18px;
            margin-top: 20px;
        }

        .total-summary p {
            margin: 5px 0;
        }

        .payment-section {
            margin-top: 30px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .input-group input, 
        .input-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .checkout-btn {
            width: 100%;
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .checkout-btn:hover {
            background-color: darkgreen;
        }

        .continue {
            text-decoration: underline;
            color: red;
        }
    </style>
</head>

<body>

    <?php
    include_once('includes/config.php');

    // Assuming the session is started and user is logged in
    $userid = $_SESSION['userid']; 

    if (!$userid) {
        echo "<p>Please login to view your cart.</p>";
        exit();
    }

    // Fetch site settings (example query)
    $settingqry = "SELECT * FROM sitesettings";
    $settingresult = mysqli_query($con, $settingqry) or die("Settings fetch error: " . mysqli_error($con));
    $settingrow = mysqli_fetch_array($settingresult);
    ?>

    <?php include_once('includes/header.php'); ?>
    
    <div class="cart-container">
        <a href="product.php" class="continue"><h4>Continue Shopping</h4></a>
        <h1>Your Shopping Cart</h1>

        <!-- Cart Items Section -->
        <div id="cart-items">
            <?php
            $qry = "SELECT * FROM cart WHERE userid='$userid'";
            $result = mysqli_query($con, $qry) or die("Cart fetch error: " . mysqli_error($con));

            $subtotal = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $productid = $row['productid'];
                    $productqry = "SELECT * FROM products WHERE id='$productid'";
                    $productresult = mysqli_query($con, $productqry) or die("Product fetch error: " . mysqli_error($con));
                    $product = mysqli_fetch_assoc($productresult);

                    $subtotal += $product['productprice'];
            ?>
            <div class="cart-item">
                <img src="images/products/<?php echo $product['image']; ?>" alt="Product Image">
                <div class="item-details">
                    <p class="item-name"><?php echo $product['productname']; ?></p>
                    <p class="item-price">₹<?php echo number_format($product['productprice'], 2); ?></p>
                </div>
                <form action="cart_delete.php" method="post">
                    <input type="hidden" name="productid" value="<?php echo $productid; ?>">
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </div>
            <?php
                }
            } else {
                echo "<p>Your cart is empty.</p>";
            }
            ?>
        </div>

        <!-- Total Summary Section -->
        <?php if ($subtotal > 0): ?>
        <div class="total-summary">
            <?php
            $gstRate = 0.10; // 10% GST
            $gstAmount = $subtotal * $gstRate;
            $total = $subtotal + $gstAmount;
            ?>
            <p><strong>Subtotal:</strong> ₹<?php echo number_format($subtotal, 2); ?></p>
            <p><strong>GST (10%):</strong> ₹<?php echo number_format($gstAmount, 2); ?></p>
            <p><strong>Total:</strong> ₹<?php echo number_format($total, 2); ?></p>
        </div>
        <?php endif; ?>

        <!-- Payment Details Section -->
        <div class="payment-section">
            <h2>Payment Details</h2>
            <form action="checkout_process.php" method="post" id="payment-form">
                <div class="input-group"> 
                    <label for="card-number">Debit Card Number</label>
                    <input type="text" name="card_number" id="card-number" placeholder="xxxx-xxxx-xxxx-xxxx" required>
                </div>

                <div class="input-group">
                    <label for="card-expiry">Expiry Date</label>
                    <input type="text" name="expiry_date" id="card-expiry" placeholder="MM/YY" required>
                </div>

                <div class="input-group">
                    <label for="card-cvc">CVC</label>
                    <input type="text" name="cvc" id="card-cvc" placeholder="CVC" required>
                </div>

                <div class="input-group">
                    <label for="billing-address">Address</label>
                    <textarea id="billing-address" name="address" placeholder="Enter your address" required></textarea>
                </div>

                <div class="input-group">
                    <label for="phone">Phone no</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter your Phone No" required>
                </div>

                <button type="submit" class="checkout-btn">Checkout</button>
            </form>
        </div>
    </div>

    <?php include_once('includes/footer.php'); ?>

    <script>
    document.getElementById('payment-form').addEventListener('submit', function(event) {
    let isValid = true;

    // Clear all previous error messages
    document.querySelectorAll('.error-message').forEach(function(el) {
        el.remove();
    });
    document.querySelectorAll('.input-group').forEach(function(el) {
        el.classList.remove('error');
    });

    // Validate debit card number (16 digits)
    const cardNumber = document.getElementById('card-number').value;
    if (!/^\d{16}$/.test(cardNumber.replace(/\D/g, ''))) {
        showError('card-number', 'Please enter a valid 16-digit debit card number');
        isValid = false;
    }

    // Validate expiry date (MM/YY)
    const expiryDate = document.getElementById('card-expiry').value;
    if (!/^(0[1-9]|1[0-2])\/?([0-9]{2})$/.test(expiryDate)) {
        showError('card-expiry', 'Please enter a valid expiry date (MM/YY)');
        isValid = false;
    }

    // Validate CVC (3 digits)
    const cvc = document.getElementById('card-cvc').value;
    if (!/^\d{3}$/.test(cvc)) {
        showError('card-cvc', 'Please enter a valid 3-digit CVC');
        isValid = false;
    }

    // Validate address (non-empty)
    const address = document.getElementById('billing-address').value.trim();
    if (address === '') {
        showError('billing-address', 'Address cannot be empty');
        isValid = false;
    }

    // Validate phone number (10 digits)
    const phone = document.getElementById('phone').value;
    if (!/^\d{10}$/.test(phone.replace(/\D/g, ''))) {
        showError('phone', 'Please enter a valid 10-digit phone number');
        isValid = false;
    }

    // Prevent form submission if validation fails
    if (!isValid) {
        event.preventDefault();
    }
});

function showError(fieldId, message) {
    const fieldGroup = document.getElementById(fieldId).closest('.input-group');
    fieldGroup.classList.add('error');
    const errorMessage = document.createElement('p');
    errorMessage.classList.add('error-message');
    errorMessage.textContent = message;
    fieldGroup.appendChild(errorMessage);
}

    </script>

</body>
</html>

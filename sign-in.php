<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="login.css" rel="stylesheet" />

</head>

<body>
    <div class="wrapper">
        <?php
        if (isset($_SESSION['error'])) {
            ?>
            <p class="login-box-msg text-danger"><?php echo $_SESSION['error']; ?></p>
            <?php
            unset($_SESSION['error']);
        }
        ?>
        <form action="sign-in-db.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="user" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="pass" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
            <div>Create an account?<a href="register.php">  Register</a></div>
            </div>
            <button type="submit" class="btn">Login</button>

        </form>
    </div>
</body>

</html>
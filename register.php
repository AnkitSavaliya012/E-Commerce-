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
        <form action="register_db.php" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="user" id="user" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Email" name="email" id="email" required>
                <i class='bx bxs-envelope '></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="pass" id="pass" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            
            <button type="submit" class="btn">Register</button>
            <div class="register-link">
                <p>Alredy have an account <a href="sign-in.php">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>
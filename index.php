<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/mystyle.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php

                include("php/config.php");
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);

                    $result = mysqli_query($con, "SELECT * from users where email = '$email' AND password = '$password';");
                    $row = mysqli_fetch_assoc($result);

                    if (is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['email'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                    }
                    else{
                        echo "<div class = 'message'>
                                <p>Wrong Username or PasswordL</p>
                              </div> <br> ";
                        echo "<a href = 'login.php'><button class = 'btn'>Go back</button></a>";
                    }
                    if (isset($_SESSION['valid'])){
                        header("location: home.php");
                    }
                } else{

            ?>

            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="signup.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
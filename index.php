<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/mystyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
                    $_SESSION['phone'] = $row['phone'];
                }
                else{
                    echo "<div class = 'message'>
                    <p>Wrong Username or Password</p>
                    </div> <br> ";
                    echo "<a href = 'index.php'><button class = 'btn'>Login</button></a>";
               
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
                    <input type="email" name="email" id="email">
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login">
                </div>

                <div class="links">
                    Dont have an acoount? <a href="register.php"><b>Sign Up</b></a>
                </div>
                
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
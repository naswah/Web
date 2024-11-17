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
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];

                //veryfing

                $verify_query = mysqli_query($con, "SELECT email from users where email = '$email'");
                if(mysqli_num_rows($verify_query) != 0){

                    echo "<div class = 'message'>
                    <p>This email is used, try anther one!</p>
                    </div> <br> ";
                    echo "<a href = 'javascript:self.history.back()'> <button class = 'btn'> Go Back </button> </a>";
               
                }
                else{
                    mysqli_query($con, "INSERT INTO users (username, email, phone, password) VALUES ('$username','$email', '$phone', '$password')");
                    
                    echo "<div class='message'>
                    <p style='color: green;'>REGISTRATION SUCCESSFUL</p>
                  </div><br>";
            echo "<a href='index.php'><button class='btn'>Login</button></a>";
            
                }
            } else{
            ?>

            <header>Register Now!</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="field input">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Sign Up">
                </div>

                <div class="links">
                    Already have an acoount? <a href="index.php"><b>Login</b></a>
                </div>
                
            </form>
        </div>
       <?php } ?>
    </div>

</body>
</html>
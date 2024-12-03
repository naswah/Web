<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/navstyle.css">
    <link rel="stylesheet" href="CSS/des.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Nepal Art Gallery</title>
    <link rel="icon" href="images/artgallery-removebg-preview.png">
</head>
<body>

    <div class="nav">
        <div class="logo">
            <img src="images/artgallery-removebg-preview.png" alt="no img">
        </div>

        <div class="aclass">
            <a href="home.php"><b>Home</b></a>
            <a href="onlinegallery.php"><b>Online Gallery</b></a>
            <a href="#section1"><b>About Us</b></a>
            <a href="#"><b>Your Favourites</b></a>
            <a href="#"><b>Logout</b></a>
        </div>
    </div>

    <div class="main-container">

        <div class="paintingpic">
            <img src="images/draft2.jpg" alt="">
        </div>

        <div class="descrption">

            <div class="headings">
                <div class="name"><h1>HOPE</h1></div>
                <div class="arname"><h2>Inshan Pariyar</h2></div>
                <div class="cost"><h2>$220</h2></div>
            </div>
            
            <div class="pdescription">
                <h4>Description: </h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur officiis ut fugit necessitatibus? Quia, perferendis hic, exercitationem a at laudantium tempora aperiam placeat iusto, asperiores excepturi cupiditate inventore saepe ipsa?</p>
            </div>

            <div class="buttons">
                <div class="view">
                    <button>View about artist</button>
                </div>
                <div class="cart">
                <button>Add to cart <i class="fa-solid fa-cart-shopping"></i></button>
                </div>
                <div class="fav">
                    <i class="fa-regular fa-heart"></i>
                </div>
            </div>
            
        </div>
    </div>

    <footer>
        <p><img src="images/artgallery-removebg-preview.png" alt="no img">
            <h2>Nepal Art Gallery</h2>
        </p> <br>
        <a href="home.html">Home</a>
            <a href="onlinegallery.php">Online Gallery</a>
            <a href="#">About Us</a>
            <a href="#">Your Favourites</a>
            <a href="#">Logout</a> <br>
            <hr> <br>
        <p> @copyright2024</p> <br>
    </footer>
</body>
</html>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/navstyle.css">
    <link rel="stylesheet" href="CSS/style.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
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

    <main>
        <div class="myslides fade">
            <div class="numbertext">1 / 4</div>
                <img src = "images/1.jfif" style="width: 100%;">
        </div>
        <div class="myslides fade">
            <div class="numbertext">2 / 4</div>
                <img src = "images/2.jpg" style="width: 100%;">
        </div>
        <div class="myslides fade">
            <div class="numbertext">3 / 4</div>
                <img src = "images/3.jpg" style="width: 100%;">
        </div>
        <div class="myslides fade">
            <div class="numbertext">4 / 4</div>
                <img src = "images/4.jpg" style="width: 100%;">
        </div>

        <a class="prev" onclick="plusSlide(-1)">&#10094</a>
        <a class="next" onclick="plusSlide(1)">&#10095</a>

    </main>
    
    <div class="about" id="section1">
        <div class="about-photo">
            <img src="images/about.jpg" alt="no img">
        </div>

        <div class="info">
            <h1 >About Nepal Art Gallery</h1>
            <p>
                This platform is designed to create seamless connections between artists and art enthusiasts, providing a digital space for showcasing, viewing, and purchasing artwork. Whether you're an artist uploading your latest masterpiece or a viewer exploring new collections, the platform offers: <br>

                - Easy login for artists and viewers. <br>
                - Buy Paintings. <br>
                - Artists can upload their artwork. <br>
                - Ratings and reviews to enhance the art-viewing experience. <br>
            </p>
        </div>
    </div>


    <div class="content">
    <div class="category">
        <h1>Category</h1>
        <div class="images">

        <div class="category-content">
        <a href="abstract.php">
        <img src="images/abstract art.jpg" alt="">
        </a>
            
            <h2>Abstract</h2>
        </div>
        <div class="category-content">
        <a href="contempopary.php">
            <img src="images/contemporary art.jpg" alt="">
        </a>
            <h2>Contemporary</h2>
        </div>
        <div class="category-content">
        <a href="spiritual.php">
            <img src="images/spiritual art.jpg" alt="">
        </a>
            <h2>Spiritual</h2>
        </div>
        <div class="category-content">
            <a href="expressionalism.php">
                <img src="images/expressionalism.jpg" alt="">
            </a>
            <h2>Expressionalism</h2>
        </div>
    </div>
    </div>
</div>

    <div class="awards">
        <h1>Art Awards</h1>
        <div class="award-information">
            <div class="award-content one">
                <div class="award-photo">
                    <img src="images/sunyata.jfif" alt="no img">
                </div>
                <div class="award-info">
                    <h2>"SUNYATA"</h2>
                    <h2>Reeta Manandhar</h2>
                    <h2>2018</h2>
                </div>
            </div>

            <div class="award-content two">
                <div class="award-photo">
                    <img src="images/samarpan.webp" alt="no img">
                </div>
                <div class="award-info">
                    <h2>"SAMARPAN"</h2>
                    <h2>Kiran Manandhar</h2>
                    <h2>2024</h2>
                </div>

            </div>

            <div class="award-content three">
                <div class="award-photo">
                    <img src="images/arniko.webp" alt="no img">
                </div>
                <div class="award-info">
                    <h2>"Arniko National Award"</h2>
                    <h2>Madan Chitrakar</h2>
                    <h2>2024</h2>
                </div>

            </div> 
        </div>
    </div>
    
    <div class="spons-gallery">
        <h1>Sponsered Galleries</h1>
        <img src="images/artudio.png" alt="no img">
        <img src="images/nac.png" alt="no img">
        <img src="images/sag.svg" alt="no img">
        <img src="images/mona.png" alt="no img">
        <img src="images/hag.png" alt="no img">
    </div>

    <footer>
        <p><img src="images/artgallery-removebg-preview.png" alt="no img">
            <h2>Nepal Art Gallery</h2>
        </p> <br>
        <a href="home.html">Home</a>
            <a href="onlinegallery.php">Online Gallery</a>
            <a href="#section1">About Us</a>
            <a href="#">Your Favourites</a>
            <a href="#">Logout</a> <br>
            <hr> <br>
        <p> @copyright2024</p> <br>
    </footer>
    <script src="JS/home.js"></script>
</body>
</html>

<!-- mandish -->
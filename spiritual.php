<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'web';

$conn = new mysqli("localhost", "root", "", "web");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM painting where category = 'spiritual';";

$all_painting = $conn->query($sql);

if (!$all_painting) {
    die('Error: ' . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/navstyle.css">
    <link rel="stylesheet" href="CSS/ogallerystyle.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <title>Nepal Art Gallery</title>
    <link rel="icon" href="images/artgallery-removebg-preview.png">
</head>
<body>
<div class="nav">
        <div class="logo">
            <img src="images/artgallery-removebg-preview.png" alt="Art Gallery Logo">
        </div>

        <div class="aclass">
            <a href="home.php"><b>Home</b></a>
            <a href="html/onlinegallery.html"><b>Online Gallery</b></a>
            <a href="#"><b>About Us</b></a>
            <a href="#"><b>Your Favourites</b></a>
            <a href="#"><b>Logout</b></a>
        </div>
    </div>

    <h1>Spiritual Art</h1>

    <main>
        <?php
        while ($row = $all_painting->fetch_assoc()) { ?>
        <div class="artcontainer">
            <div class="image">
                <img src="<?php echo htmlspecialchars($row["paintingimg"]); ?>" alt="Art Image">
            </div>
            <div class="caption">
                <p class="artname"><b><?php echo htmlspecialchars($row["paintingname"]); ?></b></p>
                <p class="artist"><?php echo htmlspecialchars($row["artistname"]); ?></p>
                <p class="price">$<?php echo htmlspecialchars($row["price"]); ?></p>
            </div>
        </div>
        <?php } ?>
    </main>

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
</body>
</html>
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'web';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM painting";
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
            <a href="onlinegallery.php"><b>Online Exhibition</b></a>
            <a href="home.php"><b>About Us</b></a>
            <a href="#"><b>Your Favourites</b></a>
            <a href="php/index.html"><b>Logout</b></a>
        </div>
    </div>

    <h1>Online Exhibition</h1>
    <h3>You can now add your favourite painting!</h3>
    <h3>To add your favourite painting, open the painting and mark it your favourite!</h3>
    
    <main>
        <?php
        while ($row = $all_painting->fetch_assoc()) { ?>
        <div class="artcontainer">
            <div class="image" onclick="location.href='des.php?id=<?php echo htmlspecialchars($row['sn']); ?>';">                    
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
        <p><img src="images/artgallery-removebg-preview.png" alt="Art Gallery Logo">
            <h2>Nepal Art Gallery</h2>
        </p>
        <a href="home.php">Home</a>
        <a href="onlinegallery.php">Online Exhibition</a>
        <a href="#section1">About Us</a>
        <a href="#">Your Favourites</a>
        <a href="php/logout.php">Logout</a>
        <br>
        <hr>
        <p>@copyright2024</p>
    </footer>
</body>
</html>

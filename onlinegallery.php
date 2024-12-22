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
    <link rel="stylesheet" href="CSS/search.css">
    
    <title>Nepal Art Gallery</title>
    <link rel="icon" href="images/artgallery-removebg-preview.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <style>
        .search-bar input{
            margin-top:20px;
            margin-left:700px;
            margin-right: 65px;
            width: 300px;
            padding: 10px;
            border-radius:20px;
            border:1px solid gray;
        }
        .search-bar button{
            width: 100px;
            height: 30px;
            padding: 5px;
            background-color:#404040;
            color: wheat;
            border: none;
            border-radius: 16px;
            margin-top:20px;
        }
    </style>

</head>
<body>
    <div class="nav">
        <div class="logo">
            <img src="images/artgallery-removebg-preview.png" alt="Art Gallery Logo">
        </div>

        <div class="aclass">
            <a href="home.php"><b>Home</b></a>
            <a href="onlinegallery.php"><b>Online Exhibition</b></a>
            <a href="#section1"><b>About Us</b></a>
            <a href="shoppingcart.php"><b>Cart</b></a>
            <?php 
                if (!isset($_SESSION['id'])) {
                    echo "<a href='index.php'><b>Login</b></a>";
                }
                else{
                    echo "<a href='php/logout.php'><b>Logout</b></a>";
            }?>
        </div>
        
    </div>

    <div class="search-bar">
        <form action="search.php" method="get">
            <input type="text" name="query" placeholder="Search paintings by name or artist.." required>
            <button type="submit">Search</button>
        </form>
    </div>

    <h1>Online Exhibition</h1>
    <h3>You can now add your favourite painting!</h3>
    <h3>To add your favourite painting, open the painting and mark it your favourite!</h3>
    
    <div class="main-container">
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
    </div>

    <footer>
        <p><img src="images/artgallery-removebg-preview.png" alt="Art Gallery Logo">
            <h2>Nepal Art Gallery</h2>
        </p>
            <a href="home.php">Home</a>
            <a href="onlinegallery.php">Online Exhibition</a>
            <a href="#">About Us</a>
            <a href="shoppingcart.php">Cart</a>
            <a href="php/logout.php">Logout</a> <br>
        <hr>
        <p>@copyright2024</p>
    </footer>
</body>
</html>

<?php
session_start();

// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'web';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $painting_id = $_GET['id'];

    $sql = "SELECT * FROM painting WHERE sn = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $painting_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $painting = $result->fetch_assoc();

        // Check if the painting is already in the cart for the logged-in user
        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];
            $cart_sql = "SELECT * FROM cart WHERE userid = ? AND paintingid = ?";
            $cart_stmt = $conn->prepare($cart_sql);
            $cart_stmt->bind_param('ii', $user_id, $painting_id);
            $cart_stmt->execute();
            $cart_result = $cart_stmt->get_result();

            $is_in_cart = $cart_result->num_rows > 0;
        } else {
            $is_in_cart = false;
        }
    } else {
        die("Painting not found.");
    }
} else {
    header('Location: onlinegallery.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
        $insert_cart_sql = "INSERT INTO cart (userid, paintingid) VALUES (?, ?) ON DUPLICATE KEY UPDATE paintingid = paintingid";
        $insert_cart_stmt = $conn->prepare($insert_cart_sql);
        $insert_cart_stmt->bind_param('ii', $user_id, $painting_id);

        if ($insert_cart_stmt->execute()) {
            $is_in_cart = true;
        } else {
            die("Error adding to cart: " . $conn->error);
        }
    } else {
        header('Location: index.php');
        exit();
    }
}
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
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

    <div class="main-container">

        <div class="paintingpic">
            <img src="<?php echo htmlspecialchars($painting['paintingimg']); ?>" alt="Painting Image">
        </div>

        <div class="descrption">
            <div class="headings">
                <div class="name"><h1><?php echo htmlspecialchars($painting['paintingname']); ?></h1></div>
                <div class="arname"><h2><?php echo htmlspecialchars($painting['artistname']); ?></h2></div>
                <div class="cost"><h2>$<?php echo htmlspecialchars($painting['price']); ?></h2></div>
            </div>
            
            <div class="pdescription">
                <h4>Description: </h4>
                <p><?php echo nl2br(htmlspecialchars($painting['description'])); ?></p>
            </div>

            <div class="buttons">
                <?php if ($is_in_cart): ?>
                    <button disabled>Booked</button>
                <?php else: ?>
                    <form method="post">
                        <button type="submit" name="add_to_cart">Add to cart <i class="fa-solid fa-cart-shopping"></i></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <footer>
        <p><img src="images/artgallery-removebg-preview.png" alt="Art Gallery Logo">
            <h2>Nepal Art Gallery</h2>
        </p> <br>
        <a href="home.php">Home</a>
        <a href="onlinegallery.php">Online Exhibition</a>
        <a href="#">About Us</a>
        <a href="shoppingcart">Cart</a>
        <a href="php/logout.php">Logout</a> <br>
        <hr> <br>
        <p> @copyright2024</p> <br>
    </footer>

</body>
</html>

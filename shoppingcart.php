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

// Ensure user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['id'];

// Fetch items in the user's cart
$sql = "SELECT painting.sn, painting.paintingname, painting.artistname, painting.price, painting.paintingimg 
        FROM cart 
        INNER JOIN painting ON cart.paintingid = painting.sn 
        WHERE cart.userid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/navstyle.css">
    <link rel="stylesheet" href="CSS/cartstyle.css">
    <title>Your Cart</title>
</head>
<body>

<div class="nav">
        <div class="logo">
            <img src="images/artgallery-removebg-preview.png" alt="no img">
        </div>

        <div class="aclass">
            <a href="home.php"><b>Home</b></a>
            <a href="onlinegallery.php"><b>Online Exhibition</b></a>
            <a href="#section1"><b>About Us</b></a>
            <a href="shoppingcart.php"><b>Cart</b></a>
            <a href="php/logout.php"><b>Logout</b></a>
        </div>
    </div>
    <div class="main-container">
        <h1>Your Shopping Cart</h1>

        <?php if (!empty($cart_items)): ?>
            <main>
                <?php foreach ($cart_items as $item): ?>
                    <div class="artcontainer">
                        <div class="image">
                            <img src="<?php echo htmlspecialchars($item['paintingimg']); ?>" alt="Painting Image">
                        </div>
                        <div class="caption">
                            <h2><?php echo htmlspecialchars($item['paintingname']); ?></h2>
                            <h3>By <?php echo htmlspecialchars($item['artistname']); ?></h3>
                            <h4>Price: $<?php echo htmlspecialchars($item['price']); ?></h4>
                            <form method="post" action="removefromcart.php">
                                <input type="hidden" name="painting_id" value="<?php echo htmlspecialchars($item['sn']); ?>">
                                <button type="submit">Remove</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </main>
        <?php else: ?>
            <p>Your cart is empty. <a href="onlinegallery.php">Browse paintings</a> to add to your cart.</p>
        <?php endif; ?>
    </div>

    <footer>
        <p><img src="images/artgallery-removebg-preview.png" alt="no img">
            <h2>Nepal Art Gallery</h2>
        </p> <br>
        <a href="home.html">Home</a>
            <a href="onlinegallery.php">Online Exhibition</a>
            <a href="#section1">About Us</a>
            <a href="#">Cart</a>
            <a href="php/logout.php">Logout</a> <br>
            <hr> <br>
        <p> @copyright2024</p> <br>
    </footer>

</body>
</html>
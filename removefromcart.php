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

// Check if the user is logged in and a painting ID is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['painting_id']) && isset($_SESSION['id'])) {
    $painting_id = $_POST['painting_id'];
    $user_id = $_SESSION['id'];

    // Delete the item from the cart
    $sql = "DELETE FROM cart WHERE userid = ? AND paintingid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $user_id, $painting_id);

    if ($stmt->execute()) {
        // Redirect to shopping cart after successful removal
        header('Location: shoppingcart.php');
        exit();
    } else {
        die("Error removing item: " . $conn->error);
    }
} else {
    // Redirect back if the request is invalid
    header('Location: shoppingcart.php');
    exit();
}

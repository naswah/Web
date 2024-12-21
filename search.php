<?php
// Start the session
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "web");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query from the form
$query = isset($_GET['query']) ? trim($_GET['query']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="CSS/search.css">
</head>
<body>
    <?php
    if ($query !== '') {
        // Search for paintings by name or artist
        $sql = "SELECT * FROM painting WHERE paintingname like ? OR artistname like ?";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%" . $query . "%";
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        echo "<h2>Search Results for '$query'</h2>";
        if ($result->num_rows > 0) {
            echo "<div class='search-results'>";
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='painting'>
                    <img src='" . htmlspecialchars($row['paintingimg']) . "' alt='Painting'>
                    <h2>" . htmlspecialchars($row['paintingname']) . "</h2>
                    <p>Artist: " . htmlspecialchars($row['artistname']) . "</p>
                    <p>Price: $" . htmlspecialchars($row['price']) . "</p>
                </div>";
            }
            echo "</div>";
        } else {
                 echo "<p style = 'margin-left: 65px;'>No results found for your search.</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Please enter a search term.</p>";
    }
    $conn->close();
    ?>
</body>
</html>

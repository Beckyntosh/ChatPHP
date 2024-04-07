
<?php

// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch artists and music based on user input
$searchGenre = isset($_POST['genre']) ? $conn->real_escape_string($_POST['genre']) : '';
$searchDecade = isset($_POST['decade']) ? $conn->real_escape_string($_POST['decade']) : '';

// Build SQL query
$sql = "SELECT * FROM artists WHERE genre = '$searchGenre' AND decade = '$searchDecade'";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Music Streaming</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            max-width: 700px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .artist {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            margin: 10px 0;
        }
        .artist-name {
            font-size: 20px;
            color: #007bff;
        }
        .search-form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Search for Music and Artists</h1>
    <div class="search-form">
        <form action="" method="post">
            <input type="text" name="genre" placeholder="Genre, e.g., Jazz" value="<?= htmlspecialchars($searchGenre) ?>">
            <input type="text" name="decade" placeholder="Decade, e.g., 1960s" value="<?= htmlspecialchars($searchDecade) ?>">
            <button type="submit">Search</button>
        </form>
    </div>
    <?php
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="artist">';
            echo '<div class="artist-name">' . htmlspecialchars($row["name"]) . '</div>';
            echo '<div>Genre: ' . htmlspecialchars($row["genre"]) . '</div>';
            echo '<div>Decade: ' . htmlspecialchars($row["decade"]) . '</div>';
            echo '</div>';
        }
    } else {
        echo "<p>No artists found matching your criteria.</p>";
    }
    $conn->close();
    ?>
</div>
</body>
</html>

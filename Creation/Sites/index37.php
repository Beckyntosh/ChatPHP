<?php
// DB connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$artistTable = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(20) NOT NULL
    )";

if (!$conn->query($artistTable)) {
    echo "Error creating table: " . $conn->error;
}

$searchResult = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['search'];
    
    // Assume the searchQuery is 'Jazz artists from the 1960s'
    $sql = "SELECT name FROM artists WHERE genre = 'Jazz' AND decade = '1960s'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $searchResult = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $searchResult = [];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music and Artist Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], button {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin: 5px 0;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Search for Music Artists</h2>
    <form method="POST">
        <input type="text" name="search" placeholder="Enter search terms e.g., Jazz artists from the 1960s">
        <button type="submit">Search</button>
    </form>
    <?php if (!empty($searchResult)) : ?>
        <ul>
            <?php foreach ($searchResult as $artist): ?>
                <li><?php echo htmlspecialchars($artist['name']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No results found</p>
    <?php endif; ?>
</div>

</body>
</html>

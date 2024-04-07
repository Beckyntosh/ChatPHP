<?php
// Database connection
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

// Create table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS Artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    year INT(4),
    UNIQUE KEY unique_artist (name,year)
)";

if ($conn->query($createTable) === TRUE) {
  echo "Table Artists created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// HTML and JS
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function searchMusic() {
        $.ajax({
            type: "POST",
            url: "",
            data: { search: $("#search").val() },
            success: function(data) {
                $("#results").html(data);
            }
        });
    }
    </script>
</head>
<body>
    <h1>Music and Artist Search</h1>
    <input type="text" id="search" onkeyup="searchMusic()" placeholder="Search for artists...">
    <div id="results"></div>
</body>
</html>

<?php

// PHP Backend to handle search
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search'])) {
    $searchValue = $conn->real_escape_string($_POST['search']);
    $sql = "SELECT * FROM Artists WHERE name LIKE '%$searchValue%' OR genre LIKE '%$searchValue%' OR year LIKE '%$searchValue%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Genre: " . $row["genre"]. " - Year: " . $row["year"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}

$conn->close();
?>

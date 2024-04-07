<?php

// Connect to the database
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

// Create artists table if not exists
$sql = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(20) NOT NULL,
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table artists created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if the search form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Perform search
    $genre = $_POST['genre'];
    $decade = $_POST['decade'];

    $stmt = $conn->prepare("SELECT * FROM artists WHERE genre=? AND decade=?");
    $stmt->bind_param("ss", $genre, $decade);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music and Artist Search</title>
</head>
<body>
    <h1>Search for Jazz artists from the 1960s</h1>
    <form action="" method="post">
        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="Jazz" readonly><br><br>
        <label for="decade">Decade:</label>
        <input type="text" id="decade" name="decade" value="1960s" readonly><br><br>
        <input type="submit" value="Search">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Genre: " . $row["genre"]. " - Decade: " . $row["decade"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }
    ?>
</body>
</html>
<?php
$conn->close();
?>

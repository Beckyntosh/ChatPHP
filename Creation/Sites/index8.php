<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for artists if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  genre VARCHAR(30) NOT NULL,
  decade VARCHAR(10) NOT NULL
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table artists created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert some sample data if table is empty
$checkTableEmpty = "SELECT COUNT(*) AS count FROM artists";
$result = $conn->query($checkTableEmpty);
$row = $result->fetch_assoc();

if ($row['count'] == 0) {
    $insertData = "INSERT INTO artists (name, genre, decade) VALUES 
        ('Artist 1', 'Jazz', '1960s'),
        ('Artist 2', 'Rock', '1980s'),
        ('Artist 3', 'Jazz', '1960s')";
    if ($conn->query($insertData) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

// Handle search
$search = $_GET['search'] ?? '';

$sql = "SELECT * FROM artists WHERE genre='Jazz' AND decade='1960s' AND name LIKE '%$search%'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search for Jazz Artists</title>
</head>
<body style="font-family: 'Times New Roman', Times, serif; background-color: #ffe5d9;">
<h2>Search for Jazz Artists from the 1960s</h2>
<form action="" method="GET">
    <label for="search">Search Artist:</label>
    <input type="text" id="search" name="search">
    <button type="submit">Search</button>
</form>

<?php
if ($result->num_rows > 0) {
    echo "<ul>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["name"]. " - " . $row["genre"]. " - " . $row["decade"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>

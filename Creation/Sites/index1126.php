<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music and Artist Database Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        input[type=text], select {
            width: 300px;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100px;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            padding: 20px;
        }
    </style>
</head>
<body>
<h2>Search for Jazz Artists from the 1960s</h2>

<div>
    <form action="" method="post">
        <input type="text" id="searchQuery" name="searchQuery" placeholder="Enter search term...">
        <input type="submit" value="Search">
    </form>
</div>

<?php
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

$sql = "CREATE TABLE IF NOT EXISTS Artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
genre VARCHAR(50),
decade VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    // table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Sample Data
$artists = [
    ['name' => 'Miles Davis', 'genre' => 'Jazz', 'decade' => '1960s'],
    ['name' => 'John Coltrane', 'genre' => 'Jazz', 'decade' => '1960s']
];

// Assuming you want to insert this only if the table is empty
$result = $conn->query("SELECT COUNT(*) FROM Artists");
$row = $result->fetch_row();
if ($row[0] == 0) { // Only insert if table is empty
    foreach ($artists as $artist) {
        $stmt = $conn->prepare("INSERT INTO Artists (name, genre, decade) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $artist['name'], $artist['genre'], $artist['decade']);
        $stmt->execute();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['searchQuery'];
    // Simple validation and sanitization to prevent SQL injection
    $searchQuery = htmlspecialchars(strip_tags($searchQuery));
    $sql = "SELECT name, genre, decade FROM Artists WHERE genre = 'Jazz' AND decade = '1960s' AND name LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%".$searchQuery."%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h3>Results:</h3>";
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"]. " - Genre: " . $row["genre"]. " - Decade: " . $row["decade"]. "<br>";
        }
    } else {
        echo "<p>No results found</p>";
    }
}

$conn->close();
?>
</body>
</html>

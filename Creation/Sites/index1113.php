<?php
// Simple Music and Artist Search Application in PHP with MySQL - Example Code

// Setup the MySQL connection
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
$createArtistsTable = "CREATE TABLE IF NOT EXISTS artists (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(100) NOT NULL,
                        genre VARCHAR(50),
                        decade VARCHAR(20),
                        reg_date TIMESTAMP)";
$conn->query($createArtistsTable);

$createSongsTable = "CREATE TABLE IF NOT EXISTS songs (
                      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      title VARCHAR(100) NOT NULL,
                      artist_id INT(6) UNSIGNED,
                      release_date DATE,
                      FOREIGN KEY (artist_id) REFERENCES artists(id)
                      ON DELETE CASCADE)";
$conn->query($createSongsTable);

// Handle search
$search = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $genre = $_POST['genre'];
  $decade = $_POST['decade'];
  $searchQuery = "SELECT artists.name, genre, decade FROM artists WHERE genre = ? AND decade = ?";

  // Prepare and bind
  $stmt = $conn->prepare($searchQuery);
  $stmt->bind_param("ss", $genre, $decade);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $search = "<ul>";
    while($row = $result->fetch_assoc()) {
      $search .= "<li>Artist: " . $row["name"]. " - Genre: " . $row["genre"]. " - Decade: " . $row["decade"]. "</li>";
    }
    $search .= "</ul>";
  } else {
    $search = "No results found.";
  }
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Collection Search</title>
    <style>
        body {
            font-family: 'Garamond', serif;
            background-color: #f3f4f6;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
        input[type="text"], select {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #3949AB;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #303F9F;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Music and Artist Search</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <select name="genre">
            <option value="Jazz">Jazz</option>
            <option value="Rock">Rock</option>
            <option value="Pop">Pop</option>
Add more genres as needed
        </select>
        <select name="decade">
            <option value="1960s">1960s</option>
            <option value="1970s">1970s</option>
            <option value="1980s">1980s</option>
Add more decades as needed
        </select>
        <input type="submit" value="Search">
    </form>
    <?php echo $search; ?>
</div>
</body>
</html>

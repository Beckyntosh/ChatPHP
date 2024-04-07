<?php
// Initialize the database connection
$servername = "db";
$username = "root";
$password = 'root';
$dbname = "my_database";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create books table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS books (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    user_rating FLOAT(3,2) DEFAULT 0.0,
    popularity INT(10) DEFAULT 0,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// HTML and PHP mix for handling the form and displaying the books
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Virtual Library Book Search</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0e68c; }
    </style>
</head>
<body>
    <h1>Virtual Library Book Search</h1>
    <form method="post">
        <input type="text" name="search" placeholder="Search for books...">
        <select name="filter">
            <option value="all">All</option>
            <option value="horror">Horror</option>
            <option value="sci-fi">Sci-Fi</option>
            <option value="fantasy">Fantasy</option>
            <option value="romance">Romance</option>
        </select>
        <input type="submit" value="Search">
    </form>
    
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $search = htmlspecialchars($_POST['search']);
    $filter = $_POST['filter'];

    $sql = "SELECT title, author, genre, user_rating, popularity FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
    
    if ($filter != "all") {
        $sql .= " AND genre='$filter'";
    }
    
    $sql .= " ORDER BY popularity DESC, user_rating DESC";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Title</th><th>Author</th><th>Genre</th><th>Rating</th><th>Popularity</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["title"]."</td><td>".$row["author"]."</td><td>".$row["genre"]."</td><td>".$row["user_rating"]."</td><td>".$row["popularity"]."</td></tr>";
        }
        echo "</table>";
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

<?php
// Connection to the Database
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

// Create table legal_documents if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS legal_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Search functionality
$search = $_GET['search'] ?? '';
$safeSearch = $conn->real_escape_string($search);
$query = "SELECT * FROM legal_documents WHERE title LIKE '%$safeSearch%' OR content LIKE '%$safeSearch%'";

$result = $conn->query($query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Legal Documents Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .document { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; }
        .document-title { font-weight: bold; }
    </style>
</head>
<body>
    <h1>Search for Legal Documents</h1>
    <form method="GET">
        <input type="text" name="search" placeholder="Search documents" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>
    <?php
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='document'>";
            echo "<div class='document-title'>" . htmlspecialchars($row["title"]) . "</div>";
            echo "<div class='document-content'>" . nl2br(htmlspecialchars($row["content"])) . "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>
</html>
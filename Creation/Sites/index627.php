<?php
// Database configuration
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

// Attempt to create table research_papers if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS research_papers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  author VARCHAR(255),
  abstract TEXT,
  publication_date DATE,
  keyword VARCHAR(255)
);";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert sample data into research_papers table
$sql = "INSERT INTO research_papers (title, author, abstract, publication_date, keyword) VALUES
('Sample Research Paper A', 'Author A', 'Abstract of Research Paper A', '2021-04-12', 'Keyword1'),
('Sample Research Paper B', 'Author B', 'Abstract of Research Paper B', '2022-05-15', 'Keyword2');";

$conn->query($sql); // Try to insert, but ignore errors to avoid duplicate entry issue on page refresh

// Search functionality
$keyword = $_GET['keyword'] ?? ''; // Use the null coalescing operator to avoid undefined index notice

$searchSql = "SELECT * FROM research_papers WHERE keyword LIKE ? OR title LIKE ? OR author LIKE ?;";
$stmt = $conn->prepare($searchSql);
$likeKeyword = '%'.$keyword.'%';
$stmt->bind_param("sss", $likeKeyword, $likeKeyword, $likeKeyword);
$stmt->execute();
$result = $stmt->get_result();

// Begin HTML
?>
<!DOCTYPE html>
<html>
<head>
    <title>Research Papers Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4a261; /* Desert Dazzle theme color */
            color: #264653;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .search-form {
            margin-bottom: 20px;
        }
        .paper {
            background-color: #e9c46a;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Research Papers Search</h2>
    <form action="" method="get" class="search-form">
        <input type="text" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Enter keyword, title, or author">
        <button type="submit">Search</button>
    </form>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='paper'>";
            echo "<h3>".htmlspecialchars($row['title'])."</h3>";
            echo "<p>Author: ".htmlspecialchars($row['author'])."</p>";
            echo "<p>Abstract: ".substr(htmlspecialchars($row['abstract']), 0, 150)."...</p>";
            echo "<p>Publication Date: ".htmlspecialchars($row['publication_date'])."</p>";
            echo "</div>";
        }
    } else {
        echo "No papers found.";
    }
    ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
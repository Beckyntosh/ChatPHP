<?php
// Database connection settings
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

try {
    $pdo = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database " . MYSQL_DATABASE . ": " . $e->getMessage());
}

// Create table for code uploads if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$pdo->exec($query);

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["source_code"]["name"])) {
    $title = $_POST["title"];
    $code = file_get_contents($_FILES["source_code"]["tmp_name"]);

    $stmt = $pdo->prepare("INSERT INTO code_reviews (title, code) VALUES (?, ?)");
    $stmt->execute([$title, $code]);

    echo "<p>Code upload successful!</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Upload for Review</title>
</head>
<body>
    <h1>Upload Source Code for Review</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Feature Title" required>
        <input type="file" name="source_code" accept=".php,.html,.js,.css" required>
        <button type="submit">Upload</button>
    </form>

    <h2>Submitted Reviews</h2>
    <?php
    $stmt = $pdo->query("SELECT * FROM code_reviews");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div><h3>".htmlspecialchars($row['title'])."</h3>";
        echo "<pre>".htmlspecialchars($row['code'])."</pre></div>";
    }
    ?>
</body>
</html>

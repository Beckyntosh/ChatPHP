<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the report upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["financialReport"])) {
    $filename = $conn->real_escape_string($_FILES["financialReport"]["name"]);
    $fileData = file_get_contents($_FILES["financialReport"]["tmp_name"]);
    $fileSize = $conn->real_escape_string($_FILES["financialReport"]["size"]);
    $fileType = $conn->real_escape_string($_FILES["financialReport"]["type"]);

    $sql = "INSERT INTO financial_reports (name, type, size, content) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $null = NULL;
    $stmt->bind_param("ssib", $filename, $fileType, $fileSize, $null);
    $stmt->send_long_data(3, $fileData);

    if ($stmt->execute()) {
        echo "<p style='color:lime;'>Report uploaded successfully.</p>";
    } else {
        echo "<p style='color:red;'>Error uploading report: " . $conn->error . "</p>";
    }
    $stmt->close();
}

// Create table if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(50),
    size INT,
    content LONGBLOB NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Financial Reports</title>
    <style>
        body { background-color: #0a0f12; font-family: Arial, sans-serif; color: #c0c0c8; }
        form, .search-results { background-color: #222831; padding: 20px; margin-top: 20px; border-radius: 5px; }
        input[type='text'], input[type='file'] { margin-top: 10px; }
        input[type='submit'] { margin-top: 20px; background-color: #393e46; color: #00adb5; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
        input[type='submit']:hover { background-color: #00adb5; color: #393e46; }
    </style>
</head>
<body>

<div>
    <form method="post" enctype="multipart/form-data">
        <label for="financialReport">Upload Financial Report:</label><br>
        <input type="file" name="financialReport" id="financialReport" required><br>
        <input type="submit" value="Submit Report">
    </form>
</div>

<div>
    <form method="get">
        <label for="search">Search Financial Reports:</label><br>
        <input type="text" id="search" name="search" placeholder="e.g., Q2 earnings reports for tech companies 2023">
        <input type="submit" value="Search">
    </form>
</div>

<div class="search-results">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])) {
        $search = $conn->real_escape_string($_GET["search"]);

        $sql = "SELECT id, name, type, size FROM financial_reports WHERE name LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>Name:</strong> " . htmlspecialchars($row["name"]) . " - <strong>Type:</strong> " . htmlspecialchars($row["type"]) . " - <strong>Size:</strong> " . htmlspecialchars($row["size"]) . " bytes</p>";
            }
        } else {
            echo "<p style='color:red;'>No results found</p>";
        }
        $stmt->close();
    }
    $conn->close();
    ?>
</div>

</body>
</html>

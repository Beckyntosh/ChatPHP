<?php
// Connection setup
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
$sql = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    feature VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload and form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $feature = $_POST['feature'];
    $code = file_get_contents($_FILES['source_code']['tmp_name']);
    $stmt = $conn->prepare("INSERT INTO code_reviews (feature, code) VALUES (?, ?)");
    $stmt->bind_param("ss", $feature, $cleanCode);
    
    $cleanCode = mysqli_real_escape_string($conn, $code);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Code Review Submission</title>
</head>
<body>
    <h2>Submit Source Code for Review</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Feature Name: <input type="text" name="feature" required><br>
        Source Code: <input type="file" name="source_code" accept=".php,.html,.js,.css" required><br>
        <input type="submit" value="Upload Code for Review">
    </form>

    <h2>Submitted Code Reviews</h2>
    <?php
    // Show submitted code reviews
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT id, feature, status, created_at FROM code_reviews ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Feature</th><th>Status</th><th>Submitted At</th></tr>";
        // Output each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["feature"]. "</td><td> " . $row["status"]. "</td><td>" . $row["created_at"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>

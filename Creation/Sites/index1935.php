<?php
// Database Connection
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

// Create table for code uploads if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    feature_name VARCHAR(30) NOT NULL,
    code TEXT NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($table_sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["feature_name"]) && !empty($_POST["code"])) {
    
    $feature_name = $_POST["feature_name"];
    $code = $_POST["code"];
    
    $stmt = $conn->prepare("INSERT INTO code_reviews (feature_name, code) VALUES (?, ?)");
    $stmt->bind_param("ss", $feature_name, $code);
    
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Submit Code for Review</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; font-size: 18px; }
        .container { width: 800px; margin: 0 auto; }
        form { margin: 50px 0; }
        textarea { width: 100%; height: 200px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Submit Feature Code for Review</h1>
        <form action="" method="post">
            <label for="feature_name">Feature Name:</label><br>
            <input type="text" id="feature_name" name="feature_name" value="" required><br><br>
            
            <label for="code">Source Code:</label><br>
            <textarea id="code" name="code" required></textarea><br><br>
            
            <input type="submit" value="Submit">
        </form>
        
        <h2>Submitted Reviews</h2>
        <?php
        $sql = "SELECT id, feature_name, upload_date FROM code_reviews ORDER BY upload_date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>" . $row["feature_name"]. "</strong> - " . $row["upload_date"]. "</p>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>

<?php
// Connect to MySQL database
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

// Create table for ratings if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS service_ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(50) NOT NULL,
    service_type ENUM('online', 'in-store') NOT NULL,
    rating TINYINT(1) NOT NULL,
    comments TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $service_type = $_POST['service_type'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    $stmt = $conn->prepare("INSERT INTO service_ratings (customer_name, service_type, rating, comments) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $customer_name, $service_type, $rating, $comments);

    if ($stmt->execute()) {
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
    <title>Customer Service Rating System</title>
</head>
<body>
    <h2>Customer Service Rating</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="customer_name">Your Name:</label><br>
        <input type="text" id="customer_name" name="customer_name" required><br>
        
        <label for="service_type">Type of Service:</label><br>
        <select id="service_type" name="service_type" required>
            <option value="online">Online</option>
            <option value="in-store">In-Store</option>
        </select><br>
        
        <label for="rating">Your Rating (1-5):</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br>
        
        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments"></textarea><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>

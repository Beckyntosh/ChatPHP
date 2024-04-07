<?php
// Connect to database
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
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_viewed VARCHAR(50),
    view_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS product_recommendations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_recommended VARCHAR(50),
    rec_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
    $username = $_POST["username"];

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (username) VALUES (?)");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        echo "<div>User registered successfully!</div>";
    } else {
        echo "<div>Error registering user: " . $conn->error . "</div>";
    }
    $stmt->close();
}

// Function to fetch product recommendations based on browsing history
function getRecommendations($conn, $username) {
    $sql = "SELECT product_viewed FROM browsing_history 
            INNER JOIN users ON users.id = browsing_history.user_id 
            WHERE users.username = '$username' 
            ORDER BY view_date DESC LIMIT 5";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["product_viewed"] . " (Recommended)</li>";
        }
        echo "</ul>";
    } else {
        echo "No recommendations found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Product Recommendations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e8d9;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Beauty Product Recommendations</h1>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <button type="submit">Sign Up</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
            getRecommendations($conn, $_POST["username"]);
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>

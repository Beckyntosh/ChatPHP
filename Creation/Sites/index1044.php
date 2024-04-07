<?php
// Connection to the database
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
$tableSql = "CREATE TABLE IF NOT EXISTS service_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(50) NOT NULL,
    user_email VARCHAR(50),
    rating INT(1),
    comments TEXT,
    reg_date TIMESTAMP
)";
if (!$conn->query($tableSql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_name = $_POST['service_name'];
    $user_email = $_POST['user_email'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    // Insert SQL
    $insertSql = "INSERT INTO service_feedback (service_name, user_email, rating, comments)
    VALUES ('$service_name', '$user_email', '$rating', '$comments')";

    if ($conn->query($insertSql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Service Feedback System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        form { margin: 20px 0; }
        form label { display: block; margin: 10px 0; }
        form input[type="text"],
        form input[type="email"],
        form textarea { width: 100%; }
        form input[type="submit"] { padding: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Service Feedback Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="service_name">Service Name:</label>
            <input type="text" name="service_name" id="service_name" required>

            <label for="user_email">Your Email:</label>
            <input type="email" name="user_email" id="user_email">

            <label for="rating">Rating:</label>
            <input type="text" name="rating" id="rating" required>

            <label for="comments">Comments:</label>
            <textarea name="comments" id="comments"></textarea>

            <input type="submit" value="Submit">
        </form>
        
        <h2>Feedbacks</h2>
        <?php
        // Fetch submitted feedbacks
        $sql = "SELECT service_name, user_email, rating, comments FROM service_feedback";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div><strong>Service:</strong> " . $row["service_name"]. " - <strong>Rating:</strong> " . $row["rating"]. "/5<br><strong>Comments:</strong> " . $row["comments"]. "<br><strong>User Email:</strong> " . $row["user_email"]. "<br><br></div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>

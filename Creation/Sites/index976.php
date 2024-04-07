<?php

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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS hotel_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    guest_name VARCHAR(50) NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle the post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guest_name = $_POST["guest_name"];
    $review = $_POST["review"];
    $rating = $_POST["rating"];

    $stmt = $conn->prepare("INSERT INTO hotel_reviews (guest_name, review, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $guest_name, $review, $rating);

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
    <title>Hotel Guest Review System</title>
</head>
<body>

    <h2>Hotel Guest Review Form</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="guest_name">Your Name:</label><br>
        <input type="text" id="guest_name" name="guest_name" required><br>
        <label for="review">Your Review:</label><br>
        <textarea id="review" name="review" required></textarea><br>
        <label for="rating">Your Rating:</label><br>
        <select id="rating" name="rating" required>
            <option value="1">1 Star</option>
            <option value="2">2 Stars</option>
            <option value="3">3 Stars</option>
            <option value="4">4 Stars</option>
            <option value="5">5 Stars</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>

</body>
</html>

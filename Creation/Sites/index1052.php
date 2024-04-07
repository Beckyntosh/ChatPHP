<?php
// Connection Parameters
$servername = "db";
$username = "root";
$password = 'root';
$dbname = 'my_database';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create review table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS hotel_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    rating INT(1) NOT NULL,
    review TEXT,
    guest_name VARCHAR(50),
    visit_date DATE,
    reg_date TIMESTAMP
    )";

if ($conn->query($createTable) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
    $review = isset($_POST['review']) ? $conn->real_escape_string($_POST['review']) : '';
    $guest_name = isset($_POST['guest_name']) ? $conn->real_escape_string($_POST['guest_name']) : '';
    $visit_date = isset($_POST['visit_date']) ? $conn->real_escape_string($_POST['visit_date']) : date('Y-m-d');

    $sql = "INSERT INTO hotel_reviews (rating, review, guest_name, visit_date) VALUES ('$rating', '$review', '$guest_name', '$visit_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Review successfully submitted.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

// Closing connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Guest Review System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { margin-top: 20px; }
        input[type=text], textarea, select { width: 100%; padding: 12px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
        button:hover { opacity: 0.8; }
    </style>
</head>
<body>

<div class="container">
    <h2>Hotel Guest Review System</h2>
    <form action="" method="post">
        <label for="guest_name">Guest Name:</label>
        <input type="text" id="guest_name" name="guest_name" required>

        <label for="visit_date">Visit Date:</label>
        <input type="date" id="visit_date" name="visit_date" required>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected>5</option>
        </select>

        <label for="review">Review:</label>
        <textarea id="review" name="review" required></textarea>

        <button type="submit" name="submit">Submit Review</button>
    </form>
</div>

</body>
</html>

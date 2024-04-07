<?php
// Basic check to ensure the script is not directly accessed.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // Create table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS reviews (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        restaurant VARCHAR(50) NOT NULL,
        review TEXT NOT NULL,
        food_quality INT NOT NULL,
        service INT NOT NULL,
        ambiance INT NOT NULL,
        reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Table created successfully or already exists
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Insert new review
    $stmt = $conn->prepare("INSERT INTO reviews (restaurant, review, food_quality, service, ambiance) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiii", $restaurant, $review, $food_quality, $service, $ambiance);

    $restaurant = $_POST['restaurant'];
    $review = $_POST['review'];
    $food_quality = $_POST['food_quality'];
    $service = $_POST['service'];
    $ambiance = $_POST['ambiance'];

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Your Review</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        form { display: flex; flex-direction: column; width: 50%; }
        label { margin-top: 10px; }
        input, textarea, button { padding: 10px; margin-top: 5px; }
        button { background: #4CAF50; color: white; border: none; cursor:pointer;}
    </style>
</head>
<body>
<div class="container">
    <h2>Submit Your Restaurant Review</h2>
    <form action="" method="post">
        <label for="restaurant">Restaurant Name:</label>
        <input type="text" id="restaurant" name="restaurant" required>
        
        <label for="review">Review:</label>
        <textarea id="review" name="review" required></textarea>
        
        <label for="food_quality">Food Quality (1-5):</label>
        <input type="number" id="food_quality" name="food_quality" min="1" max="5" required>
        
        <label for="service">Service (1-5):</label>
        <input type="number" id="service" name="service" min="1" max="5" required>
        
        <label for="ambiance">Ambiance (1-5):</label>
        <input type="number" id="ambiance" name="ambiance" min="1" max="5" required>
        
        <button type="submit">Submit Review</button>
    </form>
</div>
</body>
</html>

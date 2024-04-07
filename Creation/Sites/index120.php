<?php
// Connection settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt database connection.
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$createTables = "
CREATE TABLE IF NOT EXISTS recipes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(255) NOT NULL,
    ingredients TEXT NOT NULL,
    directions TEXT NOT NULL,
    dietary_preferences VARCHAR(255),
    REG_DATE TIMESTAMP
);

CREATE TABLE IF NOT EXISTS meal_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day_of_week VARCHAR(50) NOT NULL,
    recipe_id INT(6) UNSIGNED,
    FOREIGN KEY (recipe_id) REFERENCES recipes(id),
    REG_DATE TIMESTAMP
);
";

if ($conn->multi_query($createTables) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error creating tables: " . $conn->error;
}

$conn->close();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $directions = $_POST['directions'];
    $dietary_preferences = $_POST['dietary_preferences'];

    // Insert recipe into database
    $sql = "INSERT INTO recipes (title, ingredients, directions, dietary_preferences) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $title, $ingredients, $directions, $dietary_preferences);
    
    if ($stmt->execute()) {
        echo "Recipe added successfully.";
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
    <title>Simple Meal Plan</title>
</head>
<body>
    <h1>Add a Recipe</h1>
    <form method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="ingredients">Ingredients:</label><br>
        <textarea id="ingredients" name="ingredients" required></textarea><br>
        <label for="directions">Directions:</label><br>
        <textarea id="directions" name="directions" required></textarea><br>
        <label for="dietary_preferences">Dietary Preferences:</label><br>
        <input type="text" id="dietary_preferences" name="dietary_preferences"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
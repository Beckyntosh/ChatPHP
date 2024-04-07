<?php
// Simple Meal Plan Web Application

// Connect to Database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createTables = "
CREATE TABLE IF NOT EXISTS DietaryPreferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    preference VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Meals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    ingredients TEXT NOT NULL,
    dietary_preference_id INT,
    FOREIGN KEY (dietary_preference_id) REFERENCES DietaryPreferences(id)
);";

if (!$conn->multi_query($createTables)) {
    echo "Error creating tables: " . $conn->error;
}

// Wait for multi_query to finish
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->next_result());

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mealName = $_POST['mealName'];
    $ingredients = $_POST['ingredients'];
    $dietaryPreference = $_POST['dietaryPreference'];

    $insertSQL = "INSERT INTO Meals (name, ingredients, dietary_preference_id) VALUES (?, ?, (SELECT id FROM DietaryPreferences WHERE preference = ? LIMIT 1))";

    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("sss", $mealName, $ingredients, $dietaryPreference);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Meal Plan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #202020;
            color: #E0E0E0;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .meal-form, .meal-plan {
            margin-top: 20px;
        }
        label, input, select {
            display: block;
            margin-bottom: 10px;
        }
        input, select {
            padding: 10px;
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Your Meal Plan</h1>
        <form class="meal-form" method="post">
            <label for="mealName">Meal Name:</label>
            <input type="text" id="mealName" name="mealName" required>

            <label for="ingredients">Ingredients:</label>
            <textarea id="ingredients" name="ingredients" required></textarea>

            <label for="dietaryPreference">Dietary Preference:</label>
            <select id="dietaryPreference" name="dietaryPreference">
                <?php
                $sql = "SELECT preference FROM DietaryPreferences";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["preference"] ."'>" . $row["preference"] ."</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="Add Meal">
        </form>

        <h2>Your Meal Plan</h2>
        <div class="meal-plan">
            <?php
            $sql = "SELECT Meals.name, Meals.ingredients, DietaryPreferences.preference FROM Meals JOIN DietaryPreferences ON Meals.dietary_preference_id = DietaryPreferences.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<ul>";
                while($row = $result->fetch_assoc()) {
                    echo "<li><strong>" . $row["name"] . "</strong> - " . $row["ingredients"] . " [" . $row["preference"] . "]</li>";
                }
                echo "</ul>";
            } else {
                echo "No meals found!";
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>

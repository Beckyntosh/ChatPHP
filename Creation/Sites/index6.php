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

// Create tables if they do not exist
$sqlCreateRecipesTable = "CREATE TABLE IF NOT EXISTS recipes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
recipe_name VARCHAR(255) NOT NULL,
recipe_instructions TEXT,
recipe_image VARCHAR(255)
)";

$sqlCreateIngredientsTable = "CREATE TABLE IF NOT EXISTS ingredients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
recipe_id INT(6) UNSIGNED,
ingredient_name VARCHAR(255) NOT NULL,
FOREIGN KEY (recipe_id) REFERENCES recipes(id)
)";

$sqlCreateDietaryRestrictionsTable = "CREATE TABLE IF NOT EXISTS dietary_restrictions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
recipe_id INT(6) UNSIGNED,
restriction VARCHAR(255) NOT NULL,
FOREIGN KEY (recipe_id) REFERENCES recipes(id)
)";

$conn->query($sqlCreateRecipesTable);
$conn->query($sqlCreateIngredientsTable);
$conn->query($sqlCreateDietaryRestrictionsTable);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchIngredients = $_POST['ingredients'] ?? '';
    $dietRestriction = $_POST['dietRestriction'] ?? '';

    $query = "SELECT DISTINCT recipes.* FROM recipes 
    LEFT JOIN ingredients ON recipes.id = ingredients.recipe_id 
    LEFT JOIN dietary_restrictions ON recipes.id = dietary_restrictions.recipe_id 
    WHERE ingredient_name IN ($searchIngredients) 
    AND (restriction != '$dietRestriction' OR restriction IS NULL)";

    $result = $conn->query($query);
} else {
    $result = $conn->query("SELECT * FROM recipes");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F0F8FF;
        }
        .recipe {
            border: 1px solid #ddd;
            padding: 8px;
            margin-top: 10px;
            background-color: #ffffff;
        }
        .recipe img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <h1>Find Your Recipe</h1>
    <form method="POST">
        Ingredients (comma separated):<br>
        <input type="text" name="ingredients" placeholder="e.g. Onion, Garlic"><br>
        Dietary Restrictions:<br>
        <select name="dietRestriction">
            <option value="">None</option>
            <option value="Vegetarian">Vegetarian</option>
            <option value="Vegan">Vegan</option>
            <option value="Gluten-Free">Gluten-Free</option>
        </select><br><br>
        <input type="submit" value="Search">
    </form>
    <div>
        <?php
        if (isset($result) && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='recipe'>";
                echo "<h2>" . $row["recipe_name"] . "</h2>";
                echo "<img src='" . $row["recipe_image"] . "' alt='" . $row["recipe_name"] . "'>";
                echo "<p>" . $row["recipe_instructions"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "No recipes found.";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
<?php
// This script acts as both the backend logic and frontend presentation for a simple recipe search application with ingredient and dietary filters.

// Connection parameters
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

// Check if the search form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
  $ingredient = $_POST['ingredient'];
  $dietaryPreference = $_POST['dietaryPreference'];
  
  // Basic sanitization
  $ingredient = htmlspecialchars($ingredient);
  $dietaryPreference = htmlspecialchars($dietaryPreference);
  
  // SQL with JOINs to filter recipes based on ingredients and dietary preferences
  $sql = "SELECT recipes.name, recipes.description FROM recipes
          JOIN recipe_ingredients ON recipes.id = recipe_ingredients.recipe_id
          JOIN ingredients ON recipe_ingredients.ingredient_id = ingredients.id
          WHERE ingredients.name LIKE '%$ingredient%'
          AND recipes.dietary_preference LIKE '%$dietaryPreference%'";
          
  $result = $conn->query($sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Search - Board Games Website</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px; }
        .recipe { margin-bottom: 20px; }
    </style>
</head>
<body>
  <div class="container">
    <h1>Recipe Search</h1>
    <form method="POST">
      <input type="text" name="ingredient" placeholder="Ingredient" required>
      <select name="dietaryPreference">
        <option value="">Any Diet</option>
        <option value="Vegetarian">Vegetarian</option>
        <option value="Vegan">Vegan</option>
        <option value="Gluten-Free">Gluten-Free</option>
      </select>
      <button type="submit" name="search">Search</button>
    </form>
    
    <?php if (isset($result) && $result->num_rows > 0): ?>
      <h2>Recipes:</h2>
      <?php while($row = $result->fetch_assoc()): ?>
        <div class="recipe">
          <h3><?php echo $row["name"]; ?></h3>
          <p><?php echo $row["description"]; ?></p>
        </div>
      <?php endwhile; ?>
    <?php elseif (isset($result)): ?>
      <p>No recipes found with the given criteria.</p>
    <?php endif; ?>
  </div>
</body>
</html>
<?php $conn->close(); ?>
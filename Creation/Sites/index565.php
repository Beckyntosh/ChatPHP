<?php
// DATABASE CONNECTION
$dbHost = 'db';
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'my_database';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// INIT SQL
$initSql = [
    "CREATE TABLE IF NOT EXISTS recipes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        ingredients TEXT,
        instructions TEXT
    );",
    "INSERT INTO recipes (name, ingredients, instructions) VALUES
    ('Recipe A', 'Ingredients of Recipe A', 'Instructions of Recipe A'),
    ('Recipe B', 'Ingredients of Recipe B', 'Instructions of Recipe B'),
    ('Recipe C', 'Ingredients of Recipe C', 'Instructions of Recipe C');"
];

foreach ($initSql as $sql) {
    if (!$conn->query($sql)) {
        echo "Error creating table or inserting data: " . $conn->error;
    }
}

// HANDLE SEARCH
$searchName = isset($_GET['search']) ? $_GET['search'] : '';

$query = "SELECT * FROM recipes WHERE name LIKE '%" . $searchName . "%'";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musical Instruments Real Estate Listing Site</title>
    <style>
        body { background-color: #ffe6e6; color: #800000; }
        .container { width: 80%; margin: auto; padding: 20px; }
        input[type="search"], button { margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Recipes</h1>
        <form method="GET" action="">
            <input type="search" name="search" placeholder="Search recipes...">
            <button type="submit">Search</button>
        </form>

        <?php if ($result): ?>
            <?php if ($result->num_rows > 0): ?>
                <ul>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <li>
                            <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                            <p>Ingredients: <?php echo nl2br(htmlspecialchars($row['ingredients'])); ?></p>
                            <p>Instructions: <?php echo nl2br(htmlspecialchars($row['instructions'])); ?></p>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>No recipes found.</p>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</body>
</html>
<?php $conn->close(); ?>
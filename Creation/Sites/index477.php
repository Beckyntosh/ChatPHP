<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if form was submitted:
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $coats = $_POST['coats'];
    $coveragePerLitre = 10; // Example: 1 Litre can cover 10 square meters

    // Calculate the total area
    $totalArea = ($length * $width) + (2 * ($length * $height)) + (2 * ($width * $height));
    $totalPaint = ($totalArea / $coveragePerLitre) * $coats;

    try {
        $sql = "INSERT INTO calculations (length, width, height, coats, totalPaint) VALUES (:length, :width, :height, :coats, :totalPaint)";
        $stmt = $pdo->prepare($sql);
    
        // Bind parameters to statement
        $stmt->bindParam(':length', $length, PDO::PARAM_INT);
        $stmt->bindParam(':width', $width, PDO::PARAM_INT);
        $stmt->bindParam(':height', $height, PDO::PARAM_INT);
        $stmt->bindParam(':coats', $coats, PDO::PARAM_INT);
        $stmt->bindParam(':totalPaint', $totalPaint, PDO::PARAM_INT);
    
        $stmt->execute();
        echo "Records inserted successfully.";
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paint Coverage Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        label, input { display: block; margin-bottom: 10px; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Paint Coverage Calculator</h2>
        <form action="" method="post">
            <label for="length">Length (m):</label>
            <input type="number" id="length" name="length" required>
            
            <label for="width">Width (m):</label>
            <input type="number" id="width" name="width" required>
            
            <label for="height">Height (m):</label>
            <input type="number" id="height" name="height" required>
            
            <label for="coats">Coats:</label>
            <input type="number" id="coats" name="coats" required>
            
            <input type="submit" value="Calculate">
        </form>
    </div>
</body>
</html>
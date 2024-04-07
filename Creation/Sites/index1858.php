<?php
// Database configuration
define("DB_HOST", "db");
define("DB_NAME", "my_database");
define("DB_USER", "root");
define("DB_PASS", "root");

// Connecting to the database
try {
    $pdo = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["file"]["name"])){
    // Uploaded file path
    $fileName = $_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0){
        // Open the uploaded Excel file
        $file = fopen($fileName, "r");

        // Skip the first row (Remove if no header)
        fgetcsv($file); 

        // Prepare SQL query
        $stmt = $pdo->prepare("INSERT INTO sales_data (date, product, amount) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE amount=VALUES(amount)");
        
        // Read through the file rows
        while(($column = fgetcsv($file, 10000, ",")) !== FALSE){
            $date = $column[0];
            $product = $column[1];
            $amount = $column[2];
            
            // Execute query
            $stmt->execute([$date, $product, $amount]);
        }
        
        fclose($file);

        echo "<p>Data has been imported.</p>";
    }
}

// HTML and PHP code continues
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Sales Data</title>
    <style>
        body { font-family: "Inconsolata", monospace; }
        .container { width: 80%; margin: auto; padding: 20px; }
        h1 { text-align: center; }
        form { margin-top: 20px; }
        input[type="file"] { display: block; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload Sales Data for Visualization</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Select Spreadsheet File: </label>
            <input type="file" name="file" accept=".csv">
            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>

<?php

// Database configuration
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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csv_file"])) {
  $filename = $_FILES["csv_file"]["tmp_name"]; 

   // Verify file is not empty
   if ($_FILES['csv_file']['size'] <= 0) {
    die("The file is empty.");
   }

   // Open uploaded CSV file with read-only mode
   $file = fopen($filename, "r");
   
   // Skip the first line (Remove if no header)
   fgetcsv($file); 

   // Initialize a variable to check if table creation is needed
   $isTableCreated = false;

   // Parse the CSV file line by line
   while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
    // Create a new table for laptops if it doesn't exist already
    if (!$isTableCreated) {
      $tableQuery = "CREATE TABLE IF NOT EXISTS laptops (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        brand VARCHAR(255),
        model VARCHAR(255),
        price DECIMAL(10, 2),
        specifications TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

      if (!$conn->query($tableQuery)) {
        die("Error creating table: " . $conn->error);
      }

      $isTableCreated = true;
    }
    
    // Prepare SQL query to insert CSV data into MySQL database
    $sql = "INSERT INTO laptops (brand, model, price, specifications) VALUES ('".$column[0]."','".$column[1]."',".$column[2].", '".$column[3]."')";
    
    // Execute query
    if (!$conn->query($sql)) {
      die("Error: " . $sql . "<br>" . $conn->error);
    }
   }
   fclose($file);
   echo "<p>Data successfully imported to the database.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laptop Data Import</title>
</head>
<body>
    <h2>Import Laptop Data</h2>
    <form method="POST" enctype="multipart/form-data">
        <div>
            <label>Select CSV file:</label>
            <input type="file" name="csv_file" required>
        </div>
        <button type="submit">Upload</button>
    </form>
</body>
</html>

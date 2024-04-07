<?php
// Define MySQL connection parameters
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

// Check for file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['salesData']) && $_FILES['salesData']['error'] == UPLOAD_ERR_OK) {
    // Process the uploaded file
    if (($handle = fopen($_FILES['salesData']['tmp_name'], "r")) !== FALSE) {
        
        // Optional: Create the sales_data table if it doesn't exist
        $createTable = "CREATE TABLE IF NOT EXISTS sales_data (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        product_name VARCHAR(255) NOT NULL,
                        quantity_sold INT NOT NULL,
                        sales_date DATE NOT NULL
                        )";
        if (!$conn->query($createTable)) {
            echo "Error creating table: " . $conn->error;
        }

        // Skip the header row
        fgetcsv($handle);

        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO sales_data (product_name, quantity_sold, sales_date) VALUES (?, ?, ?)");

        // Iterate over all rows in the submitted CSV file
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Bind parameters and execute statement
            $stmt->bind_param("sis", $data[0], $data[1], $data[2]);
            $stmt->execute();
        }
        
        fclose($handle);
        echo "<p>Data successfully uploaded and inserted into the database.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sales Data Upload</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Upload Q1 2024 Sales Data</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select sales data file to upload:
        <input type="file" name="salesData" required>
        <button type="submit">Upload File</button>
    </form>
    <script src="script.js"></script>
</body>
</html>

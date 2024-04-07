<?php
// Connect to Database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create product table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(50) NOT NULL,
product_price DECIMAL(10,2) NOT NULL,
product_description TEXT,
registration_date TIMESTAMP
)";
if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// CSV File Upload and Import
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["fileUpload"]["name"])) {
    $fileName = $_FILES["fileUpload"]["tmp_name"];

    if ($_FILES["fileUpload"]["size"] > 0) {
        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $product_name = $column[0];
            $product_price = $column[1];
            $product_description = $column[2];

            $insertSQL = "INSERT into products (product_name, product_price, product_description) 
                            values (?, ?, ?)";
            $stmt = $conn->prepare($insertSQL);
            $stmt->bind_param("sds", $product_name, $product_price, $product_description);
            
            if (!$stmt->execute()) {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }

        fclose($file);
        $type = "success";
        $message = "CSV Data Imported into the Database";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload CSV File</title>
</head>
<body>

<h2>Upload CSV file for Products Data</h2>

<div>
    <form class="form-horizontal" action="" method="post" name="uploadCSV"
        enctype="multipart/form-data">
        <div>
            <label>Choose CSV File</label>
            <input type="file" name="fileUpload" accept=".csv">
            <button type="submit" id="submit" name="import">Import</button>
        </div>
    </form>
</div>

</body>
</html>
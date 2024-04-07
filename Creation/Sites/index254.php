<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if(isset($_FILES["csv_file"]) && $_FILES["csv_file"]["error"] == 0){
        $filename = $_FILES["csv_file"]["name"];
        $filetype = $_FILES["csv_file"]["type"];
        $filesize = $_FILES["csv_file"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if($ext != "csv") {
            die("Error: Please upload a CSV file.");
        }

        // Database connection settings
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        // Connect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Read and import the CSV file
        if (($handle = fopen($_FILES["csv_file"]["tmp_name"], "r")) !== FALSE) {
            fgetcsv($handle); // Skip the first row (header)
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $stmt = $conn->prepare("INSERT INTO kitchenware_products (ProductID, ProductName, Price) VALUES (?, ?, ?)");
                $stmt->bind_param("ssd", $data[0], $data[1], $data[2]);
                $stmt->execute();
            }
            fclose($handle);
            $stmt->close();
            echo "CSV file has been successfully imported.";
        }

        // Close the database connection
        $conn->close();
    } else{
        echo "Error: " . $_FILES["csv_file"]["error"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSV File Upload for Database Import</title>
</head>
<body>
    <h2>Upload CSV File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select CSV file:
        <input type="file" name="csv_file" id="csv_file">
        <input type="submit" value="Upload CSV" name="submit">
    </form>
</body>
</html>
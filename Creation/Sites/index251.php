<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Frontend: HTML Form for file upload
echo '
<!DOCTYPE html>
<html>
<head>
    <title>Upload CSV for Sporting Goods</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { max-width: 600px; margin: auto; padding: 20px; background-color: #fff; margin-top: 100px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { color: #444; }
        input[type="submit"] { background-color: #5cb85c; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
        .alert { padding: 20px; background-color: #f44336; color: white; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload CSV File</h2>
        <form action="" method="post" enctype="multipart/form-data">
            Select CSV file to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload CSV" name="submit">
        </form>
    </div>
</body>
</html>
';

// Backend: PHP code to handle file upload and database insertion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if ($fileType !== "csv") {
        echo '<div class="alert">Sorry, only CSV files are allowed.</div>';
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            // DB connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Read and insert CSV data
            $handle = fopen($target_file, "r");
            
            // Skip the first row if it's header
            fgetcsv($handle);
            
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $stmt = $conn->prepare("INSERT INTO products (name, category, price) VALUES (?, ?, ?)");
                $stmt->bind_param("ssd", $data[0], $data[1], $data[2]);
                $stmt->execute();
            }

            $stmt->close();
            fclose($handle);
            echo "<div class='alert' style='background-color: #4CAF50;'>Data successfully imported to database</div>";
        } else {
            echo "<div class='alert'>Sorry, there was an error uploading your file.</div>";
        }
    }
}
?>
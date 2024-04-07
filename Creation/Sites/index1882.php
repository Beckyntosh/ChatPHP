

<?php
$servername = "db";
$username = "root";
$password = "your_password_here"; // Replace with your MYSQL_ROOT_PSWD
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["spreadsheet"])) {
    $filename = $_FILES["spreadsheet"]["tmp_name"];
    if ($_FILES["spreadsheet"]["size"] > 0) {
        $file = fopen($filename, "r");

        // Skip the first line (headers)
        fgetcsv($file);

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO sales_data (quarter, camera_model, sales) VALUES (?, ?, ?)");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $quarter = $column[0];
            $camera_model = $column[1];
            $sales = $column[2];

            // Bind parameters and execute
            $stmt->bind_param("ssi", $quarter, $camera_model, $sales);
            $stmt->execute();
        }
        fclose($file);
        $stmt->close();
        echo "<script>alert('Data imported into the database.');</script>";
    }
}

// Create table if it does not exist
$tableQuery = "CREATE TABLE IF NOT EXISTS sales_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quarter VARCHAR(30) NOT NULL,
    camera_model VARCHAR(50) NOT NULL,
    sales INT(10) NOT NULL
)";
$conn->query($tableQuery);

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Sales Data - Camera Website</title>
    <style>
        body {
            background-color: #202020;
            font-family: Arial, sans-serif;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    <h2>Upload Sales Spreadsheet</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="spreadsheet" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>

This code snippet creates a basic form to upload CSV files and a PHP backend to parse the uploaded file and insert its data into a MySQL database. The SQL schema expects three fields (quarter, camera_model, sales) which should be represented in the CSV as well. Visual data representation and advanced web styling are not covered in this example as they would significantly complicate the code beyond a single-file approach and require additional client-side libraries or server-side processing not suited for this simplified format.

Remember, use of this code in its current form for real-world applications is not recommended without enhancements related to security, validation, and scalability.
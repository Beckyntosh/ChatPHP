

<?php
// Define MySQL connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create invoice table if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($tableCreationQuery)) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["invoiceFile"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["invoiceFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["invoiceFile"]["size"] > 500000) { // 500KB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["invoiceFile"]["tmp_name"], $targetFile)) {
            $filename = basename($_FILES["invoiceFile"]["name"]);
            $insertQuery = "INSERT INTO invoices (filename) VALUES ('$filename')";
            
            if ($conn->query($insertQuery) === TRUE) {
                echo "The file ". htmlspecialchars($filename). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Invoice</title>
</head>
<body>
    <h2>Upload Your Invoice</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select invoice to upload:
        <input type="file" name="invoiceFile" id="invoiceFile">
        <input type="submit" value="Upload Invoice" name="submit">
    </form>
</body>
</html>

**Note:** 

1. The PHP code attempts to create the `invoices` table if it does not already exist in the database.
2. It handles the file upload by checking if the file already exists, checking the file size, ensuring it's a PDF, and then moving the uploaded file to a designated directory.
3. You should NEVER use this code as is in a production environment because it does not adequately handle security concerns such as SQL injection or ensure proper authentication and authorization for file uploads.
4. Ensure the "uploads/" directory exists within your project directory, and your PHP server has write permissions for it.
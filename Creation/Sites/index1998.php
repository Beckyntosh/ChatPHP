<?php
// Set up error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish connection to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if POST request has been made
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed_extensions = array("psd" => "image/psd");
        $file_name = $_FILES["photo"]["name"];
        $file_type = $_FILES["photo"]["type"];
        $file_size = $_FILES["photo"]["size"];

        // Validate file extension
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        if (!array_key_exists($extension, $allowed_extensions)) die("Error: Please select a valid file format.");

        // Validate file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($file_size > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Validate type of the file
        if (in_array($file_type, $allowed_extensions)) {
            // Check whether upload directory exists; if not, create it
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            // Move the file to the upload directory
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $upload_dir . $file_name)) {
                // SQL query to insert file info into database
                $query = "INSERT INTO uploaded_photos (filename, size, type) VALUES (:filename, :size, :type)";
                $stmt = $pdo->prepare($query);

                // Bind parameters to statement
                $stmt->bindParam(':filename', $file_name, PDO::PARAM_STR);
                $stmt->bindParam(':size', $file_size, PDO::PARAM_INT);
                $stmt->bindParam(':type', $file_type, PDO::PARAM_STR);

                // Execute the statement
                if ($stmt->execute()) {
                    echo "File uploaded successfully.";
                } else {
                    echo "Error during file upload.";
                }
            } else {
                echo "Error uploading your file.";
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload your Landscape Photo</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .upload-wrapper { padding: 20px; background-color: #f4f4f4; margin: auto; width: 50%; }
        .submit-btn { padding: 10px 25px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        .submit-btn:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="upload-wrapper">
    <h2>Upload Landscape Photo for Enhancement</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="photoUpload">Select file:</label>
        <input type="file" name="photo" id="photoUpload">
        <input type="submit" value="Upload Photo" class="submit-btn">
    </form>
</div>
</body>
</html>

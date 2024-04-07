<?php
// Check if there's a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Database configuration
  $servername = "db";
  $username = "root";
  $password = "root";
  $dbname = "my_database";

  // Connect to database
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Check if file has been uploaded without any errors
  if (isset($_FILES['zip_file']) && $_FILES['zip_file']['error'] == 0) {
    $allowed = ['zip'];
    $fileName = $_FILES['zip_file']['name'];
    $fileTmpName = $_FILES['zip_file']['tmp_name'];
    $fileType = $_FILES['zip_file']['type'];
    $fileSize = $_FILES['zip_file']['size'];
    
    // Verify file extension
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
      echo "Error: Invalid file format. Only ZIP files are allowed.";
    } else {
      $newName = uniqid('', true) . "." . $ext;
      $uploadPath = 'uploads/' . $newName;

      if (move_uploaded_file($fileTmpName, $uploadPath)) {
        // Save file info into DB
        $stmt = $conn->prepare("INSERT INTO archived_files (name, path, size) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $fileName, $uploadPath, $fileSize);
        
        if ($stmt->execute()) {
          echo "The file has been uploaded and archived successfully.";
        } else {
          echo "Error: " . $stmt->error;
        }
        $stmt->close();
      } else {
        echo "Error uploading your file.";
      }
    }
  } else {
    echo "Error: " . $_FILES['zip_file']['error'];
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Baby Products Archive</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e6f7;
            color: #333;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            display: inline-block;
        }
        input[type="file"] {
            margin-top: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Baby Products Archive - Upload ZIP</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="zip_file" required>
            <input type="submit" value="Upload">
        </form>
    </div>
</body>
</html>

<?php
// Creating table if not exists
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "CREATE TABLE IF NOT EXISTS archived_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL,
    size INT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
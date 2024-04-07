<?php
// Handle MySQL connection
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

// Create table if it does not exist
$tableSql = "CREATE TABLE IF NOT EXISTS MedicalRecords (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  patientName VARCHAR(255) NOT NULL,
  recordFile VARCHAR(255) NOT NULL,
  uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableSql)) {
  die("Error creating table: " . $conn->error);
}

// File upload handling
$message = ''; // Empty message by default
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $patientName = $_POST['patientName'];
  $targetDir = "uploads/";
  $targetFile = $targetDir . basename($_FILES["recordFile"]["name"]);
  $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Check if file is a actual image or fake image
  if($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
    $message = "Sorry, only PDF, DOC & DOCX files are allowed.";
  } else {
    if (move_uploaded_file($_FILES["recordFile"]["tmp_name"], $targetFile)) {
      // Insert file information into database
      $sql = "INSERT INTO MedicalRecords (patientName, recordFile) VALUES (?, ?)";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ss", $patientName, $targetFile);
      
      if ($stmt->execute()) {
        $message = "The file ". htmlspecialchars(basename($_FILES["recordFile"]["name"])). " has been uploaded.";
      } else {
        $message = "Sorry, there was an error uploading your file.";
      }
      $stmt->close();
    } else {
      $message = "Sorry, there was an error uploading your file.";
    }
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Medical Records</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f3f3f3;
    text-align: center;
    padding: 50px;
  }
  .upload-form {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  input[type=file], input[type=text], button {
    margin: 10px 0;
  }
</style>
</head>
<body>

<h2>Medical Record Upload</h2>
<p>Please upload your medical records here.</p>

<div class="upload-form">
  <form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="patientName" placeholder="Patient Name" required><br>
    <input type="file" name="recordFile" required><br>
    <button type="submit">Upload Record</button>
  </form>
</div>

<p><?php echo $message ?></p>

</body>
</html>
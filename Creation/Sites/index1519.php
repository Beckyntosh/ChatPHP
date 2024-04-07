<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection variables
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

    // Create necessary tables if not exist
    $createTable = "CREATE TABLE IF NOT EXISTS immunization_records (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        patient_name VARCHAR(30) NOT NULL,
        patient_id VARCHAR(30) NOT NULL,
        immunization_record MEDIUMBLOB NOT NULL,
        record_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if (!$conn->query($createTable)) {
        echo "Error creating table: " . $conn->error;
    }

    $patientName = $_POST['patientName'];
    $patientID = $_POST['patientID'];
    $immunizationRecord = $_FILES['immunizationRecord']['tmp_name'];

    if (is_uploaded_file($immunizationRecord)) {
        $immunizationRecordData = addslashes(file_get_contents($immunizationRecord));

        $query = "INSERT INTO immunization_records (patient_name, patient_id, immunization_record) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $patientName, $patientID, $immunizationRecordData);

        if ($stmt->execute()) {
            echo "Record uploaded successfully.";
        } else {
            echo "Error uploading record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please upload a file.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Record Upload</title>
</head>
<body>
    <h2>Upload Immunization Record</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <label for="patientName">Patient Name:</label><br>
        <input type="text" id="patientName" name="patientName" required><br>
        <label for="patientID">Patient ID:</label><br>
        <input type="text" id="patientID" name="patientID" required><br>
        <label for="immunizationRecord">Immunization Record (only .pdf):</label><br>
        <input type="file" id="immunizationRecord" name="immunizationRecord" accept=".pdf" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>

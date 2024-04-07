<?php
// Simple invoicing system for illustrative purposes only. This is not secure or production-ready.
// WARNING: This script does not include sanitization or validation and is vulnerable to SQL injections among other security issues.

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

// Create invoices table if it doesn't exist
$tableQuery = "CREATE TABLE IF NOT EXISTS invoices (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    invoice_name VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

if (!$conn->query($tableQuery) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["invoiceFile"])) {
    $target_directory = "uploads/";
    $target_file = $target_directory . basename($_FILES["invoiceFile"]["name"]);
    $invoiceName = basename($_FILES["invoiceFile"]["name"]);
    
    if (move_uploaded_file($_FILES["invoiceFile"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["invoiceFile"]["name"])) . " has been uploaded.";
        
        // Save invoice information to database
        $stmt = $conn->prepare("INSERT INTO invoices (invoice_name) VALUES (?)");
        $stmt->bind_param("s", $invoiceName);
        $stmt->execute();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice Upload System</title>
</head>
<body>
    <h2>Upload Invoice</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select invoice to upload:
        <input type="file" name="invoiceFile" id="invoiceFile">
        <input type="submit" value="Upload Invoice" name="submit">
    </form>
    <h2>Uploaded Invoices</h2>
    <?php
    $sql = "SELECT id, invoice_name, upload_date FROM invoices";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row["invoice_name"]) . " uploaded on " . $row["upload_date"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No invoices uploaded yet.";
    }
    $conn->close();
    ?>
</body>
</html>

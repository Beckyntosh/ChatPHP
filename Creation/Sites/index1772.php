<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
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
    $sql = "CREATE TABLE IF NOT EXISTS invoices (
        id INT AUTO_INCREMENT PRIMARY KEY,
        invoice_name VARCHAR(255) NOT NULL,
        file_name VARCHAR(255) NOT NULL,
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if (!$conn->query($sql) === TRUE) {
        die("Error creating table: " . $conn->error);
    }

    // Process file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["invoiceFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["invoiceFile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "pdf" && $fileType != "jpg" && $fileType != "png" ) {
        echo "Sorry, only PDF, JPG & PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["invoiceFile"]["tmp_name"], $target_file)) {
            $invoiceName = $conn->real_escape_string($_POST['invoiceName']);
            $fileName = $conn->real_escape_string(basename($_FILES["invoiceFile"]["name"]));
            
            // Insert invoice data into database
            $sql = "INSERT INTO invoices (invoice_name, file_name) VALUES ('$invoiceName', '$fileName')";
            
            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars( basename( $_FILES["invoiceFile"]["name"])). " has been uploaded.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
        .container {
            width: 50%;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload Invoice</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="invoiceName">Invoice Name:</label>
        <input type="text" name="invoiceName" id="invoiceName" required><br><br>
        <label for="invoiceFile">Select file to upload:</label>
        <input type="file" name="invoiceFile" id="invoiceFile" required><br><br>
        <input type="submit" value="Upload Invoice" name="submit">
    </form>
</div>
</body>
</html>

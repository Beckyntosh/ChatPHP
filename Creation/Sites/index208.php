<?php
// Connect to Database
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

// Create invoice table if not exists
$sql = "CREATE TABLE IF NOT EXISTS invoices (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    invoice_date DATE NOT NULL,
    file_path VARCHAR(100),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['invoiceFile'])) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["invoiceFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Check if file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["invoiceFile"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["invoiceFile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["invoiceFile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["invoiceFile"]["name"])). " has been uploaded.";
            $title = $_POST["title"];
            $amount = $_POST["amount"];
            $invoice_date = $_POST["invoice_date"];
            $sql = "INSERT INTO invoices (title, amount, invoice_date, file_path) VALUES ('$title', '$amount', '$invoice_date', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>Invoice Upload Form</h2>

<form action="" method="post" enctype="multipart/form-data">
  Select invoice to upload:
  <input type="text" name="title" placeholder="Invoice Title" required><br>
  <input type="number" step="0.01" name="amount" placeholder="Amount" required><br>
  <input type="date" name="invoice_date" required><br>
  <input type="file" name="invoiceFile" id="invoiceFile" required>
  <input type="submit" value="Upload Invoice" name="submit">
</form>

</body>
</html>
<?php
$conn->close();
?>

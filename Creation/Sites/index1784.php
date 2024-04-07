<?php
// Simple Invoice Upload Script for Skateboards Website
// Connection parameters
$servername = "db";
$username = "root"; // Default username for MySQL
$password = "root"; // Specified in the query
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["invoice"]) && $_FILES["invoice"]["error"] == 0){
        $allowed = array("pdf" => "application/pdf"); // Allowed mime types
        $filename = $_FILES["invoice"]["name"];
        $filetype = $_FILES["invoice"]["type"];
        $filesize = $_FILES["invoice"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["invoice"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";

                // Add data into the invoice table
                $sql = "INSERT INTO invoices (filename, filetype, filesize) VALUES ('$filename', '$filetype', '$filesize')";
                if($conn->query($sql) === TRUE){
                    echo "File data stored in database successfully.";
                } else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["invoice"]["error"];
    }
}

// Create the invoices table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS invoices (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
filetype VARCHAR(255) NOT NULL,
filesize INT(10) NOT NULL,
uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Invoices created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload Service Invoice</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  Select invoice to upload:
  <input type="file" name="invoice" id="invoice">
  <input type="submit" value="Upload Invoice" name="submit">
</form>

</body>
</html>

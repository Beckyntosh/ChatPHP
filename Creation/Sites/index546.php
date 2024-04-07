<?php
// Database credentials and connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create images table if not exists
$sql = "CREATE TABLE IF NOT EXISTS images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    image_name VARCHAR(255),
    image_path VARCHAR(255),
    FOREIGN KEY (product_id) REFERENCES products(id)
);";

if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// File upload script
$uploadSuccess = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is an actual image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            $uploadSuccess = true;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // If upload was successful, save file information to database
    if ($uploadSuccess) {
        $product_id = $_POST['product_id']; // Assuming you're uploading images for a product
        $image_name = basename($_FILES["fileToUpload"]["name"]);
        $image_path = $targetFile;

        $stmt = $conn->prepare("INSERT INTO images (product_id, image_name, image_path) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $product_id, $image_name, $image_path);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Vintage Vogue Clothing Upload</title>
        <style>
            body {
                font-family: 'Times New Roman', Times, serif;
                background-color: #f4f4f4;
                color: #333;
            }
            .container {
                width: 80%;
                margin: auto;
                overflow: hidden;
            }
            header {
                background: #50a3a2;
                color: #fff;
                padding-top: 30px;
                min-height: 70px;
                border-bottom: #076570 3px solid;
            }
            header h1 {
                text-align: center;
                text-transform: uppercase;
                font-size: 24px;
            }
            form {
                margin-top: 20px;
                text-align: center;
            }
            input[type="file"] {
                margin: 20px auto;
            }
            input[type="submit"] {
                background: #50a3a2;
                color: #fff;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background: #076570;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="container">
                <h1>Vintage Vogue - Product Image Upload</h1>
            </div>
        </header>
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="product_id">Product ID:</label>
                <input type="text" name="product_id" id="product_id" required><br>
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
    </body>
</html>
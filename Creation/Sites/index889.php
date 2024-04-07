
<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlCommands = [
    "CREATE TABLE IF NOT EXISTS presentations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        file_path VARCHAR(255),
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );",
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT,
        productName VARCHAR(255),
        productPrice DECIMAL(10, 2),
        productDescription TEXT,
        image VARCHAR(255)
    );",
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );"
];

foreach ($sqlCommands as $sql) {
    if ($conn->query($sql) !== TRUE) {
        echo "Error executing SQL: " . $conn->error;
    }
}

$uploadSuccess = false;
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["presentation"])) {
        /* Add file upload code here */
    }

    if (isset($_POST["login"])) {
        /* Login code here */
    }

    if (isset($_POST["search"])) {
        /* Search code here */
    }

    if(isset($_POST["submit"]) && !isset($_FILES["presentation"])) {
        /* Fileupload code here */
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Combined Web Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F8F9FA;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }
        .form-upload {
            margin-top: 20px;
        }
        .submit-btn, #search_button, input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .submit-btn:hover, #search_button:hover, input[type=submit]:hover {
            background-color: #45a049;
        }
        #search_form {
            margin-top: 20px;
        }
        #search_box, input[type=email], input[type=password], input[type=text], input[type=number], textarea, input[type=file] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #333;
            border-radius: 5px;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
Add your HTML forms and presentation logic here
    </div>
</body>
</html>

This template provides a starting point by setting up a connection to a database and preparing SQL commands for creating necessary tables. However, it omits detailed functionality for specific forms or actions (like file uploading, login, sign-up, search, etc.) which you should implement based on your specific requirements.
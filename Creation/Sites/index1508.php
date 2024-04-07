<?php
// DB config
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for clients if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(30) NOT NULL,
    contact_name VARCHAR(30),
    contact_email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST['company_name'];
    $contact_name = $_POST['contact_name'];
    $contact_email = $_POST['contact_email'];
    
    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO clients (company_name, contact_name, contact_email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $company_name, $contact_name, $contact_email);
    
    // Execute statement
    if ($stmt->execute() === TRUE) {
        echo "New client added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Client to CRM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type=text], input[type=email] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .container {
            width: 50%;
            margin: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Client</h2>
    <form method="POST" action="index.php">
        <label for="company_name">Company Name</label>
        <input type="text" id="company_name" name="company_name" required>
        
        <label for="contact_name">Contact Name</label>
        <input type="text" id="contact_name" name="contact_name">
        
        <label for="contact_email">Contact Email</label>
        <input type="email" id="contact_email" name="contact_email">
        
        <input type="submit" value="Add Client">
    </form>
</div>

</body>
</html>

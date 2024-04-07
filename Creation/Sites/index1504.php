<?php

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connection parameters
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
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO clients (company_name, contact_name, contact_email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $companyName, $contactName, $contactEmail);
    
    // Set parameters and execute
    $companyName = $_POST['company_name'];
    $contactName = $_POST['contact_name'];
    $contactEmail = $_POST['contact_email'];
    
    $stmt->execute();
    
    echo "New client added successfully";
    
    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a Client to CRM</title>
    <style>
        body {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        .input-group {
            margin-bottom: 10px;
        }
        .input-group label {
            display: block;
            color: #666;
        }
        .input-group input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        .btn {
            background-color: #5a5a5a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #424242;
        }

    </style>
</head>
<body>

<h2>Add a New Client</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="input-group">
    <label for="company_name">Company Name:</label>
    <input type="text" id="company_name" name="company_name" required>
  </div>
  <div class="input-group">
    <label for="contact_name">Contact Name:</label>
    <input type="text" id="contact_name" name="contact_name" required>
  </div>
  <div class="input-group">
    <label for="contact_email">Contact Email:</label>
    <input type="email" id="contact_email" name="contact_email" required>
  </div>
  <button type="submit" class="btn">Add Client</button>
</form>

</body>
</html>


Note: To compile and deploy this code:
1. Ensure your MySQL server is running and accessible.
2. Create a new database named `my_database` if it doesn't already exist.
3. Under `my_database`, execute the following SQL statement to create the required table:

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    contact_name VARCHAR(255) NOT NULL,
    contact_email VARCHAR(255) NOT NULL
);

4. Modify the `$servername`, `$username`, `$password`, and `$dbname` variables if different from your setup.
5. Place the code in the web server's document root (e.g., for Apache, it's usually `htdocs` or `www` directory).
6. Access the application via a web browser by navigating to the localhost or server IP where the file is served.
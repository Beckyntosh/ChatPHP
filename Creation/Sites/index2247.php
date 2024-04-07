<?php
// Define MySQL connection parameters
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

// Connect to the database
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS product_updates (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
    //echo "Table product_updates created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    
    $sql = "INSERT INTO product_updates (firstname, lastname, email) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sss", $firstname, $lastname, $email);
    
    if ($stmt->execute()) {
        echo "<p>Thank you for signing up, $firstname!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up for Product Updates</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        }
        input[type=text], input[type=email] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up for Product Updates</h2>
        <p>Please fill in this form to receive notifications about new product releases.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>
            
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>

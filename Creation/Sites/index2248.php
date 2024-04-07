<?php
// Handle the post request from the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = 'db';
    $username = 'root';
    $password = 'root';
    $dbname = 'my_database';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Receive and filter input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM product_updates WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Email doesn't exist, proceed with insert
        $sql = "INSERT INTO product_updates (email) VALUES (?)";

        // Prepare and bind
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);

        // Set parameters and execute
        if ($stmt->execute()) {
            $message = "You have successfully signed up for product updates!";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "This email is already subscribed.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for Product Update Notifications - Baby Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="email"], button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .message {
            color: #31708f;
            background-color: #d9edf7;
            border-color: #bce8f1;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<h2>Sign Up for Product Updates</h2>
<?php
if (isset($message)) {
    echo "<div class='message'>" . $message . "</div>";
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Subscribe</button>
</form>

</body>
</html>

<?php
// Script to create table if not exists
$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS product_updates (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

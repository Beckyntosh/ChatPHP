<?php
// Handle the POST request from the signup form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
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

    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO product_updates (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    // Set parameters and execute
    $email = $_POST["email"];
    $stmt->execute();

    echo "Signup successful!";

    $stmt->close();
    $conn->close();
} else {
    // HTML Form for signing up for product updates
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Signup for Product Updates</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #080808;
                color: #00FF00;
            }
            .container {
                width: 400px;
                margin: 100px auto;
                padding: 20px;
            }
            input[type="email"], input[type="submit"] {
                width: calc(100% - 22px);
                padding: 10px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #0F0;
                box-sizing: border-box;
                background-color: #000;
                color: #0F0;
            }
            input[type="submit"] {
                cursor: pointer;
            }
            input[type="email"]:focus, input[type="submit"]:hover {
                border-color: #00FF00;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Signup for Laptop Product Updates</h2>
            <form action="" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <input type="submit" value="Sign Up">
            </form>
        </div>
    </body>
    </html>
<?php
}
?>

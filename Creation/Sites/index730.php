<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Payment Gateway Integration (Example using a fictional payment gateway)
require_once 'path/to/payment/gateway/sdk.php'; // Replace with actual SDK path

// Payment Gateway settings
$gateway = new PaymentGateway();
$gateway->setApiKey("your_api_key");

// Process payment
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    $token = $_POST['token']; // Payment token generated by the payment gateway

    try {
        $response = $gateway->charge($amount, $token);

        if ($response->isSuccessful()) {
            // Payment was successful
            $userId = $_POST['user_id'];
            $productId = $_POST['product_id'];

            // Insert transaction into the database
            $stmt = $conn->prepare("INSERT INTO transactions (user_id, product_id, amount) VALUES (?, ?, ?)");
            $stmt->bind_param("iid", $userId, $productId, $amount);
            $stmt->execute();
            $stmt->close();

            echo "Payment Successful";
        } else {
            // Payment failed
            echo "Payment Failed: " . $response->getMessage();
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// HTML for payment form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Sharing Site - Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff3e6;
            color: #333;
            text-align: center;
            padding: 20px;
        }
        .container {
            background-color: #ffecd2;
            border-radius: 15px;
            padding: 20px;
            width: 300px;
            margin: auto;
        }
        input[type="number"], button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        button {
            background-color: #ffd700;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pay for Image</h2>
        <form action="" method="post">
            <input type="number" name="amount" placeholder="Amount" required>
Replace with actual token
Replace with actual user ID
Replace with actual product ID
            <button type="submit">Pay Now</button>
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>

<?php
// Connection variables
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

// Create the expenses table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO expenses (category, amount) VALUES ('$category', '$amount')";

    if ($conn->query($sql) === TRUE) {
        $message = "New expense added successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            max-width: 500px;
            margin: auto;
        }
        h2 {
            color: #676767;
        }
        label {
            color: #676767;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            color: #28A745;
            margin-top: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Expense to Personal Budget</h2>
    <form action="" method="post">
        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="Food">Food</option>
            <option value="Hair Care Products">Hair Care Products</option>
        </select>

        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" min="0" required="required">

        <input type="submit" value="Add Expense">
    </form>
    <?php if (!empty($message)): ?>
    <div class="message"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
</div>
</body>
</html>

<?php $conn->close(); ?>

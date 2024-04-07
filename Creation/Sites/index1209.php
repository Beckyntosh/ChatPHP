<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['amount']) && isset($_POST['category'])) {
    // Connection info
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
    $stmt = $conn->prepare("INSERT INTO expenses (amount, category) VALUES (?, ?)");
    $stmt->bind_param("is", $amount, $category);

    // Set parameters and execute
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $stmt->execute();

    echo "New record created successfully";

    $stmt->close();
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Expense to Personal Budget</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 70%;
            margin: 0 auto;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 300px;
        }

        form input,
        form select,
        form button {
            margin: 10px 0;
            padding: 10px;
        }

        header {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <h1>Add Expense</h1>
    </header>
    <form method="post">
        <input type="number" name="amount" required placeholder="Amount ($)" step="0.01">
        <select name="category" required>
            <option value="">--Select Category--</option>
            <option value="Food">Food</option>
            <option value="Clothing">Clothing</option>
            <option value="Utilities">Utilities</option>
            <option value="Jewelry">Jewelry</option>
            <option value="Others">Others</option>
        </select>
        <button type="submit">Add Expense</button>
    </form>
</div>
</body>
</html>

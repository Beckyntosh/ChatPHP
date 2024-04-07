<?php

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

// Create expense table if not exists
$sql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    description VARCHAR(255),
    expense_date DATE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if($conn->query($sql) === TRUE) {
    //echo "Table expenses created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle Expense Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $expense_date = $_POST['expense_date'];

    $stmt = $conn->prepare("INSERT INTO expenses (category, amount, description, expense_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdsd", $category, $amount, $description, $expense_date);

    if ($stmt->execute() === TRUE) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; }
        input, select { width: 100%; margin-bottom: 20px; padding: 10px; }
        button { padding: 10px; width: 100%; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Expense</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="category">Category</label>
        <select id="category" name="category" required>
            <option value="">--Select--</option>
            <option value="Equipment">Equipment</option>
            <option value="Membership">Membership</option>
            <option value="Clothing">Clothing</option>
            <option value="Travel">Travel</option>
            <option value="Miscellaneous">Miscellaneous</option>
        </select>

        <label for="amount">Amount</label>
        <input type="number" id="amount" name="amount" step="0.01" required>

        <label for="description">Description</label>
        <input type="text" id="description" name="description">

        <label for="expense_date">Date</label>
        <input type="date" id="expense_date" name="expense_date" required>

        <button type="submit">Add Expense</button>
    </form>
</div>

</body>
</html>
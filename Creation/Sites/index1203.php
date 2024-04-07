<!DOCTYPE html>
<html>
<head>
    <title>Add Expense to Personal Budget</title>
</head>
<body>
    <h2>Add Expense</h2>
    <form method="POST">
        Amount: <input type="number" step="0.01" name="amount" required><br><br>
        Category:
        <select name="category">
            <option value="Food">Food</option>
            <option value="Utilities">Utilities</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Board Games">Board Games</option>
Add more categories as needed
        </select><br><br>
        Description: <input type="text" name="description" required><br><br>
        <input type="submit" name="submit" value="Add Expense">
    </form>

    <?php
    if(isset($_POST['submit'])) {
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

        $amount = $_POST['amount'];
        $category = $_POST['category'];
        $description = $_POST['description'];

        $sql = "INSERT INTO expenses (amount, category, description) VALUES ('$amount', '$category', '$description')";

        if ($conn->query($sql) === TRUE) {
            echo "New expense added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    // Creating table if it doesn't exist
    $conn = new mysqli($servername, $username, $password, $dbname);
    $createTable = "CREATE TABLE IF NOT EXISTS expenses (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        amount FLOAT(10,2) NOT NULL,
        category VARCHAR(30) NOT NULL,
        description TEXT NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTable) === TRUE) {
        echo "Table 'expenses' created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
    ?>
</body>
</html>

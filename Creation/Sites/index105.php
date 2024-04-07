<?php
// Define database connection parameters
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

//Attempt to connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Create expense table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$mysqli->query($sql)) {
    echo "Error creating table: " . $mysqli->error;
}

// Handle POST request to add an expense
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["amount"], $_POST["category"], $_POST["description"])){
    $category = $mysqli->real_escape_string(trim($_POST["category"]));
    $amount = $mysqli->real_escape_string(trim($_POST["amount"]));
    $description = $mysqli->real_escape_string(trim($_POST["description"]));

    $sql = "INSERT INTO expenses (category, amount, description) VALUES (?, ?, ?)";

    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("sds", $category, $amount, $description);

        if($stmt->execute()){
            echo "Expense added successfully.";
        } else{
            echo "Error: Could not execute $sql. " . $mysqli->error;
        }
        $stmt->close();
    }
}
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense to Personal Budget</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f2f2; color: #333; }
        .container { max-width: 600px; margin: 50px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; margin-bottom: 20px; }
        form { display: flex; flex-wrap: wrap; justify-content: space-between; }
        label, input, select { width: 100%; margin-bottom: 15px; }
        input[type="text"], input[type="number"], select { padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        input[type="submit"] { width: auto; padding: 10px 20px; background: #5cb85c; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background: #4cae4c; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Expense</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="category">Category:</label>
            <select name="category" id="category" required>
                <option value="Food">Food</option>
                <option value="Utilities">Utilities</option>
                <option value="Transport">Transport</option>
                <option value="Clothing">Clothing</option>
                <option value="Shoes">Shoes</option>
            </select>

            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" step="any" required>

            <label for="description">Description:</label>
            <input type="text" name="description" id="description">

            <input type="submit" value="Add Expense">
        </form>
    </div>
</body>
</html>
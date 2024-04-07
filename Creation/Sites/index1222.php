<?php
// MySQL connection
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table expenses created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert data
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["category"]) && !empty($_POST["amount"])) {
    $category = $_POST["category"];
    $amount = $_POST["amount"];

    $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
    $stmt->bind_param("sd", $category, $amount);
    
    if($stmt->execute()){
        echo "<script>alert('Expense added successfully!');</script>";
    } else{
        echo "<script>alert('Error: could not add expense.');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Expense to Personal Budget</title>
<style>
    body{ font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
    .container{ background: #fff; padding: 20px; max-width: 400px; margin: auto; }
    form{ display: flex; flex-direction: column; }
    label{ margin-top: 10px; }
    input, select{ padding: 10px; margin-top: 5px; }
    button{ margin-top: 20px; padding: 10px; background-color: #007bff; color: white; border: none; cursor: pointer; }
    button:hover{ background-color: #0056b3; }
</style>
</head>
<body>
<div class="container">
    <h2>Add Expense</h2>
    <form method="post" action="">
        <label for="category">Category</label>
        <select id="category" name="category">
            <option value="Food">Food</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Utilities">Utilities</option>
            <option value="Miscellaneous">Miscellaneous</option>
        </select>
        <label for="amount">Amount</label>
        <input type="number" step="0.01" name="amount" id="amount" required>
        <button type="submit">Add Expense</button>
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>

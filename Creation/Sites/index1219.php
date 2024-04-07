<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Expense to Personal Budget</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        input[type=text], select, input[type=number] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        div.container {
            border-radius: 5px;
            background-color: #ffffff;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Expense to Personal Budget</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="amount">Amount</label>
        <input type="number" id="amount" name="amount" placeholder="Enter amount...">
        
        <label for="category">Category</label>
        <select id="category" name="category">
            <option value="food">Food</option>
            <option value="art_supplies">Art Supplies</option>
            <option value="utilities">Utilities</option>
            <option value="other">Other</option>
        </select>
        
        <input type="submit" name="submit" value="Add Expense">
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $amount = $_POST['amount'];
    $category = $_POST['category'];
    
    $sql = "INSERT INTO expenses (category, amount)
    VALUES ('$category', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='text-align: center;'><p>New record created successfully</p></div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

</body>
</html>

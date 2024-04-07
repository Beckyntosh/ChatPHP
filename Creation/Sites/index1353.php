<!DOCTYPE html>
<html>
<head>
    <title>Custom Bicycle Order</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; }
        input[type="text"], select { width: 100%; padding: 8px; margin: 5px 0 10px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
  <h2>Custom Bicycle Order Form</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="customerName">Name:</label>
      <input type="text" id="customerName" name="customerName" placeholder="Your name..">
    </div>
    <div class="form-group">
      <label for="bicycleType">Type of Bicycle:</label>
      <select id="bicycleType" name="bicycleType">
        <option value="mountain">Mountain Bike</option>
        <option value="road">Road Bike</option>
        <option value="hybrid">Hybrid Bike</option>
        <option value="custom">Custom Size</option>
      </select>
    </div>
    <div class="form-group">
      <label for="customSize">Custom Size (if applicable):</label>
      <input type="text" id="customSize" name="customSize" placeholder="e.g., 26 inches frame">
    </div>
    <input type="submit" value="Submit">
  </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Prepare an insert statement
    $sql = $conn->prepare("INSERT INTO custom_orders (customerName, bicycleType, customSize) VALUES (?, ?, ?)");

    // Bind variables to the prepared statement as parameters
    $sql->bind_param("sss", $customerName, $bicycleType, $customSize);
    
    // Set parameters and execute
    $customerName = $_POST['customerName'];
    $bicycleType = $_POST['bicycleType'];
    $customSize = $_POST['customSize'];

    if ($sql->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql->error;
    }
    
    $sql->close();
    $conn->close();
}

?>

</body>
</html>

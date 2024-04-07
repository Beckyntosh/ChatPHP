<?php
// Define variables and initialize with empty values
$product_type = $custom_size = "";
$product_type_err = $custom_size_err = "";

// Connecting to the database
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

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if product type is empty
    if(empty(trim($_POST["product_type"]))){
        $product_type_err = "Please enter a product type.";
    } else{
        $product_type = trim($_POST["product_type"]);
    }
    
    // Check if custom size is empty
    if(empty(trim($_POST["custom_size"]))){
        $custom_size_err = "Please enter a custom size.";
    } else{
        $custom_size = trim($_POST["custom_size"]);
    }
    
    // Check input errors before inserting in database
    if(empty($product_type_err) && empty($custom_size_err)){
        $sql = "INSERT INTO orders (product_type, custom_size) VALUES (?, ?)";
        
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("ss", $param_product_type, $param_custom_size);
            
            // Set parameters
            $param_product_type = $product_type;
            $param_custom_size = $custom_size;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "Order placed successfully.";
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Order</title>
    <style>
        .wrapper{ width: 350px; padding: 20px; }
        .error{ color: red; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Add Order</h2>
        <p>Please fill this form to add an order.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Product Type</label>
                <input type="text" name="product_type" class="form-control <?php echo (!empty($product_type_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_type; ?>">
                <span class="error"><?php echo $product_type_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Custom Size</label>
                <input type="text" name="custom_size" class="form-control <?php echo (!empty($custom_size_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $custom_size; ?>">
                <span class="error"><?php echo $custom_size_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>

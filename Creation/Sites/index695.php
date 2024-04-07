<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Define variables and initialize with empty values
$search = "";
$search_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["search"]))){
        $search_err = "Please enter a search query.";
    } else{
        $search = trim($_POST["search"]);
    }
    
    // Check input errors before inserting in database
    if(empty($search_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM products WHERE name LIKE :search OR description LIKE :search";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":search", $param_search, PDO::PARAM_STR);
            
            // Set parameters
            $param_search = "%$search%";
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if any products were found
                if($stmt->rowCount() > 0){
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } else{
                    $search_err = "No products found matching your query.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search in Kitchenware Archive</title>
<style>
    body { background-color: #0a0b1d; font-family: Arial, sans-serif; color: #d1d4da; }
    .wrapper { width: 350px; padding: 20px; margin: auto; background-color: #16172b; border-radius: 5px; }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; margin-bottom: 5px; }
    .form-group input[type="text"] { width: 100%; padding: 10px; border-radius: 5px; border: none; }
    .btn { padding: 10px 20px; background-color: #3c3f5c; border: none; border-radius: 5px; color: white; cursor: pointer; }
    .btn:hover { background-color: #545772; }
    .error { color: #ff3860; }
</style>
</head>
<body>
    <div class="wrapper">
        <h2>Search for Kitchenware</h2>
        <p>Please enter your search query below.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($search_err)) ? 'has-error' : ''; ?>">
                <label>Search</label>
                <input type="text" name="search" class="form-control" value="<?php echo $search; ?>">
                <span class="error"><?php echo $search_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Search">
            </div>
        </form>
    </div>    
    
<?php if(isset($results)): ?>
    <div style="padding: 20px; margin: auto; background-color: #16172b; border-radius: 5px; width: 80%;">
        <h2>Search Results</h2>
        <?php foreach($results as $row): ?>
            <p><?php echo htmlspecialchars($row["name"]); ?> - $<?php echo htmlspecialchars($row["price"]); ?> (In Stock: <?php echo htmlspecialchars($row["stock_quantity"]); ?>)</p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</body>
</html>
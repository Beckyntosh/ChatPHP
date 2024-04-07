<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection variables
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Encryption key (Should be stored/set more securely in real applications)
    $encryption_key = "my_secret_key";
    $ciphering = "AES-128-CTR";
    
    // Options for encryption
    $encryption_options = 0;
    
    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1234567891011121';
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Encrypt the message
    $encryptedMessage = openssl_encrypt(
        $_POST["message"], 
        $ciphering, 
        $encryption_key,
        $encryption_options, 
        $encryption_iv
    );

    // Prepare SQL query
    $stmt = $conn->prepare("INSERT INTO user_feedback (encrypted_message) VALUES (?)");
    $stmt->bind_param("s", $encryptedMessage);
    
    // Execute the query
    if ($stmt->execute() === TRUE) {
        echo "Message received. Thank you!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<h2>Feedback Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Message: <textarea name="message" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
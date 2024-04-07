<?php
// Handle POST request for adding a client
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

    $clientName = $_POST['clientName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $interactionLog = $_POST['interactionLog'];

    // Insert new client
    $sql = "INSERT INTO clients (clientName, email, phone, address, interactionLog)
    VALUES ('$clientName', '$email', '$phone', '$address', '$interactionLog')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Client added successfully</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add a Client to CRM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fdf6e3;
            color: #586e75;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #eee8d5;
            border-radius: 8px;
        }
        input[type=text], input[type=email], textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #859900;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #657b83;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Client</h2>
    <form action="" method="post">
        <label for="clientName">Client Name</label>
        <input type="text" id="clientName" name="clientName" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone">

        <label for="address">Address</label>
        <input type="text" id="address" name="address">

        <label for="interactionLog">Interaction Log</label>
        <textarea id="interactionLog" name="interactionLog" rows="4"></textarea>

        <input type="submit" value="Add Client">
    </form>
</div>

</body>
</html>
<?php
// Assuming the setup code for creating the necessary database and table is not requested per guidelines.
// Normally, you'd want to ensure your database and 'clients' table are set up prior to using this code.
?>
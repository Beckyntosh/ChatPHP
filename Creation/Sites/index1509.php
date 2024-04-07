<!DOCTYPE html>
<html>
<head>
    <title>Add Client to CRM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #282c34;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .container {
            margin-top: 50px;
        }
        input, button {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: none;
        }
        input {
            width: 200px;
        }
        button {
            background-color: #61dafb;
            cursor: pointer;
        }
        .message {
            color: #61dafb;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a New Client</h2>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Client Name" required /><br>
            <input type="email" name="email" placeholder="Contact Email" required /><br>
            <input type="text" name="phone" placeholder="Contact Phone" required /><br>
            <button type="submit" name="submit">Add Client</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $servername = "db";
            $username = "root";
            $password = "root";
            $dbname = "my_database";

            // Creating connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);

            // Attempt to create table if not exists
            $sql = "CREATE TABLE IF NOT EXISTS clients (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                phone VARCHAR(255) NOT NULL,
                reg_date TIMESTAMP
            )";

            if ($conn->query($sql) === TRUE) {
                // Insert the new client
                $sql = "INSERT INTO clients (name, email, phone) VALUES ('$name', '$email', '$phone')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='message'>New client added successfully</p>";
                } else {
                    echo "<p class='message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            } else {
                echo "<p class='message'>Error creating table: " . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>

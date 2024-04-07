<?php
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

   echo "Connected successfully";
?>
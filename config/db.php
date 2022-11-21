<?php
    $servername = "localhost";
    $username = "c3_testuser";
    $password = "testuser";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=c3_hr", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
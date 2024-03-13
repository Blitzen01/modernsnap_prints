<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "modernsnap_prints";
    
    $conn = mysqli_connect($server, $user, $pass, $db);
    
    if (!$conn) {
        die("connection error " . mysqli_connect_error());
    }
    
    try {
        $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
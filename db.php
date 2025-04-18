<?php
$host = "localhost";
<<<<<<< HEAD
$dbname = "library";
$user = "root";
$pass = "";
=======
$dbname = "library"; 
$user = "root";
$pass = ""; 
>>>>>>> 49efa69f8caef2040a8c2c6238241c310caefc2b

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
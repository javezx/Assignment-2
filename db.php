<?php
// SIMPLE DATABASE CONNECTION
$host = 'localhost';
$db_username = 'root';
$db_password = '';
$database = 'brainboosters';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<?php
// Load environment variables
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database credentials from form (or directly from environment variables)
$region = $_POST['region'] ?? $_ENV['DB_REGION'];
$keyspace = $_POST['keyspace'] ?? $_ENV['DB_KEYSPACE'];
$token = $_POST['token'] ?? $_ENV['DB_TOKEN'];

// Example database connection code
// This will vary depending on your database type (MySQL, PostgreSQL, etc.)
try {
    // Example for a MySQL database
    $pdo = new PDO("mysql:host=your_host;dbname=$keyspace", 'your_username', 'your_password');
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
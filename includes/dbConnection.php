<?php
$host = "localhost";
$db = "CAT1";
$user = "root";
$pass = "";
$port = "3306";

$dsn = "mysql:host=$host;dbname=$db;port=$port";
$opt = [
PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
PDO::ATTR_EMULATE_PREPARES =>false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $opt);
    echo "Connected to the database successfully!";
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
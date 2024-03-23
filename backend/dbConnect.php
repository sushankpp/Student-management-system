<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'demo';
// $encoding = 'utf8mb4';

// try {
//     $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
//     $output = 'Database Connection have been established';
// } catch (PDOException $exception) {
//     $output = 'An exception have occurred with ' . $exception->getMessage(). 'in line number ' . $exception->getLine();
// }


$connection = mysqli_connect($servername, $username, $password, $database);


?>
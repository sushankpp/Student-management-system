<?php

if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location: ../index.php');
}


function db_connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sm";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}


?>
<?php



// try {
//     $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
//     $output = 'Database Connection have been established';
// } catch (PDOException $exception) {
//     $output = 'An exception have occurred with ' . $exception->getMessage(). 'in line number ' . $exception->getLine();
// }

function db_connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sms";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}


?>
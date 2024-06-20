<?php

include 'dbConnect.php';

$connection = db_connect();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'get_courses':
            $query = "SELECT * FROM course";
            $result = mysqli_query($connection, $query);
            $courses = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $courses[] = $row;
            }
            echo json_encode($courses);
            break;
    }

}
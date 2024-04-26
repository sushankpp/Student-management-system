<?php
include ('dbConnect.php');

header('Content-Type: application/json', true, 200);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'showResult':
                $recentlyAdded = 'SELECT * FROM student ORDER BY ID DESC';
                // $recentlyAdded = 'SELECT * FROM student';
                $result = mysqli_query($connection, $recentlyAdded);

                $recentlyAddedStudents = array();

                while ($row = mysqli_fetch_assoc($result)) {
                    $recentlyAddedStudents[] = $row;
                }
                echo json_encode(['success' => true, 'message' => $recentlyAddedStudents]);
                break;
        }
    }

}
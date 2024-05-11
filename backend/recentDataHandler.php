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

                // Get total student count
                $total = "SELECT COUNT(*) AS total FROM student";
                $totalResult = $connection->query($total);

                if ($totalResult) {
                    $totalStd = $totalResult->fetch_assoc()["total"];
                } else {
                    // Handle error
                    echo json_encode(['success' => false, 'message' => 'Error fetching total students']);
                    exit;
                }

                // Get male and female student counts (assuming gender column is 'Male' or 'Female')
                $male = "SELECT SUM(CASE WHEN gender = 'Male' THEN 1 ELSE 0 END) AS male FROM student";
                $maleResult = $connection->query($male);

                if ($maleResult) {
                    $maleCount = $maleResult->fetch_assoc()["male"];
                } else {
                    // Handle error
                    echo json_encode(['success' => false, 'message' => 'Error fetching male count']);
                    exit;
                }

                $female = "SELECT SUM(CASE WHEN gender = 'Female' THEN 1 ELSE 0 END) AS female FROM student";
                $femaleResult = $connection->query($female);

                if ($femaleResult) {
                    $femaleCount = $femaleResult->fetch_assoc()["female"];
                } else {
                    // Handle error
                    echo json_encode(['success' => false, 'message' => 'Error fetching female count']);
                    exit;
                }

                $recentlyAddedStudents = array();

                while ($row = mysqli_fetch_assoc($result)) {
                    $recentlyAddedStudents[] = $row;
                }
                echo json_encode(['success' => true, 'message' => $recentlyAddedStudents, 'total' => $totalStd, 'maleCount' => $maleCount, 'femaleCount' => $femaleCount]);
                break;

            case 'showTeachers':
                // Get total student count
                $total = "SELECT COUNT(*) AS total FROM teachers";
                $totalResult = $connection->query($total);

                if ($totalResult) {
                    $totalTeach = $totalResult->fetch_assoc()["total"];
                } else {
                    // Handle error
                    echo json_encode(['success' => false, 'message' => 'Error fetching total students']);
                    exit;
                }

                // Get male and female student counts (assuming gender column is 'Male' or 'Female')
                $male = "SELECT SUM(CASE WHEN gender = 'male' THEN 1 ELSE 0 END) AS male FROM teachers";
                $maleResult = $connection->query($male);

                if ($maleResult) {
                    $maleCount = $maleResult->fetch_assoc()["male"];
                } else {
                    // Handle error
                    echo json_encode(['success' => false, 'message' => 'Error fetching male count']);
                    exit;
                }

                $female = "SELECT SUM(CASE WHEN gender = 'female' THEN 1 ELSE 0 END) AS female FROM teachers";
                $femaleResult = $connection->query($female);

                if ($femaleResult) {
                    $femaleCount = $femaleResult->fetch_assoc()["female"];
                } else {
                    // Handle error
                    echo json_encode(['success' => false, 'message' => 'Error fetching female count']);
                    exit;
                }
                echo json_encode(['success' => true , 'total' => $totalTeach, 'maleCount' => $maleCount, 'femaleCount' => $femaleCount]);
                break;
        }
    }

}
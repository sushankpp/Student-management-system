<?php
include ('dbConnect.php');

header('Content-Type: application/json', true, 200);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'showResult':

                // print_r($_POST);

                $sql = "SELECT * FROM student";
                $stmt = $connection->prepare($sql);
                $stmt->execute();

                $result = $stmt->get_result();
                $data = [];
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }

                echo json_encode(['success' => true, 'data' => $data]);
                break;

                /* if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Student updated successfully']);
                    break;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($connection)]);
                    break;
                } */
        }
    }
}


<?php
include 'dbConnect.php';

header('Content-Type: application/json', true, 200);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'sendDataToDb':
                // Access user input (assuming form fields named "title" and "body")
                $title = trim($_POST['title']);  // Trim leading/trailing whitespace
                $content = $_POST['body'];

               

                $sql = "INSERT INTO notice (BodyText, Title) VALUES (?, ?)";
                $stmt = $connection->prepare($sql);

                $stmt->bind_param('ss', $content, $title);

                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Notice posted successfully']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($connection)]);
                }

                break;

            case 'getNotice':
                $sql = "SELECT * FROM notice ORDER BY  DateTime desc";  // Retrieve all columns (adjust if needed)

                $res = $connection->query($sql);

                $notices = [];
                while ($row = $res->fetch_assoc()) {
                    $notices[] = $row;
                }

                echo json_encode([
                    'success' => true,
                    'message' => 'Notices retrieved successfully',
                    'notices' => $notices,
                ]);

                break;
        }
    }
}

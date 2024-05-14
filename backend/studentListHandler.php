<?php
include 'dbConnect.php';

class StudentController
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function handleRequest()
    {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST['action'])) {
                $action = $_POST['action'];
                switch ($action) {
                    case 'edit':
                        $this->editStudent();
                        break;
                    case 'delete':
                        $this->deleteStudent();
                        break;
                    case 'showStudents':
                        $this->showStudents();
                        break;
                    case 'increaseAttendance':
                        $this->increaseAttendance();
                        break;
                    default:
                        echo json_encode(['success' => false, 'message' => 'Invalid action']);
                        break;
                }
            }
        }
    }



    private function editStudent()
    {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $department = $_POST['department'];
        $address = $_POST['address'];

        $sql = "UPDATE student SET first_name = ?, last_name = ?, email = ?, gender = ?, department = ?, address=? WHERE ID = ?";
        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param('ssssssi', $first_name, $last_name, $email, $gender, $department, $address, $id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Student updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
        }
    }

    private function deleteStudent()
    {
        $id = $_POST['id'];

        $sql = 'DELETE FROM student WHERE ID = ?';
        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Student deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
        }
    }

    private function showStudents()
    {
        $gender = $_POST['gender'];
        $department = $_POST['department'];
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $limit = isset($_POST['limit']) ? $_POST['limit'] : 8;
        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM student";
        $countSql = "SELECT COUNT(*) as total FROM student"; // New query to count total students

        $conditions = [];
        if ($gender != '' && $gender != 'All' && $gender != 'Gender') {
            $conditions[] = "gender = '$gender'";
        }
        if ($department != '' && $department != 'All' && $department != 'Department') {
            $conditions[] = "department = '$department'";
        }
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
            $countSql .= " WHERE " . implode(" AND ", $conditions); // Add conditions to the count query
        }

        $sql .= " LIMIT $limit OFFSET $offset";

        $res = $this->connection->query($sql);
        $countRes = $this->connection->query($countSql); // Execute the count query

        $students = array();

        while ($row = $res->fetch_assoc()) {
            $students[] = $row;
        }

        $total = 0;
        if ($countRow = $countRes->fetch_assoc()) {
            $total = $countRow['total']; // Get the total count from the count query result
        }

        echo json_encode(['success' => true, 'students' => $students, 'total' => $total]); // Include total in the response
    }


    private function increaseAttendance()
    {
        $checkedIds = $_POST['checkedIds']; // Assuming this is sent from the front end
        if (!is_array($checkedIds)) {
            $checkedIds = explode(',', $checkedIds); // Convert string to array
        }
        $sql = "UPDATE student SET attendance = attendance + 1 WHERE ID IN (" . implode(",", $checkedIds) . ")";
        if ($this->connection->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Attendance updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . $this->connection->error]);
        }
    }
}

$connection = db_connect();



// Instantiate StudentController
$studentController = new StudentController($connection);

// Handle request
$studentController->handleRequest();



?>
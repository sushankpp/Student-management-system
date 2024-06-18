<?php
include 'dbConnect.php';


class TeacherController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function handleRequest()
    {
        header('Content-Type: application/json', true, 200);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST['action'])) {
                $action = $_POST['action'];
                switch ($action) {
                    case 'edit':
                        $this->editTeacher();
                        break;
                    case 'delete':
                        $this->deleteTeacher();
                        break;
                    case 'showTeachers':
                        $this->showTeachers();
                        break;
                }
            }
        }
    }

    private function editTeacher()
    {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $department = $_POST['department'];
        $address = $_POST['address'];

        $sql = "UPDATE teachers SET first_name = ?, last_name =?, email = ?, gender =?, department =?, address=? WHERE Id = ?";
        $stmt = $this->db->prepare($sql);

        $stmt->bind_param('ssssssi', $first_name, $last_name, $email, $gender, $department, $address, $id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Teacher data updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($this->db)]);
        }
    }

    private function deleteTeacher()
    {
        $id = $_POST['id'];

        $sql = 'DELETE FROM teachers WHERE Id =?';
        $stmt = $this->db->prepare($sql);

        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Teacher data deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($this->db)]);
        }
    }

    private function showTeachers()
    {
        $gender = $_POST['gender'];
        $department = $_POST['department'];

        $sql = "SELECT * FROM teachers";

        $conditions = [];
        if ($gender != '' && $gender != 'All' && $gender != 'Gender') {
            $conditions[] = "gender = '$gender'";
        }

        if ($department != '' && $department != 'All' && $department != 'Department') {
            $conditions[] = "department = '$department'";
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $res = $this->db->query($sql);
        $teachers = array();

        while ($row = $res->fetch_assoc()) {
            $teachers[] = $row;
        }

        echo json_encode(['success' => true, 'teachers' => $teachers, 'total' => count($teachers)]);
    }
}

$db = db_connect();

// Instantiate TeacherController
$teacherController = new TeacherController($db);

// Handle request
$teacherController->handleRequest();

?>
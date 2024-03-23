<?php
include('dbConnect.php');
$total = mysqli_query($connection, 'SELECT COUNT(*) as total FROM student')->fetch_assoc()['total'];
/*$perPage = 8;
$pages = ceil($total / $perPage);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $perPage;

$sql = "SELECT * FROM student LIMIT {$start}, {$perPage}";
$result = mysqli_query($connection, $sql);

$students = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }
} else {
    $students = "no data found";
}*/

header('Content-Type: application/json', true, 200);


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case'edit':
                $id = $_POST['id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $department = $_POST['department'];
                $address = $_POST['address'];

                $sql = "UPDATE student SET first_name = ?, last_name = ?, email = ?, gender = ?, department = ? WHERE ID = ?";
                $stmt = $connection->prepare($sql);

                $stmt->bind_param('sssssi', $first_name, $last_name, $email, $gender, $department, $id);

                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Student updated successfully']);
                    break;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($connection)]);
                    break;
                }


            case'delete':
                $id = $_POST['id'];

                $sql = 'DELETE FROM student WHERE ID = ?';
                $stmt = $connection->prepare($sql);

                $stmt->bind_param('i', $id);

                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Student deleted successfully']);
                    break;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($connection)]);
                    break;
                }

            case 'showStudents':
                $gender = $_POST['gender'];
                $department = $_POST['department'];
                $page = isset($_POST['page']) ? $_POST['page'] : 1;
                $limit = isset($_POST['limit']) ? $_POST['limit'] : 8;
                $offset = ($page - 1) * $limit;

                $sql = "SELECT * FROM student";

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

                $sql .= " LIMIT $limit OFFSET $offset";

                $res = $connection->query($sql);

                $students = array();

                while ($row = $res->fetch_assoc()) {
                    $students[] = $row;
                }

                echo json_encode(['success' => true, 'students' => $students, 'totalStudent' => count($students)]);
                break;
        }
    }
}

<?php
include ('dbConnect.php');



header('Content-Type: application/json', true, 200);


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'edit':
                $id = $_POST['id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $department = $_POST['department'];
                $address = $_POST['address'];

                $sql = "UPDATE student SET first_name = ?, last_name = ?, email = ?, gender = ?, department = ?, address=?,  WHERE ID = ?";
                $stmt = $connection->prepare($sql);

                $stmt->bind_param('ssssssi', $first_name, $last_name, $email, $gender, $department, $address, $id);

                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Student updated successfully']);
                    break;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($connection)]);
                    break;
                }


            case 'delete':
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

                $otal = "SELECT COUNT(*) AS total FROM student";
                $male = "SELECT SUM(CASE WHEN gender = 'Male' THEN 1 ELSE 0 END) as male from student";
                $female = "SELECT SUM(CASE WHEN gender = 'Femle' THEN 1 ELSE 0 END) as female from student";

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

            case 'increaseAttendance':
                // Increase attendance for selected students
                $checkedIds = $_POST['checkedIds']; // Assuming this is sent from the front end
                if (!is_array($checkedIds)) {
                    $checkedIds = explode(',', $checkedIds); // Convert string to array
                }
                $sql = "UPDATE student SET attendance = attendance + 1 WHERE ID IN (" . implode(",", $checkedIds) . ")";
                if ($connection->query($sql)) {
                    echo json_encode(['success' => true, 'message' => 'Attendance updated successfully']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error: ' . $connection->error]);
                }
                break;

        }
    }
}


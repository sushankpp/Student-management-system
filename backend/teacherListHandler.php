<?php 
include 'dbConnect.php';

$total = mysqli_query($connection, 'SELECT COUNT(*) as total FROM teachers ')->fetch_assoc()['total'];


// $sql = 'SELECT * FROM teachers';
// $result = mysqli_query($connection, $sql);


// $teachers = [];

// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         $teachers[] = $row;
//     }
// } else {
//     $teachers = "no data found";
// }

header('Content-Type: application/json', true, 200);

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset ($_POST['action'])) {

        $action = $_POST['action'];
        switch ($action) {
            case 'edit':
                $id = $_POST['id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $department = $_POST['department'];

                $sql = "UPDATE teahcers SET first_name = ?, last_name =?, email = ?, gender =?, deapartment =? WHERE Id = ?";
                $stmt = $connection->prepare($sql);

                $stmt->bind_param('sssssi', $first_name, $last_name, $email, $gender, $department, $id);

                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Teacher data updated successfully']);
                    break;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($connection)]);
                    break;
                }

            case 'delete':
                $id = $_POST['id'];

                $sql = 'DELETE FROM teachers WHERE Id =?';
                $stmt = $connection->prepare($sql);

                $stmt->bind_param('i', $id);

                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Teacher data deleted successfully']);
                    break;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($connection)]);
                    break;
                }

            case 'showTeachers':
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

                $res = $connection->query($sql);
                $teachers = array();

                while ($row = $res->fetch_assoc()) {
                    $teachers[] = $row;
                }

                echo json_encode(['success' => true, 'teachers' => $teachers, 'total' => count($teachers)]);
                break;
        }
    }
}

?>
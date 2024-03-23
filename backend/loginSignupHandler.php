<?php
include('dbConnect.php');
header('Content-Type: application/json', true, 200);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action']) {
        $action = $_POST['action'];

        switch ($action) {
            case ('login'):
                $email = $_POST['email'];
                $password = $_POST['password'];

                if ($connection) {
                    $stmt = $connection->prepare('SELECT * FROM student WHERE email= ?');
                    $stmt->bind_param('s', $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $user = $result->fetch_assoc();
//                        if (password_verify($password, $user['password'])) {
                        if ($password == $user['password']) {
                            echo json_encode(['success' => true, 'message' => 'Login Successful']);
                        } else {
                            echo json_encode(['success' => false, 'message' => 'Incorrect password']);
                        }
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Email does not exist']);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($connection)]);
                    die("Error: " . mysqli_error($connection));
                }
                break;

            case ('register'):
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $First_name = $_POST["first-name"];
                    $Last_name = $_POST['last-name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $Conpassword = $_POST['Confrim-password'];
                    $phoneNum = $_POST['phone-number'];
                    $gender = isset($_POST['male']) ? 'Male' : (isset($_POST['female']) ? 'Female' : '');
                    $department = isset($_POST['department']) ? $_POST['department'] : '';

                    if ($password != $Conpassword) {
                        echo json_encode(['success' => false, 'message' => 'Password does not match']);
                        break;
                    }

                    if ($connection) {
                        // Check if email already exists
                        $stmt = $connection->prepare('SELECT * FROM student WHERE email= ?');
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            echo json_encode(['success' => false, 'message' => 'Email already exists']);
                            break;
                        }

                        // Use prepared statements to avoid SQL injection
                        $stmt = $connection->prepare("INSERT INTO student (first_name, last_name, email, password, phone_number, gender, department)
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("sssssss", $First_name, $Last_name, $email, $password, $phoneNum, $gender, $department);

                        if ($stmt->execute()) {
                            echo json_encode(['success' => true, 'message' => 'New record created successfully']);
                            break;
                        } else {
                            echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
                            break;
                        }
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_connect_error()]);
                        break;
                    }
                }
                break;
        }
    } else {
        echo json_encode(['error' => 'Invalid Request Method']);
    }
} else {
    echo json_encode(['error' => 'Invalid Request Method']);
}
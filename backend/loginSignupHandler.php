<?php
include ('dbConnect.php');
include ('../include/include_session.php');

class UserHandler
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function handleRequest()
    {
        header('Content-Type: application/json', true, 200);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['action']) {
                $action = $_POST['action'];

                switch ($action) {
                    case ('login'):
                        $this->login();
                        break;

                    case ('register'):
                        $this->register();
                        break;
                }
            } else {
                echo json_encode(['error' => 'Invalid Request Method']);
            }
        } else {
            echo json_encode(['error' => 'Invalid Request Method']);
        }
    }


    private function login()
    {
        error_log(print_r($_POST, true));

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this->connection) {
            // Check student table
            $stmt = $this->connection->prepare('SELECT * FROM student WHERE email= ?');
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = 'student';

                    echo json_encode(['success' => true, 'message' => 'Login Successful']);
                    return;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Incorrect password']);
                    return;
                }
            }

            // Check admin table
            $stmt = $this->connection->prepare('SELECT * FROM admin WHERE adminEmail= ?');
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['adminPassword'])) {
                    $_SESSION['adminId'] = $user['adminId'];
                    $_SESSION['adminEmail'] = $user['adminEmail'];
                    $_SESSION['role'] = 'admin';

                    echo json_encode(['success' => true, 'message' => 'Login Successful']);
                    return;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Incorrect password']);
                    return;
                }
            }

            echo json_encode(['success' => false, 'message' => 'Email does not exist']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($this->connection)]);
            die("Error: " . mysqli_error($this->connection));
        }

    }

    private function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first_name = trim($_POST["first-name"]);
            $last_name = trim($_POST['last-name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $passwordConfirm = $_POST['confirm-password'];
            $phoneNum = trim($_POST['phone-number']);
            $gender = isset($_POST['male']) ? 'Male' : (isset($_POST['female']) ? 'Female' : '');
            $department = isset($_POST['department']) ? $_POST['department'] : '';

            // Validate input fields
            if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($passwordConfirm) || empty($phoneNum) || empty($gender) || empty($department)) {
                echo json_encode(['success' => false, 'message' => 'All fields are required']);
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['success' => false, 'message' => 'Invalid email format']);
                return;
            }

            if ($password != $passwordConfirm) {
                echo json_encode(['success' => false, 'message' => 'Password does not match']);
                return;
            }

            if ($this->connection) {
                $stmt = $this->connection->prepare('SELECT * FROM student WHERE email= ?');
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo json_encode(['success' => false, 'message' => 'Email already exists']);
                    return;
                }

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $this->connection->prepare("INSERT INTO student (first_name, last_name, email, password, phone_number, gender, department)
                VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss", $first_name, $last_name, $email, $hashed_password, $phoneNum, $gender, $department);

                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'New record created successfully']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_connect_error()]);
            }
        }
    }
}

$connection = db_connect();

$userHandler = new UserHandler($connection);
$userHandler->handleRequest();
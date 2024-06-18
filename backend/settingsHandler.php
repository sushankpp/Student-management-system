<?php
include ('dbConnect.php');
include ('../include/include_session.php');

$conn = db_connect();
if (isset($_POST['action'])) {
    $action  = $_POST['action'];

    if ($action == 'editProfile') {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        if ($_POST['editPass'] == 'true') {
            $currentPass = $_POST['currentPass'];
            $newPass = $_POST['newPass'];
            $conPass = $_POST['conPass'];
        }

        // print_r($_SESSION);
        // die();
        $db_table = $_SESSION['role'];
        $idval = $_SESSION['id_'];
        $idName = ($db_table == 'student') ? 'ID' : 'adminId';
        $passName = ($db_table == 'student') ? 'password' : 'adminPassword';

        $sql = "SELECT * FROM $db_table WHERE $idName = '$idval'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if ($_POST['editPass'] == 'true') {
                $sql = "SELECT * FROM $db_table WHERE $idName = '$idval' AND $passName = '$currentPass'";
                // echo $sql;
                // die();
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    if ($newPass == $conPass) {
                        // $sql = "UPDATE $db_table SET password = '$newPass' WHERE first_name = '$fname' AND last_name = '$lname'";
                        $sql = "UPDATE $db_table SET $passName = '$newPass' WHERE $idName = '$idval'";
                        $result = $conn->query($sql);

                        // update first name and last name
                        $sql1 = "UPDATE $db_table SET first_name = '$fname' AND last_name = '$lname' WHERE $idName = '$idval'";
                        $result1 = $conn->query($sql1);

                        if ($result && $result1) {
                            echo "Updated successfully";
                        } else {
                            echo "Internal error occurred";
                        }
                    } else {
                        echo "Passwords do not match";
                    }
                } else {
                    echo "Incorrect Password";
                }
            } else {
                $sql = "SELECT * FROM $db_table WHERE $idName = '$idval'";
                // echo $sql;
                // die();
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // update first name and last name
                    $sql1 = "UPDATE $db_table SET first_name = '$fname', last_name = '$lname' WHERE $idName = '$idval'";
                    $result1 = $conn->query($sql1);

                    if ($result1) {
                        $_SESSION['first_name'] = $fname;
                        $_SESSION['last_name'] = $lname;
                        echo "Updated successfully";
                    } else {
                        echo "Internal error occurred";
                    }
                } else {
                    echo "Incorrect Password";
                }
            }
        } else {
            echo "User not found";
        }
    }
}
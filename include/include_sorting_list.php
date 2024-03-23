<?php
// include ('../backend/dbConnect.php');

// $gender = isset ($_GET['filter']) ? $_GET['filter'] : ''; // Change to $_GET to match AJAX request method
// $department = isset ($_GET['department']) ? $_GET['department'] : '';

// if ($gender && $gender !== 'all') { // Check if gender filter is selected and not 'all'
//     $query = "SELECT * FROM student WHERE gender=?";
//     $stmt = $connection->prepare($query);

//     $stmt->bind_param('s', $gender);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $students = array();
//     while ($row = $result->fetch_assoc()) {
//         $students[] = $row; // Store students in array
//     }
// } else {
//     // Fetch all students if no filter selected
//     $query = "SELECT * FROM student";
//     $result = $connection->query($query);
//     $students = array();
//     while ($row = $result->fetch_assoc()) {
//         $students[] = $row;
//     }
// }

?>
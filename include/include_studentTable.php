<?php
if (is_array($students)) {
    $for_filter = $students;
    foreach ($students as $student) {
        // echo "<tr data-student='" . htmlspecialchars(json_encode($student), ENT_QUOTES, 'UTF-8') . "' data-department='{$student['department']}'>";
        echo "<tr data-student='" . json_encode($student) . " '>
                <td>{$student['ID']}</td>
                <td>{$student['first_name']}</td>
                <td>{$student['last_name']}</td>
                <td>{$student['email']}</td>
                <td>{$student['gender']}</td>
                <td>{$student['department']}</td>
            </tr>";
    }
} else {
    echo $students;
}


// function filterStudents($filter1, $filter2)
// {
//     global $for_filter;
//     $students = $for_filter;
//     foreach ($students as $student) {
//         if ($filter1 != '') {
//             if ($student['gender'] == $filter1) {
//                 echo "<script>document.getElementById('student-table-body').innerHTML = '';</script>";
//                 // clear the table
//                 echo "<tr data-student='" . json_encode($student) . " '>
//                 <td>{$student['ID']}</td>
//                 <td>{$student['first_name']}</td>
//                 <td>{$student['last_name']}</td>
//                 <td>{$student['email']}</td>
//                 <td>{$student['gender']}</td>
//                 <td>{$student['department']}</td>
//                 </tr>";
//             }
//         }
//         if ($filter2 != '') {
//             if ($student['department'] == $filter2) {
//                 echo "<script>document.getElementById('student-table-body').innerHTML = '';</script>";
//                 // clear the table
//                 echo "<tr data-student='" . json_encode($student) . " '>
//                 <td>{$student['ID']}</td>
//                 <td>{$student['first_name']}</td>
//                 <td>{$student['last_name']}</td>
//                 <td>{$student['email']}</td>
//                 <td>{$student['gender']}</td>
//                 <td>{$student['department']}</td>
//                 </tr>";
//             }
//         }

//     }
// }
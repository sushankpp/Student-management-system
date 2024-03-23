<?php
if(is_array($teachers)){
    foreach($teachers as $teacher){
        echo "<tr data-teacher='". json_encode($teacher) . " '>
        <td>{$teacher['Id']}</td>
        <td>{$teacher['first_name']}</td>
        <td>{$teacher['last_name']}</td>
        <td>{$teacher['email']}</td>
        <td>{$teacher['gender']}</td>
        <td>{$teacher['department']}</td>
        </tr>";
    } 
} else{
    echo $teachers;
}

?>
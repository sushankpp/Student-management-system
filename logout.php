<?php

include 'include/include_session.php';

session_destroy();

echo json_encode(array('status' => 'success', 'message' => 'Logged out successfully'));

?>
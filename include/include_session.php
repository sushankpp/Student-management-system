<?php

session_set_cookie_params([
    'samesite' => 'Lax', // or 'Strict' or 'None'
    'secure' => true, // set to true if using 'None'
]);
session_start();

?>
<?php
// include_session.php

// Set session cookie parameters
// session_set_cookie_params([
//     'lifetime' => 60 * 60 * 24 * 30, // 30 days
//     'path' => '/',
//     'secure' => true, // change this to true if using https
//     'httponly' => true,
//     'samesite' => 'Strict',
// ]);

// Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
<?php
// Set session timeout to 1 minute (60 seconds)
session_set_cookie_params(60);
session_start(); // Start session

$authenticated = false;

if (isset($_SESSION['user_id'])) {
    // Check if session has not expired
    if (time() - $_SESSION['last_activity'] > 60) {
        // Session has expired, destroy it and redirect to login page
        session_unset();  // Unset all session variables
        session_destroy(); // Destroy the session
        header("Location: login.php");
        exit(); // Stop further execution
    } else {
        // Update last activity time
        $_SESSION['last_activity'] = time();

        // User is logged in
        $authenticated = true;
    }
} else {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit(); // Stop further execution
}
?>

<?php
// Include the database connection file
include 'dbconnection.php';

if (isset($_POST['submit'])) {
    // Validate inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Check if the user exists in the database
    $sql = "SELECT * FROM Users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Start session and set user ID
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            header("Location: index.php"); // Redirect to dashboard or video upload page
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "User not found.";
    }
}
?>

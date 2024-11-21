<?php
session_start(); // Start session at the top of the file

// Include the database connection file
include 'dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// User is logged in, proceed with upload
$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    // File upload handling
    $video_name = $_FILES['video']['name'];
    $video_tmp = $_FILES['video']['tmp_name'];
    $thumbnail_name = $_FILES['thumbnail']['name'];
    $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];
    $title = htmlspecialchars($_POST['title']); // Sanitize input
    $description = htmlspecialchars($_POST['description']); // Sanitize input

    // Move uploaded files to desired location if directories exist and are writable
    $video_path = 'uploads/videos/' . $video_name;
    $thumbnail_path = 'uploads/thumbnails/' . $thumbnail_name;

    if (move_uploaded_file($video_tmp, $video_path) && move_uploaded_file($thumbnail_tmp, $thumbnail_path)) {
        // File upload successful, now insert data into database using prepared statement
        $video_path_db = 'http://localhost/YOUTUBE/' . $video_path; // Adjust URL as per your server configuration
        $thumbnail_path_db = 'http://localhost/YOUTUBE/' . $thumbnail_path; // Adjust URL as per your server configuration

        $stmt = $conn->prepare("INSERT INTO Videos (user_id, video_name, video_path, thumbnail_path, title, description) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $user_id, $video_name, $video_path_db, $thumbnail_path_db, $title, $description);

        if ($stmt->execute()) {
            echo "Video uploaded successfully.";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "File upload failed.";
    }
} else {
    echo "No file submitted.";
}
?>

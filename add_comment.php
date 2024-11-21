<?php
session_start();
include 'dbconnection.php';

$video_id = intval($_POST['video_id']);
$user_id = intval($_POST['user_id']);
$comment = $conn->real_escape_string($_POST['comment']);

// Debugging: Print the received values
// echo "video_id: $video_id, user_id: $user_id, comment: $comment";

// Check if the user_id exists in the Users table
$user_check_sql = "SELECT user_id FROM Users WHERE user_id = $user_id";
$user_check_result = $conn->query($user_check_sql);

if ($user_check_result->num_rows == 0) {
    die("Error: Invalid user_id.");
}

// Check if the video_id exists in the Videos table
$video_check_sql = "SELECT video_id FROM Videos WHERE video_id = $video_id";
$video_check_result = $conn->query($video_check_sql);

if ($video_check_result->num_rows == 0) {
    die("Error: Invalid video_id.");
}

// Insert the comment into the Comments table
$sql = "INSERT INTO Comments (video_id, user_id, comment) VALUES ($video_id, $user_id, '$comment')";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<?php
// Include the database connection file
include 'dbconnection.php';

if (isset($_POST['submit'])) {
    // Sanitize and validate inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $channel_name = htmlspecialchars($_POST['channel_name']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $channel_logo = $_FILES['channel_logo'];

    // Check if file was uploaded without errors
    if ($channel_logo['error'] === UPLOAD_ERR_OK) {
        // Create "channel_logos" directory if it doesn't exist
        $upload_dir = 'uploads/channel_logos/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Move uploaded file to desired location
        $upload_file = $upload_dir . basename($channel_logo['name']);

        if (move_uploaded_file($channel_logo['tmp_name'], $upload_file)) {
            $channel_logo_url = 'http://localhost/YOUTUBE/' . $upload_file; // Adjust URL as per your server configuration

            // SQL command to insert data into Users table
            $sql = "INSERT INTO Users (email, password, channel_name, channel_logo_url)
                    VALUES ('$email', '$password', '$channel_name', '$channel_logo_url')";

            // Execute SQL command
            if ($conn->query($sql) === TRUE) {
                echo "User registered successfully.";
                header("Location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading channel logo.";
        }
    } else {
        echo "Error uploading channel logo: " . $channel_logo['error'];
    }
}
?>

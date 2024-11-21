<?php
session_start();
include 'dbconnection.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$user_id = isset($input['user_id']) ? intval($input['user_id']) : 0;
$channel_id = isset($input['channel_id']) ? intval($input['channel_id']) : 0;

$response = ['success' => false, 'message' => ''];

if ($user_id > 0 && $channel_id > 0) {
    $sql = "INSERT INTO Subscriptions (subscriber_id, channel_id, subscription_date) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $user_id, $channel_id);

    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['message'] = 'Subscription failed: ' . $stmt->error;
    }

    $stmt->close();
} else {
    $response['message'] = 'Invalid user or channel ID.';
}

$conn->close();

echo json_encode($response);

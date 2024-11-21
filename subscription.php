// subscription.php

<?php
include 'dbconnection.php';

$user_id = intval($_GET['user_id']);

$sql = "SELECT Users.channel_name, Users.channel_logo_url 
        FROM Subscriptions 
        JOIN Users ON Subscriptions.channel_id = Users.user_id 
        WHERE Subscriptions.subscriber_id = $user_id";
$result = $conn->query($sql);

$conn->close();
?>
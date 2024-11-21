<?php

include 'dbconnection.php';


$sql = "SELECT Videos.video_id ,Videos.video_name, Videos.thumbnail_path, Videos.title, Videos.description, Users.channel_name, Users.channel_logo_url FROM Videos JOIN Users ON Videos.user_id = Users.user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output of each row
    while ($row = $result->fetch_assoc()) {
        $video_id = $row["video_id"];
        $video_name = $row["video_name"];
        $thumbnail_path = $row["thumbnail_path"];
        $title = $row["title"];
        $description = $row["description"];
        $channel_name = $row["channel_name"];
        $channel_logo_url = $row["channel_logo_url"];
        
        //Video card hai
        echo '<div class="vid-crd">';
        echo '<div class="thumbnail" onclick="video.php">';
        echo '<img src="' . $thumbnail_path . '" alt="">'; 
        echo '</div>';
        echo '<div class="btm-vid">';
        echo '<div class="logo">';
        echo '<img src="' . $channel_logo_url . '" alt="channel-logo">'; 
        echo '</div>';
        echo '<div class="title">';
        echo "<p> <a href='video.php?id=".$video_id."'>$title</a>";
        echo '</div>';
        echo '</div>';
        echo '<div class="channel-name">';
        echo '<p>' . $channel_name . '</p>';
        echo '</div>';
        echo '</div>';
        
    }
} else {
    echo "0 results";
}

$conn->close();
?>

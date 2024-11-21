<?php
session_start();
include 'dbconnection.php';

$user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;

// Get the video ID from the URL
$video_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the selected video details
$sql = "SELECT Videos.video_id, Videos.video_name, Videos.video_path, Videos.title, Videos.description, Videos.user_id AS channel_user_id, Users.channel_name, Users.channel_logo_url, 
(SELECT COUNT(*) FROM Subscriptions WHERE Subscriptions.channel_id = Videos.user_id) AS subscriber_count
        FROM Videos 
        JOIN Users ON Videos.user_id = Users.user_id 
        WHERE Videos.video_id = $video_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $video = $result->fetch_assoc();
} else {
    die("Video not found.");
}

// Check if the user is already subscribed to the channel
$isSubscribed = false;
if ($user_id > 0) {
    $sql = "SELECT * FROM Subscriptions WHERE subscriber_id = $user_id AND channel_id = " . $video['channel_user_id'];
    $subscription_result = $conn->query($sql);
    if ($subscription_result->num_rows > 0) {
        $isSubscribed = true;
    }
}

// Fetch comments for the video
$sql = "SELECT Comments.comment, Comments.comment_date, Users.channel_name 
        FROM Comments 
        JOIN Users ON Comments.user_id = Users.user_id 
        WHERE Comments.video_id = $video_id 
        ORDER BY Comments.comment_date DESC";
$comments_result = $conn->query($sql);

// Fetch other videos for the aside section
$sql = "SELECT Videos.video_id, Videos.thumbnail_path, Videos.title, Users.channel_name 
        FROM Videos 
        JOIN Users ON Videos.user_id = Users.user_id 
        WHERE Videos.video_id != $video_id";
$other_videos_result = $conn->query($sql);

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./styles/playvid.css">

    <link rel="shortcut icon" href="icon/logo.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/89c0957ca7.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="left-section">
            <img class="hamburger-menu" src="https://www.svgrepo.com/show/506800/burger-menu.svg">
            <img class="youtube-logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/YouTube_Logo_2017.svg/1280px-YouTube_Logo_2017.svg.png">
        </div>
        <div class="middle-section">
            <form class="search-form" action="search.php" method="GET">
                <input class="search-bar" type="text" name="q" placeholder="Search" required>
                <button class="search-button" type="submit">
                    <img class="search-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Search_Icon.svg/1024px-Search_Icon.svg.png">
                    <div class="tooltip">Search</div>
                </button>
            </form>
            <button class="voice-search-button">
                <img class="voice-search-icon" src="https://w7.pngwing.com/pngs/868/768/png-transparent-microphone-computer-icons-sound-recording-and-reproduction-google-voice-search-microphone-cdr-electronics-microphone-thumbnail.png">
                <div class="tooltip"></div>
            </button>
        </div>
        <div class="right-section">
            <div class="upload-icon-container" onclick="handleCreate()">
                <img class="upload-icon" src="https://static.thenounproject.com/png/566743-200.png">
                <div class="tooltip">Create</div>
            </div>
            <img class="youtube-apps-icon" src="https://icons.veryicon.com/png/o/internet--web/55-common-web-icons/apps-27.png">
            <div class="notifications-icon-container">
                <img class="notifications-icon" src="https://icons.veryicon.com/png/o/object/material-design-icons/notifications-1.png">
                <div class="notifications-count">3</div>
            </div>
            <img class="current-user-picture" src="https://freesvg.org/img/abstract-user-flat-4.png">
        </div>
    </header>

    <nav class="sidebar">
        <div class="sidebar-link">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Home-icon.svg/1024px-Home-icon.svg.png" onclick="handlehome()">
            <div>Home</div>
        </div>
        <div class="sidebar-link">
            <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/explore-9260406-7565410.png?f=webp">
            <div>Explore</div>
        </div>
        <div class="sidebar-link">
            <img src="https://cdn.icon-icons.com/icons2/2248/PNG/512/youtube_subscription_icon_136007.png">
            <div>Subscriptions</div>
        </div>
        <div class="sidebar-link">
            <img src="https://www.svgrepo.com/show/79316/youtube.svg">
            <div>Originals</div>
        </div>
        <div class="sidebar-link">
            <img src="https://www.svgrepo.com/show/505120/youtube-music.svg">
            <div>YouTube Music</div>
        </div>
        <div class="sidebar-link">
            <img src="https://cdn-icons-png.flaticon.com/512/565/565290.png">
            <div>Library</div>
        </div>
    </nav>


    <main class="youtube-body">
        <div class="show-video">
            <div class="vid">
                <video controls autoplay id="myVideo">
                    <source src="<?php echo $video['video_path']; ?>" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
                <p class="video-title"><?php echo $video['title']; ?></p>
                <div class="video-stats">
                    <div class="video-stat">Views • Date</div>
                    <div class="video-stat">
                        <i class="title-icon fas fa-thumbs-up"></i> Likes
                        <i class="title-icon fas fa-thumbs-down"></i> Dislikes
                        <i class="title-icon fas fa-share"></i> Share
                        <i class="title-icon fas fa-save"></i> Save
                    </div>
                </div>
                <div class="video-about">
                    <figure class="avatar">
                        <img src="<?php echo $video['channel_logo_url']; ?>" alt="Channel logo">
                        <figcaption class="youtuber-name">
                            <strong><?php echo $video['channel_name']; ?></strong>
                            <p><?php echo htmlspecialchars($video['subscriber_count']); ?> subscribers</p>
                        </figcaption>
                    </figure>
                    <div class="subscribe">
                    <?php if (!$isSubscribed): ?>
                        <button class="subscribe-button" onclick="subscribe(<?php echo htmlspecialchars($user_id); ?>, <?php echo htmlspecialchars($video['channel_user_id']); ?>)">SUBSCRIBE</button>
                    <?php else: ?>
                        <button class="subscribed-button" disabled>SUBSCRIBED</button>
                    <?php endif; ?>
                    <i class="far fa-bell fa-lg"></i>
                </div>
                </div>
                <div class="comments-section">
                    <form action="add_comment.php" method="POST">
                        <input type="hidden" name="video_id" value="<?php echo $video_id; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <textarea name="comment" placeholder="Add a comment" required></textarea>
                        <button type="submit">Comment</button>
                    </form>
                    <h3>Comments</h3>
                    <?php
                    if ($comments_result->num_rows > 0) {
                        while ($comment = $comments_result->fetch_assoc()) {
                            echo '<div class="comment">';
                            echo '<strong>' . $comment['channel_name'] . ':</strong> ' . $comment['comment'];
                            echo '</div>';
                        }
                    } else {
                        echo "No comments yet.";
                    }
                    ?>
                </div>
            </div>
        </div>
        <aside>
            <?php
            if ($other_videos_result->num_rows > 0) {
                while ($other_video = $other_videos_result->fetch_assoc()) {
                    echo '<div class="recommend-video">';
                    echo '<img src="' . $other_video['thumbnail_path'] . '" alt="Thumbnail">';
                    echo '<div class="video-info-recommend">';
                    echo '<span class="recommend-video-title">';
                    echo '<a href="video.php?id=' . $other_video['video_id'] . '">' . $other_video['title'] . '</a>';
                    echo '</span>';
                    echo '<div class="creator-name">';
                    echo '<p>' . $other_video['channel_name'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No other videos found.";
            }
            ?>
        </aside>
    </main>

</body>
<script src="./scripts/handlecreate.js"></script>
<script src="./scripts/handlehome.js"></script>
<script>
function subscribe(userId, channelId) {
    if (userId === 0) {
        alert("You must be logged in to subscribe.");
        return;
    }

    fetch('subscribe.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ user_id: userId, channel_id: channelId }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload(); // Reload the page to update the subscription status
        } else {
            alert("Subscription failed.");
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

</script>

</html>
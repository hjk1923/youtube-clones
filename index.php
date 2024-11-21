<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./styles/mystyle.css">
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
            <div class="upload-icon-container" onclick="handleCreate()" >
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
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Home-icon.svg/1024px-Home-icon.svg.png">
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
        <div class="video-container">
        <?php include 'fetch_videos.php';?>

        </div>

    </main>

</body>
<script src="./scripts/handlecreate.js"></script>
<script src="./scripts/handlehome.js"></script>
</html>
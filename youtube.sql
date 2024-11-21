-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 04:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `video_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `video_id`, `user_id`, `comment`, `comment_date`) VALUES
(7, 10, 7, 'Best character in MCU', '2024-05-16 22:26:18'),
(8, 11, 7, 'that 2 min fight ', '2024-05-17 06:44:33'),
(9, 10, 10, 'best video', '2024-07-14 13:34:33'),
(10, 12, 10, 'ok', '2024-07-14 13:37:07'),
(11, 11, 11, 'best video', '2024-07-14 13:44:49'),
(12, 10, 7, 'ok', '2024-10-30 22:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `subscriber_id` int(11) DEFAULT NULL,
  `channel_id` int(11) DEFAULT NULL,
  `subscription_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`subscription_id`, `subscriber_id`, `channel_id`, `subscription_date`) VALUES
(4, 7, 7, '2024-05-17 06:40:23'),
(5, 8, 7, '2024-05-17 07:28:53'),
(6, 9, 7, '2024-05-17 07:30:19'),
(7, 10, 7, '2024-07-14 13:34:24'),
(8, 10, 8, '2024-07-14 13:36:57'),
(9, 11, 7, '2024-07-14 13:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `channel_name` varchar(255) DEFAULT NULL,
  `channel_logo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `channel_name`, `channel_logo_url`) VALUES
(7, 'muhammadnadee18@gmail.com', '$2y$10$8WWoKoSYBaDfAeMmiYHbtOiyDKodPAUZo./d4X/w5rKJUUktAyqX2', 'stark', 'http://localhost/YOUTUBE/uploads/channel_logos/pic.jpeg'),
(8, 'muhammadnadee838@gmail.com', '$2y$10$JDbVcT0ltLE16PKWX7LGzeMRGyWTvh0.dRsCjgI11nshLf8QnrPDG', 'unknow', 'http://localhost/YOUTUBE/uploads/channel_logos/thumbnail.jpeg'),
(9, 'abc@gmail.com', '$2y$10$sj2sUBUg821isVzzUtejrOq4wFqZEozOHDal403k5SplGl98I4j/q', 'OP STARK', 'http://localhost/YOUTUBE/uploads/channel_logos/2nd.jpeg'),
(10, 'muhammadnadeem@gmail.com', '$2y$10$zZ/.eHgh5Us6.ENdVz9x3OaX8Zwu.44WWGA72MC2yyT6K36Qw8gLG', 'chai aur code', 'http://localhost/YOUTUBE/uploads/channel_logos/logo.jpeg'),
(11, 'ali18@gmail.com', '$2y$10$HT8cQRK6kZgXdi6Shbl02eZeaZs/VqcCeWuPq62FZPgRi6JVqr0jK', 'Elite Coder', 'http://localhost/YOUTUBE/uploads/channel_logos/logo.jpeg'),
(14, 'allsubs29@gmail.com', '$2y$10$w1YWXlvA6/fJiQju6HP1guPZuPLG2uCMOH/HHnolP8y0nX6rjPn/u', 'MyChannel', 'http://localhost/YOUTUBE/uploads/channel_logos/2nd.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `video_name` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `thumbnail_path` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `views_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `user_id`, `video_name`, `video_path`, `thumbnail_path`, `title`, `description`, `upload_date`, `views_count`) VALUES
(10, 14, 'y2mate.com - Raftaarein FtIronman Edit  Raftaarein X Ironman Edit Status Ironman edit Ironman attitude status _1080pFHR.mp4', 'http://localhost/YOUTUBE/uploads/videos/y2mate.com - Raftaarein FtIronman Edit  Raftaarein X Ironman Edit Status Ironman edit Ironman attitude status _1080pFHR.mp4', 'http://localhost/YOUTUBE/uploads/thumbnails/1.jpg', 'Video 1', 'Video 1', '2024-05-16 22:25:36', 0),
(11, 14, 'y2mate.com - IRONMAN   EDIT  Gandagana  Status Hell  mdeditzz1_1080p.mp4', 'http://localhost/YOUTUBE/uploads/videos/y2mate.com - IRONMAN   EDIT  Gandagana  Status Hell  mdeditzz1_1080p.mp4', 'http://localhost/YOUTUBE/uploads/thumbnails/2nd.png', 'Video 2', 'Video 2', '2024-05-16 22:27:06', 0),
(12, 14, 'y2mate.com - IRONMAN   EDIT  Gandagana  Status Hell  mdeditzz1_1080p.mp4', 'http://localhost/YOUTUBE/uploads/videos/y2mate.com - IRONMAN   EDIT  Gandagana  Status Hell  mdeditzz1_1080p.mp4', 'http://localhost/YOUTUBE/uploads/thumbnails/2nd.png', 'Video 3', 'Video 3', '2024-05-17 06:59:15', 0),
(13, 14, 'y2mate.com - Here are some effective coding tips for beginners_360p.mp4', 'http://localhost/YOUTUBE/uploads/videos/y2mate.com - Here are some effective coding tips for beginners_360p.mp4', 'http://localhost/YOUTUBE/uploads/thumbnails/4.jpg', 'Video 4', 'Video 4', '2024-07-14 13:41:49', 0),
(14, 14, 'now.mp4', 'http://localhost/YOUTUBE/uploads/videos/now.mp4', 'http://localhost/YOUTUBE/uploads/thumbnails/5.jpg', 'Video 5', 'Video 5', '2024-07-14 13:49:20', 0),
(15, 14, 'Frozen.mp4', 'http://localhost/YOUTUBE/uploads/videos/Frozen.mp4', 'http://localhost/YOUTUBE/uploads/thumbnails/6.jpg', 'Video 6', 'Video 6', '2024-11-20 14:07:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `view_id` int(11) NOT NULL,
  `video_id` int(11) DEFAULT NULL,
  `viewer_user_id` int(11) DEFAULT NULL,
  `view_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `video_id` (`video_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `subscriber_id` (`subscriber_id`),
  ADD KEY `channel_id` (`channel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`view_id`),
  ADD KEY `video_id` (`video_id`),
  ADD KEY `viewer_user_id` (`viewer_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`subscriber_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`channel_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `views_ibfk_2` FOREIGN KEY (`viewer_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 27, 2025 at 07:14 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stc_overflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`) VALUES
(1, 4, 1, 'Your first mistake was breathing', '2025-07-27 18:35:35'),
(2, 4, 2, 'Bro you\'re just a hater, vibe-coding is the future', '2025-07-27 18:36:23'),
(3, 1, 3, 'yaydasda', '2025-07-27 18:43:09'),
(4, 1, 1, '332', '2025-07-27 18:52:36'),
(5, 1, 1, 'asds', '2025-07-27 18:58:21'),
(6, 1, 1, 'sdfg', '2025-07-27 18:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `forum_group` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `forum_group`, `title`, `content`, `created_at`) VALUES
(1, 1, 'Web Development', 'Help me', 'I don\'t know what to do lol', '2025-07-27 18:27:56'),
(2, 1, 'Databases', 'Truncate?', 'What does this even mean??', '2025-07-27 18:28:21'),
(3, 2, 'C# and .NET', 'Why is it called C#?', 'I am clueless', '2025-07-27 18:30:10'),
(4, 2, 'Web Development', 'Vibe coded a website and am experiencing a bug', 'What is happening here? I don\'t understand any of this code. So frustrating!', '2025-07-27 18:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `remember_token`) VALUES
(1, 'StreetTest', 'jstreet11@live.com', '$2y$10$QrVN95SlzkWzq8FtdJMzne9brSqO8DL2ctV6exfaNcBF9qlKtkQXy', '2025-07-27 18:25:58', 'ab2725d7c33ed9602c45293c450b51fc'),
(2, 'StreetTest1', '123@live.com', '$2y$10$VVrYQgLAhI1JPrY8Dvv2tux.0T2tO18TL6yOckLniAocG0VBe77Zi', '2025-07-27 18:28:38', NULL),
(3, 'StreetTest2', '1234@live.com', '$2y$10$jJgMGcxRnXOc4KvBvhsPruUv5MQtBLHcXcbmMcdGfj5wRKVjkSjny', '2025-07-27 18:42:30', '92678bc6d48498df022538f8ad9dc179');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2013 at 09:16 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `artist` varchar(60) NOT NULL,
  `album` varchar(60) NOT NULL,
  `genre` varchar(60) NOT NULL,
  `bpm` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `artist`, `album`, `genre`, `bpm`) VALUES
(1, 'I Used To Love H.E.R.', 'Common', 'Resurrection', 'Hip Hop / Rap', 67),
(2, 'The World Is Your', 'Nas', 'Illmatic', 'Hip Hop / Rap', 87),
(3, 'Wicked Games', 'TheWeeknd', 'Trilogy', 'Alternative R&B', 75),
(4, 'Angels ', 'The XX', 'Coexist', 'Indie Pop', 87),
(5, 'This Dj', 'Warren G', 'Regulate: G-Funk Era', 'Hip Hop / Rap', 80),
(6, 'Lullabies', 'Yuna', 'Yuna', 'R&B', 78),
(7, 'Still', 'Daughter', 'If You Leave', 'Alternative Rock', 98),
(8, 'The Seed', 'The Roots', 'Phrenology', 'Hip Hop / Rap', 88),
(9, 'Open', 'Rhye', 'Woman', 'Alternative R&B', 76),
(10, 'Ms Fat Booty', 'Mos Def', 'Black On Both Sides', 'Hip Hop / Rap', 81),
(11, 'Cowboy Boots', 'Macklemore & Ryan Lewis', 'The Heist', 'Hip Hop / Rap', 78),
(12, 'I Got 5 On It', 'Luniz', 'Operation Stackola', 'Hip Hop / Rap', 80),
(13, 'Raptures Delight', 'K.R.S. One', 'Step Into My World', 'Hip Hop / Rap', 100),
(14, 'Wait For Me', 'Kings Of Leon', 'Mechanical Bull', 'Rock', 82),
(15, 'Open Your Eyes', 'John Legend', 'Love In The Future', 'R&B', 78),
(16, 'Aint That Some Shit', 'J. Cole', 'Born Sinner', 'Hip Hop / Rap', 83),
(17, 'Tom Ford', 'Jay-Z', 'Magna Carter: Holy Grail', 'Hip Hop / Rap', 93),
(18, 'Pyramid', 'Frank Ocean', 'Channel Orange', 'R&B', 88),
(19, 'Only Wanna Give It To You', 'Elle Varner', 'Perfectly Imperfect', 'R&B Soul', 72),
(20, 'The Next Episode', 'Dr. Dre', 'The Chronic 2001', 'Hip Hop / Rap', 87),
(21, 'Oats In Water', 'Ben Howard', 'The Burgh Island EP', ' Folk / Indie folk', 76),
(22, 'Warm Water', 'Banks', 'London EP', 'Pop', 96),
(23, 'Tessellate', 'An Awesome Wave', 'Alt-J', 'Indie Rock', 87);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`) VALUES
(1, 'jabal', '$2y$10$v9Wnnb0WEo0FYSVpzvo3I.k/Ey9FbwQm2S1M6jk7wgSYJULueKlu2', 'jabal@capital-j.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

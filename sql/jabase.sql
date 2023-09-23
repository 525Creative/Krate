-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 23, 2023 at 07:38 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `artist` varchar(60) NOT NULL,
  `album` varchar(60) NOT NULL,
  `genre` varchar(60) NOT NULL,
  `bpm` decimal(10,0) NOT NULL,
  `coverart` text NOT NULL,
  `rating` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `artist`, `album`, `genre`, `bpm`, `coverart`, `rating`, `date`, `approved`) VALUES
(1, 'Fake It Till I Make It', 'Jabal', 'DLTA Music', 'Hip Hop', '90', 'Adele.jpg', 5, '2023-09-23', 0),
(3, 'Wicked Games', 'TheWeeknd', 'Trilogy', 'Alternative R&B', '75', 'TheWeeknd_Trilogy_WickedGames.jpeg', 2, '2023-09-11', 1),
(4, 'Angels ', 'The XX', 'Coexist', 'Indie Pop', '87', 'TheXX_Coexist_Angels.jpeg', 2, '2023-09-11', 1),
(5, 'This Dj', 'Warren G', 'Regulate: G-Funk Era', 'Hip Hop / Rap', '80', 'WarrenG_RegulateG-FunkEra_ThisDJ.jpeg', 2, '2023-09-11', 1),
(6, 'Lullabies', 'Yuna', 'Yuna', 'R&B', '78', 'Yuna_Yuna_Lullabies.jpeg', 3, '2023-09-11', 1),
(7, 'Still', 'Daughter', 'If You Leave', 'Alternative Rock', '98', 'Daughter_IfYouLeave_Still.jpeg', 4, '2023-09-11', 1),
(8, 'The Seed', 'The Roots', 'Phrenology', 'Hip Hop / Rap', '88', 'TheRoots_Phrenology_TheSeed.jpeg', 5, '2023-09-11', 1),
(9, 'Open', 'Rhye', 'Woman', 'Alternative R&B', '76', 'Rhye_Woman_Open.jpeg', 1, '2023-09-11', 1),
(10, 'Ms Fat Booty', 'Mos Def', 'Black On Both Sides', 'Hip Hop / Rap', '81', 'MosDef_BlackOnBothSides_MsFatBooty.jpeg', 1, '2023-09-11', 1),
(11, 'Cowboy Boots', 'Macklemore & Ryan Lewis', 'The Heist', 'Hip Hop / Rap', '78', 'Macklemore&RyanLewis_TheHeist_CowboyBoots.jpeg', 2, '2023-09-11', 1),
(12, 'I Got 5 On It', 'Luniz', 'Operation Stackola', 'Hip Hop / Rap', '80', 'Luniz_OperationStackola_IGot5OnIt.jpeg', 2, '2023-09-11', 1),
(13, 'Raptures Delight', 'K.R.S. One', 'Step Into My World', 'Hip Hop / Rap', '100', 'KRSone_StepIntoAWorld_RapturesDelight.jpeg', 3, '2023-09-11', 1),
(14, 'Wait For Me', 'Kings Of Leon', 'Mechanical Bull', 'Rock', '82', 'KingsOfLeon_MechanicalBull_WaitForMe.jpeg', 4, '2023-09-11', 1),
(15, 'Open Your Eyes', 'John Legend', 'Love In The Future', 'R&B', '78', 'JohnLegend_LoveInTheFuture_OpenYourEyes.jpeg', 1, '2023-09-11', 1),
(16, 'Aint That Some Shit', 'J. Cole', 'Born Sinner', 'Hip Hop / Rap', '83', 'JCole_BornSinner_AintThatSomeShit.jpeg', 2, '2023-09-11', 1),
(17, 'Tom Ford', 'Jay-Z', 'Magna Carter: Holy Grail', 'Hip Hop / Rap', '93', 'Jay-Z_MagnaCartaHolyGrail_TomFord.jpeg', 3, '2023-09-11', 1),
(18, 'Pyramid', 'Frank Ocean', 'Channel Orange', 'R&B', '88', 'FrankOcean_ChannelOrange_Pyramid.jpeg', 3, '2023-09-11', 1),
(19, 'Only Wanna Give It To You', 'Elle Varner', 'Perfectly Imperfect', 'R&B Soul', '72', 'ElleVarner_PerfectlyImperfect_OnlyWannaGiveItToYou.jpeg', 4, '2023-09-11', 1),
(20, 'The Next Episode', 'Dr. Dre', 'The Chronic 2001', 'Hip Hop / Rap', '87', 'DrDre_Chronic_TheNextEpisode.jpeg', 2, '2023-09-11', 1),
(21, 'Oats In Water', 'Ben Howard', 'The Burgh Island EP', ' Folk / Indie folk', '76', 'BenHoward_TheBurghIslandEP_OatsInWater.jpeg', 1, '2023-09-11', 1),
(22, 'Warm Water', 'Banks', 'London EP', 'Pop', '96', 'Banks_LondonEP_WarmWater.jpeg', 4, '2023-09-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`) VALUES
(1, 'jabal', '$2y$10$v9Wnnb0WEo0FYSVpzvo3I.k/Ey9FbwQm2S1M6jk7wgSYJULueKlu2', 'jabal@capital-j.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

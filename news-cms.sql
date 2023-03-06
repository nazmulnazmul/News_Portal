-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 07:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(31, 'Intertanment', 3),
(32, 'Helth', 2),
(33, 'Game', 1),
(34, 'footballs', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(36, 'All the kids play football, that is the reality', 'Alphonso Davies is the poster boy for Canadian football, though Herdman and his team have had to complete qualification without the Bayern Munich defender after he was diagnosed with a heart condition in January.\r\n\r\nHe is on the road to recovery and will hope to feature at the World Cup, along with the likes of Lille forward Jonathan David and Besiktas frontman Cyle Larin.\r\n\r\nThose players are evidence of the growing strength of youth development in Canada - and the wider interest in football in a country that has traditionally focused on more established sports.', '33', '28 Mar, 2022', 33, '_123013591_gettyimages-1236941088.jpg'),
(37, 'All the kids play football, that is the reality', '                Alphonso Davies is the poster boy for Canadian football, though Herdman and his team have had to complete qualification without the Bayern Munich defender after he was diagnosed with a heart condition in January.\r\n\r\nHe is on the road to recovery and will hope to feature at the World Cup, along with the likes of Lille forward Jonathan David and Besiktas frontman Cyle Larin.\r\n\r\nThose players are evidence of the growing strength of youth development in Canada - and the wider interest in football in a country that has traditionally focused on more established sports.                ', '33', '28 Mar, 2022', 33, 'soccer-competition-game-men.jpg'),
(38, '8 tips for healthy eating test', 'These 8 practical tips cover the basics of healthy eating and can help you make healthier choices.The key to a healthy diet is to eat the right amount of calories for how active you are so you balance the energy you consume with the energy you use.\r\n\r\nIf you eat or drink more than your body needs, you\'ll put on weight because the energy you do not use is stored as fat.', '32', '28 Mar, 2022', 37, 'T_1117_healthy-eating_179013608.width-1534.jpg'),
(39, 'Entertainment SMS', 'Entertainment acts like the nectar for a human soul. Without the presence of entertainment, people may go insane and may not be able to do any work with complete dedication. Entertainment relaxes our mind to make it feel the aesthetic and humorous part of life. If mind had that aesthetic experience, it would get inspiration and innovative ideas that will help you to improve the quality of your life.', '31', '10 Apr, 2022', 34, 'Entertainment.jpg'),
(40, 'Bollywood SMS', 'Funny bollywood SMS give complete entertainment  Browse through these latest bollywood text message to select a good one for your friends.Funny college SMS represents college life in a humorous manner.Enjoy these text message on college humor and make them available for your friends.Funny college SMS represents college life in a humorous manner.Enjoy these text message on college humor and make them available for your friends.', '31', '10 Apr, 2022', 34, 'man-singing-on-stage.jpg'),
(41, 'Text message-based health interventions', 'Text message-based health interventions provide patients with reminders, education, or self-management assistance for a broad spectrum of health conditions. Interventions are most frequently used as a part of broader health promotion efforts or to help individuals manage chronic diseases. Text messages may be standardized or tailored to specific patients and sent at varied frequencies based on the intervention.', '32', '10 Apr, 2022', 34, 'exercise-f2-30032016-ph-73-batch2.tmb-479v.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `websitename` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `footerdesc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`websitename`, `logo`, `footerdesc`) VALUES
('News Website', 'news.jpg', 'Munnas\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(37, 'Md.Mehedi', 'Hasan', 'Mehedi', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(35, 'Md.Abdur', 'Rahim', 'Abdur Rahim', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(34, 'Md.Nahid', 'Hossen', 'Nahid', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(33, 'Md.Saiful', 'Islam', 'Munna', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

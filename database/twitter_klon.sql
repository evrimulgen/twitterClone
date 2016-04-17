-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 12:01 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter_klon`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `message`, `user_mail`, `user_id`) VALUES
(9, 'My first post', 'ivanvukusic15@gmail.com', 2),
(12, 'My first post', 'ivanvukusic@gmail.com', 3),
(13, 'My second post', 'ivanvukusic@gmail.com', 3),
(14, 'My third post', 'ivanvukusic@gmail.com', 3),
(15, 'My fourth post', 'ivanvukusic@gmail.com', 3),
(17, 'My second post', 'ivanvukusic15@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$08$yf8WGkRM0VS9OPv1qpGpTuQ/BXt8Agk6IoN42/WdS0N/jpjfF3Bou', 'admin'),
(2, 'Ivan Vukušić', 'ivanvukusic15@gmail.com', '$2y$08$LlbCNDwnFlzdm11brMt17eVv8MVSdQj.jQ4h2xI8uTITiQ476oC22', 'user'),
(3, 'Pero Perić', 'ivanvukusic@gmail.com', '$2y$08$yf8WGkRM0VS9OPv1qpGpTuQ/BXt8Agk6IoN42/WdS0N/jpjfF3Bou', 'user'),
(5, 'Marko Markić', 'marko.markic@gmail.com', '$2y$08$BAbtRflN1r69osJcjOtia.khKcnbHEnOdZMuAy1XR0lciMr38xuy2', 'user'),
(6, 'Tvrdo Tvrdic', 'tvrdo@gmail.com', '$2y$08$uoVRSlF6J4n6dlYB9HSaT.CwoY5.lkMtrFaKaHeIbZHgkTNAWi332', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

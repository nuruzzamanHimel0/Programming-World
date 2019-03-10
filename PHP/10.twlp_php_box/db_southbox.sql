-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 05:52 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_southbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_box`
--

CREATE TABLE `db_box` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_box`
--

INSERT INTO `db_box` (`id`, `name`, `body`, `time`) VALUES
(10, 'himel', 'My name is himel', '07:02:53'),
(11, 'toha', 'hi, i am toha', '07:05:25'),
(12, 'jerin', 'hi, i am jerin', '07:06:11'),
(13, 'himel', 'My name is himel', '07:07:54'),
(14, '    Himel', 'My name is himel', '07:08:12'),
(15, '   himel', 'My name is himel', '07:08:26'),
(16, 'himel', 'My name is himel', '07:08:42'),
(17, '', '', '07:10:23'),
(18, '', '', '07:10:32'),
(19, 'himel', 'My name is himel', '07:11:01'),
(20, 'Himel', 'My name is himel', '07:12:09'),
(21, 'Toha', 'My name is toha', '07:12:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_box`
--
ALTER TABLE `db_box`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_box`
--
ALTER TABLE `db_box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

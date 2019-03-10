-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 06:06 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `db1_studnet`
--

CREATE TABLE `db1_studnet` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `age` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db1_studnet`
--

INSERT INTO `db1_studnet` (`id`, `name`, `dept`, `age`) VALUES
(3, 'Mehadi', 'CSE', '30'),
(6, 'himel', 'CSE', '25'),
(12, 'kana', 'food', '100'),
(14, 'Nuru', 'CSE', '21'),
(23, 'lotifur', 'medical', '28');

-- --------------------------------------------------------

--
-- Table structure for table `db1_teacher`
--

CREATE TABLE `db1_teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `age` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db1_teacher`
--

INSERT INTO `db1_teacher` (`id`, `name`, `dept`, `age`) VALUES
(1, 'Abdul Korim', 'ETE', '39'),
(2, 'Abdul Rofiq', 'Eng', '35'),
(4, 'sir sir', 'cse', '36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db1_studnet`
--
ALTER TABLE `db1_studnet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db1_teacher`
--
ALTER TABLE `db1_teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db1_studnet`
--
ALTER TABLE `db1_studnet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `db1_teacher`
--
ALTER TABLE `db1_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

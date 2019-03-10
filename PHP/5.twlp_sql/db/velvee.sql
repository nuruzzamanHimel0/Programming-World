-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 12:54 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `velvee`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstName`, `lastName`, `address`, `email`, `city`, `division`, `zipcode`, `age`, `salary`) VALUES
(1, 'Nuruzzaman', 'Himel', 'Satkhir', 'himel@gmail.com', 'satkhir', 'Khulna', '1234', 21, 375.52),
(2, 'Khan', 'Helal', 'India', 'Helal@gmail.com', 'India', 'India', '2222', 31, 500.02),
(3, 'Robaitul', 'Islam', 'borisal', 'Robaitul@gmail.com', 'borisal', 'borisal', '5541', 35, 300.354),
(4, 'Rezaul', 'Islam', 'borisal', 'Rezaul@gmail.com', 'borisal', 'borisal', '1475', 35, 175.125),
(5, 'kaniz', 'fatima', 'khulna', 'kniz@gmail.com', 'khulna', 'khulna', '1233', 29, 225.367),
(6, 'Tania', 'islam', 'khulna', 'kniz@gmail.com', 'khulna', 'khulna', '1233', 31, 425.001),
(7, 'Robin', 'Islam', 'Cumilla', 'kniz@gmail.com', 'Cumilla', 'Cumilla', '1233', 50, 525.778),
(8, 'anamul', 'kazi', 'chilet', 'anamul@gmail.com', 'chilet', 'chilet', '5647', 50, 125.123),
(9, 'neyamul', 'kazi', 'chilet', 'neyamul@gmail.com', 'chilet', 'chilet', '5647', 33, 10.1),
(10, 'lotifur', 'islam', 'satkhira', 'lotifur@gmail.com', 'satkhira', 'satkhira', '5647', 26, 20.367),
(12, 'Lotif', 'vai', 'satkhira', NULL, NULL, NULL, NULL, NULL, 0),
(13, 'mota', 'mama', 'kolkata', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers_bakup`
--

CREATE TABLE `customers_bakup` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `customers_view`
--
CREATE TABLE `customers_view` (
`id` int(11)
,`firstName` varchar(255)
,`lastName` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `ordar`
--

CREATE TABLE `ordar` (
  `id` int(11) NOT NULL,
  `ordarNumber` varchar(255) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `ordarDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordar`
--

INSERT INTO `ordar` (`id`, `ordarNumber`, `productId`, `customerId`, `ordarDate`) VALUES
(1, '1', 1, 4, '2018-05-22 11:10:34'),
(2, '2', 3, 1, '2018-05-22 11:10:34'),
(3, '3', 1, 6, '2018-05-22 11:10:34'),
(4, '4', 6, 2, '2018-05-22 11:10:34'),
(5, '5', 1, 1, '2018-05-22 11:10:34'),
(6, '6', 4, 9, '2018-05-22 11:10:34'),
(7, '7', 4, 3, '2018-05-22 11:10:34'),
(8, '8', 2, 4, '2018-05-22 11:10:34'),
(9, '9', 1, 5, '2018-05-22 11:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'Product One', 20),
(2, 'Product Two', 30),
(3, 'Product Three', 45),
(4, 'Product Four', 86),
(5, 'Product Five', 100),
(6, 'Product Six', 250);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `firstName`, `lastName`, `address`, `email`, `city`, `division`, `zipcode`) VALUES
(1, 'Nuruzzaman', 'Himel', 'Satkhira', 'himel@gmail.com', 'satkhir', 'Khulna', '1234'),
(2, 'Khan', 'Helal', 'India', 'Helal@gmail.com', 'India', 'India', '1234'),
(3, 'Robaitul', 'Islam', 'borisal', 'Robaitul@gmail.com', 'borisal', 'borisal', '5541'),
(4, 'Rezaul', 'Islam', 'borisal', 'Rezaul@gmail.com', 'borisal', 'borisal', '1234'),
(5, ' 	kaniz', 'fatima', 'khulna', 'kaniz@gmail.com', 'khulna', 'Khulna', '1234'),
(6, 'Tania', 'Islam', 'khulna', 'Tania@gmail.com', 'khulna', 'Khulna', '1234'),
(7, 'Robin', 'Islam', 'Cumilla', 'Robin@gmail.com', 'Cumilla', 'Cumilla', '1234'),
(8, 'anamul', 'kazi', 'chilet', 'anamul@gmail.com', 'chilet', 'chilet', '1234'),
(9, 'neyamul', 'kazi', 'chilet', 'neyamul@gmail.com', 'chilet', 'chilet', '1234'),
(10, 'lotifur', 'lotifur', 'Satkhira', 'lotifur@gmail.com', 'satkhir', 'satkhir', '1234');

-- --------------------------------------------------------

--
-- Structure for view `customers_view`
--
DROP TABLE IF EXISTS `customers_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customers_view`  AS  select `customers`.`id` AS `id`,`customers`.`firstName` AS `firstName`,`customers`.`lastName` AS `lastName` from `customers` where (`customers`.`firstName` is not null) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_bakup`
--
ALTER TABLE `customers_bakup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordar`
--
ALTER TABLE `ordar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customers_bakup`
--
ALTER TABLE `customers_bakup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ordar`
--
ALTER TABLE `ordar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordar`
--
ALTER TABLE `ordar`
  ADD CONSTRAINT `ordar_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ordar_ibfk_2` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

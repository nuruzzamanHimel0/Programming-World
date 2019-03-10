-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2018 at 06:43 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `name`) VALUES
(1, 'BMW'),
(2, 'Fasion'),
(3, 'Corolla'),
(4, 'Arial'),
(5, 'XYZ'),
(6, 'TATA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contuct`
--

CREATE TABLE `tbl_contuct` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contuct`
--

INSERT INTO `tbl_contuct` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(1, 'nuruzzaman', 'himel', 'n.himel143@gmail.com', 'dfdfdfdfdfdfdffffffffffffff', 1, '2018-09-25 02:14:53'),
(2, 'Chadni', 'Chadni', 'n.himel143@gmail.com', 'As of 2017, text messages are used by youth and adults for personal, family, business and social', 0, '2018-09-25 02:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copy`
--

CREATE TABLE `tbl_copy` (
  `id` int(11) NOT NULL,
  `copy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_copy`
--

INSERT INTO `tbl_copy` (`id`, `copy`) VALUES
(1, 'Md. Nuruzzaman Ltd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `meta_tag` varchar(255) NOT NULL,
  `meta_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `userId`, `name`, `body`, `meta_tag`, `meta_des`) VALUES
(24, 1, 'DMCAA', '<p>DMCA DMCA DMCA&nbsp;DMCA DMCA DMCA ...</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main cont', 'DMCA1,DMCA2', '                                    \r\n         DMCADMCADMCADMCADMCADMCADMCA    DMCA DMCA DMCADMCA DMCA DMCADMCA DMCA DMCADMCA DMCA DMCA                                               '),
(27, 1, 'HELP', '<p>&nbsp;</p>\r\n<p>Our post title here-Acura.Our post title here-Acura.Our post title here-AcuraOur post title here-AcuraOur post title here-AcuraOur post title here-Acura.Our post title here-Acura.Our post title here-AcuraOur post title here-AcuraOur post title here-AcuOur post title here-Acura.Our post title here-Acura.Our post title here-AcuraOur post title here-AcuraOur post title here-AcuraOur post title here-Acura.Our post title here-Acura.Our post title here-AcuraOur post title here-AcuraOur post title here-AcuOur post title here-Acura.Our post title here-Acura.Our post title here-AcuraOur post title here-AcuraOur post title here-AcuraOur post title here-Acura.Our post title here-Acura.Our post title here-AcuraOur post title here-AcuraOur post title here-AcuOur post title here-Acura.Our post title here-Acura.Our post title here-AcuraOur post title here-AcuraOur post title here-AcuraOur post title here-Acura.Our post title here-Acura.Our post title here-AcuraOur post title here-AcuraOur post title here-AcuOur post title here-Acura.Our post title here-Acura.Our post title here-AcuraOur post title here-AcuraOur post title here-AcuraOur post title here-Acura.Our</p>', 'HELP1,HELP2', '\r\n                ur post title here-Acura.Our post title here-Acura.Our post title here-AcuraOur post title here-AcuraOur post title here-AcuOur post title here-Acura.Our po            ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `userId`, `catId`, `title`, `body`, `image`, `author`, `tag`, `des`, `date`) VALUES
(2, 1, 1, 'This if BMW post title', '<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to orderAs of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to orderAs of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to orderAs of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to order</p>', '1c4bb64f2c.jpg', 'himel', 'car1,car2', '<p>meta description</p>', '2018-09-22 20:01:20'),
(3, 1, 2, 'This if FASION post title', '<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to orderAs of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to orderAs of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to orderAs of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to order</p>', 'e4da9e633c.jpg', 'himel', 'car1,car2,car3', '<p>Meta description is here</p>', '2018-09-22 20:02:24'),
(4, 1, 2, 'This if FASION post title 2', '<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to orderAs of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to order</p>\r\n<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to orderAs of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to order</p>', 'd25b9ec204.jpg', 'himel', 'car1,car2,car3', '<p>THis is a meta description</p>', '2018-09-22 20:02:57'),
(5, 1, 3, 'This if COROLLA post title1', '<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.</p>\r\n<p>&nbsp;</p>\r\n<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.</p>', 'c1beb8c513.jpg', 'himel', 'car1,car2,car3', '<p>meta des</p>', '2018-09-22 20:12:59'),
(6, 1, 3, 'This if COROLLA post title2', '<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.</p>\r\n<p>&nbsp;</p>\r\n<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.</p>', '12b27a776b.jpg', 'himel', 'car1', '<p>meta des</p>', '2018-09-22 20:13:49'),
(7, 1, 4, 'This if Arialpost title1', '<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.</p>', '127be5c6a0.jpg', 'himel', 'car1,car2', '<p>deta des</p>', '2018-09-22 20:14:17'),
(8, 1, 5, 'This if XYZpost title1', '<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.</p>', '0ee9b6f91f.jpg', 'himel', 'car1,car2,Car3', '<p>meta description</p>', '2018-09-22 20:14:49'),
(9, 1, 6, 'This if Tata post title1', '<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.</p>', '42448abe3a.jpg', 'himel', 'car1,car2,car3', '<p>eerererererererere</p>', '2018-09-22 20:15:24'),
(10, 1, 6, 'This if TATA post title11', '<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.</p>', 'a3d325f3eb.jpg', 'himel', 'car1,car2,car3', '<p>of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizati</p>', '2018-09-22 20:19:45'),
(11, 1, 4, 'This if Arialpost title1', '<p>As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.As of 2017, text messages are used by youth and adults for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages has become an accepted part of many cultures, as happened earlier with emailing. This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and&nbsp; and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals.</p>', 'a9b3fed269.jpg', 'himel', 'car1,car2', '<p>dfsdfsdfsdfsdfs</p>', '2018-09-22 20:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`) VALUES
(22, 'First Slider: First Slider is Here', '0e67988e0a.jpg'),
(23, 'Second Slider: This is my second slider', 'd4b5436770.jpg'),
(24, 'Third Slider: This is my third slider', 'a96185aa8e.jpg'),
(25, 'Fourth Slider: This is my fourth slider', '03405e29d7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slogan`
--

CREATE TABLE `tbl_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slogan`
--

INSERT INTO `tbl_slogan` (`id`, `title`, `logo`) VALUES
(1, 'Car House', '202807aa20.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL,
  `li` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `gp`, `li`) VALUES
(1, 'https://www.facebook.com/nuruzzaman.himel0', 'https://www.gp.com/nuruzzaman.himel0', 'https://www.li.com/nuruzzaman.himel0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE `tbl_theme` (
  `id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `theme`) VALUES
(1, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `gender`, `email`, `description`, `image`, `role`) VALUES
(1, 'Md. Nuruzzaman', 'himel', '1a1dc91c907325c69271ddf0c944bc72', 'm', 'nuruzzaman.himel147@gmail.com', '<p>value="</p>\r\n<p>My name is Md. Nuruzzaman Himel. I am from Satkhira</p>\r\n<p>"</p>', '4864f3363b.jpg', 0),
(4, 'AL Mamun', 'mamun', '1a1dc91c907325c69271ddf0c944bc72', 'm', 'nuruzzaman.himel1437@gmail.com', '<p>value="</p>\r\n<p>My name is mamun</p>\r\n<p>"</p>', '9f0bf0993a.jpg', 2),
(5, 'chadni', 'chadni', '1a1dc91c907325c69271ddf0c944bc72', 'f', 'nuruzzaman.himel1437@gmail.com', '<p>chadnichadnichadni</p>', '', 1),
(6, 'Rohim', 'rohim', '9794854de80bac30f232f260ffee406d', 'm', 'nuruzzaman.himel1437@gmail.com', '', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contuct`
--
ALTER TABLE `tbl_contuct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_copy`
--
ALTER TABLE `tbl_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slogan`
--
ALTER TABLE `tbl_slogan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_contuct`
--
ALTER TABLE `tbl_contuct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_copy`
--
ALTER TABLE `tbl_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_slogan`
--
ALTER TABLE `tbl_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

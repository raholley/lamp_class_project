-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2019 at 08:03 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamp_final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `ID` bigint(20) NOT NULL,
  `categoryName` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`ID`, `categoryName`) VALUES
(1, 'For Sale'),
(2, 'Services'),
(3, 'Jobs');

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `ID` bigint(20) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `locationName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` (`ID`, `region_id`, `locationName`) VALUES
(1, 1, 'San Jose'),
(2, 2, 'London'),
(3, 3, 'Quebec City');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_ID` bigint(20) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `description` text,
  `email` varchar(90) DEFAULT NULL,
  `agreement` int(11) DEFAULT NULL,
  `timestmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Image_1` blob,
  `Image_2` blob,
  `Image_3` blob,
  `Image_4` blob,
  `subcategory_id` bigint(20) DEFAULT NULL,
  `location_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_ID`, `title`, `price`, `description`, `email`, `agreement`, `timestmp`, `Image_1`, `Image_2`, `Image_3`, `Image_4`, `subcategory_id`, `location_id`) VALUES
(1, 'Piano Lessions', '80.00', 'Music teacher with 10 years experience available for music at an hourly rate of $80 per hour.  Hours are from 9-10 am or 6-9p.m.  Thank you for looking at my add', 'bruce@gmail.com', 1, '2019-02-13 02:44:23', 0x626c616820626c616820626c61680a, NULL, NULL, NULL, 6, 3),
(2, 'New room for rent', '25.00', 'Spare bedroom available for rent. Available now', 'jackson@gmail.com', 1, '2019-02-13 03:36:41', NULL, NULL, NULL, NULL, 3, 1),
(3, 'Peopleware Third edition book for sale', '40.00', 'A book that teaches you how to sucessfully interact with your workforce.', 'books@gmail.com', 1, '2019-02-13 02:45:53', NULL, NULL, NULL, NULL, 1, 1),
(4, 'Apple charging cable for sale', '10.00', 'A used apple iphone 6 charging cable.', 'apple2@gmail.com', 1, '2019-02-13 02:34:54', NULL, NULL, NULL, NULL, 2, 2),
(5, 'Used Clothing iron', '30.00', 'A used iron for straighting out clothes', 'billweaver@gmail.com', 1, '2019-02-13 02:37:46', NULL, NULL, NULL, NULL, 3, 3),
(6, 'Vintage Mac Computer for sale', '300.00', 'I have a Vintage mac computer for sale. It is is mint condition purchased in 1993. If interested please contact me by email.', 'garybruce@gmail.com', 1, '2019-02-13 03:05:39', NULL, NULL, NULL, NULL, 4, 1),
(7, 'Financial planning services', '100.00', 'My name is Fred and I\'m a certified financial planner. I\'m available to help coach you on how to handle your money.My fees are $100 per hour.', 'moneymatters@yahoo.com', 1, '2019-02-13 03:11:51', NULL, NULL, NULL, NULL, 5, 2),
(8, 'Guitar Lessions', '40.00', 'Guitar lessons available for $40 per hour.', 'chaplin@gmail.com', 1, '2019-02-13 06:45:48', NULL, NULL, NULL, NULL, 6, 1),
(9, 'Singing lessons', '90.00', 'I am professional singer offer lessons to an asipiring artist.   If you are interesting in learning how to sign well then please considering hiring me. Contact by email.', 'opera@yahoo.com', 1, '2019-02-13 06:45:48', NULL, NULL, NULL, NULL, 6, 2),
(10, 'Business Systems Analyst Positon', '50.00', 'We have a full-time opening for a Business Systems Analyst available in Mountain View. If interested please send resume.', 'hewithr@gmail.com', 1, '2019-02-13 03:28:10', NULL, NULL, NULL, NULL, 9, 1),
(11, 'Business Analyst position available', '25.00', 'We have a part-time opening for a Business Analyst available in London, England If interested please send resume.', 'zentith@gmail.com', 1, '2019-02-13 03:28:10', NULL, NULL, NULL, NULL, 10, 2),
(12, 'Business Systems Analyst Positon', NULL, 'We have a full-time opening for a Business Systems Analyst available in Mountain View. If interested please send resume.', 'ricelofts@gmail.com', 1, '2019-02-13 03:28:10', NULL, NULL, NULL, NULL, 9, 3),
(13, 'Food Pantry Volunteering', '0.00', 'We have an unpaid volunteer for passing out food to the needed at Second Harvest Food pantry.', 'second@food.org', 1, '2019-02-13 03:34:36', NULL, NULL, NULL, NULL, 11, 1),
(14, 'Dress for Sucess', '0.00', 'We have a an unpaid volunteer for passing out food to the needed at Dress for success. You will be helping women who are in need.  ', 'dress@sucess.org', 1, '2019-02-13 03:35:00', NULL, NULL, NULL, NULL, 11, 2),
(15, 'Dell Computer for sale', '190.00', 'I have a sightly used dell computer for sale.  Avaliable at a good price', 'candyland90@yahoo.com', 1, '2019-02-13 06:53:55', NULL, NULL, NULL, NULL, 4, 2),
(16, 'Acer Netbook for sale', '80.00', 'acer netbook forsale. Good condition. Call now for details.', 'varchar@gmail.com', 1, '2019-02-13 06:53:55', NULL, NULL, NULL, NULL, 4, 3),
(17, 'Great Western tells', '28.00', 'I have a used book written by the great Garth books. Its a good read. Available for sale', 'lonnielane@gmail.com', 1, '2019-02-13 06:53:55', NULL, NULL, NULL, NULL, 1, 3),
(18, 'The bullet journal book', '30.00', 'I have a used copy of the very popular bullet journal available written by Ryder Carroll.\r\n\r\n\r\n\r\n', 'lindacohen@gmail.com', 1, '2019-02-13 07:00:03', NULL, NULL, NULL, NULL, 1, 1),
(19, 'Genius Boost', '80.00', 'I have a used genius boost available for sale. It is used to start your car in case of an emergency. ', 'rydercarroll@gmail.com', 1, '2019-02-13 07:00:03', NULL, NULL, NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Region`
--

CREATE TABLE `Region` (
  `ID` bigint(20) NOT NULL,
  `regionName` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Region`
--

INSERT INTO `Region` (`ID`, `regionName`) VALUES
(1, 'USA'),
(2, 'England'),
(3, 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `SubCategory`
--

CREATE TABLE `SubCategory` (
  `ID` bigint(20) NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `SubCategoryName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SubCategory`
--

INSERT INTO `SubCategory` (`ID`, `category_id`, `SubCategoryName`) VALUES
(1, 1, 'Books'),
(2, 1, 'Electronics'),
(3, 1, 'Household'),
(4, 2, 'Computer'),
(5, 2, 'Financial'),
(6, 2, 'Lessions'),
(9, 3, 'Full-Time'),
(10, 3, 'Part-Time'),
(11, 3, 'Volunteering');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_ID`);

--
-- Indexes for table `Region`
--
ALTER TABLE `Region`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SubCategory`
--
ALTER TABLE `SubCategory`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Location`
--
ALTER TABLE `Location`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Region`
--
ALTER TABLE `Region`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `SubCategory`
--
ALTER TABLE `SubCategory`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

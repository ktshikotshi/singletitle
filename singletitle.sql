-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2017 at 01:05 AM
-- Server version: 5.6.32
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `singletitle`
--

-- --------------------------------------------------------

--
-- Table structure for table `singletitle_price_list`
--

CREATE TABLE `singletitle_price_list` (
  `price_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `inclucivePrice` double NOT NULL,
  `Supply_onlyPrice` decimal(10,0) NOT NULL,
  `Install_onlyPrice` int(11) NOT NULL,
  `price_status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `singletitle_price_list`
--

INSERT INTO `singletitle_price_list` (`price_id`, `product_id`, `inclucivePrice`, `Supply_onlyPrice`, `Install_onlyPrice`, `price_status`) VALUES
(1, 1, 1387, '800', 200, 1),
(2, 2, 1007, '2132', 3123, 1),
(3, 3, 1210, '433', 4535, 1),
(4, 4, 792, '3453', 354, 1),
(5, 5, 920, '3543', 543, 1),
(6, 6, 1182, '543', 5435, 1),
(7, 7, 1204, '354', 543, 1),
(8, 8, 1350, '3453', 5434, 1),
(9, 9, 453, '3453', 45354, 1),
(10, 10, 383, '543', 434, 0),
(11, 11, 350, '34', 455, 1),
(12, 12, 292, '345', 453, 1),
(13, 13, 487, '323', 543, 1),
(14, 14, 585, '3234', 456, 1),
(15, 15, 435.5, '432', 4352, 1),
(16, 16, 442, '243', 342, 1),
(17, 17, 615, '432', 432, 1),
(18, 18, 1440, '432', 432, 1),
(19, 19, 656, '432', 53, 1),
(20, 20, 695, '432', 432, 1),
(21, 21, 297, '432', 432, 1),
(22, 22, 580, '432', 432, 1),
(23, 23, 594, '432', 432, 1),
(24, 24, 330, '432', 432, 1),
(25, 25, 414, '432', 432, 1),
(26, 26, 357, '0', 0, 1),
(27, 27, 460, '0', 0, 1),
(28, 28, 425, '0', 0, 1),
(29, 29, 228, '0', 0, 1),
(30, 30, 203, '0', 0, 1),
(31, 31, 248, '0', 0, 1),
(32, 32, 263, '0', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `singletitle_product_category_list`
--

CREATE TABLE `singletitle_product_category_list` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_price` double NOT NULL,
  `category_status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `singletitle_product_category_list`
--

INSERT INTO `singletitle_product_category_list` (`category_id`, `category_name`, `category_price`, `category_status`) VALUES
(1, 'Engineered Floor', 198, 1),
(2, 'Solid Wood Floor', 458, 1),
(3, 'Timber Decking', 558, 1),
(4, 'Laminate Floor', 70, 1);

-- --------------------------------------------------------

--
-- Table structure for table `singletitle_product_list`
--

CREATE TABLE `singletitle_product_list` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `singletitle_product_list`
--

INSERT INTO `singletitle_product_list` (`product_id`, `product_name`, `category_id`, `product_status`) VALUES
(1, 'Antique Mackeena Euro Oak - 1 Strip', 1, 1),
(2, 'Antique Himalayas Euro Oak - 1 Strip', 1, 1),
(3, 'Brazillian cherry - 1 Strip', 1, 1),
(4, 'Designer Oak 15mm', 1, 1),
(5, 'Herringbone Designer Oak', 1, 1),
(6, 'Hevea - 3 Strip', 1, 1),
(7, 'Rockies Euro Oak - 1 Strip', 1, 1),
(8, 'Walnut - 1 Strip', 1, 1),
(9, 'Block Parquert - All Brown', 2, 1),
(10, 'Block Parquert - Savannah', 2, 1),
(11, 'Mini Mosaic - All Brown', 2, 1),
(12, 'Mini Mosaic - Savannah', 2, 1),
(13, 'Zimbabwean Teak - 76mm wide - All Brown', 2, 1),
(14, 'Zimbabwean Teak - 76mm wide - Savannah', 2, 1),
(15, 'Zimbabwean Teak - 90mm wide - All Brown', 2, 1),
(16, 'Zimbabwean Teak - 90mm wide - Savannah', 2, 1),
(17, 'Balau Decking', 3, 1),
(18, 'Composite Decking', 3, 1),
(19, 'Garapa Deccking', 3, 1),
(20, 'Massaranduba Decking', 3, 1),
(21, 'Pine Decking - 20*100', 3, 1),
(22, 'Rhino Wood Decking', 3, 1),
(23, 'Saligna Decking', 3, 1),
(24, 'Zimbabwean Teak Decking', 3, 1),
(25, 'Finfloor Black Forest laminate flooring - Oakwood Manor', 4, 1),
(26, 'Finfloor Black Forest laminate flooring - Volcanic Ash', 4, 1),
(27, 'Finfloor Black Forest laminate flooring - Stone House', 4, 1),
(28, 'Finfloor Black Forest laminate flooring - Snowfall White', 4, 1),
(29, 'Finfloor Supreme laminate flooring - Wheat', 4, 1),
(30, 'Finfloor Supreme laminate flooring - Walnut', 4, 1),
(31, 'Finfloor Supreme laminate flooring - Sandalwood', 4, 1),
(32, 'Finfloor Supreme laminate flooring - Royal Oak', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `singletitle_price_list`
--
ALTER TABLE `singletitle_price_list`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `singletitle_product_category_list`
--
ALTER TABLE `singletitle_product_category_list`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `singletitle_product_list`
--
ALTER TABLE `singletitle_product_list`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `singletitle_price_list`
--
ALTER TABLE `singletitle_price_list`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `singletitle_product_category_list`
--
ALTER TABLE `singletitle_product_category_list`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `singletitle_product_list`
--
ALTER TABLE `singletitle_product_list`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

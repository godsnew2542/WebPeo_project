-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 04:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airplane`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE `aircraft` (
  `AID` varchar(6) NOT NULL,
  `Aname` varchar(20) NOT NULL,
  `Model` varchar(30) NOT NULL,
  `seat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aircraft`
--

INSERT INTO `aircraft` (`AID`, `Aname`, `Model`, `seat`) VALUES
('HS-TBA', 'อำนาจเจริญ', 'A33H', 299),
('HS-TBB', 'แพร่', 'A33H', 299),
('HS-TBC', 'กาญจนบุรี', 'A33H', 299),
('HS-TEN', 'สุชาดา', 'A33R', 294),
('HS-TEO', 'จุฑามาศ', 'A33R', 294),
('HS-TEP', 'ศรีอโนชา', 'A330', 299),
('HS-TGA', 'ศรีสุริโยทัย', 'B74N', 374),
('HS-TGF', 'ศรีอุบล', 'B74N', 374),
('HS-TGG', 'ปทุมาวดี', 'B74N', 374),
('HS-TGO', 'บวรรังสี', 'B74R', 375),
('HS-TGW', 'วิสุทธฺ์กษัตริย์', 'B74R', 375),
('HS-TGX', 'ศิริโสภาคย์', 'B74R', 375);

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `FlightNo` varchar(20) NOT NULL,
  `AID` varchar(6) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `FlightFrom` varchar(20) NOT NULL,
  `FlightTo` varchar(20) NOT NULL,
  `Distance` varchar(10) NOT NULL,
  `Depart` time NOT NULL,
  `Arrive` time NOT NULL,
  `Eco_Price` int(10) NOT NULL,
  `Business_Price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`FlightNo`, `AID`, `Type`, `FlightFrom`, `FlightTo`, `Distance`, `Depart`, `Arrive`, `Eco_Price`, `Business_Price`) VALUES
('TG101', 'HS-TBA', 'AIRBUS', 'กรุงเทพฯ', 'เชียงใหม่', '687.8', '16:30:00', '17:45:00', 980, 3780),
('TG102', 'HS-TBB', 'AIRBUS', 'ภูเก็ต', 'นครศรีธรรมราช', '296.1', '16:30:00', '17:40:00', 1420, 3580),
('TG103', 'HS-TBC', 'AIRBUS', 'สุราษฎร์', 'ขอนแก่น', '1080.1', '09:35:00', '14:35:00', 3124, 5035),
('TG104', 'HS-TEN', 'AIRBUS', 'กระบี่', 'อุดรธานี', '1348.8', '12:05:00', '16:55:00', 2452, 5114),
('TG105', 'HS-TEO', 'AIRBUS', 'ตราด', 'เกาะสมุย', '1061.3', '10:30:00', '12:05:00', 3112, 5345),
('TG106', 'HS-TEP', 'AIRBUS', 'เชียงราย', 'ภูเก็ต', '1617.4', '10:50:00', '12:55:00', 4491, 6625),
('TG107', 'HS-TGA', 'BOEING', 'เชียงใหม่', 'แม่ฮ่องสอน', '250.8', '15:45:00', '16:30:00', 2049, 5520),
('TG108', 'HS-TGF', 'BOEING', 'ตรัง', 'กรุงเทพ', '837.1', '12:05:00', '13:30:00', 2442, 4455),
('TG109', 'HS-TGG', 'BOEING', 'ตราด', 'กรุงเทพ', '321.4', '10:10:00', '11:10:00', 5037, 6099),
('TG110', 'HS-TGO', 'BOEING', 'เกาะสมุย', 'พัทยา', '888.5', '11:10:00', '12:30:00', 4934, 6129),
('TG112', 'HS-TGW', 'BOEING', 'อุดรธานี', 'เชียงใหม่', '604.2', '19:10:00', '20:25:00', 2109, 4549),
('TG113', 'HS-TGX', 'BOEING', 'ขอนแก่น', 'กรุงเทพ', '449.8', '21:40:00', '22:40:00', 3609, 5280),
('TG114', 'HS-TGA', 'BOEING', 'กรุงเทพฯ', 'เชียงใหม่', '687.8', '09:30:00', '10:45:00', 1350, 2240),
('TG115', 'HS-TGF', 'BOEING', 'ภูเก็ต', 'นครศรีธรรมราช', '296.1', '21:20:00', '22:30:00', 1420, 3580),
('TG116', 'HS-TGG', 'BOEING', 'สุราษฎร์', 'ขอนแก่น', '1080.1', '11:15:00', '16:15:00', 3124, 5035),
('TG117', 'HS-TGW', 'BOEING', 'ตราด', 'เกาะสมุย', '1061.3', '17:30:00', '19:05:00', 3112, 5345),
('TG118', 'HS-TGX', 'BOEING', 'เชียงราย', 'ภูเก็ต', '1617.4', '16:00:00', '19:05:00', 4491, 6625),
('TG119', 'HS-TBA', 'AIRBUS', 'เชียงใหม่', 'แม่ฮ่องสอน', '250.8', '20:45:00', '22:00:00', 2049, 5520),
('TG120', 'HS-TBB', 'AIRBUS', 'ตรัง', 'กรุงเทพ', '837.1', '14:15:00', '15:40:00', 2442, 4455);

-- --------------------------------------------------------

--
-- Table structure for table `reserve_flight`
--

CREATE TABLE `reserve_flight` (
  `NID` varchar(17) NOT NULL,
  `Class` varchar(20) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `Date_reserve` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Trv_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NID` varchar(17) NOT NULL,
  `Uname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Passwd` varchar(20) NOT NULL,
  `Telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`FlightNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

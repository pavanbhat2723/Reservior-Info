-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 08:28 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservior`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblchannels`
--

CREATE TABLE `tblchannels` (
  `ID` int(11) NOT NULL,
  `Channel` varchar(100) NOT NULL,
  `Reservior` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblchannels`
--

INSERT INTO `tblchannels` (`ID`, `Channel`, `Reservior`) VALUES
(2, 'Left Channel', 'K R S'),
(3, 'Left Channel', 'Bhadra'),
(4, 'Right Channel', 'Bhadra');

-- --------------------------------------------------------

--
-- Table structure for table `tblengineers`
--

CREATE TABLE `tblengineers` (
  `ID` int(11) NOT NULL,
  `ChiefEngineer` varchar(100) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `Reservior` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblengineers`
--

INSERT INTO `tblengineers` (`ID`, `ChiefEngineer`, `Address`, `Mobile`, `EmailID`, `Reservior`) VALUES
(6, 'Jyothi', 'vidya nagar\r\nDavangere', '8722864794', 'jyothi@gmail.com', 'K R S'),
(7, 'Sujay', 'Davanagere', '9087654321', 'sujay@gmail.c0m', 'Bhadra');

-- --------------------------------------------------------

--
-- Table structure for table `tblfarmers`
--

CREATE TABLE `tblfarmers` (
  `ID` int(11) NOT NULL,
  `FarmerName` varchar(100) NOT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfarmers`
--

INSERT INTO `tblfarmers` (`ID`, `FarmerName`, `AddressLine1`, `AddressLine2`, `City`, `Mobile`) VALUES
(1, 'praveen', '17th Main 7th cross', 'Rangnath Badwane', 'Davangere', '9741726679'),
(2, 'Manoj', '17th main', 'Rangnath Badwane', 'Davanagere', '9087654322');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `UserType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`ID`, `UserID`, `Password`, `UserType`) VALUES
(1, 'admin', 'admin', 'Admin'),
(4, '8722864794', '123456', 'ChiefEngineer'),
(5, '9741726679', 'Ty4R0', 'Farmer'),
(6, '9087654321', '123456', 'ChiefEngineer'),
(7, '9087654322', '123456', 'Farmer');

-- --------------------------------------------------------

--
-- Table structure for table `tblreserviors`
--

CREATE TABLE `tblreserviors` (
  `ID` int(11) NOT NULL,
  `Reservior` varchar(100) NOT NULL,
  `River` varchar(100) NOT NULL,
  `Location` varchar(500) NOT NULL,
  `StorageCapacity` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreserviors`
--

INSERT INTO `tblreserviors` (`ID`, `Reservior`, `River`, `Location`, `StorageCapacity`, `Description`) VALUES
(1, 'K R S', 'Kaveri r', 'Mysore', '186 feet', 'it is old dam in karnataka'),
(2, 'Bhadra', 'Bhadra', 'Shimogga', '186feet', 'ghghhgh');

-- --------------------------------------------------------

--
-- Table structure for table `tblwaterlevels`
--

CREATE TABLE `tblwaterlevels` (
  `ID` int(11) NOT NULL,
  `Reservior` varchar(100) NOT NULL,
  `UDate` date NOT NULL,
  `Inflow` varchar(50) NOT NULL,
  `Outflow` varchar(50) NOT NULL,
  `CurrentCapacity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblwaterlevels`
--

INSERT INTO `tblwaterlevels` (`ID`, `Reservior`, `UDate`, `Inflow`, `Outflow`, `CurrentCapacity`) VALUES
(2, 'K R S', '2021-09-03', '20000 cues', '4000 cues', '156 feet'),
(3, 'Bhadra', '2021-09-04', '10000 CUes', '2000 cues', '180 feet');

-- --------------------------------------------------------

--
-- Table structure for table `tblwatertimetable`
--

CREATE TABLE `tblwatertimetable` (
  `ID` int(11) NOT NULL,
  `Reservior` varchar(100) NOT NULL,
  `Channel` varchar(100) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblwatertimetable`
--

INSERT INTO `tblwatertimetable` (`ID`, `Reservior`, `Channel`, `FromDate`, `ToDate`) VALUES
(1, 'K R S', 'Left Channel', '2021-09-04', '2021-09-09'),
(2, 'Bhadra', 'Left Channel', '2021-09-01', '2021-09-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblchannels`
--
ALTER TABLE `tblchannels`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblengineers`
--
ALTER TABLE `tblengineers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfarmers`
--
ALTER TABLE `tblfarmers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblreserviors`
--
ALTER TABLE `tblreserviors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblwaterlevels`
--
ALTER TABLE `tblwaterlevels`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblwatertimetable`
--
ALTER TABLE `tblwatertimetable`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblchannels`
--
ALTER TABLE `tblchannels`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblengineers`
--
ALTER TABLE `tblengineers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblfarmers`
--
ALTER TABLE `tblfarmers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblreserviors`
--
ALTER TABLE `tblreserviors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblwaterlevels`
--
ALTER TABLE `tblwaterlevels`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblwatertimetable`
--
ALTER TABLE `tblwatertimetable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

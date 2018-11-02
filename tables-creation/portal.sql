-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2018 at 05:47 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_USN` varchar(20) NOT NULL,
  `Admin_password` varchar(20) NOT NULL,
  `Club_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_USN`, `Admin_password`, `Club_ID`) VALUES
('1', 'abc', '1'),
('2', 'abc', '2'),
('3', 'abc', '3');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `Club_name` varchar(20) NOT NULL,
  `Club_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`Club_name`, `Club_ID`) VALUES
('Club-1', '1'),
('Club-2', '2'),
('Club-3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `club_member`
--

CREATE TABLE `club_member` (
  `Club_ID` varchar(20) NOT NULL,
  `Member_USN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club_member`
--

INSERT INTO `club_member` (`Club_ID`, `Member_USN`) VALUES
('1', '4'),
('1', '5'),
('2', '6'),
('2', '7'),
('3', '7'),
('3', '8');

-- --------------------------------------------------------

--
-- Table structure for table `create_event`
--

CREATE TABLE `create_event` (
  `event_id` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `end_time` time NOT NULL,
  `event_name` varchar(20) NOT NULL,
  `place` varchar(100) NOT NULL,
  `more_info` text NOT NULL,
  `invite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_event`
--

INSERT INTO `create_event` (`event_id`, `club_id`, `date`, `time`, `end_time`, `event_name`, `place`, `more_info`, `invite`) VALUES
(8, '1', '2018-10-11', '16:35:00', '16:45:00', 'xxxxxxxxx', 'xxxxxxx', 'xx', 'xxxxxxxxxxxx'),
(9, '1', '2018-10-16', '14:34:00', '15:50:00', 'Singing competiton', 'OAT', 'sd', 'dsf'),
(10, '2', '2018-10-27', '14:34:00', '14:34:00', 'Drawing', 'Panini', 'sdf', 'dfsd'),
(11, '2', '2018-10-26', '03:45:00', '14:34:00', 'Dance', 'mrd', 'dsfdf', 'fff'),
(12, '3', '2018-10-27', '19:00:00', '19:30:00', 'DJ', 'OAT', 'xyz', 'All college students'),
(19, '2', '2018-12-14', '19:45:00', '23:45:00', 'Halloween', 'Whitefield', 'With costumes', 'All college students'),
(20, '3', '2018-12-29', '04:56:00', '04:56:00', 'hhhrty', 'rhrt', 'rty', '54t54');


-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_name` varchar(50) NOT NULL,
  `Student_USN` varchar(20) NOT NULL,
  `Student_password` varchar(20) NOT NULL,
  `Student_phoneNo` bigint(10) DEFAULT NULL,
  `Student_email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_name`, `Student_USN`, `Student_password`, `Student_phoneNo`, `Student_email`) VALUES
('Admin1', '1', 'abc', 12345, 'admin1@gmail.com'),
('Admin2', '2', 'abc', 23411, 'admin2@gmail.com'),
('Admin3', '3', 'abc', 56789, 'admin3@gmail.com'),
('Student1', '4', 'abc', 234568, 'student1@gmail.com'),
('Student2', '5', 'abc', 322228, 'student2@gmail.com'),
('Student3', '6', 'abc', 234568, 'student3@gmail.com'),
('Student4', '7', 'abc', 98568, 'student4@gmail.com'),
('Student5', '8', 'abc', 2434568, 'student5@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Club_ID`),
  ADD KEY `Admin_USN` (`Admin_USN`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`Club_ID`);

--
-- Indexes for table `club_member`
--
ALTER TABLE `club_member`
  ADD PRIMARY KEY (`Club_ID`,`Member_USN`),
  ADD KEY `Member_USN` (`Member_USN`);



--
-- Indexes for table `create_event`
--
ALTER TABLE `create_event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `club_id` (`club_id`);


--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_USN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_event`
--
ALTER TABLE `create_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`Admin_USN`) REFERENCES `students` (`Student_USN`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`Club_ID`) REFERENCES `club` (`Club_ID`) ON DELETE CASCADE;

--
-- Constraints for table `club_member`
--
ALTER TABLE `club_member`
  ADD CONSTRAINT `club_member_ibfk_1` FOREIGN KEY (`Club_ID`) REFERENCES `club` (`Club_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `club_member_ibfk_2` FOREIGN KEY (`Member_USN`) REFERENCES `students` (`Student_USN`) ON DELETE CASCADE;


--
-- Constraints for table `create_event`
--
ALTER TABLE `create_event`
  ADD CONSTRAINT `create_event_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`Club_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

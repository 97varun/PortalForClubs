-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2018 at 09:46 AM
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
('01fb15ecs363', 'club1', 'C1'),
('01fb15ecs321', 'club2', 'C2'),
('01fb15ecs360', 'club3', 'C3'),
('01fb15ecs308', 'club4', 'C4'),
('01fb15ecs354', 'club4', 'C5'),
('01fb15ecs319', 'club4', 'C6'),
('01fb15ecs303', 'club4', 'C7');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `Club_name` varchar(100) NOT NULL,
  `Club_ID` varchar(20) NOT NULL,
  `Club_Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`Club_name`, `Club_ID`, `Club_Description`) VALUES
('Model United Nations Society', 'C1', 'We focus on building skills in Public Speaking. Won 14 Best Delegation Awards across the country. We are highly selective.'),
('QQC', 'C2', 'We host one of the biggest quizzes in South India, and we have won numerous awards. If you are interested in quizes, this is the place to be.'),
('Debate Society', 'C3', ''),
('Samarasa', 'C4', 'We help the army and provide as much support as we can. Hold constant drives to raise funds and awareness'),
('Pulse', 'C5', 'Dance, Dance, Dance!'),
('Write Angle', 'C6', 'We focus on making you a better writer.'),
('Aatmatrisha', 'C7', 'We are one of the biggest fests in Bangalore, we have over 100 events which requires a huge team to coordinate activites perfectly to give the attendees the best experience possible.');

-- --------------------------------------------------------

--
-- Table structure for table `clubjoinform`
--

CREATE TABLE `clubjoinform` (
  `Club_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clubregistration`
--

CREATE TABLE `clubregistration` (
  `Club_ID` varchar(20) NOT NULL,
  `Member_USN` varchar(20) NOT NULL,
  `Sem` int(11) NOT NULL,
  `Branch` varchar(5) NOT NULL,
  `ReasonToJoin` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubregistration`
--

INSERT INTO `clubregistration` (`Club_ID`, `Member_USN`, `Sem`, `Branch`, `ReasonToJoin`) VALUES
('C1', '01fb15eec017', 3, 'EC', ''),
('C1', '01fb15eme018', 1, 'ME', 'Interested in MUNs'),
('C2', '01fb15ebt019', 5, 'BT', 'Love quizes'),
('C2', '01fb15eee020', 4, 'EE', 'Want to quiz more like I did in school'),
('C3', '01fb15eec021', 5, 'EC', 'Want to make an impact by debating'),
('C3', '01fb15eme022', 4, 'ME', ''),
('C4', '01fb15ebt023', 5, 'BT', 'Love the Army!'),
('C4', '01fb15eee024', 4, 'EE', 'Want to help the saviours of our nation'),
('C5', '01fb15eec025', 5, 'EC', 'Was a national level dancer'),
('C5', '01fb15eme026', 4, 'ME', ''),
('C6', '01fb15eme027', 5, 'BT', ''),
('C6', '01fb15eme028', 4, 'EE', 'Love to write, love to create'),
('C7', '01fb15ecs004', 5, 'CS', 'Want to make Aatmatrisha a great success, and rival Mood Indigo, Bombay.'),
('C7', '01fb15ecs007', 4, 'CS', '');

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
('C1', '01fb15ecs001'),
('C1', '01fb15ecs002'),
('C1', '01fb15ecs003'),
('C1', '01fb15ecs004'),
('C1', '01fb15ecs363'),
('C2', '01fb15ecs005'),
('C2', '01fb15ecs006'),
('C2', '01fb15ecs321'),
('C3', '01fb15ecs007'),
('C3', '01fb15ecs008'),
('C3', '01fb15ecs360'),
('C4', '01fb15ecs009'),
('C4', '01fb15ecs010'),
('C4', '01fb15ecs308'),
('C5', '01fb15ecs011'),
('C5', '01fb15ecs012'),
('C5', '01fb15ecs354'),
('C6', '01fb15ecs013'),
('C6', '01fb15ecs014'),
('C6', '01fb15ecs319'),
('C7', '01fb15ecs015'),
('C7', '01fb15ecs016'),
('C7', '01fb15ecs303');

-- --------------------------------------------------------

--
-- Table structure for table `create_event`
--

CREATE TABLE `create_event` (
  `event_id` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `date_cur` date NOT NULL,
  `time_cur` time NOT NULL,
  `end_time` time NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `more_info` text NOT NULL,
  `invite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_event`
--

INSERT INTO `create_event` (`event_id`, `club_id`, `date_cur`, `time_cur`, `end_time`, `event_name`, `place`, `more_info`, `invite`) VALUES
(12, 'C1', '2018-12-02', '10:00:00', '02:00:00', 'Speaker Series', 'MRD Auditorium', 'Come watch Shashi Tharoor in action on 12th February!', 'Open to all students and your families'),
(13, 'C2', '2018-11-21', '08:30:00', '04:00:00', 'Conquiztador', 'Take part in a National Level Quiz Competition. Compete against the best from across the nation', 'B-Block 2nd Floor Seminar Hall', 'Open to students from III Semester and above'),
(14, 'C3', '2019-01-29', '09:00:00', '12:00:00', 'PES Annual Debate', 'MCA Seminar Hall', 'A debate organised by the PES Debate Society, under PES University.', 'National level competition open to all students'),
(15, 'C4', '2019-02-25', '05:30:00', '09:00:00', 'Samarasa Marathon', 'Run with the soldiers of our nation to show your support as they protect our nation!', 'Student Lounge', 'Students and families.'),
(16, 'C5', '2018-12-04', '04:00:00', '06:00:00', 'Dance Revolution', 'Think you can dance? Come show off your skills', 'MRD Auditorium', 'Students'),
(18, 'C7', '2019-03-22', '08:30:00', '08:30:00', 'Aatmatrisha', 'PES Universitys annual Cultural Fest is being organised on the 22nd of March, 2019. With over a 100 ', 'PES University', 'Students and families');

-- --------------------------------------------------------

--
-- Table structure for table `create_fest`
--

CREATE TABLE `create_fest` (
  `fest_id` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `date_cur` date NOT NULL,
  `time_cur` time NOT NULL,
  `end_time` time NOT NULL,
  `fest_name` varchar(20) NOT NULL,
  `place` varchar(100) NOT NULL,
  `more_info` text NOT NULL,
  `invite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `create_fest_event`
--

CREATE TABLE `create_fest_event` (
  `fest_event_id` int(11) NOT NULL,
  `fest_id` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `date_cur` date NOT NULL,
  `time_cur` time NOT NULL,
  `end_time` time NOT NULL,
  `fest_event_name` varchar(20) NOT NULL,
  `place` varchar(100) NOT NULL,
  `more_info` text NOT NULL,
  `invite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `rating` varchar(50) NOT NULL,
  `comments` varchar(70) NOT NULL,
  `srn` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `club` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `past_event`
--

CREATE TABLE `past_event` (
  `event_id` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `date_cur` date NOT NULL,
  `time_cur` time NOT NULL,
  `end_time` time NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `more_info` text NOT NULL,
  `invite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `past_event`
--

INSERT INTO `past_event` (`event_id`, `club_id`, `date_cur`, `time_cur`, `end_time`, `event_name`, `place`, `more_info`, `invite`) VALUES
(1, 'C7', '2018-03-22', '08:30:00', '12:45:00', 'Aatmatrisha', 'PES Universitys annual Cultural Fest is being organised on the 22nd of March, 2018. With over a 90 e', 'PES University', 'Students and families'),
(2, 'C3', '2018-08-20', '04:00:00', '06:00:00', 'Debate Society Recruitment', 'Come, debate, join our club', 'B-612', 'Students of PES University'),
(11, 'C1', '2018-11-01', '09:00:00', '12:00:00', 'Peoples Conference', 'PES University', 'Come take part in Model United Nations! Be a part of the change you want to see!', 'Open to all students in college'),
(17, 'C6', '2018-11-01', '09:30:00', '12:30:00', 'Write Angle Recruitment Drive', 'Come down and demonstrate your skills if you want to join our Club!', 'B-604', 'Students from I Semester and above');

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
('Chetan', '01fb15ebt019', '01fb15ecs019', 8232374900, 'Chetan@gmail.com'),
('Prem', '01fb15ebt023', '01fb15ecs023', 8232374900, 'Prem@gmail.com'),
('Aarav', '01fb15ecs001', '01fb15ecs001', 8232374900, 'Aarav@gmail.com'),
('Vivaan', '01fb15ecs002', '01fb15ecs002', 8232374900, 'Vivaan@gmail.com'),
('Aditya', '01fb15ecs003', '01fb15ecs003', 8232374900, 'Aditya@gmail.com'),
('Vihaan', '01fb15ecs004', '01fb15ecs004', 8232374900, 'Vihaan@gmail.com'),
('Arjun', '01fb15ecs005', '01fb15ecs005', 8232374900, 'Arjun@gmail.com'),
('Priyansh', '01fb15ecs006', '01fb15ecs006', 8232374900, 'Priyansh@gmail.com'),
('Sai', '01fb15ecs007', '01fb15ecs007', 8232374900, 'Sai@gmail.com'),
('Aiyaan', '01fb15ecs008', '01fb15ecs008', 8232374900, 'Aiyaan@gmail.com'),
('Aaryan', '01fb15ecs009', '01fb15ecs009', 8232374900, 'Aaryan@gmail.com'),
('Ansh', '01fb15ecs010', '01fb15ecs010', 8232374900, 'Ansh@gmail.com'),
('Shaurya', '01fb15ecs011', '01fb15ecs11', 8232374900, 'Shaurya@gmail.com'),
('Dhruv', '01fb15ecs012', '01fb15ecs012', 8232374900, 'Dhruv@gmail.com'),
('Krishna', '01fb15ecs013', '01fb15ecs013', 8232374900, 'Krishna@gmail.com'),
('Krish', '01fb15ecs014', '01fb15ecs014', 8232374900, 'Krish@gmail.com'),
('Ishaan', '01fb15ecs015', '01fb15ecs015', 8232374900, 'Ishaan@gmail.com'),
('Kabir', '01fb15ecs016', '01fb15ecs016', 8232374900, 'Kabir@gmail.com'),
('Sravya P', '01fb15ecs303', 'sravya', 8095501755, 'sravya@gmail.com'),
('Srinivas Shekar', '01fb15ecs308', 'srinivas', 9901383408, 'srinivas@gmail.com'),
('Sushmitha Somashekar', '01fb15ecs319', 'sushmitha', 9986150909, 'sushmitha@gmail.com'),
('Swetha K S N', '01fb15ecs321', 'swetha', 9480860186, 'swetha@gmail.com'),
('Tanmay Shrivastava', '01fb15ecs322', 'tanmay', 9611568337, 'tanmay@gmail.com'),
('Thanikonda Kavya', '01fb15ecs326', 'kavya', 9916820606, 'kavya@gmail.com'),
('Varun V', '01fb15ecs341', 'varun', 9482137612, 'varun@gmail.com'),
('Vinayaka S', '01fb15ecs352', 'vinayaka', 9986732351, 'vinayaka@gmail.com'),
('Vishal Krishna Kumar P', '01fb15ecs354', 'vishal', 7259450978, 'vishal@gmail.com'),
('Harshitha M Gowda', '01fb15ecs360', 'harshitha', 8217687430, 'harshitha@gmail.com'),
('Mukund Sood', '01fb15ecs363', 'mukund', 9900314000, 'mukund@gmail.com'),
('Om', '01fb15eec017', '01fb15ecs017', 8232374900, 'Om@gmail.com'),
('Manoj', '01fb15eec021', '01fb15ecs021', 8232374900, 'Manoj@gmail.com'),
('Ramesh', '01fb15eec025', '01fb15ecs025', 8232374900, 'Ramesh@gmail.com'),
('Manish', '01fb15eee020', '01fb15ecs020', 8232374900, 'Manish@gmail.com'),
('Rahul', '01fb15eee024', '01fb15ecs024', 8232374600, 'Rahul@gmail.com'),
('Ajay', '01fb15eme018', '01fb15ecs018', 8232374670, 'Ajay@gmail.com'),
('Mohan', '01fb15eme022', '01fb15ecs022', 92323756900, 'Mohan@gmail.com'),
('Rohit', '01fb15eme026', '01fb15ecs026', 8562374900, 'Rohit@gmail.com'),
('Vijay', '01fb15eme027', '01fb15ecs027', 8232374900, 'Vijay@gmail.com'),
('Vinod', '01fb15eme028', '01fb15ecs028', 8232374900, 'Vinod@gmail.com'),
('Amrutha', '01fb16ecs205', '01fb16ecs205', 9123422678, 'amrutha@gmail.com'),
('Amar', '01fb16ecs340', '01fb16ecs340', 9324556789, 'amar@gmail.com'),
('Pavan', '01fb17ecs123', '01fb17ecs123', 8232374900, 'pavan@gmail.com'),
('Srikanth', '01fb17ecs154', '01fb17ecs154', 7931404300, 'srikanth@gmail.com'),
('Sanjana', '01fb17ecs192', '01fb17ecs192', 8930364630, 'sanjana@gmail.com');

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
-- Indexes for table `clubjoinform`
--
ALTER TABLE `clubjoinform`
  ADD PRIMARY KEY (`Club_ID`);

--
-- Indexes for table `clubregistration`
--
ALTER TABLE `clubregistration`
  ADD PRIMARY KEY (`Club_ID`,`Member_USN`),
  ADD KEY `Member_USN` (`Member_USN`);

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
  ADD KEY `create_event_ibfk_1` (`club_id`);

--
-- Indexes for table `create_fest`
--
ALTER TABLE `create_fest`
  ADD PRIMARY KEY (`fest_id`),
  ADD KEY `create_fest_ibfk_1` (`club_id`);

--
-- Indexes for table `create_fest_event`
--
ALTER TABLE `create_fest_event`
  ADD PRIMARY KEY (`fest_event_id`),
  ADD KEY `create_fest_event_ibfk_1` (`fest_id`),
  ADD KEY `create_fest_event_ibfk_2` (`club_id`);

--
-- Indexes for table `past_event`
--
ALTER TABLE `past_event`
  ADD KEY `past_event_ibfk_1` (`club_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_USN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_fest`
--
ALTER TABLE `create_fest`
  MODIFY `fest_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `create_fest_event`
--
ALTER TABLE `create_fest_event`
  MODIFY `fest_event_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `clubjoinform`
--
ALTER TABLE `clubjoinform`
  ADD CONSTRAINT `clubjoinform_ibfk_1` FOREIGN KEY (`Club_ID`) REFERENCES `club` (`Club_ID`);

--
-- Constraints for table `clubregistration`
--
ALTER TABLE `clubregistration`
  ADD CONSTRAINT `clubregistration_ibfk_1` FOREIGN KEY (`Club_ID`) REFERENCES `club` (`Club_ID`),
  ADD CONSTRAINT `clubregistration_ibfk_2` FOREIGN KEY (`Member_USN`) REFERENCES `students` (`Student_USN`);

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

--
-- Constraints for table `create_fest`
--
ALTER TABLE `create_fest`
  ADD CONSTRAINT `create_fest_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`Club_ID`);

--
-- Constraints for table `create_fest_event`
--
ALTER TABLE `create_fest_event`
  ADD CONSTRAINT `create_fest_event_ibfk_1` FOREIGN KEY (`fest_id`) REFERENCES `create_fest` (`fest_id`),
  ADD CONSTRAINT `create_fest_event_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `club` (`Club_ID`);

--
-- Constraints for table `past_event`
--
ALTER TABLE `past_event`
  ADD CONSTRAINT `past_event_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`Club_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

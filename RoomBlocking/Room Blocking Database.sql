CREATE TABLE `rooms` (
 `RoomId` int(4) NOT NULL,
 `RoomName` varchar(20) DEFAULT NULL,
 PRIMARY KEY (`RoomId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `bookings` (
 `RoomId` int(4) NOT NULL,
 `From_D` date NOT NULL,
 `To_d` date NOT NULL,
 `B_Name` varchar(20) NOT NULL,
 KEY `RoomId` (`RoomId`),
 CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`RoomId`) REFERENCES `rooms` (`RoomId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `rooms` (`RoomId`, `RoomName`) VALUES ('1', 'Auditorium'), ('2', 'Room2'), ('3', 'Room3'), ('4', 'Room4'), ('5', 'Room5');

INSERT INTO `bookings` (`RoomId`, `From_D`, `To_d`, `B_Name`) VALUES ('1', '2018-11-01', '2018-11-03', 'Trance'), ('2', '2018-11-02', '2018-11-07', 'Alcoding'), ('3', '2018-11-01', '2018-11-04', 'DebSoc'), ('4', '2018-11-12', '2018-11-17', 'MunSoc'), ('5', '2018-11-03', '2018-11-06', 'Pulse');
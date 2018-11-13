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
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 03:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `huyesportsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `athletes`
--

CREATE TABLE `athletes` (
  `Athlete_ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Nationality` varchar(100) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Residence` varchar(255) DEFAULT NULL,
  `Team_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `athletes`
--

INSERT INTO `athletes` (`Athlete_ID`, `Name`, `Age`, `Gender`, `Nationality`, `Email`, `Phone`, `Residence`, `Team_ID`) VALUES
(1, 'Hugo Conte', 26, 'Male', 'Italy', 'hugo@gmail.com', '0788987666', 'Huye, Rwanda', 1),
(23, 'Jean Baptiste', 25, 'Male', 'Rwandan', 'jean@gmail.com', '+250720000001', 'Kigali, Rwanda', 1),
(24, 'Emmanuel Niyonzima', 22, 'Male', 'Rwandan', 'emmanuel@gmail.com', '+250720000002', 'Kigali, Rwanda', 1),
(25, 'Patrick Nzabonimpa', 27, 'Male', 'Rwandan', 'patrick@gmail.com', '+250720000003', 'Kigali, Rwanda', 1),
(26, 'David Niyonzima', 26, 'Male', 'Rwandan', 'david@gmail.com', '+250720000004', 'Kigali, Rwanda', 1),
(27, 'Jean Claude Habimana', 23, 'Male', 'Rwandan', 'jeanclaude@gmail.com', '+250720000005', 'Kigali, Rwanda', 1),
(28, 'Emile Gasana', 28, 'Male', 'Rwandan', 'emile@gmail.com', '+250720000006', 'Kigali, Rwanda', 1),
(29, 'Didier Nkurunziza', 29, 'Male', 'Rwandan', 'didier@gmail.com', '+250720000007', 'Kigali, Rwanda', 1),
(30, 'Thierry Niyomugabo', 24, 'Male', 'Rwandan', 'thierry@gmail.com', '+250720000008', 'Kigali, Rwanda', 1),
(31, 'Eric Habiyaremye', 27, 'Male', 'Rwandan', 'eric@gmail.com', '+250720000009', 'Kigali, Rwanda', 1),
(32, 'Olivier Ndayishimiye', 28, 'Male', 'Rwandan', 'olivier@gmail.com', '+250720000010', 'Kigali, Rwanda', 1),
(33, 'Marie Uwimana', 28, 'Female', 'Rwandan', 'marie@gmail.com', '+250720000011', 'Huye, Rwanda', 7),
(34, 'Ange Kagame', 30, 'Female', 'Rwandan', 'ange@gmail.com', '+250720000012', 'Huye, Rwanda', 8),
(35, 'Grace Uwase', 24, 'Female', 'Rwandan', 'grace@gmail.com', '+250720000013', 'Huye, Rwanda', 6),
(36, 'Angelique Mukamana', 29, 'Female', 'Rwandan', 'angelique@gmail.com', '+250720000014', 'Huye, Rwanda', 8),
(37, 'Esther Umuhoza', 31, 'Female', 'Rwandan', 'esther@gmail.com', '+250720000015', 'Huye, Rwanda', 6),
(38, 'Chantal Ingabire', 25, 'Female', 'Rwandan', 'chantal@gmail.com', '+250720000016', 'Huye, Rwanda', 8),
(39, 'Sylvie Mukankubito', 26, 'Female', 'Rwandan', 'sylvie@gmail.com', '+250720000017', 'Huye, Rwanda', 8),
(40, 'Jacqueline Uwimana', 30, 'Female', 'Rwandan', 'jacqueline@gmail.com', '+250720000018', 'Huye, Rwanda', 8),
(41, 'Sandrine Mukamurenzi', 22, 'Female', 'Rwandan', 'sandrine@gmail.com', '+250720000019', 'Huye, Rwanda', 8),
(42, 'Christine Uwase', 25, 'Female', 'Rwandan', 'christine@gmail.com', '+250720000020', 'Huye, Rwanda', 8);

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `Coach_ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Specialization` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`Coach_ID`, `Name`, `Specialization`, `Email`, `Phone`, `Address`) VALUES
(28, 'Etienne', 'Football', 'etienn@gmail.com', '0787133985', 'Huye, Rwanda'),
(30, 'Kamala', 'Football', 'kamal@gmail.com', '078986534', 'Kigali'),
(31, 'Maguire Kamanzi', 'Football', 'kamanzi@gmail.com', '+250 787 987 098', 'Ngoma, Huye'),
(32, 'Jean Mugabo', 'Basketball', 'jeanmugabo@gmail.com', '0785123456', 'Butare'),
(33, 'Alice Uwamahoro', 'Volleyball', 'aliceuwamahoro@gmail.com', '0786234567', 'Butare'),
(34, 'Patrick Niyonzima', 'Rugby', 'patrickniyonzima@gmail.com', '0787345678', 'Butare'),
(35, 'Fatima Mukarubega', 'Tennis', 'fatimamukarubega@gmail.com', '0788456789', 'Butare');

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `Competition_ID` int(11) NOT NULL,
  `Competition_title` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Venue` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`Competition_ID`, `Competition_title`, `Date`, `Venue`) VALUES
(1, 'match Day', '2024-04-30', 'huye'),
(2, 'Inter Cumpus', '2024-05-10', 'Huye'),
(3, 'Inter Campus', '2024-05-11', 'Kigali'),
(4, 'Inter School', '2024-05-31', 'Huye');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Message` text DEFAULT NULL,
  `SubmissionDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`ID`, `Name`, `Email`, `Message`, `SubmissionDate`) VALUES
(1, 'bghgygyguu', 'guguhuhuh@gmail.com', 'hfyudydtydftfyufyygyugygy', '2024-04-27 19:16:49'),
(2, 'hfkdhfsdkf', 'jhjhjjj@gmail.com', 'vghghghgjg', '2024-04-30 13:02:50'),
(3, 'hsdjshds', 'hhhjhjhjjh@gmail.com', 'dhfdfdjfhd', '2024-04-30 13:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `Match_ID` int(11) NOT NULL,
  `Competition_ID` int(11) DEFAULT NULL,
  `Team1_ID` int(11) DEFAULT NULL,
  `Team2_ID` int(11) DEFAULT NULL,
  `Match_Date` date DEFAULT NULL,
  `Venue` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`Match_ID`, `Competition_ID`, `Team1_ID`, `Team2_ID`, `Match_Date`, `Venue`) VALUES
(1, 3, 6, 7, '2024-05-10', 'Huye');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `Team_ID` int(11) NOT NULL,
  `Team_Name` varchar(255) DEFAULT NULL,
  `Coach_ID` int(11) DEFAULT NULL,
  `Training_Facility_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`Team_ID`, `Team_Name`, `Coach_ID`, `Training_Facility_ID`) VALUES
(1, 'Marcom FC', 28, 1),
(6, 'Huye Girls WFC', 30, 7),
(7, 'Huye Hawks FC', 28, 1),
(8, 'Huye Hurricanes BBT', 31, 2),
(9, 'Huye Heat FBT', 30, 3),
(10, 'Huye Hornets VT', 32, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tournamentofficials`
--

CREATE TABLE `tournamentofficials` (
  `ID` int(11) NOT NULL,
  `Match_ID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `Nationality` varchar(100) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Background` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainingfacilities`
--

CREATE TABLE `trainingfacilities` (
  `Facility_ID` int(11) NOT NULL,
  `Facility_Type` varchar(100) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Available_Equipment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainingfacilities`
--

INSERT INTO `trainingfacilities` (`Facility_ID`, `Facility_Type`, `Location`, `Available_Equipment`) VALUES
(1, 'Shooting', 'Huye', 'Ball, Goals'),
(2, 'Gymnasium', 'Huye Campus, University of Rwanda', 'Weights, treadmills, elliptical machines, exercise bikes'),
(3, 'Swimming Pool', 'Huye Campus, University of Rwanda', 'Swimming lanes, diving boards, pool accessories'),
(4, 'Running Track', 'Huye Campus, University of Rwanda', 'Track surface, hurdles, starting blocks'),
(5, 'Basketball Court', 'Huye Campus, University of Rwanda', 'Basketball hoops, basketballs'),
(6, 'Tennis Court', 'Huye Campus, University of Rwanda', 'Tennis nets, tennis rackets, tennis balls'),
(7, 'Football Field', 'Huye Campus, University of Rwanda', 'Goal posts, footballs'),
(8, 'Volleyball Court', 'Huye Campus, University of Rwanda', 'Volleyball net, volleyballs'),
(9, 'Badminton Court', 'Huye Campus, University of Rwanda', 'Badminton net, badminton rackets, shuttlecocks');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `UserID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`UserID`, `FullName`, `Email`, `Username`, `Password`) VALUES
(1, 'Rudy Van', 'rudy@gmail.com', 'Van', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`Athlete_ID`),
  ADD KEY `Team_ID` (`Team_ID`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`Coach_ID`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`Competition_ID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`Match_ID`),
  ADD KEY `Competition_ID` (`Competition_ID`),
  ADD KEY `Team1_ID` (`Team1_ID`),
  ADD KEY `Team2_ID` (`Team2_ID`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`Team_ID`),
  ADD KEY `Coach_ID` (`Coach_ID`),
  ADD KEY `Training_Facility_ID` (`Training_Facility_ID`);

--
-- Indexes for table `tournamentofficials`
--
ALTER TABLE `tournamentofficials`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Match_ID` (`Match_ID`);

--
-- Indexes for table `trainingfacilities`
--
ALTER TABLE `trainingfacilities`
  ADD PRIMARY KEY (`Facility_ID`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athletes`
--
ALTER TABLE `athletes`
  MODIFY `Athlete_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `Coach_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `Competition_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `Match_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `Team_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tournamentofficials`
--
ALTER TABLE `tournamentofficials`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingfacilities`
--
ALTER TABLE `trainingfacilities`
  MODIFY `Facility_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `athletes`
--
ALTER TABLE `athletes`
  ADD CONSTRAINT `athletes_ibfk_1` FOREIGN KEY (`Team_ID`) REFERENCES `teams` (`Team_ID`);

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`Competition_ID`) REFERENCES `competitions` (`Competition_ID`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`Team1_ID`) REFERENCES `teams` (`Team_ID`),
  ADD CONSTRAINT `matches_ibfk_3` FOREIGN KEY (`Team2_ID`) REFERENCES `teams` (`Team_ID`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`Coach_ID`) REFERENCES `coaches` (`Coach_ID`),
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`Training_Facility_ID`) REFERENCES `trainingfacilities` (`Facility_ID`);

--
-- Constraints for table `tournamentofficials`
--
ALTER TABLE `tournamentofficials`
  ADD CONSTRAINT `tournamentofficials_ibfk_1` FOREIGN KEY (`Match_ID`) REFERENCES `matches` (`Match_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

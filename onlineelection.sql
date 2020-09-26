-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2017 at 09:35 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineelection`
--

-- --------------------------------------------------------

--
-- Table structure for table `election_addcandidate`
--

CREATE TABLE `election_addcandidate` (
  `candidatid` int(11) NOT NULL,
  `cadidatename` text NOT NULL,
  `candidateparty` text NOT NULL,
  `candidateimage` text NOT NULL,
  `partysymbol` text NOT NULL,
  `electiontype` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `election_addelection`
--

CREATE TABLE `election_addelection` (
  `electionid` int(11) NOT NULL,
  `createdon` date NOT NULL,
  `electiontype` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `election_addvoter`
--

CREATE TABLE `election_addvoter` (
  `voterid` int(11) NOT NULL,
  `votercardnum` varchar(100) NOT NULL,
  `voteradharnum` bigint(20) NOT NULL,
  `votername` varchar(100) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `election_adminlogin`
--

CREATE TABLE `election_adminlogin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election_adminlogin`
--

INSERT INTO `election_adminlogin` (`email`, `password`) VALUES
('movvasaichaitanya@gmail.com', '9493941542'),
('raviteja.kodali9@gmail.com', '7731897299'),
('vijayrock442@gmail.com', '7396739700'),
('venkatarayudu77@gmail.com', '8333849567');

-- --------------------------------------------------------

--
-- Table structure for table `election_votes`
--

CREATE TABLE `election_votes` (
  `VoteID` int(11) NOT NULL,
  `CandidateId` text NOT NULL,
  `ElectionId` text NOT NULL,
  `VoterId` text NOT NULL,
  `CreatedOn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `election_addcandidate`
--
ALTER TABLE `election_addcandidate`
  ADD PRIMARY KEY (`candidatid`);

--
-- Indexes for table `election_addelection`
--
ALTER TABLE `election_addelection`
  ADD PRIMARY KEY (`electionid`);

--
-- Indexes for table `election_addvoter`
--
ALTER TABLE `election_addvoter`
  ADD PRIMARY KEY (`voterid`),
  ADD UNIQUE KEY `votercardnum` (`votercardnum`),
  ADD UNIQUE KEY `votername` (`votername`),
  ADD UNIQUE KEY `voteradharnum` (`voteradharnum`);

--
-- Indexes for table `election_votes`
--
ALTER TABLE `election_votes`
  ADD PRIMARY KEY (`VoteID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `election_addcandidate`
--
ALTER TABLE `election_addcandidate`
  MODIFY `candidatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `election_addelection`
--
ALTER TABLE `election_addelection`
  MODIFY `electionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `election_addvoter`
--
ALTER TABLE `election_addvoter`
  MODIFY `voterid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `election_votes`
--
ALTER TABLE `election_votes`
  MODIFY `VoteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

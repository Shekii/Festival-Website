-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2017 at 11:37 AM
-- Server version: 5.1.73-log
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b5044102_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `festivals`
--

CREATE TABLE IF NOT EXISTS `festivals` (
  `festivalID` int(11) NOT NULL AUTO_INCREMENT,
  `festivalName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `festivalDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `festivalImage` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'tank.jpg',
  `festivalLineup` text COLLATE utf8_unicode_ci NOT NULL,
  `musicTypeID` int(11) NOT NULL,
  `venueID` int(11) NOT NULL,
  `ticketID` int(11) NOT NULL,
  PRIMARY KEY (`festivalID`),
  KEY `musicTypeID` (`musicTypeID`,`venueID`,`ticketID`),
  KEY `venueID` (`venueID`),
  KEY `ticketID` (`ticketID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `festivals`
--

INSERT INTO `festivals` (`festivalID`, `festivalName`, `festivalDescription`, `festivalImage`, `festivalLineup`, `musicTypeID`, `venueID`, `ticketID`) VALUES
(2, 'Leeds Festival', 'Leeds', 'leeds.jpg', 'Bob Marley', 1, 2, 2),
(3, 'No Man''s Land Festival 2017', 'No Man''s Land is a home grown self sustained festival, a collaboration of UK promoters, artists, producers and audio visual technicians each adding their own unique skills and imagination to bring you the real UK festival experience!', 'nomans.jpg', 'ASWAD EXPERIENCE FT. BRINSLEY FORDE, EZ ROLLERS FT. ELLA SOPP, BLISS, AVALON, SONIC SPECIES, KRUST, DEEKLINE, SLAMBOREE SOUNDSYSTEM', 4, 3, 3),
(4, 'Weyfest 2017', '4 stages, Great bar prices, great quality food vendors, posh toilets (cleaned all weekend), museum attractions, steam railway rides and much more!', 'mayfest.jpg', 'Jools Holland, The Buzzcocks, Inglorious, Jeramiah Ferrari, Broken Witt Rebels, Mike Sanchez, Atomic Rooster and many more to be announced', 4, 4, 4),
(11, 'Into The Wild Festival 2017', 'Into The Wild is an intimate music festival set in the stunning English countryside, just an hour away from London.', 'into.png', 'Full line up to be announced soon', 4, 11, 11),
(12, 'Wannasee Weekend Live Tribute ', 'See Europe''s finest tributes to the World''s greatest artists, past and present, across the August Bank Holiday weekend.', 'wanna.jpg', 'Tributes to Michael Jackson, David Bowie, Queen, Bon Jovi, Meatloaf, AC/DC, Bruce Springsteen, Oasis, Bee Gees, Guns n Roses, U2, Jam and many more.', 4, 12, 12),
(13, 'The Walled Garden Music Fest, ', '	 The Walled Garden Music Fest, Brightling Park Start Date: 14th Jul 2017 Original Headline Bands and Rock Tribute Festival', 'walled.jpg', 'ABC, Howard Jones, Thompson Twins - Tom Bailey, Beverley Craven, Illegal Eagles and more...', 7, 13, 13),
(14, 'Rockmantic', 'Very popular Rock/Metal weekender held around Valintine''s Day annually. Now in its 5th year, the event showcases some of the very best club bands in the world. 2017 sees bands fly in from Sweden, Australia, Italy & Norway to the small border city of Carlisle.', 'rock.jpg', 'The Cruel Intentions (Sweden), Bigfoot (UK), Niterain (Norway), A Joker''s Rage (UK)', 3, 14, 14),
(15, 'Roundhouse Rising Festival 201', 'Very popular Rock/Metal weekender held around Valintine''s Day annually. Now in its 5th year, the event showcases some of the very best club bands in the world. 2017 sees bands fly in from Sweden, Australia, Italy & Norway to the small border city of Carlisle.', 'round', '	 Little Simz, Mick Jenkins, Vant, Catholic Action, Isaiah Dreads, Tom Grennan, Zuzu, Calva Louise, Swimming Girls, SumoChief, Awate, Kokoroko', 3, 15, 15),
(16, 'York''s Little Festival Of Live', 'Six hour music event showcasing the work of women in music', 'york.jpg', 'Heather Findlay, Holly Taymar, Gracie Falls, Rachel Croft, Sarah Dean and Leather''o', 6, 16, 16),
(17, 'BRISTOL DEATHFEST', 'BRISTOL DEATHFEST BRISTOL’S PREMIER INDOOR DEATH METAL EVENT - FEATURING ARTISTS FROM ALL OVER THE WORLD!', 'bristol.jpg', ' DEFEATED SANITY (GERMANY/USA) – SATURDAY HEADLINER – UK EXCLUSIVE HOUR OF PENANCE (ITALY) – SUNDAY HEADLINER – UK EXCLUSIVE NADER SADEK (EGYPT', 8, 17, 17),
(18, 'Leeds Festival', 'Leeds', 'tank.jpg', 'Bob Marley', 1, 18, 18),
(19, 'Deepdale Hygge', 'The Deepdale Hygge is our celebration of the North Norfolk Coast, a collection of the things that bring us happiness - live music, the great outdoors, meeting old friends and new, enjoying the best of the North Norfolk Coast', 'tank.jpg', ' To be confirmed', 5, 19, 19),
(20, 'Counterflows', 'Counterflows is a contemporary music festival produced by AC Projects & OtoProjects and curated by Alasdair Campbell & Fielding Hope.', 'counter.jpg', ' to be announced from Nov 2016', 6, 20, 20),
(21, 'Thunder Road Music Festival', 'The Thunder Road Music Festival will be held in East Tennessee and will feature over 30 National, regional and local artists', 'thunder.jpg', 'TBA', 6, 21, 21),
(22, 'Fourplay Prog Rock Festival', 'Four main prog rock bands on one day with support bands and interesting stalls', 'four.jpg', 'Spriggan Mist, Kindred Spirit and more', 6, 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE IF NOT EXISTS `music` (
  `musicTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `musicType` varchar(20) NOT NULL,
  PRIMARY KEY (`musicTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`musicTypeID`, `musicType`) VALUES
(1, 'electronic'),
(2, 'hardstyle'),
(3, 'rock'),
(4, 'techno'),
(5, 'house'),
(6, 'dubstep'),
(7, 'jazz'),
(8, 'hip hop');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `saleID` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `ticketID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`saleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleID`, `quantity`, `ticketID`, `userID`) VALUES
(1, 5, 3, 3),
(2, 50, 2, 2),
(3, 50, 2, 2),
(4, 50, 2, 2),
(5, 5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `ticketID` int(11) NOT NULL AUTO_INCREMENT,
  `ticketPrice` decimal(11,2) NOT NULL,
  `numTickets` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ticketID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketID`, `ticketPrice`, `numTickets`) VALUES
(2, 5.00, 100),
(3, 30.00, 100),
(4, 90.00, 20),
(11, 25.99, 100),
(12, 25.99, 100),
(13, 60.99, 100),
(14, 25.99, 30),
(15, 25.99, 30),
(16, 25.99, 30),
(17, 56.99, 100),
(18, 59.99, 100),
(19, 34.99, 1000),
(20, 34.99, 1000),
(21, 34.99, 1000),
(22, 30.00, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(30) CHARACTER SET latin1 NOT NULL,
  `surname` varchar(30) CHARACTER SET latin1 NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `credit` decimal(3,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `firstname`, `surname`, `is_admin`, `credit`) VALUES
(1, 'admin', '95c7e6e907314439f74688298fda0248', 'harry_walker1@yahoo.com', 'Harry', 'Walker', 1, 0.00),
(2, 'newUser', 'e88d82c36763e4ad09fe5f72512e5cd1', 'harry_walker1@yahoo.com', 'dfsdf', 'qdf', 0, 0.00),
(3, 'newone', '678bd3e1f7965ea104b767b647cbccc9', 'harry_walker1@yahoo.com', 'sadsa', 'asdad', 0, 0.00),
(4, 'sds', 'a1cab304e314dd2737acb7570e851bb2', 'harry_walker1@yahoo.com', 'sds', 'dssd', 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE IF NOT EXISTS `venue` (
  `venueID` int(11) NOT NULL AUTO_INCREMENT,
  `venueLocation` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `venueStart` date NOT NULL,
  `venueEnd` date NOT NULL,
  PRIMARY KEY (`venueID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venueID`, `venueLocation`, `venueStart`, `venueEnd`) VALUES
(2, 'Leeds', '2017-02-05', '2017-02-08'),
(3, 'West Sussex, UK', '2017-04-26', '2017-04-30'),
(4, 'Tilford, Farnham, Surrey', '2017-08-18', '2017-08-20'),
(11, 'Milton Keynes', '2017-07-14', '2017-07-16'),
(12, 'Milton Keynes', '2017-08-25', '2017-08-26'),
(13, 'Brightling Park', '2017-06-16', '2017-06-18'),
(14, 'Carlisle', '2017-02-15', '2017-02-17'),
(15, '	 Roundhouse', '2017-02-15', '2017-02-17'),
(16, 'Black Swan Inn, Peasholme Green,', '2017-05-09', '2017-08-09'),
(17, 'The Bierkeller', '2017-04-15', '2017-04-18'),
(18, 'Leeds', '2017-02-05', '2017-02-08'),
(19, 'Leeds', '2017-03-24', '2017-03-27'),
(20, 'Glasgow', '2017-03-06', '2017-04-06'),
(21, 'Glasgow', '2017-03-06', '2017-04-06'),
(22, 'Glasgow', '2017-04-08', '2017-04-09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

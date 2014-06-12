-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2014 at 07:01 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mypropertylk`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(1, 'Ampara'),
(2, 'Anuradhapura'),
(3, 'Badulla'),
(4, 'Batticaloa'),
(5, 'Colombo'),
(6, 'Galle'),
(7, 'Gampaha'),
(8, 'Hambantota'),
(9, 'Jaffna'),
(10, 'Kalutara'),
(11, 'Kandy'),
(12, 'Kegalle'),
(13, 'Kilinochchi'),
(14, 'Kurunegala'),
(15, 'Mannar'),
(16, 'Matale'),
(17, 'Matara'),
(18, 'Moneragala'),
(19, 'Mullaitivu'),
(20, 'Nuwara Eliya'),
(21, 'Polonnaruwa'),
(22, 'Puttalam'),
(23, 'Ratnapura'),
(24, 'Trincomalee'),
(25, 'Vavuniya');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE IF NOT EXISTS `pricelist` (
  `priceid` int(11) NOT NULL AUTO_INCREMENT,
  `proptype` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `priceimage` varchar(200) NOT NULL,
  PRIMARY KEY (`priceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`priceid`, `proptype`, `price`, `priceimage`) VALUES
(1, 'Standard Property', 500, 'standard_adv.png'),
(2, 'Premier Property', 1000, 'primier_adv.png'),
(3, 'Featured Property', 1500, 'featured_adv.png');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `proptype` int(11) NOT NULL,
  `propcondition` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `agent` int(11) NOT NULL,
  `otheragent` int(11) NOT NULL,
  `weeklyrent` double NOT NULL,
  `monthlyrent` double NOT NULL,
  `securebond` double NOT NULL,
  `price` double NOT NULL,
  `dispalyprice` bit(1) NOT NULL,
  `availabledate` date NOT NULL,
  `vendorname` varchar(200) NOT NULL,
  `vendoremail` varchar(200) NOT NULL,
  `vendorphone` varchar(200) NOT NULL,
  `sendemail` bit(1) NOT NULL,
  `unitnum` varchar(100) NOT NULL,
  `lotnum` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `streetaddress` varchar(200) NOT NULL,
  `areaname` varchar(200) NOT NULL,
  `townname` varchar(200) NOT NULL,
  `hidestreetaddress` bit(1) NOT NULL,
  `district` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `ensuites` int(11) NOT NULL,
  `toilets` int(11) NOT NULL,
  `parkgaragespaces` int(11) NOT NULL,
  `parkcarpetspaces` int(11) NOT NULL,
  `parkopenspaces` int(11) NOT NULL,
  `livingarea` int(11) NOT NULL,
  `housesize` int(11) NOT NULL,
  `housesquares` int(11) NOT NULL,
  `landsize` int(11) NOT NULL,
  `landsquares` int(11) NOT NULL,
  `floorarea` int(11) NOT NULL,
  `floorsquares` int(11) NOT NULL,
  `tenuretype` varchar(200) NOT NULL,
  `building` varchar(200) NOT NULL,
  `parkingspaces` int(11) NOT NULL,
  `parkcomment` varchar(200) NOT NULL,
  `zoning` varchar(200) NOT NULL,
  `outgoings` varchar(200) NOT NULL,
  `eer` int(11) NOT NULL,
  `balcony` bit(1) NOT NULL,
  `deck` bit(1) NOT NULL,
  `oea` bit(1) NOT NULL,
  `shed` bit(1) NOT NULL,
  `remotegarage` bit(1) NOT NULL,
  `swimpool` bit(1) NOT NULL,
  `courtyard` bit(1) NOT NULL,
  `fullyfenced` bit(1) NOT NULL,
  `outsidespa` bit(1) NOT NULL,
  `securepark` bit(1) NOT NULL,
  `tenniscourt` bit(1) NOT NULL,
  `spabovroundeg` bit(1) NOT NULL,
  `alarmsys` bit(1) NOT NULL,
  `biltinwardrobes` bit(1) NOT NULL,
  `dvs` bit(1) NOT NULL,
  `gym` bit(1) NOT NULL,
  `intercom` bit(1) NOT NULL,
  `rumpusroom` bit(1) NOT NULL,
  `workshop` bit(1) NOT NULL,
  `broadbandinternet` bit(1) NOT NULL,
  `dishwasher` bit(1) NOT NULL,
  `floorboards` bit(1) NOT NULL,
  `insidespa` bit(1) NOT NULL,
  `paytv` bit(1) NOT NULL,
  `study` bit(1) NOT NULL,
  `ac` bit(1) NOT NULL,
  `heating` bit(1) NOT NULL,
  `cooling` bit(1) NOT NULL,
  `solarpower` bit(1) NOT NULL,
  `solarhotwater` bit(1) NOT NULL,
  `watertank` bit(1) NOT NULL,
  `otherfeatures` varchar(200) NOT NULL,
  `headline` varchar(200) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `vediourl` varchar(500) NOT NULL,
  `onlinetour1` varchar(500) NOT NULL,
  `onlinetour2` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `pricetype` int(11) NOT NULL,
  `dateadded` date NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `pricetype` (`pricetype`),
  KEY `agent` (`agent`),
  KEY `otheragent` (`otheragent`),
  KEY `district` (`district`),
  KEY `province` (`province`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `proptype`, `propcondition`, `owner`, `agent`, `otheragent`, `weeklyrent`, `monthlyrent`, `securebond`, `price`, `dispalyprice`, `availabledate`, `vendorname`, `vendoremail`, `vendorphone`, `sendemail`, `unitnum`, `lotnum`, `number`, `streetaddress`, `areaname`, `townname`, `hidestreetaddress`, `district`, `province`, `bedrooms`, `bathrooms`, `ensuites`, `toilets`, `parkgaragespaces`, `parkcarpetspaces`, `parkopenspaces`, `livingarea`, `housesize`, `housesquares`, `landsize`, `landsquares`, `floorarea`, `floorsquares`, `tenuretype`, `building`, `parkingspaces`, `parkcomment`, `zoning`, `outgoings`, `eer`, `balcony`, `deck`, `oea`, `shed`, `remotegarage`, `swimpool`, `courtyard`, `fullyfenced`, `outsidespa`, `securepark`, `tenniscourt`, `spabovroundeg`, `alarmsys`, `biltinwardrobes`, `dvs`, `gym`, `intercom`, `rumpusroom`, `workshop`, `broadbandinternet`, `dishwasher`, `floorboards`, `insidespa`, `paytv`, `study`, `ac`, `heating`, `cooling`, `solarpower`, `solarhotwater`, `watertank`, `otherfeatures`, `headline`, `desc`, `vediourl`, `onlinetour1`, `onlinetour2`, `date`, `starttime`, `endtime`, `status`, `type`, `pricetype`, `dateadded`) VALUES
(17, 7, 2, 0, 3, 0, 0, 0, 0, 500000, b'1', '0000-00-00', 'Nimal Athukorala', 'nimal@gmail.com', '0777 852356', b'0', '123', '', '57/7', 'Dikmon Road', 'Kohuwala', 'Nugegoda', b'0', 5, 9, 4, 2, 0, 0, 0, 0, 0, 0, 1500, 2, 1400, 2, 0, 0, '', '', 0, '', '', '', 0, b'1', b'0', b'0', b'0', b'1', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1', b'1', '', 'Hose for Sale in Nugegoda', 'Immediate sale .', 'http://www.google.lk', 'http://www.youtube.com', 'http://', '2014-05-31', '10:00:00', '17:00:00', 0, 1, 1, '2014-05-23'),
(18, 7, 1, 0, 3, 0, 2000, 10000, 50000, 0, b'1', '2014-05-31', 'Kasun Mendis', 'kasun.m@yahoo.com', '0718 568925', b'0', '235', '', '21/71', 'School Lane', 'Moratumulla', 'Moratuwa', b'0', 5, 9, 3, 2, 0, 0, 0, 0, 0, 0, 2500, 1, 0, 0, 0, 0, '', '', 0, '', '', '', 0, b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'1', '', 'House for  Rent in Town Area', 'Good Condition House in Moratuwa.', 'http://', 'http://', 'http://', '2014-06-01', '09:00:00', '17:00:00', 0, 3, 1, '2014-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `propertyimages`
--

CREATE TABLE IF NOT EXISTS `propertyimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propertyid` int(11) NOT NULL,
  `imagename` varchar(200) NOT NULL,
  `imagetype` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `propertyid` (`propertyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `propertyimages`
--

INSERT INTO `propertyimages` (`id`, `propertyid`, `imagename`, `imagetype`) VALUES
(36, 17, 'two-floor-house.jpg', b'0'),
(37, 18, 'sloped-roof-house-kerala.jpg', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'Central'),
(2, 'Eastern'),
(3, 'North Central'),
(4, 'Northern'),
(5, 'North Western'),
(6, ' Sabaragamuwa'),
(7, 'Southern'),
(8, 'Uva'),
(9, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `passwordconf` varchar(20) NOT NULL,
  `usertype` int(11) NOT NULL,
  `parentuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `userimage` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `phone`, `address`, `email`, `username`, `password`, `passwordconf`, `usertype`, `parentuser`, `status`, `userimage`) VALUES
(1, 'admin', 'admin', '01123456788', 'colombo 5', 'info@myproperty.lk', 'admin', '123', '123', 0, 0, 1, '6025-ron.jpg'),
(2, 'danesh', 'manjula ', '0112705580', 'piliyandala', 'info@emodelslanka.com', 'danesh', '123', '123', 1, 0, 1, '929-4668300-3x4-700x933.jpg'),
(3, 'suresh', 'Jayasinghe', '0121212', 'colombo', 'agent@gamil.com', 'agent', '123', '123', 2, 0, 1, 'user_no_img.png'),
(14, 'advertiser', 'advertiser', '72732323', 'colombo ', 'advertiser@gmail.com', 'advertiser', '123', '123', 3, 0, 1, '5256-Select-an-agent.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`pricetype`) REFERENCES `pricelist` (`priceid`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`agent`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_ibfk_3` FOREIGN KEY (`province`) REFERENCES `province` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_ibfk_4` FOREIGN KEY (`district`) REFERENCES `district` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `propertyimages`
--
ALTER TABLE `propertyimages`
  ADD CONSTRAINT `propertyimages_ibfk_1` FOREIGN KEY (`propertyid`) REFERENCES `property` (`pid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2014 at 04:16 PM
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
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `proptype` int(11) NOT NULL,
  `propcondition` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `agent` int(11) NOT NULL,
  `authority` int(11) NOT NULL,
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
  `landsize` int(11) NOT NULL,
  `floorarea` int(11) NOT NULL,
  `squares` int(11) NOT NULL,
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
  `dh` bit(1) NOT NULL,
  `gh` bit(1) NOT NULL,
  `of` bit(1) NOT NULL,
  `sac` bit(1) NOT NULL,
  `dc` bit(1) NOT NULL,
  `ec` bit(1) NOT NULL,
  `hh` bit(1) NOT NULL,
  `rcac` bit(1) NOT NULL,
  `sh` bit(1) NOT NULL,
  `gws` bit(1) NOT NULL,
  `sp` bit(1) NOT NULL,
  `shw` bit(1) NOT NULL,
  `wt` bit(1) NOT NULL,
  `otherfeatures` varchar(200) NOT NULL,
  `headline` varchar(200) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `vediourl` varchar(200) NOT NULL,
  `onlinetour1` varchar(200) NOT NULL,
  `onlinetour2` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `phone`, `address`, `email`, `username`, `password`, `passwordconf`, `usertype`, `parentuser`, `status`, `userimage`) VALUES
(1, 'admin', 'admin', '0112345678823', 'colombo ', 'info@myproperty.lk', 'admin', '123', '123', 0, 0, 1, 'user_no_img.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

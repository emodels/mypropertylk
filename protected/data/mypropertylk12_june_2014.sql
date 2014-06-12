-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2014 at 02:25 PM
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
-- Table structure for table `homeideas`
--

CREATE TABLE IF NOT EXISTS `homeideas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `imagename` varchar(200) NOT NULL,
  `dateadded` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `homeideas`
--

INSERT INTO `homeideas` (`id`, `userid`, `category`, `title`, `imagename`, `dateadded`) VALUES
(5, 1, 5, 'Classic galley kitchen design using floorboards', '3742-kitchens (1).jpg', '2014-06-08'),
(6, 1, 5, 'Modern island kitchen design using floorboards', '7262-kitchens (2).jpg', '2014-06-08'),
(7, 1, 5, 'Modern island kitchen design using floorboards', '4450-kitchens (3).jpg', '2014-06-08'),
(8, 1, 1, 'Living Room ideas', '7101-living+areas (1).jpg', '2014-06-08'),
(9, 1, 1, ' New Living Room ideas ', '5513-living+areas (3).jpg', '2014-06-08'),
(10, 1, 2, 'Dining areas', '4014-dining+areas (2).jpg', '2014-06-08'),
(11, 1, 2, 'Dining areas new', '6659-dining+areas (1).jpg', '2014-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `inspecttime`
--

CREATE TABLE IF NOT EXISTS `inspecttime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property` int(11) NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inspectid` (`property`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

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
  `propcondition` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `agent` int(11) NOT NULL,
  `otheragent` int(11) NOT NULL,
  `weeklyrent` double NOT NULL,
  `monthlyrent` double NOT NULL,
  `securebond` double NOT NULL,
  `price` double NOT NULL,
  `dispalyprice` tinyint(1) NOT NULL,
  `availabledate` date NOT NULL,
  `vendorname` varchar(200) NOT NULL,
  `vendoremail` varchar(200) NOT NULL,
  `vendorphone` varchar(200) NOT NULL,
  `sendemail` tinyint(1) NOT NULL,
  `unitnum` varchar(100) NOT NULL,
  `lotnum` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `streetaddress` varchar(200) NOT NULL,
  `areaname` varchar(200) NOT NULL,
  `townname` varchar(200) NOT NULL,
  `hidestreetaddress` tinyint(1) NOT NULL,
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
  `balcony` tinyint(1) NOT NULL,
  `deck` tinyint(1) NOT NULL,
  `oea` tinyint(1) NOT NULL,
  `shed` tinyint(1) NOT NULL,
  `remotegarage` tinyint(1) NOT NULL,
  `swimpool` tinyint(1) NOT NULL,
  `courtyard` tinyint(1) NOT NULL,
  `fullyfenced` tinyint(1) NOT NULL,
  `outsidespa` tinyint(1) NOT NULL,
  `securepark` tinyint(1) NOT NULL,
  `tenniscourt` tinyint(1) NOT NULL,
  `spabovroundeg` tinyint(1) NOT NULL,
  `alarmsys` tinyint(1) NOT NULL,
  `biltinwardrobes` tinyint(1) NOT NULL,
  `dvs` tinyint(1) NOT NULL,
  `gym` tinyint(1) NOT NULL,
  `intercom` tinyint(1) NOT NULL,
  `rumpusroom` tinyint(1) NOT NULL,
  `workshop` tinyint(1) NOT NULL,
  `broadbandinternet` tinyint(1) NOT NULL,
  `dishwasher` tinyint(1) NOT NULL,
  `floorboards` tinyint(1) NOT NULL,
  `insidespa` tinyint(1) NOT NULL,
  `paytv` tinyint(1) NOT NULL,
  `study` tinyint(1) NOT NULL,
  `ac` tinyint(1) NOT NULL,
  `heating` tinyint(1) NOT NULL,
  `cooling` tinyint(1) NOT NULL,
  `solarpower` tinyint(1) NOT NULL,
  `solarhotwater` tinyint(1) NOT NULL,
  `watertank` tinyint(1) NOT NULL,
  `otherfeatures` varchar(200) NOT NULL,
  `headline` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `vediourl` varchar(500) NOT NULL,
  `onlinetour1` varchar(500) NOT NULL,
  `onlinetour2` varchar(500) NOT NULL,
  `entrydate` date NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `pricetype` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `pricetype` (`pricetype`),
  KEY `agent` (`agent`),
  KEY `district` (`district`),
  KEY `province` (`province`),
  KEY `otheragent` (`otheragent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `propcondition`, `owner`, `agent`, `otheragent`, `weeklyrent`, `monthlyrent`, `securebond`, `price`, `dispalyprice`, `availabledate`, `vendorname`, `vendoremail`, `vendorphone`, `sendemail`, `unitnum`, `lotnum`, `number`, `streetaddress`, `areaname`, `townname`, `hidestreetaddress`, `district`, `province`, `bedrooms`, `bathrooms`, `ensuites`, `toilets`, `parkgaragespaces`, `parkcarpetspaces`, `parkopenspaces`, `livingarea`, `housesize`, `housesquares`, `landsize`, `landsquares`, `floorarea`, `floorsquares`, `tenuretype`, `building`, `parkingspaces`, `parkcomment`, `zoning`, `outgoings`, `eer`, `balcony`, `deck`, `oea`, `shed`, `remotegarage`, `swimpool`, `courtyard`, `fullyfenced`, `outsidespa`, `securepark`, `tenniscourt`, `spabovroundeg`, `alarmsys`, `biltinwardrobes`, `dvs`, `gym`, `intercom`, `rumpusroom`, `workshop`, `broadbandinternet`, `dishwasher`, `floorboards`, `insidespa`, `paytv`, `study`, `ac`, `heating`, `cooling`, `solarpower`, `solarhotwater`, `watertank`, `otherfeatures`, `headline`, `desc`, `vediourl`, `onlinetour1`, `onlinetour2`, `entrydate`, `status`, `type`, `pricetype`) VALUES
(31, 1, 1, 70, 68, 0, 0, 0, 5000000, 1, '0000-00-00', 'Linda pieris', 'linda@yahoo.com', '0772589636', 0, '12', '', '123', 'main street', 'jaela', 'Wattala', 0, 7, 9, 2, 2, 0, 0, 2, 0, 0, 0, 1500, 1, 1700, 1, 0, 0, '', '', 0, '', '', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '11/17-31 Tanti Avenue Mornington', 'Macartans Place, Mornington\r\nDemonstrating a stellar combination of seaside position and high-end product, Macartans Place offers an exceptional series of townhouses, apartments and land with breathtaking water view residences which make the most of their orientation towards Port Phillip Bay.\r\n\r\nMeticulously designed to embrace comfort and functionality, the apartments at Macartans Place offer luxurious timber floors accenting the architecturally designed features of each home, while sound proofing and double glazing ensure your privacy.\r\n\r\nFitted to international standards, each apartments kitchen features Smeg and Miele appliances highlighted with stone bench tops, while functional bathrooms are dressed in fine Italian tiles and an abundance of well-appointed fittings. Full inclusions lists available on request.\r\n', 'http://', 'http://', 'http://', '2014-06-06', 1, 1, 3),
(32, 2, 68, 70, 68, 0, 0, 0, 200000, 1, '0000-00-00', 'Saman Alwis', 'samanal@gmail.com', '03422258693', 0, '', '10', '25/10', 'temple lane', 'Kaluthara South', 'Kaluthara', 0, 10, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1820, 1, 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'EAGLES NEST', 'Without doubt one of South Perths finest blocks, perched at what is probably South Perths highest point!\r\nWith stunning 360 degree views from Perth City to the hills, across to Applecross and down the river to Fremantle. \r\nLocated on 1012sqm of prime South Perth land, this is a once in a lifetime opportunity to secure this very rare offering to build your dream home. \r\n\r\nAll enquiries to the exclusive selling agent Lee Riddell\r\nView Sold Properties for this Location\r\nView Auction Results', 'http://', 'http://', 'http://', '2014-06-06', 2, 2, 3),
(34, 2, 1, 68, 70, 0, 0, 0, 8000000, 1, '0000-00-00', 'Nilesh Sooriyaarachchi', 'nilesh@gmai.com', '0776325698', 0, '126', '', '41/8', 'Vidyala Mawatha', 'Kohuwala', 'Nugegoda', 0, 5, 9, 3, 2, 0, 0, 2, 0, 0, 0, 1850, 1, 2000, 1, 0, 0, '', '', 0, '', '', '', 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, '', 'A Lifestyle That''s a Walk in the Park', 'Epitomising contemporary style and executive class this rare offering of 4 brand new townhouses (off plan) in this superb Doncaster East catchment represents significant lifestyle appeal to professionals, first home buyers, investors and those keen for a slice of this exciting way of life. \r\n<br/>\r\nChoose to be street front or tucked at the rear with all residences assuring discrete entry and privacy, set in low maintenance gardens. Delivering spacious, sunlit open plan living with alfresco area, premium Kitchen with Ilve appliances and luxurious bathrooms (frameless showerscreens and deluxe fittings). \r\n<br/>\r\nWalk to Jackson Court shops and restaurants and expend energy at Doncaster Reserve and nearby parkland. Zoned to Doncaster Gardens Primary, St Peter & St Paul''s Catholic Primary and East Doncaster Secondary. Short drive to Westfield Doncaster and Tunstall Square. Minutes to transport and the freeway. All homes enjoy savings on stamp duty and split system heating/cooling, polished floorboards, powder room, storage and laundry. Inspect today!', 'http://', 'http://', 'http://', '2014-06-06', 1, 1, 3),
(35, 1, 68, 68, 70, 4000, 20000, 100000, 0, 1, '2014-06-20', 'Senadhi Athukorala', 'senadhi@gmail.com', '077458963', 0, '78', '', '105/78', 'Flower Road ', 'colombo 3', 'Colombo', 0, 5, 9, 2, 1, 0, 0, 2, 0, 0, 1, 1004, 1, 0, 0, 0, 0, '', '', 0, '', '', '', 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, '', 'BRAND NEW APARTMENTS!! ', 'Located in the just completed Saffron Apartments, these stunning designer apartments offer generous floor plans and an extremely convenient location. \r\n<br/>\r\nNewly released, these two bedrooms and one bedroom apartments all feature smartly designed interiors with stainless steel Blanco appliances, Stone Bench tops and high quality timber floors. Each apartment features its own private balcony, secure garage parking and storage cage. Offering an amazing lifestyle location with Highett Road Shops, Southland Shopping Centre and Highett Train Station moments away.\r\n<br/>\r\nWith 1 bedroom apartments starting from $330 per and two bedroom starting from $340 per week these apartments will not last long.', 'http://', 'http://', 'http://', '2014-06-08', 1, 3, 3),
(36, 1, 1, 68, 70, 0, 0, 0, 200000, 1, '0000-00-00', 'Haris Perera', 'haris@ahoo.comy', '077892536', 0, '', '', '56', 'Main Street', 'Colombo 2', 'Colombo', 0, 5, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5000, 1, 1850, 1, '', '', 10, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Whole Floor Office on Melbourne''s Most Exclusive Boulevard', 'Whole Floor of 358sqm <br/>\r\nFully-Fitted <br/>\r\nTwo (2) Secure Car parks <br/>', 'http://', 'http://', 'http://', '2014-06-09', 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `propertyimages`
--

CREATE TABLE IF NOT EXISTS `propertyimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propertyid` int(11) NOT NULL,
  `imagename` varchar(200) NOT NULL,
  `imagetype` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `propertyid` (`propertyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=184 ;

-- --------------------------------------------------------

--
-- Table structure for table `propertytype`
--

CREATE TABLE IF NOT EXISTS `propertytype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proptype` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `propertytype`
--

INSERT INTO `propertytype` (`id`, `proptype`) VALUES
(1, 'Acreage/Semi-Rural'),
(2, 'Alpine'),
(3, 'Apartment'),
(4, 'Block Of Units'),
(5, 'Duplex/Semi-detached'),
(6, 'Flat'),
(7, 'House'),
(8, 'Retirement Living'),
(9, 'Serviced Apartment'),
(10, 'Studio'),
(11, 'Terrace'),
(12, 'Unit'),
(13, 'Villa'),
(14, 'Land'),
(15, 'Offices'),
(16, 'Retail'),
(17, 'Industrial / Warehouses'),
(18, 'Showrooms'),
(19, 'Land / Development'),
(20, 'Hotel / Leisure'),
(21, 'Medical / Consulting'),
(22, 'Commercial Farming'),
(23, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `propertytyperelation`
--

CREATE TABLE IF NOT EXISTS `propertytyperelation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propertyid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `propertyid` (`propertyid`,`typeid`),
  KEY `typeid` (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `phone`, `address`, `email`, `username`, `password`, `passwordconf`, `usertype`, `parentuser`, `status`, `userimage`) VALUES
(1, 'Admin', 'System', '01123456788', 'colombo 5', 'info@myproperty.lk', 'admin', '123', '123', 0, 1, 1, '7645-dwg.jpeg'),
(67, 'danesh', 'manjula', '0714272747', '57/1, Sri Devananada Rd, Piliyandala', 'info@gmail.com', 'dan', '123', '123', 1, 67, 1, '3718-11847375-mark-spain-newest-photo.jpeg'),
(68, 'suresh', 'jayasinghe', '0779562863', 'N0.23, Jayasinghe Mv, Kandy', 'sureshj@yahoo.com', 'suresh', '123', '123', 2, 68, 1, '6602-113.jpeg'),
(69, 'Nisha', 'Perera', '0778659535', 'N0.123/45, New Kandy rd, Malabe', 'nishap@gmail.com', 'nisha', '123', '123', 3, 69, 1, '9687-Select-an-agent2.jpeg'),
(70, 'Nihal', 'Mendis', '0772458695', 'N0.78/23, Main Street, Colombo 05', 'nihalmendis@yahoo.com', 'nihal', '123', '123', 2, 68, 1, '3577-ron.jpeg'),
(71, 'sdsd', 'dsds', 's112', 'ssd', 'dsds', 'dsd', '123', '123', 1, 1, 0, 'user_no_img.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `homeideas`
--
ALTER TABLE `homeideas`
  ADD CONSTRAINT `homeideas_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inspecttime`
--
ALTER TABLE `inspecttime`
  ADD CONSTRAINT `inspecttime_ibfk_1` FOREIGN KEY (`property`) REFERENCES `property` (`pid`) ON DELETE CASCADE;

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

--
-- Constraints for table `propertytyperelation`
--
ALTER TABLE `propertytyperelation`
  ADD CONSTRAINT `propertytyperelation_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `propertytype` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `propertytyperelation_ibfk_2` FOREIGN KEY (`propertyid`) REFERENCES `property` (`pid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

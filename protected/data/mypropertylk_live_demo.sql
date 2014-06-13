-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2014 at 06:50 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `inspecttime`
--

INSERT INTO `inspecttime` (`id`, `property`, `date`, `starttime`, `endtime`) VALUES
(1, 38, '2014-06-28', '10:00:00', '17:00:00'),
(2, 38, '2014-06-29', '10:00:00', '12:00:00'),
(3, 39, '2014-06-21', '08:00:00', '18:00:00'),
(4, 40, '2014-06-29', '08:00:00', '14:00:00'),
(5, 42, '2014-06-14', '09:00:00', '16:00:00'),
(6, 44, '2014-06-28', '10:00:00', '15:00:00'),
(7, 47, '0000-00-00', '00:00:00', '00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `propcondition`, `owner`, `agent`, `otheragent`, `weeklyrent`, `monthlyrent`, `securebond`, `price`, `dispalyprice`, `availabledate`, `vendorname`, `vendoremail`, `vendorphone`, `sendemail`, `unitnum`, `lotnum`, `number`, `streetaddress`, `areaname`, `townname`, `hidestreetaddress`, `district`, `province`, `bedrooms`, `bathrooms`, `ensuites`, `toilets`, `parkgaragespaces`, `parkcarpetspaces`, `parkopenspaces`, `livingarea`, `housesize`, `housesquares`, `landsize`, `landsquares`, `floorarea`, `floorsquares`, `tenuretype`, `building`, `parkingspaces`, `parkcomment`, `zoning`, `outgoings`, `eer`, `balcony`, `deck`, `oea`, `shed`, `remotegarage`, `swimpool`, `courtyard`, `fullyfenced`, `outsidespa`, `securepark`, `tenniscourt`, `spabovroundeg`, `alarmsys`, `biltinwardrobes`, `dvs`, `gym`, `intercom`, `rumpusroom`, `workshop`, `broadbandinternet`, `dishwasher`, `floorboards`, `insidespa`, `paytv`, `study`, `ac`, `heating`, `cooling`, `solarpower`, `solarhotwater`, `watertank`, `otherfeatures`, `headline`, `desc`, `vediourl`, `onlinetour1`, `onlinetour2`, `entrydate`, `status`, `type`, `pricetype`) VALUES
(38, 1, 72, 75, 76, 0, 0, 0, 5000000, 1, '0000-00-00', 'Senadhi Athukorala', 'senadhi@gmail.com', '0778958693', 0, '123', '', '75/4', 'Railway Avenue', 'Nugegoda West', 'Nugegoda', 0, 5, 9, 3, 2, 0, 0, 2, 0, 0, 0, 1250, 1, 1400, 1, 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, '', 'House for Family', 'On occasion, a home appears on the market that is distinctly positioned in a league of its own; a home crafted to such perfection that it transcends conventional living. This breathtaking Peter Carmichael-designed residence is one such home.\r\n\r\nNestled amongst Beth Higgs'' inspired Japanese garden, one very lucky buyer therefore has the chance to secure one of Bulleen''s most picturesque and captivating homes.\r\n\r\nAs you''d expect from such a meticulously designed home, top quality fixtures and finishes are omnipresent throughout the striking split-level layout, hallmarked by its architectural brilliance, views of the city skyline and practicality for modern family living.\r\n\r\nSoaring Cedar-lined Cathedral ceilings accentuate the height and space of the radiant lounge on entry, warmed by a solid fuel stove and seamlessly integrating with a private and sheltered entertaining area to create idyllic indoor-outdoor options.\r\n\r\nHigh windows play the role of filling the flowing interior with loads of natural light, along with inviting a pleasant garden outlook into every room.', 'http://', 'http://', 'http://', '2014-06-13', 1, 1, 3),
(39, 1, 72, 75, 0, 0, 0, 0, 200000, 1, '0000-00-00', 'damith gamage', 'damith@yahoo.com', '0778458695', 0, '1178', '', '25/7', 'Vihara Mawatha', 'Diwulapitiya', 'Pepiliyana', 0, 5, 9, 3, 1, 0, 0, 1, 0, 0, 0, 1125, 1, 1250, 1, 0, 0, '', '', 0, '', '', '', 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 'Architectural Brilliance In A Premium Bulleen Pocket', 'A flawless contemporary masterwork of light, style and tranquility, this exquisite family sanctuary has been architecturally designed to embrace its natural surrounds while gazing out over the breathtaking expanse of Yowie Bay to The Royal National Park.\r\n- Private 3,329 sqm deep waterfront parcel, jetty and boatshed\r\n- Fluid living spaces spill out to infinity pool and balconies\r\n- Gourmet induction kitchen equipped with European appliances\r\n- Fully equipped entertainment terrace sheltered by operable Vergola\r\n- C-Bus technology for lighting, audio, security and climate\r\n- Premium bespoke finishes of Travertine, glass and hardwood\r\n- Ensuites, walk-ins, one bedroom retreat with a sound studio\r\n- Commercial grade cool room, rainwater tanks, water feature\r\n- Double automated garge, double carport and visitor parking\r\n- Catchment for Yowie Bay Public and close to Miranda Fair', 'http://', 'http://', 'http://', '2014-06-13', 1, 1, 3),
(40, 1, 72, 75, 0, 0, 0, 0, 560000, 1, '0000-00-00', 'mahesh peiris', 'mahesh@gmail.com', '0774586936', 0, '', '14', '20/14', 'Vidya Mawatha', 'colombo 03', 'Colombo', 0, 5, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1500, 1, 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Land for Sale Immediatly', 'There’s a whole lot to look forward to at Sienna Wood. We’re creating a place that celebrates community and connectivity - a place where families have all they need to live better, brighter lives. Where a buzzing central community hub will form the heart of a greater residential village connected by beautiful, natural landscaping.\r\n\r\nSienna Wood is located in the suburbs of Hilbert and Haynes, the up-and-coming South East suburbs of Perth. Nestled at the foot of the Darling Hills, Sienna Wood has the Wungong River gently winding its way through the community.\r\n\r\nThis is an ideal location for anyone wishing to buy House and Land in Perth. The Haynes and Armadale shopping centres are conveniently close, and the nearby Tonkin Highway and train station provide an easy link to Perth and beyond. Sienna Wood is well placed to give you the best of both worlds: peace and tranquillity at home, with great connections to the rest of Perth.\r\n\r\nOur new 18 home display village is now open and hosts a number of display homes built by WA’s leading builders. Our village gives you the opportunity to browse the latest and best in home designs, innovation and sustainability.', 'http://', 'http://', 'http://', '2014-06-13', 1, 2, 3),
(41, 2, 76, 76, 0, 5000, 20000, 150000, 0, 1, '2014-06-28', 'shriyani Fernandoo', 'shriyani@gmail.com', '0112456987', 0, '124', '', '52/78', 'Daya Road', 'Wellawatte', 'Colombo 06', 0, 5, 9, 3, 2, 0, 0, 2, 0, 0, 0, 1250, 1, 0, 0, 0, 0, '', '', 0, '', '', '', 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, '', 'One Week Free!!!', 'Inspired by space and modern living, 28 Miranda Road Reservoir delivers three (3) spacious single level town residences as an exceptional example of quality and design. \r\n\r\nThese three-bedroom homes consist of 14 squares, 2.7m ceiling height of North East facing rooms designed to capture natural sun light. Double shower ensuite attached to the generous master bedroom offers unparalleled comfort; high gloss finish kitchen adjacent the expansive living room that opens onto the landscaped patio is sure to impress. \r\n\r\nNicely secured in a tree-lined street whilst only a stone throw away from burgeoning settings, 28 Miranda Road is ideally positioned minutes'' drive away from Broadway, Northland Shopping Centre, and Preston Market; within walking distance to Parklands, Schools and Church; as well as having Bus access at its doorsteps, and short distance from Reservoir Train Station and Plenty Road Trams.\r\n', 'http://', 'http://', 'http://', '2014-06-13', 1, 3, 3),
(42, 2, 1, 1, 0, 0, 0, 0, 750000, 1, '0000-00-00', 'Kasun Perera', 'kasunp@yahoo.com', '0115486935', 0, '', '', '412/78', 'Galle Road', 'Bambalapitiy', 'Colombo 05', 0, 5, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1500, 1, 1000, 1, '', '', 5, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Suitable for Office or Showroom...!', 'Boutique Two-Level CBD Office\r\n\r\nTop Two Office Floors<br/>\r\nPrime Collins Street Address<br/>\r\nFantastic Natural Light and Views<br/>', 'http://', 'http://', 'http://', '2014-06-13', 1, 4, 3),
(44, 1, 75, 75, 0, 50000, 200000, 400000, 0, 1, '0000-00-00', 'William Smith', 'williamsmith@gmail.com', '0115486935', 0, '', '', '589', 'Jawatta Road', 'colombo 07', 'colombo', 0, 5, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2015, 1, 1785, 1, '', '', 10, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Excellent  place for Commercial idea', 'Stunning top floor office with expansive balcony and lock up storeroom.\r\n\r\nModern office with large private balcony<br/>\r\nOptional furnishings<br/>\r\nOffice and open plan<br/>', 'http://', 'http://', 'http://', '2014-06-13', 1, 5, 3),
(45, 1, 77, 77, 0, 6250, 25000, 100000, 0, 1, '2014-06-27', 'Sidath de Silva', 'sidathsilva@gmail.com', '07784569875', 0, '147', '', '45/7', 'Havelock Road', 'Galle', 'Galle', 0, 6, 7, 4, 2, 0, 0, 2, 0, 0, 0, 1426, 1, 0, 0, 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 'Apartment for rent', 'As the burgeoning City of Perth continues its transformation to a vibrant lifestyle destination accented by boutique eateries, laneway bars, chic cafes and distinctive shopping precincts, inner city living has never been more attractive.\r\n\r\n288 Lord Street is set to emerge as a coveted City address. Positioned on the fringe of the CBD, yet surrounded by leafy streets and parks. Within just 5 minutes'' drive to the city with direct proximity to public transport, convenience becomes a way of everyday life and no longer a wistful pipe dream.\r\n\r\n288 Lord comprises of just 68 apartments with a mix of spacious one and two bedroom layouts, with many capturing expansive views of the city.\r\n\r\nWith demand for city living continuing to rise at astounding levels, we encourage you to carefully consider this exceptional residential lifestyle offering.', 'http://', 'http://', 'http://', '2014-06-13', 1, 3, 3),
(46, 1, 1, 1, 0, 0, 0, 0, 5000000, 1, '0000-00-00', 'David Peiris', 'david@yahoo.com', '0778458697', 0, '', '', '458', 'Kottawa Road', 'Pelawatte', 'Battaramulla', 0, 5, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1425, 1, 1023, 1, '', '', 5, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Commercial Property for sale', '\r\nTO BE SOLD ''IN ONE LINE'' WITH STRONG INCOME STREAM\r\n\r\nIn One Line Sale with Income\r\nNRAS incentives\r\nEOI Sale 27/05/2014, 5pm\r\n', 'http://', 'http://', 'http://', '2014-06-13', 2, 4, 1),
(47, 2, 1, 1, 0, 0, 0, 0, 680000, 1, '0000-00-00', 'Karunarathne Gamage', 'karugamage@gmail.com', '077145236589', 0, '789', '', '78/7', 'Galle Road', 'Katukurunda', 'Kaluthara', 0, 10, 9, 3, 2, 0, 0, 2, 0, 0, 0, 1463, 1, 1589, 1, 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 'House for sale in Town Area', 'As the burgeoning City of Perth continues its transformation to a vibrant lifestyle destination accented by boutique eateries, laneway bars, chic cafes and distinctive shopping precincts, inner city living has never been more attractive.\r\n\r\n288 Lord Street is set to emerge as a coveted City address. Positioned on the fringe of the CBD, yet surrounded by leafy streets and parks. Within just 5 minutes'' drive to the city with direct proximity to public transport, convenience becomes a way of everyday life and no longer a wistful pipe dream.\r\n\r\n288 Lord comprises of just 68 apartments with a mix of spacious one and two bedroom layouts, with many capturing expansive views of the city.\r\n\r\nWith demand for city living continuing to rise at astounding levels, we encourage you to carefully consider this exceptional residential lifestyle offering.', 'http://', 'http://', 'http://', '2014-06-13', 2, 1, 3),
(48, 1, 72, 75, 0, 3000, 12000, 50000, 0, 1, '2014-06-27', 'Navin Dissanayake', 'navin@gamil.com', '077458698', 0, '563', '', '25/7', 'New Kandy Road', 'Malabe', 'malabe', 0, 5, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '2014-06-13', 1, 3, 1),
(49, 1, 72, 75, 0, 3000, 12000, 50000, 0, 1, '2014-06-27', 'Navin Dissanayake', 'navin@gamil.com', '07785964222', 0, '568', '', '25/8', 'New Kandy Road', 'Malabe', 'malabe', 0, 5, 9, 3, 2, 0, 0, 1, 0, 0, 0, 1523, 1, 0, 0, 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 'New House for rent', 'The Nolan building being one of few towers in Docklands to offer double glazing as well as a range of quality finishings, Apartment 403 has several upgraded benefits. Including a marble kitchen with an island bench facing out to a 40sqm North facing courtyard. A wonderful property if you have children, pets or simply would like a peaceful garden. Two double bedrooms each with their own bathroom makes offering overnight guests a convenient set up. Not only does 403 present immaculately, beneath the presentation lies exceptional condition. Master bedroom has a walk-in-robe, ensuite as well as access to the courtyard. A separate laundry room makes keeping those chores hidden away a lot easier too. The Nolan has residents communal gardens, lap pool, gym and lounge room. An inner city garden apartment in this condition is a rarity. Soon to benefit from Western Park Sports centre and bridge link to Victoria harbour, this waterfront property is safe to say will most likely hold its value for a long time to come...Please call to arrange a private inspection.\r\n', 'http://', 'http://', 'http://', '2014-06-13', 1, 3, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=237 ;

--
-- Dumping data for table `propertyimages`
--

INSERT INTO `propertyimages` (`id`, `propertyid`, `imagename`, `imagetype`) VALUES
(188, 38, 'image_38_1402629277.jpg', 0),
(189, 38, 'image_38_1402629283.jpg', 0),
(190, 38, 'image_38_1402629286.jpg', 0),
(191, 39, 'image_39_1402629580.jpg', 0),
(192, 39, 'image_39_1402629586.jpg', 0),
(193, 39, 'image_39_1402629589.jpg', 0),
(194, 39, 'image_39_1402629593.jpg', 0),
(195, 39, 'image_39_1402629601.jpg', 0),
(196, 39, 'image_39_1402629605.jpg', 1),
(197, 40, 'image_40_1402629986.jpg', 0),
(198, 40, 'image_40_1402629989.jpg', 0),
(199, 40, 'image_40_1402629992.jpg', 0),
(200, 40, 'image_40_1402629999.jpg', 0),
(201, 41, 'image_41_1402630249.jpg', 0),
(202, 41, 'image_41_1402630261.jpg', 0),
(203, 41, 'image_41_1402630264.jpg', 0),
(204, 41, 'image_41_1402630266.jpg', 0),
(205, 41, 'image_41_1402630269.jpg', 0),
(206, 41, 'image_41_1402630278.jpg', 0),
(207, 42, 'image_42_1402630595.jpg', 0),
(209, 42, 'image_42_1402630619.jpg', 0),
(210, 42, 'image_42_1402630644.jpg', 0),
(211, 42, 'image_42_1402630647.jpg', 0),
(212, 44, 'image_44_1402631507.jpg', 0),
(213, 44, 'image_44_1402631517.jpg', 0),
(214, 44, 'image_44_1402631522.jpg', 0),
(215, 44, 'image_44_1402631528.jpg', 0),
(216, 44, 'image_44_1402631538.jpg', 0),
(217, 44, 'image_44_1402631561.jpg', 0),
(218, 45, 'image_45_1402632189.jpg', 0),
(219, 45, 'image_45_1402632193.jpg', 0),
(220, 45, 'image_45_1402632196.jpg', 0),
(221, 45, 'image_45_1402632206.jpg', 0),
(223, 45, 'image_45_1402632226.jpg', 0),
(224, 46, 'image_46_1402632675.jpg', 0),
(225, 46, 'image_46_1402632689.jpg', 0),
(226, 46, 'image_46_1402632696.jpg', 0),
(227, 46, 'image_46_1402632707.jpg', 0),
(228, 47, 'image_47_1402632990.jpg', 0),
(229, 47, 'image_47_1402632999.jpg', 0),
(231, 47, 'image_47_1402633020.jpg', 0),
(232, 47, 'image_47_1402633028.jpg', 0),
(233, 49, 'image_49_1402634942.jpg', 0),
(234, 49, 'image_49_1402634945.jpg', 0),
(235, 49, 'image_49_1402634954.jpg', 0),
(236, 49, 'image_49_1402634964.jpg', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `propertytyperelation`
--

INSERT INTO `propertytyperelation` (`id`, `propertyid`, `typeid`) VALUES
(2, 38, 7),
(4, 39, 7),
(5, 40, 14),
(6, 41, 7),
(7, 42, 15),
(8, 42, 18),
(13, 44, 15),
(14, 45, 3),
(15, 46, 15),
(16, 46, 21),
(17, 47, 7),
(18, 48, 7),
(19, 49, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `phone`, `address`, `email`, `username`, `password`, `passwordconf`, `usertype`, `parentuser`, `status`, `userimage`) VALUES
(1, 'Admin', 'System', '01123456788', 'colombo 5', 'info@myproperty.lk', 'admin', '123', '123', 0, 1, 1, '7645-dwg.jpeg'),
(72, 'Suresh', 'jayasinghe', '077895623', '54/8, Nawam Mawatha, Colombo 03', 'sureshj@yahoo.com', 'suresh', '123', '123', 2, 1, 1, '1768-113.jpeg'),
(75, 'Namal', 'Subasinghe', '0772458695', 'No. 546/6, New Kandy Rd, Malabe', 'namal.s@gmail.com', 'namal', '123', '123', 2, 72, 1, '2120-11847375-mark-spain-newest-photo.jpeg'),
(76, 'Nisha', 'Ranasinghe', '0778659535', 'No.78/5, Nawala Road, Nugoda', 'nisha@gmail.com', 'nisha', '123', '123', 2, 72, 1, '7630-Select-an-agent2.jpeg'),
(77, 'sidath', 'de silava', '011584689', '45/7, Lower Dickson Road, Galle', 'sidathsilva@gmail.com', 'sidath', '123', '123', 1, 0, 1, '9756-oren-alexander-real-estate-agent.jpg');

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

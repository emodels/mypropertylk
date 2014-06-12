-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2014 at 03:06 PM
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

--
-- Dumping data for table `inspecttime`
--

INSERT INTO `inspecttime` (`id`, `property`, `date`, `starttime`, `endtime`) VALUES
(39, 47, '2014-06-21', '08:00:00', '17:00:00'),
(40, 49, '2014-06-20', '10:00:00', '14:00:00'),
(41, 49, '2014-06-21', '10:00:00', '14:00:00'),
(42, 50, '2014-06-28', '07:00:00', '16:00:00'),
(43, 52, '2014-06-29', '08:00:00', '17:00:00'),
(44, 55, '2014-06-28', '09:00:00', '18:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `propcondition`, `owner`, `agent`, `otheragent`, `weeklyrent`, `monthlyrent`, `securebond`, `price`, `dispalyprice`, `availabledate`, `vendorname`, `vendoremail`, `vendorphone`, `sendemail`, `unitnum`, `lotnum`, `number`, `streetaddress`, `areaname`, `townname`, `hidestreetaddress`, `district`, `province`, `bedrooms`, `bathrooms`, `ensuites`, `toilets`, `parkgaragespaces`, `parkcarpetspaces`, `parkopenspaces`, `livingarea`, `housesize`, `housesquares`, `landsize`, `landsquares`, `floorarea`, `floorsquares`, `tenuretype`, `building`, `parkingspaces`, `parkcomment`, `zoning`, `outgoings`, `eer`, `balcony`, `deck`, `oea`, `shed`, `remotegarage`, `swimpool`, `courtyard`, `fullyfenced`, `outsidespa`, `securepark`, `tenniscourt`, `spabovroundeg`, `alarmsys`, `biltinwardrobes`, `dvs`, `gym`, `intercom`, `rumpusroom`, `workshop`, `broadbandinternet`, `dishwasher`, `floorboards`, `insidespa`, `paytv`, `study`, `ac`, `heating`, `cooling`, `solarpower`, `solarhotwater`, `watertank`, `otherfeatures`, `headline`, `desc`, `vediourl`, `onlinetour1`, `onlinetour2`, `entrydate`, `status`, `type`, `pricetype`) VALUES
(47, 1, 0, 68, 70, 0, 0, 0, 500000, 1, '0000-00-00', 'Senadhi Athukorala', 'senadhi@gmail.com', '0776325698', 0, '152', '', '57/81', 'Main Street', 'colombo 2', 'colombo', 0, 5, 9, 3, 2, 0, 0, 0, 0, 0, 0, 1500, 1, 1800, 1, 0, 0, '', '', 0, '', '', '', 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, '', 'House For Sale in Colombo 2', 'Quietly ensuring enviable lifestyle appeal with its stylish good looks and fabulous location in iconic St Kilda, this brilliant urban pad will captivate a variety of purchasers. Cleverly designed to maximise the area, the spaciousness of this impeccably presented apartment adds even further appeal. Highlighted with rich parquetry flooring, the substantial living and dining area invites comfort and enjoys access to a covered balcony. Set off the lounge, a sparkling kitchen is superbly appointed with a stainless-steel gas cooktop, electric oven, range hood and dishwasher, perfect for creating a gourmet feast on the nights you want to stay in! Two sizeable bedrooms are complemented with mirrored built-in robes and serviced by a chic bathroom with full-height tiling and laundry facilities. A secure entrance with intercom entry plus a secure car space concludes. Positioned moments to leafy Alma Park, iconic Chapel Street with its boutique shopping, dining and entertainment venues, various tram routes and Windsor Station, Carlisle St and St Kildas array of amenities and recreational facilities nearby, inspect today!', 'http://', 'http://', 'http://', '2014-06-11', 1, 1, 3),
(49, 2, 0, 68, 70, 0, 0, 0, 6850000, 1, '0000-00-00', 'damith gamage', 'damith@yahoo.com', '077895623', 0, '158', '', '57/8', 'Flower Road ', 'colombo 3', 'colombo', 0, 5, 9, 4, 2, 0, 0, 0, 0, 0, 0, 2500, 1, 2860, 1, 0, 0, '', '', 0, '', '', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, '', 'New House for Sale ', 'Full of space and family appeal, this versatile three bedroom home on a desirable corner allotment is perfectly positioned for a convenient modern lifestyle. Boasting rare street presence on a sought after 700 square metre block in the heart of the beautiful and thriving Plympton Park, this is a must see for first home owners, families and investors alike. In a location just 8km from the city and a short drive or bike ride to Glenelg beach and Marion shopping centre, this wonderful family home has everything here to simply lock up and leave but with scope to add further value and make even more special.\r\n', 'http://', 'http://', 'http://', '2014-06-11', 1, 1, 3),
(50, 1, 0, 68, 70, 0, 0, 0, 0, 1, '0000-00-00', 'Parakrama Perera', 'parakrama@gmail.com', '077458936', 0, '123', '', '52', 'School Lane', 'colombo 3', 'Colombo', 0, 5, 9, 2, 2, 0, 0, 2, 0, 0, 0, 1400, 1, 5500, 1, 0, 0, '', '', 0, '', '', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, '', 'Too Many Real Estate Cliches For One Heading. You Simply Must Inspect This Property.', 'If you''re looking for a property that is two minutes from the popular Chirn Park restaurant precinct, two minutes from the Broadwater, two minutes from Southport CBD, and only ten minutes from Surfers Paradise, Harbour Town and more, then 3/27 Walton Street, Southport is what you''ve been looking for. \r\n\r\nFeatures include:\r\n\r\nTwo bedrooms, two bathrooms, two car spaces (separate)\r\nMaster with ensuite, split system air-con, mirrored built-ins\r\nDesigner kitchen with AEG™ stainless steel appliances\r\nReverse cycle split system air-con in main living\r\nThe open plan design flows out perfectly to your private courtyard\r\nCeiling fans throughout, CrimSafe security screens\r\nInground pool, On-site manager, PET FRIENDLY\r\nBody-Corp $70 per week (approximately)\r\nFull security intercom system, garage access\r\nOne of the best streets in Southport\r\nClose to schools, shops, public transport & medical centres\r\nInspection is highly recommended.', 'http://', 'http://', 'http://', '2014-06-11', 1, 1, 3),
(51, 1, 0, 70, 68, 0, 0, 0, 150000, 1, '0000-00-00', 'Sanath Jayasooriya', 'sanathj@gamil.com', '0772584698', 0, '', '25', '52/25', 'Galle Road', 'Galle ', 'Galle', 0, 6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1500, 1, 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Land For Sale Immediatly', 'Presenting the last remaining parcel of land measuring 512.43 m2 (approx.), located in one of Wantirna''s newest pockets. Positioned in the bowl of a prime cul de sac surrounded by an enclave of stunning modern homes and only moments to shops, 5 schools, parkland and Eastlink, this is a rare opportunity for someone to build their dream home in a private contemporary estate offering the advantage of a stunning backdrop of the picturesque reserve (STCA). This low maintenance and level parcel of land will become someone''s field of dreams. ', 'http://', 'http://', 'http://', '2014-06-11', 1, 2, 2),
(52, 2, 0, 68, 70, 0, 0, 0, 2500000, 1, '0000-00-00', 'manjula Peris', 'manjula@gmail.com', '0112458973', 0, '12', '', '75/4', 'Horana Road', 'Miriswathttha ', 'Piliyandala', 0, 5, 9, 2, 1, 0, 0, 1, 0, 0, 0, 1250, 1, 1350, 1, 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', 'Four Luxurious Town Residences', 'Brilliantly located and truly boutique. Only four town residences \r\nbeing built. These fantastic homes are sure to impress. All to be built by well-known and highly admired builder. These homes offer both practical and sensual design elements that are all too rarely seen.Features solid timber flooring to light-filled living areas on the ground level, \r\ngorgeous decor chefs kitchens with stone bench tops. Attractive bathrooms, \r\npowder rooms and overall smartly designed layouts that are both \r\ngenerous and user friendly as well as r/c lock up garage and so much more.\r\nCall or email George to run through this amazing project in more detail\r\n0425 865 882 gantonopoulos@hockingstuart.com.au\r\n', 'http://', 'http://', 'http://', '2014-06-11', 2, 1, 3),
(53, 2, 0, 68, 70, 5000, 20000, 100000, 0, 1, '2014-06-20', 'shriyani Fernandoo', 'shriyani@gmail.com', '0776353598', 0, '45', '', '128/7', 'New Kandy Road', 'Thalangama', 'Baththaramulla', 0, 5, 9, 4, 2, 0, 0, 2, 0, 0, 0, 1258, 1, 0, 0, 0, 0, '', '', 0, '', '', '', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'ONE WEEKS RENT FREE!', 'This property is designed with the family in mind, plenty of room to move with separate areas for everyone, there’s even a theatre room.\r\n• Fully air conditioned for comfort\r\n• Large theatre room for your family movie nights\r\n• Tiled through out for cool tropical living\r\n• Master bedroom has and ensuite and plenty of wardrobes\r\n• Ample size bedrooms with built in robes\r\n• Kitchen is an entertainers delight with quality through out and plenty of bench space \r\n• The living area opens out to the back patio giving you even more room\r\n• Fully fence yard\r\n• Pets negotiable on application\r\n• Double lock up garage \r\nBuilt by award winning Overlander Homes that says it all. Quality and space. \r\nRaine & Horne DO NOT accept 1form applications, if you would like to apply for a Raine & Horne property, please contact our office via the ‘email agent button’ and we will forward you the necessary documents.\r\n', 'http://', 'http://', 'http://', '2014-06-11', 1, 3, 3),
(55, 1, 0, 70, 68, 24000, 60000, 150000, 0, 1, '0000-00-00', 'Saman Alwis', 'samanal@gmail.com', '0114586932', 0, '', '', '152', 'Flower Road', 'Colombo3', 'colombo', 0, 5, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3000, 1, 1523, 1, '', '1', 5, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'BLUE-CHIP INVESTMENT LEASED UNTIL 2020', '5 year old ''A'' Grade office building - 5 star NABERS & 4.5 Star Water\r\n7,000sqm with 107 secure car bays\r\nAdjoining 2,396sqm development site\r\nING Australia (100% ANZ owned) lease - 95% of $2.7m net income pa\r\nSignificant building depreciation allowances', 'http://', 'http://', 'http://', '2014-06-11', 1, 5, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `propertyimages`
--

INSERT INTO `propertyimages` (`id`, `propertyid`, `imagename`, `imagetype`) VALUES
(76, 47, 'main (1).jpg', 0),
(77, 47, 'image4 (1).jpg', 0),
(78, 47, 'image2 (1).jpg', 0),
(80, 49, 'main (2).jpg', 0),
(81, 49, 'image4 (2).jpg', 0),
(82, 49, 'kitchens (4).jpg', 0),
(85, 50, 'main (5).jpg', 0),
(86, 50, 'image2 (5).jpg', 0),
(87, 50, 'image4 (5).jpg', 0),
(88, 50, 'image3 (2).jpg', 0),
(90, 51, 'main (6).jpg', 0),
(91, 51, 'image2 (6).jpg', 0),
(92, 51, 'image4 (6).jpg', 0),
(93, 51, 'image3 (3).jpg', 0),
(94, 52, 'main (7).jpg', 0),
(95, 52, 'image3 (4).jpg', 0),
(96, 52, 'image2 (7).jpg', 0),
(97, 52, 'image4 (7).jpg', 0),
(98, 52, 'image5.jpg', 0),
(99, 52, 'floorplan1.jpg', 1),
(101, 53, 'main (8).jpg', 0),
(102, 53, 'image2 (8).jpg', 0),
(103, 53, 'image4 (8).jpg', 0),
(104, 55, 'main (4).jpg', 0),
(105, 55, 'image2 (4).jpg', 0),
(106, 55, 'image3 (1).jpg', 0),
(107, 55, 'image4 (4).jpg', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `propertytyperelation`
--

INSERT INTO `propertytyperelation` (`id`, `propertyid`, `typeid`) VALUES
(10, 47, 7),
(11, 47, 10),
(12, 49, 7),
(13, 50, 12),
(14, 51, 14),
(15, 52, 7),
(16, 53, 7),
(21, 55, 15),
(22, 55, 21);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `phone`, `address`, `email`, `username`, `password`, `passwordconf`, `usertype`, `parentuser`, `status`, `userimage`) VALUES
(1, 'Sanjika', 'Abeyrathne', '01123456788', 'colombo 5', 'info@myproperty.lk', 'admin', '123', '123', 0, 0, 1, '7218-images.jpeg'),
(67, 'danesh', 'manjula', '0714272747', '57/1, Sri Devananada Rd, Piliyandala', 'info@gmail.com', 'y', '123', '123', 1, 0, 1, '3718-11847375-mark-spain-newest-photo.jpeg'),
(68, 'suresh', 'jayasinghe', '0779562863', 'N0.23, Jayasinghe Mv, Kandy', 'sureshj@yahoo.com', 'suresh', '123', '123', 2, 0, 1, '6602-113.jpeg'),
(69, 'Nisha', 'Perera', '0778659535', 'N0.123/45, New Kandy rd, Malabe', 'nishap@gmail.com', 'nisha', '123', '123', 3, 0, 1, '9687-Select-an-agent2.jpeg'),
(70, 'Nihal', 'Mendis', '0772458695', 'N0.78/23, Main Street, Colombo 05', 'nihalmendis@yahoo.com', 'nihal', '123', '123', 2, 0, 1, '3577-ron.jpeg');

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
  ADD CONSTRAINT `property_ibfk_4` FOREIGN KEY (`district`) REFERENCES `district` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_ibfk_5` FOREIGN KEY (`otheragent`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `propertyimages`
--
ALTER TABLE `propertyimages`
  ADD CONSTRAINT `propertyimages_ibfk_1` FOREIGN KEY (`propertyid`) REFERENCES `property` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `propertytyperelation`
--
ALTER TABLE `propertytyperelation`
  ADD CONSTRAINT `propertytyperelation_ibfk_2` FOREIGN KEY (`propertyid`) REFERENCES `property` (`pid`) ON DELETE CASCADE,
  ADD CONSTRAINT `propertytyperelation_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `propertytype` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

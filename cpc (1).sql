-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2013 at 03:33 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buildingname` varchar(255) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `clientid` int(11) NOT NULL,
  `contact_type` int(11) NOT NULL,
  `site` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `levels_above` int(11) NOT NULL,
  `levels_below` int(11) NOT NULL,
  `month_contructed` int(11) NOT NULL,
  `year_constructed` int(11) NOT NULL,
  `map` varchar(500) NOT NULL,
  `user_id` int(4) NOT NULL DEFAULT '6',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `buildingname`, `address_line_1`, `clientid`, `contact_type`, `site`, `description`, `address_line_2`, `suburb`, `city`, `country`, `levels_above`, `levels_below`, `month_contructed`, `year_constructed`, `map`, `user_id`) VALUES
(1, 'Bodega', '97 Ghuznee Street', 3, 2, 1, 'Euphie', '', 'Euphie', 'Euphie', 162, 154, 5, 1, 1996, 'http://g.co/maps/6vq3', 6),
(2, 'Insight Consultants', 'Level 6, 220 Willis Street', 4, 4, 2, 'EUPHY', '', 'EUPHY', 'EUPHY', 162, 3, 0, 5, 2000, ' ', 6),
(3, 'Abbey Systems', 'Level 4, 220 Willis Street', 5, 2, 2, 'levels_below', '', 'levels_below', 'levels_below', 162, 70, 5, 3, 2009, ' ', 6),
(7, 'Yupheria', 'Yupheria', 0, 0, 1, 'Yupheria', 'Yupheria', 'Yupheria', 'Yupheria', 162, 31, 4, 12, 1815, ' ', 6),
(8, 'EUPHY', '20 Vera St', 0, 0, 3, 'EUPHY', '', 'Karori', 'EUPHY', 162, 15, 0, 1, 1815, 'undefined', 6),
(9, 'WEEE', 'WEEE', 0, 0, 3, 'WEEE', 'WEEE', 'WEEE', 'WEEE', 162, 25, 0, 11, 1718, ' ', 6),
(11, 'MariBuild', 'MariBuild', 0, 0, 1, 'MariBuild', '', 'MariBuild', 'MariBuild', 162, 19, 3, 1, 1831, ' ', 6),
(10, 'TriangBuild', 'TriangBuild', 0, 0, 1, 'TriangBuild', '', 'TriangBuild', 'TriangBuild', 162, 10, 2, 1, 1815, ' ', 6),
(12, '123rer123', 'czxczxc', 0, 0, 2, 'zxczx', '', 'zxczx', 'czxczxc', 162, 18, 2, 10, 1831, ' ', 6),
(13, 'TringBuild2', 'TringBuild2', 0, 0, 1, 'TringBuild2', '', 'TringBuild2', 'TringBuild2', 162, 15, 4, 1, 1815, ' ', 6),
(14, 'OpeBuild', 'OpeBuild', 0, 0, 8, 'OpeBuild', 'OpeBuild', 'OpeBuild', 'OpeBuild', 162, 14, 3, 1, 1815, ' ', 6),
(15, 'Opebuild2', 'Opebuild2', 0, 0, 8, 'Opebuild2', 'Opebuild2', 'Opebuild2', 'Opebuild2', 162, 14, 3, 1, 1815, ' ', 6),
(16, 'Shed', '456 Main Road', 0, 0, 9, 'Garden Shed', '', 'Richie', 'Gotham', 162, 1, 3, 1, 1815, ' ', 6),
(19, 'Manor', '456 Main Road', 0, 0, 9, 'Main building on site', '', 'Richie', 'Gotham', 162, 5, 3, 1, 1816, ' ', 6),
(20, 'dfjksdjfklsdjfl', '2232 jkdfsljf st', 0, 0, 10, 'jkfjskjfks', '', 'jsfsjf', 'jsfjsl', 162, 6, 1, 3, 2000, ' ', 6),
(21, 'Building', '45 building build', 0, 0, 6, 'its a bloody building', '', 'building ', 'building land', 162, 5, 1, 12, 1922, ' ', 6),
(23, 'asdasdasdasdasdasdasdasdasd', 'asdasd', 0, 0, 2, 'asdasdas', 'asd', 'asdasd', 'asdasd', 162, 5, 1, 4, 1831, ' ', 6),
(27, 'National HQ', 'Addr one', 0, 0, 1, 'Commercail', 'Addr two', 'Karori', 'Wellington', 162, 10, 2, 1, 1929, ' ', 6),
(26, 'Southside', 'Addr one', 0, 0, 6, 'Accounting hse', 'Addr two', 'Karori', 'Wellington', 162, 8, 2, 1, 2002, ' ', 6),
(28, 'Toyworld', '123 The Crescent', 0, 0, 13, '5 level building on back site', '', 'Te Aro', 'Wellington', 162, 2, 1, 1, 2005, ' ', 6),
(29, 'Angel Build', 'Angel Rd', 0, 0, 14, 'Angelic', '', 'Angel', 'Auckland', 162, 10, 5, 1, 1815, ' ', 6),
(69, 'Collision Repair Centre', '115 Cook Street', 0, 0, 37, 'Rowsells Collision Repair Centre', '', 'City', 'Auckland', 162, 0, 2, 8, 1955, 'undefined', 6),
(62, 'IBM 473 ^', '65463 dgsdfdhgf 634786536 %%$%$', 0, 0, 23, 'Building is only for IBM not allowed for rent 767687 ^', '^', 'wqreqtwreqw 765783 $%^$%^', 'eytwry qwter $%^$^ 35463', 162, 0, 0, 1, 1815, ' ', 6),
(32, 'City Build2', 'City Build2', 0, 0, 16, 'City Build2', '', 'City Build2', 'City Build2', 162, 10, 10, 1, 1815, ' ', 6),
(33, 'Grasslands Build', 'Grasslands Build', 0, 0, 17, 'Grasslands Build', '', 'Grasslands Build', 'Grasslands Build', 162, 15, 16, 1, 1815, ' ', 6),
(34, 'Grasslands Build2', 'Grasslands Build2', 0, 0, 17, 'Grasslands Build2', '', 'Grasslands Build2', 'Grasslands Build2', 162, 16, 12, 1, 1815, ' ', 6),
(35, 'Grasslands2 build', 'Grasslands2 build', 0, 0, 18, 'Grasslands2 build', '', 'Grasslands2 build', 'Grasslands2 build', 162, 14, 12, 1, 1815, ' ', 6),
(36, 'Grasslands2 build2', 'Grasslands2 build2', 0, 0, 18, 'Grasslands2 build2', '', 'Grasslands2 build2', 'Grasslands2 build2', 162, 18, 12, 1, 1815, ' ', 6),
(37, 'Buiding Building', 'Buiding Building', 0, 0, 10, 'Buiding Building', 'Buiding Building', 'Buiding Building', 'Buiding Building', 162, 15, 13, 1, 1815, ' ', 6),
(38, 'Highrise Build', 'Highrise Build', 0, 0, 19, 'Highrise Build', '', 'Highrise Build', 'Highrise Build', 162, 15, 13, 1, 1815, ' ', 6),
(39, 'Highrise Build2', 'Highrise Build2', 0, 0, 19, 'Highrise Build2', '', 'Highrise Build2', 'Highrise Build2', 162, 9, 8, 1, 1815, ' ', 6),
(40, 'Shops Build', 'Shops Build', 0, 0, 11, 'Shops Build', 'Shops Build', 'Shops Build', 'Shops Build', 162, 14, 11, 1, 1815, ' ', 6),
(41, 'Shops Build2', 'Shops Build2', 0, 0, 11, 'Shops Build2', 'Shops Build2', 'Shops Build2', 'Shops Build2', 162, 16, 11, 1, 1815, ' ', 6),
(42, 'Jiang build', 'Jiang build', 0, 0, 20, 'Jiang build', '', 'Jiang build', 'Jiang build', 162, 16, 14, 1, 1815, ' ', 6),
(43, 'Jiang build2', 'Jiang build2', 0, 0, 20, 'Jiang build2', '', 'Jiang build2', 'Jiang build2', 162, 15, 12, 1, 1815, ' ', 6),
(44, 'Jiang Build1', 'Jiang Build1', 0, 0, 21, 'Jiang Build1', '', 'Jiang Build1', 'Jiang Build1', 162, 14, 13, 1, 1815, ' ', 6),
(45, 'Jiang Build21', 'Jiang Build21', 0, 0, 21, 'Jiang Build21', '', 'Jiang Build21', 'JJiang Build21', 162, 12, 12, 1, 1815, ' ', 6),
(46, 'TriBuilds', 'TriBuilds', 0, 0, 13, 'TriBuilds', '', 'TriBuilds', 'TriBuilds', 162, 14, 12, 1, 1815, ' ', 6),
(47, 'WayneBuilds', 'WayneBuilds', 0, 0, 22, 'WayneBuilds', 'WayneBuilds', 'WayneBuilds', 'WayneBuilds', 162, 17, 14, 1, 1815, ' ', 6),
(70, 'West Tower', '345 The Terrace', 0, 0, 37, 'Tower block', '', 'Te Aro', 'Wellington', 162, 10, 3, 8, 1986, 'undefined', 6),
(49, 'EnterpriseBuilding', 'EnterpriseBuilding', 0, 0, 23, 'EnterpriseBuilding', '', 'EnterpriseBuilding', 'EnterpriseBuilding', 162, 15, 14, 1, 1815, ' ', 6),
(50, 'EnterpriseBuilding1', 'EnterpriseBuilding1', 0, 0, 23, 'EnterpriseBuilding1', 'EnterpriseBuilding1', 'EnterpriseBuilding1', 'EnterpriseBuilding1', 162, 16, 12, 1, 1815, ' ', 6),
(52, 'BSBuild1', 'BSBuild1', 0, 0, 25, 'BSBuild1', 'BSBuild1', 'BSBuild1', 'BSBuild1', 162, 15, 14, 1, 1815, ' ', 6),
(63, 'Cafeteria Building', 'Level 1, Kent Tech, Wellington', 0, 0, 33, 'Main Cafeteria Building is west location', '', 'Mount Victoria', 'Wellington', 162, 0, 2, 7, 1846, 'undefined', 6),
(64, 'Queens gate Mall', 'Level 4, Queens Gate Mall, Auckland', 0, 0, 33, 'KFC at Queens Gate mall is on 4th Floor', '', 'Tamaki', 'Auckland', 162, 3, 5, 3, 1890, ' ', 6),
(55, 'Wakefield St Panelbeaters Ltd', '16-18 Aitken Terrace', 0, 0, 12, 'Wakefield St Panelbeaters Ltd', '', 'Eden Terrace', 'Auckland', 162, 15, 0, 1, 1815, 'undefined', 6),
(56, 'Greennock House', '102@lambton quay', 0, 0, 26, 'Prime property house limited', '', 'wellington cbd', 'Wellington', 162, 0, 0, 9, 1820, ' ', 6),
(59, 'new building', 'b- hfsueryewhrjdh jrue', 0, 0, 28, 'new building b', '', 'new town', 'Wellington, 6012', 162, 2, 4, 11, 1832, ' ', 6),
(68, 'Greg Gordon Panelbeaters Ltd', '394 New North Road', 0, 0, 36, 'Greg Gordon Panelbeaters Ltd', '', 'Kingsland', 'Auckland', 162, 1, 3, 3, 1972, 'undefined', 6),
(66, 'Greenock House', '112- 102 Lambton Quay', 0, 0, 32, 'Greenock House', '', 'City', 'Wellington', 162, 1, 3, 3, 1881, 'undefined', 6),
(67, 'FishermanBuilding', '120 Austin Street', 0, 0, 34, 'Fisherman Building Meat Shop', ' ', 'Mount Victoria', 'Wellington', 14, 1, 3, 9, 1861, 'undefined', 6);

-- --------------------------------------------------------

--
-- Table structure for table `buildings_contact_types`
--

CREATE TABLE IF NOT EXISTS `buildings_contact_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `buildings_contact_types`
--

INSERT INTO `buildings_contact_types` (`id`, `type`) VALUES
(1, 'Owner'),
(2, 'Body Corporate'),
(3, 'Building Manager'),
(4, 'Office Manager'),
(5, 'Real Estate Agent');

-- --------------------------------------------------------

--
-- Table structure for table `building_areas`
--

CREATE TABLE IF NOT EXISTS `building_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buildingid` int(11) NOT NULL,
  `area_level` int(11) NOT NULL,
  `above` int(11) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `building_areas`
--

INSERT INTO `building_areas` (`id`, `buildingid`, `area_level`, `above`, `room_number`, `area_name`, `description`) VALUES
(13, 1, 0, 1, 'dfgdfgdfg', 'cxcv345', 'ertert'),
(7, 1, 153, 1, 'sdfds', 'scvxcvx', 'sdfsdf'),
(6, 1, 0, 1, 'asd', 'caxscasdasd', 'asdasdazxc'),
(11, 2, 0, 1, 'yun', 'yun', 'yun'),
(20, 11, 7, 1, 'sdasda', 'zxczxc', 'asdasd'),
(15, 7, 1, 0, 'dzxczxc', 'zxczxsc', 'asdas'),
(16, 2, 0, 1, 'zxczxc', 'sdasds', 'xzxcz'),
(17, 7, 0, 1, 'asdas', 'zxczx', 'sdas'),
(18, 7, 1, 0, 'zxczxc', 'asdasd', 'zxczxc'),
(19, 10, 0, 1, 'asdasdasd', 'zxczxczx', 'czxcz'),
(21, 1, 0, 1, '234sadfsd', 'asvxcvxcv23', 'efsef3wf'),
(22, 1, 0, 1, 'monsky', 'monsky', 'monsky'),
(23, 1, 16, 1, 'ooowwww', 'ooowwwweeee', 'ooowwww'),
(25, 1, 0, 1, 'hfghfghfghfgh', 'fghfghfgh', 'nfgbfghfgh'),
(26, 19, 3, 1, '65', 'Main Bedroom', 'Main Bedroom'),
(27, 19, 3, 0, '3', 'Batcave', 'Top Secret'),
(28, 19, 0, 1, '3', 'Swimming Pool', 'Swimming Pool'),
(31, 10, 3, 1, '9', 'jkhjkhkq', 'gjkhjkhk'),
(30, 3, 5, 0, '9', 'low', '555'),
(32, 22, 1, 1, '101', 'iyyuiuq', 'jkhjkhkj'),
(33, 22, 1, 0, '898', 'ghgkhjkhkjh', 'rtvgiouovyug'),
(34, 21, 4, 1, '3342', 'ssdfdsf', 'sdfsdf'),
(35, 20, 0, 1, '78', 'hgjh', 'mnmn'),
(36, 16, 1, 1, 'xc', 'zxZX', 'ZXZ'),
(37, 16, 3, 0, 'asd', 'assad', 'asdasd'),
(58, 16, 0, 1, 'trying', 'trying', 'trying'),
(48, 1, 0, 1, 'wer', 'wer', 'wer'),
(47, 1, 0, 1, 'tre', 'tre', 'tre'),
(56, 1, 0, 1, 'ggggg', 'gggggg', 'gggggg'),
(57, 1, 0, 1, 'grpud', 'grpud', 'grpud'),
(59, 1, 1, 0, '12', 'trying', 'trying'),
(60, 1, 1, 0, 'aboveabove', 'aboveabove', 'aboveabove'),
(61, 0, 1, 0, 'above again', 'above again', 'above again'),
(39, 29, 0, 1, '1', 'AngelArea', 'AngelArea'),
(40, 29, 1, 0, 'AngelArea1', 'AngelArea1', 'AngelArea1'),
(41, 29, 4, 0, '3', 'BelowAngel', 'BelowAngel'),
(42, 29, 10, 0, '5', 'Angel10', 'Angel10'),
(82, 64, 3, 1, '4', 'Campbell Office', 'Campbell Office'),
(64, 0, 0, 1, '1', 'tory', 'jreurhreu'),
(65, 58, 0, 1, '56', 'hutt city', 'hutt inter'),
(66, 49, 1, 1, '1/78g', 'wilton', 'grand house'),
(67, 55, 1, 0, '54', 'Thorndon', 'South Thorndon'),
(68, 20, 1, 1, '7f', 'kapiti', 'cost hfgs'),
(69, 58, 0, 1, 'd/34', 'waterloo', 'waterloo quay'),
(70, 59, 1, 1, '@58640', 'bay road', 'road 4 '),
(71, 49, 1, 0, 'g45', 'wilton', 'north wilton'),
(72, 33, 4, 0, '9**', 'wills', 'under ground parking'),
(73, 61, 2, 1, '786', 'tapu', ' south tapu'),
(74, 61, 2, 1, 'uyiyiuuuupy', 'uyriyrt', 'yuyiu'),
(75, 60, 1, 1, 'hghjtyrdr', 'rutfg ti it ', 'ftrt ggjh'),
(76, 60, 1, 1, 'tyuuuuty', 'abcd', 'dcba'),
(77, 49, 1, 1, '756', 'fhdgjkrh g', ' jrty jewrye'),
(78, 0, 1, 0, '67', 'fdjthuie ', ' uert ior '),
(79, 0, 1, 0, ' uy', 'dfhg ', ' urty uier'),
(80, 62, 0, 1, '43538', 'lambton quay', 'up lambton quay '),
(81, 49, 1, 1, 'dfse 3542 %^', '$%^$%^ 663542 ayerteehgry', 'rytuey r 785 %^'),
(83, 64, 3, 1, '1', 'City Council ', 'City Council'),
(84, 66, 1, 1, '10', 'Top Level', '5th Floor'),
(85, 66, 1, 1, '2', '3rd Floor', 'Level 3 '),
(86, 66, 1, 1, '4', 'Back', 'back'),
(87, 8, 0, 1, '12', 'Asb', 'asb'),
(88, 67, 0, 1, '3', 'Level', 'Leve 5 Office'),
(89, 0, 0, 1, '4C', 'LevelFive', 'level 5 Fisherman Building'),
(90, 68, 1, 1, '4', 'North Room', 'Town Hall Event North Room'),
(92, 69, 1, 0, '394', 'Kingsland', 'Greg Gordon Panelbesters Ltd.'),
(93, 47, 0, 1, '1', 'Foyer', 'Reception area'),
(94, 55, 1, 0, '54', 'ThorndonSSS', 'South ThorndonSS'),
(95, 55, 1, 0, '43', 'Kilbernie', 'Kilbernie'),
(96, 55, 3, 0, '456', 'TeAros', 'TeAros'),
(97, 55, 3, 0, '678', 'Aucklands', 'Aucklands'),
(98, 55, 3, 1, '890', 'Lindale', 'Lindale'),
(99, 47, 2, 0, '10', 'Storeroom', 'Storage Room'),
(100, 67, 1, 1, '3', 'Second floor', 'In second floor have some problem'),
(101, 33, 1, 1, '10', 'Chapman Room', 'Training Room'),
(102, 8, 0, 1, '12345', 'Rossy Area', 'Rossy'),
(103, 8, 0, 1, 'asdasd', 'Another area', 'Another area'),
(104, 8, 5, 1, '555', 'level five', 'level five');

-- --------------------------------------------------------

--
-- Table structure for table `bwof`
--

CREATE TABLE IF NOT EXISTS `bwof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `company_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `bwof`
--

INSERT INTO `bwof` (`id`, `issue_date`, `expiry_date`, `company_id`, `site_id`, `building_id`, `user_id`) VALUES
(10, '2011-08-21', '2012-08-21', 1, 1, 2, 6),
(11, '2011-08-29', '2012-08-29', 29, 10, 20, 6),
(12, '2011-08-29', '2012-08-29', 29, 10, 20, 6),
(13, '2011-08-30', '2012-08-30', 29, 10, 20, 6),
(14, '2011-08-30', '2012-08-30', 29, 10, 20, 6),
(15, '2011-08-31', '2012-08-31', 1, 3, 8, 6),
(16, '2011-08-31', '2012-08-31', 1, 1, 2, 6),
(17, '2011-08-31', '2012-08-31', 1, 3, 8, 6),
(18, '2011-08-31', '2012-08-31', 1, 3, 8, 6),
(19, '2011-08-31', '2012-08-31', 1, 3, 8, 6),
(20, '2011-09-05', '2012-09-05', 1, 1, 7, 31),
(21, '2011-09-14', '2012-09-14', 1, 1, 1, 6),
(22, '2012-04-23', '2013-04-23', 43, 32, 66, 44),
(23, '2012-04-23', '2013-04-23', 43, 32, 66, 44),
(24, '2012-04-23', '2013-04-23', 34, 12, 55, 44),
(25, '2012-04-23', '2013-04-23', 44, 34, 67, 44),
(26, '2012-04-30', '2013-04-30', 53, 36, 68, 56),
(27, '2012-04-30', '2013-04-30', 53, 36, 68, 56),
(28, '2012-04-30', '2013-04-30', 53, 36, 68, 56),
(29, '2012-04-30', '2013-04-30', 53, 36, 68, 56),
(30, '2012-04-30', '2013-04-30', 43, 33, 64, 56),
(31, '2012-05-05', '2013-05-05', 34, 12, 55, 46),
(32, '2012-05-06', '2013-05-06', 53, 36, 68, 56),
(33, '2012-05-28', '2013-05-28', 53, 36, 68, 56),
(34, '2012-05-28', '2013-05-28', 53, 36, 68, 56),
(35, '2012-07-02', '2013-07-02', 5, 14, 29, 6);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `title` int(32) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `po_address` varchar(255) NOT NULL,
  `po_code` int(11) NOT NULL,
  `po_suburb` varchar(255) NOT NULL,
  `po_city` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` int(255) NOT NULL,
  `home_phone` varchar(255) NOT NULL,
  `mobile_phone` varchar(255) NOT NULL,
  `business_phone` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `last_contacted` datetime DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `email_address`, `title`, `address_line_1`, `address_line_2`, `suburb`, `po_address`, `po_code`, `po_suburb`, `po_city`, `city`, `country`, `home_phone`, `mobile_phone`, `business_phone`, `website`, `created`, `last_contacted`, `group_id`, `image_url`) VALUES
(57, 'Tonys', 'Lee', 'lee.tony@yahoo.co.nz', 1, '54albertstree676', '', 'AucklandCBD', 'Level6AMIHouseAlbertstreet', 63, 'AucklandCBD', 'Auckland', 'Auckland', 0, '064223344555', '064223344555', '064223344555', '', '2012-03-27 13:13:39', '2012-03-27 13:13:39', 44, 'none'),
(3, 'Susan', 'Johnstone', 'susan@testemailaddress.com', 1, '12 Sample Cresent', '', 'Karori', '99', 443, 'newlands', 'wellington', 'Wellington', 162, '04 389 1234', '022 987 654', '04 386 1234', 'http://www.capitalplanning.co.nz', '2011-09-05 23:51:39', '2011-09-05 23:51:39', 3, 'none'),
(5, 'John', 'Smith', 'john.smith@abbeysystems.co.nz', 1, 'Level 4', 'Willis Street', 'Te Aro', '', 0, '', '', 'Wellington', 162, '04 322 1932', '029 987 6543', '04 388 8765', 'http://www.abbeysystems.co.nz', '2010-11-29 11:09:54', '0000-00-00 00:00:00', 5, ''),
(15, 'Shelley %^%', 'Winters 6352 %^', 'asd@asd.com', 3, '24 Snow Dr %$%$^ ', 'asd 56454 #@$^$', 'Mentone 456', 'P O Box 1099 rerte #@#$', 1001, 'Mentone 576', 'Melbourne', 'Melbourne 656757 $@$', 14, '61 3 123896', '61 44156783', '61 4415987123', 'asd', '2012-03-21 12:24:32', '2012-03-21 12:24:32', 34, 'none'),
(16, 'Fred', 'Jones', 'sdf@dasd.fgh', 2, 'fsdf', '', 'sdf', '4545', 0, 'West St', 'Wellington', 'sdfsd', 162, '345', '345', '345', '', '2012-07-02 11:15:56', '2012-07-02 11:15:56', 1, 'none'),
(17, 'Bejay', 'Beyorn', 'bjoern@asd.com', 1, '29 Parkvale rd', '', 'Karori', '29 Parkvale rd', 6012, 'Karori', 'Wellington', 'Wellington', 162, '1231', '1231', '231', '', '2012-02-08 11:55:11', '2012-02-08 11:55:11', 12, 'none'),
(30, 'awasdasdas223', 'asdad', 'sd@asd.com', 1, 'asdas', '', 'asdas', '', 0, '', '', 'asdas', 162, '123123', '2312', '321', '', '2011-07-26 05:15:23', '2011-07-26 05:15:23', 1, 'none'),
(31, 'sdxcvxcv', 'sdfsdf', 'asd@asd.com', 1, 'xcvxcvx', '', 'asdasd', 'sdfsdf', 23443, 'asdasd', 'asdasd', 'asdasd', 162, '123', '123', '23', '', '2011-07-27 22:44:03', '2011-07-27 22:44:03', 1, 'none'),
(32, 'Bruce', 'Wayne', 'bruce@waynerenterprises.com', 1, '45 Rich Mans Lane', '', 'Richie', '774895', 998573, 'Richie', 'Gotham', 'Gotham', 162, '88575799938', '88575743999', '8857488399', 'www.wayneenterprises.com', '2011-08-04 00:45:55', '2011-08-04 00:45:55', 31, 'none'),
(33, 'Alfred', 'Butler', 'butler@wayneenterprises.com', 1, '452 Main Road', '', 'Richie', '5858949', 8849, 'Gotham', 'Gotham', 'Gotham', 162, '85995857477', '8847530485', '77294759371', 'www.wayneenterprises.com', '2011-08-04 01:12:30', '2011-08-04 01:12:30', 31, 'none'),
(52, 'etrte ', 'vjfgu ', '67677@gywetrw.com', 1, 'gytyigy', 'guytyt', 'ytytuytuy', 'yty', 767678, 'ftrtrf', 'gftrtrtr', 'tyt', 162, '6767778678', '6767678', '678678', '', '2012-03-22 12:29:01', '2012-03-22 12:29:01', 41, 'none'),
(35, 'jane', 'smith', 'Jane@capitalplanning.co.nz', 2, '448488', '', 'WEllin', '9494949', 39339, 'wlle', 'jljgslkjjaf', 'kejklefjl', 162, '43089083', '849302803', '843908209', 'Www.capitalplanning.co.nz', '2011-12-25 18:48:55', '2011-12-25 18:48:55', 20, 'none'),
(36, 'jessica', 'hoyt', 'Sales@capitalplanning.co.nz', 4, '8439893 ', '', 'hfjksfskl', 'fjsafkj', 903809, 'jsfjsk', 'sfjskfjs', 'jsklfjslkd', 162, '84903248', '4830928', '580234893', 'Www.capitalplanning.co.nz', '2011-12-25 18:50:10', '2011-12-25 18:50:10', 20, 'none'),
(51, 'Kiran', 'Kirtish', 'terwtew@yteyqrq.com', 3, '65 level 3 ', '', 'st john', 'Level 3 d 65 Thorndon', 6860, 'manakau', 'manakau', 'Manakau', 162, '8987867', '67896796', '697678', '', '2012-03-20 15:33:14', '2012-03-20 15:33:14', 40, 'none'),
(37, 'Jan', 'Kennedy', 'SELWYN@CAPITALPLANNING.CO.NZ', 2, 'add', 'ADDR', 'RORI', 'UYTUYT', 123123, 'UYT', 'UY', 'WELLY', 162, '123123', '123', '234', 'WWW.CPC.CO.NZ', '2011-12-19 13:07:55', '2011-12-19 13:07:55', 2, 'none'),
(38, 'ABC', 'Client', 'asd@asd.com', 1, '4 The Terrace', '', 'Te Aro', '3 The Terrace', 6011, 'Te Aro', 'Wellington', 'Wellington', 162, '123', '123', '123', '', '2012-03-19 10:31:29', '2012-03-19 10:31:29', 28, 'none'),
(39, 'ABC2', 'Client', 'asd@asd.com', 1, '3 The Terrace', '', 'Te Aro', '3 The Terrace', 6011, 'Te Aro', 'Wellington', 'Wellington', 162, '123', '123', '123', '', '2012-02-08 11:41:29', '2012-02-08 11:41:29', 28, 'none'),
(40, 'Angel', 'Client', 'asd@asd.com', 3, '4 The Terrace', '', 'Te Aro', '4 The Terrace', 6011, 'Te Aro', 'Wellington', 'Wellington', 14, '123', '123', '123', '', '2012-02-08 11:42:57', '2012-02-08 11:42:57', 34, 'none'),
(53, 'Tracy', 'Jo', 'tracjo07@hotmail.com', 1, '60, Wilton', '', 'Wilton', '34, Lake street, First Floor, Wilton', 6011, 'wilton', 'Wilton', 'Hamilton', 162, '064223344555', '064223344555', '064223344555', '', '2012-03-22 15:49:01', '2012-03-22 15:49:01', 43, 'none'),
(42, 'Grasslands', 'Client', 'asd@asd.com', 1, '3 Parkvale rd', '', 'Karori', '3 Parkvale rd', 6012, 'Karori', 'Wellington', 'Wellington', 162, '123', '123', '123', '', '2012-02-08 11:48:50', '2012-02-08 11:48:50', 30, 'none'),
(43, 'Green Mountain', 'Client', 'asd@asd.com', 1, '1 Green St', '', 'Kelburn', 'reen St', 6010, 'Kelburn', 'Wellington', 'Wellington', 162, '123', '123', '123', '', '2012-02-08 11:50:03', '2012-02-08 11:50:03', 29, 'none'),
(44, 'Green M 2', 'Client2', 'asd@asd.com', 1, '2 Green st', '', 'Kelburn', '2 Green st', 6010, 'Kelburn', 'Wellington', 'Wellington', 162, '123', '123', '123', '', '2012-02-08 11:51:02', '2012-02-08 11:51:02', 29, 'none'),
(45, 'Jian Shu', 'Client', 'asd@asd.com', 1, '1 Campbell st', '', 'Karori', '1 Campbell st', 6012, 'Karori', 'Wellington', 'Wellington', 162, '123', '123', '123', '', '2012-02-08 11:52:49', '2012-02-08 11:52:49', 12, 'none'),
(62, 'Lee ', 'Hong', 'leehong11@gmail.co.nz', 3, 'Newmarket', '', 'Newmarket', 'Newmarket', 0, 'Newmarket', 'Auckland', 'Auckland', 162, '1122334455', '5544332211', '0011002200', '', '2012-04-23 16:13:19', '2012-04-23 16:13:19', 51, 'none'),
(65, 'Daniel', 'Graison', 'danielgraison@yahoo.co.nz', 1, '2 Avenham Walk', '', 'Mount Eden', '2 Avenham Walk', 1024, 'Mount Eden', 'Auckland', 'Auckland', 162, '878765656', '021323678364', '042498138', '', '2012-04-30 14:45:45', '2012-04-30 14:45:45', 54, 'none'),
(48, 'jake', 'cho', 'we@hotmail.com', 1, '50 Kent Street, Mt. cook', '', 'mt.cook', '123/4', 74378, 'mt eden', 'auckland', 'chch', 162, ' 8327847237897', '-326546732567286', '63453654736437', '', '2012-03-15 13:53:04', '2012-03-15 13:53:04', 37, 'none'),
(49, 'maggi', 'loo', 'loo.maggi@radiff.co.na', 3, '120, takapuna', '', 'tawa', '120, takapuna ', 4789, 'well', 'well', 'Wellington', 162, ' 64 83 7382 23719', '  64 43 87987892118138', '064 837 89048059 7856478957', '', '2012-05-09 15:20:46', '2012-05-09 15:20:46', 38, 'none'),
(50, 'David', 'Works', 'david01woorks@yahoo.co.nz', 1, 'st. peter app vicrotia street', '', 'cbd', '70 st. peter appartment victoria street', 38782, 'cbd', 'hamilton', 'hamilton', 162, '-74589374985', ' 8748937452', '0746537647', '', '2012-03-19 16:41:31', '2012-03-19 16:41:31', 38, 'none'),
(54, 'Bob', 'Thomas', 'thomas.bob@rediff.mail', 1, 'Taranaki', '', 'Taranaki', '65 Hill Road, Taranaki', 6022, 'Taranaki', 'Taranaki', 'Taranaki', 0, '064112233444', '064112233444', '064112233444', '', '2012-03-22 15:54:49', '2012-03-22 15:54:49', 43, 'none'),
(55, 'Rose', 'Lewis', 'lewis.rose76@yahoo.com', 3, '54 Kent Terrace', '', 'Tapu', '54 Kent Terrace, Tapu', 6012, 'Tapu', 'Tapu', 'Tapu', 0, ' 64044776699', ' 64044776699', ' 64044776699', '', '2012-03-22 15:57:19', '2012-03-22 15:57:19', 43, 'none'),
(56, 'Coni', 'Lee', 'conee.lee@gmail.co.nz', 4, 'Wades Town', '', 'Papanui', '3/65 Wades Town, Papanui, Mt Papanui', 6013, 'Papanui', 'Mt. Papanui', 'Mt. Papanui', 0, '-64112233445', '-64112233445', '-64112233445', '', '2012-03-22 16:03:07', '2012-03-22 16:03:07', 43, 'none'),
(58, 'jirjirjir', 'jirjirjir', 'asd@asdasd.com', 1, 'jirjirjir', '', 'jirjirjir', 'jirjirjir', 23423, 'jirjirjir', 'jirjirjir', 'jirjirjir', 162, '23423', '2342', '23423', '', '2012-04-16 15:59:09', '2012-04-16 15:59:09', 46, 'none'),
(60, 'yyyy', 'yyytuy', 'gwetq@yahoo.com', 1, 'tyttuy', 'fftfg', 'ytytyut', 'ghgjh', 7678, 'bgjhg', 'vtyutu', 'ytytuygvhjg', 162, '5656756', '5656756', '56567567', '', '2012-04-23 13:00:38', '2012-04-23 13:00:38', 46, 'none'),
(61, 'Fatin', 'Harun', 'terwe878@hotmail.com', 1, '45 The Terrace', '', 'The Terrace', '45 level 4 the terrace', 2, 'The Terrace', 'Wellington', 'Wellington', 162, '523472378', '563426', '5635462', '', '2012-04-23 13:03:43', '2012-04-23 13:03:43', 47, 'none'),
(63, 'Sun', 'Moon', 'sonmoon@yahoo.co.nz', 1, '00 Blue Sky', '', 'small', '123 Blue Sky ', 7878, 'small world', 'Our Earth', 'World', 162, '983847324672', '65656758554', '5656565857887', '', '2012-04-23 16:16:47', '2012-04-23 16:16:47', 51, 'none'),
(64, 'Brita', 'Thomas', 'britzthom98@yahoo.co.nz', 3, 'Flat No 12, Queen Street', '', 'Mount Cook', 'Flat No 12, Queen Street', 6012, 'Mount Cook', 'Hamilton', 'Hamilton', 162, '021 0463999', '02178782323453', '042397632', '', '2012-04-30 09:56:32', '2012-04-30 09:56:32', 53, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `client_notes`
--

CREATE TABLE IF NOT EXISTS `client_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` text NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `client_notes`
--

INSERT INTO `client_notes` (`id`, `clientid`, `userid`, `created`, `title`, `note`) VALUES
(1, 1, 2, '2010-11-14 00:06:16', 'Good job', 'Highly recommended. All dealing with this client have been beyond compare.');

-- --------------------------------------------------------

--
-- Table structure for table `client_tags`
--

CREATE TABLE IF NOT EXISTS `client_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `client_tags`
--

INSERT INTO `client_tags` (`id`, `name`, `contents`) VALUES
(1, 'Work', '1'),
(2, 'Capital Planning', '1,2'),
(3, 'Testing', '2');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `po_address` varchar(255) NOT NULL,
  `po_code` int(11) NOT NULL,
  `po_suburb` varchar(255) NOT NULL,
  `po_city` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `company_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `user_id`, `company`, `address_line_1`, `address_line_2`, `suburb`, `po_address`, `po_code`, `po_suburb`, `po_city`, `city`, `country`, `phone`, `email`, `website`, `date_created`, `company_type`) VALUES
(1, 6, 'cpc', 'asdsds', 'ddddd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', '162', '234', 'asd@sds.gfg', '', '2011-12-06 01:49:46', 1),
(2, 6, 'Tryang Building Services ', 'asd', 'asd', 'asd', '12 Security Dr', 1, 'aa', 'aa', 'asd', '162', '234', 'test@test.co.nz', 'qwe', '2012-05-09 15:07:08', 0),
(5, 6, 'Capital Planning', 'asd', 'asd', 'asd', '', 0, '', '', 'asd', '162', '234', 'asd', 'qwe', '2011-07-07 00:32:44', 1),
(20, 6, 'Highrise Co', '629 High St', '', 'Lower Hutt', 'P O Box 876243', 6528, 'Lower Hutt', 'Lower Hutt', 'Lower Hutt', '162', '04 35476523', 'Inspector@HighriseCo.co.nz', 'HighriseCo.co.nz', '2011-11-30 19:14:04', 1),
(28, 6, 'ABC Building Ltd', '78 Featherston St', '', 'Featherston ', '78 Featherston St', 765, 'Featherston ', 'Wanganui', 'Wanganui', '162', '021 9877234', 'Sales@ABCBuilding.com', 'ABCBuilding.com', '2012-03-22 12:37:05', 0),
(29, 6, 'BJOERNYKON', 'BJOERNYKON', '', 'BJOERNYKON', 'aaawwww', 0, 'aawww', 'aaawwww', 'BJOERNYKON', '162', '123', 'asd@asd.com', 'BJOERNYKON', '2011-07-27 03:36:46', 4),
(30, 6, 'Grasslands Trust', '67 St Bathans', '', 'St Bathans', '67 St Bathans', 34343, 'St Bathans', 'Alexandra', 'Alexandra', '162', '03 234765', 'nspectior@Grasslandstrust.com', 'Grasslandstrust.com', '2011-11-30 19:21:21', 1),
(31, 6, 'Wayne Enterprises', '135 Main Road', '', 'Melling Cave 6435 %$$%^', '135 Main Road', 1, 'Melling Cave 465 %$%', 'Gotham', 'Gotham 634534 %$', '162', '04 0058489', 'batman@wayneenterprises.com', 'batman.com', '2012-03-21 12:48:14', 0),
(34, 34, 'Angel Investments ', '999 Silverstream Road', '', 'Silverstream', '999 Silverstream Road', 6012, 'Silverstream', 'Upper Hutt', 'Upper Hutt', '162', '04 276143', 'wings@rc.com', 'rc.com', '2012-04-19 16:00:28', 0),
(44, 56, 'MeghanVerry', '65canoncreekporirua', '', 'Porirua', 'Flanno,165cannoncreekporirua', 1, 'Porirua', 'Wellington', 'BayofPlenty', '162', '064226832494', 'meghan.verry@hotmail.co.nz', '', '2012-03-27 12:47:45', 3),
(38, 56, 'Rohan', '95, Rosmarry Street', '', 'Tapu', '123 ', 6032, 'Tapu', 'Auckland', 'Auckland', '162', ' 64 54 673 78789', 'rohan.simth@gmail.com', 'www.rohansmith.co.nz', '2012-05-09 15:18:33', 0),
(40, 56, 'Rose', '14 web street', '', 'mt cook', '4th floor 14 webb Street', 8579, 'cbd', 'Auckland', 'Auckland', '162', '98976644544', '6565@ahsd.com', '', '2012-04-11 10:51:51', 0),
(41, 56, 'Maria 123 !@#$%^', 'Grand Road No. 5 ', '', 'island bay  ', ' 65 Grand road no 5 1st floor @#$$$$$$$$$$@', 343, 'well  ', 'Bhind ', 'Hamilton  ', '14', '89089098 ', 'etrwetwytewye@dhfgweuir.com', 'wwweyqwuyeqwyeywewueywiq', '2012-03-21 12:02:10', 1),
(47, 82, 'Kalam', '21 Gaznee Street', '', 'CBD', '21 Gaznee Street', 6001, 'CBD', 'Wellington', 'Wellington', '162', '0223344555', 'marketing@capitalplanning.co.nz', '', '2012-04-23 11:33:03', 0),
(54, 56, 'Jaybird Enterprises', '43 Vogel Street ', '', 'Roslyn', '43 Vogel Street ', 4414, 'Roslyn', 'Palmerston North ', 'Palmerston North ', '162', '021 0463999', 'jayden.786@rediffmail.com', '', '2012-05-09 15:13:00', 0),
(51, 82, 'AA Builders', 'Mount Eden ', '', 'Mount Eden', '187 Mount Eden', 6078, 'Mount Eden', 'Auckland', 'Auckland', '162', '0112233444', 'buildersaa@hotmail.com', '', '2012-04-23 16:10:43', 4),
(53, 56, 'Ab Enterprises ', '198 Willis Street', '', 'CBD', '120 Austin Street', 6011, 'Mount Victoria', 'Wellington', 'Wellington', '162', '022 6832494', 'ab.reno@gmail.co.nz', '', '2012-04-30 09:53:02', 4),
(55, 6, 'Lunmaria', 'Lunmaria', '', 'Lunmaria', 'Lunmaria', 6012, 'Lunmaria', 'Lunmaria', 'Lunmaria', '162', '0210501379', 'smylys@yahoo.com', '', '2012-07-03 15:47:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

CREATE TABLE IF NOT EXISTS `company_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`id`, `company_type`) VALUES
(1, 'Company'),
(2, 'Sole Proprietorship'),
(3, 'Trust'),
(4, 'Partnership'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(14, 'Australia'),
(162, 'New Zealand');

-- --------------------------------------------------------

--
-- Table structure for table `countries_copy`
--

CREATE TABLE IF NOT EXISTS `countries_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=253 ;

--
-- Dumping data for table `countries_copy`
--

INSERT INTO `countries_copy` (`id`, `name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Azerbaijan'),
(18, 'Bahamas'),
(19, 'Bahrain'),
(20, 'Bangladesh'),
(21, 'Barbados'),
(22, 'Belarus'),
(23, 'Belgium'),
(24, 'Belize'),
(25, 'Benin'),
(26, 'Bermuda'),
(27, 'Bhutan'),
(28, 'Bolivia'),
(29, 'Bosnia and Herzegovina'),
(30, 'Botswana'),
(31, 'Bouvet Island'),
(32, 'Brazil'),
(33, 'British Indian Ocean Territory'),
(34, 'Brunei Darussalam'),
(35, 'Bulgaria'),
(36, 'Burkina Faso'),
(37, 'Burundi'),
(38, 'Cambodia'),
(39, 'Cameroon'),
(40, 'Canada'),
(41, 'Cape Verde'),
(42, 'Cayman Islands'),
(43, 'Central African Republic'),
(44, 'Chad'),
(45, 'Chile'),
(46, 'China'),
(47, 'Christmas Island'),
(48, 'Cocos (Keeling) Islands'),
(49, 'Colombia'),
(50, 'Comoros'),
(51, 'Congo'),
(52, 'Congo, The Democratic Republic of The'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Cote D''ivoire'),
(56, 'Croatia'),
(57, 'Cuba'),
(58, 'Cyprus'),
(59, 'Cyprus'),
(60, 'Czech Republic'),
(61, 'Denmark'),
(62, 'Djibouti'),
(63, 'Dominica'),
(64, 'Dominican Republic'),
(65, 'Easter Island'),
(66, 'Ecuador'),
(67, 'Egypt'),
(68, 'El Salvador'),
(69, 'Equatorial Guinea'),
(70, 'Eritrea'),
(71, 'Estonia'),
(72, 'Ethiopia'),
(73, 'Falkland Islands (Malvinas)'),
(74, 'Faroe Islands'),
(75, 'Fiji'),
(76, 'Finland'),
(77, 'France'),
(78, 'French Guiana'),
(79, 'French Polynesia'),
(80, 'French Southern Territories'),
(81, 'Gabon'),
(82, 'Gambia'),
(83, 'Georgia'),
(84, 'Georgia'),
(85, 'Germany'),
(86, 'Ghana'),
(87, 'Gibraltar'),
(88, 'Greece'),
(89, 'Greenland'),
(90, 'Greenland'),
(91, 'Grenada'),
(92, 'Guadeloupe'),
(93, 'Guam'),
(94, 'Guatemala'),
(95, 'Guinea'),
(96, 'Guinea-bissau'),
(97, 'Guyana'),
(98, 'Haiti'),
(99, 'Heard Island and Mcdonald Islands'),
(100, 'Honduras'),
(101, 'Hong Kong'),
(102, 'Hungary'),
(103, 'Iceland'),
(104, 'India'),
(105, 'Indonesia'),
(106, 'Indonesia'),
(107, 'Iran'),
(108, 'Iraq'),
(109, 'Ireland'),
(110, 'Israel'),
(111, 'Italy'),
(112, 'Jamaica'),
(113, 'Japan'),
(114, 'Jordan'),
(115, 'Kazakhstan'),
(116, 'Kazakhstan'),
(117, 'Kenya'),
(118, 'Kiribati'),
(119, 'Korea, North'),
(120, 'Korea, South'),
(121, 'Kosovo'),
(122, 'Kuwait'),
(123, 'Kyrgyzstan'),
(124, 'Laos'),
(125, 'Latvia'),
(126, 'Lebanon'),
(127, 'Lesotho'),
(128, 'Liberia'),
(129, 'Libyan Arab Jamahiriya'),
(130, 'Liechtenstein'),
(131, 'Lithuania'),
(132, 'Luxembourg'),
(133, 'Macau'),
(134, 'Macedonia'),
(135, 'Madagascar'),
(136, 'Malawi'),
(137, 'Malaysia'),
(138, 'Maldives'),
(139, 'Mali'),
(140, 'Malta'),
(141, 'Marshall Islands'),
(142, 'Martinique'),
(143, 'Mauritania'),
(144, 'Mauritius'),
(145, 'Mayotte'),
(146, 'Mexico'),
(147, 'Micronesia, Federated States of'),
(148, 'Moldova, Republic of'),
(149, 'Monaco'),
(150, 'Mongolia'),
(151, 'Montenegro'),
(152, 'Montserrat'),
(153, 'Morocco'),
(154, 'Mozambique'),
(155, 'Myanmar'),
(156, 'Namibia'),
(157, 'Nauru'),
(158, 'Nepal'),
(159, 'Netherlands'),
(160, 'Netherlands Antilles'),
(161, 'New Caledonia'),
(162, 'New Zealand'),
(163, 'Nicaragua'),
(164, 'Niger'),
(165, 'Nigeria'),
(166, 'Niue'),
(167, 'Norfolk Island'),
(168, 'Northern Mariana Islands'),
(169, 'Norway'),
(170, 'Oman'),
(171, 'Pakistan'),
(172, 'Palau'),
(173, 'Palestinian Territory'),
(174, 'Panama'),
(175, 'Papua New Guinea'),
(176, 'Paraguay'),
(177, 'Peru'),
(178, 'Philippines'),
(179, 'Pitcairn'),
(180, 'Poland'),
(181, 'Portugal'),
(182, 'Puerto Rico'),
(183, 'Qatar'),
(184, 'Reunion'),
(185, 'Romania'),
(186, 'Russia'),
(187, 'Russia'),
(188, 'Rwanda'),
(189, 'Saint Helena'),
(190, 'Saint Kitts and Nevis'),
(191, 'Saint Lucia'),
(192, 'Saint Pierre and Miquelon'),
(193, 'Saint Vincent and The Grenadines'),
(194, 'Samoa'),
(195, 'San Marino'),
(196, 'Sao Tome and Principe'),
(197, 'Saudi Arabia'),
(198, 'Senegal'),
(199, 'Serbia and Montenegro'),
(200, 'Seychelles'),
(201, 'Sierra Leone'),
(202, 'Singapore'),
(203, 'Slovakia'),
(204, 'Slovenia'),
(205, 'Solomon Islands'),
(206, 'Somalia'),
(207, 'South Africa'),
(208, 'South Georgia and The South Sandwich Islands'),
(209, 'Spain'),
(210, 'Sri Lanka'),
(211, 'Sudan'),
(212, 'Suriname'),
(213, 'Svalbard and Jan Mayen'),
(214, 'Swaziland'),
(215, 'Sweden'),
(216, 'Switzerland'),
(217, 'Syria'),
(218, 'Taiwan'),
(219, 'Tajikistan'),
(220, 'Tanzania, United Republic of'),
(221, 'Thailand'),
(222, 'Timor-leste'),
(223, 'Togo'),
(224, 'Tokelau'),
(225, 'Tonga'),
(226, 'Trinidad and Tobago'),
(227, 'Tunisia'),
(228, 'Turkey'),
(229, 'Turkey'),
(230, 'Turkmenistan'),
(231, 'Turks and Caicos Islands'),
(232, 'Tuvalu'),
(233, 'Uganda'),
(234, 'Ukraine'),
(235, 'United Arab Emirates'),
(236, 'United Kingdom'),
(237, 'United States'),
(238, 'United States Minor Outlying Islands'),
(239, 'Uruguay'),
(240, 'Uzbekistan'),
(241, 'Vanuatu'),
(242, 'Vatican City'),
(243, 'Venezuela'),
(244, 'Vietnam'),
(245, 'Virgin Islands, British'),
(246, 'Virgin Islands, U.S.'),
(247, 'Wallis and Futuna'),
(248, 'Western Sahara'),
(249, 'Yemen'),
(250, 'Yemen'),
(251, 'Zambia'),
(252, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `hazards`
--

CREATE TABLE IF NOT EXISTS `hazards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `area` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `solution` varchar(255) NOT NULL,
  `img` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `hazards`
--

INSERT INTO `hazards` (`id`, `name`, `date`, `area`, `level`, `status`, `description`, `solution`, `img`) VALUES
(2, 'asda', '0000-00-00', 13, 1, 3, '                      asdasda           ', '                       asdasd          ', 'Menu.PNG'),
(3, 'asda', '0000-00-00', 26, 1, 1, '                      asdasda          ', '                       asdasd         ', ''),
(4, 'dasd', '0000-00-00', 26, 1, 1, '               asd                 ', '               asd                 ', ''),
(5, 'dasd', '0000-00-00', 28, 3, 3, '               asd                 ', '               asd                 ', ''),
(6, 'Batcave Waterfall', '0000-00-00', 27, 3, 1, 'The waterfall is malfunctioning', 'Top secret solutions         ', ''),
(7, 'BJoern', '0000-00-00', 13, 1, 3, '              bjoern                    ', '                        bjoern          ', 'cellkh.png'),
(9, 'lknasnda', '0000-00-00', 13, 1, 3, '       dasas                           ', 'asdasd                                  ', 'Tulips.jpg'),
(11, 'asdsd', '0000-00-00', 13, 1, 3, '                      dsad            ', '                     asdsd             ', 'Activities.PNG'),
(13, 'saasd', '0000-00-00', 27, 3, 3, '                                ', '                                ', ''),
(14, 'bad', '0000-00-00', 17, 3, 3, '                                   ', '                                   ', ''),
(15, 'hazard', '0000-00-00', 0, 2, 3, '                                ', '                                ', ''),
(16, 'd7000', '0000-00-00', 13, 1, 3, '           d7000                        ', '                d7000                   ', 'featherz.jpg'),
(18, 'Fear', '0000-00-00', 25, 3, 3, '  Fear                                ', '   Fear                               ', 'CP_screenshot.jpg'),
(19, 'Eupsky', '0000-00-00', 22, 1, 3, '                 Eupsky                 ', '    Eupsky                              ', '30112010475.jpg'),
(20, 'Yupsky', '0000-00-00', 21, 1, 3, '   Yupsky                                ', '    Yupsky                               ', ''),
(21, 'NamanSky', '0000-00-00', 7, 1, 3, 'NamanSky                                       ', 'NamanSky                                       ', ''),
(22, 'owsky', '0000-00-00', 23, 1, 3, 'owsky                                 ', 'owsky                                 ', ''),
(23, 'halsky', '0000-00-00', 6, 1, 3, 'halsky                                 ', 'halsky                                 ', ''),
(24, 'paanoyansky', '0000-00-00', 13, 1, 3, 'paanoyansky                                 ', 'paanoyansky                                 ', 'ios5_epic.PNG'),
(25, 'lakmsdl', '0000-00-00', 13, 1, 3, 'dasd                           ', '   dasdasd                              ', 'Chrysanthemum.jpg'),
(26, 'sdfsdffcv', '0000-00-00', 13, 1, 3, 'sdfs                       ', 'sdfsdf                               ', 'Penguins.jpg'),
(27, 'dasdasda', '0000-00-00', 13, 1, 3, ' dasd                                ', '     dsasds                           ', ''),
(28, 'axczxc', '0000-00-00', 13, 1, 3, 'asd', 'asdas', ''),
(29, 'asda', '0000-00-00', 13, 1, 3, '                      asdasda            ', '                       asdasd           ', ''),
(30, 'Monette', '0000-00-00', 13, 1, 3, 'Monette ', 'Monette ', 'BIS.PNG'),
(33, 'Living Room', '2011-08-23', 26, 1, 1, 'Unliving room', 'undead room', ''),
(34, 'Kitchen', '0000-00-00', 26, 1, 1, 'Deadly', 'Deadly', ''),
(37, 'Toilet', '0000-00-00', 26, 1, 1, 'CR', 'CR', 'legend-of-the-guardians-274.jpg'),
(38, 'dfsdfsdf', '2011-08-22', 35, 1, 1, 'sdfsdf ', 'sdf ', ''),
(39, 'a324234', '2011-08-22', 37, 1, 3, '234234', '234234', 'd3DH.jpg'),
(40, 'czxcz', '2011-08-22', 37, 2, 2, 'zxczxc', 'zxc', ''),
(42, 'df', '2011-08-22', 36, 3, 3, 'werwer', 'sdf', ''),
(43, 'dasdasdasdasd', '2011-08-25', 16, 2, 3, 'dasd ', 'asdas ', ''),
(44, 'hazard', '2011-08-31', 35, 2, 2, 'yeti ', 'goodi ', ''),
(45, 'dayman', '2011-08-31', 35, 2, 2, 'useful ', 'not ', ''),
(46, 'testing', '2011-12-13', 30, 1, 1, 'testing', 'tesing', ''),
(47, 'asd', '2011-12-13', 30, 1, 1, 'asd', 'asd', ''),
(48, 'test', '2011-12-14', 28, 1, 1, 'xxx', 'yyy', 'Merry_Xmas_2011.jpg'),
(49, 'jure', '0000-00-00', 63, 1, 1, 'urieyua uyeruity', 'uhruet urytuerru', ''),
(50, 'flat ', '2012-03-19', 62, 2, 2, 'flat open', 'repair', ''),
(51, 'check', '2012-03-19', 72, 3, 3, 'checked ', 'fault', ''),
(52, 'tyure', '2012-03-19', 72, 1, 1, 'yuyi yuiy trt gftyr', 'yt6t vguf', ''),
(53, 'yr etuiy', '2012-03-19', 73, 1, 1, 'uyywriyr ui', 'y ui', ''),
(54, 'hgtrui ', '0000-00-00', 73, 1, 1, 'fhgeui uiy ', 'uiyrtf tf', ''),
(55, 'ground', '2012-03-20', 62, 1, 1, 'ground level done', 'ready to be inspect', ''),
(56, 'ghfyh ', '2012-03-20', 62, 1, 1, 'tyr t  ', ' yutyhj  ', ''),
(57, '65783@#$%@^**^@$^%@', '0000-00-00', 66, 2, 2, 'jhgjhahga 12351236 @%$%$!', 'jfhiuu 625316   @^!', ''),
(58, 'Tile', '2012-03-22', 82, 2, 3, 'Tile Fitting is Checked ', 'Good Condition', ''),
(59, 'Roof ', '2012-03-22', 84, 3, 3, 'Roof Fitting is not proper', 'Poor Condition', 'Plum1.PNG'),
(61, 'Loop', '0000-00-00', 84, 1, 1, 'waterleakingintopleve ', '34526%$^%$GFTYYY  ', ''),
(62, 'Loop', '2012-03-27', 84, 1, 1, 'etrrrtwr', 'gfrtwer ytertwey', 'IMG_20120421_171603[1].jpg'),
(63, 'Electricity', '2012-03-27', 85, 2, 2, 'gyetwr', 'gefrywe', ''),
(64, 'Flood', '2012-04-13', 72, 1, 1, 'Flood in car park walkway', 'Clear drains', ''),
(65, 'South Wall', '2030-11-01', 85, 3, 2, 'South wall is not painted   ', 'Cover with poly cover    ', 'Lighthouse.jpg'),
(66, 'Foundation', '0000-00-00', 86, 2, 2, 'Crack    ', 'Repair    ', 'Plum3.PNG'),
(67, 'Tile', '2012-04-13', 90, 3, 3, 'Tiles are crack needs to be repair soon before put in Auction', 'Can put Carpet ', ''),
(68, 'Bodywork', '2012-04-30', 92, 2, 2, 'Work is done physically ', 'Repair', 'download_(1).jpg'),
(69, 'Flood', '2012-05-02', 67, 1, 2, 'Kitchen floor flooded due to leaking pipe from dishwasher ', '1 ', '01_Pirate_Bday_Cake.jpg'),
(72, 'Exposed wires', '2012-05-03', 67, 2, 2, 'Wires exposed near plug in back wall', 'Call electrician', ''),
(73, 'gjhk', '2012-05-08', 90, 1, 1, 'yrtytyt', 'ghfgjyuy', ''),
(74, 'Foundation', '2012-06-15', 84, 2, 2, 'Foundation', 'Tiling ', ''),
(75, 'kjh', '2012-05-28', 90, 1, 1, 'dfsggs', 'sgsrwt', ''),
(76, 'Hazard name', '2012-07-04', 41, 1, 1, 'Hazardous', 'Fixed', ''),
(77, 'Wires', '2012-11-05', 39, 3, 2, 'Live wires on the floor', 'Turn the power off', 'Policy_List_Table.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `hazard_levels`
--

CREATE TABLE IF NOT EXISTS `hazard_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `levels` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hazard_levels`
--

INSERT INTO `hazard_levels` (`id`, `levels`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High');

-- --------------------------------------------------------

--
-- Table structure for table `hazard_status`
--

CREATE TABLE IF NOT EXISTS `hazard_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hazard_status`
--

INSERT INTO `hazard_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Open'),
(3, 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `inspections`
--

CREATE TABLE IF NOT EXISTS `inspections` (
  `userid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `buildingid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `siteid` int(11) NOT NULL,
  `wof_given` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `inspections`
--

INSERT INTO `inspections` (`userid`, `id`, `date`, `buildingid`, `status`, `companyid`, `siteid`, `wof_given`) VALUES
(6, 12, '2011-08-21', 2, 1, 1, 1, 1),
(6, 13, '2011-08-22', 20, 1, 29, 10, 1),
(6, 14, '2011-08-22', 20, 1, 29, 10, 1),
(6, 15, '2011-08-22', 20, 0, 29, 10, 0),
(6, 16, '2011-08-22', 20, 1, 29, 10, 1),
(6, 17, '2011-08-22', 20, 0, 29, 10, 0),
(6, 18, '2011-08-22', 20, 1, 29, 10, 1),
(6, 19, '2011-08-31', 8, 1, 1, 3, 1),
(6, 20, '2011-08-31', 8, 1, 1, 3, 1),
(6, 21, '2011-08-31', 2, 1, 1, 1, 1),
(6, 22, '2011-09-04', 7, 1, 1, 1, 1),
(6, 23, '2011-09-14', 1, 1, 1, 1, 1),
(56, 24, '2012-03-19', 1, 0, 2, 1, 0),
(56, 25, '2012-03-19', 1, 1, 2, 1, 0),
(56, 26, '2012-03-19', 61, 0, 38, 29, 0),
(56, 27, '2012-03-20', 49, 1, 31, 23, 0),
(56, 28, '2012-03-20', 49, 0, 31, 23, 0),
(56, 29, '2012-03-22', 64, 1, 43, 33, 0),
(56, 30, '2012-03-22', 66, 0, 43, 32, 0),
(56, 31, '2012-04-18', 55, 1, 34, 12, 1),
(56, 32, '2012-04-19', 66, 1, 43, 32, 1),
(56, 33, '2012-04-19', 64, 1, 43, 33, 1),
(56, 34, '2012-04-19', 64, 1, 43, 33, 0),
(56, 35, '2012-04-19', 67, 1, 44, 34, 1),
(56, 36, '2012-04-19', 55, 0, 34, 12, 0),
(56, 37, '2012-04-19', 66, 1, 43, 32, 1),
(56, 38, '2012-04-30', 68, 1, 53, 36, 1),
(56, 39, '2012-04-30', 68, 0, 53, 36, 0),
(56, 40, '2012-04-30', 68, 1, 53, 36, 1),
(56, 41, '2012-04-30', 68, 0, 53, 36, 0),
(56, 42, '2012-04-30', 68, 1, 53, 36, 1),
(82, 43, '2012-04-30', 68, 1, 53, 36, 1),
(84, 44, '2012-04-30', 66, 1, 43, 32, 0),
(84, 45, '2012-04-30', 66, 1, 43, 32, 0),
(56, 46, '2012-04-30', 69, 1, 54, 37, 0),
(46, 47, '2012-05-03', 55, 0, 34, 12, 0),
(46, 48, '2012-05-03', 55, 1, 34, 12, 1),
(56, 49, '2012-05-08', 68, 1, 53, 36, 1),
(56, 50, '2012-05-09', 55, 1, 34, 12, 0),
(56, 51, '2012-05-28', 68, 1, 53, 36, 1),
(56, 52, '2012-05-28', 68, 0, 53, 36, 0),
(56, 53, '2012-05-28', 68, 0, 53, 36, 0),
(6, 54, '2012-07-02', 29, 1, 5, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE IF NOT EXISTS `months` (
  `id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL,
  `user` varchar(25) NOT NULL,
  `action` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `timestamp`, `user`, `action`, `name`, `type`) VALUES
(1, '2012-04-11 10:51:51', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/40">Rose</a>', 'Client'),
(2, '2012-04-12 10:16:09', 'Bjoern Groenberg', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/45">sdfsdfsdfsdfsdf</a>', 'Client'),
(3, '2012-04-13 14:29:50', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard/43/33/33/1/4/72/64">Flood</a>', 'Hazard'),
(4, '2012-04-16 15:58:40', 'Bjoern Groenberg', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/46">jinjinjin</a>', 'Client'),
(5, '2012-04-16 15:59:09', 'Bjoern Groenberg', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_contact/46/58">jirjirjir jirjirjir</a>', 'Contact'),
(6, '2012-04-18 13:04:46', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/43">Anna</a>', 'Client'),
(7, '2012-04-18 14:42:05', 'Meetu Singh', 'Deletion', 'Prime Building', 'Building'),
(8, '2012-04-18 14:51:24', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/43/32/66">Tata</a>', 'Building'),
(9, '2012-04-18 15:21:19', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard/2/1/1/2/0/13/26">sdfsdffcv</a>', 'Hazard'),
(10, '2012-04-18 15:21:33', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard/2/1/1/2/0/13/26">sdfsdffcv</a>', 'Hazard'),
(11, '2012-04-18 15:37:34', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_site/34/12">Yunettes</a>', 'Site'),
(12, '2012-04-18 15:37:49', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_site/34/12">Yunettes</a>', 'Site'),
(13, '2012-04-19 12:17:11', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///66/2/1/85/65">South Wall</a>', 'Hazard'),
(14, '2012-04-19 12:22:23', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///66/2/1/85/65">South Wall</a>', 'Hazard'),
(15, '2012-04-19 12:23:48', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///66/2/1/86/66">Foundation</a>', 'Hazard'),
(16, '2012-04-19 12:31:18', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///66/2/1/86/66">Foundation</a>', 'Hazard'),
(17, '2012-04-19 12:31:52', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///66/2/1/86/66">Foundation</a>', 'Hazard'),
(18, '2012-04-19 12:32:25', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///66/2/1/86/66">Foundation</a>', 'Hazard'),
(19, '2012-04-19 12:33:39', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///66/2/1/84/61">Loop</a>', 'Hazard'),
(20, '2012-04-19 12:38:14', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///66/2/1/86/66">Foundation</a>', 'Hazard'),
(21, '2012-04-19 12:38:57', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///66/2/1/85/65">South Wall</a>', 'Hazard'),
(22, '2012-04-19 12:49:46', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///66/2/1/85/65">South Wall</a>', 'Hazard'),
(23, '2012-04-19 14:45:09', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/43">Anna</a>', 'Client'),
(24, '2012-04-19 14:54:47', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/43">Anna</a>', 'Client'),
(25, '2012-04-19 15:19:40', 'Ada Hoi', 'Deletion', 'sdfsdfsdfsdfsdf', 'Client'),
(26, '2012-04-19 16:00:28', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/34">Angel Investments </a>', 'Client'),
(27, '2012-04-23 11:32:31', 'Moe Haddad', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/47">Kalam</a>', 'Client'),
(28, '2012-04-23 11:33:03', 'Moe Haddad', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/47">Kalam</a>', 'Client'),
(29, '2012-04-23 11:57:13', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/48">Test</a>', 'Client'),
(30, '2012-04-23 11:58:04', 'Selwyn Kenneally', 'Deletion', 'Test', 'Client'),
(31, '2012-04-23 11:59:32', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/49">xxx</a>', 'Client'),
(32, '2012-04-23 11:59:47', 'Selwyn Kenneally', 'Deletion', 'xxx', 'Client'),
(33, '2012-04-23 12:13:14', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_contact/28/59">x x</a>', 'Contact'),
(34, '2012-04-23 12:14:02', 'Selwyn Kenneally', 'Deletion', 'x x', 'Contact'),
(35, '2012-04-23 12:59:23', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/50">xxx</a>', 'Client'),
(36, '2012-04-23 12:59:46', 'Meetu Singh', 'Deletion', 'xxx', 'Client'),
(37, '2012-04-23 13:00:38', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_contact/46/60">yyyy yyytuy</a>', 'Contact'),
(38, '2012-04-23 13:03:43', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_contact/47/61">Fatin Harun</a>', 'Contact'),
(39, '2012-04-23 14:40:30', 'Meetu Singh', 'Deletion', 'Operation2 Client', 'Contact'),
(40, '2012-04-23 16:10:43', 'Moe Haddad', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/51">AA Builders</a>', 'Client'),
(41, '2012-04-23 16:13:19', 'Moe Haddad', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_contact/51/62">Lee  Hong</a>', 'Contact'),
(42, '2012-04-23 16:16:47', 'Moe Haddad', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_contact/51/63">Sun Moon</a>', 'Contact'),
(43, '2012-04-23 16:18:36', 'Moe Haddad', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_site/51/35">New Stadium </a>', 'Site'),
(44, '2012-04-24 10:31:04', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/52">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</a>', 'Client'),
(45, '2012-04-24 10:31:35', 'Selwyn Kenneally', 'Deletion', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'Client'),
(46, '2012-04-26 10:17:56', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/43">Anna</a>', 'Client'),
(47, '2012-04-26 12:13:36', 'Meetu Singh', 'Deletion', 'Grasslands2', 'Site'),
(48, '2012-04-30 09:53:02', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/53">Ab Enterprises </a>', 'Client'),
(49, '2012-04-30 09:56:32', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_contact/53/64">Brita Thomas</a>', 'Contact'),
(50, '2012-04-30 09:58:55', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_site/53/36">Town Hall</a>', 'Site'),
(51, '2012-04-30 10:02:22', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/53/36/68">Event Hall</a>', 'Building'),
(52, '2012-04-30 10:05:19', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///68/a/1/90">North Room</a>', 'Area'),
(53, '2012-04-30 10:13:43', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///68/2/1/90/67">Tile</a>', 'Hazard'),
(54, '2012-04-30 10:14:27', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard////1//undefined/undefined">undefined</a>', 'Hazard'),
(55, '2012-04-30 10:59:54', 'Meetu Singh', 'Deletion', 'Monette Padtoc', 'Contact'),
(56, '2012-04-30 11:00:08', 'Meetu Singh', 'Deletion', 'weeee', 'Client'),
(57, '2012-04-30 11:00:30', 'Meetu Singh', 'Deletion', 'jinjinjin', 'Client'),
(58, '2012-04-30 11:01:46', 'Meetu Singh', 'Deletion', 'Shops', 'Site'),
(59, '2012-04-30 11:03:03', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///30/a/1/91">ytutyutyutut y uyu tytu tyu</a>', 'Area'),
(60, '2012-04-30 11:03:17', 'Meetu Singh', 'Deletion', 'ytutyutyutut y uyu tytu tyu', 'Area'),
(61, '2012-04-30 11:03:34', 'Meetu Singh', 'Deletion', 'Angel2', 'Building'),
(62, '2012-04-30 14:42:45', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/54">Jayden</a>', 'Client'),
(63, '2012-04-30 14:45:45', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_contact/54/65">Daniel Graison</a>', 'Contact'),
(64, '2012-04-30 14:52:15', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_site/54/37">Panel </a>', 'Site'),
(65, '2012-04-30 14:56:24', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/54/37/69">Collision Repair Centre</a>', 'Building'),
(66, '2012-04-30 14:58:15', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///69/a/1/92">Kingsland</a>', 'Area'),
(67, '2012-04-30 14:59:54', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///69/1/1/92/68">Bodywork</a>', 'Hazard'),
(68, '2012-04-30 15:06:07', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/53/36/68">Greg Gordon Panelbeaters Ltd</a>', 'Building'),
(69, '2012-04-30 15:18:05', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/34/12/55">Wakefield St Panelbeaters Ltd</a>', 'Building'),
(70, '2012-04-30 15:18:39', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/34/12/55">Wakefield St Panelbeaters Ltd</a>', 'Building'),
(71, '2012-04-30 15:22:12', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/43/32/66">Greenock House</a>', 'Building'),
(72, '2012-04-30 15:23:44', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/43/32/66">Greenock House</a>', 'Building'),
(73, '2012-04-30 15:28:30', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/43/32/66">Greenock House</a>', 'Building'),
(74, '2012-04-30 15:37:26', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/43/33/63">Cafeteria Building</a>', 'Building'),
(75, '2012-04-30 15:48:20', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/44/34/67">FishermanBuilding</a>', 'Building'),
(76, '2012-05-01 11:55:08', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_site/28/38">Waterfront Apartment</a>', 'Site'),
(77, '2012-05-01 11:55:52', 'Selwyn Kenneally', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_site/28/38">ABC Waterfront Building</a>', 'Site'),
(78, '2012-05-01 14:56:22', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///47/g/0/93">Foyer</a>', 'Area'),
(79, '2012-05-01 15:10:40', 'Selwyn Kenneally', 'Deletion', 'WayneBuilds1', 'Building'),
(80, '2012-05-02 16:23:36', 'Selwyn Kenneally', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/1/67">Thorndon</a>', 'Area'),
(81, '2012-05-02 16:32:14', 'Bjoern Groenberg', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/1/94">Thorndon</a>', 'Area'),
(82, '2012-05-02 16:32:38', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/1/94">ThorndonSSS</a>', 'Area'),
(83, '2012-05-02 16:41:21', 'Bjoern Groenberg', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/1/95">Kilbernie</a>', 'Area'),
(84, '2012-05-02 16:41:27', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/1/95">Kilbernie</a>', 'Area'),
(85, '2012-05-02 16:44:49', 'Bjoern Groenberg', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/3/96">TeAro</a>', 'Area'),
(86, '2012-05-02 16:45:02', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/3/96">TeAros</a>', 'Area'),
(87, '2012-05-02 16:50:30', 'Bjoern Groenberg', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/3/97">Auckland</a>', 'Area'),
(88, '2012-05-02 16:50:52', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/3/97">Aucklands</a>', 'Area'),
(89, '2012-05-02 17:11:16', 'Bjoern Groenberg', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/3/98">Lindale</a>', 'Area'),
(90, '2012-05-02 17:11:31', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/3/98">Lindale</a>', 'Area'),
(91, '2012-05-02 17:16:16', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/3/98">Lindale</a>', 'Area'),
(92, '2012-05-02 17:20:57', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///55/a/3/98">Lindale</a>', 'Area'),
(93, '2012-05-02 17:22:55', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///55/1/1/67/69">Flood</a>', 'Hazard'),
(94, '2012-05-02 17:32:43', 'Selwyn Kenneally', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///55/1/1/67/69">Flood</a>', 'Hazard'),
(95, '2012-05-03 10:26:00', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///55/1/1/67/70">Fire</a>', 'Hazard'),
(96, '2012-05-03 10:28:50', 'Selwyn Kenneally', 'Deletion', 'Fire', 'Hazard'),
(97, '2012-05-03 10:31:03', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///55/1/1/67/71">testing deleting a hazard</a>', 'Hazard'),
(98, '2012-05-03 10:31:45', 'Selwyn Kenneally', 'Deletion', 'testing deleting a hazard', 'Hazard'),
(99, '2012-05-03 10:52:28', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///55/1/1/67/72">Exposed wires</a>', 'Hazard'),
(100, '2012-05-08 16:40:22', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///68/2/1/90/73">gjhk</a>', 'Hazard'),
(101, '2012-05-08 21:49:43', 'Jan Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///47/a/2/99">Store</a>', 'Area'),
(102, '2012-05-08 21:50:40', 'Jan Kenneally', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///47/a/2/99">Storeroom</a>', 'Area'),
(103, '2012-05-09 11:29:11', 'Haelly Molly', 'Deletion', 'EnterprisesSite 64534 %$%^$', 'Site'),
(104, '2012-05-09 11:29:33', 'Haelly Molly', 'Deletion', 'WayneSite', 'Site'),
(105, '2012-05-09 11:42:06', 'Haelly Molly', 'Deletion', 'Yunettes', 'Site'),
(106, '2012-05-09 12:24:17', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///66/2/1/84/74">Foundation</a>', 'Hazard'),
(107, '2012-05-09 14:36:06', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page///67/a/1/100">Second floor</a>', 'Area'),
(108, '2012-05-09 15:04:32', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/54">Jayden Enterprises</a>', 'Client'),
(109, '2012-05-09 15:07:08', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/2">Tryang Building Services </a>', 'Client'),
(110, '2012-05-09 15:08:38', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/43">Anna Services</a>', 'Client'),
(111, '2012-05-09 15:11:11', 'Bjoern Groenberg', 'Deletion', 'Anna Services', 'Client'),
(112, '2012-05-09 15:13:00', 'Bjoern Groenberg', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/54">Jaybird Enterprises</a>', 'Client'),
(113, '2012-05-09 15:18:11', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/38">Rohan</a>', 'Client'),
(114, '2012-05-09 15:18:33', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/38">Rohan</a>', 'Client'),
(115, '2012-05-09 15:20:46', 'Meetu Singh', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_contact/38/49">maggi loo</a>', 'Contact'),
(116, '2012-05-10 11:13:42', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/54/37/70">West Tower</a>', 'Building'),
(117, '2012-05-10 11:15:43', 'Selwyn Kenneally', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_site/54/37">Panel Site</a>', 'Site'),
(118, '2012-05-12 14:06:26', 'Selwyn Kenneally', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page/43/33/33/a/1/101">Chapman Room</a>', 'Area'),
(119, '2012-05-28 12:08:54', 'Meetu Singh', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///68/2/1/90/75">kjh</a>', 'Hazard'),
(120, '2012-07-02 11:15:56', ' ', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_contact/1/16">Fred Jones</a>', 'Contact'),
(121, '2012-07-02 11:17:52', ' ', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_building/1/3/8">EUPHY</a>', 'Building'),
(122, '2012-07-02 11:19:19', ' ', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page/3/8/8/g/0/102">Rossy Area</a>', 'Area'),
(123, '2012-07-02 11:22:14', ' ', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///29/1/4/41/76">Hazard name</a>', 'Hazard'),
(124, '2012-07-03 12:27:26', ' ', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page/3/8/8/g/0/103">Another area</a>', 'Area'),
(125, '2012-07-03 12:27:56', ' ', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page/3/8/8/a/5/104">level five</a>', 'Area'),
(126, '2012-07-03 12:28:14', ' ', 'Update', '<a href="http://bis.capitalplanning.co.nz/index.php/buildingmanagement/view_area_page/3/8/8/a/5/104">level five</a>', 'Area'),
(127, '2012-07-03 15:47:42', 'Bjorn', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/clientmanagement/view_client/55">Lunmaria</a>', 'Client'),
(128, '2012-11-05 15:59:46', '0', 'Add', '<a href="http://bis.capitalplanning.co.nz/index.php/buildinginspection/view_hazard///29/2/0/39/77">Wires</a>', 'Hazard');

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE IF NOT EXISTS `report_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `report_type`
--

INSERT INTO `report_type` (`id`, `report`) VALUES
(1, 'Inspections'),
(2, 'BWoFs');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `user_id`, `sitename`, `address_line_1`, `address_line_2`, `suburb`, `city`, `country`, `company`) VALUES
(1, 6, 'Maritime House', '220 Willis Street, Te Aro, Wellington', 'te Aro', 'dasdas', 'Wellington', 162, 2),
(2, 6, 'Brumbies', '97-95 Ghuznee Street, Wellington', '', 'asda', 'asdas', 162, 3),
(3, 6, 'asd', 'asd', '', 'asd', 'asdds', 162, 1),
(34, 56, 'NewTownSite', 'SouthNewTown', 'South New Town', 'NewTown', 'Hamilton', 14, 44),
(8, 6, 'Opesite', 'Opesite', '', 'Opesite', 'Opesite', 162, 3),
(9, 6, 'Wayne Manor', '445 Main Road', '', 'Richie', 'Gotham', 162, 29),
(10, 6, 'Building', '3343 Street Road', '', 'jjjfjfj', 'jdjdfjdjdfjjdf', 162, 29),
(37, 56, 'Panel Site', '345 The Terrace', '', 'Te Aro', 'Wellington', 162, 54),
(13, 6, 'Lovedubs', 'Lovedubs', 'Lovedubs', 'Lovedubs', 'Lovedubs', 162, 1),
(14, 6, 'try', 'try', 'try', 'try', 'try', 162, 5),
(15, 6, 'City Site', 'City Site', '', 'City Site', 'City Site', 162, 5),
(16, 6, 'City Site2', 'City Site2', '', 'City Site2', 'City Site2', 162, 5),
(17, 6, 'Grasslands', 'Grasslands', '', 'Grasslands', 'Grasslands', 162, 30),
(36, 56, 'Town Hall', 'Land Road South ', '', 'Porirua', 'Auckland', 162, 53),
(19, 6, 'Highrise Site', 'Highrise Site', '', 'Highrise Site', 'Highrise Site', 162, 20),
(20, 6, 'Jiang site', 'Jiang site', '', 'Jiang site', 'Jiang site', 162, 12),
(21, 6, 'Jiang site2', 'Jiang site2', '', 'Jiang site2', 'Jiang site2', 162, 12),
(24, 6, 'WellingtonSites', 'WellingtonSites', 'WellingtonSites', 'WellingtonSites', 'WellingtonSites', 162, 4),
(38, 46, 'ABC Waterfront Building', '123 The Promanade', '', 'Central City', 'Wellington', 162, 28),
(26, 56, 'Old Book City', '102 Labtom Quay greenock house', '', 'wellington cbd', 'Wellington', 162, 37),
(35, 82, 'New Stadium ', 'Mount Eden Stadiun', '', 'Mount Eden', 'Auckalnd', 162, 51),
(28, 56, 'new site', '87 new way', '', 'tawa', 'Wellington, 6012', 162, 35),
(32, 56, 'ASB @ Lambton Quay', '12, Lambton Quay ', '', 'Wellington CBD', 'Wellington, 6012', 162, 43),
(30, 56, 'Te aro', '5 Te Aro', '', 'Te Aro', 'Wellington, 6012', 162, 38),
(33, 56, 'KFC @ Kent Tech', 'Main Road Kent Tech Corner of Mt. Victoria', '', 'Mt. Victoria ', 'Wellington', 162, 43);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `title`) VALUES
(1, 'Mr'),
(2, 'Mrs'),
(3, 'Ms'),
(4, 'Miss');

-- --------------------------------------------------------

--
-- Table structure for table `user_notes`
--

CREATE TABLE IF NOT EXISTS `user_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activities` varchar(255) NOT NULL,
  `client` int(11) NOT NULL DEFAULT '0',
  `building` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `purpose` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `user_notes`
--

INSERT INTO `user_notes` (`id`, `name`, `user_id`, `activities`, `client`, `building`, `date`, `purpose`) VALUES
(43, 'testcase', 44, 'testing again', 0, 0, '0000-00-00', 0),
(44, 'Inspection', 56, '', 43, 64, '0000-00-00', 3),
(46, 'Retest', 56, '', 44, 67, '0000-00-00', 3),
(48, 'QualityCheck', 82, '', 43, 0, '0000-00-00', 1),
(50, 'sdfghj', 56, '', 0, 66, '2012-04-23', 3),
(51, 'Open', 56, '', 34, 3, '2012-04-26', 3),
(52, 'Inspectioncomplet', 56, '', 53, 68, '0000-00-00', 3),
(54, 'Leas Renew', 56, '', 51, 28, '2011-07-05', 2),
(55, 'rte', 84, '', 0, 0, '2012-04-30', 0),
(56, 'Building Visit', 56, '', 54, 69, '2012-04-30', 3),
(57, 'stop', 56, '', 31, 9, '2012-04-30', 1),
(58, 'sdfghjkl', 6, '', 0, 3, '2012-04-30', 0),
(59, 'gytry', 56, '', 53, 29, '2012-04-30', 1),
(63, 'Building', 56, '', 28, 10, '2012-05-08', 2),
(64, 'Second Inspection', 56, '', 54, 14, '2012-05-08', 3),
(67, 'xxxxxxxxxxxx', 86, 'xxxxx', 0, 0, '0000-00-00', 0),
(68, 'Testing', 86, 'Test', 0, 0, '0000-00-00', 0),
(69, 'xxxxxxxxxxxsdf', 86, 'xxxxxxxxxxx', 0, 0, '0000-00-00', 0),
(75, 'abcdefghigk', 56, '', 0, 0, '0000-00-00', 0),
(76, 'testentryandadded', 56, '', 0, 0, '0000-00-00', 0),
(79, 'Tel Bill', 56, '', 53, 2, '2012-05-12', 2),
(80, 'Payment Recovery', 56, '', 34, 2, '2012-05-14', 4),
(83, 'Event ', 56, '', 0, 0, '2012-06-02', 4),
(84, 'Important meeting with Jody @ CBD', 56, '', 51, 2, '2012-06-14', 1),
(87, 'Re Inspection with Client 222@$ -:().', 84, 'Re Inspection with Client 222@$ -:().', 51, 46, '2012-05-09', 2),
(91, 'Call aa to pay there subscription ', 6, '$1095 is due ready to pay collect money from AA on Monday ', 51, 0, '2012-05-09', 4),
(93, 'Test ', 31, '', 53, 0, '2012-05-09', 4),
(94, 'dusydfus', 56, '', 0, 0, '2012-05-10', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

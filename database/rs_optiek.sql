-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 17, 2018 at 05:02 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs optiek`
--

-- --------------------------------------------------------

--
-- Table structure for table `brilmonturen`
--

DROP TABLE IF EXISTS `brilmonturen`;
CREATE TABLE IF NOT EXISTS `brilmonturen` (
  `ID` varchar(5) NOT NULL,
  `voor` varchar(20) NOT NULL,
  `kleur` varchar(20) NOT NULL,
  `prijs` varchar(20) NOT NULL,
  `materiaal` varchar(20) NOT NULL,
  `vorm` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `codenaam` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brilmonturen`
--

INSERT INTO `brilmonturen` (`ID`, `voor`, `kleur`, `prijs`, `materiaal`, `vorm`, `merk`, `type`, `codenaam`) VALUES
('2c', 'kinderen', 'rood', 'Eur 60', 'metaal', 'ovaal', 'Prada', 'randbril', 'Prada randbril'),
('7c', 'dames', 'wit', 'Eur 12', 'kunststof', 'ovaal', 'Gucci', 'randbril', 'Gucci randbril'),
('1c', 'dames', 'beige', 'Eur 50', 'kunststof', 'amandel', '5th Avenuee', 'randbril', '5th Avenue randbril'),
('3c', 'heren', 'goud', 'Eur 65', 'organisch', 'rechthoekig', 'Calvin Klein', 'randloos', 'Calvin Klein randloze bril'),
('4c', 'dames', 'rose', 'Eur 32', 'metaal', 'cat eye', 'Be Bright', 'semi-randloos', 'Be Bright semi-randloze bril'),
('5c', 'heren', 'bruin', 'Eur 45', 'kunststof', 'piloot', 'Ralph', 'semi-randloos', 'Ralph semi-randloze bril'),
('6c', 'kinderen', 'brons', 'Eur 30', 'organisch', 'rond', 'Enzzo', 'randloos', 'Enzzo randloze bril');

-- --------------------------------------------------------

--
-- Table structure for table `contactlenzen`
--

DROP TABLE IF EXISTS `contactlenzen`;
CREATE TABLE IF NOT EXISTS `contactlenzen` (
  `ID` varchar(5) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `fabrikant` varchar(20) NOT NULL,
  `lenstype` varchar(20) NOT NULL,
  `draagperiode` varchar(20) NOT NULL,
  `corrigeert` varchar(30) NOT NULL,
  `codenaam` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactlenzen`
--

INSERT INTO `contactlenzen` (`ID`, `merk`, `fabrikant`, `lenstype`, `draagperiode`, `corrigeert`, `codenaam`) VALUES
('7b', 'Dailies', 'Amo', 'torische lens', 'daglens', 'bijziendheid, verziendheid', 'Dailies torische lens'),
('1b', 'Air Optix', 'Alcon', 'progressieve lens', 'weeklens', 'astigmatisme', 'Air Optix progressieve lens'),
('6b', 'Ultra', 'Johnson & Johnson', 'progressieve lens', 'maandlens', 'ouderdomsverziendheid', 'Ultra progressieve lens'),
('5b', 'MyDay', 'Alcon', 'kleurlens', 'daglens', 'astigmatisme', 'MyDay kleurlens'),
('4b', 'PureVision', 'CooperVision', 'torische lens', 'weeklens', 'bijziendheid, verziendheid', 'PureVision torische lens'),
('3b', 'Freshlook', 'Johnson & Johnson', 'sferische lens', 'daglens', 'bijziendheid, verziendheid', 'Freshlook sferische lens'),
('2b', 'Biofinity', 'Bausch & Lomb', 'multifocale lens', 'maandlens', 'ouderdomsverziendheid', 'Biofinity multifocale lens');

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

DROP TABLE IF EXISTS `klanten`;
CREATE TABLE IF NOT EXISTS `klanten` (
  `klantennr` int(10) DEFAULT NULL,
  `naam` varchar(20) NOT NULL,
  `voornaam` varchar(15) NOT NULL,
  `adres` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `geboortedatum` date DEFAULT NULL,
  `sterktelinkeroog` varchar(5) DEFAULT NULL,
  `sterkterechteroog` varchar(5) DEFAULT NULL,
  `mobiel` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`klantennr`, `naam`, `voornaam`, `adres`, `email`, `geboortedatum`, `sterktelinkeroog`, `sterkterechteroog`, `mobiel`) VALUES
(1, 'Vamratan', 'Rishant', 'Nickeriestraat 76', 'rishantvamratan@gmail.com', '1996-04-13', '-1.00', '-2', 8985302),
(2, 'Soodly', 'Wandrina', 'Bataafstr 10', 'Wan3naSoodly@gmail.com', '1997-03-04', '-1.00', '-0.75', 8986335),
(3, 'Sharma', 'Varoena', 'Area 51, Nevada', 'VaroenaSharma@hotmail.com', '2000-01-09', '1.60', '0.75', 8966242),
(4, 'Rewsattan', 'Sajon', 'Freddiestraat 111', 'RewsattanS@outlook.com', '1975-10-01', '1.80', '1.80', 8185940),
(5, 'Steen', 'Johan', 'Magentakanaalstr 89', 'JohnDoe13@gmail.com', '1985-07-18', '-1.20', '-3.5', 8922811),
(6, 'Ralo', 'Yaoul', 'Eenweg 123', 'SteroidIzLife@gmail.com', '1952-03-26', '1.00', '1.00', 8946533);

-- --------------------------------------------------------

--
-- Table structure for table `lenzenvloeistof`
--

DROP TABLE IF EXISTS `lenzenvloeistof`;
CREATE TABLE IF NOT EXISTS `lenzenvloeistof` (
  `ID` varchar(5) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `type` varchar(30) NOT NULL,
  `fabrikant` varchar(20) NOT NULL,
  `inhoud` varchar(20) NOT NULL,
  `prijs` varchar(20) NOT NULL,
  `codenaam` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lenzenvloeistof`
--

INSERT INTO `lenzenvloeistof` (`ID`, `merk`, `model`, `type`, `fabrikant`, `inhoud`, `prijs`, `codenaam`) VALUES
('3a', 'BioTrue', 'Flight Pack', 'All-in-one', 'Bausch & Lomb', '2X60ml', 'Eur 8', 'BioTrue all-in-one'),
('7a', 'Progent', 'Cleaner', 'harde lenzenvloeistof', 'Menicon', '5 ampullen', 'Eur 13', 'Progent harde lenzenvloeistof'),
('1a', 'Aosept', 'Aosept plus', 'Zachte lenzen', 'Menicon', '360 ml', 'Eur 15', 'Aosept zachte lenzen'),
('2a', 'BioTrue', 'Eye drops', 'Oogdruppels', 'Vuneo', '10 ml', 'Eur 12', 'BioTrue oogdruppels'),
('4a', 'Blink', 'Contacts', 'Hydraterende eyedrops', 'Amo', '10 ml', 'Eur 12', 'Blink oogdruppels'),
('5a', 'Blink', 'Intensive tears', 'Smerende eyedrops', 'Amo', '20X0.40ml', 'Eur 12', 'Blink smerende eyedrops'),
('6a', 'Boston', 'Advance Cleaner', 'All-in-one', 'Bausch & Lomb', '30 ml', 'Eur 11', 'Boston all-in-one');

-- --------------------------------------------------------

--
-- Table structure for table `rs optiek admins`
--

DROP TABLE IF EXISTS `rs optiek admins`;
CREATE TABLE IF NOT EXISTS `rs optiek admins` (
  `ID` int(11) NOT NULL,
  `Gebruikersnaam` varchar(20) NOT NULL,
  `Wachtwoord` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs optiek admins`
--

INSERT INTO `rs optiek admins` (`ID`, `Gebruikersnaam`, `Wachtwoord`) VALUES
(1, 'Vishant', 'optiekRS'),
(2, 'adminx', 'adminx'),
(3, 'Sardha', 'Raghosing');

-- --------------------------------------------------------

--
-- Table structure for table `verkoop`
--

DROP TABLE IF EXISTS `verkoop`;
CREATE TABLE IF NOT EXISTS `verkoop` (
  `klant` varchar(40) NOT NULL,
  `product` varchar(40) NOT NULL,
  `datum` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verkoop`
--

INSERT INTO `verkoop` (`klant`, `product`, `datum`) VALUES
('Sajon Rewsattan', 'PureVision torische lens', '2018-01-13'),
('Yaoul Ralo', 'Blink oogdruppels', '2017-12-31'),
('Rishant Vamratan', 'Aosept zachte lenzen', '2018-01-01'),
('Sajon Rewsattan', 'Ralph semi-randloze bril', '2018-01-04'),
('Johan Steen', 'Gucci randbril', '2017-11-01'),
('Wandrina Soodly', 'Prada randbril', '2018-01-02'),
('Varoena Sharma', 'Blink smerende eyedrops', '2018-01-03'),
('Sajon Rewsattan', 'Freshlook sferische lens', '2018-01-17'),
('Wandrina Soodly', 'Freshlook sferische lens', '2018-01-17'),
('Rishant Vamratan', 'Boston all-in-one', '2018-01-18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

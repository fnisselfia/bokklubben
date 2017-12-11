-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:8889
-- Tid vid skapande: 09 dec 2017 kl 11:09
-- Serverversion: 5.6.35
-- PHP-version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `Bokklubb`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `Author`
--

CREATE TABLE `Author` (
  `Fname` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Lname` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Ssn` int(11) NOT NULL,
  `Birthyear` int(11) NOT NULL,
  `Link` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `Author`
--

INSERT INTO `Author` (`Fname`, `Lname`, `Ssn`, `Birthyear`, `Link`, `ID`) VALUES
('John', 'Bauer', 444478888, 19960228, 'www.junblom.se', 0),
('John', 'Bauer', 444478888, 19960228, 'www.junblom.se', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `Book`
--

CREATE TABLE `Book` (
  `Title` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `Author` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Pages` int(11) NOT NULL,
  `editionNumber` int(11) NOT NULL,
  `publishingYear` int(11) NOT NULL,
  `publishingCompany` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Isbn` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `onloan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `Book`
--

INSERT INTO `Book` (`Title`, `Author`, `Pages`, `editionNumber`, `publishingYear`, `publishingCompany`, `Isbn`, `onloan`) VALUES
('Submarine', 'The moon', 55, 2, 1989, 'the moon', '123', 0),
('The moose', 'tomten', 4, 1, 1989, 'the moon', '1337', 0),
('spä', 'spä', 0, 0, 0, '', '144444', 0),
('The Bible', 'Jesus', 2, 2, 0, 'The church troopers AB', '17', 1),
('asdasd', '1232qdsa', 0, 0, 0, '', '233', 0),
('test', 'Ko', 0, 0, 0, '', '2345322', 1),
('test', 'efadfwe', 0, 0, 0, '', '4', 0),
('Ko', 'muuuuu', 0, 0, 0, '', '44', 0),
('röd', 'kapten', 0, 0, 0, '', '88', 0),
('yo', 'yo', 0, 0, 0, '', '9990', 0),
('korv', 'mos', 122, 2, 1, 'katt', 'o3928752085', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `username` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `userpass` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`username`, `userpass`) VALUES
('Annika', 'Annika'),
('Annika', 'Annika'),
('Kanot', 'de921f03854b2c9b8ca72a554f3adf9c09047d08'),
('Kanot', 'de921f03854b2c9b8ca72a554f3adf9c09047d08');

-- --------------------------------------------------------

--
-- Tabellstruktur `Written`
--

CREATE TABLE `Written` (
  `ISBNID` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `AuthorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`Isbn`);

--
-- Index för tabell `Written`
--
ALTER TABLE `Written`
  ADD PRIMARY KEY (`ISBNID`,`AuthorID`),
  ADD KEY `AuthorID` (`AuthorID`);

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `Written`
--
ALTER TABLE `Written`
  ADD CONSTRAINT `AuthorID` FOREIGN KEY (`AuthorID`) REFERENCES `Author` (`ID`),
  ADD CONSTRAINT `ISBNID` FOREIGN KEY (`ISBNID`) REFERENCES `Book` (`Isbn`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

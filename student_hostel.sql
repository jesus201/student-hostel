-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Nov 2017 um 05:03
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `student_hostel`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `house_master`
--

CREATE TABLE `house_master` (
  `house_master_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `id_number` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `house_master`
--

INSERT INTO `house_master` (`house_master_id`, `fname`, `lname`, `birthdate`, `id_number`, `email`, `pword`) VALUES
(70, 'sds', 'sdfsf', '2017-11-07', 23424234, 'sergeshalowilson@gmail.com', '123'),
(71, '', '', '0000-00-00', 0, '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `st_fname` varchar(100) NOT NULL,
  `st_lname` varchar(100) NOT NULL,
  `st_email` varchar(100) NOT NULL,
  `st_birthdate` date NOT NULL,
  `id_number` int(11) NOT NULL,
  `st_telnumber` int(11) NOT NULL,
  `st_dateregister` datetime NOT NULL,
  `house_master_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `student`
--

INSERT INTO `student` (`student_id`, `st_fname`, `st_lname`, `st_email`, `st_birthdate`, `id_number`, `st_telnumber`, `st_dateregister`, `house_master_id`) VALUES
(113, 'sdfsdf', 'sdfsdf', 'sdfsf', '2017-11-17', 323, 23, '2017-11-02 04:30:15', 70),
(114, 'sdfsdf', 'sdfsdf', 'sdfsdf', '2017-11-24', 323, 23, '2017-11-02 04:30:28', 70),
(115, 'serge', 'sha', 'sdsdf', '0000-00-00', 0, 0, '2017-11-02 04:30:38', 70),
(116, 'rene', '', '', '0000-00-00', 0, 0, '2017-11-02 04:31:18', 70),
(117, 'terer', '', '', '0000-00-00', 0, 0, '2017-11-02 04:31:26', 70);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `house_master`
--
ALTER TABLE `house_master`
  ADD PRIMARY KEY (`house_master_id`);

--
-- Indizes für die Tabelle `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `house_master`
--
ALTER TABLE `house_master`
  MODIFY `house_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT für Tabelle `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

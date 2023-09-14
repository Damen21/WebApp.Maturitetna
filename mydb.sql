-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 14. apr 2022 ob 22.29
-- Različica strežnika: 10.4.21-MariaDB
-- Različica PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `mydb`
--

-- --------------------------------------------------------

--
-- Struktura tabele `account`
--
CREATE DATABASE mydb;
USE mydb;

CREATE TABLE `account` (
  `idaccount` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `accpwd` varchar(300) NOT NULL,
  `email` varchar(45) NOT NULL,
  `kraj` varchar(45) NOT NULL,
  `instagram` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `account`
--

INSERT INTO `account` (`idaccount`, `username`, `accpwd`, `email`, `kraj`, `instagram`) VALUES
(1, 'aa', '$2y$10$DP.g54uJAvTy2ABz5eiGI.jjp99dMNKSy6o6KZm3v/UyQFXfPjPX.', 'aa@gmail.com', 'aa', 'aa'),
(2, 'bb', '$2y$10$KVpmrSkwXKBUkXlYsDQ2xuPkOBFDMUINtA6zxcOoFrd3eGHsNuVTS', 'bb@gmail.com', 'bb', 'bb'),
(3, 'a', '$2y$10$q4Ri3M66H.0YpdupyPfdo.N2DP7ln8UefWfSVGfgaM/XZot7FtLtK', 'a@gmail.com', 'a', 'a'),
(4, 'mitco', '$2y$10$lNIwzSWL7KLmYQsnMHgaVOtrn2mQg0oVJ8PIwstxOq6t53xLaJLL6', 'mitjap12345@gmail.com', 'ig', 'pangrc_mitja'),
(5, 'deki', '$2y$10$sSqzspzNTMr82w2Kexglwec84XfkU/Kw/I7myAH.vj9dSbYg8jeea', 'baka@gmail.com', 'lj', 'ja'),
(6, 'ss', '$2y$10$XiW.8TCsMo0paYmuyOSbheti6tKK2rUFsNZ.GSawSFTXAHL6.Aotu', 'ss@gmail.com', 'lj', 'ss'),
(7, 'sus', '$2y$10$m2pjv7yE887qq9SkpaVrneSgHejgknmCXTrpweauY730khPJhM2FO', 'sus@gmail.com', 'lj', 'sus'),
(8, 'sussy', '$2y$10$LRFAocMJh.r0rqbZwvkEoOXMBElpp75//Db7maZTDKRjTyNfZzGpq', 'sussy@gmail.com', 'mb', 'sussy'),
(9, 'cc', '$2y$10$qVYDmTcUyrv74MMpZOM9Je3OpAojgzqaxgYTE.Q.zAO0N9gwlHscW', 'cc@po.je', 'cc', 'cc'),
(10, 'admin', '$2y$10$koiG1qytg9ze9l.EnyjPIOa8UFzleyrFrLwfmqeHMnCn/epSqcU4i', 'mramordomen@gmail.com', 'domžale', 'aa'),
(11, 'pipi', '$2y$10$ceYLroEOQ4PAPJ7y.MveqOAl65mZLQTwEf7kr.eV099AS2sxCun5.', 'uai@ghdej.pih', 'dwq', 'qf'),
(12, 'prrr', '$2y$10$wTDgFooAzbZv9YYSABeH.OBvKAd360cgrFcPl4RWdB02vkBGN2dGK', 'rr@hfaf.egweas', 'rr', 'rr'),
(13, 'hoo', '$2y$10$9k5hdQ1n0KIVDiJcvFc9eO/X4KGWs5xsjHyWonFYcurtvH3TD8ia.', 'pugapants1@gmail.com', 'hoo', 'hoo');

-- --------------------------------------------------------

--
-- Struktura tabele `auction`
--

CREATE TABLE `auction` (
  `idauction` int(11) NOT NULL,
  `startingprice` float NOT NULL,
  `currentprice` float DEFAULT 0,
  `expiration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `auction`
--

INSERT INTO `auction` (`idauction`, `startingprice`, `currentprice`, `expiration_date`) VALUES
(10, 50, NULL, '0000-00-00 00:00:00'),
(11, 300, NULL, '2022-04-03 02:36:02'),
(12, 54, NULL, '2022-04-02 19:54:02'),
(13, 50, 57, '2022-04-03 14:21:03'),
(14, 300, 0, '2022-04-03 14:19:47'),
(15, 300, 68, '2022-04-03 14:29:33'),
(16, 54, 99, '2022-04-03 18:34:57'),
(17, 300, 40, '2022-04-14 20:55:05'),
(18, 600, 10, '2022-04-14 22:52:26'),
(19, 50, 50, '2022-04-14 19:11:15'),
(20, 35, 0, '2022-04-14 22:50:23'),
(21, 357, 0, '2022-04-24 22:50:30'),
(22, 3, 0, '2022-04-15 02:50:36');

-- --------------------------------------------------------

--
-- Struktura tabele `bid`
--

CREATE TABLE `bid` (
  `idbid` int(11) NOT NULL,
  `vrednost` int(11) NOT NULL,
  `account_idaccount` int(11) NOT NULL,
  `auction_idauction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `bid`
--

INSERT INTO `bid` (`idbid`, `vrednost`, `account_idaccount`, `auction_idauction`) VALUES
(1, 56, 2, 13),
(2, 700, 2, 13),
(3, 56, 1, 14),
(4, 59, 1, 14),
(5, 57, 2, 13),
(6, 68, 1, 15),
(7, 99, 2, 16),
(8, 40, 2, 17),
(9, 50, 2, 18),
(10, 10, 2, 18),
(11, 12, 2, 19),
(12, 20, 2, 19),
(13, 45, 2, 19),
(14, 23, 9, 19),
(15, 50, 9, 19);

-- --------------------------------------------------------

--
-- Struktura tabele `item`
--

CREATE TABLE `item` (
  `iditems` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `znamka` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `account_idaccount` int(11) NOT NULL,
  `opis` varchar(150) NOT NULL,
  `auction_idauction` int(11) DEFAULT NULL,
  `cena` float NOT NULL,
  `stanje` varchar(15) NOT NULL,
  `imgpath` varchar(255) NOT NULL,
  `uploadDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `item`
--

INSERT INTO `item` (`iditems`, `ime`, `znamka`, `model`, `account_idaccount`, `opis`, `auction_idauction`, `cena`, `stanje`, `imgpath`, `uploadDate`) VALUES
(26, 'jordan 1red', 'yeezy', 'jordan 1', 1, 'very good šu men', 20, 350, 'novo', 'jordan-1red.62584bc1b41b45.00123356.png', '2022-04-14'),
(27, 'yeezy 350 beli', 'yeezy', '350 boost', 1, 'zlo uredu  kupi hitro', 21, 220, 'novo', 'yeezy-350-beli.62584bf20fc4a5.06799844.png', '2022-04-14'),
(28, 'dunks panda', 'nike', 'dunks', 1, 'hitro rabim prodati, cena ni zadnja', NULL, 456, 'novo', 'dunks-panda.62584c14cd5936.26411358.png', '2022-04-14'),
(29, 'Jordan 1 UNC', 'jordan', 'jordan 1 high', 9, 'nove, kupljene v grosbasketu', NULL, 450, 'novo', 'jordan-1-unc.625857b6b13a54.79328764.png', '2022-04-14');

-- --------------------------------------------------------

--
-- Struktura tabele `msgs`
--

CREATE TABLE `msgs` (
  `idmessage` int(11) NOT NULL,
  `besedilo` varchar(100) NOT NULL,
  `cas_napisa` timestamp NULL DEFAULT NULL,
  `posiljatelj` int(11) NOT NULL,
  `prejemnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `msgs`
--

INSERT INTO `msgs` (`idmessage`, `besedilo`, `cas_napisa`, `posiljatelj`, `prejemnik`) VALUES
(5, 'testiramo', '2022-03-09 11:23:44', 1, 2),
(6, 'to pa je slika', '2022-03-09 11:47:33', 1, 2),
(18, 'yoo', '2022-04-11 07:11:00', 1, 9),
(19, 'yep', '2022-04-11 07:11:39', 1, 2),
(21, 'suo', '2022-04-11 07:13:35', 1, 9),
(22, 'ye', '2022-04-11 07:14:08', 1, 9),
(25, 'wrqf', '2022-04-12 10:21:10', 1, 2),
(27, 'inhqafg', '2022-04-12 10:21:18', 1, 2),
(28, 'as fix', '2022-04-12 09:58:23', 10, 2),
(29, 's', '2022-04-14 05:13:59', 2, 1),
(30, 'se da cena jordank znižati?', '2022-04-14 05:20:21', 2, 9),
(31, 'ja, najnižje grem do 400$', '2022-04-14 05:21:17', 9, 2),
(32, 'baka', '2022-04-14 06:51:57', 1, 9);

-- --------------------------------------------------------

--
-- Struktura tabele `slika`
--

CREATE TABLE `slika` (
  `idslika` int(11) NOT NULL,
  `Item_iditems` int(11) NOT NULL,
  `slika_path` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabele `watchlist`
--

CREATE TABLE `watchlist` (
  `account_idaccount` int(11) NOT NULL,
  `items_iditems` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `watchlist`
--

INSERT INTO `watchlist` (`account_idaccount`, `items_iditems`) VALUES
(2, 26),
(2, 28);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`idaccount`);

--
-- Indeksi tabele `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`idauction`);

--
-- Indeksi tabele `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`idbid`),
  ADD KEY `fk_bid_account1_idx` (`account_idaccount`),
  ADD KEY `fk_bid_auction1_idx` (`auction_idauction`);

--
-- Indeksi tabele `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iditems`),
  ADD KEY `fk_items_account1_idx` (`account_idaccount`),
  ADD KEY `fk_Item_auction1_idx` (`auction_idauction`);

--
-- Indeksi tabele `msgs`
--
ALTER TABLE `msgs`
  ADD PRIMARY KEY (`idmessage`),
  ADD KEY `fk_message_account1_idx` (`posiljatelj`),
  ADD KEY `fk_message_account2_idx` (`prejemnik`);

--
-- Indeksi tabele `slika`
--
ALTER TABLE `slika`
  ADD PRIMARY KEY (`idslika`),
  ADD KEY `fk_slika_Item1_idx` (`Item_iditems`);

--
-- Indeksi tabele `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`account_idaccount`,`items_iditems`),
  ADD KEY `fk_account_has_items_items1_idx` (`items_iditems`),
  ADD KEY `fk_account_has_items_account_idx` (`account_idaccount`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `account`
--
ALTER TABLE `account`
  MODIFY `idaccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT tabele `auction`
--
ALTER TABLE `auction`
  MODIFY `idauction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT tabele `bid`
--
ALTER TABLE `bid`
  MODIFY `idbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT tabele `item`
--
ALTER TABLE `item`
  MODIFY `iditems` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT tabele `msgs`
--
ALTER TABLE `msgs`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT tabele `slika`
--
ALTER TABLE `slika`
  MODIFY `idslika` int(11) NOT NULL AUTO_INCREMENT;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `fk_bid_account1` FOREIGN KEY (`account_idaccount`) REFERENCES `account` (`idaccount`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bid_auction1` FOREIGN KEY (`auction_idauction`) REFERENCES `auction` (`idauction`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_Item_auction1` FOREIGN KEY (`auction_idauction`) REFERENCES `auction` (`idauction`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_items_account1` FOREIGN KEY (`account_idaccount`) REFERENCES `account` (`idaccount`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `msgs`
--
ALTER TABLE `msgs`
  ADD CONSTRAINT `fk_message_account1` FOREIGN KEY (`posiljatelj`) REFERENCES `account` (`idaccount`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_message_account2` FOREIGN KEY (`prejemnik`) REFERENCES `account` (`idaccount`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `slika`
--
ALTER TABLE `slika`
  ADD CONSTRAINT `fk_slika_Item1` FOREIGN KEY (`Item_iditems`) REFERENCES `item` (`iditems`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `fk_account_has_items_account` FOREIGN KEY (`account_idaccount`) REFERENCES `account` (`idaccount`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_account_has_items_items1` FOREIGN KEY (`items_iditems`) REFERENCES `item` (`iditems`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

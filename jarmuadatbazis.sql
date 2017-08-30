-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Aug 30. 12:51
-- Kiszolgáló verziója: 10.1.21-MariaDB
-- PHP verzió: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `jarmuadatbazis`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `auto`
--

CREATE TABLE `auto` (
  `id` int(10) NOT NULL,
  `fenykep` mediumtext,
  `kategoria` varchar(100) NOT NULL,
  `automarka_id` varchar(60) NOT NULL,
  `ar_1` int(10) NOT NULL,
  `ar_2` int(10) NOT NULL,
  `ar_3` int(10) NOT NULL,
  `marka_tipus` varchar(80) NOT NULL,
  `evjarat` int(4) NOT NULL,
  `allapot` varchar(50) NOT NULL,
  `km_ora_allasa` int(10) NOT NULL,
  `szallithato_szemelyek` int(10) NOT NULL,
  `uzemanyag` varchar(100) NOT NULL,
  `hengerurtartalom` int(10) NOT NULL,
  `teljesitmeny` int(100) NOT NULL,
  `sajat_tomeg` int(100) NOT NULL,
  `maximalis_tomeg` int(100) NOT NULL,
  `tank_meret` int(5) NOT NULL,
  `atlagfogyasztas` float NOT NULL,
  `vegsebesseg` int(10) NOT NULL,
  `gyorsulas` float NOT NULL,
  `oktanszam` int(5) NOT NULL,
  `kolcsonzes` varchar(100) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `auto`
--

INSERT INTO `auto` (`id`, `fenykep`, `kategoria`, `automarka_id`, `ar_1`, `ar_2`, `ar_3`, `marka_tipus`, `evjarat`, `allapot`, `km_ora_allasa`, `szallithato_szemelyek`, `uzemanyag`, `hengerurtartalom`, `teljesitmeny`, `sajat_tomeg`, `maximalis_tomeg`, `tank_meret`, `atlagfogyasztas`, `vegsebesseg`, `gyorsulas`, `oktanszam`, `kolcsonzes`) VALUES
(12, 'pictures/jarmuadatbazis_kepek/bmw_i8.jpg', 'Sportautó', 'BMW', 59990, 55990, 46990, 'i8', 2016, 'Újszerű', 1920, 2, 'Elektromos/Benzin', 6229, 721, 1201, 1690, 50, 8.9, 341, 3.2, 95, 'Kölcsönzés'),
(13, 'pictures/jarmuadatbazis_kepek/mercedes_cla220.jpg', 'Személyautó', 'Mercedes',  14990, 12990, 9990, 'CLA 220', 2013, 'Újszerű', 19920, 5, 'Benzin', 2189, 178, 1560, 1987, 60, 8.1, 220, 7.9, 95, 'Kölcsönzés'),
(14, 'pictures/jarmuadatbazis_kepek/skoda_superb.jpg', 'Személyautó', 'Skoda', 11990, 9990, 7690, 'Superb', 2011, 'Újszerű', 23870, 5, 'Benzin', 1980, 160, 1790, 2390, 60, 8.8, 198, 8.8, 95, 'Kölcsönzés'),
(15, 'pictures/jarmuadatbazis_kepek/infiniti_g37cabrio.jpg', 'Cabrio', 'Infiniti',  29990, 26990, 21990, 'G37 Cabrio', 2010, 'Újszerű', 15678, 4, 'Benzin', 3700, 320, 1800, 2400, 80, 9.8, 250, 5.2, 95, 'Kölcsönzés'),
(16, 'pictures/jarmuadatbazis_kepek/ford_focus.jpg', 'Személyautó', 'Ford',  9890, 7890, 5890, 'Focus', 2015, 'Újszerű', 2980, 5, 'Benzin', 1600, 120, 1490, 1990, 50, 6.8, 180, 10.1, 95, 'Kölcsönzés'),
(17, 'pictures/jarmuadatbazis_kepek/ferrari_california.jpg', 'Sportautó', 'Ferrari',  43990, 40990, 36990, 'California T', 2013, 'Újszerű', 1270, 2, 'Benzin', 4300, 450, 1340, 1790, 80, 12.9, 290, 4.4, 95, 'Kölcsönzés'),
(18, 'pictures/jarmuadatbazis_kepek/suzuki_vitara.jpg', 'SUV', 'Suzuki',  9490, 8290, 5790, 'Vitara', 2014, 'Újszerű', 10089, 5, 'Dízel', 1400, 109, 1591, 2178, 50, 6.9, 172, 11.9, 95, 'Kölcsönzés'),
(19, 'pictures/jarmuadatbazis_kepek/chevrolet_aveo.jpg', 'Személyautó', 'Chevrolet',  7890, 6490, 4390, 'Aveo', 2015, 'Újszerű', 12880, 4, 'Dízel', 1200, 89, 1190, 1680, 50, 6.2, 162, 12.2, 98, 'Kölcsönzés'),
(20, 'pictures/jarmuadatbazis_kepek/audi_a1.jpg', 'Személyautó', 'Audi',  9990, 7590, 6190, 'A1', 2014, 'Újszerű', 2899, 5, 'Benzin', 1400, 120, 1101, 1588, 50, 7.2, 181, 10.8, 95, 'Kölcsönzés'),
(21, 'pictures/jarmuadatbazis_kepek/audi_a7.jpg', 'Személyautó', 'Audi',  22990, 18990, 14990, 'A7', 2012, 'Újszerű', 13089, 5, 'Benzin', 3000, 250, 1700, 2391, 70, 10.8, 240, 6.5, 95, 'Kölcsönzés'),
(22, 'pictures/jarmuadatbazis_kepek/alfa_romeo_guilia.jpg', 'Személyautó', 'Alfa Romeo',  21990, 16990, 12990, 'Guilia', 2015, 'Újszerű', 1088, 5, 'Dízel', 2200, 175, 1460, 1970, 60, 7.1, 216, 7.9, 98, 'Kölcsönzés');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `automarka`
--

CREATE TABLE `automarka` (
  `id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `automarka`
--

INSERT INTO `automarka` (`id`) VALUES
('Alfa Romeo'),
('Audi'),
('BMW'),
('Chevrolet'),
('Ferrari'),
('Ford'),
('Infiniti'),
('Mercedes'),
('Skoda'),
('Suzuki');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `belepes`
--

CREATE TABLE `belepes` (
  `felhasznalo_nev` varchar(30) NOT NULL,
  `jelszo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `belepes`
--

INSERT INTO `belepes` (`felhasznalo_nev`, `jelszo`) VALUES
('admin', 'admin'),
('Anonymous', 'nopassword');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo`
--

CREATE TABLE `felhasznalo` (
  `felhasznalo_nev` varchar(30) NOT NULL,
  `jelszo` varchar(100) NOT NULL,
  `vezetek_nev` varchar(100) NOT NULL,
  `kereszt_nev` varchar(100) NOT NULL,
  `szemelyig_szam` varchar(8) NOT NULL,
  `anyja_vnev` varchar(100) NOT NULL,
  `anyja_knev` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telszam` int(9) DEFAULT NULL,
  `ir_szam` int(5) NOT NULL,
  `varos` varchar(100) NOT NULL,
  `utca` varchar(100) NOT NULL,
  `hazszam` int(10) NOT NULL,
  `szuletesi_hely` varchar(30) NOT NULL,
  `szuletesi_ido` date NOT NULL,
  `hozzaszolas` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`felhasznalo_nev`, `jelszo`, `vezetek_nev`, `kereszt_nev`, `szemelyig_szam`, `anyja_vnev`, `anyja_knev`, `email`, `telszam`, `ir_szam`, `varos`, `utca`, `hazszam`, `szuletesi_hely`, `szuletesi_ido`, `hozzaszolas`) VALUES
('admin', 'admin', '-', '-', '-', '-', '-', '', 0, 0, '-', '-', 0, '-', '2017-08-01', NULL),
('Anonymous', 'nopassword', '-', '-', '01', '-', '-', 'noemail@noemail.noemail', 0, 0, '-', '-', 0, '-', '2017-08-25', NULL),
('macskacsa1212', 'macskacsa', 'Próba', 'Kacsa', '----', '-', '-', 'dfsd@dfsdfsdf.dsf', 0, 0, '-', '-', 0, 'Szeged', '2019-08-21', NULL),
('main_profile', 'alma', 'Nagy', 'Tivadar', '124490CN', 'Görög', 'Annamária', '', 0, 0, '-', '-', 0, 'Szeged', '2018-08-21', NULL),
('PókVagyok', 'pókvagyok', 'Pók', 'Vagyok', 'PókSzig', 'Pók', 'Ocska', 'Pok@ocs.ka', 0, 0, '-', '-', 0, '-', '2017-08-10', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hozzaszolasok`
--

CREATE TABLE `hozzaszolasok` (
  `id` int(10) NOT NULL,
  `felhasznalo_nev` varchar(60) NOT NULL,
  `hozzaszolas` varchar(10000) NOT NULL,
  `kategoria` varchar(100) NOT NULL,
  `datum` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `hozzaszolasok`
--

INSERT INTO `hozzaszolasok` (`id`, `felhasznalo_nev`, `hozzaszolas`, `kategoria`, `datum`) VALUES
(59, 'admin', 'Kedves vásárlónk! </br>\r\nÍrja meg véleményét az autókról, motorokról, vagy fejtse ki gondolatait egyéb témában.  </br>\r\nKészséggel válaszolunk minden felmerülő kérdésre! </br>\r\nNyitólapunkon a tíz legújabb autónk közül választhat! </br>\r\nÜdvözlettel, </br>\r\nAdmin ', 'Egyéb', '2017-08-25 18:06:38'),
(60, 'main_profile', 'Tisztelt admin! </br>\r\nÉrdeklődnék, hogy az Alfa Romeo 159 14 napos kölcsönzése mennyibe kerülne összesen, illetve naponta? </br>\r\nÜdvözlettel, </br>\r\nNagy Tivadar ', 'Autó', '2017-08-25 18:09:14'),
(65, 'admin', 'Kedves Tivadar! </br>\nAz Alfa Romeo 159 típusú személygépkocsi tizennégy napos kölcsönzése a második árkategóriába </br>\nesik, így ennek ára naponta 12990 HUF, összesen pedig 181860 HUF. </br>\nÜdvözlettel, </br>\nAdmin', 'Autó', '2017-08-25 18:16:20'),
(66, 'main_profile', 'Köszönöm válaszát! </br>\r\nÜdv, </br>\r\nNagy Tivadar', 'Autó', '2017-08-25 18:29:09'),
(67, 'admin', 'Nincs mit öccse', 'Autó', '2017-08-25 18:31:14'),
(87, 'Anonymous', 'No name found\r\n', 'Autó', '2017-08-25 18:54:26'),
(107, 'Anonymous', 'Tisztelt xy! </br>\r\nMerre találom önöket helyileg? </br>\r\nÜdvözlettel,\r\nTóth Árpád', 'Autó', '2017-08-25 19:35:27'),
(109, 'admin', 'mittomén árpi', 'Autó', '2017-08-25 19:37:30'),
(114, 'Anonymous', 'Menyí a ferari dilomáló :D', 'Autó', '2017-08-26 16:29:46'),
(151, 'Anonymous', '1st try\r\n', 'Autó', '2017-08-27 22:21:33'),
(152, 'macskacsa1212', 'macskacsa', 'Autó', '2017-08-29 16:24:28'),
(153, 'Anonymous', 'adrika', 'Autó', '2017-08-29 16:24:36'),
(154, 'Anonymous', 'sadsad', 'Autó', '2017-08-29 19:25:20');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jarmukolcsonzes`
--

CREATE TABLE `autokolcsonzes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `felhasznalo_nev` varchar(30) NOT NULL,
  `auto_id` INT(100) NOT NULL,
  `mettol` date NOT NULL,
  `meddig` date NOT NULL,
  `ar_naponta` int(10) NOT NULL,
  `ar_osszesen` int(10) NOT NULL,
  
  PRIMARY KEY(`id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `motorkolcsonzes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `felhasznalo_nev` varchar(30) NOT NULL,
  `motor_id` INT(100) NOT NULL,
  `mettol` date NOT NULL,
  `meddig` date NOT NULL,
  `ar_naponta` int(10) NOT NULL,
  `ar_osszesen` int(10) NOT NULL,
  PRIMARY KEY(`id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jarmutipus`
--


--
-- A tábla adatainak kiíratása `jarmutipus`
--



-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `motor`
--

CREATE TABLE `motor` (
  `id` int(10) NOT NULL,
  `fenykep` mediumtext,
  `kategoria` varchar(100) NOT NULL,
  `motormarka_id` varchar(60) NOT NULL,
  
  `ar_1` int(10) NOT NULL,
  `ar_2` int(10) NOT NULL,
  `ar_3` int(10) NOT NULL,
  `marka_tipus` varchar(80) NOT NULL,
  `evjarat` int(4) NOT NULL,
  `allapot` varchar(50) NOT NULL,
  `km_ora_allasa` int(10) NOT NULL,
  `uzemanyag` varchar(100) NOT NULL,
  `hengerurtartalom` int(10) NOT NULL,
  `teljesitmeny` int(100) NOT NULL,
  `sajat_tomeg` int(100) NOT NULL,
  `maximalis_tomeg` int(100) NOT NULL,
  `tank_meret` int(5) NOT NULL,
  `atlagfogyasztas` float NOT NULL,
  `vegsebesseg` int(10) NOT NULL,
  `gyorsulas` float DEFAULT NULL,
  `munkautem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `motor`
--

INSERT INTO `motor` (`id`, `fenykep`, `kategoria`, `motormarka_id`, `ar_1`, `ar_2`, `ar_3`, `marka_tipus`, `evjarat`, `allapot`, `km_ora_allasa`, `uzemanyag`, `hengerurtartalom`, `teljesitmeny`, `sajat_tomeg`, `maximalis_tomeg`, `tank_meret`, `atlagfogyasztas`, `vegsebesseg`, `gyorsulas`, `munkautem`) VALUES
(1, 'pictures/jarmuadatbazis_kepek/aprilia_sr_50.jpg', 'Robogó', 'Aprilia',  4990, 3990, 2990, 'SR 50', 2006, 'Újszerű', 22019, 'Benzin', 50, 4, 98, 210, 10, 3.5, 62, NULL, 4),
(2, 'pictures/jarmuadatbazis_kepek/audi_50.jpg', 'Veterán', 'Audi',  39990, 33990, 26990, 'Z02', 1979, 'Jó állapotú', 56911, 'Benzin', 1100, 70, 270, 398, 20, 4.5, 180, 6.6, 4),
(3, 'pictures/jarmuadatbazis_kepek/bmw_s1000rr.jpg', 'Sportmotor', 'BMW',  22990, 18990, 15990, 'S1000 RR', 2015, 'Újszerű', 10389, 'Benzin', 1000, 130, 278, 422, 20, 5.5, 280, 2.9, 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `motormarka`
--

CREATE TABLE `motormarka` (
  `id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `motormarka`
--

INSERT INTO `motormarka` (`id`) VALUES
('Aprilia'),
('Audi'),
('BMW'),
('Gilera'),
('Keeway'),
('Yamaha');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `automarka_id` (`automarka_id`);

--
-- A tábla indexei `automarka`
--
ALTER TABLE `automarka`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `belepes`
--
ALTER TABLE `belepes`
  ADD PRIMARY KEY (`felhasznalo_nev`);

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`felhasznalo_nev`);

--
-- A tábla indexei `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo_nev` (`felhasznalo_nev`);

--
-- A tábla indexei `jarmukolcsonzes`
--
ALTER TABLE `autokolcsonzes`
 
  ADD KEY `felhasznalo_id` (`felhasznalo_nev`),
  ADD KEY `auto_id` (`auto_id`);

  
  
 ALTER TABLE `motorkolcsonzes`
 
  ADD KEY `felhasznalo_id` (`felhasznalo_nev`),
  ADD KEY `motor_id` (`motor_id`);
  
--
-- A tábla indexei `jarmutipus`
--
--
-- A tábla indexei `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `motormarka_id` (`motormarka_id`);

--
-- A tábla indexei `motormarka`
--
ALTER TABLE `motormarka`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT a táblához `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT a táblához `jarmukolcsonzes`
--

-- AUTO_INCREMENT a táblához `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`automarka_id`) REFERENCES `automarka` (`id`);

--
-- Megkötések a táblához `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  ADD CONSTRAINT `hozzaszolasok_ibfk_1` FOREIGN KEY (`felhasznalo_nev`) REFERENCES `felhasznalo` (`felhasznalo_nev`);

--
-- Megkötések a táblához `jarmukolcsonzes`
--
ALTER TABLE `autokolcsonzes`
  ADD CONSTRAINT `autokolcsonzes_ibfk_1` FOREIGN KEY (`felhasznalo_nev`) REFERENCES `felhasznalo` (`felhasznalo_nev`),
  ADD CONSTRAINT `autokolcsonzes_ibfk_2` FOREIGN KEY (`auto_id`) REFERENCES `auto` (`id`);
  
  
ALTER TABLE `motorkolcsonzes`
  ADD CONSTRAINT `motorkolcsonzes_ibfk_1` FOREIGN KEY (`felhasznalo_nev`) REFERENCES `felhasznalo` (`felhasznalo_nev`),
  ADD CONSTRAINT `motorkolcsonzes_ibfk_2` FOREIGN KEY (`motor_id`) REFERENCES `motor` (`id`);

--
-- Megkötések a táblához `motor`
--
ALTER TABLE `motor`
  ADD CONSTRAINT `motor_ibfk_1` FOREIGN KEY (`motormarka_id`) REFERENCES `motormarka` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Nov 22. 12:37
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
  `fenykep` longtext,
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
  `oktanszam` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `auto`
--

INSERT INTO `auto` (`id`, `fenykep`, `kategoria`, `automarka_id`, `ar_1`, `ar_2`, `ar_3`, `marka_tipus`, `evjarat`, `allapot`, `km_ora_allasa`, `szallithato_szemelyek`, `uzemanyag`, `hengerurtartalom`, `teljesitmeny`, `sajat_tomeg`, `maximalis_tomeg`, `tank_meret`, `atlagfogyasztas`, `vegsebesseg`, `gyorsulas`, `oktanszam`) VALUES
(12, 'C:/xampp/htdocs/GitHub/jarmuadatbazis/pictures/jarmuadatbazis_kepek/bmw_i8.jpg', 'Sportautó', 'BMW', 49900, 44990, 40290, 'i8', 2015, 'Újszerű', 8988, 2, 'Benzin/Elektromos', 6300, 309, 1288, 1780, 50, 8.1, 301, 6.6, 95),
(13, 'pictures/jarmuadatbazis_kepek/mercedes_cla220.jpg', 'Személyautó', 'Mercedes', 14990, 12990, 9990, 'CLA 220', 2013, 'Újszerű', 19920, 5, 'Benzin', 2189, 178, 1560, 1987, 60, 8.1, 220, 7.9, 95),
(14, 'pictures/jarmuadatbazis_kepek/skoda_superb.jpg', 'Személyautó', 'Skoda', 11990, 9990, 7690, 'Superb', 2011, 'Újszerű', 23870, 5, 'Benzin', 1980, 160, 1790, 2390, 60, 8.8, 198, 8.8, 95),
(15, 'pictures/jarmuadatbazis_kepek/infiniti_g37cabrio.jpg', 'Cabrio', 'Infiniti', 29990, 26990, 21990, 'G37 Cabrio', 2010, 'Újszerű', 15678, 4, 'Benzin', 3700, 320, 1800, 2400, 80, 9.8, 250, 5.2, 95),
(16, 'pictures/jarmuadatbazis_kepek/ford_focus.jpg', 'Személyautó', 'Ford', 9890, 7890, 5890, 'Focus', 2015, 'Újszerű', 2980, 5, 'Benzin', 1600, 120, 1490, 1990, 50, 6.8, 180, 10.1, 95),
(17, 'pictures/jarmuadatbazis_kepek/ferrari_california.jpg', 'Sportautó', 'Ferrari', 43990, 40990, 36990, 'California T', 2013, 'Újszerű', 1270, 2, 'Benzin', 4300, 450, 1340, 1790, 80, 12.9, 290, 4.4, 95),
(18, 'pictures/jarmuadatbazis_kepek/suzuki_vitara.jpg', 'SUV', 'Suzuki', 9490, 8290, 5790, 'Vitara', 2014, 'Újszerű', 10089, 5, 'Dízel', 1400, 109, 1591, 2178, 50, 6.9, 172, 11.9, 95),
(19, 'pictures/jarmuadatbazis_kepek/chevrolet_aveo.jpg', 'Személyautó', 'Chevrolet', 7890, 6490, 4390, 'Aveo', 2015, 'Újszerű', 12880, 4, 'Dízel', 1200, 89, 1190, 1680, 50, 6.2, 162, 12.2, 98),
(20, 'pictures/jarmuadatbazis_kepek/audi_a1.jpg', 'Személyautó', 'Audi', 9990, 7590, 6190, 'A1', 2014, 'Újszerű', 2899, 5, 'Benzin', 1400, 120, 1101, 1588, 50, 7.2, 181, 10.8, 95),
(21, 'pictures/jarmuadatbazis_kepek/audi_a7.jpg', 'Személyautó', 'Audi', 22990, 18990, 14990, 'A7', 2012, 'Újszerű', 13089, 5, 'Benzin', 3000, 250, 1700, 2391, 70, 10.8, 240, 6.5, 95),
(22, 'pictures/jarmuadatbazis_kepek/alfa_romeo_guilia.jpg', 'Személyautó', 'Alfa Romeo', 21990, 16990, 12990, 'Guilia', 2015, 'Újszerű', 1088, 5, 'Dízel', 2200, 175, 1460, 1970, 60, 7.1, 216, 7.9, 98),
(24, 'pictures/jarmuadatbazis_kepek/audi_a5_cabrio.jpg', 'Cabrio', 'Audi', 19990, 16890, 13490, 'A5 ', 2013, 'Alig használt', 39910, 4, 'Dízel', 2000, 178, 1398, 1877, 60, 6.8, 238, 6.9, 95),
(25, 'pictures/jarmuadatbazis_kepek/skoda_octavia.jpg', 'Személygépkocsi', 'Skoda', 17890, 13990, 10690, 'Octavia', 2014, 'Alig használt', 29519, 5, 'Dízel', 1800, 140, 1580, 2144, 60, 6.7, 202, 10.2, 95),
(27, 'pictures/jarmuadatbazis_kepek/bmw_320.jpg', 'Személygépkocsi', 'BMW', 16790, 13990, 11990, '320d', 2013, 'Jó állapotú', 18890, 5, 'Dízel', 2000, 188, 1309, 1799, 60, 6.2, 212, 8.8, 98),
(28, 'pictures/jarmuadatbazis_kepek/ford_mondeo.jpg', 'Személygépkocsi', 'Ford', 9990, 8790, 6890, 'Mondeo', 2006, 'Jó állapotú', 59880, 5, 'Benzin', 1600, 115, 1488, 2021, 50, 7.3, 178, 11.9, 95);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `autokolcsonzes`
--

CREATE TABLE `autokolcsonzes` (
  `id` int(10) NOT NULL,
  `felhasznalo_nev` varchar(30) NOT NULL,
  `auto_id` int(100) NOT NULL,
  `mettol` date NOT NULL,
  `meddig` date NOT NULL,
  `ar_naponta` int(10) NOT NULL,
  `ar_osszesen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `autokolcsonzes`
--

INSERT INTO `autokolcsonzes` (`id`, `felhasznalo_nev`, `auto_id`, `mettol`, `meddig`, `ar_naponta`, `ar_osszesen`) VALUES
(503, 'felh1', 12, '2017-11-22', '2017-11-26', 49900, 249500),
(504, 'felh1', 16, '2017-11-28', '2017-12-21', 7890, 189360),
(505, 'felh1', 22, '2018-06-22', '2018-07-22', 12990, 402690),
(506, 'felhasznalo2', 18, '2017-11-25', '2017-12-16', 8290, 182380),
(507, 'felhasznalo2', 15, '2017-12-22', '2017-12-29', 26990, 215920);

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
  `szuletesi_ido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`felhasznalo_nev`, `jelszo`, `vezetek_nev`, `kereszt_nev`, `szemelyig_szam`, `anyja_vnev`, `anyja_knev`, `email`, `telszam`, `ir_szam`, `varos`, `utca`, `hazszam`, `szuletesi_hely`, `szuletesi_ido`) VALUES
('admin', 'admin', 'Nagy', 'István', '028819MA', '-', '-', 'nagy.istvan@pmail.com', 708821299, 6722, 'Szeged', 'Pásztor', 33, 'Budapest', '1998-08-21'),
('Anonymous', 'password', 'Sándor', 'Mária', '012333LA', 'Sándor', 'Anna', 'smaria@gmail.com', 709394922, 6700, 'Szeged', 'Réz', 98, 'Szeged', '1970-08-25'),
('felh1', 'felh1', 'Németh', 'Gergely', '198593MA', 'Németh', 'Elizabett', 'gergely@gmail.com', 708344320, 6233, 'Szeged', 'Sándor', 33, 'Szeged', '1991-05-23'),
('felhasznalo2', 'felhasznalo', 'Kis', 'János', '324234LA', 'Kis', 'Anna', 'kisjanos@gmail.com', 708934342, 7457, 'Debrecen', 'Kőszeg', 104, 'Szeged', '1986-11-22'),
('felh_3', 'felh3', 'Horváth', 'Elizabett', '234234MA', 'Horváth', 'Anna', 'h.eli@gmail.com', 303874871, 3478, 'Győr', 'Körte', 9, 'Győr', '1996-08-10'),
('main_profile', 'alma', 'Nagy', 'Tivadar', '124490CN', 'Görög', 'Annamária', 'main_prof@gmail.com', 303984980, 3474, 'Győr', 'Hajnal', 2, 'Szeged', '1978-08-21'),
('ntamas', 'ntamas', 'Nagy', 'Tamara', '394324MA', 'Nagy', 'Hanna', 'tamaran@hotmail.com', 204875234, 4990, 'Siófok', 'Ketrec', 109, 'Szeged', '2000-11-20'),
('someon3', 'pok', 'Tóth', 'Anita', '213342LA', 'Péterfy', 'Mária', 'tanita@gmail.com', 0, 10, 'Budapest', 'Lengyel', 10, 'Szeged', '2000-11-19'),
('someone', 'kinga', 'Tóth', 'Anita', '010101MA', 'Pekla', 'Erzsébet', 'nincs@gmail.com', 381738478, 24420, 'Szombathely', 'Szent János', 12, 'Zenta', '1973-10-05'),
('usernr3', 'usernr3', 'Hajnal', 'Tivadar', '----', 'Hajnal', 'Petra', 'htivadar@gmail.com', 0, 4362, 'Pécs', 'Alma', 5, 'Pécs', '1987-08-21');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hozzaszolasok`
--

CREATE TABLE `hozzaszolasok` (
  `id` int(10) NOT NULL,
  `felhasznalo_nev` varchar(60) NOT NULL,
  `hozzaszolas` varchar(10000) NOT NULL,
  `datum` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `hozzaszolasok`
--

INSERT INTO `hozzaszolasok` (`id`, `felhasznalo_nev`, `hozzaszolas`, `datum`) VALUES
(59, 'admin', 'Kedves vásárlónk! </br>\r\nÍrja meg véleményét az autókról, motorokról, vagy fejtse ki gondolatait egyéb témában.  </br>\r\nKészséggel válaszolunk minden felmerülő kérdésre! </br>\r\nNyitólapunkon a tíz legújabb autónk közül választhat! </br>\r\nÜdvözlettel, </br>\r\nAdmin ', '2017-08-25 18:06:38'),
(111, 'admin', 'Kedves Tivadar! \r\nAz Alfa Romeo 159 típusú személygépkocsi tizennégy napos kölcsönzése a második árkategóriába \r\nesik, így ennek ára naponta 12990 HUF, összesen pedig 181860 HUF. \r\nÜdvözlettel, \r\nAdmin', '2017-11-22 01:19:49'),
(117, 'usernr3', 'Tisztelt Admin!\r\nÉrdeklődnék, hogy mennyibe kerülne a Mercedes CLA kölcsönzésen tizenkét napra?\r\nÜdv\r\n', '2017-11-22 12:29:45'),
(118, 'admin', 'A Mercedes CLA220 tizenkét napos kölcsönzése a második árkategóriába esik, így ennek ára 154800 Ft.\r\nÜdvözlettel,\r\nAdmin', '2017-11-22 12:32:02');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `motor`
--

CREATE TABLE `motor` (
  `id` int(10) NOT NULL,
  `fenykep` longblob,
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
(1, 0x70696374757265732f6a61726d756164617462617a69735f6b6570656b2f617072696c69615f73725f35302e6a7067, 'Robogó', 'Aprilia', 4990, 3990, 2990, 'SR 50', 2006, 'Újszerű', 22019, 'Benzin', 50, 4, 98, 210, 10, 3.5, 62, NULL, 4),
(2, 0x70696374757265732f6a61726d756164617462617a69735f6b6570656b2f617564695f35302e6a7067, 'Veterán', 'Audi', 39990, 33990, 26990, 'Z02', 1979, 'Jó állapotú', 56911, 'Benzin', 1100, 70, 270, 398, 20, 4.5, 180, 6.6, 4),
(3, 0x70696374757265732f6a61726d756164617462617a69735f6b6570656b2f626d775f733130303072722e6a7067, 'Sportmotor', 'BMW', 22990, 18990, 15990, 'S1000 RR', 2015, 'Újszerű', 10389, 'Benzin', 1000, 130, 278, 422, 20, 5.5, 280, 2.9, 4),
(9, 0x70696374757265732f6a61726d756164617462617a69735f6b6570656b2f67696c6572615f72756e6e65722e6a7067, 'Robogó', 'Gilera', 6790, 4990, 3190, 'Runner', 2011, 'Alig használt', 3988, 'Benzin', 50, 7, 121, 255, 8, 2.2, 62, 0, 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `motorkolcsonzes`
--

CREATE TABLE `motorkolcsonzes` (
  `id` int(10) NOT NULL,
  `felhasznalo_nev` varchar(30) NOT NULL,
  `motor_id` int(100) NOT NULL,
  `mettol` date NOT NULL,
  `meddig` date NOT NULL,
  `ar_naponta` int(10) NOT NULL,
  `ar_osszesen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `motorkolcsonzes`
--

INSERT INTO `motorkolcsonzes` (`id`, `felhasznalo_nev`, `motor_id`, `mettol`, `meddig`, `ar_naponta`, `ar_osszesen`) VALUES
(53, 'ntamas', 1, '2017-11-22', '2017-11-28', 3990, 27930),
(55, 'ntamas', 2, '2017-11-26', '2017-12-18', 33990, 781770),
(56, 'felhasznalo2', 3, '2018-04-22', '2018-11-25', 15990, 3421860);

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
-- A tábla indexei `autokolcsonzes`
--
ALTER TABLE `autokolcsonzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo_id` (`felhasznalo_nev`),
  ADD KEY `auto_id` (`auto_id`);

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
-- A tábla indexei `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `motormarka_id` (`motormarka_id`);

--
-- A tábla indexei `motorkolcsonzes`
--
ALTER TABLE `motorkolcsonzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo_id` (`felhasznalo_nev`),
  ADD KEY `motor_id` (`motor_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT a táblához `autokolcsonzes`
--
ALTER TABLE `autokolcsonzes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;
--
-- AUTO_INCREMENT a táblához `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT a táblához `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT a táblához `motorkolcsonzes`
--
ALTER TABLE `motorkolcsonzes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`automarka_id`) REFERENCES `automarka` (`id`);

--
-- Megkötések a táblához `autokolcsonzes`
--
ALTER TABLE `autokolcsonzes`
  ADD CONSTRAINT `autokolcsonzes_ibfk_1` FOREIGN KEY (`felhasznalo_nev`) REFERENCES `felhasznalo` (`felhasznalo_nev`),
  ADD CONSTRAINT `autokolcsonzes_ibfk_2` FOREIGN KEY (`auto_id`) REFERENCES `auto` (`id`);

--
-- Megkötések a táblához `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  ADD CONSTRAINT `hozzaszolasok_ibfk_1` FOREIGN KEY (`felhasznalo_nev`) REFERENCES `felhasznalo` (`felhasznalo_nev`);

--
-- Megkötések a táblához `motor`
--
ALTER TABLE `motor`
  ADD CONSTRAINT `motor_ibfk_1` FOREIGN KEY (`motormarka_id`) REFERENCES `motormarka` (`id`);

--
-- Megkötések a táblához `motorkolcsonzes`
--
ALTER TABLE `motorkolcsonzes`
  ADD CONSTRAINT `motorkolcsonzes_ibfk_1` FOREIGN KEY (`felhasznalo_nev`) REFERENCES `felhasznalo` (`felhasznalo_nev`),
  ADD CONSTRAINT `motorkolcsonzes_ibfk_2` FOREIGN KEY (`motor_id`) REFERENCES `motor` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

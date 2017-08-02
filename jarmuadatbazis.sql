-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Aug 01. 13:38
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
  `marka_id` int(10) NOT NULL,
  `jarmutipus_id` int(10) NOT NULL,
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
  `email` varchar(100),
  `telszam` int(9),
  `ir_szam` int(5) NOT NULL,
  `varos` varchar(100) NOT NULL,
  `utca` varchar(100) NOT NULL,
  `hazszam` int(10) NOT NULL,
  `szuletesi_hely` varchar(30) NOT NULL,
  `szuletesi_ido` date NOT NULL,
  `hozzaszolas` varchar(250)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`felhasznalo_nev`, `jelszo`, `vezetek_nev`, `kereszt_nev`, `szemelyig_szam`, `anyja_vnev`, `anyja_knev`, `email`, `telszam`, `ir_szam`, `varos`, `utca`, `hazszam`, `szuletesi_hely`, `szuletesi_ido`) VALUES
('admin', 'admin', '-', '-', '-', '-', '-', '', 0, 0, '-', '-', 0, '-', '2017-08-01'),
('main_profile', 'alma', 'alma', 'alma', '124490CN', '-', '-', '', 0, 6710, 'Szeged', 'Alma', 89, 'Szeged', '1996-05-16');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jarmukolcsonzes`
--

CREATE TABLE `jarmukolcsonzes` (
  `id` int(10) NOT NULL,
  `felhasznalo_nev` varchar(30) NOT NULL,
  `jarmutipus_id` int(10) NOT NULL,
  `marka_id` int(10) NOT NULL,
  `mettol` date NOT NULL,
  `meddig` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jarmutipus`
--

CREATE TABLE `jarmutipus` (
  `id` int(10) NOT NULL,
  `megnevezes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `jarmutipus`
--

INSERT INTO `jarmutipus` (`id`, `megnevezes`) VALUES
(1, 'Autó'),
(2, 'Motor');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `marka`
--

CREATE TABLE `marka` (
  `id` int(10) NOT NULL,
  `megnevezes` varchar(50) NOT NULL,
  `jarmutipus_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `marka`
--

INSERT INTO `marka` (`id`, `megnevezes`, `jarmutipus_id`) VALUES
(1, 'Mercedes', 1),
(2, 'BMW', 1),
(3, 'Toyota', 1),
(4, 'Audi', 1),
(5, 'Opel', 1),
(6, 'Suzuki', 1),
(7, 'Suzuki', 2),
(8, 'Aprilia', 2),
(9, 'BMW', 2),
(10, 'Ferrari', 1),
(11, 'Piaggio', 2),
(12, 'Gilera', 2),
(13, 'Keeway', 2),
(14, 'Ford', 1),
(15, 'Infiniti', 1),
(16, 'Nissan', 1),
(17, 'Yamaha', 2),
(18, 'Chevrolet', 1),
(19, 'Alfa Romeo', 2),
(20, 'Skoda', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `motor`
--

CREATE TABLE `motor` (
  `id` int(10) NOT NULL,
  `marka_id` int(10) NOT NULL,
  `jarmutipus_id` int(10) NOT NULL,
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


CREATE TABLE `belepes` (
  `felhasznalo_nev` varchar(30) PRIMARY KEY,
  `jelszo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marka_id` (`marka_id`),
  ADD KEY `jarmutipus_id` (`jarmutipus_id`);

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`felhasznalo_nev`);

--
-- A tábla indexei `jarmukolcsonzes`
--
ALTER TABLE `jarmukolcsonzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo_id` (`felhasznalo_nev`),
  ADD KEY `jarmutipus_id` (`jarmutipus_id`),
  ADD KEY `marka_id` (`marka_id`);

--
-- A tábla indexei `jarmutipus`
--
ALTER TABLE `jarmutipus`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jarmutipus_id` (`jarmutipus_id`);

--
-- A tábla indexei `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marka_id` (`marka_id`),
  ADD KEY `jarmutipus_id` (`jarmutipus_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `felhasznalo`
--
--
-- AUTO_INCREMENT a táblához `jarmukolcsonzes`
--
ALTER TABLE `jarmukolcsonzes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `marka`
--
ALTER TABLE `marka`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT a táblához `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`marka_id`) REFERENCES `marka` (`id`),
  ADD CONSTRAINT `auto_ibfk_2` FOREIGN KEY (`jarmutipus_id`) REFERENCES `jarmutipus` (`id`);

--
-- Megkötések a táblához `jarmukolcsonzes`
--
ALTER TABLE `jarmukolcsonzes`
  ADD CONSTRAINT `jarmukolcsonzes_ibfk_1` FOREIGN KEY (`felhasznalo_nev`) REFERENCES `felhasznalo` (`felhasznalo_nev`),
  ADD CONSTRAINT `jarmukolcsonzes_ibfk_2` FOREIGN KEY (`jarmutipus_id`) REFERENCES `jarmutipus` (`id`),
  ADD CONSTRAINT `jarmukolcsonzes_ibfk_3` FOREIGN KEY (`marka_id`) REFERENCES `marka` (`id`);

--
-- Megkötések a táblához `marka`
--
ALTER TABLE `marka`
  ADD CONSTRAINT `marka_ibfk_1` FOREIGN KEY (`jarmutipus_id`) REFERENCES `jarmutipus` (`id`);

--
-- Megkötések a táblához `motor`
--
ALTER TABLE `motor`
  ADD CONSTRAINT `motor_ibfk_1` FOREIGN KEY (`marka_id`) REFERENCES `marka` (`id`),
  ADD CONSTRAINT `motor_ibfk_2` FOREIGN KEY (`jarmutipus_id`) REFERENCES `jarmutipus` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

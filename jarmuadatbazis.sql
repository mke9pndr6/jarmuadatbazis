-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Aug 25. 18:02
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
  `kategoria` varchar(100) NOT NULL,
  `automarka_id` varchar(60) NOT NULL,
  `jarmutipus_id` varchar(60) NOT NULL,
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
('admin', 'admin');

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
(51, 'admin', 'Kedves vásárlónk! </br>\nÍrja meg véleményét az autókról, motorokról, vagy fejtse ki gondolatait egyéb témában. </br>\nKészséggel válaszolunk minden felmerülő kérdésre! </br>\nNyitólapunkon a tíz legújabb autónk közül választhat! </br>\nÜdvözlettel, </br>\nAdmin\n\n\n\n', 'Autó', '2017-08-25');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jarmukolcsonzes`
--

CREATE TABLE `jarmukolcsonzes` (
  `id` int(10) NOT NULL,
  `felhasznalo_nev` varchar(30) NOT NULL,
  `jarmutipus_id` varchar(60) NOT NULL,
  `mettol` date NOT NULL,
  `meddig` date NOT NULL,
  `ar_naponta` int(10) NOT NULL,
  `ar_osszesen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jarmutipus`
--

CREATE TABLE `jarmutipus` (
  `id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `jarmutipus`
--

INSERT INTO `jarmutipus` (`id`) VALUES
('Autó'),
('Motor');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `motor`
--

CREATE TABLE `motor` (
  `id` int(10) NOT NULL,
  `kategoria` varchar(100) NOT NULL,
  `motormarka_id` varchar(60) NOT NULL,
  `jarmutipus_id` varchar(60) NOT NULL,
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
  ADD KEY `automarka_id` (`automarka_id`),
  ADD KEY `jarmutipus_id` (`jarmutipus_id`);

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
ALTER TABLE `jarmukolcsonzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo_id` (`felhasznalo_nev`),
  ADD KEY `jarmutipus_id` (`jarmutipus_id`);

--
-- A tábla indexei `jarmutipus`
--
ALTER TABLE `jarmutipus`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `motormarka_id` (`motormarka_id`),
  ADD KEY `jarmutipus_id` (`jarmutipus_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT a táblához `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT a táblához `jarmukolcsonzes`
--
ALTER TABLE `jarmukolcsonzes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`automarka_id`) REFERENCES `automarka` (`id`),
  ADD CONSTRAINT `auto_ibfk_2` FOREIGN KEY (`jarmutipus_id`) REFERENCES `jarmutipus` (`id`);

--
-- Megkötések a táblához `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  ADD CONSTRAINT `hozzaszolasok_ibfk_1` FOREIGN KEY (`felhasznalo_nev`) REFERENCES `felhasznalo` (`felhasznalo_nev`);

--
-- Megkötések a táblához `jarmukolcsonzes`
--
ALTER TABLE `jarmukolcsonzes`
  ADD CONSTRAINT `jarmukolcsonzes_ibfk_1` FOREIGN KEY (`felhasznalo_nev`) REFERENCES `felhasznalo` (`felhasznalo_nev`),
  ADD CONSTRAINT `jarmukolcsonzes_ibfk_2` FOREIGN KEY (`jarmutipus_id`) REFERENCES `jarmutipus` (`id`);

--
-- Megkötések a táblához `motor`
--
ALTER TABLE `motor`
  ADD CONSTRAINT `motor_ibfk_1` FOREIGN KEY (`motormarka_id`) REFERENCES `motormarka` (`id`),
  ADD CONSTRAINT `motor_ibfk_2` FOREIGN KEY (`jarmutipus_id`) REFERENCES `jarmutipus` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

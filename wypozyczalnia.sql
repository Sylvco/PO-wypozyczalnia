-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 17 Sty 2014, 10:48
-- Wersja serwera: 5.6.14
-- Wersja PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `wypozyczalnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie samochodów`
--

CREATE TABLE IF NOT EXISTS `kategorie samochodów` (
  `NazwaKat` char(10) COLLATE utf8_polish_ci NOT NULL,
  `WysokośćOpłaty` double NOT NULL,
  PRIMARY KEY (`NazwaKat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie samochodów`
--

INSERT INTO `kategorie samochodów` (`NazwaKat`, `WysokośćOpłaty`) VALUES
('A1', 330);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE IF NOT EXISTS `klienci` (
  `IdKlienta` int(11) NOT NULL AUTO_INCREMENT,
  `Imię` char(255) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` char(255) COLLATE utf8_polish_ci NOT NULL,
  `PESEL` bigint(11) NOT NULL,
  `NumerTelefonu` int(13) NOT NULL,
  `Adres` char(100) COLLATE utf8_polish_ci NOT NULL COMMENT 'pierwsza zawsze miejscowość',
  `NrPrawaJazdy` char(9) COLLATE utf8_polish_ci NOT NULL,
  `AdresEmail` char(70) COLLATE utf8_polish_ci NOT NULL,
  `IlośćWypożyczeń` int(11) NOT NULL,
  `Login` char(20) COLLATE utf8_polish_ci NOT NULL,
  `Hasło` char(30) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`IdKlienta`),
  UNIQUE KEY `NrPrawaJazdy` (`NrPrawaJazdy`),
  UNIQUE KEY `Login` (`Login`),
  UNIQUE KEY `AdresEmail` (`AdresEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`IdKlienta`, `Imię`, `Nazwisko`, `PESEL`, `NumerTelefonu`, `Adres`, `NrPrawaJazdy`, `AdresEmail`, `IlośćWypożyczeń`, `Login`, `Hasło`) VALUES
(1, 'Jerzy', 'Pukłowicz', 22147483647, 800900890, '46-300 Nibycos krótka 2', 'ASP000111', 'Batory@gmail.com', 2, 'batory', 'batory800');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE IF NOT EXISTS `pracownicy` (
  `IdPracownika` int(11) NOT NULL AUTO_INCREMENT,
  `Imię` char(255) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` char(255) COLLATE utf8_polish_ci NOT NULL,
  `PESEL` bigint(11) NOT NULL,
  `NumerTelefonu` int(13) NOT NULL,
  `Adres` char(100) COLLATE utf8_polish_ci NOT NULL COMMENT 'pierwsza zawsze miejscowość',
  PRIMARY KEY (`IdPracownika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`IdPracownika`, `Imię`, `Nazwisko`, `PESEL`, `NumerTelefonu`, `Adres`) VALUES
(1, 'Karol', 'Makłowicz', 11223344556, 890090123, 'JakasTamMiejscowosc');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE IF NOT EXISTS `rezerwacje` (
  `IdRezerwacji` int(11) NOT NULL AUTO_INCREMENT,
  `DataZłożenia` date NOT NULL,
  `Od` date NOT NULL,
  `Do` date NOT NULL,
  `Potwierdzone` enum('1','0') COLLATE utf8_polish_ci NOT NULL,
  `WysokośćOpłaty` double NOT NULL,
  `WysokośćKaucji` double NOT NULL,
  `SamochódOdebrany` enum('1','0') COLLATE utf8_polish_ci NOT NULL,
  `SamochódZwrócony` enum('1','0') COLLATE utf8_polish_ci NOT NULL,
  `Klient` int(11) NOT NULL,
  `Pracownik` int(11) NOT NULL,
  `Samochód` int(11) NOT NULL,
  PRIMARY KEY (`IdRezerwacji`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `rezerwacje`
--

INSERT INTO `rezerwacje` (`IdRezerwacji`, `DataZłożenia`, `Od`, `Do`, `Potwierdzone`, `WysokośćOpłaty`, `WysokośćKaucji`, `SamochódOdebrany`, `SamochódZwrócony`, `Klient`, `Pracownik`, `Samochód`) VALUES
(1, '2014-01-15', '2014-01-17', '2014-01-19', '1', 660, 660, '0', '0', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE IF NOT EXISTS `samochody` (
  `IdSamochodu` int(11) NOT NULL AUTO_INCREMENT,
  `Rocznik` int(4) NOT NULL,
  `Marka` char(20) COLLATE utf8_polish_ci NOT NULL,
  `Model` char(30) COLLATE utf8_polish_ci NOT NULL,
  `Stan` char(20) COLLATE utf8_polish_ci NOT NULL,
  `Kategoria` char(10) COLLATE utf8_polish_ci NOT NULL,
  `Adres` char(100) COLLATE utf8_polish_ci NOT NULL COMMENT 'pierwsza zawsze miejscowość',
  PRIMARY KEY (`IdSamochodu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `samochody`
--

INSERT INTO `samochody` (`IdSamochodu`, `Rocznik`, `Marka`, `Model`, `Stan`, `Kategoria`, `Adres`) VALUES
(1, 1999, 'Opel', 'Astra', 'Sprawny', 'A1', 'Opole 50-200 XXX');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

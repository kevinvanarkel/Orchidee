-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 14 jun 2017 om 22:16
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `orchidee`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `comments` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`id`, `naam`, `email`, `comments`) VALUES
(1, 'Kevin', 'kevinvanarkel4@gmail.com', 'Goedendag, ik snap niet hoe het bestellen werkt op deze website.'),
(2, 'Hans', 'hsok@mboutrecht.nl', 'Dit werkt prima.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userrole` enum('administrator','customer','developer') NOT NULL DEFAULT 'customer',
  `activated` enum('yes','no') NOT NULL DEFAULT 'no',
  `activationdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `userrole`, `activated`, `activationdate`) VALUES
(133, 'ADMIN@TEST.NL', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'yes', '2016-05-07 11:28:36'),
(137, 'DEVELOPER@DEVELOPER.NL', '847c48fd2357ca258855f3fc5a7ea61a', 'developer', 'yes', '2016-05-07 11:38:56'),
(161, 'kevinvanarkel4@gmail.com', '9d5e3ecdeb4cdb7acfd63075ae046672', 'customer', 'yes', '2017-06-08 11:21:09'),
(162, 'ROBIN@mail.com', 'c184745b8b1be57d636c81642f1c54d2', 'customer', 'yes', '2017-06-12 12:46:56');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `datum` varchar(10) NOT NULL,
  `aantal` int(3) NOT NULL,
  `product` varchar(100) NOT NULL,
  `prijs` varchar(5) NOT NULL,
  `klantnaam` varchar(40) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `beoordeling` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Gegevens worden geëxporteerd voor tabel `order`
--

INSERT INTO `order` (`id`, `datum`, `aantal`, `product`, `prijs`, `klantnaam`, `user_id`, `beoordeling`) VALUES
(11, '08/06/17', 1, ' Orchidee Rood', ' 17.0', 'Kevin van Arkel', '161', 'Het werkt goed!'),
(12, '10/06/17', 3, ' Orchidee Groen', ' 9.95', 'Kevin van Arkel', '161', 'Verloopt prima :)'),
(13, '12/06/17', 2, ' Orchidee Zwart', ' 5.95', 'Admin Admin', '133', 'Test Order'),
(14, '12/06/17', 5, ' Orchidee Roze', ' 6.95', 'Robin Zaal', '162', 'kut'),
(15, '14/06/17', 1, ' Orchidee Rood', ' 18.5', 'Kevin van Arkel', '161', 'zeer goed.'),
(16, '14/06/17', 1, ' Orchidee Blauw', ' 16.5', 'Gebruiker Zonder Account', '0', 'eeee'),
(18, '14/06/17', 1, ' Orchidee Rood', ' 18.5', 'Gebruiker Zonder Account', '0', 'Heel goed.'),
(24, '14/06/17', 1, ' Orchidee Blauw', ' 16.5', ' Kevin van Arkel', '161', 'Erg soepel!'),
(25, '14/06/17', 1, ' Orchidee Blauw', ' 16.5', ' Kevin van Arkel', '161', 'de bestelling was vrij makkelijk te selecteren'),
(26, '14/06/17', 1, ' Orchidee Rood', ' 18.5', 'Gebruiker Zonder Account', '0', 'goede bestelling');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` varchar(600) NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `price`) VALUES
(1, 'PD1013', 'Orchidee Blauw', 'Deze mooie blauwe orchidee van 20cm hoog staat altijd mooi in uw kamer!', 'blauw.jpg', '15.00'),
(2, 'PD1014', 'Orchidee Rood', 'Deze mooie rode orchidee van 20cm hoog staat altijd mooi in uw kamer!', 'rood.jpg', '17.00'),
(3, 'PD1015', 'Orchidee Geel', 'Deze mooie gele \norchidee van 20cm hoog staat altijd mooi in uw kamer!', 'geel.png', '20.00'),
(4, 'PD1004', 'Orchidee Zwart', 'Deze mooie zwarte orchidee van 20cm hoog staat altijd mooi in uw kamer!', 'black.jpg', '5.95'),
(5, 'PD1005', 'Orchidee Paars', 'Deze mooie paarse orchidee van 20cm hoog staat altijd mooi in uw kamer!', 'purple.webp', '8.95'),
(6, 'PD1006', 'Orchidee Groen', 'Deze mooie groene orchidee van 20cm hoog staat altijd mooi in uw kamer!', 'green.jpg', '9.95'),
(7, 'PD1007', 'Orchidee Roze', 'Deze mooie roze orchidee van 20cm hoog staat altijd mooi in uw kamer!', 'pink.jpg', '6.95'),
(8, 'PD1008', 'Orchidee wit (LIMITED EDITION)', 'Deze mooie witte orchidee van 20cm hoog staat altijd mooi in uw kamer!', 'white.jpg', '35.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `infix` varchar(50) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `adres` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `infix`, `lastname`, `adres`) VALUES
(133, 'ADMIN', '', 'ADMIN', ''),
(137, 'DEVELOPER', '', 'DEVELOPER', ''),
(161, 'Kevin', 'van', 'Arkel', 'Stuivenberg 30'),
(162, 'Robin ', 'Zaal', 'zAAL', 'yoow');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

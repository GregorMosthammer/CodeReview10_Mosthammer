-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Sep 2017 um 21:22
-- Server-Version: 10.1.26-MariaDB
-- PHP-Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mosthammer_bigshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(1000) DEFAULT NULL,
  `product_img` mediumtext,
  `product_price` int(11) DEFAULT NULL,
  `product_details` mediumtext,
  `product_location` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`productID`, `product_name`, `product_img`, `product_price`, `product_details`, `product_location`) VALUES
(1, 'Product 1', 'https://www.hirschel-cosmetic.de/media/image/f7/39/82/Speick-Melos-Seife-Quitte_600x600.png', 10, 'https://wienerseife.at/', NULL),
(2, 'Product 2', 'https://www.hirschel-cosmetic.de/media/image/f7/39/82/Speick-Melos-Seife-Quitte_600x600.png', 20, 'https://wienerseife.at/', NULL),
(3, 'Product 3', 'https://www.hirschel-cosmetic.de/media/image/f7/39/82/Speick-Melos-Seife-Quitte_600x600.png', 30, 'https://wienerseife.at/', NULL),
(4, 'Product 4', 'https://www.hirschel-cosmetic.de/media/image/f7/39/82/Speick-Melos-Seife-Quitte_600x600.png', 40, 'https://wienerseife.at/', NULL),
(5, 'Product 5', 'https://www.hirschel-cosmetic.de/media/image/f7/39/82/Speick-Melos-Seife-Quitte_600x600.png', 50, 'https://wienerseife.at/', NULL),
(6, 'Product 6', 'https://wienerseife.at/', 60, 'https://wienerseife.at/', NULL),
(7, 'Product 7', 'https://www.hirschel-cosmetic.de/media/image/f7/39/82/Speick-Melos-Seife-Quitte_600x600.png', 70, 'https://wienerseife.at/', NULL),
(8, 'Product 8', 'https://www.hirschel-cosmetic.de/media/image/f7/39/82/Speick-Melos-Seife-Quitte_600x600.png', 80, 'https://wienerseife.at/', NULL),
(9, 'Product 9', 'https://www.hirschel-cosmetic.de/media/image/f7/39/82/Speick-Melos-Seife-Quitte_600x600.png', 90, 'https://wienerseife.at/', NULL),
(10, 'Product 10', 'https://www.hirschel-cosmetic.de/media/image/f7/39/82/Speick-Melos-Seife-Quitte_600x600.png', 100, 'https://wienerseife.at/', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `shoppingcartID` int(11) NOT NULL,
  `usersID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'Gregor', 'g.mosthammer@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indizes für die Tabelle `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`shoppingcartID`),
  ADD UNIQUE KEY `usersID` (`usersID`),
  ADD UNIQUE KEY `productID` (`productID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT für Tabelle `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `shoppingcartID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`usersID`) REFERENCES `products` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

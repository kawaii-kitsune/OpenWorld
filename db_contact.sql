-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 08 Σεπ 2021 στις 08:49:09
-- Έκδοση διακομιστή: 10.4.20-MariaDB
-- Έκδοση PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `db_contact`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pinscoord`
--

CREATE TABLE `pinscoord` (
  `id` int(11) NOT NULL,
  `fldName` varchar(255) NOT NULL,
  `x` double NOT NULL,
  `y` double NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `pinscoord`
--

INSERT INTO `pinscoord` (`id`, `fldName`, `x`, `y`, `available`) VALUES
(5, 'Φρουριο Κουλε', 35.34378831453463, 25.136345660441037, 1),
(6, 'Λιμενας Ηρακλειου', 35.34320770739605, 25.13773245511561, 1),
(7, 'Αρχαιολογικο Μουσειο', 35.33913677662063, 25.13741177784016, 1),
(9, 'Καθεδρικός Ναός Αγίου Τίτου', 35.33979317166969, 25.134252855205524, 1),
(10, 'Μουσείο Αρχαίας Ελληνικής Τεχνολογίας', 35.34122751304398, 25.135597502812743, 1),
(11, 'Ναός Αγίας Αικατερίνης', 35.34253568292536, 25.132038664807897, 1),
(12, 'Θεατρικός Σταθμός Ηρακλείου', 35.340864109769946, 25.140016790748465, 1),
(13, 'Μουσείο Φυσικής Ιστορίας', 35.34188765159288, 25.126681888845084, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `fldName` int(50) NOT NULL,
  `fldEmail` int(150) NOT NULL,
  `fldPhone` varchar(15) NOT NULL,
  `fldMessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `fldName`, `fldEmail`, `fldPhone`, `fldMessage`) VALUES
(1, 0, 0, '+306984202622', 'q3e'),
(2, 0, 0, '+306984202622', 'ef');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(2, 'babis_k', '$2y$10$BxV0PT0kgIbKBNNEyk58POuiE7Sq8Xh9xypFqclt1IprxOAGtLeEO', '2021-09-06 14:43:52');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `pinscoord`
--
ALTER TABLE `pinscoord`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `pinscoord`
--
ALTER TABLE `pinscoord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT για πίνακα `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

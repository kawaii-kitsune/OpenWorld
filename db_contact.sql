-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 17 Νοε 2021 στις 13:16:01
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
CREATE DATABASE IF NOT EXISTS `db_contact` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_contact`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `URL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `images`
--

INSERT INTO `images` (`id`, `URL`) VALUES
(14, 'https://www.cretanbeaches.com/images/stories/monasteries/churches/heraklion/monofatsi/onisimos/DSC_0044.JPG'),
(14, 'https://lh3.googleusercontent.com/proxy/m08_QwJ-XXhKeTBJZBDmZt1khiKAttu16BxgB0AXmVFTvJa9dGTj8Hdf1F1s3v8_qKJmb_hMNi4TccXv67tNHKtHtW4o0-HrM_ub-vH_A0Z6q3VgbH4B043EcNjcHYgZ1Z-c'),
(14, 'https://www.cretanbeaches.com/images/stories/monasteries/churches/heraklion/monofatsi/onisimos/DSC_0044.JPG');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pinscoord`
--

DROP TABLE IF EXISTS `pinscoord`;
CREATE TABLE `pinscoord` (
  `id` int(11) NOT NULL,
  `fldName` varchar(255) NOT NULL,
  `x` double NOT NULL,
  `y` double NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `GLTF` text NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `pinscoord`
--

INSERT INTO `pinscoord` (`id`, `fldName`, `x`, `y`, `available`, `GLTF`, `info`) VALUES
(14, 'Άγιος Ονήσιμος', 25.157741030198054, 35.14573890814171, 1, '/OpenWorld/test-models/onisimos.glb', 'Ο ναός που οι Κρητικοί ονομάζουν Ανέσιμος, είναι αρκετά παλιός και είχε καταρρεύσει στο πέρασμα των αιώνων. Μάλιστα, η πυκνή βλάστηση είχε καλύψει το μέρος που είχε χτιστεί αρχικά ο μικρός ναός. Ωστόσο, πριν από χρόνια κάποιος δικαστής, που κινούνταν στην περιοχή είχε ένα ατύχημα με το αυτοκίνητο του. Συγκεκριμένα, το όχημα του έπεσε ακριβώς πάνω στο σημείο που βρίσκονταν τα ερείπια του ναού. Ο δικαστής το θεώρησε θαύμα και έκτισε ξανά το παλιό εκκλησάκι θέλοντας έτσι να ευχαριστήσει τον Άγιο, που τον έσωσε από το θάνατο.  Είναι χαρακτηριστικό ότι έξω από το εκκλησάκι υπάρχει πηγάδι, το οποίο παλαιότερα είχε πάρα πολύ νερό, το οποίο συνήθως ξεχείλιζε και οι περαστικοί το χρησιμοποιούσαν για να πίνουν και να ξεδιψάνε. Ωστόσο, σύμφωνα με την παράδοση, το νερό λιγόστεψε όταν μια γυναίκα έβαλε μέσα τα πόδια της για να τα πλύνει, πράγμα που θεωρήθηκε ύβρις προς τον άγιο, που προσέφερε το καθαρό νερό για να ξεδιψάσουν οι πιστοί. Ωστόσο, οι ντόπιοι λένε πως ακόμη και σήμερα το πηγάδι έχει λίγο νερό για όσους το έχουν ανάγκη.'),
(15, 'Random point', 25.134918696959573, 35.3406431375919, 0, '', '');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
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

DROP TABLE IF EXISTS `users`;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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

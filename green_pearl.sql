-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: aug. 23, 2022 la 11:31 PM
-- Versiune server: 10.4.22-MariaDB
-- Versiune PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `green_pearl`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `camere`
--

CREATE TABLE `camere` (
  `id` int(11) NOT NULL,
  `camera_nr` varchar(255) DEFAULT NULL,
  `poza` varchar(255) DEFAULT NULL,
  `id_tip_camera` int(11) NOT NULL,
  `tip` varchar(255) NOT NULL,
  `pret` int(11) NOT NULL,
  `vedere` varchar(30) NOT NULL,
  `descriere` varchar(255) NOT NULL,
  `feedback` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `camere`
--

INSERT INTO `camere` (`id`, `camera_nr`, `poza`, `id_tip_camera`, `tip`, `pret`, `vedere`, `descriere`, `feedback`) VALUES
(1, '002', 'single.jpg', 1, 'single', 50, 'munte', 'Această cameră are televizor cu ecran plat cu programe prin cablu', NULL),
(2, '003', 'single.jpg', 1, 'single', 60, 'mare', 'Această cameră are televizor cu ecran plat cu programe prin cablu', NULL),
(3, '102', 'duble.jpg', 2, 'duble', 80, 'munte', 'Va puteti relaxa intr-una dintre camerele noastre Standard', NULL),
(4, '305', 'apartament.jpg', 4, 'apartament', 120, 'mare', 'Pentru un sejur prelungit sau pentru spațiu suplimentar', NULL),
(5, '101', 'duble.jpg', 2, 'duble', 100, 'mare', 'Va puteti relaxa intr-una dintre camerele noastre Standard', NULL),
(6, '302', 'apartament.jpg', 4, 'apartament', 100, 'munte', 'Pentru un sejur prelungit sau pentru spațiu suplimentar', NULL),
(7, '201', 'apartament.jpg', 3, 'triple', 110, 'mare', 'Aceste apartamente au zone separate de dormit și de living', NULL),
(8, '202', 'apartament.jpg', 3, 'triple', 90, 'munte', 'Aceste apartamente au zone separate de dormit și de living', NULL),
(9, '004', 'single.jpg', 1, 'single', 50, 'munte', 'Această cameră are televizor cu ecran plat cu programe prin cablu', NULL),
(10, '005', 'single.jpg', 1, 'single', 60, 'mare', 'Această cameră are televizor cu ecran plat cu programe prin cablu', NULL),
(11, '006', 'single.jpg', 1, 'single', 50, 'munte', 'Această cameră are televizor cu ecran plat cu programe prin cablu', NULL),
(13, '103', 'duble.jpg', 2, 'duble', 100, 'mare', 'Va puteti relaxa intr-una dintre camerele noastre Standard', NULL),
(14, '104', 'duble.jpg', 2, 'duble', 80, 'munte', 'Va puteti relaxa intr-una dintre camerele noastre Standard', NULL),
(15, '105', 'duble.jpg', 2, 'duble', 100, 'mare', 'Va puteti relaxa intr-una dintre camerele noastre Standard', NULL),
(16, '106', 'duble.jpg', 2, 'duble', 80, 'munte', 'Va puteti relaxa intr-una dintre camerele noastre Standard', NULL),
(18, '203', 'apartament.jpg', 3, 'triple', 110, 'mare', 'Aceste apartamente au zone separate de dormit și de living', NULL),
(19, '204', 'apartament.jpg', 3, 'triple', 90, 'munte', 'Aceste apartamente au zone separate de dormit și de living', NULL),
(20, '205', 'apartament.jpg', 3, 'triple', 110, 'mare', 'Aceste apartamente au zone separate de dormit și de living', NULL),
(21, '206', 'apartament.jpg', 3, 'triple', 90, 'munte', 'Aceste apartamente au zone separate de dormit și de living', NULL),
(22, '301', 'apartament.jpg', 4, 'apartament', 120, 'mare', 'Pentru un sejur prelungit sau pentru spațiu suplimentar', NULL),
(23, '303', 'apartament.jpg', 4, 'apartament', 120, 'mare', 'Pentru un sejur prelungit sau pentru spațiu suplimentar', NULL),
(24, '304', 'apartament.jpg', 4, 'apartament', 100, 'munte', 'Pentru un sejur prelungit sau pentru spațiu suplimentar', NULL),
(25, '306', 'apartament.jpg', 4, 'apartament', 100, 'munte', 'Pentru un sejur prelungit sau pentru spațiu suplimentar', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `mesaje`
--

CREATE TABLE `mesaje` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_rezervare` int(11) NOT NULL,
  `mesajul` varchar(255) NOT NULL,
  `subiect` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `mesaje`
--

INSERT INTO `mesaje` (`id`, `id_user`, `id_rezervare`, `mesajul`, `subiect`) VALUES
(1, 1, 2, 'as dorii apa si cola in camera la temperatura camerei', '4'),
(2, 1, 2, 'vreau aer rece in camera', '4'),
(3, 2, 3, 'vreau sa beau bere', '6');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `rezervari`
--

CREATE TABLE `rezervari` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_camere` int(11) NOT NULL,
  `data_start` date NOT NULL,
  `data_stop` date NOT NULL,
  `preferinte` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `rezervari`
--

INSERT INTO `rezervari` (`id`, `id_user`, `id_camere`, `data_start`, `data_stop`, `preferinte`) VALUES
(2, 1, 4, '2022-08-26', '2022-08-30', 'apa in camera'),
(3, 1, 2, '2022-08-30', '2022-08-31', 'cola in bar');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tip_camera`
--

CREATE TABLE `tip_camera` (
  `id` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `id_parinte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `tip_camera`
--

INSERT INTO `tip_camera` (`id`, `nume`, `id_parinte`) VALUES
(1, 'single', 0),
(2, 'duble', 1),
(3, 'triple', 2),
(4, 'apartament', 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `useri`
--

CREATE TABLE `useri` (
  `id` int(11) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `token_activari` varchar(255) DEFAULT NULL,
  `nick` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `useri`
--

INSERT INTO `useri` (`id`, `telefon`, `email`, `nume`, `adresa`, `parola`, `token_activari`, `nick`) VALUES
(1, '0722222222', 'radu.chirita92@gmail.com', 'Radu Alexandru', 'bucuresti Sectorul 2', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'radu_001'),
(2, '0777777777', 'andrei@dian.com', 'andrei', '', 'f5bb0c8de146c67b44babbf4e6584cc0', NULL, 'andrei_eu');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `camere`
--
ALTER TABLE `camere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `camere_id_uindex` (`id`),
  ADD UNIQUE KEY `camere_camera_nr_uindex` (`camera_nr`);

--
-- Indexuri pentru tabele `mesaje`
--
ALTER TABLE `mesaje`
  ADD UNIQUE KEY `mesaje_id_uindex` (`id`);

--
-- Indexuri pentru tabele `rezervari`
--
ALTER TABLE `rezervari`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rezervari_id_uindex` (`id`);

--
-- Indexuri pentru tabele `tip_camera`
--
ALTER TABLE `tip_camera`
  ADD UNIQUE KEY `tip_camera_id_uindex` (`id`);

--
-- Indexuri pentru tabele `useri`
--
ALTER TABLE `useri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `useri_id_uindex` (`id`),
  ADD UNIQUE KEY `useri_email_uindex` (`email`),
  ADD UNIQUE KEY `useri_nick_uindex` (`nick`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `camere`
--
ALTER TABLE `camere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pentru tabele `mesaje`
--
ALTER TABLE `mesaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `rezervari`
--
ALTER TABLE `rezervari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `tip_camera`
--
ALTER TABLE `tip_camera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `useri`
--
ALTER TABLE `useri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: aug. 20, 2022 la 08:07 PM
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
  `descriere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `camere`
--

INSERT INTO `camere` (`id`, `camera_nr`, `poza`, `id_tip_camera`, `tip`, `pret`, `vedere`, `descriere`) VALUES
(1, '002', 'single.jpg', 1, 'single', 50, 'munte', 'Această cameră are televizor cu ecran plat cu programe prin cablu'),
(2, '003', 'single.jpg', 1, 'single', 60, 'mare', 'Această cameră are televizor cu ecran plat cu programe prin cablu'),
(3, '102', 'duble.jpg', 2, 'duble', 80, 'munte', 'ntr-una dintre camerele noastre Standard'),
(4, '305', 'apartament.jpg', 4, 'apartament', 120, 'mare', 'Pentru un sejur prelungit sau pentru spațiu suplimentar'),
(5, '101', 'duble.jpg', 2, 'duble', 100, 'mare', 'ntr-una dintre camerele noastre Standard'),
(6, '302', 'apartament.jpg', 4, 'apartament', 100, 'munte', 'Pentru un sejur prelungit sau pentru spațiu suplimentar'),
(7, '201', 'apartament.jpg', 3, 'triple', 110, 'mare', 'Aceste apartamente au zone separate de dormit și de living'),
(8, '202', 'apartament.jpg', 3, 'triple', 90, 'munte', 'Aceste apartamente au zone separate de dormit și de living'),
(9, '004', 'single.jpg', 1, 'single', 50, 'munte', 'Această cameră are televizor cu ecran plat cu programe prin cablu'),
(10, '005', 'single.jpg', 1, 'single', 60, 'mare', 'Această cameră are televizor cu ecran plat cu programe prin cablu'),
(11, '006', 'single.jpg', 1, 'single', 50, 'munte', 'Această cameră are televizor cu ecran plat cu programe prin cablu'),
(13, '103', 'duble.jpg', 2, 'duble', 100, 'mare', 'ntr-una dintre camerele noastre Standard'),
(14, '104', 'duble.jpg', 2, 'duble', 80, 'munte', 'ntr-una dintre camerele noastre Standard'),
(15, '105', 'duble.jpg', 2, 'duble', 100, 'mare', 'ntr-una dintre camerele noastre Standard'),
(16, '106', 'duble.jpg', 2, 'duble', 80, 'munte', 'ntr-una dintre camerele noastre Standard'),
(18, '203', 'apartament.jpg', 3, 'triple', 110, 'mare', 'Aceste apartamente au zone separate de dormit și de living'),
(19, '204', 'apartament.jpg', 3, 'triple', 90, 'munte', 'Aceste apartamente au zone separate de dormit și de living'),
(20, '205', 'apartament.jpg', 3, 'triple', 110, 'mare', 'Aceste apartamente au zone separate de dormit și de living'),
(21, '206', 'apartament.jpg', 3, 'triple', 90, 'munte', 'Aceste apartamente au zone separate de dormit și de living'),
(22, '301', 'apartament.jpg', 4, 'apartament', 120, 'mare', 'Pentru un sejur prelungit sau pentru spațiu suplimentar'),
(23, '303', 'apartament.jpg', 4, 'apartament', 120, 'mare', 'Pentru un sejur prelungit sau pentru spațiu suplimentar'),
(24, '304', 'apartament.jpg', 4, 'apartament', 100, 'munte', 'Pentru un sejur prelungit sau pentru spațiu suplimentar'),
(25, '306', 'apartament.jpg', 4, 'apartament', 100, 'munte', 'Pentru un sejur prelungit sau pentru spațiu suplimentar');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `mesaje`
--

CREATE TABLE `mesaje` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_rezervare` int(11) NOT NULL,
  `mesajul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `rezervari`
--

CREATE TABLE `rezervari` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_camere` int(11) NOT NULL,
  `data_start` int(11) NOT NULL,
  `data_stop` int(11) NOT NULL,
  `preferinte` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `token_activari` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `useri`
--

INSERT INTO `useri` (`id`, `telefon`, `email`, `nume`, `adresa`, `parola`, `token_activari`) VALUES
(1, '0722222222', 'radu.chirita92@gmail.com', 'radu', 'bucuresti', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(2, '', 'andrei@dian.com', 'andrei', '', 'f5bb0c8de146c67b44babbf4e6584cc0', NULL);

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
  ADD UNIQUE KEY `useri_email_uindex` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `rezervari`
--
ALTER TABLE `rezervari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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

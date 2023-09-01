-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2023 pada 13.48
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chanel`
--

CREATE TABLE `chanel` (
  `id_chanel` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `nama` varchar(125) NOT NULL,
  `description` varchar(225) NOT NULL,
  `field1` varchar(125) DEFAULT NULL,
  `field2` varchar(125) DEFAULT NULL,
  `field3` varchar(125) DEFAULT NULL,
  `field4` varchar(125) DEFAULT NULL,
  `field5` varchar(125) DEFAULT NULL,
  `field6` varchar(125) DEFAULT NULL,
  `field7` varchar(125) DEFAULT NULL,
  `field8` varchar(125) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `chanel`
--

INSERT INTO `chanel` (`id_chanel`, `id_users`, `nama`, `description`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`, `field8`, `created_at`, `updated_at`) VALUES
(2, 1, 'OCC Health monitoring', 'Data monitoring', 'Oxygen', 'Heart rate', 'Temperature', 'Latitude', 'Longitude', '', '', '', '2023-08-22 16:34:22', NULL),
(4, 1, 'percobaan', 'ini adalah percobaan', 'sensor1', 'sensor2', 'sensor3', 'sensor4', 'sensor5', 'sensor6', 'sensor 7', '', '2023-08-22 21:43:14', NULL),
(5, 2, '', '', '3.4', '4.5', '5.6', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `feeds`
--

CREATE TABLE `feeds` (
  `id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `chanel_id` bigint(20) NOT NULL,
  `field1` decimal(9,6) DEFAULT NULL,
  `field2` decimal(9,6) DEFAULT NULL,
  `field3` decimal(9,6) DEFAULT NULL,
  `field4` decimal(9,6) DEFAULT NULL,
  `field5` decimal(9,6) DEFAULT NULL,
  `field6` decimal(9,6) DEFAULT NULL,
  `field7` decimal(9,6) DEFAULT NULL,
  `field8` decimal(9,6) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  `elevation` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `feeds`
--

INSERT INTO `feeds` (`id`, `created_at`, `chanel_id`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`, `field8`, `latitude`, `longitude`, `elevation`, `status`) VALUES
(1, '2023-08-23 00:00:00', 2, 3.400000, 4.500000, 5.600000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2023-08-23 06:41:21', 2, 3.400000, 4.500000, 5.600000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sensors`
--

CREATE TABLE `sensors` (
  `id_sensors` int(11) NOT NULL,
  `percent` decimal(9,6) NOT NULL,
  `heartRateChar` decimal(9,6) NOT NULL,
  `temperatureChar` decimal(9,6) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `id_chanel` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `token` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(125) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$jolTX5zPKPNCFALx3VcaE.jcZ0ErdCM2Nfvmx3SPzSCm/YZ83q4Xa', 'admin', '2023-09-01 04:21:28'),
(2, 'user', '$2y$10$nHLaM0.UW1LIEtSWYubGwuUlvUok1YlZNYJGfCaofwv7tKlCxGh6O', 'user', '2023-08-30 04:21:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chanel`
--
ALTER TABLE `chanel`
  ADD PRIMARY KEY (`id_chanel`);

--
-- Indeks untuk tabel `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id_sensors`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chanel`
--
ALTER TABLE `chanel`
  MODIFY `id_chanel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id_sensors` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
